<?php
/**
 * Import static Figma people interview data into WordPress posts.
 *
 * Run from theme root:
 * php scripts/import-people-posts.php
 */

$wp_load = dirname(__DIR__, 4) . '/wp-load.php';
if (! file_exists($wp_load)) {
    fwrite(STDERR, "wp-load.php not found: {$wp_load}\n");
    exit(1);
}

require_once $wp_load;
require_once ABSPATH . 'wp-admin/includes/file.php';
require_once ABSPATH . 'wp-admin/includes/media.php';
require_once ABSPATH . 'wp-admin/includes/image.php';
require_once ABSPATH . 'wp-admin/includes/taxonomy.php';

$theme_dir = get_template_directory();

$field_keys = array(
    'people_single_mv_image' => 'field_people_single_mv_image',
    'people_single_mv_label' => 'field_people_single_mv_label',
    'people_single_mv_title' => 'field_people_single_mv_title',
    'people_single_profile_image' => 'field_people_single_profile_image',
    'people_single_profile_name' => 'field_people_single_profile_name',
    'people_single_profile_meta' => 'field_people_single_profile_meta',
    'people_single_profile_text' => 'field_people_single_profile_text',
    'people_single_story_1_title' => 'field_people_single_story_1_title',
    'people_single_story_1_text' => 'field_people_single_story_1_text',
    'people_single_story_1_image' => 'field_people_single_story_1_image',
    'people_single_story_2_title' => 'field_people_single_story_2_title',
    'people_single_story_2_text' => 'field_people_single_story_2_text',
    'people_single_story_2_image' => 'field_people_single_story_2_image',
    'people_single_story_3_title' => 'field_people_single_story_3_title',
    'people_single_story_3_text' => 'field_people_single_story_3_text',
    'people_single_story_3_image' => 'field_people_single_story_3_image',
    'people_single_future_title' => 'field_people_single_future_title',
    'people_single_future_text' => 'field_people_single_future_text',
    'people_single_message_title' => 'field_people_single_message_title',
    'people_single_message_text' => 'field_people_single_message_text',
);

$posts = array(
    array(
        'post_title' => '西川 帆香',
        'post_name' => 'nishikawa-honoka',
        'category' => '社員インタビュー',
        'fields' => array(
            'people_single_mv_image' => '/src/images/people-single/nishikawa-mv-base.jpg',
            'people_single_mv_label' => '社員インタビュー',
            'people_single_mv_title' => "携帯を売るだけではない\n感謝を循環させる仕事",
            'people_single_profile_image' => '/src/images/people-single/nishikawa-profile.jpg',
            'people_single_profile_name' => '西川 帆香',
            'people_single_profile_meta' => "2025年 新卒入社\nモバイル事業部",
            'entry_date' => '2025年 新卒入社',
            'position' => 'モバイル事業部',
            'people_single_profile_text' => '大学を卒業後、新卒でテレックス関西に入社。現在はドコモショップ香里園店にて、フロントでの接客業務を中心に、店舗の顧客満足度（NPS）向上に向けた施策のリーダーも務める。社内SNSツール「RECOG」を積極的に活用し、店舗内の感謝の文化づくりに注力している。',
            'people_single_story_1_title' => "何をやるかではなく、誰とやるか。\n私の可能性を私以上に信じてくれた人との出会い",
            'people_single_story_1_text' => "就職活動をしていた頃の私は、実はやりたいことが明確に決まっていませんでした。そのため、業界を絞らずにさまざまな企業を見て回っていたのですが、自分の中で一つだけ譲れない軸がありました。それは、この人のために働きたいと思える人がいるかどうか、という点です。\n\n多くの企業が自社の魅力をアピールし、採用することを目的に私と接する中で、テレックス関西だけは違いました。リクルーターの高田さんは、私のやりたいことや向いていることを、まるで自分のことのように一生懸命に探してくれたのです。\n\nたとえその答えが自社でなくても構わないという、私を起点に考えてくれる真摯な姿勢に驚きました。就活生の一人にここまで時間とエネルギーを割いてくれる人がいる会社なら、きっと信頼できる。この人のような社会人になりたい。その直感が、テレックス関西への入社を決める決定打となりました。",
            'people_single_story_1_image' => '/src/images/people-single/nishikawa-story01.jpg',
            'people_single_story_2_title' => "携帯を売るだけではない。\nお客様との関係を超えた先にある、想像を超える感動",
            'people_single_story_2_text' => "現在はドコモショップのスタッフとして、機種変更やプランのご提案を担当しています。ただ手続きを進めるのではなく、お客様が普段どのように携帯を使われているのか、どんな生活を送られているのかを深く伺うことを大切にしています。\n\n単なる販売員とお客様という関係を超えて、一人の人間として向き合う。その結果、お客様からアンケートで心温まる長文のメッセージをいただいたり、ご家族全員の機種変更を任せていただいたりすることも増えました。一家の担当のように頼りにしていただける瞬間は、この仕事ならではの喜びです。\n\nまた、店舗運営の面では顧客満足度の指標であるNPSのリーダーも任されています。自ら目標として掲げた「誰よりも感謝をいただける人材になる」という想いを、自分一人で完結させるのではなく、店舗全体の文化として広げていく。新卒1年目からこうした責任ある役割に挑戦させてもらえる環境は、日々私を成長させてくれています。",
            'people_single_story_2_image' => '/src/images/people-single/nishikawa-story02.jpg',
            'people_single_story_3_title' => "弱さもさらけ出せる。\n挑戦を笑わず、愛を持って伴走してくれる仲間たち",
            'people_single_story_3_text' => "テレックス関西の最大の魅力は、頑張っている人を誰も馬鹿にしないこと、そして結果だけでなく過程をしっかりと見てくれることです。\n\n今の店舗に配属された当初、社内ツールを通じた感謝の文化を広めようとしましたが、最初はなかなか周囲の協力が得られず、心が折れそうになった時期もありました。そんな時、上司は単に共感するだけでなく、どうすればみんなに伝わるかを一緒に考え、具体的なアクションまで導いてくれました。\n\n自分の弱さを隠す必要がなく、ありのままの自分で挑戦できる。厳しくも愛のあるアドバイスをくれる先輩たちがいるからこそ、私は逃げずに前を向くことができました。ここで出会った人たちは、私の人生にとって大きな財産です。\n\n一方で、現状はまだ各店舗やキャリア間でのつながりが薄い部分もあると感じています。今後は店舗の垣根を超えて、成功事例や感謝の気持ちを共有し合えるような、さらに風通しの良い組織にしていきたいと考えています。",
            'people_single_story_3_image' => '/src/images/people-single/nishikawa-story03.jpg',
            'people_single_future_title' => '自分が輝くだけでなく後輩を輝かせられる存在へ',
            'people_single_future_text' => "これからは、お客様からも一緒に働く仲間からも「西川さんに任せてよかった」と言っていただける、真のオールラウンダーを目指していきたいです。\n\n入社1年目で、接客グランプリや新人賞といった素晴らしい賞をいただくことができましたが、そこで満足して終わりたくはありません。これからは、新しく入ってくる後輩たちが同じように、あるいはそれ以上に輝けるようサポートしていくことが私のミッションだと思っています。\n\n自分が培ってきた経験や接客のこだわりを惜しみなく伝え、後輩たちにも「仕事が楽しい」と感じてもらえるような影響力を持ちたい。テレックス関西の良さを体現し、次の世代へとバトンを繋いでいく存在になりたいです。",
            'people_single_message_title' => '就活生へのメッセージ',
            'people_single_message_text' => '就職活動は、自分のこれまでの人生やこれからの生き方について、これ以上ないほど深く考える貴重な時間です。もし今、やりたいことが見つからなくて悩んでいるのなら、焦る必要はありません。やりたいことは、環境や出会いによっていくらでも変わっていきます。だからこそ、何をしたいかよりも、自分はどうありたいか、どんな人と一緒に歩んでいきたいかという軸を大切にしてみてください。もしあなたが、人とのつながりや成長を大切にしたい、誰かのために本気になりたいと考えているなら、テレックス関西にはそれを受け止めてくれる温かい仲間がいます。ぜひ、ありのままのあなたで私たちの扉を叩いてください。一緒に働ける日を楽しみにしています。',
        ),
    ),
);

function telex_import_attachment_from_theme_file($relative_path, $post_id)
{
    global $theme_dir;

    $source_path = $theme_dir . $relative_path;
    if (! file_exists($source_path)) {
        throw new RuntimeException("Image not found: {$source_path}");
    }

    $existing = get_posts(array(
        'post_type' => 'attachment',
        'post_status' => 'inherit',
        'meta_key' => '_telex_import_source',
        'meta_value' => $relative_path,
        'fields' => 'ids',
        'posts_per_page' => 1,
    ));

    if (! empty($existing)) {
        return (int) $existing[0];
    }

    $tmp = wp_tempnam(basename($source_path));
    if (! $tmp || ! copy($source_path, $tmp)) {
        throw new RuntimeException("Could not prepare temp file: {$source_path}");
    }

    $file = array(
        'name' => basename($source_path),
        'type' => mime_content_type($source_path),
        'tmp_name' => $tmp,
        'error' => 0,
        'size' => filesize($source_path),
    );

    $attachment_id = media_handle_sideload($file, $post_id);
    if (is_wp_error($attachment_id)) {
        @unlink($tmp);
        throw new RuntimeException($attachment_id->get_error_message());
    }

    update_post_meta($attachment_id, '_telex_import_source', $relative_path);
    return (int) $attachment_id;
}

function telex_update_acf_meta($post_id, $field_name, $value, $field_keys)
{
    update_post_meta($post_id, $field_name, $value);
    if (isset($field_keys[$field_name])) {
        update_post_meta($post_id, '_' . $field_name, $field_keys[$field_name]);
    }
}

foreach ($posts as $post_data) {
    $existing = get_page_by_path($post_data['post_name'], OBJECT, 'post');
    $category_id = 0;
    if (! empty($post_data['category'])) {
        $category_id = wp_create_category($post_data['category']);
    }

    $postarr = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'post_title' => $post_data['post_title'],
        'post_name' => $post_data['post_name'],
        'post_content' => '',
    );

    if ($category_id) {
        $postarr['post_category'] = array($category_id);
    }

    if ($existing) {
        $postarr['ID'] = $existing->ID;
        $post_id = wp_update_post($postarr, true);
    } else {
        $post_id = wp_insert_post($postarr, true);
    }

    if (is_wp_error($post_id)) {
        fwrite(STDERR, "Failed importing {$post_data['post_title']}: " . $post_id->get_error_message() . "\n");
        continue;
    }

    foreach ($post_data['fields'] as $field_name => $value) {
        if (is_string($value) && str_starts_with($value, '/src/images/')) {
            $value = telex_import_attachment_from_theme_file($value, $post_id);
        }
        telex_update_acf_meta($post_id, $field_name, $value, $field_keys);
    }

    echo "Imported post #{$post_id}: {$post_data['post_title']} (" . get_permalink($post_id) . ")\n";
}
