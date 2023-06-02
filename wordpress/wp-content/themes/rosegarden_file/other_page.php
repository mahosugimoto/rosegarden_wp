<?php 
$otherBanners = otherBanners();
if (!empty($otherBanners)):
?>
<div class="other_page">
    <p>こちらのページもチェック</p>
    <div class="m16"></div>
    <div class="other_page__wrap">
        <?php foreach($otherBanners as $banner): ?>
        <a href="<?php echo $banner['external_link'];?>" target="_blank">
            <div class="other_page__block">
                <?php if(!empty($banner['image'])): ?>
                <div class="other_page__block__img" style="background-image:url(<?php echo $banner['image'];?>)">
                </div>
                <?php endif;?>
                <div class="other_page__block__title">
                    <div class="page-title_08">
                        <div class="page-title_08__eng">
                            <p><?php echo $banner['title'];?></p>
                        </div>
                        <?php if(!empty($banner['sub_title'])): ?>
                        <div class="page-title_08__jp">
                            <p><?php echo $banner['sub_title']; ?></p>
                        </div>
                        <?php endif;?>
                    </div>
                </div>
            </div>
        </a>
        <?php endforeach;?>
    </div>
</div>
<?php endif;?>
