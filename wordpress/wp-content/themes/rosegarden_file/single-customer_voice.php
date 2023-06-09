<?php get_header() ?>
<?php include('header_icon.php'); ?>

<!-- パンクズ_sp -->
<div class="breadcrumb_sp">
    <div class="breadcrumb_sp__contents">
        <p><a href="<?php echo home_url( '/' ); ?>"><span>トップ</span></a></p>
        <p>></p>
        <p><?= get_the_title()?></p>
    </div>
</div>

<!-- タイトル -->
<div class="page-title_03">
    <div class="page-title_03__eng">
        <p><?php echo SCF::get('title_en'); ?></p>
    </div>
    <div class="page-title_03__jp">
        <p><?= get_the_title()?></p>
    </div>
    <div class="page-title_03__contents">
        <p><?php echo SCF::get('fv_text'); ?></p>
    </div>
</div>

<!-- パンクズ_pc -->
<div class="breadcrumb">
    <div class="breadcrumb__contents">
        <p><a href="<?php echo home_url( '/' ); ?>"><span>トップ</span></a></p>
        <p>></p>
        <p><?= get_the_title()?></p>
    </div>
</div>

<!-- wp_カスタムhtml-->

<?php while (have_posts()) : the_post(); ?>

    <!-- wp_カスタムhtml-->


    <!-- お客様の声コンテンツ -->
    <div class="cv">
        <div class="cv-details">
            <div class="cv-details__thumbnail" style="background-image:url(/wp-content/themes/rosegarden_file/assets/img/cv_sample01.jpg) ;">
            </div>
            <div class="cv-details__title">
                <h2><?= get_the_title() ?></h2>
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
                    <p>スタイル：</p>
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
            <div class=article-details__contents>
                <?= get_the_content(); ?>
                <div class="article-details__contents__img" style="background-image:url(/wp-content/themes/rosegarden_file/assets/img/cv_sample02.png)">
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