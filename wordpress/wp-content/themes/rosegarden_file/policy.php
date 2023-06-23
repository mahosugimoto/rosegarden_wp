<?php
/*
Template Name: プライバシーポリシー
*/
get_header();
?><?php include('header_icon.php'); ?>

<!-- noindex -->
<head>
<meta name=”robots” content=”noindex”/>
</head>

<?php require_once('breadcrumb.php');?>

<div class="wrapper">
<!-- wp_カスタムhtml-->

<?php while (have_posts()) : the_post(); ?>

<?= get_the_content(); ?>
<?php endwhile; ?>

<!-- wp_カスタムhtml-->

<div class="m80"></div>
</div>
<?php get_footer(); ?>