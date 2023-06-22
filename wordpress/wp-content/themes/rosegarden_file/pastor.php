<?php
/*
Template Name: 牧師紹介
*/
get_header();
?><?php include('header_icon.php'); ?>

<?php require_once('breadcrumb.php');?>

<div class="m80"></div>
<div class="pastor_intro">
    <div class="pastor_intro__block">
        <div class="pastor_intro__block__imgblock">
            <div class="pastor_intro__block__imgblock__img" style="background-image:url(/wp-content/themes/rosegarden_file/assets/img/pastor01.jpg);">
            </div>
            <div class="pastor_intro__block__imgblock__text">
                <p>主任牧師</p>
                <h3>大野 晃</h3>
                <p class="name-font">Akira Ono</p>
            </div>
            <div class="scq_dcr01">
                <p></p>
            </div>
        </div>
        <div class="pastor_intro__block__textblock">
            <p>１９５３年東京生まれ。大志を抱いて高卒後北海道へ。２０歳の時大学を休学し北欧デンマークへ留学。生きる意味を求めて教会へたどり着き、１９７４年デンマークの片田舎の小さな教会で洗礼を受ける。帰国後、復学・就職・結婚と人生の道を歩んでいたが、１９８５年牧師になる神の召命を受け、韓国の神学大学大学院に家族と共に留学。１９８９年より札幌にて教会をスタート。同時にカウンセラーとして、人生・結婚・家族問題・宗教カルト問題の相談員として２５年以上奉仕している。北海道クリスチャンミッションネットワーク委員、妻法子と共に結婚前カウンセリング（顔合わせ）に力を注いでいる。
                二人の娘があり。大の愛犬家・愛猫家で現在家で黒ラブと黒猫と暮らしている。レスリング２段。結婚式の司式は一万組を超えている。
                好きな聖書の言葉は「あなたの神 主であるわたしがあなたの右のの手を堅く握り“恐れるなわたしがあなたを助ける”と言っているのだから」（イザヤ４１：１３）</p>
        </div>
    </div>
</div>

<!-- 牧師ブログタイトル -->
<div class="page-title_03">
    <div class="page-title_03__eng">
        <h2>PASTOR BLOG</h2>
    </div>
    <div class="page-title_03__jp">
        <p>牧師のブログ</p>
    </div>
</div>

<!-- 牧師ブログ一覧 -->
<div class="pastor_blog3">
    <div class="pastor_blog3__list">
        <div class="lace-dcr_top">
            <div class="lace-dcr_top__img">
                <img src="/wp-content/themes/rosegarden_file/assets/img/dcr/lace.png" alt="">
            </div>
        </div>

        <div class="liststyle_pastor_blog2">
            <?php
            $args = array(
                'posts_per_page' => 5,
                'post_status' => 'publish',
                'post_type' => 'pastor',
            );
            $myposts = get_posts($args);
            foreach ($myposts as $post) : setup_postdata($post);
                $post_categories = wp_get_post_terms($post->ID, 'category', array('fields' => 'slugs'));
            ?>
                <a href="<?= the_permalink(); ?>">
                    <div class="liststyle_pastor_blog2__block">
                        <div class="liststyle_pastor_blog2__block__text">
                            <div class="liststyle_pastor_blog2__ctg">
                                <p class=""><?= get_the_date() ?></p>
                            </div>
                            <h3><?= get_the_title() ?></h3>
                            <div class="liststyle_pastor_blog2__block__text__content">
                                <?= custom_post_excerpt() ?>
                            </div>
                        </div>
                    </div>
                </a>
            <?php
            endforeach;
            wp_reset_postdata();
            ?>
        </div>
        <div class="liststyle_pastor_blog__btn">
        </div>
        <div class="lace-dcr_bottom">
            <div class="lace-dcr_bottom__img">
                <img src="/wp-content/themes/rosegarden_file/assets/img/dcr/lace02.png" alt="">
            </div>
        </div>
    </div>
</div>
<div class="m40"></div>
<div class="liststyle_info__btn">
    <button class="page-btn_icon" onclick="location.href='<?php echo get_post_type_archive_link('pastor'); ?>'">
        <img src="/wp-content/themes/rosegarden_file/assets/img/icon/list_icon.png" alt="">
        <p>牧師ブログ一覧へ</p>
    </button>
</div>
<div class="m80"></div>
<?php get_footer(); ?>