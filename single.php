<?php
get_header();

if (! function_exists('telex_people_single_field')) {
  function telex_people_single_field($name, $default = '')
  {
    if (function_exists('get_field')) {
      $value = get_field($name);
      if ($value !== null && $value !== false && $value !== '') {
        return $value;
      }
    }
    return $default;
  }
}

if (! function_exists('telex_people_single_image_url')) {
  function telex_people_single_image_url($name, $fallback)
  {
    $image = telex_people_single_field($name);
    if (is_array($image) && ! empty($image['url'])) {
      return $image['url'];
    }
    if (is_numeric($image)) {
      $url = wp_get_attachment_image_url((int) $image, 'full');
      if ($url) {
        return $url;
      }
    }
    if (is_string($image) && $image !== '') {
      return $image;
    }
    return get_template_directory_uri() . $fallback;
  }
}

if (! function_exists('telex_people_single_lines')) {
  function telex_people_single_lines($text)
  {
    $lines = preg_split('/\r\n|\r|\n/', (string) $text);
    return array_values(array_filter(array_map('trim', $lines), 'strlen'));
  }
}

if (! function_exists('telex_people_single_render_lines')) {
  function telex_people_single_render_lines($text)
  {
    foreach (telex_people_single_lines($text) as $line) {
      echo '<span>' . esc_html($line) . '</span>';
    }
  }
}

$mv_label = telex_people_single_field('people_single_mv_label', '社員インタビュー');
$mv_title = telex_people_single_field('people_single_mv_title', "テレックス関西で見つけた\n自分の上限を決めない生き方");
$profile_name = telex_people_single_field('people_single_profile_name', '山田 紗季');
$profile_meta = telex_people_single_field('people_single_profile_meta', "2022年 新卒入社\nモバイル事業部 店長");
$profile_text = telex_people_single_field('people_single_profile_text', '大学卒業後、新卒でテレックス関西に入社。モバイル事業部の店舗スタッフとしてキャリアをスタートし、スタッフ一人ひとりの心に寄り添う対話重視のマネジメントを実践し、2026年4月より店長に就任。現在は店舗経営の責任者として、メンバーの成長と成果の両立に日々挑戦中。');

$story_sections = array(
  array(
    'title' => telex_people_single_field('people_single_story_1_title', "自分以上に私の可能性を\n信じてくれる人がいた"),
    'text' => telex_people_single_field('people_single_story_1_text', "就職活動をしていた頃の私の軸は、とてもシンプルで「どんな人と働きたいか」という人間関係の部分。そして、結婚や出産といったライフイベントがあっても、長く働き続けられる環境があるかどうかでした。\n\nいろんな会社を見ていましたが、テレックス関西の採用担当の方々が語ってくれた言葉に衝撃を受けたのを覚えています。「山田さんならもっとこうできるはずだよ。」そう言って今の私の良いところだけでなく、もっと良くしていけるポテンシャルを、私以上に信じて伝えてくださったんです。\n\nそれまでの私は、自分の考えという枠の中でこじんまりと生きてきたような気がします。でも、この会社なら自分の上限を決めずに成長していける。そう直感しました。他の会社の面接では、どうしても自分を良く見せようと飾ってしまいがちでしたが、テレックス関西の選考では不思議と素の自分でいられました。その温かさと期待に応えたいと思い、他社の内定をすべて辞退して、ここ一本に絞って入社を決めました。"),
    'image' => telex_people_single_image_url('people_single_story_1_image', '/images/people-single/yamada-saki-story01.webp'),
    'reverse' => false,
  ),
  array(
    'title' => telex_people_single_field('people_single_story_2_title', "スタッフの成長を数字に繋げる\nそれが店長としての使命"),
    'text' => telex_people_single_field('people_single_story_2_text', "現在は店長として、店舗の目標設定や売上管理を担っています。ただ、テレックス関西らしいマネジメントとは、単に数字を追うことではありません。一番大切にしているのは、スタッフ一人ひとりと日々対話を重ね「彼らがどう成長できるか」を一緒に考えることです。\n\n自分自身がプレイヤーとして成果を出す立場から、スタッフを通じて成果を出す立場への変化には、最初とても戸惑いました。私が発する一言が、良くも悪くも相手に大きな影響を与えてしまう。その責任の重さを痛感する毎日でした。どう伝えれば、みんなが自発的に動きたいと思ってくれるのか。ただ指示を出すだけでは、スタッフの成長は生まれません。目標にしている数字と、スタッフがやりたいと思っていること。その二つを結びつける結節点になることが、一番の苦労であり、この仕事の醍醐味でもあります。\n\nスタッフが私の提案を実践してくれて、お客様から嬉しい言葉をいただいたと報告に来てくれる。そんな瞬間は、心から「よしっ！」とガッツポーズをしたくなります。みんなの自己肯定感が上がっていく姿を見ることが、今の私の幸せです。"),
    'image' => telex_people_single_image_url('people_single_story_2_image', '/images/people-single/yamada-saki-story02.webp'),
    'reverse' => true,
  ),
  array(
    'title' => telex_people_single_field('people_single_story_3_title', "ライフイベントをキャリアを諦める\n理由にしない文化"),
    'text' => telex_people_single_field('people_single_story_3_text', "この会社に入って一番良かったと感じるのは、やはり人との繋がりです。上司である部長や課長が、常に私を気にかけて面談の機会を作ってくださいます。その支えがなければ、今の私の挑戦はなかったと思います。\n\nまた、女性としての将来を考えたとき、産休や育休が制度として存在するだけでなく、それを当たり前に支え合う空気が根付いていることも魅力です。出産を迎える先輩たちが温かく送り出され、そして戻ってくる姿を間近で見てきました。体調のことや将来の不安を、上司に自然と相談できる。そんな安心感があるからこそ、目の前の仕事に全力で向き合えるのだと感じています。もちろん、もっと良くしていける点もあります。例えば、自分たちの頑張りが具体的にどう会社の利益に繋がっているのかを、より若手スタッフに分かりやすく見える化していくことでモチベーションにもつながると思うんです。店長という立場になったからこそ、そうした課題にも前向きに取り組んでいきたいと考えています。"),
    'image' => telex_people_single_image_url('people_single_story_3_image', '/images/people-single/yamada-saki-story03.webp'),
    'reverse' => false,
  ),
);
?>
<main>
  <section class="p-people-single-mv">
    <figure class="p-people-single-mv__image">
      <img src="<?php echo esc_url(telex_people_single_image_url('people_single_mv_image', '/images/people-single/yamada-saki-mv-bg.webp')); ?>" alt="">
    </figure>
    <div class="p-people-single-mv__body">
      <p class="p-people-single-mv__label"><?php echo esc_html($mv_label); ?></p>
      <h1 class="p-people-single-mv__title"><?php telex_people_single_render_lines($mv_title); ?></h1>
    </div>
  </section>

  <section class="p-people-single-profile">
    <div class="l-inner">
      <div class="p-people-single-profile__content">
        <figure class="p-people-single-profile__image">
          <img src="<?php echo esc_url(telex_people_single_image_url('people_single_profile_image', '/images/people-single/yamada-saki-profile.webp')); ?>" alt="<?php echo esc_attr($profile_name); ?>">
        </figure>
        <div class="p-people-single-profile__body">
          <h2 class="p-people-single-profile__name"><?php echo esc_html($profile_name); ?></h2>
          <p class="p-people-single-profile__meta"><?php telex_people_single_render_lines($profile_meta); ?></p>
          <div class="p-people-single-profile__text">
            <?php echo wp_kses_post(wpautop($profile_text)); ?>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="p-people-single-story">
    <div class="l-inner">
      <div class="p-people-single-story__content">
        <?php foreach ($story_sections as $section) : ?>
          <article class="p-people-single-story__row<?php echo $section['reverse'] ? ' p-people-single-story__row--reverse' : ''; ?>">
            <div class="p-people-single-story__body">
              <h2 class="p-people-single-story__title"><?php telex_people_single_render_lines($section['title']); ?></h2>
              <div class="p-people-single-story__text">
                <?php echo wp_kses_post(wpautop($section['text'])); ?>
              </div>
            </div>
            <figure class="p-people-single-story__image">
              <img src="<?php echo esc_url($section['image']); ?>" alt="">
            </figure>
          </article>
        <?php endforeach; ?>
        <section class="p-people-single-story__future">
          <h2 class="p-people-single-story__title"><?php echo esc_html(telex_people_single_field('people_single_future_title', '信頼の積み重ねが、新しい自分の可能性を広げていく')); ?></h2>
          <div class="p-people-single-story__text">
            <?php echo wp_kses_post(wpautop(telex_people_single_field('people_single_future_text', 'これからは店舗の責任者として、今まで以上にスタッフ一人ひとりがやりがいを持って働ける店舗を作っていきたいです。指示待ちではなく、自分で考えて行動できるチーム。それが結果として会社の利益にも繋がり、みんなの達成感に繋がっていく。そんな好循環を生み出すことが目標です。' . "\n" . '私個人としては、上司からも部下からも信頼される人間であり続けたいと思っています。「山田に任せておけば、あのお店は大丈夫だ。」そう思っていただける信頼を一つひとつ積み上げていくこと。その積み重ねがまた新しい領域への挑戦権を与えてくれ、入社時に期待した自分の可能性をさらに広げてくれると信じています。'))); ?>
          </div>
        </section>
        <section class="p-people-single-story__message">
          <h2 class="p-people-single-story__message-title"><?php echo esc_html(telex_people_single_field('people_single_message_title', '就活生へのメッセージ')); ?></h2>
          <div class="p-people-single-story__message-text">
            <?php echo wp_kses_post(wpautop(telex_people_single_field('people_single_message_text', '就職活動をしていると、どの道を選べば正解なのかと悩むことも多いと思います。でも、私はこう考えています。' . "\n" . '「選んだ道を、後から自分の力で正解にしていくことが何より大切だ」と。この会社に入れば誰かが変えてくれる、ではなく、この会社に入ったからこそ自分が変わるんだ。そんな主体的な気持ちがあれば、どんな困難も成長の糧にしていけます。テレックス関西は、そんなあなたの主体性と可能性を、誰よりも信じて伴走してくれる会社です。自分を飾ることなく、ありのままのあなたで飛び込んできてください。一緒に働ける日を楽しみにしています。'))); ?>
          </div>
        </section>
      </div>
    </div>
  </section>

  <section class="p-people-single-nav">
    <div class="l-inner">
      <div class="p-people-single-nav__inner">
        <a class="p-people-single-nav__link" href="<?php echo esc_url(home_url('/people/')); ?>">
          <span class="p-people-single-nav__icon" aria-hidden="true">
            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/people-single/icon-arrow.svg" alt="">
          </span>
          <span class="p-people-single-nav__text">社員一覧へ</span>
          <span class="p-people-single-nav__en">People</span>
        </a>
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
