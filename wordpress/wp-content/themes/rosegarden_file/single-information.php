<?php get_header() ?>
<?php include('header_icon.php'); ?>

<!-- パンクズ_sp -->
<div class="breadcrumb_sp">
    <div class="breadcrumb_sp__contents">
        <p><a href="<?php echo home_url('/'); ?>"><span>トップ</span></a></p>
        <p>></p>
        <p><?= get_the_title() ?></p>
    </div>
</div>

<!-- タイトル -->
<div class="page-title_03">
    <div class="page-title_03__eng">
        <p><?php echo SCF::get('title_en'); ?></p>
    </div>
    <div class="page-title_03__jp">
        <p><?= get_the_title() ?></p>
    </div>
    <div class="page-title_03__contents">
        <p><?php echo SCF::get('fv_text'); ?></p>
    </div>
</div>

<!-- パンクズ_pc -->
<div class="breadcrumb">
    <div class="breadcrumb__contents">
        <p><a href="<?php echo home_url('/'); ?>"><span>トップ</span></a></p>
        <p>></p>
        <p><?= get_the_title() ?></p>
    </div>
</div>


<?php while (have_posts()) : the_post(); ?>

    <!-- お知らせコンテンツ-->
    <div class="info">
        <div class=info-details>
            <div class=info-details__category>
                <?php
                $taxonomy_name = "info-cat";
                $this_terms = get_the_terms($post->ID, $taxonomy_name);
                if ($this_terms && !is_wp_error($this_terms)) {
                    foreach ($this_terms as $key => $term) {
                        echo '<p>' . $term->name . '</p>';
                    }
                }
                ?>


            </div>
            <div class=info-details__date>
                <p><?= get_the_date() ?></p>
            </div>
            <div class=info-details__title>
                <h2><?= get_the_title() ?></h2>
            </div>
            <div class=info-details__thumbnail style="background-image: url(/wp-content/themes/rosegarden_file/assets/img/info_sample01.JPG);">
            </div>
        </div>
        <!-- 記事詳細__本文 -->
        <div class="article-details">
            <div class=article-details__contents>
                <?= get_the_content(); ?>
            </div>
        </div>
            <!--  
        <ol>
         
            <li><a href="">おすすめポイント①最高の景色のもとで叶うロケーションフォト撮影</a></li>
            <li><a href="">おすすめポイント②独立型教会で叶う二人だけの荘厳な挙式</a></li>
            <li><a href="">おすすめポイント③人生最高の日は最高の食事を～レストランで特別メニューに舌鼓</a></li>
         
        </ol>

        <h3>おすすめポイント①最高の景色のもとで叶うロケーションフォト撮影</h3>
        <p>札幌市内を一望できる、ローズガーデンクライスト教会をはじめ、私たちSOWA WEDDINGSが運営する会場には魅力的な撮影スポットがそろっています。屋外、屋内ともに<strong>非日常的な情景</strong>を演出できます。また、普段婚礼の撮影を行っているカメラマンが撮影を行いますので、一生に一度の晴れ姿をより素敵に撮影するテクニックを提供させていただけるのも、おふたりにとって大きなメリットです。</p>
        <h3>おすすめポイント②独立型教会で叶う二人だけの荘厳な挙式</h3>
        <p>道内最大級のパイプオルガンの音色が響き渡る、キリスト教の「本物」の教会・ローズガーデンクライスト教会での挙式がプラン内で叶います。神様の下での愛の誓いは、これからの二人の人生に訪れる困難を乗り越える糧となります。二人の人生が交わるタイミングで、唯一無二の誓いのひと時を素敵に叶えてみてはいかがでしょうか。</p>
        <h3>おすすめポイント③人生最高の日は最高の食事を～レストランで特別メニューに舌鼓</h3>
        <p>二人の人生が交わる特別な日だからこそ、その日の食事も本当に特別なものを召し上がっていただきたいという思いから、私たちSOWA WEDDINGSが運営するレストランにて特別メニューをご用意させていただきます。
        行ってきたフォト撮影や挙式を振り返っていただきながら、数々の食通を唸らせてきた極上フレンチとともに素敵なひと時をお過ごしください。</p>
        <blockquote>私達が式場選びで重要視したのは景色でした。新郎はとにかく開放的なところがいい、窓がないと、ガーデンウエディングなども考えていたくらいです。式場選びは１０件ほどまわったかもしれません。。披露宴会場が無事に決まったとき、担当のプランナーさんよりローズガーデンでの挙式をすすめてくれました。実際に見学へ行ってみると教会の天井が高くて、６名もの聖歌隊の歌声、また外に出た時に見える景色がとてもきれいでした。ああああああああああああああああああああていたくらいです。式場選びは１０件ほどまわったかもしれません。。披露宴会場が無事に決まったとき、担当のプランナーさんよりローズガーデンでの挙式をすすめてくれました。実際に見学へ行ってみると教会の天井が高くて、６名もの聖歌隊の歌声、また外に出た時に見える景色がとてもきれいでした。</blockquote>
        <p>感想の詳細は、<a href="#">お客様の声</a>にてご覧ください。</p>
          -->
    </div>
    <div class="m80"></div>
<?php endwhile; ?>
<?php get_footer() ?>