<?php
/*
Template Name: Wedding Partyウエディング(披露宴)
*/
get_header();
?>

<style>
    .slick-track {
        height: 300px;
    }
    .slick-next.slick-arrow {
        display: none;
    }
    .partyspace__contents__item.slick-slide.slick-current.slick-active {
        width: 200px;
}
</style>

<?php include('header_icon.php'); ?>
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
            <p><?php echo SCF::get('title_en'); ?></p>
        </div>
        <div class="page-title_05__jp">
            <p><?= get_the_title() ?></p>
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
            <p><?php echo SCF::get('title_en'); ?></p>
        </div>
        <div class="page-title_05__jp">
            <p><?= get_the_title() ?></p>
        </div>
        <div class="page-title_05__contents">
            <p><?php echo SCF::get('fv_text'); ?></p>
        </div>
    </div>
</div>


<script>
      
    $(function() {
        $('.partyspace__other__block-content:not(:first-of-type)').css('display', 'none');
        $('.partyspace__other__block-label').click(function() {
            $(this).next('div').slideToggle();
            $(this).find(".partyspace__other__block-icon").toggleClass('open');
        });
 
    $('.partyspace__contents__photo').slick({
            dots: false,
            infinite: true,
            slidesToShow: 3,
            slidesToScroll: 1,
            accessibility: true,
            autoplay: true,
            arrow: false,
            prevArrow: false,
            nextArrow: false,
            autoplaySpeed: 1000,
            speed: 1000,
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


<?php while (have_posts()) : the_post(); ?>
<?= get_the_content(); ?>
<?php endwhile; ?>


<?php include('other_page.php'); ?>
<?php get_footer(); ?>z