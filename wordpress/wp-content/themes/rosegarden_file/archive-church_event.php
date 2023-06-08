<?php
/*
Template Name: 教会イベント
*/
get_header();
?><?php include('header_icon.php'); ?>
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
            $('.liststyle_church_event2__block').each(function() {
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

<!-- パンクズ_sp -->
<?php custom_breadcrumbs('sp'); ?>

<!-- タイトル -->
<div class="page-title_03">
    <div class="page-title_03__eng">
        <p><?php echo SCF::get('title_en', 46); ?></p>
    </div>
    <div class="page-title_03__jp">
        <p><?= get_the_title(46) ?></p>
    </div>
    <div class="page-title_03__contents">
        <p><?php echo SCF::get('fv_text', 46); ?></p>
    </div>
</div>

<!-- パンクズ_pc -->
<?php custom_breadcrumbs('pc'); ?>

<!-- test -->
<div class="church__ctg">
    <div class="ctg_btn">
        <div class="ctg_btn__all">
            <button class="ctg_btn__child-btn active" data-category="all">
                <p>ALL</p>
            </button>
        </div>
        <div class="ctg_btn__child-wrap">
            <?php
            $taxonomy_name = "church_event-cat";
            $terms = get_terms($taxonomy_name);
            foreach ($terms as $term) {
                $term_link = get_term_link($term);
                echo '<button class="ctg_btn__child-btn" data-category="' . esc_attr($term->slug) . '">' . $term->name . '</button>';
            }
            ?>
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
            $post_type = 'church_event';
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
                    <div class="liststyle_church_event2__block" data-categories="<?= implode(' ', $post_categories); ?>">
                        <div class="liststyle_church_event2__block__img" style="background-image:url(<?php the_post_thumbnail_url(); ?>)">
                        </div>
                        <div class="liststyle_church_event2__block__text">
                            <div class="liststyle_church_event2__ctg">
                                <?php
                                foreach ($post_categories as $category_slug) {
                                    $term = get_term_by('slug', $category_slug, $taxonomy_name);
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
                            <p><?php echo SCF::get('church_event_selected'); ?></p>
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
</div>

<div class="m80"></div>
<?php include('other_page.php'); ?>
<?php get_footer(); ?>