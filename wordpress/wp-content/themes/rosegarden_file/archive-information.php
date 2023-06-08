<?php
/*
Template Name: インフォ記事
*/
get_header();
?><?php include('header_icon.php'); ?>
<?php include('cta.php'); ?>

<!-- パンクズ_sp -->
<?php custom_breadcrumbs('sp');?>

<!-- タイトル -->
<div class="page-title_03">
    <div class="page-title_03__eng">
        <p><?php echo SCF::get('title_en', 7783); ?></p>
    </div>
    <div class="page-title_03__jp">
        <p><?= get_the_title(7783) ?></p>
    </div>
    <div class="page-title_03__contents">
        <p><?php echo SCF::get('fv_text', 7783); ?></p>
    </div>
</div>

<!-- パンクズ_pc -->
<?php custom_breadcrumbs('pc');?>

<!-- お知らせコンテンツ -->
<div class="information">
    <!-- information -->
    <div class="info">
        <div class="info__list">
            <div class="lace-dcr_top">
                <div class="lace-dcr_bottom__img">
                    <img src="/wp-content/themes/rosegarden_file/assets/img/dcr/lace.png" alt="">
                </div>
            </div>

            <div class="liststyle_info2">
            <?php
                $taxonomy_name = "information-cat";
                $posts_per_page = 10;
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $post_type = 'information';
                $args = array(
                    'posts_per_page' => $posts_per_page,
                    'paged' => $paged,
                    'post_status' => 'publish',
                    'post_type' => $post_type,
                );
                $myposts = get_posts($args);
                foreach ($myposts as $post) : setup_postdata($post);
                    $post_categories = wp_get_post_terms($post->ID, $taxonomy_name, array('fields' => 'slugs'));
                ?>
                   <a href="<?= the_permalink(); ?>">
                    <div class="liststyle_info2__block">
                        <div class="liststyle_info2__block__img" style="background-image:url(<?php the_post_thumbnail_url(); ?>)">
                        </div>
                        
                        <div class="liststyle_info2__block__text">
                            <div class="liststyle_info2__ctg">
                            <p class=""><?= get_the_date() ?></p>
                                <?php
                                $this_terms = get_the_terms($post->ID, $taxonomy_name);
                                if ($this_terms && !is_wp_error($this_terms)) {
                                    foreach ($this_terms as $key => $term) {
                                        echo '<p class="ctg_style02">' . $term->name . '</p>';
                                    }
                                }
                                ?>
                            </div>
                            <h3><?= get_the_title(); ?></h3>
                        </div>
                    </div>
                </a>
                <?php
                endforeach;
                wp_reset_postdata();
                ?>
            </div>
            <!-- ページネーション -->
            <?php 
            $total_post = wp_count_posts($post_type)->publish;
            $num_pages = ceil($total_post / $posts_per_page);
            
            $args = array(
                'total' => $num_pages,
                'found_posts' => $total_post
            );
            echo custom_pagination($args); 
            ?>
            <div class="lace-dcr_bottom">
                <div class="lace-dcr_bottom__img">
                    <img src="/wp-content/themes/rosegarden_file/assets/img/dcr/lace02.png" alt="">
                </div>
            </div>
        </div>
    </div>


    <div class="m80"></div>

    <?php get_footer(); ?>