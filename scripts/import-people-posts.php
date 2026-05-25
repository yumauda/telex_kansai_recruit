<?php
/**
 * Import static Figma people interview data into WordPress posts.
 *
 * Run from theme root:
 * php scripts/import-people-posts.php
 */

$wp_load = dirname(__DIR__, 4) . '/wp-load.php';
if (! file_exists($wp_load)) {
    fwrite(STDERR, "wp-load.php not found: {$wp_load}\n");
    exit(1);
}

require_once $wp_load;
require_once ABSPATH . 'wp-admin/includes/file.php';
require_once ABSPATH . 'wp-admin/includes/media.php';
require_once ABSPATH . 'wp-admin/includes/image.php';
require_once ABSPATH . 'wp-admin/includes/taxonomy.php';

$theme_dir = get_template_directory();

$field_keys = array(
    'people_single_mv_image' => 'field_people_single_mv_image',
    'people_single_mv_label' => 'field_people_single_mv_label',
    'people_single_mv_title' => 'field_people_single_mv_title',
    'people_single_profile_image' => 'field_people_single_profile_image',
    'people_single_profile_name' => 'field_people_single_profile_name',
    'people_single_profile_meta' => 'field_people_single_profile_meta',
    'people_single_profile_text' => 'field_people_single_profile_text',
    'people_single_story_1_title' => 'field_people_single_story_1_title',
    'people_single_story_1_text' => 'field_people_single_story_1_text',
    'people_single_story_1_image' => 'field_people_single_story_1_image',
    'people_single_story_2_title' => 'field_people_single_story_2_title',
    'people_single_story_2_text' => 'field_people_single_story_2_text',
    'people_single_story_2_image' => 'field_people_single_story_2_image',
    'people_single_story_3_title' => 'field_people_single_story_3_title',
    'people_single_story_3_text' => 'field_people_single_story_3_text',
    'people_single_story_3_image' => 'field_people_single_story_3_image',
    'people_single_future_title' => 'field_people_single_future_title',
    'people_single_future_text' => 'field_people_single_future_text',
    'people_single_message_title' => 'field_people_single_message_title',
    'people_single_message_text' => 'field_people_single_message_text',
);

$posts = array();

$posts[] = array(
    'post_title' => '坂本 元貴',
    'post_name' => 'sakamoto-genki',
    'category' => '社員インタビュー',
    'fields' => array(
        'people_single_mv_image' => '/src/images/people-single/sakamoto-mv-base.jpg',
        'people_single_mv_label' => '社員インタビュー',
        'people_single_mv_title' => "自分の価値を最大化させる\nために選んだ新たな挑戦",
        'people_single_profile_image' => '/src/images/people-single/sakamoto-mv-base.jpg',
        'people_single_profile_name' => '坂本 元貴',
        'people_single_profile_meta' => "2024年 中途入社\nイベント事業部 リーダー",
        'entry_date' => '2024年 中途入社',
        'position' => 'イベント事業部 リーダー',
        'people_single_profile_text' => '調理師専門学校を卒業後、料理人としてキャリアをスタート。その後、代理店や人材派遣会社でのイベント運営を経験。派遣スタッフとしてテレックス関西の現場に関わった縁から受け入社を決意。現在はトッププレイヤーとして現場を牽引しながら後輩の育成やマネジメント、採用活動まで幅広く携わっている。',
        'people_single_story_1_title' => "何をするかよりも、誰とするか\n部長の熱意が私の心を動かした",
        'people_single_story_1_text' => "実は、最初からテレックス関西への転職を考えていたわけではありませんでした。前職は人材派遣の会社にいて、テレックス関西はその取引先だったんです。仕事を通じて何度か現場をご一緒させていただく中で、部長の関から「一緒にやらへんか」と声をかけてもらったのがきっかけでした。\n\n正直に言うと、最初は何度かお断りしていたんです。提示された条件だけで見れば、前職の方が良い部分もありましたから。でも、最後にお断りするつもりで臨んだ食事の場で、関の熱い想いに触れて、気づけば入社を決めていました。\n\n決め手になったのは、何をするかよりも、誰とするかという視点です。前職では一人で現場を回すことが多く、どこか物足りなさを感じていました。でもテレックス関西のスタッフはみんなレベルが高く、何より関という人間が面白かった。この人と一緒に働けば、目先のお金や時間以上の成長が得られるはずだ。そう確信したんです。",
        'people_single_story_1_image' => '/src/images/people-single/sakamoto-story01.png',
        'people_single_story_2_title' => "数字を追いかける興奮と\n人を育てる新たな喜び",
        'people_single_story_2_text' => "現在は、ショッピングモールやスーパーでの出張販売イベントを担当しています。買い物という明確な目的があるお客様に足を止めていただくのは、決して簡単ではありません。無視されることも多いですし、体力も精神力も使います。それでも、難攻不落と思われたお客様から契約をいただけた時の達成感は格別です。一日に二桁以上の数字を叩き出した時は、もう自分よりすごい奴はこの世にいないんじゃないかという、最高の気分になりますね。これは営業という仕事でしか味わえない快感です。\n\n最近はプレイヤーとしての活動に加え、マネジメントや後輩育成にも力を入れています。以前は自分の感覚を言葉にするのが苦手で、教育は避けてきた分野でした。でも、自分の培ってきたスキルを次世代に渡していくことで、自分の価値がさらに上がると気づいたんです。教えた後輩が成長していく姿を見るのは、自分が数字を上げるのとはまた違う面白さがあります。今はプレイヤーからマネージャーへと領域を広げていく、自分自身の過渡期を楽しんでいます。",
        'people_single_story_2_image' => '/src/images/people-single/sakamoto-story02.png',
        'people_single_story_3_title' => "会社のために数字を上げるんじゃない\n君の成長のために挑戦しようと言ってくれる",
        'people_single_story_3_text' => 'テレックス関西の最大の魅力は、人の良さと、一人ひとりを本気で見てくれる文化です。これまでの会社では「数字さえ上げればいい」という環境も経験してきました。でもここは違います。上司が「会社の数字が足りないからやれ」と言うのではなく、「坂本ならもっとできるはず。成長につながるから挑戦してみないか」という向き合い方をしてくれるんです。あと、頑張った分をしっかり評価してくれる制度もちゃんと整っていたのが嬉しいですね。昨年末、私が後輩育成に注力した結果をしっかり見ていてくれて、表彰やボーナスという形で報いてくれました。自分の行動が正しかったんだと実感できて、本当に嬉しかったですね。もちろん、改善してほしい点がないわけではありません。例えば勤怠管理のルールが少しアナログで二度手間に感じるところなど、現場目線でもっと効率化できる部分はあります。でも、そうした課題も含めて、熱い想いを持った人間らしい仲間たちと一つずつ乗り越えていけるのが、この会社の良さだと思っています。',
        'people_single_story_3_image' => '/src/images/people-single/sakamoto-story03.png',
        'people_single_future_title' => '自分の組織を持ち、関わるすべての人たちの人生を背負う覚悟で挑みたい',
        'people_single_future_text' => "今後の目標は、テレックス関西の中に自分の組織を作ることです。事業の内容にはこだわりません。たとえ清掃活動のような仕事だったとしても、自分が一緒に働きたいと思える仲間と、お互いを高め合えるチームを作りたいんです。\n\nそして、そのチームに入ってくれたメンバーの将来を、覚悟を持って背負えるリーダーになりたい。それは、私が部長の関から受けてきた恩返しでもあります。\n\nマネジメントにおいては、まだ自分の得意なタイプの方以外への関わり方に課題を感じることもあります。でも、そこから逃げずに真正面から向き合うことで、自分自身もさらに成長していきたい。苦手なことに挑戦してこそ道が開けると信じています。",
        'people_single_message_title' => '就活生へのメッセージ',
        'people_single_message_text' => '今の時代、携帯のプラン説明だけならAIでもできるかもしれません。でも、お客様と仲良くなり、信頼関係を築き「あなただから決めたよ」と言っていただけるのは、人間にしかできない仕事です。テレックス関西には、そんな人間臭い営業を大切にする文化があります。自分の価値を上げたい、誰かのために本気になりたい。そう思っているなら、ここは最高の舞台です。悩んでいるなら、まずは一度飛び込んできてください。私たちが全力で受け止めます。切磋琢磨しながら、一緒に面白い未来を作っていきましょう！',
    ),
);

$posts[] = array(
    'post_title' => '武藤 蓮',
    'post_name' => 'muto-ren',
    'category' => '社員インタビュー',
    'fields' => array(
        'people_single_mv_image' => '/src/images/people-single/muto-mv-base.jpg',
        'people_single_mv_label' => '社員インタビュー',
        'people_single_mv_title' => "今しかできない成長が\nここにはある",
        'people_single_profile_image' => '/src/images/people-single/muto-mv-base.jpg',
        'people_single_profile_name' => '武藤 蓮',
        'people_single_profile_meta' => "2025年 新卒入社\nモバイル事業部",
        'entry_date' => '2025年 新卒入社',
        'position' => 'モバイル事業部',
        'people_single_profile_text' => '大学ではスポーツマネジメントを専攻。教員免許を取得し、長年続けてきた野球を教える道を志していたが、合同説明会での出会いをきっかけにテレックス関西へ入社。現在はモバイル事業部の第一線で活躍中。',
        'people_single_story_1_title' => "教員になるのは、今じゃなくていい。\nこの人と働きたいという直感が決め手でした。",
        'people_single_story_1_text' => "もともと私は、就職活動を熱心にするつもりはありませんでした。ずっと野球を続けてきたこともあり、将来は野球を教える仕事がしたい。そのための手段として教員免許も取得していたので、卒業後は学校の先生になるのが当たり前の道だと思っていたんです。\n\nそんな私の考えが変わったのは、たまたま参加した合同説明会でした。\n\n私と同じく教員免許を持っている人事の方がいて、その方が言った言葉が私の心に深く刺さったんです。\n\n「大学を卒業してすぐに先生になっても、生徒に教えられる経験が少ないかもしれない。教員という仕事は、10年後でも、定年した後でも挑戦できる。でも、新卒としてビジネスの現場で自分を鍛える経験は、今しかできないよ。」その言葉を聞いて、自分の視野がいかに狭かったかに気づかされました。それからは、選考が進むたびに会社と、その人事の方の魅力惹かれ、この会社で勝負してみよう。そう腹を括ることができました。",
        'people_single_story_1_image' => '/src/images/people-single/muto-story01.jpg',
        'people_single_story_2_title' => "AIには代替できない\n人と人との信頼を勝ち取る面白さ",
        'people_single_story_2_text' => "現在は、auショップの店頭で機種変更の手続きや、スマートフォンの操作説明などをメインに担当しています。\n\nモバイル業界は、今やオンラインで完結できる手続きも増えており、一見すると人が介在する余地がなくなっているように思えるかもしれません。でも、実際に店頭に立ってみて感じるのは、やはり最後は人による安心感が求められているということです。\n\n特にご年配のお客様など、進化し続けるテクノロジーに不安を感じている方はたくさんいらっしゃいます。そうした方々に対して、いかに分かりやすく伝え、信頼を勝ち取れるか。それが私たちスタッフが店頭に立つ一番の価値だと思っています。最近、あるお客様に対して提案したのですが、3回ほど断られてしまったんです。それでも粘り強く、お客様のことを考えた提案を繰り返しました。最終的に納得して契約してくださった時 「何回も提案してくれたのに断ってごめんね、ありがとう。」という言葉をいただきました。\n\n粘り強く向き合った結果、自分の想いが伝わった瞬間は、この仕事をしていて本当に良かったと感じる瞬間です。",
        'people_single_story_2_image' => '/src/images/people-single/muto-story02.jpg',
        'people_single_story_3_title' => "常に誰かが見てくれている\n一人じゃないと感じられる環境",
        'people_single_story_3_text' => "テレックス関西に入って一番驚いたのは、店舗の垣根を越えた横の繋がりと、先輩方との縦の繋がりの深さです。社内で使っているSNSツールがあるのですが、そこでは面識があまりない他店の先輩からも、私の頑張りに対してコメントやメッセージが届くことがあります。自分の取り組みや成果を、誰かが必ず見てくれている。この安心感は、新卒1年目の私にとって大きな支えになりました。\n\nまた、若手のやりたいという声を否定せずに背中を押してくれる会社だと感じています。例えば、接客内容を改善するための録音機器の運用方法について「もっとこうすれば良くなるはず。」と店長に提案したことがあります。まだ土台が決まっていない段階でしたが、店長は即座に「じゃあ改善のために一緒にやろう！みんなにも共有しよう！」と言ってくださったんです。主体的なチャレンジを応援してくれる環境があるからこそ、自分の成長を実感できますし、自信にも繋がっています。誰かが落ち込んでいれば、必ず誰かが気づいて声をかける。一人を置いてきぼりにしない文化が好きですね。",
        'people_single_story_3_image' => '/src/images/people-single/muto-story03.jpg',
        'people_single_future_title' => '役職という手段を通じて自分自身の人間力を磨き上げたい',
        'people_single_future_text' => "今の目標は、できるだけ早くリーダーという役職にキャリアアップすることです。\n\n最初は、早く出世したい、という単純な野望から始まった目標でした。でも今は、この会社で経験できることはすべて吸収したい、という想いが強くなっています。\n\n役職が上がれば、任される裁量も責任も大きくなります。それは、私が入社前に求めていた、人間力を高めるための最高の環境だと思っています。\n\n現在の課題は、相手への伝え方です。私は納得いかないことがあると、先輩や同期に対してもストレートに意見を言ってしまう癖があります。せっかく良い提案をしていても、感情が先走ってしまい、正しく伝わらないこともありました。先輩からたくさんアドバイスをいただき、今はどうすれば相手に伝わる言葉を選べるか、日々勉強中です。リーダーとして人を動かせる人間になるために、まずは自分自身をアップデートしていきたいと考えています。",
        'people_single_message_title' => '就活生へのメッセージ',
        'people_single_message_text' => '就職活動をしていると、どうしても「この会社で3年後、5年後もやっていけるだろうか」と未来の不安ばかりを考えてしまいがちです。でも、私が大切にしてほしいと思うのは「今、この瞬間の直感」です。今、何をしたいのか。今、誰と働きたいのか。その感覚に素直になってみてください。今の時代、もし選んだ道が違ったとしても、やり直す選択肢はいくらでもあります。だからこそ、未来への不安で動けなくなるのではなく、今魅力的に感じる環境に飛び込んでみてほしいんです。テレックス関西は、皆さんが今持っている熱量を、決して無駄にしない会社です。一緒に働ける日を楽しみにしています。',
    ),
);

$posts[] = array(
    'post_title' => '矢野 夏菜',
    'post_name' => 'yano-kana',
    'category' => '社員インタビュー',
    'fields' => array(
        'people_single_mv_image' => '/src/images/people-single/yano-mv-base.jpg',
        'people_single_mv_label' => '社員インタビュー',
        'people_single_mv_title' => '目の前のお客様をお店のファンに変えていく',
        'people_single_profile_image' => '/src/images/people-single/yano-mv-base.jpg',
        'people_single_profile_name' => '矢野 夏菜',
        'people_single_profile_meta' => "2023年 中途入社\nモバイル事業部",
        'entry_date' => '2023年 中途入社',
        'position' => 'モバイル事業部',
        'people_single_profile_text' => '専門学校で心理学や医療を学び、精神保健福祉士の国家資格取得を目指す。実習などを通じて自身の進路を見つめ直し、卒業後に未経験からテレックス関西に入社。現在は、初のインショップ型店舗である枚方モール店にて、カウンター業務やスマホ教室の担当として活躍中。',
        'people_single_story_1_title' => "資格や経歴よりも\n私という人間を真っ直ぐ見てくれた",
        'people_single_story_1_text' => '専門学校では精神保健福祉士の資格取得を目指して勉強していました。でも、実習などで実際の現場を経験するうちに、人の命や心に深く関わる責任の重さを、今の自分ではまだ受け止めきれないと感じるようになったんです。一度立ち止まって、自分には何が向いているのかを考え直すことにしました。もともと人と話すことが好きで、正社員として働くなら接客業がいいなと考えていた時に出会ったのが、テレックス関西でした。携帯ショップの仕事は、自分にとっても身近で働く姿がイメージしやすかったですし、さらに決め手となったのは、面接していただいた時でした。他社の面接では業務的な印象を受けることもありましたが、テレックス関西の面接は、未経験の私がすぐに戦力になれるかどうかではなく、私自身の性格や人間性を本当に深く知ろうとしてくれていることが伝わってきたんです。人を大事にする会社、という考え方が言葉だけでなく、面接の雰囲気そのものに表れていて、ここなら自分らしく頑張れそうだと確信しました。',
        'people_single_story_1_image' => '/src/images/people-single/yano-story01.jpg',
        'people_single_story_2_title' => "目の前のお客様を\nお店のファンに変えていく",
        'people_single_story_2_text' => "現在は、機種変更やプランの見直し、新規契約といったカウンター業務がメインです。去年の9月からは、テレックス関西のドコモショップとしては初のショッピングモール内店舗である枚方モール店に配属されました。\n\n以前の路面店とは違い、お買い物ついでにふらっと立ち寄られるお客様も多く、客層も10代からご高齢の方まで本当に幅広くなり、毎日が新しい発見の連続です。そんな中、私が今特に力を入れているのが、ご高齢のお客様向けの「スマホ教室」です。単に操作を教えるだけではありません。教室を通じて信頼関係を築き、何でも相談できる存在になることを目指しています。\n\n以前、教室が終わった後に、あるお客様から「実はプランも気になっていて」とご相談をいただいたことがありました。そこからご家庭の電気やガスの見直しまでお話しが広がり、最終的に家計全体の改善をご提案できたんです。お客様から「ありがとう、助かったわ」と言っていただけたときは、心からこの仕事をしていて良かったと感じます。ただ売るだけでなく、お客様の生活を支えるインフラの一部として貢献できる。それが、この仕事の醍醐味です。",
        'people_single_story_2_image' => '/src/images/people-single/yano-story02.jpg',
        'people_single_story_3_title' => "役職やキャリアの壁がない\n温かい繋がり",
        'people_single_story_3_text' => "テレックス関西に入って驚いたのは、上司や先輩との距離の近さです。店長や部長といった責任者の方々が、驚くほど一人ひとりのことを見てくれているんです。厳しいときは厳しく、でも裏ではしっかりと成長を喜んでくれている。そんなエピソードを後から耳にするたび、本当に温かい会社だなと感じます。また、社内イベントが充実しているのも魅力です。去年の社員旅行ではハワイに行かせていただきました。普段は接点のない別部署の方々とも、旅行を通じて一気に仲良くなることができ、今では社内で会うと自然に会話が弾みます。年に一度の「イノベーションセレモニー」では、壇上で表彰される仲間の姿を見て、私もいつかあの場所に立ちたいと、ポジティブな刺激をもらっています。\n\nもちろん、日々の業務では、覚えることの多さやスピード感に圧倒されることもあります。それでもこの仲間となら乗り越えられる。そう思わせてくれる人間関係が、テレックス関西の自慢です。",
        'people_single_story_3_image' => '/src/images/people-single/yano-story03.png',
        'people_single_future_title' => '苦手なことにも挑戦し、後輩から頼られる立場へ',
        'people_single_future_text' => "入社して3年目になり、自分自身の立ち位置を意識するようになりました。これまでは、難しい商材や複雑な設定などは、どこかで避けていた部分があったかもしれません。でも、後輩が増えていく中で、何でも相談に乗れる、頼もしい先輩になりたいという思いが強くなってきました。\n\n今は、苦手意識のあったインターネット光回線の提案にも積極的に取り組んでいます。自分からプロのスタッフに聞きに行ったり、店舗の責任者にアドバイスをもらったりしながら、知識を自分の武器に変えている最中です。枚方モール店のファンを一人でも多く増やすこと、そして、新しいことにワクワクしながら挑戦し続けること。そんな姿勢を後輩たちに見せていきたいです。",
        'people_single_message_title' => '就活生へのメッセージ',
        'people_single_message_text' => '私は一度、目指していた道から外れ、自分を見つめ直す時間を作りました。当時は周りと比べて不安になることもありましたが、今振り返れば、その時間があったからこそ、納得してこの仕事に出会えたのだと思います。就職活動に正解はありません。もし今、悩んでいる方がいたら、まずは自分自身の価値観を大切にしてほしいです。入ってみなければわからないこともありますが、テレックス関西は、自分の意志で頑張りたいと思う人を、全力で手助けしてくれる会社です。未経験でも大丈夫です。あなたの個性を活かしながら、一緒に楽しく成長していける仲間に出会えることを楽しみにしています。',
    ),
);

$posts[] = array(
    'post_title' => '川本 大地',
    'post_name' => 'kawamoto-daichi',
    'category' => '社員インタビュー',
    'fields' => array(
        'people_single_mv_image' => '/src/images/people-single/kawamoto-mv-base.jpg',
        'people_single_mv_label' => '社員インタビュー',
        'people_single_mv_title' => "正解のない道を\n仲間と進むおもしろさ",
        'people_single_profile_image' => '/src/images/people-single/kawamoto-mv-base.jpg',
        'people_single_profile_name' => '川本 大地',
        'people_single_profile_meta' => "2021年 新卒入社\nモバイル事業部 店長",
        'entry_date' => '2021年 新卒入社',
        'position' => 'モバイル事業部 店長',
        'people_single_profile_text' => '大学を卒業後、新卒でテレックス関西に入社。モバイル事業部にて店舗スタッフを経験し、現在はau史上初となる特殊な形態の新店立ち上げを任され、店長として店舗運営とマネジメントに奔走している。',
        'people_single_story_1_title' => "この人たちと働きたいという直感だけを信じて\n他社の内定をすべて辞退",
        'people_single_story_1_text' => "私の就職活動の始まりは、少し変わっていたかもしれません。たまたまYouTubeで流れてきたインターンの動画を見て、直感的に面白そうだなと感じたのがテレックス関西を知ったきっかけでした。当時はバイトの予定もなかったので、軽い気持ちで覗いてみようと思ったのが始まりでした。\n\nいよいよ本格的に就活が始まった時、選考に進むつもりはなかったんですが、せっかく関わって下さったので少しだけ話を聞いてみようと、体育祭選考という1次選考に参加したんです。そこでメンターとして参加していた先輩たちが、これから自分が入る会社について本当に楽しそうに話している姿を見て、純粋にいい会社なんだろうなと感じました。\n\n何より心が動かされたのは、面談の場です。私の経歴や資格ではなく、私という人間がどういう考えを持って、どう生きていきたいのか。一人の人間として深く向き合ってくれる姿勢に、気づけば、受けていた他の企業はすべて辞退し、テレックス関西一本に絞って覚悟を決めていました。",
        'people_single_story_1_image' => '/src/images/people-single/kawamoto-story01.jpg',
        'people_single_story_2_title' => "前代未聞のプロジェクトを任される重圧と\nそれを面白いと思える強さを手に",
        'people_single_story_2_text' => "現在は、ニトリモールにある店舗で店長を務めています。実はこの店舗、業界内でも前代未聞と言われるほど挑戦的な立ち上げなんです。通常ではありえないような運営形態でのスタートで、社内でも誰も経験したことがない未知の領域でした。\n\nそんな重要拠点の店長に、若手である自分が抜擢されたと聞いたときは本当に驚きました。オープン直前まで副店長としての参加だと思っていたので、プレッシャーがなかったと言えば嘘になります。\n\nしかも、集まったスタッフはそれぞれ異なる環境で働いてきたメンバーばかり。私自身、一緒に働いたことがある人が一人もいない状態からのスタートでした。まずは関係性を築くところから始まり、現場でのルール作り、効率的な運営スキームの構築など、毎日が0から1を作る作業の連続です。\n\nインショップならではの忙しさや、営業時間の長さなど、スタッフにも負担がかかる場面はあります。でも、だからこそ、どうすればみんなが気持ちよく、納得感を持って働けるのかをひたすら問い続け、対話を重ねることを何より大切にしています。正解がない中で、仲間と一緒に模索しながら店舗を作り上げていくプロセスは、何物にも代えがたい面白さがあります。",
        'people_single_story_2_image' => '/src/images/people-single/kawamoto-story02.jpg',
        'people_single_story_3_title' => "どうすれば良くなるかを全員で問い続ける\nこの純粋なチームワークが誇り",
        'people_single_story_3_text' => "テレックス関西の最大の魅力は、やはり人の良さです。店長という役職はありますが、今の新店においては私を含めた全員がインショップ未経験のチャレンジャーです。だからこそ、上下関係に関わらず、現場のスタッフからもどんどん意見をもらいます。\n\nこうした横並びの感覚で「みんなでお店を作っている」という手応えを感じられるのが、この会社の素晴らしいところだと思います。\n\nもちろん、リアルな話をすれば、立ち上げ時期は体力的にもハードな局面がありました。それでも頑張れるのは、会社が自分という人間を信じて期待してくれているのが伝わってくるからです。\n\n今後は、今まさに私たちが苦労して作っているこの仕組みを、次の世代がよりスムーズに活用できるような形に整えていきたいと考えています。大変な時期を一緒に乗り越えた仲間と、数年後に「あの時バタバタだったけど面白かったね」と笑い合える未来が今から楽しみです。",
        'people_single_story_3_image' => '/src/images/people-single/kawamoto-story03.jpg',
        'people_single_future_title' => '前代未聞の挑戦を成功させ、後輩たちが胸を張って歩める道を切り拓く',
        'people_single_future_text' => "まずは、今任されているこの店舗を、テレックス関西の最重要拠点として軌道に乗せることが第一の目標です。誰にも成し遂げたことがないモデルを成功させることで、会社に恩返しをしたいと思っています。\n\n将来的には、自分自身が成長し続けるのはもちろんのこと、後に続く後輩たちが安心して挑戦できる環境を作れるリーダーになりたいです。直感を信じて飛び込んだこの道が正解だったと、自分の背中で証明していきたいですね。",
        'people_single_message_title' => '就活生へのメッセージ',
        'people_single_message_text' => 'もし今、何を軸に就活をすればいいか悩んでいるのなら、ぜひ人を軸に選んでみてください。人は、一人で生きていくことはできません。だからこそ、誰と働くかが人生の幸せに直結すると思うんです。いろんな企業の採用担当者の話をぜひ聞いてみてください。その人たちが本当に楽しそうに自社を語っているか。あなたの経歴だけでなく、あなた自身のバックグラウンドに興味を持ってくれるか。もし、テレックス関西の人間に触れて、何か惹かれるものを感じたのなら、あなたの直感は間違っていないはずです。自分という人間を大切にしたい、誰かとの繋がりの中で成長したい。そんな思いを持っている方と一緒に働ける日を、楽しみに待っています。',
    ),
);

$posts[] = array(
        'post_title' => '西川 帆香',
        'post_name' => 'nishikawa-honoka',
        'category' => '社員インタビュー',
        'fields' => array(
            'people_single_mv_image' => '/src/images/people-single/nishikawa-mv-base.jpg',
            'people_single_mv_label' => '社員インタビュー',
            'people_single_mv_title' => "携帯を売るだけではない\n感謝を循環させる仕事",
            'people_single_profile_image' => '/src/images/people-single/nishikawa-profile.jpg',
            'people_single_profile_name' => '西川 帆香',
            'people_single_profile_meta' => "2025年 新卒入社\nモバイル事業部",
            'entry_date' => '2025年 新卒入社',
            'position' => 'モバイル事業部',
            'people_single_profile_text' => '大学を卒業後、新卒でテレックス関西に入社。現在はドコモショップ香里園店にて、フロントでの接客業務を中心に、店舗の顧客満足度（NPS）向上に向けた施策のリーダーも務める。社内SNSツール「RECOG」を積極的に活用し、店舗内の感謝の文化づくりに注力している。',
            'people_single_story_1_title' => "何をやるかではなく、誰とやるか。\n私の可能性を私以上に信じてくれた人との出会い",
            'people_single_story_1_text' => "就職活動をしていた頃の私は、実はやりたいことが明確に決まっていませんでした。そのため、業界を絞らずにさまざまな企業を見て回っていたのですが、自分の中で一つだけ譲れない軸がありました。それは、この人のために働きたいと思える人がいるかどうか、という点です。\n\n多くの企業が自社の魅力をアピールし、採用することを目的に私と接する中で、テレックス関西だけは違いました。リクルーターの高田さんは、私のやりたいことや向いていることを、まるで自分のことのように一生懸命に探してくれたのです。\n\nたとえその答えが自社でなくても構わないという、私を起点に考えてくれる真摯な姿勢に驚きました。就活生の一人にここまで時間とエネルギーを割いてくれる人がいる会社なら、きっと信頼できる。この人のような社会人になりたい。その直感が、テレックス関西への入社を決める決定打となりました。",
            'people_single_story_1_image' => '/src/images/people-single/nishikawa-story01.jpg',
            'people_single_story_2_title' => "携帯を売るだけではない。\nお客様との関係を超えた先にある、想像を超える感動",
            'people_single_story_2_text' => "現在はドコモショップのスタッフとして、機種変更やプランのご提案を担当しています。ただ手続きを進めるのではなく、お客様が普段どのように携帯を使われているのか、どんな生活を送られているのかを深く伺うことを大切にしています。\n\n単なる販売員とお客様という関係を超えて、一人の人間として向き合う。その結果、お客様からアンケートで心温まる長文のメッセージをいただいたり、ご家族全員の機種変更を任せていただいたりすることも増えました。一家の担当のように頼りにしていただける瞬間は、この仕事ならではの喜びです。\n\nまた、店舗運営の面では顧客満足度の指標であるNPSのリーダーも任されています。自ら目標として掲げた「誰よりも感謝をいただける人材になる」という想いを、自分一人で完結させるのではなく、店舗全体の文化として広げていく。新卒1年目からこうした責任ある役割に挑戦させてもらえる環境は、日々私を成長させてくれています。",
            'people_single_story_2_image' => '/src/images/people-single/nishikawa-story02.jpg',
            'people_single_story_3_title' => "弱さもさらけ出せる。\n挑戦を笑わず、愛を持って伴走してくれる仲間たち",
            'people_single_story_3_text' => "テレックス関西の最大の魅力は、頑張っている人を誰も馬鹿にしないこと、そして結果だけでなく過程をしっかりと見てくれることです。\n\n今の店舗に配属された当初、社内ツールを通じた感謝の文化を広めようとしましたが、最初はなかなか周囲の協力が得られず、心が折れそうになった時期もありました。そんな時、上司は単に共感するだけでなく、どうすればみんなに伝わるかを一緒に考え、具体的なアクションまで導いてくれました。\n\n自分の弱さを隠す必要がなく、ありのままの自分で挑戦できる。厳しくも愛のあるアドバイスをくれる先輩たちがいるからこそ、私は逃げずに前を向くことができました。ここで出会った人たちは、私の人生にとって大きな財産です。\n\n一方で、現状はまだ各店舗やキャリア間でのつながりが薄い部分もあると感じています。今後は店舗の垣根を超えて、成功事例や感謝の気持ちを共有し合えるような、さらに風通しの良い組織にしていきたいと考えています。",
            'people_single_story_3_image' => '/src/images/people-single/nishikawa-story03.jpg',
            'people_single_future_title' => '自分が輝くだけでなく後輩を輝かせられる存在へ',
            'people_single_future_text' => "これからは、お客様からも一緒に働く仲間からも「西川さんに任せてよかった」と言っていただける、真のオールラウンダーを目指していきたいです。\n\n入社1年目で、接客グランプリや新人賞といった素晴らしい賞をいただくことができましたが、そこで満足して終わりたくはありません。これからは、新しく入ってくる後輩たちが同じように、あるいはそれ以上に輝けるようサポートしていくことが私のミッションだと思っています。\n\n自分が培ってきた経験や接客のこだわりを惜しみなく伝え、後輩たちにも「仕事が楽しい」と感じてもらえるような影響力を持ちたい。テレックス関西の良さを体現し、次の世代へとバトンを繋いでいく存在になりたいです。",
            'people_single_message_title' => '就活生へのメッセージ',
            'people_single_message_text' => '就職活動は、自分のこれまでの人生やこれからの生き方について、これ以上ないほど深く考える貴重な時間です。もし今、やりたいことが見つからなくて悩んでいるのなら、焦る必要はありません。やりたいことは、環境や出会いによっていくらでも変わっていきます。だからこそ、何をしたいかよりも、自分はどうありたいか、どんな人と一緒に歩んでいきたいかという軸を大切にしてみてください。もしあなたが、人とのつながりや成長を大切にしたい、誰かのために本気になりたいと考えているなら、テレックス関西にはそれを受け止めてくれる温かい仲間がいます。ぜひ、ありのままのあなたで私たちの扉を叩いてください。一緒に働ける日を楽しみにしています。',
        ),
);

function telex_import_attachment_from_theme_file($relative_path, $post_id)
{
    global $theme_dir;

    $source_path = $theme_dir . $relative_path;
    if (! file_exists($source_path)) {
        throw new RuntimeException("Image not found: {$source_path}");
    }

    $existing = get_posts(array(
        'post_type' => 'attachment',
        'post_status' => 'inherit',
        'meta_key' => '_telex_import_source',
        'meta_value' => $relative_path,
        'fields' => 'ids',
        'posts_per_page' => 1,
    ));

    if (! empty($existing)) {
        return (int) $existing[0];
    }

    $tmp = wp_tempnam(basename($source_path));
    if (! $tmp || ! copy($source_path, $tmp)) {
        throw new RuntimeException("Could not prepare temp file: {$source_path}");
    }

    $file = array(
        'name' => basename($source_path),
        'type' => mime_content_type($source_path),
        'tmp_name' => $tmp,
        'error' => 0,
        'size' => filesize($source_path),
    );

    $attachment_id = media_handle_sideload($file, $post_id);
    if (is_wp_error($attachment_id)) {
        @unlink($tmp);
        throw new RuntimeException($attachment_id->get_error_message());
    }

    update_post_meta($attachment_id, '_telex_import_source', $relative_path);
    return (int) $attachment_id;
}

function telex_update_acf_meta($post_id, $field_name, $value, $field_keys)
{
    update_post_meta($post_id, $field_name, $value);
    if (isset($field_keys[$field_name])) {
        update_post_meta($post_id, '_' . $field_name, $field_keys[$field_name]);
    }
}

foreach ($posts as $post_data) {
    $existing = get_page_by_path($post_data['post_name'], OBJECT, 'post');
    $category_id = 0;
    if (! empty($post_data['category'])) {
        $category_id = wp_create_category($post_data['category']);
    }

    $postarr = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'post_title' => $post_data['post_title'],
        'post_name' => $post_data['post_name'],
        'post_content' => '',
    );

    if ($category_id) {
        $postarr['post_category'] = array($category_id);
    }

    if ($existing) {
        $postarr['ID'] = $existing->ID;
        $post_id = wp_update_post($postarr, true);
    } else {
        $post_id = wp_insert_post($postarr, true);
    }

    if (is_wp_error($post_id)) {
        fwrite(STDERR, "Failed importing {$post_data['post_title']}: " . $post_id->get_error_message() . "\n");
        continue;
    }

    foreach ($post_data['fields'] as $field_name => $value) {
        if (is_string($value) && str_starts_with($value, '/src/images/')) {
            $value = telex_import_attachment_from_theme_file($value, $post_id);
        }
        telex_update_acf_meta($post_id, $field_name, $value, $field_keys);
    }

    echo "Imported post #{$post_id}: {$post_data['post_title']} (" . get_permalink($post_id) . ")\n";
}
