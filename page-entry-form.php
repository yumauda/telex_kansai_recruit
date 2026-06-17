<?php get_header(); ?>
<main>
    <?php
    get_template_part(
        'includes/lower-mv',
        null,
        array(
            'en'    => 'Entry form',
            'title' => 'エントリーフォーム',
        )
    );
    ?>

    <section class="p-entry-form">
        <div class="l-inner">
            <div class="p-entry-form__inner" id="entry-form">
                <?php
                if (shortcode_exists('contact-form-7')) {
                    $entry_forms = get_posts(
                        array(
                            'post_type'      => 'wpcf7_contact_form',
                            'post_status'    => 'publish',
                            'title'          => 'エントリーフォーム',
                            'posts_per_page' => 1,
                            'fields'         => 'ids',
                            'no_found_rows'  => true,
                        )
                    );

                    if (! empty($entry_forms)) {
                        echo do_shortcode('[contact-form-7 id="' . (int) $entry_forms[0] . '" title="エントリーフォーム"]');
                    } else {
                        echo '<p class="p-entry-form__plugin-message">管理画面で「エントリーフォーム」というContact Form 7フォームを作成してください。</p>';
                    }
                } else {
                    echo '<p class="p-entry-form__plugin-message">Contact Form 7を有効化すると、エントリーフォームが表示されます。</p>';
                }
                ?>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>
