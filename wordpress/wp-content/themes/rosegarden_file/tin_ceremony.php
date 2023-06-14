<?php
/*
Template Name: 錫婚式
*/
get_header();
?><?php include('header_icon.php'); ?>

<?php require_once('breadcrumb.php');?>


<!-- 錫婚式コンテンツ -->

<!-- 錫婚式スケジュール -->

<!-- wp_カスタムhtml-->

<?php while (have_posts()) : the_post(); ?>

<?= get_the_content(); ?>
<?php endwhile; ?>

<!-- wp_カスタムhtml-->

<div class="m80"></div>
<?php include('other_page.php'); ?>
<?php get_footer(); ?>