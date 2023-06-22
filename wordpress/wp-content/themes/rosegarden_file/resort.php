<?php
/*
Template Name: リゾートウエディング
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

<?php require_once('breadcrumb_other.php');?>


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

<script>
    $(function() {
        $('.qanda-content:not(:first-of-type)').css('display', 'none');
        $('.qanda-label').click(function() {
            $(this).next('div').slideToggle();
            $(this).find(".qanda-icon").toggleClass('open');
        });
        $('.resort_photo_slider1').slick({
            dots: false,
            accessibility: true,
            autoplay: true,
            autoplaySpeed: 2000,
            fade: true,
            arrows: false,
        });
        $('.resort_photo_slider2').slick({
            dots: false,
            accessibility: true,
            autoplay: true,
            autoplaySpeed: 2000,
            fade: true,
            arrows: false,
        });
        $('.resort_photo_slider3').slick({
            dots: false,
            accessibility: true,
            autoplay: true,
            autoplaySpeed: 2000,
            fade: true,
            arrows: false,
        });
        $('.resort_photo_slider4').slick({
            dots: false,
            accessibility: true,
            autoplay: true,
            autoplaySpeed: 2000,
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
                    breakpoint: 1080,
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


<!-- wp_カスタムhtml-->

<?php while (have_posts()) : the_post(); ?>

<?= get_the_content(); ?>
<?php endwhile; ?>

<!-- wp_カスタムhtml-->

<?php include('other_page.php'); ?>
<?php get_footer(); ?>