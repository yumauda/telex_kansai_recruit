<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <meta name="format-detection" content="telephone=no" />
    <!-- meta情報 -->
    <?php
    $site_name = 'テレックス関西 採用サイト';
    $site_description = 'テレックス関西の採用サイトです。モバイル販売・法人営業・イベント事業で、未来のあたりまえをともにつくる仲間を募集しています。仕事、制度、キャリア、社員の声を紹介します。';
    $page_title = $site_name;

    if (is_front_page() || is_home()) {
        $page_title = 'テレックス関西 採用サイト｜未来のあたりまえをつくる仲間を募集';
    } elseif (is_404()) {
        $page_title = 'ページが見つかりません｜' . $site_name;
    } elseif (is_archive()) {
        $page_title = wp_strip_all_tags(get_the_archive_title()) . '｜' . $site_name;
    } elseif (is_singular()) {
        $page_title = get_the_title() . '｜' . $site_name;
    }

    $og_type = (is_front_page() || is_home()) ? 'website' : 'article';
    $og_url = home_url($_SERVER['REQUEST_URI'] ?? '/');
    $og_image = get_template_directory_uri() . '/images/common/ogp.png';
    ?>
    <title><?php echo esc_html($page_title); ?></title>
    <meta name="description" content="<?php echo esc_attr($site_description); ?>" />
    <meta name="keywords" content="テレックス関西,採用,求人,新卒採用,中途採用,モバイル販売,法人営業,イベント事業,関西" />
    <meta property="og:title" content="<?php echo esc_attr($page_title); ?>" />
    <meta property="og:type" content="<?php echo esc_attr($og_type); ?>">
    <meta property="og:url" content="<?php echo esc_url($og_url); ?>">
    <meta property="og:image" content="<?php echo esc_url($og_image); ?>" />
    <meta property="og:site_name" content="<?php echo esc_attr($site_name); ?>" />
    <meta property="og:description" content="<?php echo esc_attr($site_description); ?>" />
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:image" content="<?php echo esc_url($og_image); ?>">

    <!-- ogp -->
    <!-- ファビコン -->
    <link rel="icon" href="<?php echo esc_url(get_template_directory_uri()); ?>/images/common/favicon.svg" type="image/svg+xml" />
    <link rel="icon" href="<?php echo esc_url(get_template_directory_uri()); ?>/images/common/favicon-32x32.png" sizes="32x32" type="image/png" />
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo esc_url(get_template_directory_uri()); ?>/images/common/apple-touch-icon.png">
    <!-- css -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400&family=Noto+Sans+JP:wght@400;500;700&family=Noto+Serif+JP:wght@400;600&family=Urbanist:wght@400;500;600&display=swap" rel="stylesheet">
    <?php if (is_404()) : ?>
        <meta http-equiv="refresh" content=" 3; url=<?php echo esc_url(home_url("/")); ?>">
    <?php endif; ?>
    <?php wp_head() ?>
</head>

<body <?php body_class(); ?>>
    <header class="l-header p-header">
        <div class="l-inner">
            <div class="p-header__content">
                <a class="p-header__brand" href="<?php echo esc_url(home_url('/')); ?>" aria-label="Telex Kansai Recruit Site">
                    <img class="p-header__award" src="<?php echo esc_url(get_template_directory_uri()); ?>/images/header/innovation-logo.png" alt="">
                    <span class="p-header__brand-copy">
                        <span class="p-header__brand-name">Telex Kansai</span>
                        <span class="p-header__brand-sub">Recruit Site</span>
                    </span>
                </a>
                <nav class="p-header__nav" aria-label="グローバルナビゲーション">
                    <ul class="p-header__nav-list">
                        <li class="p-header__nav-item">
                            <a class="p-header__nav-link" href="<?php echo esc_url(home_url('/message/')); ?>">
                                <span class="p-header__nav-ja">採用メッセージ</span>
                                <span class="p-header__nav-en">Message</span>
                            </a>
                        </li>
                        <li class="p-header__nav-item">
                            <a class="p-header__nav-link" href="<?php echo esc_url(home_url('/advantage/')); ?>">
                                <span class="p-header__nav-ja">テレックスの強み</span>
                                <span class="p-header__nav-en">Advantage</span>
                            </a>
                        </li>
                        <li class="p-header__nav-item">
                            <a class="p-header__nav-link" href="<?php echo esc_url(home_url('/data/')); ?>">
                                <span class="p-header__nav-ja">数字で見る</span>
                                <span class="p-header__nav-en">Data</span>
                            </a>
                        </li>
                        <li class="p-header__nav-item p-header__nav-item--mega">
                            <button class="p-header__nav-link p-header__nav-link--button" type="button" aria-haspopup="true">
                                <span class="p-header__nav-ja">仕事を知る</span>
                                <span class="p-header__nav-en">Work</span>
                            </button>
                            <div class="p-header__mega" aria-label="仕事を知るメニュー">
                                <a class="p-header__mega-link" href="<?php echo esc_url(home_url('/mobile_business/')); ?>">
                                    <span class="p-header__mega-title">モバイル事業部</span>
                                    <span class="p-header__mega-en">Mobile business</span>
                                </a>
                                <a class="p-header__mega-link" href="<?php echo esc_url(home_url('/corporate_sales/')); ?>">
                                    <span class="p-header__mega-title">法人営業</span>
                                    <span class="p-header__mega-en">Corporate sales</span>
                                </a>
                                <a class="p-header__mega-link" href="<?php echo esc_url(home_url('/event_business/')); ?>">
                                    <span class="p-header__mega-title">イベント事業部</span>
                                    <span class="p-header__mega-en">Event business</span>
                                </a>
                            </div>
                        </li>
                        <li class="p-header__nav-item">
                            <a class="p-header__nav-link" href="<?php echo esc_url(home_url('/people/')); ?>">
                                <span class="p-header__nav-ja">人を知る</span>
                                <span class="p-header__nav-en">People</span>
                            </a>
                        </li>
                        <li class="p-header__nav-item p-header__nav-item--mega">
                            <button class="p-header__nav-link p-header__nav-link--button" type="button" aria-haspopup="true">
                                <span class="p-header__nav-ja">クロストーク</span>
                                <span class="p-header__nav-en">Cross talk</span>
                            </button>
                            <div class="p-header__mega" aria-label="クロストークメニュー">
                                <a class="p-header__mega-link" href="<?php echo esc_url(home_url('/crosstalk_event/')); ?>">
                                    <span class="p-header__mega-title">イノベーションセレモニー対談</span>
                                    <span class="p-header__mega-en">Innovation Ceremony</span>
                                </a>
                                <a class="p-header__mega-link" href="<?php echo esc_url(home_url('/crosstalk_unofficial-person/')); ?>">
                                    <span class="p-header__mega-title">内定者対談</span>
                                    <span class="p-header__mega-en">Prospective Employees</span>
                                </a>
                            </div>
                        </li>
                        <li class="p-header__nav-item p-header__nav-item--mega">
                            <button class="p-header__nav-link p-header__nav-link--button" type="button" aria-haspopup="true">
                                <span class="p-header__nav-ja">キャリア/働く環境</span>
                                <span class="p-header__nav-en">Career / Environment</span>
                            </button>
                            <div class="p-header__mega" aria-label="キャリア/働く環境メニュー">
                                <a class="p-header__mega-link" href="<?php echo esc_url(home_url('/career/')); ?>">
                                    <span class="p-header__mega-title">キャリア</span>
                                    <span class="p-header__mega-en">Career</span>
                                </a>
                                <a class="p-header__mega-link" href="<?php echo esc_url(home_url('/environment/')); ?>">
                                    <span class="p-header__mega-title">働く環境</span>
                                    <span class="p-header__mega-en">Environment</span>
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <a class="p-header__entry" href="#">
                    <span class="p-header__entry-text">募集要項・エントリー</span>
                </a>
            </div>
        </div>
    </header>
