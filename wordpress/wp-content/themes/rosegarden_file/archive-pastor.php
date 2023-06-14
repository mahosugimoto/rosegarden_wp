<?php
/*
Template Name: 牧師ブログ
*/
get_header();
?><?php include('header_icon.php'); ?>
<?php $pastoBlogId = 48;?>

<!-- パンクズ_sp -->
<?php custom_breadcrumbs('sp'); ?>

<!-- タイトル -->
<div class="page-title_03">
    <div class="page-title_03__eng">
        <p><?php echo SCF::get('title_en', $pastoBlogId); ?></p>
    </div>
    <div class="page-title_03__jp">
        <p><?= get_the_title($pastoBlogId) ?></p>
    </div>
    <div class="page-title_03__contents">
        <p><?php echo SCF::get('fv_text', $pastoBlogId); ?></p>
    </div>
</div>

<!-- パンクズ_pc -->
<?php custom_breadcrumbs('pc'); ?>

<!-- お知らせコンテンツ -->
<div class="pastor_flex">
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
                    $args = $commonArgs = pastor_args();
                    $posts_per_page = 10;
                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                    $post_type = 'pastor';
                    $args['posts_per_page'] = $posts_per_page;
                    $args['paged'] = $paged;

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
                                    <p><?= custom_post_excerpt() ?></p>
                                </div>
                            </div>
                        </a>
                    <?php endforeach; ?>
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
        <?php
        wp_reset_postdata();
        $commonArgs['posts_per_page'] = -1;
        $query = new WP_Query($commonArgs);

        // Get the count of posts that match the query
        $total_post = $query->found_posts;
        $num_pages = ceil($total_post / $posts_per_page);

        $args = array(
            'total' => $num_pages,
            'found_posts' => $total_post
        );
        echo custom_pagination($args);
        ?>
          <div class="pastor_sidebar">
        <div class="pastor_sidebar__block">
            <?php get_template_part('pastor', 'sidebar'); ?>
        </div>
        <div class="pastor_sidebar__block">
            <?php get_template_part('pastor', 'sidebar'); ?>
        </div>
        <div class="pastor_sidebar__block">
            <?php get_template_part('pastor', 'sidebar'); ?>
        </div>
    </div>
    </div>
</div>
<div class="m80"></div>
<?php get_footer(); ?>