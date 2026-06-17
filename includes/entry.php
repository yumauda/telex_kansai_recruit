<?php
$args = wp_parse_args(
    $args ?? array(),
    array(
        'title'       => '募集要項/エントリー',
        'lead'        => array(
            '履歴書や職務経歴書は不要で、カフェで話すような感覚でご参加いただけます。まずは話を聞いてみたいという方も',
            '大歓迎です。私たちのことを知ってもらうきっかけになれば嬉しいです。',
        ),
        'primary'     => array(
            'text' => '募集要項・エントリーはこちら',
            'url'  => home_url('/entry/'),
        ),
        'sub_links'   => array(),
        'image'       => get_template_directory_uri() . '/images/top-entry/entry.webp',
        'image_alt'   => '',
        'class'       => '',
    )
);

$content_class = 'p-top-entry__content';

if (! empty($args['class'])) {
    $content_class .= ' ' . sanitize_html_class($args['class']);
}
?>
<div class="<?php echo esc_attr($content_class); ?>">
    <div class="p-top-entry__body">
        <p class="p-top-entry__en js-page-main-title">Entry</p>
        <h2 class="p-top-entry__title"><?php echo esc_html($args['title']); ?></h2>
        <p class="p-top-entry__text">
            <?php foreach ((array) $args['lead'] as $line) : ?>
                <span><?php echo esc_html($line); ?></span>
            <?php endforeach; ?>
        </p>
        <a class="p-top-entry__link" href="<?php echo esc_url($args['primary']['url']); ?>">
            <span class="p-top-entry__link-text"><?php echo esc_html($args['primary']['text']); ?></span>
            <span class="p-top-entry__link-en">Entry</span>
        </a>
        <?php foreach ((array) $args['sub_links'] as $link) : ?>
            <a class="p-top-entry__link p-top-entry__link--sub" href="<?php echo esc_url($link['url']); ?>">
                <span class="p-top-entry__link-text"><?php echo esc_html($link['text']); ?></span>
                <span class="p-top-entry__link-en">Entry</span>
            </a>
        <?php endforeach; ?>
    </div>
    <figure class="p-top-entry__image">
        <img src="<?php echo esc_url($args['image']); ?>" alt="<?php echo esc_attr($args['image_alt']); ?>">
    </figure>
</div>
