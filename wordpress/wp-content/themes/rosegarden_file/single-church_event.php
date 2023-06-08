<?php get_header() ?>
<?php include('header_icon.php'); ?>


<!-- パンクズ_sp -->
<?php custom_breadcrumbs('sp'); ?>

<!-- タイトル -->
<div class="page-title_03">
    <div class="page-title_03__eng">
        <p><?php echo SCF::get('title_en', 46); ?></p>
    </div>
    <div class="page-title_03__jp">
        <p><?= get_the_title() ?></p>
    </div>
    <div class="page-title_03__contents">
        <p><?php echo SCF::get('fv_text', 46); ?></p>
    </div>
</div>

<!-- パンクズ_pc -->
<?php custom_breadcrumbs('pc'); ?>


<?php while (have_posts()) : the_post(); ?>
    <!-- イベントタイトル-->
    <div class="church_event__top">
        <div class=church_event__top-details>
            <div class=church_event__top-details__category>
                <?php
                $taxonomy_name = "church_event-cat";
                $this_terms = get_the_terms($post->ID, $taxonomy_name);
                if (!empty($this_terms)) :
                    foreach ($this_terms as $key => $term) : ?>
                        <p><?= $term->name; ?></p>
                <?php
                    endforeach;
                endif;
                ?>
            </div>
            <div class="church_event__top-details__title">
                <h2><?= get_the_title(); ?></h2>
            </div>
            <?php
            if (has_post_thumbnail()) :
                $thumbnail = get_the_post_thumbnail_url(get_the_ID(), 'full');
            ?>
                <div class="church_event__top-details__thumbnail" style="background-image: url(<?php echo $thumbnail; ?>);">
                </div>
            <?php endif; ?>
        </div>


        <!-- 記事詳細__本文 -->
        <div class="church_event_edit">
            <div class="article-details">
                <div class="article-details__contents">
                    <?= get_the_content(); ?>
                </div>
            </div>
            <div class="m80"></div>
            <div class="church_event__btn">
                <a href="<?php echo get_permalink(46); ?>">
                <button class="page-btn">
                    <p>一覧に戻る</p>
                </button>
                </a>
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