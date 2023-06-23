<!doctype html>
<html lang="ja">

<head>
    <title><?php wp_title() ?></title>
    <meta charset="<?php bloginfo('charset'); ?>">
    <?php wp_head(); ?>
    <meta property="og:type" content="website">
    <meta property="og:title" content="">
    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.typekit.net/yph8yml.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pinyon+Script&display=swap" rel="stylesheet">
    <link rel="apple-touch-icon-precomposed" href="<?= get_template_directory_uri(); ?>/assets/img/rg_apple-touch-icon.jpg">
    <!-- icon -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <!-- <meta property="og:image" content=""> -->
    <meta property="og:site_name" content="">
    <!-- css stylesheet-->
    <link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/assets/css/reset.css" type="text/css" />
    <link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/assets/css/slick.css">
    <link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/assets/css/slick-theme.css">
    <link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/assets/css/style.css" type="text/css" />
    <link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/assets/css/custom.css" type="text/css" />
    <!-- js stylesheet-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="<?= get_template_directory_uri(); ?>/assets/js/paginathing.min.js"></script>
    <script src="<?= get_template_directory_uri(); ?>/assets/js/slick.min.js"></script>
    <!-- <script src="assets/js/script.js"></script> -->
    <!-- ピンチによる拡大・縮小ができない -->
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
    <!-- ピンチによる拡大・縮小ができる -->
    <meta name="format-detection" content="telephone=no,address=no,email=no">
    <meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <!--<script async src="https://www.googletagmanager.com/gtag/js?id=G-M4LT0LGN6G"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'G-M4LT0LGN6G');
        gtag('config', 'UA-22267949-16');
    </script>-->
    <link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/assets/css/lightbox.css">
   
</head>
<style>
    body {
        width: 100%;
        margin: auto;
        
    }
    html {
        margin-top: 0px;
    }
    .wrapper {
        width: 100%;
        margin: auto;
        max-width: 1440px;
    }
</style>
<script>
    $(function() {
        $(".openbtn").click(function() { //ボタンがクリックされたら
            $(this).toggleClass('active'); //ボタン自身に activeクラスを付与し
            $("#g-nav").toggleClass('panelactive'); //ナビゲーションにpanelactiveクラスを付与
        });

        $("#g-nav a").click(function() { //ナビゲーションのリンクがクリックされたら
            $(".openbtn").removeClass('active'); //ボタンの activeクラスを除去し
            $("#g-nav").removeClass('panelactive'); //ナビゲーションのpanelactiveクラスも除去
        });
    });
</script>
<header>
    <!-- menu -->
    <div class="header-menu">
        <div class="openbtn">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>

    <!-- 開閉時menu-->
    <nav id="g-nav">
        <div id="g-nav-list"><!--ナビの数が増えた場合縦スクロールするためのdiv※不要なら削除-->
            <div id="g-nav-block">
                <div class="header_allmenu">
                    <div class="header_allmenu__logo">
                        <a href="<?php echo home_url('/'); ?>">
                            <img src="<?= get_template_directory_uri(); ?>/assets/img/logo/rg-logo_jp.png" alt="">
                        </a>
                    </div>
                    <div class="header_allmenu__wrap">
                        <nav class="header_allmenu__contents">
                            <ul>
                                <?php
                                $menu_items = wp_get_nav_menu_items('header_menu01');
                                if ($menu_items) :
                                    foreach ($menu_items as $menu) : setup_postdata($menu);
                                ?>
                                        <li><a href="<?php echo esc_attr($menu->url); ?>"><?php echo esc_html($menu->title); ?></a>
                                    <?php
                                    endforeach;
                                endif;
                                wp_reset_postdata();
                                    ?>
                            </ul>
                            <!-- 
                            <ul>
                                <li><a href="<?php echo get_page_link(22); ?>">コンセプト</a></li>
                                <li><a href="<?php echo get_page_link(28); ?>">挙式</a></li>
                                <li><a href="<?php echo get_page_link(56); ?>">ウエディングパーティー/披露宴</a></li>
                                <li><a href="<?php echo get_page_link(15); ?>">ブライダルフェア</a></li>
                                <li><a href="#"></a>ウエディングプラン</a></li>
                                <li><a href="<?php echo get_page_link(24); ?>">お客様の声</a></li>
                                <li><a href="<?php echo get_page_link(32); ?>">ギャラリー</a></li>
                                <li><a href="<?php echo get_page_link(52); ?>">フォトウェディング</a></li>
                                <li><a href="<?php echo get_page_link(30); ?>">リゾートウェディング</a></li>
                                <li><a href="<?php echo get_page_link(26); ?>">ウェディングドレス</a></li>
                                <li><a href="<?php echo get_page_link(36); ?>">よくあるご質問</a></li>
                                <li><a href="<?php echo get_page_link(38); ?>">招待されたお客様へ</a></li>
                                <li><a href="<?php echo get_page_link(59); ?>">「恋人の聖地」について</a></li>
                                <li><a href="<?php echo get_page_link(42); ?>">プロポーズ</a></li>
                                <li><a href="<?php echo get_page_link(34); ?>">お知らせ</a></li>
                                <li><a href="<?php echo get_page_link(59); ?>">「恋人の聖地」について</a></li>
                            </ul>
                             -->
                            <div class="m8"></div>
                            <div class="header_allmenu__menu-s">
                                <?php
                                $menu_items = wp_get_nav_menu_items('header_menu01_s');
                                if ($menu_items) :
                                    foreach ($menu_items as $menu) : setup_postdata($menu);
                                ?>
                                        <p><a href="<?php echo esc_attr($menu->url); ?>"><?php echo esc_html($menu->title); ?></a></p>
                                        <p class="slash">/</p>
                                <?php
                                    endforeach;
                                endif;
                                wp_reset_postdata();
                                ?>
                            </div>
                        </nav>
                        <div class="header_allmenu__contents02">
                            <div class="header_allmenu__contents02__btn">
                                <button class="reservation-btn" onclick="location.href='https://rosegarden-ch.official-wedding.net/fair/list'">
                                    <h3>BRIDAL FAIR</h3>
                                    <p>フェア一覧</p>
                                </button>
                                <button class="reservation-btn" onclick="location.href='https://rosegarden-ch.official-wedding.net/kengaku'">
                                    <h3>RESERVATION</h3>
                                    <p>見学予約</p>
                                </button>
                                <button class="contact-btn" onclick="location.href='https://rosegarden-ch.official-wedding.net/otoiawase'">
                                    <h3>CONTACT</h3>
                                    <p>お問い合わせ</p>
                                </button>
                            </div>
                            <div class="header-top__address">
                                <div class="header-top__address__phone">
                                <p><span>TEL.</span><a href="tel:011-522-0151">011-522-0151</a></p>
                                </div>
                                <p>営業時間：平日 11：00 〜 19：00 <br class="new-line">/ 土日祝 9：00 〜 19：00</p>
                            </div>
                            <div class="m40"></div>
                            <div class="header_allmenu__cta">
                                <div class="header_allmenu__cta__contents">
                                    <a href="tel:011-522-0151">
                                        <div class="header_allmenu__cta__contents__left">
                                            <img src="<?= get_template_directory_uri(); ?>/assets/img/icon/phone.png" alt="">
                                            <p>電話問合せ<br>011-522-0151</p>
                                        </div>
                                    </a>
                                    <a href="https://rosegarden-ch.official-wedding.net/siryo">
                                        <div class="header_allmenu__cta__contents__middle">
                                            <img src="<?= get_template_directory_uri(); ?>/assets/img/icon/paper.png" alt="">
                                            <p>資料請求</p>
                                        </div>
                                    </a>
                                    <a href="https://rosegarden-ch.official-wedding.net/fair/list">
                                        <div class="header_allmenu__cta__contents__right">
                                            <img src="<?= get_template_directory_uri(); ?>/assets/img/icon/fair.png" alt="">
                                            <p>フェア一覧</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <a href="<?php echo get_page_link(15); ?>">
                                <div class="header_allmenu__church" style="background-image:linear-gradient(rgba(51,51,51,0.3),rgba(51,51,51,0.3)), url(/wp-content/themes/rosegarden_file/assets/img/header_church.png);">
                                    <div class="header_allmenu__church__flex">
                                        <img src="<?= get_template_directory_uri(); ?>/assets/img/icon/cross_icon.png" alt="">
                                        <p>教会について</p>
                                    </div>
                                    <div class="church_arrow">
                                        <img src="<?= get_template_directory_uri(); ?>/assets/img/icon/arrow_icon_wh.png" alt="">
                                    </div>
                                </div>
                            </a>
                            <div class="header_allmenu__sns">
                                <div class="header__sns">
                                    <div class="home-sns">
                                        <div class="instagram_icon">
                                            <a href="https://www.instagram.com/rosegarden_christ_church" target="_blank">
                                                <img src="<?= get_template_directory_uri(); ?>/assets/img/icon/instagram.png" alt="">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="m24"></div>
                        </div>
                    </div>
                    <!-- sowa weddings -->
                    <div class="sowa-weddings">
                        <h3>SOWA WEDDINGS</h3>
                        <div class="header_allmenu__menu-s">
                            <?php
                            $menu_items = wp_get_nav_menu_items('sowa_weddings_menu');
                            if ($menu_items) :
                                foreach ($menu_items as $menu) : setup_postdata($menu);
                            ?>
                                    <p><a href="<?php echo esc_attr($menu->url); ?>"><?php echo esc_html($menu->title); ?></a></p>
                                    <p class="slash">/</p>
                            <?php
                                endforeach;
                            endif;
                            wp_reset_postdata();
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- menu展開時 -->

    <!-- header_sp-->

    <div class="header_sp">
        <div class="header_sp__logo">
            <a href="<?php echo home_url('/'); ?>">
                <img src="<?= get_template_directory_uri(); ?>/assets/img/logo/rg-logo_jp.png" alt="">
            </a>
        </div>
    </div>

    </div>
    <script src="<?= get_template_directory_uri(); ?>/assets/js/lightbox.js" type="text/javascript"></script>
    <body>