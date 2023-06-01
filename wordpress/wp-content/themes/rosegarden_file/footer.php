</body>  
<footer>
    <div class="footer">
        <div class="footer-top">
            <div class="footer-top__logo">
                <img src="/wp-content/themes/rosegarden_file/assets/img/logo/rg-logo.png" alt="">
            </div>
            <div class="footer-top__address">
                <h2><span>TEL.</span><a href="tel:011-522-0151">011-522-0151</a></h2>
                <p>営業時間: 平日 11:00 〜 19:00 <br class="new-line">/ 土日祝 9:00 〜 19:00</p>
            </div>
        </div>
        <div class="footer-contents">
            <div class="footer-contents-wrap">
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
                <div class="footer-contents__menu">
                    <div class="footer-contents__menu__box">
                        <?php
                        $menu_items = wp_get_nav_menu_items('footer_left');
                        if ($menu_items) :
                            foreach ($menu_items as $menu) : setup_postdata($menu);
                        ?>
                                <p><a href="<?php echo esc_attr($menu->url); ?>"><?php echo esc_html($menu->title); ?></a></p>
                        <?php
                            endforeach;
                        endif;
                        wp_reset_postdata();
                        ?>
                    </div>
                    <div class="footer-contents__menu__box">
                        <?php
                        $menu_items = wp_get_nav_menu_items('footer_right');
                        if ($menu_items) :
                            foreach ($menu_items as $menu) : setup_postdata($menu);
                        ?>
                                <p><a href="<?php echo esc_attr($menu->url); ?>"><?php echo esc_html($menu->title); ?></a></p>
                        <?php
                            endforeach;
                        endif;
                        wp_reset_postdata();
                        ?>
                    </div>
                </div>
            </div>
            <div class="footer-contents__sns">
                    <div class="home-sns">
                        <p><a href="<?php
                                    echo home_url('/');
                                    ?>">HOME</a></p>
                        <div class="instagram_icon">
                        <a href="https://www.instagram.com/rosegarden_christ_church"><img src="/wp-content/themes/rosegarden_file/assets/img/icon/instagram.png" alt=""></a>
                        </div>
                    </div>
            </div>
        </div>
        <div class="footer-map">
            <div class=footer-map__img>
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d11666.065455765167!2d141.3236321!3d43.030566!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x5f0ad5f922aa490b%3A0xeee9feb91643b25b!2z44Ot44O844K644Ks44O844OH44Oz44Kv44Op44Kk44K544OI5pWZ5Lya!5e0!3m2!1sja!2sjp!4v1681871602301!5m2!1sja!2sjp" width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="footer-map__text" style="background-image:url(/wp-content/themes/rosegarden_file/assets/img/map_footer.jpg)">
                <div class="footer-map__text__contents">
                    <div class="page-title_02">
                        <div class="page-title_02__eng">
                            <p>ACCESS</p>
                        </div>
                        <div class="page-title_02__jp">
                            <p>アクセス</p>
                        </div>
                    </div>
                    <p><span>〒064-0942</span>札幌市中央区伏見3丁目22-50</p>
                    <div class="m32"></div>
                    <button class="page-btn_icon" onclick="location.href='<?php echo get_page_link(20); ?>'">
                        <img src="/wp-content/themes/rosegarden_file/assets/img/icon/map.png" alt="">
                        <p>アクセス詳細</p>
                    </button>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <p>Copyright © Sowa All Rights Reserved.</p>
        </div>
    </div>
</footer>