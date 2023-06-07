<?php
/*
Template Name: インフォ記事
*/
get_header();
?><?php include('header_icon.php'); ?>
<?php include('cta.php'); ?>

<?php require_once('breadcrumb.php');?>

<!-- お知らせコンテンツ -->
<div class="information">
    <!-- information -->
    <div class="info">
        <div class="info__list">
            <div class="lace-dcr_top">
                <div class="lace-dcr_bottom__img">
                    <img src="/wp-content/themes/rosegarden_file/assets/img/dcr/lace.png" alt="">
                </div>
            </div>

            <div class="liststyle_info2">
            <?php
                $args = array(
                    'posts_per_page' => 10,
                    'post_status' => 'publish',
                    'post_type' => 'information',
                );
                $myposts = get_posts($args);
                foreach ($myposts as $post) : setup_postdata($post);
                    $post_categories = wp_get_post_terms($post->ID, 'category', array('fields' => 'slugs'));
                ?>
                   <a href="<?= the_permalink(); ?>">
                    <div class="liststyle_info2__block">
                        <?php 
                        if(has_post_thumbnail()): 
                            $thumbnail = get_the_post_thumbnail_url($post->ID, 'full');
                        ?>
                        <div class="liststyle_info2__block__img" style="background-image:url(<?php echo $thumbnail;?>)">
                        </div>
                        <?php endif;?>
                        
                        <div class="liststyle_info2__block__text">
                            <div class="liststyle_info2__ctg">
                            <p class=""><?= get_the_date() ?></p>
                            <?php
                                    $taxonomy_name = "information-cat";
                                    $this_terms = get_the_terms($post->ID, $taxonomy_name);
                                    if ($this_terms && !is_wp_error($this_terms)) {
                                        foreach ($this_terms as $key => $term) {
                                            echo '<p class="ctg_style02">' . $term->name . '</p>';
                                        }
                                    }
                                    ?>
                            </div>
                            <h3><?= get_the_title(); ?></h3>
                        </div>
                    </div>
                </a>
                <?php
                endforeach;
                wp_reset_postdata();
                ?>
            </div>
                    <!-- ページネーション -->
        <div class="btn_flex2">
            <button class="page-btn_pre">
                <img src="/wp-content/themes/rosegarden_file/assets/img/dcr/arrow_prev.png" alt="">
                <p>前のページ</p>
            </button>
            <button class="page-btn_next">
                <p>次のページ</p>
                <img src="/wp-content/themes/rosegarden_file/assets/img/dcr/arrow_next.png" alt="">
            </button>
        </div>
        <nav class="pagination-container">
            <ul class="pagination">
                <li class="page-item prev"><a href="#" class="page-link">
                        <img src="<?= get_template_directory_uri(); ?>/assets/img/dcr/arrow_prev.png" alt="">
                    </a></li>
                <li class="page-item number"><a href="#" class="page-link">1</a></li>
                <li class="page-item number navi-active"><a href="#" class="page-link">2</a></li>
                <li class="page-item number"><a href="#" class="page-link">3</a></li>
                <li class="page-item number"><a href="#" class="page-link">4</a></li>
                <li class="page-item number"><a href="#" class="page-link">5</a></li>
                <li class="page-item number"><a href="#" class="page-link">6</a></li>
                <li class="page-item number"><a href="#" class="page-link">7</a></li>
                <li class="page-item number"><a href="#" class="page-link">8</a></li>
                <li class="page-item number"><a href="#" class="page-link">9</a></li>
                <li class="page-item number"><a href="#" class="page-link">10</a></li>
                <li class="page-item next" aria-disabled="true"><a href="#" class="page-link">
                        <img src="<?= get_template_directory_uri(); ?>/assets/img/dcr/arrow_next.png" alt=""></a></li>
            </ul>
        </nav>
            <div class="lace-dcr_bottom">
                <div class="lace-dcr_bottom__img">
                    <img src="/wp-content/themes/rosegarden_file/assets/img/dcr/lace02.png" alt="">
                </div>
            </div>
        </div>
    </div>

    s

    <div class="m80"></div>

    <?php get_footer(); ?>