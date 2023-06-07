<?php
/*
Template Name: 恋人の聖地
*/
get_header();
?><?php include('header_icon.php'); ?>

<?php require_once('breadcrumb.php');?>

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