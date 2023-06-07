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
    $(document).ready(function() {
        $('.ctg_btn__child-btn').click(function() {
            // すべてのボタンからactiveクラスを削除
            $('.ctg_btn__child-btn').removeClass('active');
            // クリックされたボタンにactiveクラスを追加
            $(this).addClass('active');

            // クリックされたボタンのデータカテゴリを取得
            var category = $(this).data('category');

            // 投稿をフィルタリング
            $('.cv_block2').each(function() {
                var postCategories = $(this).data('categories');
                if (category === 'all' || postCategories.includes(category)) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        });
    });
</script>

<!-- FV BGあり -->
<!-- PC BG -->
<?php
// SCF::get_post_meta($post->ID, '設定した名前', 画像サイズ)
$img = get_post_meta($post->ID, 'image_pc', true);
?>
<div class="page-background" style="background-image:linear-gradient(rgba(0,0,0,0.4),rgba(0,0,0,0.4)),url(<?php echo wp_get_attachment_url($img) ?>)">
    <div class="page-title_05">
        <div class="page-title_05__eng">
            <p><?php echo SCF::get('title_en'); ?></p>
        </div>
        <div class="page-title_05__jp">
            <p><?= get_the_title() ?></p>
        </div>
        <div class="page-title_05__contents">
            <p><?php echo SCF::get('fv_text'); ?></p>
        </div>
    </div>
</div>

<?php require_once('breadcrumb_other.php');?>

<?php
// SCF::get_post_meta($post->ID, '設定した名前', 画像サイズ)
$img = get_post_meta($post->ID, 'image_sp', true);
?>
<!-- SP BG -->
<div class="page-background_sp" style="background-image:linear-gradient(rgba(0,0,0,0.4),rgba(0,0,0,0.4)),url(<?php echo wp_get_attachment_url($img) ?>)">
    <img src="<?php the_field('image_pc'); ?>" alt="">
    <div class="page-title_05">
        <div class="page-title_05__eng">
            <p><?php echo SCF::get('title_en'); ?></p>
        </div>
        <div class="page-title_05__jp">
            <p><?= get_the_title() ?></p>
        </div>
        <div class="page-title_05__contents">
            <p><?php echo SCF::get('fv_text'); ?></p>
        </div>
    </div>
</div>

<!-- voice カテゴリ絞り込み-->
<div class="church__ctg">
    <div class="ctg_btn">
        <div class="ctg_btn__all">
            <button class="ctg_btn__child-btn active" data-category="all">
                <p>ALL</p>
            </button>
        </div>
        <div class="ctg_btn__child-wrap">
            <?php
            $taxonomy_name = "customer_voice-cat";
            $terms = get_terms($taxonomy_name);
            foreach ($terms as $term) {
                $term_link = get_term_link($term);
                echo '<button class="ctg_btn__child-btn" data-category="' . esc_attr($term->slug) . '">' . $term->name . '</button>';
            }
            ?>
        </div>
    </div>
</div>

<!-- voiceコンテンツ -->
<div class="voice">
    <div class=voice__contents>
        <?php
        $posts_per_page = 10;
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $post_type = 'customer_voice';
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
$total_post = wp_count_posts($post_type)->publish;
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