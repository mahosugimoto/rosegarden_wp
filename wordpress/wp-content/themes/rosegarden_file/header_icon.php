<script>
    $(document).ready(function() {
        // ボタンを最初は非表示にする
        $('.rg_logo_right').hide();

        // スクロール位置が特定の閾値を超えたらボタンを表示
        $(window).scroll(function() {
            var scrollPos = $(window).scrollTop();
            var windowWidth = $(window).width();

            if (windowWidth > 480 && scrollPos < 80) {
                $('.rg_logo_right').fadeIn();
            } else {
                $('.rg_logo_right').fadeOut();
            }
        });
    });
</script>

<div class="rg_logo_right">
    <img src="<?= get_template_directory_uri(); ?>/assets/img/logo/rg-logo_jp.png" alt="">
</div>