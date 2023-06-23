<div class="sidebar">
    <div id="pastor-widget-area" class="pastor-widget-area">
        <?php if ( is_active_sidebar( 'pastor-widget-area' ) ) : ?>
        <?php dynamic_sidebar( 'pastor-widget-area' ); ?>
        <?php endif; ?>

        <div class="widget widget_archive">
            <h2 class="widget-title">ARCHIVES
            <span class="sub-widget-title">過去記事一覧</span></h2>
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
        background-color: #EBE8E3;
        padding: 4px;
    }
    .sidebar .wp-calendar td {
        padding:4px;
        text-align: center;
    }
</style>
