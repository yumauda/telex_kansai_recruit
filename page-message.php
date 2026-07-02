<?php get_header(); ?>
<main>
  <section class="p-message-mv">
    <picture class="p-message-mv__image">
      <source srcset="<?php echo esc_url(get_template_directory_uri()); ?>/images/message/message-main.webp" type="image/webp">
      <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/message/message-main.jpg" alt="">
    </picture>
    <div class="p-message-mv__content">
      <p class="p-message-mv__en js-page-main-title">Message</p>
      <h1 class="p-message-mv__title js-opacity-word">採用メッセージ</h1>
    </div>
  </section>
  <section class="p-message-statement">
    <div class="l-inner">
      <div class="p-message-statement__content">
        <h2 class="p-message-statement__title">
          <span class="js-opacity-word">挑戦を通して自身の人生を</span>
          <span class="js-opacity-word">切り拓いてほしい。</span>
        </h2>
        <div class="p-message-statement__body">
          <p class="js-opacity-word">会社を経営してきて、一つ確信していることがあります。それは、人は人の中で育つ、ということです。どんな人たちに囲まれて、どんな話をしながら、どんな仕事を一緒にしてきたか。その過程で人生は大きく変わると思っています。</p>
          <p class="js-opacity-word">だからこそテレックス関西が一番大切にしているのは、シンプルに、人の成長なのです。その成長は本人の人生を豊かにするだけではなく、届けた先の誰かの生活をも豊かにしていく。「自分のため」と「誰かのため」が別々にあるのではなく、一つになっている。そういう働き方が、この会社にはあります。</p>
          <p class="js-opacity-word">ですから、入り口でのスキルや経験はそれほど問いません。それよりも、一人の人間として「これっておかしくないか」「もっとこうだったらいいのに」と感じられる感性と、それを一人で抱え込まずに「やってみたい」と言葉にできるオープンさ。専門的な知識や技術は後からいくらでも補えますが、その真っ直ぐな姿勢だけは、何物にも代えがたい宝物だからです。</p>
          <p class="js-opacity-word">就職活動では、どうしても条件面に目が行くものです。それは生きていく上で大切なことですが、もう一つだけ、同じくらい深く見つめてほしいものがあります。あなたがこれから何年も過ごすその場所に、共に育っていける仲間がいるか。そしてその環境は、あなた自身の人生を心から豊かにしてくれるものか。それらをじっくりと考えた上で、私たちの扉を叩いてくれたなら、これほど嬉しいことはありません。</p>
        </div>
        <p class="p-message-statement__name js-opacity-word">代表取締役&nbsp;&nbsp;蓬莱 和真</p>
        <div class="p-message-statement__banner js-pro-img">
          <a href="<?php echo esc_url('https://note.com/ripe_tulip9235'); ?>" class="p-message-statement__banner-link" target="_blank" rel="noopener noreferrer">
            <img decoding="async" loading="lazy" src="<?php echo esc_url(get_template_directory_uri()); ?>/images/message/banner.webp" alt="バナー" width="635" height="333">
          </a>
        </div>
       
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
