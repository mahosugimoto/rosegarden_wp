<?php get_header() ?>
<?php include('header_icon.php'); ?>

<!-- パンクズ_sp -->
<?php custom_breadcrumbs('sp'); ?>

<!-- タイトル -->
<div class="page-title_03">
    <div class="page-title_03__eng">
        <h2><?php echo SCF::get('title_en', 295); ?>
        <span><?= get_the_title(295) ?></span></h2>
    </div>
    <div class="page-title_03__contents">
        <p><?php echo SCF::get('fv_text', 295); ?></p>
    </div>
</div>

<!-- パンクズ_pc -->
<?php custom_breadcrumbs('pc'); ?>

<!-- wp_カスタムhtml-->

<?php while (have_posts()) : the_post(); ?>

    <!-- wp_カスタムhtml-->


    <!-- お客様の声コンテンツ -->
    <div class="cv">
        <div class="cv-details">
            <div class="cv-details__title">
                <h1><?= get_the_title() ?></h1>
            </div>
            <div class="cv-details__category">
                <div class=cv-details__category__style>
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
                <div class="cv-details__category__season">
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

            <!-- 記事詳細__本文
                <div class="cv-details__category">
                    <div class=cv-details__category__style>
                        <p>スタイル：</p>
                        <p class="tag-style">挙式</p>
                    </div>
                    <div class="cv-details__category__season">
                        <p>季節：</p>
                        <p class="tag-style">3月</p>
                    </div>
                </div>
                 -->
        </div>

        <!-- 記事詳細__本文 -->
        <div class="article-details">
            <div class="article-details__contents">
                <?php
                if (has_post_thumbnail()) :
                    $thumbnail = get_the_post_thumbnail_url(get_the_ID(), 'full');
                ?>
                    <div class="article-details__contents__img" style="background-image: url(<?php echo $thumbnail; ?>);">
                    </div>
                <?php endif; ?>
                <?= get_the_content(); ?>
                <div class="property_gr">
                <?php
$repeat_group = SCF::get('property');
foreach ($repeat_group as $fields) {
    $image_id = $fields['property_image1']; // フィールドの値を取得
    $image_url = wp_get_attachment_image_url($image_id, 'full'); // 添付ファイルの画像のURLを取得
    ?>
    <div class="property_photo" style="background-image: url('<?php echo $image_url; ?>');"></div>
    <?php
}
?>
                </div>
            </div>
        </div>
    </div>

    <div class="m80"></div>

    <!-- その他のカスタマーボイス -->
    <div class="other_cv__title">
        <h3>その他のカスタマーボイス</h3>
    </div>
    <div class="voice__contents3">
        <?php
        $args = array(
            'posts_per_page' => 3,
            'post_status' => 'publish',
            'post_type' => 'customer_voice',
        );
        $myposts = get_posts($args);
        foreach ($myposts as $post) : setup_postdata($post);
            $post_categories = wp_get_post_terms($post->ID, $taxonomy_name, array('fields' => 'slugs'));
        ?>
            <div class="cv_block3" data-categories="<?= implode(' ', $post_categories); ?>">
                <a href="<?= the_permalink(); ?>">
                    <div class="cv_block3__img" style="background-image:url(<?php the_post_thumbnail_url(); ?>)">
                    </div>
                    <div class="cv_block3__text">
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
                </a>
            </div>

        <?php
        endforeach;
        wp_reset_postdata();
        ?>
    </div>
    <div class="m24"></div>
    <div class="blockstyle01_text__contents__btn">
        <button class="page-btn" onclick="location.href='<?php echo get_page_link(295); ?>'">
            <p>レポート一覧に戻る</p>
        </button>
    </div>
<?php endwhile; ?>

<div class="m80"></div>
<?php get_footer() ?>