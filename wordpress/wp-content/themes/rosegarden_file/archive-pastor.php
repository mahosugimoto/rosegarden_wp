<?php
/*
Template Name: 牧師ブログ
*/
get_header();
?><?php include('header_icon.php'); ?>

<!-- パンクズ_sp -->
<?php custom_breadcrumbs('sp');?>

<!-- タイトル -->
<div class="page-title_03">
    <div class="page-title_03__eng">
        <p><?php echo SCF::get('title_en', 50); ?></p>
    </div>
    <div class="page-title_03__jp">
        <p><?= get_the_title() ?></p>
    </div>
    <div class="page-title_03__contents">
        <p><?php echo SCF::get('fv_text', 50); ?></p>
    </div>
</div>

<!-- パンクズ_pc -->
<?php custom_breadcrumbs('pc');?>

<!-- お知らせコンテンツ -->
<div class="pastor_blogrmation">
    <!-- pastor_blogrmation -->
    <div class="pastor_blog">
        <div class="pastor_blog__list">
            <div class="lace-dcr_top">
                <div class="lace-dcr_bottom__img">
                    <img src="/wp-content/themes/rosegarden_file/assets/img/dcr/lace.png" alt="">
                </div>
            </div>
            <div class="liststyle_pastor_blog2">
            <?php if (have_posts()): 
                while (have_posts()): 
                    the_post();
            ?>
                <a href="<?= the_permalink(); ?>">
                    <div class="liststyle_pastor_blog2__block">
                        <div class="liststyle_pastor_blog2__block__text">
                            <div class="liststyle_pastor_blog2__ctg">
                                <p><?= get_the_date() ?></p>
                            </div>
                            <h3><?= get_the_title() ?></h3>
                            <p><?= get_the_content() ?></p>
                        </div>
                    </div>
                </a>
            <?php endwhile; ?>
                <div class="liststyle_pastor_blog2__btn">
                </div>
                <div class="lace-dcr_bottom">
                    <div class="lace-dcr_bottom__img">
                        <img src="/wp-content/themes/rosegarden_file/assets/img/dcr/lace02.png" alt="">
                    </div>
                </div>
            <?php endif; ?>
            </div>
        </div>
    </div>
    <?php if (have_posts()): echo custom_pagination(); endif;?>
    <div class="m80"></div>
</div>
<?php get_footer(); ?>