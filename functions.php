<?php

/**
 * Functions
 */

/**
 * WordPress標準機能
 *
 * @codex https://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/add_theme_support
 */
function my_setup()
{
	add_theme_support('post-thumbnails'); /* アイキャッチ */
	add_theme_support('automatic-feed-links'); /* RSSフィード */
	add_theme_support(
		'html5',
		array( /* HTML5のタグで出力 */
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		)
	);
}
add_action('after_setup_theme', 'my_setup');

/**
 * CSSとJavaScriptの読み込み
 *
 * @codex https://wpdocs.osdn.jp/%E3%83%8A%E3%83%93%E3%82%B2%E3%83%BC%E3%82%B7%E3%83%A7%E3%83%B3%E3%83%A1%E3%83%8B%E3%83%A5%E3%83%BC
 */
function my_script_init()
{
	wp_enqueue_script('jquery', '//code.jquery.com/jquery-3.6.0.min.js', '', "1.0.1", true);

	wp_enqueue_style('my', get_template_directory_uri() . '/css/styles.css', array(), filemtime(get_theme_file_path('/css/styles.css')), 'all');
	wp_enqueue_script('gsap', '//cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js', '', "1.0.1", true);
	wp_enqueue_script('scrollTrigger', '//cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/ScrollTrigger.min.js', '', "1.0.1", true);
	wp_enqueue_script('js-gsap', get_template_directory_uri() . '/js/gsap.js', array('jquery'), filemtime(get_theme_file_path('/js/gsap.js')), true);

	if (is_front_page()) {
		wp_enqueue_style('swiper-css', get_template_directory_uri() . '/css/swiper-bundle.min.css', array(), filemtime(get_theme_file_path('/css/swiper-bundle.min.css')), 'all');
		wp_enqueue_script('js-swiper-bundle', get_template_directory_uri() . '/js/swiper.min.js', array('jquery'), filemtime(get_theme_file_path('/js/swiper.min.js')), true);
		wp_enqueue_script('js-swiper-init', get_template_directory_uri() . '/js/swiper.js', array('jquery'), filemtime(get_theme_file_path('/js/swiper.js')), true);
	}
	wp_enqueue_script('script', get_template_directory_uri() . '/js/script.js', array('jquery'), filemtime(get_theme_file_path('/js/script.js')), true);
}
add_action('wp_enqueue_scripts', 'my_script_init');

function telex_get_entry_form_cf7_markup()
{
	return <<<'EOT'
<div class="p-entry-form__input-area js-entry-form-input">
	<div class="p-entry-form__lead">
		<p>下記の項目にご入力のうえ、ボタンを押してください。</p>
		<p>追って担当より連絡いたします。</p>
	</div>
	<div class="p-entry-form__fields">
		<div class="p-entry-form__field">
			<label class="p-entry-form__label" for="entry-your-name">お名前</label>
			[text* your-name id:entry-your-name class:js-entry-form-field placeholder "名前"]
		</div>
		<div class="p-entry-form__field">
			<label class="p-entry-form__label" for="entry-tel">電話番号</label>
			[tel* your-tel id:entry-tel class:js-entry-form-field placeholder "000-0000-0000"]
		</div>
		<div class="p-entry-form__field">
			<label class="p-entry-form__label" for="entry-email">メールアドレス</label>
			[email* your-email id:entry-email class:js-entry-form-field placeholder "example@telex.co.jp"]
		</div>
		<div class="p-entry-form__field">
			<label class="p-entry-form__label" for="entry-applicant-type">新卒 / 中途</label>
			[select* applicant-type id:entry-applicant-type class:js-entry-form-field first_as_label "対象をお選びください" "新卒" "中途"]
		</div>
		<div class="p-entry-form__field">
			<label class="p-entry-form__label" for="entry-motivation">志望動機</label>
			[textarea motivation id:entry-motivation class:js-entry-form-field placeholder "お問い合わせ内容をこちらにご記入ください。"]
		</div>
		<div class="p-entry-form__privacy">
			<p class="p-entry-form__privacy-text"><a href="https://wbc-hr.com/about/privacypolicy/" target="_blank" rel="noopener">プライバシーポリシー</a>に同意いただける場合は「同意する」にチェックください*</p>
			[acceptance privacy-consent id:entry-privacy class:js-entry-form-field] 同意する [/acceptance]
		</div>
	</div>
	<div class="p-entry-form__button-wrap">
		<button type="button" class="p-entry-form__button js-entry-form-confirm-button" disabled>エントリーする</button>
	</div>
</div>

<div class="p-entry-form__confirm-area js-entry-form-confirm-area" aria-hidden="true">
	<h2 class="p-entry-form__confirm-title">入力内容確認</h2>
	<p class="p-entry-form__confirm-lead">以下の内容でよろしいですか？</p>
	<dl class="p-entry-form__confirm-list">
		<div class="p-entry-form__confirm-row">
			<dt>お名前</dt>
			<dd><span class="js-entry-form-confirm-value" data-confirm-for="your-name"></span></dd>
		</div>
		<div class="p-entry-form__confirm-row">
			<dt>電話番号</dt>
			<dd><span class="js-entry-form-confirm-value" data-confirm-for="your-tel"></span></dd>
		</div>
		<div class="p-entry-form__confirm-row">
			<dt>メールアドレス</dt>
			<dd><span class="js-entry-form-confirm-value" data-confirm-for="your-email"></span></dd>
		</div>
		<div class="p-entry-form__confirm-row">
			<dt>新卒 / 中途</dt>
			<dd><span class="js-entry-form-confirm-value" data-confirm-for="applicant-type"></span></dd>
		</div>
		<div class="p-entry-form__confirm-row">
			<dt>志望動機</dt>
			<dd><span class="js-entry-form-confirm-value" data-confirm-for="motivation"></span></dd>
		</div>
	</dl>
	<div class="p-entry-form__button-wrap p-entry-form__button-wrap--confirm">
		[submit class:p-entry-form__button "送信する"]
		<button type="button" class="p-entry-form__button p-entry-form__button--back js-entry-form-back-button">戻る</button>
	</div>
</div>

<div class="p-entry-form__thanks-area js-entry-form-thanks-area" aria-hidden="true">
	<h2 class="p-entry-form__thanks-title">送信完了</h2>
	<p class="p-entry-form__thanks-text">エントリーいただきありがとうございました。<br>追って担当より連絡いたします。</p>
</div>
EOT;
}

function telex_get_entry_form_post()
{
	$forms = get_posts(
		array(
			'post_type'      => 'wpcf7_contact_form',
			'post_status'    => 'any',
			'posts_per_page' => -1,
			'fields'         => 'ids',
			'no_found_rows'  => true,
		)
	);

	foreach ($forms as $form_id) {
		if (get_the_title($form_id) === 'エントリーフォーム') {
			return (int) $form_id;
		}
	}

	return 0;
}

function telex_ensure_entry_form_cf7()
{
	if (! post_type_exists('wpcf7_contact_form')) {
		return;
	}

	if (telex_get_entry_form_post()) {
		return;
	}

	$form_id = wp_insert_post(
		array(
			'post_type'    => 'wpcf7_contact_form',
			'post_status'  => 'publish',
			'post_title'   => 'エントリーフォーム',
			'post_content' => telex_get_entry_form_cf7_markup(),
		)
	);

	if (is_wp_error($form_id) || ! $form_id) {
		return;
	}

	update_post_meta($form_id, '_form', telex_get_entry_form_cf7_markup());
	update_post_meta(
		$form_id,
		'_mail',
		array(
			'active'             => true,
			'subject'            => '[_site_title] エントリーがありました',
			'sender'             => '[_site_title] <wordpress@' . wp_parse_url(home_url(), PHP_URL_HOST) . '>',
			'recipient'          => get_option('admin_email'),
			'body'               => "お名前: [your-name]\n電話番号: [your-tel]\nメールアドレス: [your-email]\n新卒 / 中途: [applicant-type]\n\n志望動機:\n[motivation]\n\n--\nこのメールは [_site_title] のエントリーフォームから送信されました。",
			'additional_headers' => 'Reply-To: [your-email]',
			'attachments'        => '',
			'use_html'           => false,
			'exclude_blank'      => false,
		)
	);
	update_post_meta($form_id, '_mail_2', array('active' => false));
	update_post_meta($form_id, '_messages', array());
	update_post_meta($form_id, '_additional_settings', '');
}
add_action('init', 'telex_ensure_entry_form_cf7', 30);

function telex_get_entry_form_shortcode()
{
	$form_id = telex_get_entry_form_post();

	if ($form_id) {
		return '[contact-form-7 id="' . $form_id . '" title="エントリーフォーム"]';
	}

	return '[contact-form-7 title="エントリーフォーム"]';
}







/**
 * メニューの登録
 *
 * @codex https://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/register_nav_menus
 */
// function my_menu_init() {
// 	register_nav_menus(
// 		array(
// 			'global'  => 'ヘッダーメニュー',
// 			'utility' => 'ユーティリティメニュー',
// 			'drawer'  => 'ドロワーメニュー',
// 		)
// 	);
// }
// add_action( 'init', 'my_menu_init' );
/**
 * メニューの登録
 *
 * 参考：https://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/register_nav_menus
 */


/**
 * ウィジェットの登録
 *
 * @codex http://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/register_sidebar
 */
// function my_widget_init() {
// 	register_sidebar(
// 		array(
// 			'name'          => 'サイドバー',
// 			'id'            => 'sidebar',
// 			'before_widget' => '<div id="%1$s" class="p-widget %2$s">',
// 			'after_widget'  => '</div>',
// 			'before_title'  => '<div class="p-widget__title">',
// 			'after_title'   => '</div>',
// 		)
// 	);
// }
// add_action( 'widgets_init', 'my_widget_init' );


/**
 * アーカイブタイトル書き換え
 *
 * @param string $title 書き換え前のタイトル.
 * @return string $title 書き換え後のタイトル.
 */
function my_archive_title($title)
{

	if (is_home()) { /* ホームの場合 */
		$title = 'ブログ';
	} elseif (is_category()) { /* カテゴリーアーカイブの場合 */
		$title = '' . single_cat_title('', false) . '';
	} elseif (is_tag()) { /* タグアーカイブの場合 */
		$title = '' . single_tag_title('', false) . '';
	} elseif (is_post_type_archive()) { /* 投稿タイプのアーカイブの場合 */
		$title = '' . post_type_archive_title('', false) . '';
	} elseif (is_tax()) { /* タームアーカイブの場合 */
		$title = '' . single_term_title('', false);
	} elseif (is_search()) { /* 検索結果アーカイブの場合 */
		$title = '「' . esc_html(get_query_var('s')) . '」の検索結果';
	} elseif (is_author()) { /* 作者アーカイブの場合 */
		$title = '' . get_the_author() . '';
	} elseif (is_date()) { /* 日付アーカイブの場合 */
		$title = '';
		if (get_query_var('year')) {
			$title .= get_query_var('year') . '年';
		}
		if (get_query_var('monthnum')) {
			$title .= get_query_var('monthnum') . '月';
		}
		if (get_query_var('day')) {
			$title .= get_query_var('day') . '日';
		}
	}
	return $title;
};
add_filter('get_the_archive_title', 'my_archive_title');


/**
 * 抜粋文の文字数の変更
 *
 * @param int $length 変更前の文字数.
 * @return int $length 変更後の文字数.
 */
function my_excerpt_length($length)
{
	return 80;
}
add_filter('excerpt_length', 'my_excerpt_length', 999);
/**
 * 抜粋文の省略記法の変更
 *
 * @param string $more 変更前の省略記法.
 * @return string $more 変更後の省略記法.
 */
function my_excerpt_more($more)
{
	return '...';
}
add_filter('excerpt_more', 'my_excerpt_more');

function telex_disable_comments()
{
	foreach (array('post', 'page') as $post_type) {
		remove_post_type_support($post_type, 'comments');
		remove_post_type_support($post_type, 'trackbacks');
	}
}
add_action('init', 'telex_disable_comments');

add_filter('comments_open', '__return_false', 20, 2);
add_filter('pings_open', '__return_false', 20, 2);
add_filter('comments_array', '__return_empty_array', 10, 2);
add_filter('pre_option_default_comment_status', function () {
	return 'closed';
});
add_filter('pre_option_default_ping_status', function () {
	return 'closed';
});

function telex_disable_comments_admin()
{
	remove_menu_page('edit-comments.php');
	remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
}
add_action('admin_menu', 'telex_disable_comments_admin');
add_action('wp_dashboard_setup', 'telex_disable_comments_admin');

function telex_disable_comments_admin_bar($wp_admin_bar)
{
	$wp_admin_bar->remove_node('comments');
}
add_action('admin_bar_menu', 'telex_disable_comments_admin_bar', 999);

function breadcrumb()
{
	$home = '<li class="c-breadcrumbs__list"><a class="c-breadcrumbs__link" href="' . get_bloginfo('url') . '" >HOME</a></li>';

	echo '<ul class="c-breadcrumbs__lists">';
	if (is_front_page()) {
		// トップページの場合
	} else if (is_category()) {
		// カテゴリページの場合
		$cat = get_queried_object();
		$cat_id = $cat->parent;
		$cat_list = array();
		while ($cat_id != 0) {
			$cat = get_category($cat_id);
			$cat_link = get_category_link($cat_id);
			array_unshift($cat_list, '<li class="c-breadcrumbs__list"><a class="c-breadcrumbs__link" href="' . $cat_link . '">' . $cat->name . '</a></li>');
			$cat_id = $cat->parent;
		}
		echo $home;
		echo '<li class="c-breadcrumbs__list c-breadcrumbs__arrow"><</li>';
		foreach ($cat_list as $value) {
			echo $value;
		}
		the_archive_title('<li class="c-breadcrumbs__list">', '</li>');
	} else if (is_archive()) {
		// 月別アーカイブ・タグページの場合
		echo $home;
		echo '<li class="c-breadcrumbs__list c-breadcrumbs__arrow"><</li>';
		the_archive_title('<li class="c-breadcrumbs__list">', '</li>');
	} else if (is_home()) {
		// 月別アーカイブ・タグページの場合
		echo $home;
		echo '<li class="c-breadcrumbs__list c-breadcrumbs__arrow"><</li>';
		the_archive_title('<li class="c-breadcrumbs__list">', '</li>');
	} else if (is_single()) {
		// 投稿ページの場合
		echo $home;
		echo '<li class="c-breadcrumbs__list c-breadcrumbs__arrow"><</li>';
		echo "<a href=" . "/blog-all" . ">ブログ</a>";
		echo '<li class="c-breadcrumbs__list c-breadcrumbs__arrow c-breadcrumbs__arrow--2"><</li>';
		the_title('<li class="c-breadcrumbs__list c-breadcrumbs__list--mt2">', '</li>');
	} else if (is_page()) {
		// 固定ページの場合
		echo $home;
		echo '<li class="c-breadcrumbs__list c-breadcrumbs__arrow"><</li>';
		the_title('<li class="c-breadcrumbs__list">', '</li>');
	} else if (is_search()) {
		// 検索ページの場合
		echo $home;
		echo '<li class="c-breadcrumbs__list c-breadcrumbs__arrow"><</li>';
		echo '<li class="c-breadcrumbs__list">「' . get_search_query() . '」の検索結果</li>';
	} else if (is_404()) {
		// 404ページの場合
		echo $home;
		echo '<li class="c-breadcrumbs__list c-breadcrumbs__arrow"><</li>';
		echo '<li class="c-breadcrumbs__list">ページが見つかりません</li>';
	}
	echo "</ul>";
}

// アーカイブの余計なタイトルを削除
add_filter('get_the_archive_title', function ($title) {
	if (is_category()) {
		$title = single_cat_title('', false);
	} elseif (is_tag()) {
		$title = single_tag_title('', false);
	} elseif (is_month()) {
		$title = single_month_title('', false);
	}
	return $title;
});

add_filter('wpcf7_autop_or_not', '__return_false');

// titleタグの削除
function remove_title_tag()
{
	remove_action('wp_head', '_wp_render_title_tag', 1);
}
add_action('init', 'remove_title_tag');


// 管理画面上「投稿」の名前変更
function Change_menulabel()
{
	global $menu;
	global $submenu;
	$name = '人を知る';
	$menu[5][0] = $name;
	$submenu['edit.php'][5][0] = $name . '一覧';
	$submenu['edit.php'][10][0] = '新しい' . $name;
}
function Change_objectlabel()
{
	global $wp_post_types;
	$name = '人を知る';
	$labels = &$wp_post_types['post']->labels;
	$labels->name = $name;
	$labels->singular_name = $name;
	$labels->add_new = _x('追加', $name);
	$labels->add_new_item = $name . 'の新規追加';
	$labels->edit_item = $name . 'の編集';
	$labels->new_item = '新規' . $name;
	$labels->view_item = $name . 'を表示';
	$labels->search_items = $name . 'を検索';
	$labels->not_found = $name . 'が見つかりませんでした';
	$labels->not_found_in_trash = 'ゴミ箱に' . $name . 'は見つかりませんでした';
}
add_action('init', 'Change_objectlabel');
add_action('admin_menu', 'Change_menulabel');

function telex_people_post_permalink($permalink, $post)
{
	if ($post->post_type !== 'post' || $post->post_status === 'auto-draft') {
		return $permalink;
	}

	return home_url('/people/' . $post->post_name . '/');
}
add_filter('post_link', 'telex_people_post_permalink', 10, 2);

function telex_people_post_rewrite_rules()
{
	add_rewrite_rule('^people/([^/]+)/?$', 'index.php?name=$matches[1]', 'top');
}
add_action('init', 'telex_people_post_rewrite_rules');

function telex_people_flush_rewrite_rules_once()
{
	if (get_option('telex_people_rewrite_flushed') === '1') {
		return;
	}

	flush_rewrite_rules(false);
	update_option('telex_people_rewrite_flushed', '1');
}
add_action('init', 'telex_people_flush_rewrite_rules_once', 20);

//ログイン画面のロゴ変更
function login_logo()
{
	echo '<style type="text/css">
	  #login h1 a {
		background: url(' . get_template_directory_uri() . '/images/common/login_logo.png) no-repeat top center;
		background-size:100% auto;
		width: 70px; //ログインの幅
		height: 70px; //ログインの高さ
	  }
	  body{
		background: url(' . get_template_directory_uri() . '/images/mv/mv-bg.webp) no-repeat top center;
		background-color:rgba(255,255,255,0.5);
		background-blend-mode:lighten;
		background-size: cover;
		
	  }
	</style>';
}
add_action('login_head', 'login_logo');

function custom_pagination()
{
	global $wp_query;
	$big = 999999999;
	$pages = paginate_links(array(
		'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
		'format' => '?paged=%#%',
		'current' => max(1, get_query_var('paged')),
		'total' => $wp_query->max_num_pages,
		'type'  => 'array',
		'prev_next'   => true,
		'prev_text'   => '<',
		'next_text'   => '>',
	));
	if (is_array($pages)) {
		$paged = (get_query_var('paged') == 0) ? 1 : get_query_var('paged');
		echo '<div class="p-work__pager p-pager"><ul class="p-pager__lists">';
		foreach ($pages as $page) {
			echo "<li class='p-pager__list'>$page</li>";
		}
		echo '</ul></div>';
	}
}

function exclude_multiple_categories_from_homepage($query)
{
	if ($query->is_home() && $query->is_main_query()) {
		$query->set('cat', '-1,-8,-9,-10');
	}
}
add_action('pre_get_posts', 'exclude_multiple_categories_from_homepage');

add_filter('wpcf7_validate_text', 'custom_hiragana_validation_filter', 20, 2);
add_filter('wpcf7_validate_text*', 'custom_hiragana_validation_filter', 20, 2);

function custom_hiragana_validation_filter($result, $tag)
{
	if ('your-hiragana-field' == $tag->name) {
		$value = isset($_POST[$tag->name]) ? trim(wp_unslash(strtr((string)$_POST[$tag->name], "\n", " "))) : '';

		if (!preg_match("/^[ぁ-ん]+$/u", $value)) {
			$result->invalidate($tag, "ひらがなで入力してください。");
		}
	}

	return $result;
}

//投稿タイプの作成(カスタム投稿)
// register_post_type(
// 	'allcolumn',
// 	array(
// 		'labels' => array(
// 			'name' => __('コラム'),
// 			'singular_name' => __('コラム')
// 		),
// 		'supports' => array(
// 			'title',
// 			'editor',
// 			'author',
// 			'thumbnail',
// 			'excerpt',
// 			'custom-fields',
// 			'comments',
// 			'categories'
// 		),
// 		'public' => true,
// 		'has_archive' => true,
// 		'show_in_rest' => true,
// 	)
// );
// register_taxonomy('allcolumn_category', array('allcolumn'), array(
// 	'hierarchical' => true,
// 	'label' => 'カテゴリー',
// 	'show_ui' => true,
// 	'public' => true
// ));
// register_taxonomy('allcolumn_tag', 'allcolumn', array(
// 	'hierarchical' => false,
// 	'label' => 'タグ',
// 	'show_ui' => true,
// 	'public' => true,
// 	'show_in_rest' => true,
// ));

add_filter('body_class', function ($classes) {
	if (is_front_page()) {
		$classes[] = 'home';
	}
	return $classes;
});

/**
 * WebP画像のサポートを追加
 */
function enable_webp_upload($mimes)
{
	$mimes['webp'] = 'image/webp';
	return $mimes;
}
add_filter('mime_types', 'enable_webp_upload');

// WebP画像のプレビュー表示を有効化
function webp_is_displayable($result, $path)
{
	if ($result === false) {
		$displayable_image_types = array(IMAGETYPE_WEBP);
		$info = @getimagesize($path);

		if (empty($info)) {
			$result = false;
		} elseif (!in_array($info[2], $displayable_image_types)) {
			$result = false;
		} else {
			$result = true;
		}
	}

	return $result;
}
add_filter('file_is_displayable_image', 'webp_is_displayable', 10, 2);

/**
 * 動画ギャラリー投稿タイプ
 */
function telex_register_movie_post_type()
{
	register_post_type(
		'movie',
		array(
			'labels' => array(
				'name' => '動画ギャラリー',
				'singular_name' => '動画',
				'add_new' => '新規追加',
				'add_new_item' => '動画を追加',
				'edit_item' => '動画を編集',
				'new_item' => '新規動画',
				'view_item' => '動画を表示',
				'search_items' => '動画を検索',
				'not_found' => '動画が見つかりませんでした',
				'not_found_in_trash' => 'ゴミ箱に動画は見つかりませんでした',
				'all_items' => '動画一覧',
				'menu_name' => '動画ギャラリー',
			),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array(
				'slug' => 'movie',
				'with_front' => false,
			),
			'menu_position' => 6,
			'menu_icon' => 'dashicons-video-alt3',
			'supports' => array('title', 'thumbnail', 'page-attributes'),
			'show_in_rest' => true,
		)
	);

	register_post_meta(
		'movie',
		'telex_movie_url',
		array(
			'type' => 'string',
			'single' => true,
			'sanitize_callback' => 'esc_url_raw',
			'show_in_rest' => true,
			'auth_callback' => function () {
				return current_user_can('edit_posts');
			},
		)
	);
}
add_action('init', 'telex_register_movie_post_type');

function telex_movie_flush_rewrite_rules_once()
{
	if (get_option('telex_movie_rewrite_flushed') === '1') {
		return;
	}

	flush_rewrite_rules(false);
	update_option('telex_movie_rewrite_flushed', '1');
}
add_action('init', 'telex_movie_flush_rewrite_rules_once', 20);

function telex_movie_add_meta_box()
{
	add_meta_box('telex_movie_url', '動画リンク', 'telex_movie_url_meta_box', 'movie', 'normal', 'high');
}
add_action('add_meta_boxes', 'telex_movie_add_meta_box');

function telex_movie_url_meta_box($post)
{
	$movie_url = get_post_meta($post->ID, 'telex_movie_url', true);
	wp_nonce_field('telex_movie_url_save', 'telex_movie_url_nonce');
?>
	<p>
		<label for="telex_movie_url_field">YouTubeなどの動画URL</label>
	</p>
	<input id="telex_movie_url_field" class="widefat" type="url" name="telex_movie_url" value="<?php echo esc_attr($movie_url); ?>" placeholder="https://www.youtube.com/watch?v=..." />
	<p class="description">一覧ページではこのURLへリンクします。アイキャッチ画像を設定するとサムネイルとして優先表示されます。</p>
<?php
}

function telex_movie_save_meta($post_id)
{
	if (!isset($_POST['telex_movie_url_nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['telex_movie_url_nonce'])), 'telex_movie_url_save')) {
		return;
	}

	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return;
	}

	if (!current_user_can('edit_post', $post_id)) {
		return;
	}

	if (isset($_POST['telex_movie_url'])) {
		update_post_meta($post_id, 'telex_movie_url', esc_url_raw(wp_unslash($_POST['telex_movie_url'])));
	}
}
add_action('save_post_movie', 'telex_movie_save_meta');

function telex_movie_youtube_id($url)
{
	$parts = wp_parse_url($url);

	if (empty($parts['host'])) {
		return '';
	}

	$host = preg_replace('/^www\./', '', strtolower($parts['host']));

	if ($host === 'youtu.be' && !empty($parts['path'])) {
		return trim($parts['path'], '/');
	}

	if (in_array($host, array('youtube.com', 'm.youtube.com', 'music.youtube.com'), true)) {
		if (!empty($parts['query'])) {
			parse_str($parts['query'], $query);
			if (!empty($query['v'])) {
				return sanitize_text_field($query['v']);
			}
		}

		if (!empty($parts['path']) && preg_match('#/(embed|shorts)/([^/?]+)#', $parts['path'], $matches)) {
			return sanitize_text_field($matches[2]);
		}
	}

	return '';
}

function telex_movie_thumbnail_url($post_id)
{
	if (has_post_thumbnail($post_id)) {
		return get_the_post_thumbnail_url($post_id, 'large');
	}

	$movie_url = get_post_meta($post_id, 'telex_movie_url', true);
	$youtube_id = $movie_url ? telex_movie_youtube_id($movie_url) : '';

	if ($youtube_id) {
		return 'https://img.youtube.com/vi/' . rawurlencode($youtube_id) . '/hqdefault.jpg';
	}

	return '';
}

function telex_movie_archive_query($query)
{
	if (!is_admin() && $query->is_main_query() && $query->is_post_type_archive('movie')) {
		$query->set('posts_per_page', 6);
		$query->set('orderby', array('menu_order' => 'ASC', 'date' => 'DESC'));
	}
}
add_action('pre_get_posts', 'telex_movie_archive_query');
