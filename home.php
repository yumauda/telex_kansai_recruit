<?php get_header(); ?>
<main>
  <section class="p-people-mv">
    <div class="p-people-mv__content">
      <p class="p-people-mv__en">People</p>
      <h1 class="p-people-mv__title">人を知る</h1>
    </div>
  </section>

  <section class="p-people-list">
    <div class="l-inner">
      <div class="p-people-list__cards">
        <?php if (have_posts()) : ?>
          <?php while (have_posts()) : ?>
            <?php the_post(); ?>
            <?php
            $card_image_id = get_post_meta(get_the_ID(), 'people_single_profile_image', true);
            $card_image = $card_image_id ? wp_get_attachment_image_url((int) $card_image_id, 'large') : '';
            $entry_date = function_exists('get_field') ? get_field('entry_date') : get_post_meta(get_the_ID(), 'entry_date', true);
            $position = function_exists('get_field') ? get_field('position') : get_post_meta(get_the_ID(), 'position', true);
            ?>
            <article class="p-people-card">
              <a class="p-people-card__link" href="<?php the_permalink(); ?>">
                <figure class="p-people-card__image">
                  <img src="<?php echo esc_url($card_image ?: get_template_directory_uri() . '/images/people/yamada-saki.webp'); ?>" alt="<?php the_title_attribute(); ?>">
                </figure>
                <div class="p-people-card__body">
                  <h2 class="p-people-card__name"><?php the_title(); ?></h2>
                  <p class="p-people-card__meta">
                    <?php if ($entry_date) : ?>
                      <span><?php echo esc_html($entry_date); ?></span>
                    <?php endif; ?>
                    <?php if ($position) : ?>
                      <span><?php echo esc_html($position); ?></span>
                    <?php endif; ?>
                  </p>
                </div>
              </a>
            </article>
          <?php endwhile; ?>
        <?php endif; ?>

        
      </div>
    </div>
  </section>

  <section class="p-message-entry">
    <div class="l-inner">
      <?php get_template_part('includes/entry'); ?>
    </div>
  </section>
</main>
<?php get_footer(); ?>
