<?php
/*
Template Name: 挙式スケジュール
*/
get_header();
?><?php include('header_icon.php'); ?>

<?php include('cta.php'); ?>

<!-- FV BGあり -->
<!-- PC BG -->
<?php
// SCF::get_post_meta($post->ID, '設定した名前', 画像サイズ)
$img = get_post_meta($post->ID, 'image_pc', true);
?>
<div class="page-background" style="background-image:linear-gradient(rgba(0,0,0,0.4),rgba(0,0,0,0.4)),url(<?php echo wp_get_attachment_url($img) ?>)">
<img src="<p><?php echo SCF::get('image_pc'); ?></p>" alt="">
    <div class="page-title_05">
        <div class="page-title_05__eng">
            <p><?php echo SCF::get('title_en'); ?></p>
        </div>
        <div class="page-title_05__jp">
            <p><?= get_the_title() ?></p>
        </div>
        <div class="page-title_05__contents">
            <p><?php echo SCF::get('fv_text'); ?></p>
        </div>
    </div>
</div>

<?php require_once('breadcrumb_other.php');?>

<?php
// SCF::get_post_meta($post->ID, '設定した名前', 画像サイズ)
$img = get_post_meta($post->ID, 'image_sp', true);
?>
<!-- SP BG -->
<div class="page-background_sp" style="background-image:linear-gradient(rgba(0,0,0,0.4),rgba(0,0,0,0.4)),url(<?php echo wp_get_attachment_url($img) ?>)">
<img src="<p><?php echo SCF::get('image_sp'); ?></p>" alt="">
    <img src="<?php the_field('image_pc'); ?>" alt="">
    <div class="page-title_05">
        <div class="page-title_05__eng">
            <p><?php echo SCF::get('title_en'); ?></p>
        </div>
        <div class="page-title_05__jp">
            <p><?= get_the_title() ?></p>
        </div>
        <div class="page-title_05__contents">
            <p><?php echo SCF::get('fv_text'); ?></p>
        </div>
    </div>
</div>

<!-- タブ -->
<script>
jQuery(function($){
  $('.schedule__anchor-link__btn01').click(function(){
    $('.active').removeClass('active');
    $(this).addClass('active');
    $('.show').removeClass('show');
    // クリックしたタブからインデックス番号を取得
    const index = $(this).index();
    // クリックしたタブと同じインデックス番号をもつコンテンツを表
    $('.schedule_a').eq(index).addClass('show');
  });
});
</script>




  <!-- 
<div class="schedule">
    <div class="schedule__notes">
        <p>※一般的な例ですので、ご新郎ご新婦様のプランによっては変更になる場合もございます。</p>
    </div>
    <div class="schedule__anchor-link ">
        <button class="schedule__anchor-link__btn01 active" >
            <p>挙式までのスケジュール</p>
        </button>
        <button class="schedule__anchor-link__btn01">
            <p>当日のスケジュール</p>
        </button>
    </div>


  スケジュールコンテンツ -->
    <!-- 挙式までのスケジュール -->
     <!-- 
    <div class="schedule_area">
    <div class="schedule_a active">
        <div class="schedule__contents">
            <div class="schedule__contents__cover" style="background-image:url(/wp-content/themes/rosegarden_file/assets/img/schedule_cover01.png);">
            </div>
            <div class="schedule__contents__main">
                <h2>挙式までのスケジュール</h2>
                <div class="schedule__contents__main__flex">
                    <div class="schedule__contents__main__flex__red-arrow">
                        <div class="arrow_down01">
                            <img src="/wp-content/themes/rosegarden_file/assets/img/dcr/arrow_down.png" alt="">
                        </div>
                        <div class="arrow_down02">
                            <img src="/wp-content/themes/rosegarden_file/assets/img/dcr/arrow_down.png" alt="">
                        </div>
                        <div class="arrow_down03">
                            <img src="/wp-content/themes/rosegarden_file/assets/img/dcr/arrow_down.png" alt="">
                        </div>
                        <div class="arrow_down04">
                            <img src="/wp-content/themes/rosegarden_file/assets/img/dcr/arrow_down.png" alt="">
                        </div>
                        <div class="arrow_down05">
                            <img src="/wp-content/themes/rosegarden_file/assets/img/dcr/arrow_down.png" alt="">
                        </div>
                        <div class="arrow_down06">
                            <img src="/wp-content/themes/rosegarden_file/assets/img/dcr/arrow_down.png" alt="">
                        </div>
                    </div>
                    <div class="schedule__contents__main__flex__block-wrap">
                        <div class="schedule__contents__main__flex__block">
                            <div class="schedule_block__imgbox">
                                <div class="schedule_block__imgbox__text">
                                    <h3 class="step">STEP<span>01</span></h3>
                                    <h3>衣裳の試着・決定</h3>
                                    <p>【8ヶ月前】</p>
                                </div>
                                <div class="schedule_block__imgbox__img" style="background-image:url(/wp-content/themes/rosegarden_file/assets/img/schedule-a_01.png)">

                                </div>
                            </div>
                            <div class="schedule_block__text">
                                <p>専属衣装店「グランマニエ」「プリマヴェーラ」で試着の予約をしましょう。プリマヴェーラでは、ご両親様衣裳（お留袖・モーニング）レンタルも承っております。当日教会での着付け＆ヘアセットをご希望の場合は、衣裳担当までご相談ください。</p>
                            </div>
                        </div>
                        <div class="schedule__contents__main__flex__block">
                            <div class="schedule_block__imgbox">
                                <div class="schedule_block__imgbox__text">
                                    <h3 class="step">STEP<span>02</span></h3>
                                    <h3>案内状の準備・発送</h3>
                                    <p>【2ヶ月～3ヶ月前】</p>
                                </div>
                                <div class="schedule_block__imgbox__img" style="background-image:url(/wp-content/themes/rosegarden_file/assets/img/schedule-a_02.png)">

                                </div>
                            </div>
                            <div class="schedule_block__text">
                                <p>大切なゲストをお迎えするための案内状を作りましょう。ローズガーデンクライスト教会では、案内状のサンプルもご用意しております。披露宴パーティーとの提携プランをご利用の場合、プラン内に案内状が含まれている場合もございますので、披露宴会場のプランナーにご相談ください。</p>
                            </div>
                        </div>
                        <div class="schedule__contents__main__flex__block">
                            <div class="schedule_block__imgbox">
                                <div class="schedule_block__imgbox__text">
                                    <h3 class="step">STEP<span>03</span></h3>
                                    <h3>ヘアメイクの打ち合わせ</h3>
                                    <p>【2ヶ月～3ヶ月前】</p>
                                </div>
                                <div class="schedule_block__imgbox__img" style="background-image:url(/wp-content/themes/rosegarden_file/assets/img/schedule-a_03.png)">

                                </div>
                            </div>
                            <div class="schedule_block__text">
                                <p>衣裳が決まりましたら、小物合わせと一緒に生花ブーケ＆ブートニア、ヘアメイクについてのお打ち合わせも行っております。
                                    衣裳担当より別途ご案内させていただきます。</p>
                            </div>
                        </div>
                        <div class="schedule__contents__main__flex__block">
                            <div class="schedule_block__imgbox">
                                <div class="schedule_block__imgbox__text">
                                    <h3 class="step">STEP<span>04</span></h3>
                                    <h3>挙式カウンセリング</h3>
                                    <p>【2ヶ月～1ヶ月前】</p>
                                </div>
                                <div class="schedule_block__imgbox__img" style="background-image:url(/wp-content/themes/rosegarden_file/assets/img/schedule-a_04.png)">

                                </div>
                            </div>
                            <div class="schedule_block__text">
                                <h3>進行カウンセリング</h3>
                                <p>挙式の進行やアフターセレモニーでの過ごし方を担当スタッフと打ち合わせ。他に記念写真、アルバム、DVD撮影、フラワーシャワー、バルーンリリースなどのご相談も承っております。</p>
                                <div class="m16"></div>
                                <h3>牧師先生とのカウンセリング</h3>
                                <p>挙牧師先生が事前におふたりの人柄などを理解することで、挙式当日にはおふたりに合ったメッセージが送られます。</p>
                            </div>
                        </div>
                        <div class="schedule__contents__main__flex__block">
                            <div class="schedule_block__imgbox">
                                <div class="schedule_block__imgbox__text">
                                    <h3 class="step">STEP<span>05</span></h3>
                                    <h3>最終打ち合わせ</h3>
                                    <p>【2週間～1週間前】</p>
                                </div>
                                <div class="schedule_block__imgbox__img" style="background-image:url(/wp-content/themes/rosegarden_file/assets/img/schedule-a_05.png)">

                                </div>
                            </div>
                            <div class="schedule_block__text">
                                <h3>挙式内容の最終確認をします。</h3>
                                <p>○列席人数 ○当日スケジュール（挙式の進行や来館時間など）○オプション ○最終お見積りとお支払いについて
                                    ※お支払いは、原則挙式3日前までに銀行振り込みにてお願いいたします。</p>
                            </div>
                        </div>
                        <div class="schedule__contents__main__flex__block">
                            <div class="schedule_block__imgbox">
                                <div class="schedule_block__imgbox__text">
                                    <h3 class="step">STEP<span>06</span></h3>
                                    <h3>結婚式当日</h3>
                                    <p>【挙式当日】</p>
                                </div>
                                <div class="schedule_block__imgbox__img" style="background-image:url(/wp-content/themes/rosegarden_file/assets/img/schedule-a_06.png)">

                                </div>
                            </div>
                            <div class="schedule_block__text">
                                <h3>HAPPY WEDDING!</h3>
                                <p>お2人とゲストにとってゆったりとしたあたたかい挙式をお過ごしください。</p>
                            </div>
                        </div>
                        <div class="schedule__contents__main__flex__block">
                            <div class="schedule_block__imgbox" style="margin-right: 0px;">
                                <div class="schedule_block__imgbox__text" style="margin-right: 0px;">
                                    <h3>その他事前準備</h3>
                                </div>
                            </div>
                            <div class="schedule_block__text">
                                <p>マリッジリング、ハネムーン、ブライダルエステ、ブライダルシェービング（挙式の7～5日前位がベストです）など、結婚の準備のご相談もお気軽にスタッフまでお問い合わせください。</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    -->

    <!-- 当日のスケジュール 
    <div class="schedule_a">
        <div class="schedule__contents">
            <div class="schedule__contents__cover" style="background-image:url(/wp-content/themes/rosegarden_file/assets/img/schedule-b_cover.png);">
            </div>
            <div class="schedule__contents__main">
                <h2>当日のスケジュール</h2>
                <div class="schedule__contents__main__flex">
                    <div class="schedule__contents__main__flex__red-arrow">
                        <div class="arrow_down07">
                            <img src="/wp-content/themes/rosegarden_file/assets/img/dcr/arrow_down.png" alt="">
                        </div>
                        <div class="arrow_down08">
                            <img src="/wp-content/themes/rosegarden_file/assets/img/dcr/arrow_down.png" alt="">
                        </div>
                        <div class="arrow_down09">
                            <img src="/wp-content/themes/rosegarden_file/assets/img/dcr/arrow_down.png" alt="">
                        </div>
                        <div class="arrow_down10">
                            <img src="/wp-content/themes/rosegarden_file/assets/img/dcr/arrow_down.png" alt="">
                        </div>
                        <div class="arrow_down11">
                            <img src="/wp-content/themes/rosegarden_file/assets/img/dcr/arrow_down.png" alt="">
                        </div>
                        <div class="arrow_down12">
                            <img src="/wp-content/themes/rosegarden_file/assets/img/dcr/arrow_down.png" alt="">
                        </div>
                    </div>
                    <div class="schedule__contents__main__flex__block-wrap">
                        <div class="schedule__contents__main__flex__block">
                            <div class="schedule_block__imgbox">
                                <div class="schedule_block__imgbox__text">
                                    <h3 class="step">STEP<span>01</span></h3>
                                    <h3>ご新郎ご新婦来館</h3>
                                    <p>【2時間前】</p>
                                </div>
                                <div class="schedule_block__imgbox__img" style="background-image:url(/wp-content/themes/rosegarden_file/assets/img/schedule-b_01.png)">

                                </div>
                            </div>
                            <div class="schedule_block__text">
                                <p>ご新郎ご新婦様は、メイクやお支度のため2時間前のご来館となります。事前に打ち合わせを行ったヘアメイクスタッフと挙式前の緊張をほどいてゆったりとお支度ができるよう、メイクルームは完全個室となっております。</p>
                            </div>
                        </div>
                        <div class="schedule__contents__main__flex__block">
                            <div class="schedule_block__imgbox">
                                <div class="schedule_block__imgbox__text">
                                    <h3 class="step">STEP<span>02</span></h3>
                                    <h3>親族控室利用オープン</h3>
                                    <p>【1時間前】】</p>
                                </div>
                                <div class="schedule_block__imgbox__img" style="background-image:url(/wp-content/themes/rosegarden_file/assets/img/schedule-b_03.png)">

                                </div>
                            </div>
                            <div class="schedule_block__text">
                                <p>挙式1時間前に、親族控室がオープンします。2部屋ご用意があるのでご両家１部屋ずつご利用頂けます。ご親族の皆様には挙式30分前にはお越し頂いております。</p>
                            </div>
                        </div>
                        <div class="schedule__contents__main__flex__block">
                            <div class="schedule_block__imgbox">
                                <div class="schedule_block__imgbox__text">
                                    <h3 class="step">STEP<span>03</span></h3>
                                    <h3>リハーサル</h3>
                                </div>
                                <div class="schedule_block__imgbox__img" style="background-image:url(/wp-content/themes/rosegarden_file/assets/img/schedule-b_02.png)">

                                </div>
                            </div>
                            <div class="schedule_block__text">
                                <p>ウェディングロードの歩き方や、指輪の交換、挙式での動作や挙式進行についての説明を含めリハーサルを行っていきます。挙式をお手伝いしてくださる方のリハーサル時間もご用意しております。</p>
                            </div>
                        </div>
                        <div class="schedule__contents__main__flex__block">
                            <div class="schedule_block__imgbox">
                                <div class="schedule_block__imgbox__text">
                                    <h3 class="step">STEP<span>04</span></h3>
                                    <h3>ゲスト入場</h3>
                                </div>
                                <div class="schedule_block__imgbox__img" style="background-image:url(/wp-content/themes/rosegarden_file/assets/img/schedule-b_04.png)">

                                </div>
                            </div>
                            <div class="schedule_block__text">
                                <p>お着替えが必要なゲストの方々の着替室も完備しております。ゲストがお揃いになったら、事前に聖歌隊と一緒に挙式の中で歌う賛美歌を歌いましょう。ゲストの皆様にも参加していただくことによって、おふたりの挙式を祝福していただき、皆様の挙式への気持ちが高まります。</p>
                            </div>
                        </div>
                        <div class="schedule__contents__main__flex__block">
                            <div class="schedule_block__imgbox">
                                <div class="schedule_block__imgbox__text">
                                    <h3 class="step">STEP<span>05</span></h3>
                                    <h3>挙 式</h3>
                                </div>
                                <div class="schedule_block__imgbox__img" style="background-image:url(/wp-content/themes/rosegarden_file/assets/img/schedule-b_05.png)">

                                </div>
                            </div>
                            <div class="schedule_block__text">
                                <p>30分間、ゆっくりとおふたりのためだけの挙式を行います。親しい方々に見守られながらウエディングロードを一歩一歩、歩いていきます。ゲストからのたくさんの祝福を受け、今日この日を迎えたことを実感できることでしょう。</p>
                            </div>
                        </div>
                        <div class="schedule__contents__main__flex__block">
                            <div class="schedule_block__imgbox">
                                <div class="schedule_block__imgbox__text">
                                    <h3 class="step">STEP<span>06</span></h3>
                                    <h3>アフターセレモニー</h3>
                                    <p>【最長１時間】</p>
                                    <p><span>※披露宴時間やお2人とご相談の上、変動有。</span></p>
                                </div>
                                <div class="schedule_block__imgbox__img" style="background-image:url(/wp-content/themes/rosegarden_file/assets/img/schedule-b_06.png)">

                                </div>
                            </div>
                            <div class="schedule_block__text">
                                <p>挙式後の余韻に浸りながら、ピアッツァ（中庭）やコイノニア（大広間）でゲストの皆様とゆったり語らい、自由にお写真を撮影できる時間をご用意しております。おふたりからゲストの皆様に向けて感謝の気持ちを伝えたり、一体感を持てる様なセレモニーを行って頂けます。</p>
                            </div>
                        </div>
                        <div class="schedule__contents__main__flex__block">
                            <div class="schedule_block__imgbox">
                                <div class="schedule_block__imgbox__text">
                                    <h3 class="step">STEP<span>07</span></h3>
                                    <h3>パーティ会場へ出発</h3>
                                </div>
                                <div class="schedule_block__imgbox__img" style="background-image:url(/wp-content/themes/rosegarden_file/assets/img/schedule-b_07.png)">

                                </div>
                            </div>
                            <div class="schedule_block__text">
                                <p>ゆったりとゲストのみなさまと過ごした後は、披露宴・パーティー会場へ移動となります。披露宴会場のご案内や、 移動のバスもご用意できますので、お気軽にスタッフまでお問い合わせください。</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
<div class="m80"></div>
 -->

 <!-- wp_カスタムhtml-->

<?php while (have_posts()) : the_post(); ?>

<?= get_the_content(); ?>
<?php endwhile; ?>

<!-- wp_カスタムhtml-->


<?php include('other_page.php'); ?>
<?php get_footer(); ?>