<?php
/*
Template Name: インフォ記事
*/
get_header();
?><?php include('header_icon.php'); ?>
<?php include('cta.php'); ?>
<?php $infoPostId = 7783;?>

<!-- パンクズ_sp -->
<?php custom_breadcrumbs('sp');?>

<!-- タイトル -->
<div class="page-title_03">
    <div class="page-title_03__eng">
        <p><?php echo SCF::get('title_en', $infoPostId); ?></p>
    </div>
    <div class="page-title_03__jp">
        <p><?= get_the_title($infoPostId) ?></p>
    </div>
    <div class="page-title_03__contents">
        <p><?php echo SCF::get('fv_text', $infoPostId); ?></p>
    </div>
</div>

<!-- パンクズ_pc -->
<?php custom_breadcrumbs('pc');?>

<?php
$current_category = get_queried_object();
$category_slug = '';
$category_id = '';

if ($current_category instanceof WP_Term) {
    $category_slug = $current_category->slug;
    $category_id = $current_category->term_id;
}
?>

<div class="church__ctg">
    <div class="ctg_btn">
        <div class="ctg_btn__all">
            <a href="<?php echo the_permalink($infoPostId);?>">
                <button class="ctg_btn__child-btn <?php echo (empty($category_id)) ? 'active' : '';?>" data-category="all">
                    <p>ALL</p>
                </button>
            </a>
        </div>
        <div class="ctg_btn__child-wrap">
            <?php
            $taxonomy_name = "information-cat";
            $terms = get_terms($taxonomy_name);
            foreach ($terms as $term) :
            ?>
            <a href="<?php echo get_term_link($term, $taxonomy_name)?>">
            <button class="ctg_btn__child-btn <?php echo ($category_id == $term->term_id) ? 'active' : '';?>" data-category="<?php echo esc_attr($term->slug);?>"><?php echo $term->name;?></button>
            </a>
            <?php endforeach;?>
        </div>
    </div>
</div>

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
                if (!empty($category_slug)) {
                    $paged = (get_query_var('page')) ? get_query_var('page') : 1;
                }
                $post_type = 'information';
                $args = array(
                    'posts_per_page' => $posts_per_page,
                    'paged' => $paged,
                    'post_status' => 'publish',
                    'post_type' => $post_type,
                );

                if (!empty($category_slug)) {
                    $args['tax_query'] = array(
                        array(
                            'taxonomy' => $taxonomy_name,
                            'field' => 'slug',
                            'terms' => $category_slug,
                        ),
                    );
                }
                
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
            if (empty($category_slug)) {
                $total_post = wp_count_posts($post_type)->publish;
            } else {
                $total_post = get_term($category_id)->count;
            }
            
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