<?php
/*
Template Name: 讃美歌
*/
get_header();
?><?php include('header_icon.php'); ?>

<?php require_once('breadcrumb.php');?>
<div class="wrapper">
<!-- wp_カスタムhtml-->

<?php while (have_posts()) : the_post(); ?>

<?= get_the_content(); ?>
<?php endwhile; ?>

<!-- wp_カスタムhtml-->

</div>
<?php include('other_page.php'); ?>
<?php
get_footer(); 
?>