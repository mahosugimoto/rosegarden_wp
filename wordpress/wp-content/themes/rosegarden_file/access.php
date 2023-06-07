<?php
/*
Template Name: アクセス
*/
get_header();
?><?php include('header_icon.php'); ?>
<?php require_once('breadcrumb.php');?>

<!-- アクセスマップ -->
<?php while (have_posts()) : the_post(); ?>
<?= get_the_content(); ?>
<?php endwhile; ?>
<!-- アクセスコンテンツ -->

<div class="m80"></div>

<?php include('other_page.php'); ?>
<?php get_footer(); ?>