<?php
/*
Template Name: カスタマーボイス
*/
get_header();
?><?php include('header_icon.php'); ?>

<script>
    var links = document.getElementsByClassName('screen-reader-text');

    for (var i = 0; i < links.length; i++) {
        links[i].addEventListener('click', function(event) {
            event.preventDefault();

            // クリックされたリンクの処理を行う
            console.log('リンクがクリックされました');
        });
    }
</script>

<!-- FV BGあり -->
<!-- PC BG -->
<?php
$voicePostID = 295;
// SCF::get_post_meta($post->ID, '設定した名前', 画像サイズ)
$img = get_post_meta($voicePostID, 'image_pc', true);
?>
<div class="page-background" style="background-image:linear-gradient(rgba(0,0,0,0.4),rgba(0,0,0,0.4)),url(<?php echo wp_get_attachment_url($img) ?>)">
    <div class="page-title_05">
        <div class="page-title_05__eng">
            <p><?php echo SCF::get('title_en', $voicePostID); ?></p>
        </div>
        <div class="page-title_05__jp">
            <p><?= get_the_title($voicePostID) ?></p>
        </div>
        <div class="page-title_05__contents">
            <p><?php echo SCF::get('fv_text', $voicePostID); ?></p>
        </div>
    </div>
</div>

<?php require_once('breadcrumb_other.php');?>
<?php
$current_category = get_queried_object();
$category_slug = '';
$category_id = '';

if ($current_category instanceof WP_Term) {
    $category_slug = $current_category->slug;
    $category_id = $current_category->term_id;
}
?>

<?php
// SCF::get_post_meta($post->ID, '設定した名前', 画像サイズ)
$img = get_post_meta($voicePostID, 'image_sp', true);
?>
<!-- SP BG -->
<div class="page-background_sp" style="background-image:linear-gradient(rgba(0,0,0,0.4),rgba(0,0,0,0.4)),url(<?php echo wp_get_attachment_url($img) ?>)">
    <img src="<?php the_field('image_pc', $voicePostID); ?>" alt="">
    <div class="page-title_05">
        <div class="page-title_05__eng">
            <p><?php echo SCF::get('title_en', $voicePostID); ?></p>
        </div>
        <div class="page-title_05__jp">
            <p><?= get_the_title($voicePostID) ?></p>
        </div>
        <div class="page-title_05__contents">
            <p><?php echo SCF::get('fv_text', $voicePostID); ?></p>
        </div>
    </div>
</div>

<!-- voice カテゴリ絞り込み-->
<div class="church__ctg">
    <div class="ctg_btn">
        <div class="ctg_btn__all">
            <a href="<?php echo the_permalink($voicePostID);?>">
                <button class="ctg_btn__child-btn_first <?php echo (empty($category_id)) ? 'active' : '';?>" data-category="all">
                    <p>ALL</p>
                </button>
            </a>
        </div>
        <div class="ctg_btn__child-wrap">
            <?php
            $taxonomy_name = "customer_voice-cat";
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

<!-- voiceコンテンツ -->
<div class="voice">
    <div class=voice__contents>
        <?php
        $posts_per_page = 10;
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        if (!empty($category_slug)) {
            $paged = (get_query_var('page')) ? get_query_var('page') : 1;
        }
        $post_type = 'customer_voice';
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
                <div class="cv_block2" data-categories="<?= implode(' ', $post_categories); ?>">
                    <div class="cv_block2__img" style="background-image:url(<?php the_post_thumbnail_url(); ?>)">
                    </div>
                    <div class="cv_block2__text">
                        <h3><?= get_the_title() ?></h3>
                        <div class="cv_category">
                            <div class="cv_category__style">
                                <p>スタイル：</p>
                                <?php
                                $taxonomy_name = "customer_voice-cat";
                                $this_terms = get_the_terms($post->ID, $taxonomy_name);
                                if ($this_terms && !is_wp_error($this_terms)) {
                                    foreach ($this_terms as $key => $term) {
                                        echo '<p class="tag-style">' . $term->name . '</p>';
                                    }
                                }
                                ?>
                            </div>
                            <div class="cv_category__season">
                                <p>季節：</p>
                                <?php
                                $taxonomy_name = "customer_voice-tag";
                                $this_terms = get_the_terms($post->ID, $taxonomy_name);
                                if ($this_terms && !is_wp_error($this_terms)) {
                                    foreach ($this_terms as $key => $term) {
                                        echo '<p class="tag-style">' . $term->name . '</p>';
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        <?php
        endforeach;
        wp_reset_postdata();
        ?>
    </div>
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

<div class="m80"></div>
<?php include('other_page.php'); ?>
<?php get_footer(); ?>