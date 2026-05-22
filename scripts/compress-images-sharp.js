import sharp from 'sharp';
import imagemin from 'imagemin';
import imageminSvgo from 'imagemin-svgo';
import { glob } from 'glob';
import path from 'node:path';
import fs from 'node:fs/promises';

const SRC_ROOT = path.resolve('src/images');
const DEST_ROOT = path.resolve('images');
const CACHE_PATH = path.resolve('.cache/image-compress.json');
const CACHE_VERSION = 'v2-sharp-jpeg80-pngPalette80-webp80-svgoKeepViewBox';
const FORCE = process.argv.includes('--force');

async function ensureDir(dirPath) {
  await fs.mkdir(dirPath, { recursive: true });
}

async function fileExists(filePath) {
  try {
    await fs.access(filePath);
    return true;
  } catch {
    return false;
  }
}

async function readCache() {
  try {
    const raw = await fs.readFile(CACHE_PATH, 'utf8');
    const parsed = JSON.parse(raw);
    if (!parsed || typeof parsed !== 'object') return { version: CACHE_VERSION, entries: {} };
    if (parsed.version !== CACHE_VERSION) return { version: CACHE_VERSION, entries: {} };
    if (!parsed.entries || typeof parsed.entries !== 'object')
      return { version: CACHE_VERSION, entries: {} };
    return parsed;
  } catch {
    return { version: CACHE_VERSION, entries: {} };
  }
}

async function writeCache(cache) {
  await ensureDir(path.dirname(CACHE_PATH));
  await fs.writeFile(CACHE_PATH, `${JSON.stringify(cache, null, 2)}\n`, 'utf8');
}

async function compressSvg(srcPath, destPath) {
  const destDir = path.dirname(destPath);
  await ensureDir(destDir);
  await imagemin([srcPath], {
    destination: destDir,
    plugins: [
      imageminSvgo({
        plugins: [{ name: 'removeViewBox', active: false }]
      })
    ]
  });
}

async function compressJpeg(srcPath, destPath) {
  const destDir = path.dirname(destPath);
  await ensureDir(destDir);
  await sharp(srcPath).jpeg({ quality: 80, mozjpeg: true }).toFile(destPath);
}

async function compressPng(srcPath, destPath) {
  const destDir = path.dirname(destPath);
  await ensureDir(destDir);
  // pngquant相当の“減色”寄り（ロスレスが良ければ palette:false に）
  await sharp(srcPath)
    .png({ compressionLevel: 9, adaptiveFiltering: true, palette: true, quality: 80 })
    .toFile(destPath);
}

async function createWebp(srcPath, webpPath) {
  const destDir = path.dirname(webpPath);
  await ensureDir(destDir);
  await sharp(srcPath).webp({ quality: 80 }).toFile(webpPath);
}

async function main() {
  const imageFiles = await glob('src/images/**/*.{jpg,jpeg,png,svg,gif,webp}', {
    absolute: true,
    nodir: true
  });

  console.log(`Found ${imageFiles.length} source images to process...`);

  const cache = await readCache();

  let skippedFiles = 0;
  let copied = 0;
  let compressed = 0;
  let webpCreated = 0;

  for (const srcPath of imageFiles) {
    const srcStat = await fs.stat(srcPath);
    const ext = path.extname(srcPath).toLowerCase();
    const relPath = path.relative(SRC_ROOT, srcPath);
    const destPath = path.join(DEST_ROOT, relPath);

    const expectsWebp = ext === '.jpg' || ext === '.jpeg' || ext === '.png';
    const webpPath = expectsWebp ? destPath.replace(/\.(png|jpe?g)$/i, '.webp') : null;

    const prev = cache.entries[relPath];
    const destExists = await fileExists(destPath);
    const webpExists = expectsWebp && webpPath ? await fileExists(webpPath) : true;

    const needsProcess =
      FORCE ||
      !prev ||
      prev.srcMtimeMs !== srcStat.mtimeMs ||
      prev.srcSize !== srcStat.size ||
      !destExists ||
      !webpExists;

    if (!needsProcess) {
      skippedFiles += 1;
      continue;
    }

    // GIF/WebPは再圧縮せずコピーのみ
    if (ext === '.gif' || ext === '.webp') {
      await ensureDir(path.dirname(destPath));
      await fs.copyFile(srcPath, destPath);
      copied += 1;

      const destSize = (await fs.stat(destPath)).size;
      cache.entries[relPath] = {
        type: ext.slice(1),
        srcMtimeMs: srcStat.mtimeMs,
        srcSize: srcStat.size,
        destSize,
        webpSize: null
      };
      continue;
    }

    // SVG
    if (ext === '.svg') {
      await compressSvg(srcPath, destPath);
      compressed += 1;

      const destSize = (await fs.stat(destPath)).size;
      cache.entries[relPath] = {
        type: 'svg',
        srcMtimeMs: srcStat.mtimeMs,
        srcSize: srcStat.size,
        destSize,
        webpSize: null
      };
      continue;
    }

    // JPG/PNG
    if (ext === '.jpg' || ext === '.jpeg') {
      await compressJpeg(srcPath, destPath);
      compressed += 1;
    } else if (ext === '.png') {
      await compressPng(srcPath, destPath);
      compressed += 1;
    } else {
      // 想定外はコピー
      await ensureDir(path.dirname(destPath));
      await fs.copyFile(srcPath, destPath);
      copied += 1;
    }

    let webpSize = null;
    if (expectsWebp && webpPath) {
      try {
        await createWebp(srcPath, webpPath);
        webpCreated += 1;
        webpSize = (await fs.stat(webpPath)).size;
      } catch (e) {
        // WebPが作れなくても全体は止めない（次回再試行される）
        console.warn(`WebP conversion failed: ${relPath}`);
        console.warn(e);
        webpSize = null;
      }
    }

    const destSize = (await fs.stat(destPath)).size;
    cache.entries[relPath] = {
      type: ext.slice(1),
      srcMtimeMs: srcStat.mtimeMs,
      srcSize: srcStat.size,
      destSize,
      webpSize
    };
  }

  await writeCache(cache);

  console.log(
    `✓ Done. compressed: ${compressed}, webp: ${webpCreated}, copied: ${copied}, skipped: ${skippedFiles}`
  );
}

main().catch(err => {
  console.error('Error compressing images:', err);
  process.exit(1);
});

