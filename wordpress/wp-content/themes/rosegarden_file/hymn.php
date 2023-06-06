<?php
/*
Template Name: 讃美歌
*/
get_header();
?><?php include('header_icon.php'); ?>

<?php require_once('breadcrumb.php');?>

<!-- wp_カスタムhtml-->

<?php while (have_posts()) : the_post(); ?>

<?= get_the_content(); ?>
<?php endwhile; ?>

<!-- wp_カスタムhtml-->


<?php include('other_page.php'); ?>
<?php
get_footer(); 
?>