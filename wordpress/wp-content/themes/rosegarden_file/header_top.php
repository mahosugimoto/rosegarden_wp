<!doctype html>
<html lang="ja">

<head>

    <meta charset="<?php bloginfo('charset'); ?>">
    <?php wp_head(); ?>
    <meta charset="utf-8">
    <title><?php wp_title() ?></title>
    <meta name="description" content="">
    <meta name="keywords" content="" />

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
    <!-- icon -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <!-- <meta property="og:image" content=""> -->
    <meta property="og:site_name" content="">
    <!-- css stylesheet-->
    <link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/assets/css/reset.css" type="text/css" />
    <link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/assets/css/slick.css">
    <link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/assets/css/slick-theme.css">
    <link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/assets/css/style.css" type="text/css" />
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
</head>
<style>
    html {
        margin-top: 0px;
    }

    body {
        width: 100%;
        max-width: 1440px;
        margin: auto;
    }
</style>
<script>
    $(function() {
        $(document).ready(function() {
            // ボタンを最初は非表示にする
            $('.button').hide();

            // ウィンドウの幅に応じてボタンの表示を制御
            function toggleOpenBtn() {
                var windowWidth = $(window).width();

                if (windowWidth <= 768) {
                    $('.openbtn').show();
                } else {
                    $('.openbtn').hide();
                }
            }

            // 初期表示時にボタンの表示を切り替える
            toggleOpenBtn();

            // ウィンドウの幅が変わったときにボタンの表示を切り替える
            $(window).resize(function() {
                toggleOpenBtn();
            });

            // スクロール位置が特定の閾値を超えたらボタンを表示
            var isAnimating = false; // アニメーションの状態を管理するフラグ
            var threshold = 500; // 閾値
            $(window).scroll(function() {
                var scrollPos = $(window).scrollTop();

                if (scrollPos > threshold && !isAnimating) {
                    $('.openbtn').fadeIn();
                } else if (scrollPos <= threshold && !isAnimating && $(window).width() > 768) {
                    $('.openbtn').fadeOut();
                }
            });
        });
        $(document).ready(function() {
            $(window).scroll(function() {
                var scrollPos = $(window).scrollTop();
                if (scrollPos > 200) {
                    // スクロール位置が200ピクセルを超える場合、メニューをしまう
                    $('.header').addClass('collapsed');
                } else {
                    // スクロール位置が200ピクセル以下の場合、メニューを表示する
                    $('.header').removeClass('collapsed');
                }
            });
        });
    });
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
                                <h2><span>TEL.</span><a href="tel:011-522-0151">011-522-0151</a></h2>
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
                                    <a href="https://www.instagram.com/rosegarden_christ_church" target="_blank">
                                        <div class="home-sns">

                                            <div class="instagram_icon">

                                                <img src="<?= get_template_directory_uri(); ?>/assets/img/icon/instagram.png" alt="">

                                            </div>
                                        </div>
                                    </a>
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
    <div class="header">
        <div class="header__logo">
            <a href="<?php echo home_url('/'); ?>">
                <img src="<?= get_template_directory_uri(); ?>/assets/img/logo/rg-logo02.png" alt="">
            </a>
        </div>
        <nav class="header__contents">
            <ul>
                <?php
                $menu_items = wp_get_nav_menu_items('left_menu');
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
                <li><a href="<?php echo get_page_link(45); ?>">トップ</a></li>
                <li><a href="#">ブライダルフェア</a></li>
                <li><a href="#">プラン</a></li>
                <li><a href="<?php echo get_page_link(24); ?>">お客様の声</a></li>
                <li><a href="<?php echo get_page_link(40); ?>">フロアガイド</a></li>
                <li><a href="<?php echo get_page_link(26); ?>">ウエディングドレス</a></li>
                <li><a href="<?php echo get_page_link(30); ?>">リゾートウェディング</a></li>
                <li><a href="#">挙式レポート</a></li>
                <li><a href="<?php echo get_page_link(32); ?>">ギャラリー</a></li>
                <li><a href="<?php echo get_page_link(59); ?>">恋人の聖地</a></li>
            </ul>
             -->
        </nav>
        <a href="<?php echo get_page_link(15); ?>">
            <div class="header__church" style="background-image:linear-gradient(rgba(0,0,0,0.4),rgba(0,0,0,0.4)), url(/wp-content/themes/rosegarden_file/assets/img/header_church.jpg);">
                <div class="header__church__flex">
                    <img src="<?= get_template_directory_uri(); ?>/assets/img/icon/cross_icon.png" alt="">
                    <p>教会について</p>
                </div>
                <div class="church_arrow">
                    <img src="<?= get_template_directory_uri(); ?>/assets/img/icon/arrow_icon_wh.png" alt="">
                </div>
            </div>
        </a>
        <div class="header__sns">

            <div class="home-sns">
                <p><a href="<?php
                            echo home_url('/');
                            ?>">HOME</a></p>
                <div class="instagram_icon">
                    <a href="https://www.instagram.com/rosegarden_christ_church" target="_blank">
                        <img src="<?= get_template_directory_uri(); ?>/assets/img/icon/instagram.png" alt="">
                    </a>
                </div>
            </div>

        </div>
    </div>
</header>
<!-- header_end -->

<!-- header_sp-->

<div class="header_sp">
    <div class="header_sp__logo">
        <a href="<?php echo home_url('/'); ?>">
            <img src="<?= get_template_directory_uri(); ?>/assets/img/logo/rg-logo_jp.png" alt="">
        </a>
    </div>
</div>

<!-- header_allmenu -->
<!--  
<div class="header_allmenu">
    <div class="header_allmenu__logo">
        <img src="<?= get_template_directory_uri(); ?>/assets/img/logo/rg-logo.png" alt="">
    </div>
    <div class="header_allmenu__wrap">
        <nav class="header_allmenu__contents">
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
            <div class="m8"></div>
            <div class="header_allmenu__menu-s">
                <p><a href="<?php echo get_page_link(20); ?>">アクセス<span>/</span></a></p>
                <p><a href="<?php echo get_page_link(40); ?>">フロアガイド<span>/</span></a></p>
                <p><a href="<?php echo get_page_link(54); ?>">挙式スケジュール <span>/</span></a></p>
                <p><a href="<?php echo get_page_link(44); ?>">イベントスケジュール</a></p>
            </div>
        </nav>
        <div class="header_allmenu__contents02">
            <div class="footer-contents__btn">
                <button class="reservation-btn">
                    <h3>RESERVATION</h3>
                    <p>フェア予約/見学予約</p>
                </button>
                <button class="contact-btn">
                    <h3>CONTACT</h3>
                    <p>資料請求/お問い合わせ</p>
                </button>
            </div>
            <div class="m40"></div>
            <div class="footer-top__address">
                <h2><span>TEL.</span>011-522-0151</h2>
                <p>営業時間: 平日 11:00 〜 19:00 <br class="new-line">/ 土日祝 9:00 〜 19:00</p>
            </div>
            <div class="m40"></div>
            <div class="header_allmenu__cta">
                <div class="header_allmenu__cta__contents">
                    <a href="#">
                        <div class="header_allmenu__cta__contents__left">
                            <img src="<?= get_template_directory_uri(); ?>/assets/img/icon/phone.png" alt="">
                            <p>電話問合せ<br>011-522-0151</p>
                        </div>
                    </a>
                    <a href="#">
                        <div class="header_allmenu__cta__contents__middle">
                            <img src="<?= get_template_directory_uri(); ?>/assets/img/icon/paper.png" alt="">
                            <p>資料請求</p>
                        </div>
                    </a>
                    <a href="#">
                        <div class="header_allmenu__cta__contents__right">
                            <img src="<?= get_template_directory_uri(); ?>/assets/img/icon/fair.png" alt="">
                            <p>フェア一覧<br>・見学予約</p>
                        </div>
                    </a>
                </div>
            </div>
            <a href="#">
                <div class="header_allmenu__church" style="background-image:linear-gradient(rgba(0,0,0,0.4),rgba(0,0,0,0.4)), url(/wp-content/themes/rosegarden_file/assets/img/header_church.jpg);">
                    <img src="<?= get_template_directory_uri(); ?>/assets/img/icon/cross_icon.png" alt="">
                    <p>教会について</p>
                </div>
            </a>
            <div class="header_allmenu__sns">
                <div class="header__sns">
                    <a href="#">
                        <div class="home-sns">
                            <p><a href="<?php
                                        echo home_url('/');
                                        ?>">HOME</a></p>
                            <div class="instagram_icon">
                                <img src="<?= get_template_directory_uri(); ?>/assets/img/icon/instagram.png" alt="">
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="m24"></div>
        </div>
    </div>

   sowa weddings 
    <div class="sowa-weddings">
        <p>SOWA WEDDINGS</p>
        <div class="header_allmenu__menu-s">
            <p><a href="<?php echo get_page_link(20); ?>">アクセス<span>/</span></a></p>
            <p><a href="<?php echo get_page_link(40); ?>">フロアガイド<span>/</span></a></p>
            <p><a href="<?php echo get_page_link(54); ?>">挙式スケジュール <span>/</span></a></p>
            <p><a href="<?php echo get_page_link(44); ?>">イベントスケジュール<span>/</span></a></p>
        </div>
    </div>
</div>
-->
</div>

<body>