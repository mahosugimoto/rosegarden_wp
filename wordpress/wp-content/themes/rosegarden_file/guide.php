<?php
/*
Template Name: フロアガイド
*/
get_header();
?><?php include('header_icon.php'); ?>

<?php require_once('breadcrumb.php');?>

<div class="wrapper">
<?php while (have_posts()) : the_post(); ?>

<!-- フロアガイドコンテンツ -->

<?= get_the_content(); ?>
<?php endwhile; ?>

<div class="m80"></div>
</div>
<?php include('other_page.php'); ?>
<?php
get_footer(); 
?>