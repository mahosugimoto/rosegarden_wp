<?php

add_theme_support('post-thumbnails');
add_action( 'init', 'create_post_type' );
add_theme_support( 'menus' );

function create_post_type() {

register_post_type(
    'church_event',
    array(
      'label' => '教会イベント', 
      'public' => true, 
      'has_archive' => true,
      'show_in_rest' => true,
      'menu_icon' => 'dashicons-testimonial', 
      'menu_position' => 5, 
      'supports' => array( 
        'title',  
        'editor',
        'thumbnail',
        'revisions',
      ),
    )
  );

  register_taxonomy(
    'church_event-cat',
    'church_event',
    array(
      'label' => '教会イベントカテゴリー',
      'hierarchical' => true,
      'public' => true,
      'show_in_rest' => true,
    )
  );



register_post_type(
  'info',
  array(
    'label' => 'お知らせ', 
    'public' => true, 
    'has_archive' => true,
    'show_in_rest' => true,
    'menu_icon' => 'dashicons-testimonial', 
    'menu_position' => 5, 
    'supports' => array( 
      'title',  
      'editor',
      'thumbnail',
      'revisions',
    ),
  )
);

register_taxonomy(
  'info-cat',
  'info',
  array(
    'label' => 'お知らせカテゴリー',
    'hierarchical' => true,
    'public' => true,
    'show_in_rest' => true,
  )
);


// 牧師のブログ
register_post_type(
  'pastor',
  array(
    'label' => '牧師ブログ', 
    'public' => true, 
    'has_archive' => true,
    'show_in_rest' => true,
    'menu_icon' => 'dashicons-testimonial', 
    'menu_position' => 5, 
    'supports' => array( 
      'title',  
      'editor',
      'thumbnail',
      'revisions',
    ),
  )
);


// カスタマーボイス
register_post_type(
  'customer_voice',
  array(
    'label' => 'カスタマーボイス', 
    'public' => true, 
    'has_archive' => true,
    'show_in_rest' => true,
    'menu_icon' => 'dashicons-testimonial', 
    'menu_position' => 5, 
    'supports' => array( 
      'title',  
      'editor',
      'thumbnail',
      'revisions',
    ),
  )
);

register_taxonomy(
  'customer_voice-cat',
  'customer_voice',
  array(
    'label' => 'カスタマーボイスカテゴリー',
    'hierarchical' => true,
    'public' => true,
    'show_in_rest' => true,
  )
);
register_taxonomy(
  'customer_voice-tag',
  'customer_voice',
  array(
    'label' => 'カスタマーボイスタグ',
    'hierarchical' => false,
    'public' => true,
    'show_in_rest' => true,
    'update_count_callback' => '_update_post_term_count',
  )
);



// ギャラリー

  register_post_type(
      'gallery',
      array(
        'label' => 'ギャラリー', 
        'public' => true, 
        'has_archive' => true,
        'show_in_rest' => true,
        'menu_icon' => 'dashicons-testimonial', 
        'menu_position' => 5, 
        'supports' => array( 
          'title',  
          'editor',
          'thumbnail',
          'revisions',
        ),
      )
    );
  
    register_taxonomy(
      'gallery-cat',
      'gallery',
      array(
        'label' => 'ギャラリーカテゴリー',
        'hierarchical' => true,
        'public' => true,
        'show_in_rest' => true,
      )
    );
 
  }


// ビジュアルエディタ用スタイル適用
function my_theme_setup() {
  // add_theme_support() で editor-styles を指定
  add_theme_support( 'editor-styles' );
  
  // スタイルを直接記述する
  add_editor_style( 'assets/css/editor-style.css' ); // パスを適切に指定する
}
add_action( 'after_setup_theme', 'my_theme_setup' );

remove_filter('the_content', 'wpautop');
function my_tiny_mce_before_init( $init_array ) {
  $init_array['valid_elements']          = '*[*]';
  $init_array['extended_valid_elements'] = '*[*]';

  return $init_array;
}
add_filter( 'tiny_mce_before_init' , 'my_tiny_mce_before_init' );
remove_filter('the_content', 'wpautop');// 記事の自動整形を無効にする
remove_filter('the_excerpt', 'wpautop');// 抜粋の自動整形を無効にする

remove_filter('the_content', 'wpautop');
    remove_filter('the_excerpt', 'wpautop');

    function my_format_TinyMCE($in)
    {
        global $allowedposttags;

        $in['valid_elements'] = '*[*]';
        $in['extended_valid_elements'] = '*[*]';
        $in['valid_children'] = '+a[' . implode('|', array_keys($allowedposttags)) . ']';
        $in['indent'] = true;
        $in['wpautop'] = false;
        $in['forced_root_block'] = false;
        return $in;
    }

    add_filter('tiny_mce_before_init', 'my_format_TinyMCE');
    add_action('wp_head', 'fit_head_child');

    function setup_theme() {
        add_theme_support( 'title-tag' );
    }
    register_sidebar(array(
      'name' => 'bizCalendar'
    ));

    function custom_widget_area() {
      register_sidebar( array(
          'name'          => __( 'カスタムウィジェットエリア', 'text_domain' ),
          'id'            => 'custom-widget-area',
          'description'   => __( 'カスタムウィジェットエリアの説明文', 'text_domain' ),
          'before_widget' => '<div id="%1$s" class="widget %2$s">',
          'after_widget'  => '</div>',
          'before_title'  => '<h2 class="widget-title">',
          'after_title'   => '</h2>',
      ) );
  }
  add_action( 'widgets_init', 'custom_widget_area' );

  /**
   * Get top advertisement
   */
  if(!function_exists('topAdvertisements')) {
    function topAdvertisements()
    {
      $advs = SCF::get('top-advertisement');
      if (empty($advs)) {
        return null;
      }

      $result = array_map(function($adv) {
        if (!empty($adv['image'])) {
          $image = wp_get_attachment_image_src($adv['image'], 'full');
          if (!empty($image)) {
            $adv['image'] = $image[0];
          }
        }

        return $adv;
      }, $advs);

      return $result;
    }
  }

  /**
   * Get other banner
   */
  if(!function_exists('otherBanners')) {
    function otherBanners()
    {
      $banners = SCF::get('other-banner');
      if (empty($banners)) {
        return null;
      }

      if (count($banners) == 1) {
        $bn = $banners[0];
        if (empty($bn['title']) && empty($bn['image']) && empty($bn['sub_title']) && empty($bn['external_link'])) {
          return null;
        }
      }

      $result = array_map(function($bn) {
        if (!empty($bn['image'])) {
          $image = wp_get_attachment_image_src($bn['image'], 'full');
          if (!empty($image)) {
            $bn['image'] = $image[0];
          }
        }

        return $bn;
      }, $banners);
      
      return $result;
    }
  }

?>
