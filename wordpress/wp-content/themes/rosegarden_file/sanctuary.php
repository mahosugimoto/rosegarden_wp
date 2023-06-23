<?php
/*
Template Name: 恋人の聖地
*/
get_header();
?><?php include('header_icon.php'); ?>

<?php require_once('breadcrumb.php');?>
<div class="wrapper">
<!-- wp_カスタムhtml-->

<?php while (have_posts()) : the_post(); ?>

    <?php echo apply_filters( 'the_content', get_the_content() );?>
    
<?php endwhile; ?>

<!-- wp_カスタムhtml-->
<div class="m80"></div>
</div>
<?php include('other_page.php'); ?>
<?php get_footer(); ?>