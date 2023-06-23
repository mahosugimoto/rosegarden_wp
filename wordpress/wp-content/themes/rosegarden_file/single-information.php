<?php get_header() ?>
<?php include('header_icon.php'); ?>

<!-- パンクズ_sp -->
<?php custom_breadcrumbs('sp'); ?>

<!-- タイトル -->
<div class="page-title_03">
    <div class="page-title_03__eng">
        <h2><?php echo SCF::get('title_en', 7783); ?>
        <span><?= get_the_title(7783) ?></span></h2>
    </div>
    <div class="page-title_03__contents">
        <p><?php echo SCF::get('fv_text', 7783); ?></p>
    </div>
</div>

<!-- パンクズ_pc -->
<?php custom_breadcrumbs('pc'); ?>
<div class="wrapper">
<?php while (have_posts()) : the_post(); ?>

    <!-- お知らせコンテンツ-->
    <div class="info_post">
        <div class=info_post-details>
            <div class=info_post-details__category>
                <?php
                $taxonomy_name = "information-cat";
                $this_terms = get_the_terms($post->ID, $taxonomy_name);
                if ($this_terms && !is_wp_error($this_terms)) {
                    foreach ($this_terms as $key => $term) {
                        echo '<p>' . $term->name . '</p>';
                    }
                }
                ?>
            </div>
            <div class=info_post-details__date>
                <p><?= get_the_date() ?></p>
            </div>
            <div class=info_post-details__title>
                <h1><?= get_the_title() ?></h1>
            </div>
            <?php
            if (has_post_thumbnail()) :
                $thumbnail = get_the_post_thumbnail_url(get_the_ID(), 'full');
            ?>
                <div class="info_post-details__thumbnail" style="background-image: url(<?php echo $thumbnail; ?>);">
                </div>
            <?php endif; ?>
        </div>
        <!-- 記事詳細__本文 -->
        <div class="article-details">
            <div class=article-details__contents>
                <?= get_the_content(); ?>
            </div>
        </div>
    </div>
    <div class="m80"></div>
    <div class="info_post_btn">
        <a href="<?php echo get_permalink(7783); ?>">
            <button class="page-btn">
                <p>一覧に戻る</p>
            </button>
        </a>
    </div>
    <div class="m80"></div>
<?php endwhile; ?>
</div>
<?php get_footer() ?>