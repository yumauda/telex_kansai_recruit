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
                    echo do_shortcode(telex_get_entry_form_shortcode());
                } else {
                    echo '<p class="p-entry-form__plugin-message">Contact Form 7を有効化すると、エントリーフォームが表示されます。</p>';
                }
                ?>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>
