<?php
/*
Template Name: 牧師のブログ詳細
*/
?>

<?php get_header()?>
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

<!-- イベントタイトル-->


<?php while (have_posts()) : the_post(); ?>
<!-- 記事詳細__本文 -->
<div class="pastor_blog02">
<div class="pastor_blog02_wrap">
    <div class=info-details>
        <div class=info-details__date>
            <p><?= get_the_date()?></p>
        </div>
        <div class=info-details__title>
            <h2><?= get_the_title()?></h2>
        </div>
    </div>
</div>
    <div class="article-details">
        <div class=article-details__contents>
            <?= get_the_content()?>
        </div>
    </div>
    <div class="m80"></div>
    <div class="pastor_blog02__btn">
        <div class="btn_flex">
            <button class="page-btn_pre">
                <img src="/wp-content/themes/rosegarden_file/assets/img/dcr/arrow_prev.png" alt="">
                <p>前のページ</p>
            </button>
            <button class="page-btn_list">
                <p>一覧に戻る</p>
            </button>
            <button class="page-btn_next">
                <p>次のページ</p>
                <img src="/wp-content/themes/rosegarden_file/assets/img/dcr/arrow_next.png" alt="">
            </button>
        </div>
    </div>
</div>
<?php endwhile; ?>
<div class="m80"></div>
<?php get_footer()?>
