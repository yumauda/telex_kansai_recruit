<?php get_header(); ?>
<main class="p-movie">
  <section class="p-movie-mv">
    <div class="p-movie-mv__content">
      <p class="p-movie-mv__en js-page-main-title">Movie</p>
      <h1 class="p-movie-mv__title js-opacity-word">動画ギャラリー</h1>
    </div>
  </section>

  <section class="p-movie-list">
    <div class="l-inner">
      <?php if (have_posts()) : ?>
        <div class="p-movie-list__cards">
          <?php while (have_posts()) : ?>
            <?php the_post(); ?>
            <?php
            $movie_url = get_post_meta(get_the_ID(), 'telex_movie_url', true);
            $thumbnail_url = telex_movie_thumbnail_url(get_the_ID());
            ?>
            <article class="p-movie-card">
              <?php if ($movie_url) : ?>
                <a class="p-movie-card__link" href="<?php echo esc_url($movie_url); ?>" target="_blank" rel="noopener noreferrer">
              <?php else : ?>
                <div class="p-movie-card__link p-movie-card__link--disabled">
              <?php endif; ?>
                  <figure class="p-movie-card__image">
                    <?php if ($thumbnail_url) : ?>
                      <img src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php the_title_attribute(); ?>" loading="lazy" decoding="async">
                    <?php else : ?>
                      <span class="p-movie-card__placeholder">Movie</span>
                    <?php endif; ?>
                    <?php if ($movie_url) : ?>
                      <span class="p-movie-card__play" aria-hidden="true"></span>
                    <?php endif; ?>
                  </figure>
                  <h2 class="p-movie-card__title"><?php the_title(); ?></h2>
              <?php if ($movie_url) : ?>
                </a>
              <?php else : ?>
                </div>
              <?php endif; ?>
            </article>
          <?php endwhile; ?>
        </div>

        <?php
        global $wp_query;
        $current_page = max(1, get_query_var('paged'));
        $total_pages = (int) $wp_query->max_num_pages;
        $pagination_links = paginate_links(array(
          'current' => $current_page,
          'total' => $total_pages,
          'type' => 'array',
          'prev_next' => true,
          'prev_text' => '<',
          'next_text' => '>',
        ));
        ?>
        <?php if ($total_pages > 1 && is_array($pagination_links)) : ?>
          <nav class="p-movie-pagination" aria-label="動画ギャラリーのページ送り">
            <span class="p-movie-pagination__status"><?php echo esc_html($current_page . '/' . $total_pages); ?></span>
            <ul class="p-movie-pagination__list">
              <?php foreach ($pagination_links as $pagination_link) : ?>
                <li class="p-movie-pagination__item"><?php echo wp_kses_post($pagination_link); ?></li>
              <?php endforeach; ?>
            </ul>
          </nav>
        <?php endif; ?>
      <?php else : ?>
        <p class="p-movie-list__empty">現在、公開中の動画はありません。</p>
      <?php endif; ?>
    </div>
  </section>

  <section class="p-message-entry">
    <div class="l-inner">
      <?php get_template_part('includes/entry'); ?>
    </div>
  </section>
</main>
<?php get_footer(); ?>
