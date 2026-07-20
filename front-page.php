<?php get_header(); ?>
<?php
if (! function_exists('telex_top_people_field')) {
  function telex_top_people_field($post_id, $name, $default = '')
  {
    if (function_exists('get_field')) {
      $value = get_field($name, $post_id);
      if ($value !== null && $value !== false && $value !== '') {
        return $value;
      }
    }

    $value = get_post_meta($post_id, $name, true);
    return $value !== '' ? $value : $default;
  }
}

if (! function_exists('telex_top_people_image_url')) {
  function telex_top_people_image_url($post_id)
  {
    $image = telex_top_people_field($post_id, 'people_archive_thumbnail_image');

    if (is_array($image) && ! empty($image['url'])) {
      return $image['url'];
    }

    if (is_numeric($image)) {
      $image_url = wp_get_attachment_image_url((int) $image, 'large');
      if ($image_url) {
        return $image_url;
      }
    }

    $fallback_image = telex_top_people_field($post_id, 'people_single_profile_image');

    if (is_array($fallback_image) && ! empty($fallback_image['url'])) {
      return $fallback_image['url'];
    }

    if (is_numeric($fallback_image)) {
      $fallback_url = wp_get_attachment_image_url((int) $fallback_image, 'large');
      if ($fallback_url) {
        return $fallback_url;
      }
    }

    if (is_string($fallback_image) && $fallback_image !== '') {
      if (preg_match('/^https?:\/\//', $fallback_image)) {
        return $fallback_image;
      }

      if (strpos($fallback_image, '/src/images/') === 0) {
        return get_template_directory_uri() . str_replace('/src/images/', '/images/', $fallback_image);
      }

      if (strpos($fallback_image, '/images/') === 0) {
        return get_template_directory_uri() . $fallback_image;
      }

      return $fallback_image;
    }

    return get_template_directory_uri() . '/images/people/yamada-saki.webp';
  }
}

if (! function_exists('telex_top_people_lines')) {
  function telex_top_people_lines($text)
  {
    return array_values(array_filter(array_map('trim', preg_split('/\r\n|\r|\n/', (string) $text)), 'strlen'));
  }
}
?>
<div class="p-loading">
  <div class="l-inner">
    <div class="p-loading__content">
      <div class="p-loading__logo-wrapper">
        <div class="p-loading__logo-img">
          <img decoding="async" loading="lazy" src="<?php echo esc_url(get_template_directory_uri()); ?>/images/header/innovation-logo.webp" alt="テレックス関西 採用サイト" width="431" height="38">
        </div>
        <div class="p-loading__logo-text-wrapper">
          <span class="p-loading__logo-text">Telex Kansai</span>
          <span class="p-loading__logo-text p-loading__logo-text--small">Recruit Site</span>
        </div>
      </div>
      <p class="p-loading__text">未来を変えるのは<br class="u-mobile">いつだって人だ</p>
    </div>
  </div>
</div>
<main>
  <section class="p-mv">
    <div class="l-inner">
      <div class="p-mv__content">
        <figure class="p-mv__bg">
          <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/mv/mv-bg.webp" alt="">
        </figure>
        <div class="p-mv__body">
          <h1 class="p-mv__title">
            <span class="js-shining-title">未来を変えるのは</span>
            <span class="js-shining-title">いつだって人だ</span>
          </h1>
          <p class="p-mv__text">
            「未来のあたりまえ」をつくるのは「創造性」です。<br>
            あたらしい個性を受け入れるたびに、あたらしいこだわりが増え、<br class="u-desktop">
            チームもプロダクトも進化します。あなたの経験や独創性を、活かしてみませんか？
          </p>
        </div>
        <div class="p-mv__entry">
          <a class="p-mv__entry-link" href="<?php echo esc_url(home_url('/entry/')); ?>">
            <span class="p-mv__entry-text">募集要項・エントリーはこちら</span>
            <span class="p-mv__entry-en">Entry</span>
          </a>
          <p class="p-mv__entry-note">未来のあたりまえをともに作る仲間を積極募集中です。</p>
        </div>
      </div>
    </div>
  </section>
  <section class="p-top-message">
    <div class="l-inner">
      <div class="p-top-message__content">
        <div class="p-top-message__body">
          <p class="p-top-message__en js-page-main-title">Message</p>
          <h2 class="p-top-message__title js-opacity-word">採用メッセージ</h2>
          <p class="p-top-message__text js-opacity-word">
            <span>モバイル販売、法人営業、イベント事業の現場で、年間延べ数千人の顧客と向き合っています。</span>
            <span>未経験者を68%採用し、入社2年での昇進率43%を実現する育成体制が、私たちの強みです。</span>
          </p>
          <a class="p-top-message__link js-opacity-word" href="<?php echo esc_url(home_url('/message/')); ?>">
            <span class="p-top-message__link-text">採用メッセージへ</span>
            <span class="p-top-message__link-en">Message</span>
          </a>
        </div>
        <figure class="p-top-message__image js-pro-img">
          <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/top-message/message01.webp" alt="">
        </figure>
      </div>
    </div>
  </section>
  <section class="p-top-advantage">
    <div class="l-inner">
      <div class="p-top-advantage__content">
        <div class="p-top-advantage__heading">
          <p class="p-top-advantage__en js-page-main-title">Advantage</p>
          <h2 class="p-top-advantage__title js-opacity-word">テレックスの強み</h2>
        </div>
        <div class="p-top-advantage__cards js-column-scrub">
          <a class="p-top-advantage-card" href="<?php echo esc_url(home_url('/advantage/#anc01')); ?>">
            <figure class="p-top-advantage-card__image">
              <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/top-advantage/advantage01.webp" alt="頑張りが評価される文化">
            </figure>
            <div class="p-top-advantage-card__body">
              <h3 class="p-top-advantage-card__title js-opacity-word">頑張りが評価される文化</h3>
              <p class="p-top-advantage-card__text js-opacity-word">成果だけでなく、そこに至るプロセスまでしっかり評価される仕組みを作っています。</p>
            </div>
          </a>
          <a class="p-top-advantage-card" href="<?php echo esc_url(home_url('/advantage/#anc02')); ?>">
            <figure class="p-top-advantage-card__image">
              <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/top-advantage/advantage02.webp" alt="成長を支える育成制度">
            </figure>
            <div class="p-top-advantage-card__body">
              <h3 class="p-top-advantage-card__title js-opacity-word">成長を支える育成制度</h3>
              <p class="p-top-advantage-card__text js-opacity-word">入社後も研修・メンター・キャリア支援など、成長を後押しする制度が整っています。</p>
            </div>
          </a>
          <a class="p-top-advantage-card" href="<?php echo esc_url(home_url('/advantage/#anc03')); ?>">
            <figure class="p-top-advantage-card__image">
              <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/top-advantage/advantage03.webp" alt="安心して働ける環境">
            </figure>
            <div class="p-top-advantage-card__body">
              <h3 class="p-top-advantage-card__title js-opacity-word">安心して働ける環境</h3>
              <p class="p-top-advantage-card__text js-opacity-word">体制・休暇・手当まで充実。長く、自分らしく働き続けられる環境をしっかり整えています。</p>
            </div>
          </a>
          <a class="p-top-advantage-card" href="<?php echo esc_url(home_url('/advantage/#anc04')); ?>">
            <figure class="p-top-advantage-card__image">
              <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/top-advantage/advantage04.webp" alt="通信インフラ×関西密着の安定性">
            </figure>
            <div class="p-top-advantage-card__body">
              <h3 class="p-top-advantage-card__title js-opacity-word">
                <span>通信インフラ×関西</span>
                <span>密着の安定性</span>
              </h3>
              <p class="p-top-advantage-card__text js-opacity-word">30年の実績と、関西エリアの土台で安定した基盤の中で仕事に向き合うことができます。</p>
            </div>
          </a>
        </div>
        <a class="p-top-advantage__link js-opacity-word" href="<?php echo esc_url(home_url('/advantage/')); ?>">
          <span class="p-top-advantage__link-text">テレックスの強み一覧へ</span>
          <span class="p-top-advantage__link-en">Superiority</span>
        </a>
      </div>
    </div>
  </section>
  <section class="p-top-data">
    <div class="l-inner">
      <div class="p-top-data__content">
        <div class="p-top-data__heading">
          <div class="p-top-data__title-block">
            <p class="p-top-data__en js-page-main-title">Data</p>
            <h2 class="p-top-data__title js-opacity-word">数字で見るテレックス</h2>
          </div>
          <p class="p-top-data__lead js-opacity-word">社員構成から昇進実績まで、テレックスの現場をデータで紹介します。<br>未経験者の割合が高く、若手が活躍する組織です。</p>
        </div>
        <ul class="p-top-data__cards">
          <li class="p-top-data-card js-opacity-word">
            <h3 class="p-top-data-card__title">設立年</h3>
            <div class="p-top-data-card__icon">
              <img class="p-top-data-card__icon" src="<?php echo esc_url(get_template_directory_uri()); ?>/images/data/icon-1.webp" alt="設立年">
            </div>
            <p class="p-top-data-card__value"><span class="p-top-data-card__number">1995</span><span>年</span></p>
          </li>
          <li class="p-top-data-card js-opacity-word">
            <h3 class="p-top-data-card__title">売上高</h3>
            <div class="p-top-data-card__icon">
              <img class="p-top-data-card__icon" src="<?php echo esc_url(get_template_directory_uri()); ?>/images/data/icon-2.webp" alt="売上高">
            </div>
            <p class="p-top-data-card__value"><span class="p-top-data-card__number">36億7,280</span><span>万円</span></p>
            <p class="p-top-data-card__note">(2025年度実績)</p>
          </li>
          <li class="p-top-data-card js-opacity-word">
            <h3 class="p-top-data-card__title">従業員数</h3>
            <div class="p-top-data-card__icon">
              <img class="p-top-data-card__icon" src="<?php echo esc_url(get_template_directory_uri()); ?>/images/data/icon-3.webp" alt="従業員数">
            </div>
            <p class="p-top-data-card__value"><span class="p-top-data-card__number">153</span><span>名</span></p>
            <p class="p-top-data-card__note">(2026年4月1日時点)</p>
          </li>
          <li class="p-top-data-card js-opacity-word">
            <h3 class="p-top-data-card__title">男女比</h3>
            <div class="p-top-data-card__icon">
              <img class="p-top-data-card__icon" src="<?php echo esc_url(get_template_directory_uri()); ?>/images/data/icon-4.webp" alt="男女比">
            </div>
            <p class="p-top-data-card__value"><span class="p-top-data-card__number">6 : 4</span></p>
          </li>
          <li class="p-top-data-card js-opacity-word">
            <h3 class="p-top-data-card__title">女性管理職割合</h3>
            <div class="p-top-data-card__icon">
              <img class="p-top-data-card__icon" src="<?php echo esc_url(get_template_directory_uri()); ?>/images/data/icon-5.webp" alt="女性管理職割合">
            </div>
            <p class="p-top-data-card__value"><span class="p-top-data-card__number">33</span><span>%</span></p>
          </li>
          <li class="p-top-data-card js-opacity-word">
            <h3 class="p-top-data-card__title">育休取得率</h3>
            <div class="p-top-data-card__icon">
              <img class="p-top-data-card__icon" src="<?php echo esc_url(get_template_directory_uri()); ?>/images/data/icon-6.webp" alt="育休取得率">
            </div>
            <p class="p-top-data-card__value"><span class="p-top-data-card__number">100</span><span>%</span></p>
          </li>
        </ul>
        <a class="p-top-data__link js-opacity-word" href="<?php echo esc_url(home_url('/data/')); ?>">
          <span class="p-top-data__link-text">数字一覧へ</span>
          <span class="p-top-data__link-en">Data</span>
        </a>
      </div>
    </div>
  </section>
  <section class="p-top-work">
    <div class="l-inner">
      <div class="p-top-work__content">
        <div class="p-top-work__heading">
          <p class="p-top-work__en js-page-main-title">Work</p>
          <h2 class="p-top-work__title js-opacity-word">仕事を知る</h2>
        </div>
        <div class="p-top-work__cards js-column-work">
          <article class="p-top-work-card">
            <figure class="p-top-work-card__image">
              <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/top-work/work01.webp" alt="モバイル事業部">
            </figure>
            <div class="p-top-work-card__body js-opacity-word">
              <h3 class="p-top-work-card__title">モバイル事業部</h3>
              <p class="p-top-work-card__text">顧客と直接向き合い、最新機種の提案と契約サポートを行う営業職</p>
              <a class="p-top-work-card__link" href="<?php echo esc_url(home_url('/mobile_business/')); ?>">
                <span class="p-top-work-card__link-text">仕事を見る</span>
              </a>
            </div>
          </article>
          <article class="p-top-work-card">
            <figure class="p-top-work-card__image">
              <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/top-work/work02.webp" alt="法人営業">
            </figure>
            <div class="p-top-work-card__body js-opacity-word">
              <h3 class="p-top-work-card__title">法人営業</h3>
              <p class="p-top-work-card__text">企業の通信インフラ導入を提案し、経営課題の解決をサポートする営業職</p>
              <a class="p-top-work-card__link" href="<?php echo esc_url(home_url('/corporate_sales/')); ?>">
                <span class="p-top-work-card__link-text">仕事を見る</span>
              </a>
            </div>
          </article>
          <article class="p-top-work-card">
            <figure class="p-top-work-card__image">
              <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/top-work/work03.webp" alt="イベント事業部">
            </figure>
            <div class="p-top-work-card__body js-opacity-word">
              <h3 class="p-top-work-card__title">イベント事業部</h3>
              <p class="p-top-work-card__text">大型展示会やキャンペーンイベントの企画・運営を通じて、ブランド価値を高める職</p>
              <a class="p-top-work-card__link" href="<?php echo esc_url(home_url('/event_business/')); ?>">
                <span class="p-top-work-card__link-text">仕事を見る</span>
              </a>
            </div>
          </article>
        </div>
      </div>
    </div>
  </section>
  <section class="p-top-people">
    <div class="l-inner">
      <div class="p-top-people__content">
        <div class="p-top-people__heading">
          <p class="p-top-people__en js-page-main-title">People</p>
          <h2 class="p-top-people__title js-opacity-word">人を知る</h2>
        </div>
        <div class="p-top-people__body">
          <div class="p-top-people__slider swiper js-top-people-slider">
            <div class="swiper-wrapper">
              <?php
              $top_people_query = new WP_Query(array(
                'post_type' => 'post',
                'post_status' => 'publish',
                'posts_per_page' => 6,
                'post_name__in' => array(
                  'yamada',
                  'kawamoto-daichi',
                  'nishikawa-honoka',
                  'sakamoto-genki',
                  'muto-ren',
                  'yano-kana',
                ),
                'orderby' => 'post_name__in',
              ));
              ?>
              <?php if ($top_people_query->have_posts()) : ?>
                <?php while ($top_people_query->have_posts()) : ?>
                  <?php $top_people_query->the_post(); ?>
                  <?php
                  $top_people_id = get_the_ID();
                  $top_people_image = telex_top_people_image_url($top_people_id);
                  $top_people_copy = telex_top_people_field($top_people_id, 'people_single_mv_title', get_the_title());
                  $top_people_position = telex_top_people_field($top_people_id, 'position');
                  ?>
                  <div class="p-top-people-card swiper-slide">
                    <a class="p-top-people-card__link" href="<?php the_permalink(); ?>">
                      <figure class="p-top-people-card__image">
                        <img src="<?php echo esc_url($top_people_image); ?>" alt="<?php the_title_attribute(); ?>">
                      </figure>
                      <div class="p-top-people-card__body">
                        <h3 class="p-top-people-card__copy">
                          <?php foreach (telex_top_people_lines($top_people_copy) as $top_people_copy_line) : ?>
                            <span><?php echo esc_html($top_people_copy_line); ?></span>
                          <?php endforeach; ?>
                        </h3>
                        <?php if ($top_people_position) : ?>
                          <p class="p-top-people-card__position"><?php echo esc_html($top_people_position); ?></p>
                        <?php endif; ?>
                        <p class="p-top-people-card__name"><?php the_title(); ?></p>
                      </div>
                    </a>
                  </div>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
              <?php endif; ?>
            </div>
          </div>
          <div class="p-top-people__link-wrapper js-opacity-word">
            <a class="p-top-people__link" href="<?php echo esc_url(home_url('/people/')); ?>">
              <span class="p-top-people__link-text">社員一覧へ</span>
              <span class="p-top-people__link-en">People</span>
            </a>
          </div>
        </div>
        
      </div>
     
      
    </div>
  </section>
  <section class="p-top-crosstalk">
    <div class="l-inner">
      <div class="p-top-crosstalk__content">
        <div class="p-top-crosstalk__heading">
          <p class="p-top-crosstalk__en js-page-main-title">Cross talk</p>
          <h2 class="p-top-crosstalk__title js-opacity-word">クロストーク</h2>
        </div>
        <div class="p-top-crosstalk__cards">
          <article class="p-top-crosstalk-card">
            <figure class="p-top-crosstalk-card__image js-pro-img">
              <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/top-crosstalk/crosstalk01.webp" alt="イノベーションセレモニー対談">
            </figure>
            <div class="p-top-crosstalk-card__body js-opacity-word">
              <h3 class="p-top-crosstalk-card__title">イノベーションセレモニー対談</h3>
              <p class="p-top-crosstalk-card__text">
                <span>テレックス関西が大切にしている社員総会(イノベーションセレモニー)について受賞した2名に</span>
                <span>対談してもらいました。</span>
              </p>
              <a class="p-top-crosstalk-card__link p-top-crosstalk-card__link--arrow" href="<?php echo esc_url(home_url('/crosstalk_event/')); ?>">
                <span class="p-top-crosstalk-card__link-text">対談を見る</span>
                <span class="p-top-crosstalk-card__link-en">cross talk</span>
              </a>
            </div>
          </article>
          <article class="p-top-crosstalk-card">
            <figure class="p-top-crosstalk-card__image js-pro-img">
              <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/top-crosstalk/crosstalk02.webp" alt="内定者対談">
            </figure>
            <div class="p-top-crosstalk-card__body js-opacity-word">
              <h3 class="p-top-crosstalk-card__title">内定者対談</h3>
              <p class="p-top-crosstalk-card__text">
                <span>テレックス関西に内定を決めた<br class="u-mobile">学生2名になぜこの会社を</span>
                <span>選んだのか？どんなことが決めて手になったのか</span>
                <span>リアルな胸の内を語ってもらいました。</span>
              </p>
              <a class="p-top-crosstalk-card__link p-top-crosstalk-card__link--arrow" href="<?php echo esc_url(home_url('/crosstalk_unofficial-person/')); ?>">
                <span class="p-top-crosstalk-card__link-text">対談を見る</span>
                <span class="p-top-crosstalk-card__link-en">cross talk</span>
              </a>
            </div>
          </article>
        </div>
      </div>
    </div>
  </section>
  <section class="p-top-career">
    <div class="l-inner">
      <div class="p-top-career__content">
        <div class="p-top-career__top">
          <div class="p-top-career__body">
            <p class="p-top-career__en js-page-main-title">Career / Environment</p>
            <h2 class="p-top-career__title js-opacity-word">キャリア / 働く環境</h2>
            <p class="p-top-career__text js-opacity-word">入社後3ヶ月の集中研修で商品知識と営業スキルを習得。その後も現場のメンターが日々の業務をサポートし、実践を通じた成長を加速させます。</p>
          </div>
          <figure class="p-top-career__image js-opacity-word">
            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/top-career/main.webp" alt="">
          </figure>
        </div>
        <div class="p-top-career__columns">
          <div class="p-top-career__column">
            <h3 class="p-top-career__column-title js-opacity-word js-pro-word">キャリア</h3>
            <ul class="p-top-career__list">
              <li class="p-top-career__item js-opacity-word">
                <a class="p-top-career__link" href="<?php echo esc_url(home_url('/career/#career-path')); ?>">
                  <img class="p-top-career__thumb" src="<?php echo esc_url(get_template_directory_uri()); ?>/images/top-career/career01.webp" alt="">
                  <span class="p-top-career__link-text">キャリアパス</span>
                </a>
              </li>
              <li class="p-top-career__item js-opacity-word">
                <a class="p-top-career__link" href="<?php echo esc_url(home_url('/career/#support')); ?>">
                  <img class="p-top-career__thumb" src="<?php echo esc_url(get_template_directory_uri()); ?>/images/top-career/career02.webp" alt="">
                  <span class="p-top-career__link-text">支援体制</span>
                </a>
              </li>
              <li class="p-top-career__item js-opacity-word">
                <a class="p-top-career__link" href="<?php echo esc_url(home_url('/career/#training')); ?>">
                  <img class="p-top-career__thumb" src="<?php echo esc_url(get_template_directory_uri()); ?>/images/top-career/career03.webp" alt="">
                  <span class="p-top-career__link-text">研修</span>
                </a>
              </li>
            </ul>
          </div>
          <div class="p-top-career__column">
            <h3 class="p-top-career__column-title js-opacity-word js-pro-word">働く環境</h3>
            <ul class="p-top-career__list js-opacity-word">
              <li class="p-top-career__item">
                <a class="p-top-career__link" href="<?php echo esc_url(home_url('/environment/#system')); ?>">
                  <img class="p-top-career__thumb" src="<?php echo esc_url(get_template_directory_uri()); ?>/images/top-career/environment01.webp" alt="">
                  <span class="p-top-career__link-text">制度</span>
                </a>
              </li>
              <li class="p-top-career__item js-opacity-word">
                <a class="p-top-career__link" href="<?php echo esc_url(home_url('/environment/#benefit')); ?>">
                  <img class="p-top-career__thumb" src="<?php echo esc_url(get_template_directory_uri()); ?>/images/top-career/environment02.webp" alt="">
                  <span class="p-top-career__link-text">福利厚生</span>
                </a>
              </li>
              <li class="p-top-career__item js-opacity-word">
                <a class="p-top-career__link" href="<?php echo esc_url(home_url('/environment/#workplace')); ?>">
                  <img class="p-top-career__thumb" src="<?php echo esc_url(get_template_directory_uri()); ?>/images/top-career/environment03.webp" alt="">
                  <span class="p-top-career__link-text">働く環境</span>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="p-top-entry js-opacity-word" id="entry">
    <div class="l-inner">
      <?php get_template_part('includes/entry'); ?>
    </div>
  </section>
  <section class="p-top-gallery" aria-label="社内イベントギャラリー">
    <div class="p-top-gallery__grid">
      <figure class="p-top-gallery__item js-opacity-word">
        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/top-gallery/gallery01.webp" alt="">
      </figure>
      <figure class="p-top-gallery__item js-opacity-word">
        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/top-gallery/gallery02.webp" alt="">
      </figure>
      <figure class="p-top-gallery__item js-opacity-word">
        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/top-gallery/gallery03.webp" alt="">
      </figure>
      <figure class="p-top-gallery__item js-opacity-word">
        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/top-gallery/gallery04.webp" alt="">
      </figure>
      <figure class="p-top-gallery__item js-opacity-word">
        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/top-gallery/gallery05.webp" alt="">
      </figure>
      <figure class="p-top-gallery__item js-opacity-word">
        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/top-gallery/gallery06.webp" alt="">
      </figure>
      <figure class="p-top-gallery__item js-opacity-word">
        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/top-gallery/gallery07.webp" alt="">
      </figure>
      <figure class="p-top-gallery__item js-opacity-word">
        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/top-gallery/gallery08.webp" alt="">
      </figure>
    </div>
  </section>
</main>
<?php get_footer() ?>
