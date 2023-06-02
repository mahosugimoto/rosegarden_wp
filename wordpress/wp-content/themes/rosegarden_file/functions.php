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


  // ギャラリー

  register_post_type(
    'top_banner',
    array(
      'label' => 'トップバナー', 
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




$args = array(
	'label' => 'バナー',//投稿タイプの名前
	'labels' => array(
		'singular_name' => 'バナー',//投稿タイプの名前
		'menu_name' => 'バナー',//メニュー（画面の左）に表示するラベル
		'add_new_item' => '新規投稿を追加',//新規作成ページの左上に表示されるタイトル
		'add_new' => '新規追加',//メニュー（画面の左）の「新規」の位置に表示するラベル
		'new_item' => '新規投稿',//一覧ページの右上にある新規作成ボタンのラベル
		'edit_item'=>'投稿を編集',//編集ページの左上にあるタイトル
		'view_item' => '投稿を表示',//編集ページの「○○を表示」ボタンのラベル
		'not_found' => '投稿は見つかりませんでした',//カスタム投稿を追加していない状態で、カスタム投稿一覧ページを開いたときに表示されるメッセージ
		'not_found_in_trash' => 'ゴミ箱に投稿はありません。',//カスタム投稿をゴミ箱に入れていない状態で、カスタム投稿のゴミ箱ページを開いたときに表示されるメッセージ
		'search_items' => '投稿を検索',//一覧ページの検索ボタンのラベル
	),

	'public' => true,//ユーザーが管理画面で入力するか設定
	'publicly_queryable' => true,//カスタム投稿タイプの機能でページを生成するかどうかを指定
	'show_ui' => true,//管理画面にこのカスタム投稿タイプのページを表示するか設定
	'show_in_menu' => true,//管理画面にメニュー出すか設定
	'query_var' => true,
	'has_archive' => true,//「true」に指定すると投稿した記事の一覧ページ（投稿タイプのトップページ）を作成することができる
	'hierarchical' => false,//カスタム投稿に固定ページのような親子関係（階層）を持たせるか設定
	'menu_position' => 5,//カスタム投稿のメニューを追加する位置を整数で指定
	'rewrite' => true,//リライト設定
);
register_post_type("banner",$args);


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

?>
