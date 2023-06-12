<div class="sidebar">
    <div id="pastor-widget-area" class="pastor-widget-area">
        <?php if ( is_active_sidebar( 'pastor-widget-area' ) ) : ?>
        <?php dynamic_sidebar( 'pastor-widget-area' ); ?>
        <?php endif; ?>

        <div class="widget widget_archive">
            <h2 class="widget-title">Archives</h2>
            <h4 class="sub-widget-title">過去記事一覧</h4>
            <?php
            $args = array(
                'post_type' => 'pastor', // Replace with your custom post type slug
                'type' => 'monthly', // Display monthly archives
                'format' => 'custom', // Use custom format for output
                'before' => '<li>', // HTML markup before each archive link
                'after' => '</li>', // HTML markup after each archive link
                'show_post_count' => true, // Display the post count for each archive
            );
            
            echo '<ul>';
            wp_get_archives($args);
            echo '</ul>';
            ?>
        </div>
    </div>
</div>
<style type="text/css">
    .sidebar .wp-calendar a {
        background-color: #99762F;
        color: #fff;
        padding: 2px;
    }

    .sidebar .wp-calendar td {
        padding: 2px;
        text-align: center;
    }
</style>
