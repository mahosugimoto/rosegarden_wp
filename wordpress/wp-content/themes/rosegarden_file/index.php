<?php include('header_top.php'); ?>
<?php
/*
Template Name: トップ
*/
?>
<!-- fv -->
<?php include('cta.php'); ?>

<!-- jquery -->
<script src="<?= get_template_directory_uri(); ?>/assets/js/jquery-3.6.0.min.js"></script>
<!-- header -->
<script>
    $(function() {
        $('.fv_slider').slick({
            dots: true,
            accessibility: true,
            autoplay: true,
            autoplaySpeed: 3000,
            fade: true,
            arrows: false,
        });
        $('.fv_slider2').slick({
            dots: true,
            accessibility: true,
            autoplay: true,
            autoplaySpeed: 3000,

            fade: true,
            arrows: false,
        });
        $(".cv_slider").slick({
            dots: true,
            infinite: true,
            slidesToShow: 3,
            slidesToScroll: 1,
            prevArrow: $('.custom-prev'),
            nextArrow: $('.custom-next'),
            responsive: [{
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1
                    }
                }
            ]
        });
    });
</script>
<div class="fv">
    <div class="fv_slider-wrap">
        <div class="scroll-dcr">
            <img src="/wp-content/themes/rosegarden_file/assets/img/dcr/scroll.png" alt="">
        </div>
        <div class="fv_slider">
            <?php
            $repeat_group = SCF::get('top-fv');
            foreach ($repeat_group as $fields) {
                $text_id = $fields['top-fv_title'];
                $image_id = $fields['top-fv_image']; 
                $image_url = wp_get_attachment_image_url($image_id, 'full'); // 添付ファイルの画像のURLを取得
            ?>
                <div class="fv_slide1" style="background-image: url('<?php echo esc_url($image_url); ?>');">
                    <div class="fv_catch-copy">
                        <h1><?php echo ($text_id); ?></h1>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
        <div class="fv_slider2">
            <?php
            $repeat_group = SCF::get('top-fv');
            foreach ($repeat_group as $fields) {
                $text_id = $fields['top-fv_title'];
                $image_id_sp = $fields['top-fv_image_sp'];
                $image_url_sp = wp_get_attachment_image_url($image_id_sp, 'full'); // 添付ファイルの画像のURLを取得
            ?>
                <div class="fv_slide2" style="background-image: url('<?php echo esc_url($image_url_sp); ?>');">
                    <div class="fv_catch-copy">
                        <h1><?php echo ($text_id); ?></h1>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>

<div class="wrapper">
<!-- FV slider 
<div class="fv">
    <div class="fv_slider-wrap">
        <div class="fv_catch-copy">
            <h1>札幌市を一望できる<br>伏見の丘の上の結婚式場</h1>
            <h1>本物の教会で行う<br>最高のウェディング</h1>
        </div>
        <div class="scroll-dcr">
            <img src="/wp-content/themes/rosegarden_file/assets/img/dcr/scroll.png" alt="">
        </div>
        <div class="fv_slider">
            <div class="fv_slide1" style="background-image: url(/wp-content/themes/rosegarden_file/assets/img/fv01.jpg);"></div>
            <div class="fv_slide2" style="background-image: url(/wp-content/themes/rosegarden_file/assets/img/fv02.jpg);"></div>
            <div class="fv_slide3" style="background-image: url(/wp-content/themes/rosegarden_file/assets/img/fv03.jpg);"></div>
        </div>
        <div class="slick-next"></div>
    </div>
</div>
-->

<!-- concept -->
<div class="top_concept">
    <div class="blockstyle01">
        <div class="blockstyle01_img">
            <div class="concept_image-dcr2">
                <div class="image-dcr2">
                    <p>Consept</p>
                </div>
            </div>
            <div class="grid5">
                <div class="grid5__item1">
                    <img src="/wp-content/themes/rosegarden_file/assets/img/grid01.png" alt="">
                </div>
                <div class="grid5__item2">
                    <img src="/wp-content/themes/rosegarden_file/assets/img/grid02.png" alt="">
                </div>
                <div class="grid5__item3">
                    <img src="/wp-content/themes/rosegarden_file/assets/img/grid03.png" alt="">
                </div>
                <div class="grid5__item4">
                    <img src="/wp-content/themes/rosegarden_file/assets/img/grid04.png" alt="">
                </div>
                <div class="grid5__item5">
                    <img src="/wp-content/themes/rosegarden_file/assets/img/grid05.png" alt="">
                </div>
            </div>
            <div class="concept_sp">
                <img src="/wp-content/themes/rosegarden_file/assets/img/concept_sp.png" alt="">
            </div>
        </div>
        <div class="blockstyle01_text">
            <div class="blockstyle01_text__title">
                <div class="page-title_02">
                    <div class="page-title_02__eng">
                        <h2>CONCEPT</h2>
                    </div>
                    <div class="page-title_02__jp">
                        <p>コンセプト</p>
                    </div>
                </div>
            </div>
            <div class="blockstyle01_text__contents">
                <div class="blockstyle01_text__contents__top">
                    <h3>永い歴史を刻んでゆく大聖堂
                        <span>厳かにはじまる聖霊と大自然の祝福
                    </h3>
                    <p>ヨーロッパの教会が皆そうであるように、その教会は
                        <br>何百年もそこに変わることなくあり続けてほしい、
                        <br>信仰や夫婦の愛が時と共に色褪せることのないように、
                        <br>教会はその象徴であってほしい。
                    </p>
                    <p>そんな想いが込められたローズガーデンクライスト教会<br>は数々のこだわりに満ちています。
                    </p>
                </div>
                <div class="blockstyle01_text__contents__btn">
                    <button class="page-btn" onclick="location.href='<?php echo get_page_link(22); ?>'">
                        <p>詳しく見る</p>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- banner -->
<?php
$topAdvs = topAdvertisements();
?>
<?php if (!empty($topAdvs)) : ?>
    <div class="top_banner">
        <div class="top_banner-wrap">
            <?php foreach ($topAdvs as $adv) : if (!empty($adv['image'])) : ?>
                    <a href="<?php echo $adv['external_link']; ?>" title="<?php echo $adv['title']; ?>">
                        <div class="top_banner-wrap__img" style="background-image: url(<?php echo $adv['image']; ?>);"></div>
                    </a>
            <?php endif;
            endforeach; ?>
        </div>
    </div>
<?php endif; ?>


<!-- ブライダルフェア -->
<iframe id="connect-parts2" src="https://rosegarden-ch.official-wedding.net/fair/parts/release2/reco_and_cal_and_content?parts_id=connect-parts2" width="100%" frameborder="0" scrolling="no" style="margin-top:0px;"></iframe>
<script type="text/javascript" src="https://rosegarden-ch.official-wedding.net/release2/asset/js/parts-util.js"></script>

<!-- プラン -->
<iframe id="connect-parts1" src="https://rosegarden-ch.official-wedding.net/plan/parts/recommend?parts_id=connect-parts1" width="100%" frameborder="0" scrolling="no" style="margin-top:0px;"></iframe>
<script type="text/javascript" src="https://rosegarden-ch.official-wedding.net/release2/asset/js/parts-util.js"></script>

<div class="m80"></div>

<!-- customer voice -->
<div class="top_cv">
    <div class="page-title_02">
        <div class="page-title_02__eng">
            <h2>CUSTOMER VOICE</h2>
        </div>
        <div class="page-title_02__jp">
            <p>お客様の声</p>
        </div>
    </div>
    <div class=cv_slider-wrap>
        <div class="cv_slider">
            <?php
            $taxonomy_name = "customer_voice-cat";
            $args = array(
                'posts_per_page' => 10,
                'post_status' => 'publish',
                'post_type' => 'customer_voice',
            );
            $myposts = get_posts($args);
            foreach ($myposts as $post) : setup_postdata($post);
                $post_categories = wp_get_post_terms($post->ID, $taxonomy_name, array('fields' => 'slugs'));
            ?>
                <a href="<?= the_permalink(); ?>">
                    <div class="cv_block" data-categories="<?= implode(' ', $post_categories); ?>">
                        <div class="cv_block__img" style="background-image:url(<?php the_post_thumbnail_url(); ?>)">
                        </div>
                        <div class="cv_block__text">
                            <h3><?= get_the_title() ?></h3>
                            <div class="cv_category">
                                <div class="cv_category__style">
                                    <p>スタイル：</p>
                                    <?php
                                    $this_terms = get_the_terms($post->ID, $taxonomy_name);
                                    if ($this_terms && !is_wp_error($this_terms)) {
                                        foreach ($this_terms as $key => $term) {
                                            echo '<p class="tag-style">' . $term->name . '</p>';
                                        }
                                    }
                                    ?>
                                </div>
                                <div class="cv_category__season">
                                    <p>季節：</p>
                                    <?php
                                    $taxonomy_name = "customer_voice-tag";
                                    $this_terms = get_the_terms($post->ID, $taxonomy_name);
                                    if ($this_terms && !is_wp_error($this_terms)) {
                                        foreach ($this_terms as $key => $term) {
                                            echo '<p class="tag-style">' . $term->name . '</p>';
                                        }
                                    }
                                    ?>
                                </div>
                            </div>

                        </div>
                    </div>
                </a>
            <?php
            endforeach;
            wp_reset_postdata();
            ?>
        </div>
        <button class="custom-prev"></button>
        <button class="custom-next"></button>
    </div>
    <div class="top_cv__btn">
        <button class="page-btn_icon" onclick="location.href='<?php echo get_page_link(295); ?>'">
            <img src="/wp-content/themes/rosegarden_file/assets/img/icon/list_icon.png" alt="">
            <p>お客様の声一覧を見る</p>
        </button>
    </div>
    <div class="lace-dcr_bottom">
        <div class="lace-dcr_bottom__img">
            <img src="/wp-content/themes/rosegarden_file/assets/img/dcr/lace02.png" alt="">
        </div>
    </div>
</div>

<!-- other page -->

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
            <a href="<?php echo esc_html($text3_id); ?>" class="link">
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
<!--  
<div class="other-page" style="background-image:linear-gradient(rgba(0,0,0,0.4),rgba(0,0,0,0.4)), url(/wp-content/themes/rosegarden_file/assets/img/top_dress.jpg);">
    <a href="<?php echo get_page_link(26); ?>" class="link">
        <div class="other-page__title">
            <div class="page-title_07">
                <div class="page-title_07__eng">
                    <p>WEDDING DRESS</p>
                </div>
                <div class="page-title_07__jp">
                    <p>ウエディングドレス</p>
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
<div class="other-page" style="background-image:linear-gradient(rgba(0,0,0,0.4),rgba(0,0,0,0.4)), url(/wp-content/themes/rosegarden_file/assets/img/top_resortwedding.jpg);">
    <a href="<?php echo get_page_link(30); ?>" class="link">
        <div class="other-page__title">
            <div class="page-title_07">
                <div class="page-title_07__eng">
                    <p>RESORT<br> WEDDING</p>
                </div>
                <div class="page-title_07__jp">
                    <p>リゾート ウエディング</p>
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

<div class="other-page" style="background-image:linear-gradient(rgba(0,0,0,0.4),rgba(0,0,0,0.4)), url(/wp-content/themes/rosegarden_file/assets/img/top_ceremony.jpg);">
    <a href="<?php echo get_page_link(28); ?>" class="link">
        <div class="other-page__title">
            <div class="page-title_07">
                <div class="page-title_07__eng">
                    <p>CEREMONY</p>
                </div>
                <div class="page-title_07__jp">
                    <p>挙式</p>
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
<div class="other-page" style="background-image:linear-gradient(rgba(0,0,0,0.4),rgba(0,0,0,0.4)), url(/wp-content/themes/rosegarden_file/assets/img/top_gallery.jpg);">
    <a href="<?php echo get_page_link(8189); ?>" class="link">
        <div class="other-page__title">
            <div class="page-title_07">
                <div class="page-title_07__eng">
                    <p>GALLERY</p>
                </div>
                <div class="page-title_07__jp">
                    <p>ギャラリー</p>
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
</div>
-->

</div>

<!-- about church -->
<div class="top_church">
    <div class="blockstyle02" style="flex-direction: row-reverse">
        <div class="blockstyle02_img" style="background-image:url(/wp-content/themes/rosegarden_file/assets/img/top_aboutchurch.jpg)">
            <div class="concept_image-dcr2">
                <div class="image-dcr2">
                    <p>Church</p>
                </div>
            </div>
        </div>
        <div class="blockstyle02_text">
            <div class="blockstyle02_text__title">
                <div class="page-title_02">
                    <div class="page-title_02__eng">
                        <h2>ABOUT CHURCH</h2>
                    </div>
                    <div class="page-title_02__jp">
                        <p>教会</p>
                    </div>
                </div>
            </div>
            <div class="blockstyle02_text__contents">
                <div class="blockstyle02_text__contents__top">
                    <h3>見守り続けてくれる
                        <span>暖かな教会
                    </h3>
                    <p>日々の礼拝が絶える事のない
                        <br>何百年もそこに変わることなくあり続けてほしい、
                        <br>正式なキリスト教会の牧師からのメッセージは、
                        <br>まるで家族に対するようなおふたりだけへの言葉。
                    </p>
                    <p>結婚後もおふたりがいつでもここを
                        <br>訪れることのできるようにと
                        <br>牧師夫妻が見守り続けてくれる暖かな教会です。
                    </p>
                </div>
                <div class="blockstyle02_text__contents__btn">
                    <button class="page-btn" onclick="location.href='<?php echo get_page_link(15); ?>'">
                        <p>詳しく見る</p>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- information -->
<div class="top_info" style="background-image: linear-gradient(rgba(235,232,227,0.35),rgba(235,232,227,0.35)),url(/wp-content/themes/rosegarden_file/assets/img/top_info_cover.jpg)">
    <div class="top_info__list">
        <div class="top_info__list__title">
            <div class="page-title_02">
                <div class="page-title_02__eng">
                    <h2>INFORMATION</h2>
                </div>
                <div class="page-title_02__jp">
                    <p>お知らせ</p>
                </div>
            </div>
        </div>
        <div class="liststyle_info">
            <?php
            $taxonomy_name = "information-cat";
            $args = array(
                'posts_per_page' => 3,
                'post_status' => 'publish',
                'post_type' => 'information',
            );
            $myposts = get_posts($args);
            foreach ($myposts as $post) : setup_postdata($post);
                $post_categories = wp_get_post_terms($post->ID, $taxonomy_name, array('fields' => 'slugs'));
            ?>
                <a href="<?= the_permalink(); ?>">
                    <div class="liststyle_info__block">
                        <div class="liststyle_info__block__img" style="background-image:url(<?php the_post_thumbnail_url(); ?>)"></div>
                        <div class="liststyle_info__block__text">
                            <div class="liststyle_info__ctg">
                                <p class=""><?= get_the_date() ?></p>
                                <?php
                                $this_terms = get_the_terms($post->ID, $taxonomy_name);
                                if ($this_terms && !is_wp_error($this_terms)) {
                                    foreach ($this_terms as $key => $term) {
                                        echo '<p class="ctg_style02">' . $term->name . '</p>';
                                    }
                                }
                                ?>
                            </div>
                            <h3><?= get_the_title(); ?></h3>
                        </div>
                    </div>
                </a>
            <?php
            endforeach;
            wp_reset_postdata();
            ?>
        </div>
        <div class="liststyle_info__btn">
            <button class="page-btn_icon" onclick="location.href='<?php echo get_page_link(7783); ?>'">
                <img src="/wp-content/themes/rosegarden_file/assets/img/icon/list_icon.png" alt="">
                <p>お知らせ一覧を見る</p>
            </button>
        </div>
    </div>
    <div class="m40"></div>
    <div class="top_info__other">
        <!-- 他のページの写し -->
        <div class="top_other_page__wrap2">
            <a href="<?php echo get_page_link(36); ?>">
                <div class="top_other_page__block2">
                    <div class="top_other_page__dcr-left">
                        <img src="/wp-content/themes/rosegarden_file/assets/img/dcr/qa_btn-dcr_left.png)" alt="">
                    </div>
                    <div class="top_other_page__block2__title">
                        <div class="page-title_08">
                            <div class="page-title_08__eng">
                                <h2>Q&A</h2>
                            </div>
                            <div class="page-title_08__jp">
                                <p>よくあるご質問</p>
                            </div>
                        </div>
                    </div>
                    <div class="top_other_page__dcr-right">
                        <img src="/wp-content/themes/rosegarden_file/assets/img/dcr/qa_btn-dcr_right.png)" alt="">
                    </div>
                </div>
            </a>
        </div>
        <div class="top_other_page__wrap">
            <a href="<?php echo get_page_link(38); ?>">
                <div class="top_other_page__block">
                    <div class="top_other_page__block__img" style="background-image:url(/wp-content/themes/rosegarden_file/assets/img/top_guest.jpg)">
                    </div>
                    <div class="top_other_page__block__title">
                        <div class="page-title_08">
                            <div class="page-title_08__eng">
                                <h2>GUEST</h2>
                            </div>
                            <div class="page-title_08__jp">
                                <p>ご招待された方へ</p>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            <a href="<?php echo get_page_link(40); ?>">
                <div class="top_other_page__block">
                    <div class="top_other_page__block__img" style="background-image:url(/wp-content/themes/rosegarden_file/assets/img/top_floorguide.jpg)">
                    </div>
                    <div class="top_other_page__block__title">
                        <div class="page-title_08">
                            <div class="page-title_08__eng">
                                <h2>FLOOR <br>GUIDE</h2>
                            </div>
                            <div class="page-title_08__jp">
                                <p>フロアガイド</p>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <!-- 他のページの写し -->
</div>
<div class="m80"></div>
</div>
<?php include('footer.php'); ?>

</html>