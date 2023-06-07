<?php
/*
Template Name: プロポーズ
*/
get_header();
?><?php include('header_icon.php'); ?>

<?php require_once('breadcrumb.php');?>

<script>
    $(function() {
        $('.qanda-content:not(:first-of-type)').css('display', 'none');
        $('.qanda-label').click(function() {
            $(this).next('div').slideToggle();
            $(this).find(".qanda-icon").toggleClass('open');
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