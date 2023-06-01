<?php
/*
Template Name: 恋人の聖地
*/
get_header();
?><?php include('header_icon.php'); ?>

<!-- パンクズ_sp -->
<div class="breadcrumb_sp">
    <div class="breadcrumb_sp__contents">
        <p><a href="<?php echo home_url( '/' ); ?>"><span>トップ</span></a></p>
        <p>></p>
        <p><?= get_the_title()?></p>
    </div>
</div>

<!-- タイトル -->
<div class="page-title_03">
    <div class="page-title_03__eng">
        <p><?php echo SCF::get('title_en'); ?></p>
    </div>
    <div class="page-title_03__jp">
        <p><?= get_the_title()?></p>
    </div>
    <div class="page-title_03__contents">
        <p><?php echo SCF::get('fv_text'); ?></p>
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

<!-- wp_カスタムhtml-->

<?php while (have_posts()) : the_post(); ?>

    <?= get_the_content(); ?>
<?php endwhile; ?>

<!-- wp_カスタムhtml-->
<?php if ( is_active_sidebar( 'custom-widget-area' ) ) : ?>
    <div id="custom-widget-area" class="custom-widget-area">
        <?php dynamic_sidebar( 'custom-widget-area' ); ?>
    </div>
<?php endif; ?>

<div class="m80"></div>
<?php include('other_page.php'); ?>
<?php get_footer(); ?>