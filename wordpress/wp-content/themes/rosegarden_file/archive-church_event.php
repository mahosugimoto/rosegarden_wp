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

<?php require_once('breadcrumb.php');?>

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
            $args = array(
                'posts_per_page' => 10,
                'post_status' => 'publish',
                'post_type' => 'church_event',
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
                                        echo '<p class="ctg_style02">' . $term->name . '</p>';
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