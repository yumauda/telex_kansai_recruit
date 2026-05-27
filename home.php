<?php get_header(); ?>
<?php
if (! function_exists('telex_people_archive_image_url')) {
  function telex_people_archive_image_url($post_id)
  {
    $image = function_exists('get_field') ? get_field('people_archive_thumbnail_image', $post_id) : get_post_meta($post_id, 'people_archive_thumbnail_image', true);

    if (is_array($image) && ! empty($image['url'])) {
      return $image['url'];
    }

    if (is_numeric($image)) {
      $image_url = wp_get_attachment_image_url((int) $image, 'large');
      if ($image_url) {
        return $image_url;
      }
    }

    $fallback_image = function_exists('get_field') ? get_field('people_single_profile_image', $post_id) : get_post_meta($post_id, 'people_single_profile_image', true);

    if (is_array($fallback_image) && ! empty($fallback_image['url'])) {
      return $fallback_image['url'];
    }

    if (is_numeric($fallback_image)) {
      $fallback_url = wp_get_attachment_image_url((int) $fallback_image, 'large');
      if ($fallback_url) {
        return $fallback_url;
      }
    }

    return get_template_directory_uri() . '/images/people/yamada-saki.webp';
  }
}

if (! function_exists('telex_people_archive_meta_lines')) {
  function telex_people_archive_meta_lines($post_id)
  {
    $entry_date = function_exists('get_field') ? get_field('entry_date', $post_id) : get_post_meta($post_id, 'entry_date', true);
    $position = function_exists('get_field') ? get_field('position', $post_id) : get_post_meta($post_id, 'position', true);
    $lines = array_filter(array($entry_date, $position));

    if (! empty($lines)) {
      return $lines;
    }

    $profile_meta = function_exists('get_field') ? get_field('people_single_profile_meta', $post_id) : get_post_meta($post_id, 'people_single_profile_meta', true);

    if (! $profile_meta) {
      return array();
    }

    return array_filter(array_map('trim', preg_split('/\r\n|\r|\n/', $profile_meta)));
  }
}
?>
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
            $card_image = telex_people_archive_image_url(get_the_ID());
            $meta_lines = telex_people_archive_meta_lines(get_the_ID());
            ?>
            <article class="p-people-card">
              <a class="p-people-card__link" href="<?php the_permalink(); ?>">
                <figure class="p-people-card__image">
                  <img src="<?php echo esc_url($card_image); ?>" alt="<?php the_title_attribute(); ?>">
                </figure>
                <div class="p-people-card__body">
                  <h2 class="p-people-card__name"><?php the_title(); ?></h2>
                  <?php if (! empty($meta_lines)) : ?>
                    <p class="p-people-card__meta">
                      <?php foreach ($meta_lines as $meta_line) : ?>
                        <span><?php echo esc_html($meta_line); ?></span>
                      <?php endforeach; ?>
                    </p>
                  <?php endif; ?>
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
