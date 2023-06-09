<?php
/*
Template Name: ギャラリーテンプレート
*/
get_header();
?><?php include('header_icon.php'); ?>
<?php include('cta.php'); ?>
<?php $galleryPostId = 8189;?>

<!-- FV BGあり -->
<!-- PC BG -->
<?php
// SCF::get_post_meta($post->ID, '設定した名前', 画像サイズ)
$img = get_post_meta($galleryPostId, 'image_pc', true);
?>
<div class="page-background" style="background-image:linear-gradient(rgba(0,0,0,0.4),rgba(0,0,0,0.4)),url(<?php echo wp_get_attachment_url($img) ?>)">
    <div class="page-title_05">
        <div class="page-title_05__eng">
            <p><?php echo SCF::get('title_en', $galleryPostId); ?></p>
        </div>
        <div class="page-title_05__jp">
            <p><?= get_the_title($galleryPostId) ?></p>
        </div>
        <div class="page-title_05__contents">
            <p><?php echo SCF::get('fv_text', $galleryPostId); ?></p>
        </div>
    </div>
</div>

<?php require_once('breadcrumb_other.php');?>


<?php
// SCF::get_post_meta($post->ID, '設定した名前', 画像サイズ)
$img = get_post_meta($galleryPostId, 'image_sp', true);
?>
<!-- SP BG -->
<div class="page-background_sp" style="background-image:linear-gradient(rgba(0,0,0,0.4),rgba(0,0,0,0.4)),url(<?php echo wp_get_attachment_url($img) ?>)">
    <img src="<?php the_field('image_pc', $galleryPostId); ?>" alt="">
    <div class="page-title_05">
        <div class="page-title_05__eng">
            <p><?php echo SCF::get('title_en', $galleryPostId); ?></p>
        </div>
        <div class="page-title_05__jp">
            <p><?= get_the_title($galleryPostId) ?></p>
        </div>
        <div class="page-title_05__contents">
            <p><?php echo SCF::get('fv_text', $galleryPostId); ?></p>
        </div>
    </div>
</div>

<?php
$current_category = get_queried_object();
$category_slug = '';
$category_id = '';

if ($current_category instanceof WP_Term) {
    $category_slug = $current_category->slug;
    $category_id = $current_category->term_id;
}
?>

<!-- ギャラリー -->
<!-- カテゴリボタン -->
<div class="gallery">
    <div class="church__ctg">
        <div class="ctg_btn">
            <div class="ctg_btn__all">
                <a href="<?php echo the_permalink($galleryPostId);?>">
                    <button class="ctg_btn__child-btn <?php echo (empty($category_id)) ? 'active' : '';?>" data-category="all">
                        <p>ALL</p>
                    </button>
                </a>
            </div>
            <div class="ctg_btn__child-wrap">
                <?php
                $taxonomy_name = "gallery-cat"; // カテゴリータクソノミーのスラッグを指定してください
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
    <div class="gallery__anchor-link">
        <a href="#movie">
            <div class="anchor-link">
                <img src="<?= get_template_directory_uri(); ?>/assets/img/icon/arrow.png" alt="" style="width:13px">
                <p>動画ギャラリーを見る</p>
            </div>
        </a>
    </div>

    <!-- ギャラリー 写真-->
    <div class="gallery__photo">
        <?php
        $posts_per_page = 18;
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        if (!empty($category_slug)) {
            $paged = (get_query_var('page')) ? get_query_var('page') : 1;
        }
        $post_type = 'gallery';
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
            <div class="gallery__photo__item" data-categories="<?= implode(' ', $post_categories); ?>" style="background-image: url(<?php the_post_thumbnail_url(); ?>);"></div>
        <?php
        endforeach;
        wp_reset_postdata();
        ?>

        <!-- ページネーション -->
        <div style="width: 100%;">
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
        </div>
    </div>
</div>

<!-- wp_カスタムhtml-->

<?php while (have_posts()) : the_post(); ?>
    <?= get_the_content(); ?>
    <!-- wp_カスタムhtml-->

<?php endwhile; ?>


<div class="m80"></div>


<?php include('other_page.php'); ?>
<?php get_footer(); ?>

