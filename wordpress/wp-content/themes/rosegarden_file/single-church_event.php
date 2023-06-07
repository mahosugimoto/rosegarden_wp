<?php get_header() ?>
<?php include('header_icon.php'); ?>


<?php require_once('breadcrumb.php');?>


<?php while (have_posts()) : the_post(); ?>
    <!-- イベントタイトル-->
    <div class="church_event__top">
        <div class=church_event__top-details>
            <div class=church_event__top-details__category>
                <?php
                $taxonomy_name = "church_event-cat";
                $this_terms = get_the_terms($post->ID, $taxonomy_name);
                foreach ($this_terms as $key => $term) : ?>
                    <p><?= $term->name; ?></p>
                <?php
                endforeach;
                ?>
            </div>
            <div class=church_event__top-details__title>
                <h2><?= get_the_title(); ?></h2>
            </div>
            <div class=church_event__top-details__thumbnail style="background-image: url(/wp-content/themes/rosegarden_file/assets/img/church_event.png);">
            </div>
        </div>
   

    <!-- 記事詳細__本文 -->
    <div class="church_event_edit">
        <div class="article-details">
            <div class=article-details__contents>
                <?= get_the_content(); ?>
            </div>
        </div>
        <div class="m80"></div>
        <div class="church_event__btn">
            <button class="page-btn" onclick="location.href='<?php echo get_page_link(46); ?>'">
                <p>一覧に戻る</p>
            </button>
        </div>
    </div>
    </div>
<?php endwhile; ?>
<div class="m80"></div>
<?php get_footer() ?>