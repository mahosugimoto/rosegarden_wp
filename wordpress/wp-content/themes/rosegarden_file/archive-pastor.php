<?php
/*
Template Name: 牧師ブログ
*/
get_header();
?><?php include('header_icon.php'); ?>

<?php require_once('breadcrumb.php');?>

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
                <?php
                $args = array(
                    'posts_per_page' => 10,
                    'post_status' => 'publish',
                    'post_type' => 'pastor',
                );
                $myposts = get_posts($args);
                foreach ($myposts as $post) : setup_postdata($post);
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
                <?php
                endforeach;
                wp_reset_postdata();
                ?>
                <div class="liststyle_pastor_blog2__btn">
                </div>
                <div class="lace-dcr_bottom">
                    <div class="lace-dcr_bottom__img">
                        <img src="/wp-content/themes/rosegarden_file/assets/img/dcr/lace02.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
            <!-- ページネーション -->
            <div class="btn_flex2">
            <button class="page-btn_pre">
                <img src="/wp-content/themes/rosegarden_file/assets/img/dcr/arrow_prev.png" alt="">
                <p>前のページ</p>
            </button>
            <button class="page-btn_next">
                <p>次のページ</p>
                <img src="/wp-content/themes/rosegarden_file/assets/img/dcr/arrow_next.png" alt="">
            </button>
        </div>
        <nav class="pagination-container">
            <ul class="pagination">
                <li class="page-item prev"><a href="#" class="page-link">
                        <img src="<?= get_template_directory_uri(); ?>/assets/img/dcr/arrow_prev.png" alt="">
                    </a></li>
                <li class="page-item number"><a href="#" class="page-link">1</a></li>
                <li class="page-item number navi-active"><a href="#" class="page-link">2</a></li>
                <li class="page-item number"><a href="#" class="page-link">3</a></li>
                <li class="page-item number"><a href="#" class="page-link">4</a></li>
                <li class="page-item number"><a href="#" class="page-link">5</a></li>
                <li class="page-item number"><a href="#" class="page-link">6</a></li>
                <li class="page-item number"><a href="#" class="page-link">7</a></li>
                <li class="page-item number"><a href="#" class="page-link">8</a></li>
                <li class="page-item number"><a href="#" class="page-link">9</a></li>
                <li class="page-item number"><a href="#" class="page-link">10</a></li>
                <li class="page-item next" aria-disabled="true"><a href="#" class="page-link">
                        <img src="<?= get_template_directory_uri(); ?>/assets/img/dcr/arrow_next.png" alt=""></a></li>
            </ul>
        </nav>
    <div class="m80"></div>
    <?php get_footer(); ?>