<?php
/*
Template Name: 教会(宗教)紹介
*/
get_header();
?><?php include('header_icon.php'); ?>
<?php include('cta.php'); ?>

<!-- FV BGあり -->
<!-- PC BG -->
<?php
// SCF::get_post_meta($post->ID, '設定した名前', 画像サイズ)
$img = get_post_meta($post->ID, 'image_pc', true);
?>
<div class="page-background" style="background-image:linear-gradient(rgba(0,0,0,0.4),rgba(0,0,0,0.4)),url(<?php echo wp_get_attachment_url($img) ?>)">
    <img src="<p><?php echo SCF::get('image_pc'); ?></p>" alt="">
    <div class="page-title_05">
        <div class="page-title_05__eng">
            <h1><?php echo SCF::get('title_en'); ?>
            <span><?= get_the_title() ?></span></h1>
        </div>
        <div class="page-title_05__contents">
            <p><?php echo SCF::get('fv_text'); ?></p>
        </div>
    </div>
</div>

<?php require_once('breadcrumb_other.php'); ?>

<?php
// SCF::get_post_meta($post->ID, '設定した名前', 画像サイズ)
$img = get_post_meta($post->ID, 'image_sp', true);
?>
<!-- SP BG -->
<div class="page-background_sp" style="background-image:linear-gradient(rgba(0,0,0,0.4),rgba(0,0,0,0.4)),url(<?php echo wp_get_attachment_url($img) ?>)">
    <img src="<p><?php echo SCF::get('image_sp'); ?></p>" alt="">
    <div class="page-title_05">
        <div class="page-title_05__eng">
            <h1><?php echo SCF::get('title_en'); ?>
            <span><?= get_the_title() ?></span></h1>
        </div>
        <div class="page-title_05__contents">
            <p><?php echo SCF::get('fv_text'); ?></p>
        </div>
    </div>
</div>

<!-- 教会紹介コンテンツ -->
<div class="church">
    <div class="church__top">
        <div class="church__top__text">
            <h2>ようこそローズガーデンクライスト教会にお越し下さいました。
                <br>あなたを心より歓迎いたします。
            </h2>
            <p>日々の礼拝が絶える事のない
                <br>正式なキリスト教会の牧師からのメッセージは、
                <br>まるで家族に対するようにおふたりだけへの言葉で語られ、
                <br>結婚後もおふたりがいつでもここを訪れることのできるようにと
                <br>牧師夫妻が見守り続けてくれる暖かな教会です。
            </p>
        </div>
    </div>
    <div class="church__point">
        <div class="point__point">
            <h2>教会の取り組み</h2>
        </div>
        <div class="m40"></div>
        <div class="point">
            <div class="point__main">
                <div class="point__main__img" style="background-image:url(/wp-content/themes/rosegarden_file/assets/img/church01.jpg)">
                    <div class="image-dcr4 ">
                        <p>Worship</p>
                    </div>
                </div>
                <div class="point__main__text">
                    <div class="page-title_11">
                        <div class="page-title_11__eng">
                            <h3>WORSHIP</h3>
                        </div>
                        <div class="page-title_11__jp">
                            <p>礼拝・集会</p>
                        </div>
                    </div>
                    <div class="m16"></div>
                    <h4>教会で癒しの時間を。<br>礼拝・集会</h4>
                    <p>毎週日曜日/10：40〜　※ユース礼拝堂
                        <br>祈りと黙想の時　※随時
                        <br>Zoomにて礼拝に参加できます。詳しくは牧師にお尋ねください。
                    </p>
                </div>
            </div>
            <div class="point__main">
                <div class="point__main__img" style="background-image:url(/wp-content/themes/rosegarden_file/assets/img/church02.jpg)">
                    <div class="image-dcr4 ">
                        <p>Music</p>
                    </div>
                </div>
                <div class="point__main__text">
                    <a name="entrance-hall"></a>
                    <div class="page-title_11">
                        <div class="page-title_11__eng">
                            <h3>MUSIC</h3>
                        </div>
                        <div class="page-title_11__jp">
                            <p>音楽イベント</p>
                        </div>
                    </div>
                    <div class="m16"></div>
                    <h4>音楽に関わるイベント</h4>
                    <p>パイプオルガン演奏会、講習会・パーカッション ・賛美歌 ・ヴァイオリン・フルート ・ピアノ ・子供音楽クラスなど様々な音楽イベントを行なっております。</p>
                </div>
            </div>
            <div class="point__main">
                <div class="point__main__img" style="background-image:url(/wp-content/themes/rosegarden_file/assets/img/church03.jpg)">
                    <div class="image-dcr4 ">
                        <p>Life Counseling</p>
                    </div>
                </div>
                <div class="point__main__text">
                    <div class="page-title_11">
                        <div class="page-title_11__eng">
                            <h3>LIFE COUNSELING</h3>
                        </div>
                        <div class="page-title_11__jp">
                            <p>人生相談</p>
                        </div>
                    </div>
                    <div class="m16"></div>
                    <h4>皆様の幸せを願う牧師の人生相談</h4>
                    <p>今、苦しみと悲しみの中にある方は遠慮なくご連絡ください。</p>
                </div>
            </div>
            <div class="point__main">
                <div class="point__main__img" style="background-image:url(/wp-content/themes/rosegarden_file/assets/img/church04.jpg)">
                    <div class="image-dcr4 ">
                        <p>Ceremony</p>
                    </div>
                </div>
                <div class="point__main__text">
                    <div class="page-title_11">
                        <div class="page-title_11__eng">
                            <h3>CEREMONY</h3>
                        </div>
                        <div class="page-title_11__jp">
                            <p>チャペル</p>
                        </div>
                    </div>
                    <div class="m16"></div>
                    <h4>人生の節目におけるセレモニーの実施</h4>
                    <p>婚約式･結婚式･子ども誕生祝福式
                        <br>アニバーサリー（錫婚・銀婚･金婚）祝福式 など
                    </p>
                </div>
            </div>
            <div class="point__main">
                <div class="point__main__img" style="background-image:url(/wp-content/themes/rosegarden_file/assets/img/church05.jpg)">
                    <div class="image-dcr4 ">
                        <p>Other</p>
                    </div>
                </div>
                <div class="point__main__text">
                    <div class="page-title_11">
                        <div class="page-title_11__eng">
                            <h3>OTHER</h3>
                        </div>
                        <div class="page-title_11__jp">
                            <p>チャペル</p>
                        </div>
                    </div>
                    <div class="m16"></div>
                    <h4>その他さまざまな取り組みを
                        <br>行っています
                    </h4>
                    <p>結婚準備セミナー
                        <br>｢家族のために｣学び会 ※幸せな家庭作りの学び
                        <br>リングピローを作る会
                        <br>ガラス工芸･講習会手話賛美の集い
                        <br>※手話を通し神を賛美します
                        <br>聖書的質素な葬送を考える会
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- 他のページ -->
    <div class="church__other-page">
        <div class="top_other-page">
            <div class="other-page-wrap1">
                <?php
                $repeat_group = SCF::get('other-page');
                foreach ($repeat_group as $fields) {
                    $text1_id = $fields['other-page_en-title']; // フィールドの値を取得
                    $text2_id = $fields['other-page_jp-title']; // フィールドの値を取得
                    $text3_id = $fields['other-page_link']; // フィールドの値を取得
                    $image_id2 = $fields['other-page_img']; // フィールドの値を取得
                    $image_url2 = wp_get_attachment_image_url($image_id2, 'full'); // 添付ファイルの画像のURLを取得
                ?>
                    <div class="other-page" style="background-image:linear-gradient(rgba(0,0,0,0.4),rgba(0,0,0,0.4)), url('<?php echo esc_url($image_url2); ?>');">
                        <a href="<? echo esc_html($text3_id); ?>" class="link">
                            <div class="other-page__title">
                                <div class="page-title_07">
                                    <div class="page-title_07__eng">
                                        <h2><?php echo ($text1_id); ?></h2>
                                    </div>
                                    <div class="page-title_07__jp">
                                        <p><?php echo ($text2_id); ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="other-page__arrow">
                                <div class="arrow_icon">
                                    <img src="/wp-content/themes/rosegarden_file/assets/img/icon/arrow_icon_wh.png" alt="">
                                </div>
                            </div>
                        </a>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
    <!-- 教会イベント一覧 -->
    <div class="church__listblock">
        <div class="point__point">
            <h2>教会イベント</h2>
        </div>
        <div class="church_event">
            <div class="church_event__list">
                <div class="lace-dcr_top">
                    <div class="lace-dcr_bottom__img">
                        <img src="/wp-content/themes/rosegarden_file/assets/img/dcr/lace.png" alt="">
                    </div>
                </div>
                <div class="liststyle_church_event2">
                    <?php
                    $taxonomy_name = 'church_event-cat';
                    $args = array(
                        'posts_per_page' => 3,
                        'post_status' => 'publish',
                        'post_type' => 'church_event',
                    );

                    $myposts = get_posts($args);
                    foreach ($myposts as $post) : setup_postdata($post);
                        $post_categories = wp_get_post_terms($post->ID, $taxonomy_name, array('fields' => 'slugs'));
                    ?>
                        <a href="<?= the_permalink(); ?>">
                            <div class="liststyle_church_event2__block" data-categories="<?= implode(' ', $post_categories); ?>">
                                <div class="liststyle_church_event2__block__img" style="background-image:url(<?php the_post_thumbnail_url(); ?>)">
                                </div>
                                <div class="liststyle_church_event2__block__text">
                                    <div class="liststyle_church_event2__ctg">
                                        <?php
                                        foreach ($post_categories as $category_slug) {
                                            $term = get_term_by('slug', $category_slug, $taxonomy_name);
                                            if ($term) {
                                                echo '<p class="ctg_style02">' . $term->name . '</p>';
                                            }
                                        }
                                        ?>
                                    </div>
                                    <h3><?= get_the_title() ?></h3>
                                    <p><?php echo SCF::get('church_event_title'); ?></p>
                                    <p><?php echo SCF::get('church_event_text'); ?></p>
                                </div>
                            </div>
                        </a>
                    <?php
                    endforeach;
                    wp_reset_postdata();
                    ?>
                    <div class="m16"></div>
                    <div class="church_event__list__title">
                        <button class="page-btn" onclick="location.href='<?php echo get_page_link(46); ?>'">
                            <p>イベントをもっと見る</p>
                        </button>
                    </div>
                </div>
                <div class="liststyle_church_event2__btn">
                    <!-- 教会アンカーリンク -->
                </div>
                <div class="lace-dcr_bottom">
                    <div class="lace-dcr_bottom__img">
                        <img src="/wp-content/themes/rosegarden_file/assets/img/dcr/lace02.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="church-info">
        <h2>お願い</h2>
        <p>私たちの教会は、「北海道いのちの電話」「北海道盲導犬教会」「ワールドビジョン」※に定期的に献金を送っています。志のある方はご協力をお願いいたします。
            <br>※貧困にいる世界の子どもたちのための援助団体
        </p>
        <div class="m40"></div>
        <div class="church-info__address">
            <h2>教会に関するご予約・お問合わせ</h2>
            <div class="address__phone">
                <p><span><a href="tel:011-522-0151">TEL.</span>011-522-0151</a></p>
            </div>
        </div>
    </div>
    <div class="church__pastor">
        <div class="church__pastor__contents">
            <div class="blockstyle05">
                <div class="blockstyle04__imgblock">
                    <div class="blockstyle05__imgblock__img" style="background-image:url(/wp-content/themes/rosegarden_file/assets/img/church_pastor.jpg); background-position:10% 58%">
                        <div class="image-dcr">
                            <p>Pastor</p>
                        </div>
                    </div>
                </div>
                <div class="blockstyle05__textblock">
                    <div class="blockstyle05__imgblock__text">
                        <p>主任牧師</p>
                        <h3>大野 晃</h3>
                        <p class="name-font">Akira Ono</p>
                    </div>
                    <p>大礼拝堂を支え、回廊を巡る石柱や石畳、館内を飾る美術品の数々、建築資材、備品のほとんどが北イタリアのロンバルディア地方から運ばれました。例えばドア１つにしても何百年ももつ物であるからこそ変わらずいつまでもそこにある、特別な存在としてありつづけるのです。</p>
                    <div class="m48"></div>
                    <div class="blockstyle05__imgblock__btn">
                        <div class="church__pastor__btn01">
                            <button class="page-btn_pastor" onclick="location.href='<?php echo get_page_link(48); ?>'">
                                <p>牧師ブログを見る</p>
                            </button>
                        </div>
                        <div class="church__pastor__btn02" onclick="location.href='<?php echo get_page_link(50); ?>'">
                            <button class="page-btn_pastor">
                                <p>牧師についてもっと知る</p>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- 他のページ -->
    <div class="church__other-page">
        <div class="top_other-page">
           
                <div class="other-page-wrap1">
                <?php
            $repeat_group = SCF::get('other-page2');
            foreach ($repeat_group as $fields) {
                $text4_id = $fields['other-page2_en-title']; // フィールドの値を取得
                $text5_id = $fields['other-page2_jp-title']; // フィールドの値を取得
                $text6_id = $fields['other-page2_link']; // フィールドの値を取得
                $image_id3 = $fields['other-page2_img']; // フィールドの値を取得
                $image_url3 = wp_get_attachment_image_url($image_id3, 'full'); // 添付ファイルの画像のURLを取得
            ?>
                    <div class="other-page" style="background-image:linear-gradient(rgba(0,0,0,0.4),rgba(0,0,0,0.4)), url('<?php echo esc_url($image_url3); ?>');">
                        <a href="<? echo ($text6_id); ?>" class="link">
                            <div class="other-page__title">
                                <div class="page-title_07">
                                    <div class="page-title_07__eng">
                                        <h2><?php echo ($text4_id); ?></h2>
                                    </div>
                                    <div class="page-title_07__jp">
                                        <p><?php echo ($text5_id); ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="other-page__arrow">
                                <div class="arrow_icon">
                                    <img src="/wp-content/themes/rosegarden_file/assets/img/icon/arrow_icon_wh.png" alt="">
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php
            }
            ?>
                </div>
        </div>
    </div>
</div>

<div class="m80"></div>
<?php include('other_page.php'); ?>
<?php get_footer(); ?>