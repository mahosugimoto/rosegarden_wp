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

<!-- パンクズ_pc -->
<div class="breadcrumb">
    <div class="breadcrumb__contents">
        <p><a href="<?php echo home_url( '/' ); ?>"><span>トップ</span></a></p>
        <p>></p>
        <p><?= get_the_title()?></p>
    </div>
</div>

<!-- パンクズ_sp -->
<div class="breadcrumb_sp">
    <div class="breadcrumb_sp__contents">
        <p><a href="<?php echo home_url( '/' ); ?>"><span>トップ</span></a></p>
        <p>></p>
        <p><?= get_the_title()?></p>
    </div>
</div>


<?php 
// SCF::get_post_meta($post->ID, '設定した名前', 画像サイズ)
 $img = get_post_meta($post->ID, 'image_sp', true);
?>
<!-- SP BG -->
<div class="page-background_sp" style="background-image:linear-gradient(rgba(0,0,0,0.4),rgba(0,0,0,0.4)),url(<?php echo wp_get_attachment_url($img) ?>)">
    <img src="<?php the_field('image_pc'); ?>" alt="">
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
        $('.qanda-content:not(:first-of-type)').css('display', 'none');
        $('.qanda-label').click(function() {
            $(this).next('div').slideToggle();
            $(this).find(".qanda-icon").toggleClass('open');
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