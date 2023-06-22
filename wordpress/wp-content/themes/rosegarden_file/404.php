<?php
get_header();
?>
<?php include('header_icon.php'); ?>
<div class="wrap_404">
    <div class="page-title_03">
        <div class="page-title_03__eng">
            <h1>
                お探しのページが<br>見つかりませんでした
                <span>404</span>
            </h1>
        </div>
    </div>
    <div class="page-title_03__contents" style="text-align: center
    ;">
        <p>お探しのページは見つかりませんでした。</p>
        <p>一時的にアクセスできない状況にあるか、移動もしくは削除された可能性があります。</p>
        <p>恐れ入りますが、トップページから目的のページをお探しください。</p>
    </div>
    <div class="m64"></div>
    <div class="wrap_404_policy_block_btn">
        <button class="page-btn" onclick="location.href='<?php echo home_url(); ?>'">
            <p>TOPページに戻る</p>
        </button>
    </div>
</div>
<div class="m80"></div>
<?php get_footer(); ?>