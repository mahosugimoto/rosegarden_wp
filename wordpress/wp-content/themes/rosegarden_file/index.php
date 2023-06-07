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
            speed: 2000,
            fade: true,
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
                            <p>CONCEPT</p>
                        </div>
                        <div class="page-title_02__jp">
                            <p>コンセプト</p>
                        </div>
                    </div>
                </div>
                <div class="blockstyle01_text__contents">
                    <div class="blockstyle01_text__contents__top">
                        <h2>永い歴史を刻んでゆく大聖堂
                            <span>厳かにはじまる聖霊と大自然の祝福
                        </h2>
                        <p>ヨーロッパの教会が皆そうであるように、その教会は
                            <br>何百年もそこに変わることなくあり続けてほしい、
                            <br>信仰や夫婦の愛が時と共に色褪せることのないように、
                            <br>教会はその象徴であってほしい。
                        </p>
                        <p>そんな想いが込められたローズガーデンクライスト教会
                            <br>には数々のこだわりに満ちています。
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
    <?php if (!empty($topAdvs)):?>
    <div class="top_banner">
        <div class="top_banner-wrap">
            <?php foreach ($topAdvs as $adv): if (!empty($adv['image'])): ?>
                <a href="<?php echo $adv['external_link'];?>" title="<?php echo $adv['title'];?>">
                <div class="top_banner-wrap__img" style="background-image: url(<?php echo $adv['image'];?>);"></div>
                </a>
            <?php endif; endforeach;?>
            </div>
        </div>
    </div>
    <?php endif;?>


    <!-- bridal fair 埋め込み-->



    <!-- customer voice -->

    <div class="top_cv">
        <div class="page-title_02">
            <div class="page-title_02__eng">
                <p>CUSTOMER VOICE</p>
            </div>
            <div class="page-title_02__jp">
                <p>お客様の声</p>
            </div>
        </div>
        <div class=cv_slider-wrap>
            <div class="cv_slider">
                <?php
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
                                        $taxonomy_name = "customer_voice-cat";
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
            <div class="other-page" style="background-image:linear-gradient(rgba(0,0,0,0.4),rgba(0,0,0,0.4)), url(/wp-content/themes/rosegarden_file/assets/img/top_weddingparty.jpg);">
                <a href="<?php echo get_page_link(56); ?>" class="link">
                    <div class="other-page__title">
                        <div class="page-title_07">
                            <div class="page-title_07__eng">
                                <p>WEDDING <br>PARTY</p>
                            </div>
                            <div class="page-title_07__jp">
                                <p>披露宴</p>
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
                            <p>ABOUT CHURCH</p>
                        </div>
                        <div class="page-title_02__jp">
                            <p>教会</p>
                        </div>
                    </div>
                </div>
                <div class="blockstyle02_text__contents">
                    <div class="blockstyle02_text__contents__top">
                        <h2>見守り続けてくれる
                            <span>暖かな教会
                        </h2>
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
                        <p>INFORMATION</p>
                    </div>
                    <div class="page-title_02__jp">
                        <p>お知らせ</p>
                    </div>
                </div>
            </div>
            <div class="liststyle_info">
                <?php
                $args = array(
                    'posts_per_page' => 3,
                    'post_status' => 'publish',
                    'post_type' => 'info',
                );
                $myposts = get_posts($args);
                foreach ($myposts as $post) : setup_postdata($post);
                    $post_categories = wp_get_post_terms($post->ID, 'category', array('fields' => 'slugs'));
                ?>
                    <a href="<?= the_permalink(); ?>">
                        <div class="liststyle_info__block">
                            <div class="liststyle_info__block__img" style="background-image:url(<?php the_post_thumbnail_url(); ?>)"></div>
                            <div class="liststyle_info__block__text">
                                <div class="liststyle_info__ctg">
                                    <p class=""><?= get_the_date() ?></p>
                                    <?php
                                    $taxonomy_name = "info-cat";
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
            <div class="top_other_page__wrap">
                <a href="#">
                    <div class="top_other_page__block">
                        <div class="top_other_page__block__img" style="background-image:url(/wp-content/themes/rosegarden_file/assets/img/top_qa.jpg)">
                        </div>
                        <div class="top_other_page__block__title">
                            <div class="page-title_08">
                                <div class="page-title_08__eng">
                                    <p>Q&A</p>
                                </div>
                                <div class="page-title_08__jp">
                                    <p>よくあるご質問</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="top_other_page__wrap">
                <a href="#">
                    <div class="top_other_page__block">
                        <div class="top_other_page__block__img" style="background-image:url(/wp-content/themes/rosegarden_file/assets/img/top_guest.jpg)">
                        </div>
                        <div class="top_other_page__block__title">
                            <div class="page-title_08">
                                <div class="page-title_08__eng">
                                    <p>GUEST</p>
                                </div>
                                <div class="page-title_08__jp">
                                    <p>ご招待された方へ</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="#">
                    <div class="top_other_page__block">
                        <div class="top_other_page__block__img" style="background-image:url(/wp-content/themes/rosegarden_file/assets/img/top_floorguide.jpg)">
                        </div>
                        <div class="top_other_page__block__title">
                            <div class="page-title_08">
                                <div class="page-title_08__eng">
                                    <p>FLOOR <br>GUIDE</p>
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
    <?php include('footer.php'); ?>
</html>