<?php get_header(); ?>
<main>
  <section class="p-data-mv">
    <div class="p-data-mv__content">
      <p class="p-data-mv__en">Data</p>
      <h1 class="p-data-mv__title">数字で見るテレックス</h1>
    </div>
  </section>
  <nav class="p-data-anchor" aria-label="数字で見るテレックス内ナビゲーション">
    <div class="l-inner">
      <ul class="p-data-anchor__list">
        <li class="p-data-anchor__item">
          <a class="p-data-anchor__link" href="#anc01">数字データ</a>
        </li>
        <li class="p-data-anchor__item">
          <a class="p-data-anchor__link" href="#anc02">社員に聞いたテレックス関西</a>
        </li>
        
      </ul>
    </div>
  </nav>
  <section class="p-data-overview" id="anc01">
    <div class="l-inner">
      <h2 class="p-data-overview__title">数字データ</h2>
      <div class="p-data-overview__cards">
        <article class="p-data-overview-card">
          <h3 class="p-data-overview-card__title">設立年</h3>
          <img class="p-data-overview-card__icon p-data-overview-card__icon--building" src="<?php echo esc_url(get_template_directory_uri()); ?>/images/data/icon-building.webp" alt="" width="114" height="114" loading="lazy" decoding="async">
          <p class="p-data-overview-card__value"><span>1995</span><small>年</small></p>
        </article>
        <article class="p-data-overview-card">
          <h3 class="p-data-overview-card__title">売上高</h3>
          <img class="p-data-overview-card__icon p-data-overview-card__icon--sales" src="<?php echo esc_url(get_template_directory_uri()); ?>/images/data/icon-sales.webp" alt="" width="133" height="117" loading="lazy" decoding="async">
          <p class="p-data-overview-card__value"><span>19億5,000</span><small>万円</small></p>
          <p class="p-data-overview-card__note">(2023年度実績)</p>
        </article>
        <article class="p-data-overview-card">
          <h3 class="p-data-overview-card__title">従業員数</h3>
          <img class="p-data-overview-card__icon p-data-overview-card__icon--employee" src="<?php echo esc_url(get_template_directory_uri()); ?>/images/data/icon-employee.webp" alt="" width="174" height="130" loading="lazy" decoding="async">
          <p class="p-data-overview-card__value"><span>111</span><small>名</small></p>
          <p class="p-data-overview-card__note">(2025年11月時点)</p>
        </article>
        <article class="p-data-overview-card">
          <h3 class="p-data-overview-card__title">男女比</h3>
          <div class="p-data-overview-card__gender" aria-hidden="true">
            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/data/icon-man.webp" alt="" width="113" height="142" loading="lazy" decoding="async">
            <span class="p-data-overview-card__dots"></span>
            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/data/icon-woman.webp" alt="" width="116" height="142" loading="lazy" decoding="async">
          </div>
          <p class="p-data-overview-card__value p-data-overview-card__value--ratio"><span>6 : 4</span></p>
        </article>
        <article class="p-data-overview-card">
          <h3 class="p-data-overview-card__title">女性管理職割合</h3>
          <div class="p-data-overview-card__manager" aria-hidden="true">
            <img class="p-data-overview-card__manager-person" src="<?php echo esc_url(get_template_directory_uri()); ?>/images/data/icon-manager.webp" alt="" width="113" height="142" loading="lazy" decoding="async">
            <img class="p-data-overview-card__manager-medal" src="<?php echo esc_url(get_template_directory_uri()); ?>/images/data/icon-medal.webp" alt="" width="47" height="47" loading="lazy" decoding="async">
          </div>
          <p class="p-data-overview-card__value"><span>33</span><small>%</small></p>
        </article>
        <article class="p-data-overview-card">
          <h3 class="p-data-overview-card__title">育休取得率</h3>
          <img class="p-data-overview-card__icon p-data-overview-card__icon--family" src="<?php echo esc_url(get_template_directory_uri()); ?>/images/data/icon-family.webp" alt="" width="167" height="129" loading="lazy" decoding="async">
          <p class="p-data-overview-card__value"><span>100</span><small>%</small></p>
        </article>
        <article class="p-data-overview-card">
          <h3 class="p-data-overview-card__title">社員平均年齢</h3>
          <img class="p-data-overview-card__icon p-data-overview-card__icon--team" src="<?php echo esc_url(get_template_directory_uri()); ?>/images/data/icon-team.webp" alt="" width="153" height="130" loading="lazy" decoding="async">
          <p class="p-data-overview-card__value"><span>30</span><small>歳</small></p>
        </article>
        <article class="p-data-overview-card">
          <h3 class="p-data-overview-card__title">最年少役職者年齢</h3>
          <img class="p-data-overview-card__icon p-data-overview-card__icon--career" src="<?php echo esc_url(get_template_directory_uri()); ?>/images/data/icon-career.webp" alt="" width="137" height="120" loading="lazy" decoding="async">
          <p class="p-data-overview-card__value"><span>24</span><small>歳</small></p>
        </article>
        <article class="p-data-overview-card">
          <h3 class="p-data-overview-card__title">月平均所定外労働時間</h3>
          <img class="p-data-overview-card__icon p-data-overview-card__icon--time" src="<?php echo esc_url(get_template_directory_uri()); ?>/images/data/icon-time.webp" alt="" width="135" height="135" loading="lazy" decoding="async">
          <p class="p-data-overview-card__value"><span>11</span><small>時間</small></p>
          <p class="p-data-overview-card__note">(前年度実績)</p>
        </article>
        <article class="p-data-overview-card">
          <h3 class="p-data-overview-card__title">平均有給休暇取得日数</h3>
          <img class="p-data-overview-card__icon p-data-overview-card__icon--calendar" src="<?php echo esc_url(get_template_directory_uri()); ?>/images/data/icon-calendar.webp" alt="" width="135" height="135" loading="lazy" decoding="async">
          <p class="p-data-overview-card__value"><span>10</span><small>日</small></p>
          <p class="p-data-overview-card__note">(前年度実績)</p>
        </article>
        <article class="p-data-overview-card">
          <h3 class="p-data-overview-card__title">有給取得率</h3>
          <img class="p-data-overview-card__icon p-data-overview-card__icon--pie" src="<?php echo esc_url(get_template_directory_uri()); ?>/images/data/icon-pie.webp" alt="" width="133" height="133" loading="lazy" decoding="async">
          <p class="p-data-overview-card__value"><span>92</span><small>%</small></p>
        </article>
        <article class="p-data-overview-card">
          <h3 class="p-data-overview-card__title">eNPS</h3>
          <img class="p-data-overview-card__icon p-data-overview-card__icon--trophy" src="<?php echo esc_url(get_template_directory_uri()); ?>/images/data/icon-trophy.webp" alt="" width="99" height="148" loading="lazy" decoding="async">
          <p class="p-data-overview-card__value p-data-overview-card__value--ranking"><small>全国189社中</small><span>13</span><small>位</small></p>
          <p class="p-data-overview-card__note">※従業員のエンゲージメントを可視化する指標</p>
        </article>
        <article class="p-data-overview-card">
          <h3 class="p-data-overview-card__title">新卒離職率</h3>
          <img class="p-data-overview-card__icon p-data-overview-card__icon--exit" src="<?php echo esc_url(get_template_directory_uri()); ?>/images/data/icon-exit.webp" alt="" width="167" height="126" loading="lazy" decoding="async">
          <p class="p-data-overview-card__value"><span>6.3</span><small>%</small></p>
        </article>
        <article class="p-data-overview-card">
          <h3 class="p-data-overview-card__title">リフレッシュ休暇</h3>
          <img class="p-data-overview-card__icon p-data-overview-card__icon--vacation" src="<?php echo esc_url(get_template_directory_uri()); ?>/images/data/icon-vacation.webp" alt="" width="116" height="116" loading="lazy" decoding="async">
          <p class="p-data-overview-card__value p-data-overview-card__value--vacation">
            <small>年</small><span>1</span><small>回</small><span>5</span><small>連休以上取得可能</small>
          </p>
        </article>
        <article class="p-data-overview-card">
          <h3 class="p-data-overview-card__title">社内イベント回数</h3>
          <img class="p-data-overview-card__icon p-data-overview-card__icon--event" src="<?php echo esc_url(get_template_directory_uri()); ?>/images/data/icon-event.webp" alt="" width="99" height="150" loading="lazy" decoding="async">
          <p class="p-data-overview-card__value p-data-overview-card__value--text">年間<br>10回以上</p>
        </article>
      </div>
    </div>
  </section>
  <section class="p-data-voice" id="anc02">
    <div class="l-inner">
      <h2 class="p-data-voice__title">社員に聞いたテレックス関西</h2>
      <div class="p-data-voice__list">
        <p class="p-data-voice__balloon p-data-voice__balloon--left">人が好き！この人たちがいるから頑張れる！</p>
        <p class="p-data-voice__balloon p-data-voice__balloon--right">有給を取りやすい雰囲気があるのがいい。<br>休みづらい空気がないので、予定が立てやすいです。</p>
        <p class="p-data-voice__balloon p-data-voice__balloon--left">男女ともに育休を取ることがあるのがほんとうにありがたいです！<br>ライフイベントがあってもキャリアを続けられるのが嬉しい。</p>
        <p class="p-data-voice__balloon p-data-voice__balloon--right">成果だけじゃなく“頑張り方”も見てくれるのが救いでした。うまく<br class="u-desktop">いかない時も、改善の過程をちゃんとみてくれるので挑戦しやすい。</p>
        <p class="p-data-voice__balloon p-data-voice__balloon--left">表彰式（Innovation Ceremony）がイベントじゃなくて目標になります。<br>「来年はここに立ちたい」って自然に思える。</p>
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
