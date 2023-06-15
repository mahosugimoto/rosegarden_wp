<?php
/*
Template Name: 教会イベント
*/
get_header();
?><?php include('header_icon.php'); ?>

<?php $eventPostId = 46; ?>
<!-- パンクズ_sp -->
<?php custom_breadcrumbs('sp'); ?>

<!-- タイトル -->
<div class="page-title_03">
    <div class="page-title_03__eng">
        <p><?php echo SCF::get('title_en', $eventPostId); ?></p>
    </div>
    <div class="page-title_03__jp">
        <p><?= get_the_title($eventPostId) ?></p>
    </div>
    <div class="page-title_03__contents">
        <p><?php echo SCF::get('fv_text', $eventPostId); ?></p>
    </div>
</div>

<!-- パンクズ_pc -->
<?php custom_breadcrumbs('pc'); ?>

<?php
$current_category = get_queried_object();
$category_slug = '';
$category_id = '';

if ($current_category instanceof WP_Term) {
    $category_slug = $current_category->slug;
    $category_id = $current_category->term_id;
}
?>

<!-- test -->
<div class="church__ctg">
    <div class="ctg_btn">
        <div class="ctg_btn__all">
            <a href="<?php echo the_permalink($eventPostId); ?>">
                <button class="ctg_btn__child-btn_first <?php echo (empty($category_id)) ? 'active' : ''; ?>" data-category="all">
                    <p>ALL</p>
                </button>
            </a>
        </div>
        <div class="ctg_btn__child-wrap">
            <?php
            $taxonomy_name = "church_event-cat";
            $terms = get_terms($taxonomy_name);
            foreach ($terms as $term) :
            ?>
                <a href="<?php echo get_term_link($term, $taxonomy_name) ?>">
                    <button class="ctg_btn__child-btn <?php echo ($category_id == $term->term_id) ? 'active' : ''; ?>" data-category="<?php echo esc_attr($term->slug); ?>"><?php echo $term->name; ?></button>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<!-- church_event-->
<div class="church_event">
    <div class="church_event__list">
        <div class="lace-dcr_top">
            <div class="lace-dcr_bottom__img">
                <img src="/wp-content/themes/rosegarden_file/assets/img/dcr/lace.png" alt="">
            </div>
        </div>

        <div class="liststyle_church_event2">
            <?php
            $posts_per_page = 10;
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            if (!empty($category_slug)) {
                $paged = (get_query_var('page')) ? get_query_var('page') : 1;
            }
            $post_type = 'church_event';
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
                    <div class="liststyle_church_event2__block" data-categories="<?= implode(' ', $post_categories); ?>">
                        <div class="liststyle_church_event2__block__img" style="background-image:url(<?php the_post_thumbnail_url(); ?>)">
                        </div>
                        <div class="liststyle_church_event2__block__text">
                            <div class="liststyle_church_event2__ctg">
                                <?php
                                foreach ($post_categories as $slug) {
                                    $term = get_term_by('slug', $slug, $taxonomy_name);
                                    if ($term) {
                                        // $cate_link = get_category_link($term);
                                        // echo '<a href="'. esc_url($cate_link) .'">';
                                        echo '<p class="ctg_style02">' . $term->name . '</p>';
                                        // echo '</a>';
                                    }
                                }
                                ?>
                            </div>
                            <h3><?= get_the_title() ?></h3>
                            <div class="church_event_comment">
                                <p><?php echo SCF::get('church_event_title'); ?></p>
                                <p><?php echo SCF::get('church_event_text'); ?></p>
                            </div>
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
</div>

<div class="m80"></div>
<?php include('other_page.php'); ?>
<?php get_footer(); ?>