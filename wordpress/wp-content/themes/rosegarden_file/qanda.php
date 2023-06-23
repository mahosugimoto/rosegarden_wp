<?php
/*
Template Name: Q&A
*/
get_header();
?><?php include('header_icon.php'); ?>
<?php include('cta.php'); ?>

<head>
    <meta name="robots" content="noindex">
</head>


<?php require_once('breadcrumb.php');?>


<script>
    $(function() {
        $('.qanda-content:not(:first-of-type)').css('display', 'none');
        $('.qanda-label').click(function() {
            $(this).next('div').slideToggle();
            $(this).find(".qanda-icon").toggleClass('open');
        });
    });
</script>

<!-- アンカーリンク -->
<!-- 
<div class="qanda__anchor-link">
    <a href="#fair">
        <div class="anchor-link">
            <img src="assets/img/icon/arrow.png" alt="" style="width:13px">
            <p>ブライダルフェア</p>
        </div>
    </a>
    <a href="#about_church">
        <div class="anchor-link">
            <img src="assets/img/icon/arrow.png" alt="" style="width:13px">
            <p>教会について</p>
        </div>
    </a>
    <a href="#qandacess">
        <div class="anchor-link">
            <img src="assets/img/icon/arrow.png" alt="" style="width:13px">
            <p>アクセス</p>
        </div>
    </a>
</div>
-->
<div class="wrapper">
<?php while (have_posts()) : the_post(); ?>
    <?= get_the_content(); ?>
<?php endwhile; ?>
</div>

<!--  元々のhtml

<ul class="qanda_block">
    <div class="lace-dcr_top">
        <div class="lace-dcr_top__img">
            <img src="assets/img/dcr/lace.png" alt="">
        </div>
    </div>
    <a name="fair"></a>
    <div class="qanda_block__title">
        <h3>ブライダルフェア</h3>
    </div>
    <li>
        <div class="qanda-label">
            <div class="qanda-label__flex">
                <p class="Q">Q</p>
                <div class="qanda-label__flex__text">
                    <h3>漠然としたイメージだけど、相談してもいいですか？</h3>
                </div>
            </div>
            <div class="qanda-icon-wrap"><span class="qanda-icon"></span></div>
        </div>
        <div class="qanda-content">
            <div class="qanda-label__flex02">
                <p class="A">A</p>
                <div class="qanda-label__flex02__text">
                    <h3>お気軽にご相談ください。</h3>
                    <p>はじめてのことをはじめるきっかけづくりでご利用いただくお2人もたくさんいらっしゃいます。何の知識もなくイメージするのは大変なこと。これまで多彩なウエディングシーンを創り上げてきた私達は、お2人のギモンを即解決して、あいまいなイメージが具体的な理解にかわっていくはず。わたしたちと一緒に創っていきましょう。</p>
                </div>
            </div>
        </div>
    </li>
    <li>
        <div class="qanda-label">
            <div class="qanda-label__flex">
                <p class="Q">Q</p>
                <div class="qanda-label__flex__text">
                    <h3>アフターセレモニーってなんですか？</h3>
                </div>
            </div>
            <div class="qanda-icon-wrap"><span class="qanda-icon"></span></div>
        </div>
        <div class="qanda-content">
            <div class="qanda-label__flex02">
                <p class="A">A</p>
                <div class="qanda-label__flex02__text">
                    <h3>ご参列されたゲストの方とおふたりが挙式の余韻に浸ってゆっくりとお過ごし頂けるようなお時間をご用意しております。</h3>
                    <p>挙式が終わって慌ただしくすぐにパーティ会場に移動してしまうのではなく、札幌市を一望出来る大パノラマと藻岩山の四季折々の大自然に囲まれ、ゲストのみなさまと忘れられない最高の一日をお過ごしください。</p>
                </div>
            </div>
        </div>
    </li>
    <div class="m24"></div>
    <a name="about_church"></a>
    <div class="qanda_block__title">
        <h3>教会</h3>
    </div>
    <li>
        <div class="qanda-label">
            <div class="qanda-label__flex">
                <p class="Q">Q</p>
                <div class="qanda-label__flex__text">
                    <h3>「本物の教会」というのは他の教会と何が違うのですか？</h3>
                </div>
            </div>
            <div class="qanda-icon-wrap"><span class="qanda-icon"></span></div>
        </div>
        <div class="qanda-content">
            <div class="qanda-label__flex02">
                <p class="A">A</p>
                <div class="qanda-label__flex02__text">
                    <h3>ローズガーデンクライスト教会は、プロテスタントの教会です。</h3>
                    <p>教会には専属の牧師先生がおり結婚式も執り行っていますが、日々通われる信者さんのために礼拝や信仰も行っております。流れるような挙式を行うのではなく、おふたりのための挙式である様に、事前に牧師先生夫婦とお会いして頂き、挙式当日の讃美の言葉やメッセージはおふたりに合わせたものをお伝えし、本当に心のこもった結婚式でスタートをして頂きたいと思っています。</p>
                    <p>「結婚式専用のチャペル」ではなく、ここで結婚式を挙げてくださったカップルや日々通われる信者さんのためにも地域に根付いた教会として皆様をお待ちしております。</p>
                    <p>ローズガーデンクライスト教会で挙式を挙げてくださったおふたりが、生涯の心のよりどころにして頂けるような教会になりたいと思っておりますので、年間を通してチャリティコンサートや一般の方がまた気楽に教会にご来館頂けるような礼拝等も行っております。金婚式や銀婚式にまたご来館頂いたり、おふたりのお子さんが同じ教会で挙式を 挙げてくださり思い出が続いていくような場所にもなれます。</p>
                </div>
            </div>
        </div>
    </li>
    <li>
        <div class="qanda-label">
            <div class="qanda-label__flex">
                <p class="Q">Q</p>
                <div class="qanda-label__flex__text">
                    <h3>教会の中で食事は食べられますか？</h3>
                </div>
            </div>
            <div class="qanda-icon-wrap"><span class="qanda-icon"></span></div>
        </div>
        <div class="qanda-content">
            <div class="qanda-label__flex02">
                <p class="A">A</p>
                <div class="qanda-label__flex02__text">
                    <h3>申し訳ございませんが、お食事やお酒などをご用意することができません。</h3>
                    <p>ローズガーデンクライスト教会の中ではお酒等をお出しできませんので、<a href="#">ハウスウエディング会場「ピエトラセレーナ」</a>や、少人数専用の<a href="#">結婚式場「ブランシュメゾン」</a>をご用意させて頂きました。その他にも多数、教会と提携している会場がございますのでご相談ください。</p>
                </div>
            </div>
        </div>
    </li>
    <div class="m24"></div>
    <a name="qandacess"></a>
    <div class="qanda_block__title">
        <h3>アクセス</h3>
    </div>
    <li>
        <div class="qanda-label">
            <div class="qanda-label__flex">
                <p class="Q">Q</p>
                <div class="qanda-label__flex__text">
                    <h3>バスで行きたいのですが予約制ですか？</h3>
                </div>
            </div>
            <div class="qanda-icon-wrap"><span class="qanda-icon"></span></div>
        </div>
        <div class="qanda-content">
            <div class="qanda-label__flex02">
                <p class="A">A</p>
                <div class="qanda-label__flex02__text">
                    <h3>はい、予約制です。</h3>
                    <p>ここにアクセスのテキストが入ります。</p>
                </div>
            </div>
        </div>
    </li>
    <div class="lace-dcr_bottom">
        <div class="lace-dcr_bottom__img">
            <img src="assets/img/dcr/lace02.png" alt="">
        </div>
    </div>
</ul>
<div class="m80"></div>

<div class="qanda-info">
    <h2>ご質問がございましたら<br class="new-line">気軽にお問合せください。</h2>
    <div class="qanda-info__address">
        <h3><span>TEL.</span>011-522-0151</h3>
        <p>営業時間: 平日 11:00 〜 19:00 <br class="new-line">/ 土日祝 9:00 〜 19:00</p>
    </div>
    <p>水曜定休</p>
    <div class="m24"></div>
    <div class="qanda-info__btn">
        <button class="page-btn">
            <p>お問い合わせフォームはこちら</p>
        </button>
    </div>
</div>
-->

<?php include('other_page.php'); ?>
<?php get_footer(); ?>