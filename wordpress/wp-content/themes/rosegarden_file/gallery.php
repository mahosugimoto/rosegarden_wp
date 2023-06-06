<?php
/*
Template Name: ギャラリーテンプレート
*/
get_header();
?><?php include('header_icon.php'); ?>
<?php include('cta.php'); ?>

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




<!-- js -->
<script>
    $(document).ready(function() {
        $('.ctg_btn__child-btn').click(function() {
            // すべてのボタンからactiveクラスを削除
            $('.ctg_btn__child-btn').removeClass('active');
            // クリックされたボタンにactiveクラスを追加
            $(this).addClass('active');

            // クリックされたボタンのデータカテゴリを取得
            var category = $(this).data('category');

            // 投稿をフィルタリング
            $('.gallery__photo__item').each(function() {
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

<!-- ギャラリー -->
<!-- カテゴリボタン -->
<div class="gallery">
    <div class="church__ctg">
        <div class="ctg_btn">
            <div class="ctg_btn__all">
                <button class="ctg_btn__child-btn active" data-category="all">
                    <p>ALL</p>
                </button>
            </div>
            <div class="ctg_btn__child-wrap">
                <?php
                $taxonomy_name = "gallery-cat"; // カテゴリータクソノミーのスラッグを指定してください
                $terms = get_terms($taxonomy_name);
                foreach ($terms as $term) {
                    $term_link = get_term_link($term);
                    echo '<button class="ctg_btn__child-btn" data-category="' . esc_attr($term->slug) . '">' . $term->name . '</button>';
                }
                ?>
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
        $args = array(
            'posts_per_page' => -1,
            'post_status' => 'publish',
            'post_type' => 'gallery',
        );

        $myposts = get_posts($args);
        foreach ($myposts as $post) : setup_postdata($post);
            $post_categories = wp_get_post_terms($post->ID, $taxonomy_name, array('fields' => 'slugs'));
        ?>
            <div class="gallery__photo__item" data-categories="<?= implode(' ', $post_categories); ?>" style="background-image: url(<?php the_post_thumbnail_url(); ?>);"></div>
        <?php
        endforeach;
        wp_reset_postdata();
        ?>
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

