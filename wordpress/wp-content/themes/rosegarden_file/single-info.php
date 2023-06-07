<?php get_header() ?>
<?php include('header_icon.php'); ?>

<?php require_once('breadcrumb.php');?>

<?php while (have_posts()) : the_post(); ?>

    <!-- お知らせコンテンツ-->
    <div class="info">
        <div class=info-details>
            <div class=info-details__category>
                <?php
                $taxonomy_name = "info-cat";
                $this_terms = get_the_terms($post->ID, $taxonomy_name);
                if ($this_terms && !is_wp_error($this_terms)) {
                    foreach ($this_terms as $key => $term) {
                        echo '<p>' . $term->name . '</p>';
                    }
                }
                ?>
            </div>
            <div class=info-details__date>
                <p><?= get_the_date() ?></p>
            </div>
            <div class=info-details__title>
                <h2><?= get_the_title() ?></h2>
            </div>
            <?php 
            if(has_post_thumbnail()): 
                $thumbnail = get_the_post_thumbnail_url(get_the_ID(), 'full');
            ?>
            <div class=info-details__thumbnail style="background-image: url(<?php echo $thumbnail;?>);">
            </div>
            <?php endif;?>
        </div>
        <!-- 記事詳細__本文 -->
        <div class="article-details">
            <div class=article-details__contents>
                <?= get_the_content(); ?>
            </div>
        </div>
    </div>
    <div class="m80"></div>
<?php endwhile; ?>
<?php get_footer() ?>