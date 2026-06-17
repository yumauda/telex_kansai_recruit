<?php
$args = wp_parse_args(
    $args ?? array(),
    array(
        'class' => '',
        'en'    => '',
        'title' => '',
    )
);

$class_name = 'c-lower-mv';

if (! empty($args['class'])) {
    $class_name .= ' ' . sanitize_html_class($args['class']);
}
?>
<section class="<?php echo esc_attr($class_name); ?>">
    <div class="c-lower-mv__content">
        <?php if (! empty($args['en'])) : ?>
            <p class="c-lower-mv__en js-page-main-title"><?php echo esc_html($args['en']); ?></p>
        <?php endif; ?>
        <?php if (! empty($args['title'])) : ?>
            <h1 class="c-lower-mv__title js-opacity-word"><?php echo esc_html($args['title']); ?></h1>
        <?php endif; ?>
    </div>
</section>
