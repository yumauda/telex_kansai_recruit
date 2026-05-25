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
        <article class="p-people-card">
          <figure class="p-people-card__image">
            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/people/yamada-saki.webp" alt="山田 紗季">
          </figure>
          <div class="p-people-card__body">
            <h2 class="p-people-card__name">山田 紗季</h2>
            <p class="p-people-card__meta">
              <span>2022年 新卒入社</span>
              <span>モバイル事業部 店長</span>
            </p>
          </div>
        </article>
        <article class="p-people-card">
          <figure class="p-people-card__image">
            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/people/kawamoto-daichi.webp" alt="川本 大地">
          </figure>
          <div class="p-people-card__body">
            <h2 class="p-people-card__name">川本 大地</h2>
            <p class="p-people-card__meta">
              <span>2021年 新卒入社</span>
              <span>モバイル事業部 店長</span>
            </p>
          </div>
        </article>
        <article class="p-people-card">
          <figure class="p-people-card__image">
            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/people/sakamoto-genki.webp" alt="坂本 元貴">
          </figure>
          <div class="p-people-card__body">
            <h2 class="p-people-card__name">坂本 元貴</h2>
            <p class="p-people-card__meta">
              <span>2024年 中途入社</span>
              <span>イベント事業部 リーダー</span>
            </p>
          </div>
        </article>
        <article class="p-people-card">
          <figure class="p-people-card__image">
            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/people/yano-kana.webp" alt="矢野 夏菜">
          </figure>
          <div class="p-people-card__body">
            <h2 class="p-people-card__name">矢野 夏菜</h2>
            <p class="p-people-card__meta">
              <span>2023年 中途入社</span>
              <span>モバイル事業部</span>
            </p>
          </div>
        </article>
        <article class="p-people-card">
          <figure class="p-people-card__image">
            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/people/nishikawa-honoka.webp" alt="西川 帆香">
          </figure>
          <div class="p-people-card__body">
            <h2 class="p-people-card__name">西川 帆香</h2>
            <p class="p-people-card__meta">
              <span>2025年 新卒入社</span>
              <span>モバイル事業部</span>
            </p>
          </div>
        </article>
        <article class="p-people-card">
          <figure class="p-people-card__image">
            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/people/muto-ren.webp" alt="武藤 蓮">
          </figure>
          <div class="p-people-card__body">
            <h2 class="p-people-card__name">武藤 蓮</h2>
            <p class="p-people-card__meta">
              <span>2025年 新卒入社</span>
              <span>モバイル事業部</span>
            </p>
          </div>
        </article>
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
