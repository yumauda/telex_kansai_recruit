<?php
get_header();

$entry_requirements = array(
    array(
        'label' => '事業内容',
        'body'  => array('モバイル事業　イベント事業　法人営業事業'),
    ),
    array(
        'label' => '勤務時間',
        'body'  => array(
            'シフト制',
            '09:00〜18:00 / 10:00〜19:00 / 11:00〜20:00',
            '※実働8時間',
            '※配属先店舗により異なる',
        ),
    ),
    array(
        'label' => '勤務地',
        'body'  => array(
            '関西各店舗配属',
            '※初年度は希望を考慮し配属店舗（大阪・京都・兵庫）',
        ),
    ),
    array(
        'label' => '雇用形態',
        'body'  => array(
            '正社員（研修期間中は契約の定め有）',
            '契約社員（正社員を目指す研修制度有）',
        ),
    ),
    array(
        'label' => '給与',
        'body'  => array(
            '正社員　月給23万〜',
            '契約社員　月給22万〜',
        ),
    ),
    array(
        'label' => '各種手当',
        'body'  => array(
            '各種インセンティブ手当',
            '家族手当（第一子15,000円、第二子10,000円）',
            '育児休業早期復帰手当',
            '役職手当',
        ),
    ),
    array(
        'label' => '賞与',
        'body'  => array('年2回'),
    ),
    array(
        'label' => '昇給',
        'body'  => array('年1回以上'),
    ),
    array(
        'label' => '休日',
        'body'  => array(
            '週休2日制（月平均9回）',
            '有給休暇制度（10〜20日付与/年）',
            '長期休暇　産前産後育児休暇　男性育児休暇　弔事休暇　介護休暇',
        ),
    ),
    array(
        'label' => 'コンテスト',
        'body'  => array(
            'コンベンション制度あり',
            '社内コンテスト優秀者への表彰制度',
        ),
    ),
    array(
        'label' => '待遇・福利厚生',
        'body'  => array(
            '通勤交通費全額支給（上限月5万円）',
            '各種社会保険完備',
            '退職金制度（勤続3年以上）',
            '住宅手当制度（3万5千円〜　※エリアによって支給額が異なります）',
            '引っ越し一時金',
            'ジョブエントリー制度',
            'バースデープレゼント制度（会員制リゾートホテル宿泊券）',
            '健康診断（年に1回は会社負担）',
            '口腔ケア、インフルエンザ予防接種（全額会社負担）',
            '育児休業給付金　出産手当金　出産育児一時金',
            'フレキシブル社員移行制度（時短社員、在宅社員への移行）',
            '社内イベント',
        ),
    ),
    array(
        'label' => '研修制度',
        'body'  => array(
            '新入社員研修　営業研修　販売研修　トレーナー育成研修',
            'フォローアップ研修　メンタルケア研修　キャリア別研修',
            '部門別研修　テーマ別研修　リーダー研修　マネジメント研修',
        ),
    ),
    array(
        'label' => '社員旅行',
        'body'  => array(
            '2017年度　ハワイ',
            '2018年度　ハワイ・オーストラリア・沖縄',
            '2019年度　ハワイ・台湾',
            '2020年度　コロナウイルスにより実施なし',
            '2021年度　コロナウイルスにより実施なし',
            '2022年度　沖縄・ディズニーランド・城崎温泉',
            '2023年度　沖縄（石垣島）',
        ),
    ),
);

$entry_flow = array(
    array(
        'title' => 'エントリー',
        'text'  => array('LINEからエントリーを', 'お願いします。'),
    ),
    array(
        'title' => '1次選考兼説明会',
        'text'  => array('会社説明会とGDでの選考を', '並行して行います。'),
    ),
    array(
        'title' => '2次選考',
        'text'  => array('採用担当者による1対1の', '面談を行います。'),
    ),
    array(
        'title' => '最終選考',
        'text'  => array('当社役員による1対1の', '面談を行います。'),
    ),
    array(
        'title' => '内定',
        'text'  => array(),
    ),
);
?>
<main>
    <?php
    get_template_part(
        'includes/lower-mv',
        null,
        array(
            'en'    => 'Entry',
            'title' => '募集要項 / エントリー',
        )
    );
    ?>

    <section class="p-entry-requirements">
        <div class="l-inner">
            <h2 class="p-entry-requirements__title js-opacity-word">募集要項</h2>
            <div class="p-entry-requirements__table-wrap js-opacity-word">
                <table class="p-entry-requirements__table">
                    <tbody>
                        <?php foreach ($entry_requirements as $row) : ?>
                            <tr>
                                <th scope="row"><?php echo esc_html($row['label']); ?></th>
                                <td>
                                    <?php foreach ($row['body'] as $line) : ?>
                                        <span><?php echo esc_html($line); ?></span>
                                    <?php endforeach; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <section class="p-entry-flow">
        <div class="l-inner">
            <h2 class="p-entry-flow__title js-opacity-word">選考フロー</h2>
            <ol class="p-entry-flow__list">
                <?php foreach ($entry_flow as $index => $step) : ?>
                    <li class="p-entry-flow__item<?php echo count($entry_flow) === $index + 1 ? ' p-entry-flow__item--final' : ''; ?> js-opacity-word">
                        <p class="p-entry-flow__step">STEP <?php echo esc_html((string) ($index + 1)); ?></p>
                        <h3 class="p-entry-flow__item-title"><?php echo esc_html($step['title']); ?></h3>
                        <?php if (! empty($step['text'])) : ?>
                            <p class="p-entry-flow__text">
                                <?php foreach ($step['text'] as $line) : ?>
                                    <span><?php echo esc_html($line); ?></span>
                                <?php endforeach; ?>
                            </p>
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>
            </ol>
        </div>
    </section>

    <section class="p-entry-cta">
        <div class="l-inner">
            <?php
            get_template_part(
                'includes/entry',
                null,
                array(
                    'class'     => 'p-top-entry__content--entry-page',
                    'title'     => 'エントリー',
                    'primary'   => array(
                        'text' => '公式LINEからエントリー',
                        'url'  => '#',
                    ),
                    'sub_links' => array(
                        array(
                            'text' => 'エントリーフォームの場合はこちら',
                            'url'  => home_url('/entry-form/'),
                        ),
                    ),
                )
            );
            ?>
        </div>
    </section>
</main>
<?php get_footer(); ?>
