<?php get_header() ?>
<?php include('header_icon.php'); ?>


<!-- パンクズ_sp -->
<div class="breadcrumb_sp">
    <div class="breadcrumb_sp__contents">
        <p><a href="<?php echo home_url( '/' ); ?>"><span>トップ</span></a></p>
        <p>></p>
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
            <button class="page-btn">
                <p>一覧に戻る</p>
            </button>
        </div>
    </div>
    </div>

<?php endwhile; ?>
<div class="m80"></div>
<?php get_footer() ?>