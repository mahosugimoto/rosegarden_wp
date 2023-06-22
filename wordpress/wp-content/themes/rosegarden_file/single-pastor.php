<?php
/*
Template Name: 牧師のブログ詳細
*/
?>

<?php get_header() ?>
<?php include('header_icon.php'); ?>
<?php $pastoBlogId = 48; ?>

<!-- パンクズ_sp -->
<?php custom_breadcrumbs('sp'); ?>

<!-- タイトル -->
<div class="page-title_03">
    <div class="page-title_03__eng">
        <h2><?php echo SCF::get('title_en', $pastoBlogId); ?>
        <span><?= get_the_title($pastoBlogId) ?></span></h2>
    </div>
    <div class="page-title_03__contents">
        <p><?php echo SCF::get('fv_text', $pastoBlogId); ?></p>
    </div>
</div>

<!-- パンクズ_pc -->
<?php custom_breadcrumbs('pc'); ?>

<!-- イベントタイトル-->

<div class="pastor-single_wrap">
<?php while (have_posts()) : the_post();
    $post_type = get_post_type();
    $post_type_link = get_post_type_archive_link($post_type);

    $previous_post = get_previous_post();
    $next_post = get_next_post();
?>
    <!-- 記事詳細__本文 -->
    <div class="pastor_blog02">
        <div class="pastor_blog02_wrap">
            <div class=info-details>
                <div class=info-details__date>
                    <p><?= get_the_date() ?></p>
                </div>
                <div class=info-details__title>
                    <h1><?= get_the_title() ?></h1>
                </div>
            </div>
        </div>
        <div class="article-details">
            <div class=article-details__contents>
                <?= get_the_content() ?>
            </div>
        </div>
        <div class="m80"></div>
        <div class="pastor_blog02__btn">
            <div class="btn_flex">
                <?php if ($previous_post) : ?>
                    <a href="<?php echo get_permalink($previous_post); ?>">
                        <button class="page-btn_pre">
                            <img src="/wp-content/themes/rosegarden_file/assets/img/dcr/arrow_prev.png" alt="">
                            <p>前のページ</p>
                        </button>
                    </a>
                <?php endif; ?>
                <a href="<?php echo esc_url($post_type_link); ?>">
                    <button class="page-btn_list">
                        <p>一覧に戻る</p>
                    </button>
                </a>
                <?php if ($next_post) : ?>
                    <a href="<?php echo get_permalink($next_post); ?>">
                        <button class="page-btn_next">
                            <p>次のページ</p>
                            <img src="/wp-content/themes/rosegarden_file/assets/img/dcr/arrow_next.png" alt="">
                        </button>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php endwhile; ?>

<div class="pastor_sidebar">
    <?php get_template_part('pastor', 'sidebar'); ?>
</div>
</div>
<div class="m80"></div>
<?php get_footer() ?>