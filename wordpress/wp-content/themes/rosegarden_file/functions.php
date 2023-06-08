<?php

add_theme_support('post-thumbnails');
add_action('init', 'create_post_type');
add_theme_support('menus');

function create_post_type()
{

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
            'show_admin_column' => true
        )
    );



    register_post_type(
        'information',
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
        'information-cat',
        'information',
        array(
            'label' => 'お知らせカテゴリー',
            'hierarchical' => true,
            'public' => true,
            'show_in_rest' => true,
            'show_admin_column' => true
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
            'show_admin_column' => true
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
            'show_admin_column' => true
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
            'show_admin_column' => true
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
    'label' => 'バナー', //投稿タイプの名前
    'labels' => array(
        'singular_name' => 'バナー', //投稿タイプの名前
        'menu_name' => 'バナー', //メニュー（画面の左）に表示するラベル
        'add_new_item' => '新規投稿を追加', //新規作成ページの左上に表示されるタイトル
        'add_new' => '新規追加', //メニュー（画面の左）の「新規」の位置に表示するラベル
        'new_item' => '新規投稿', //一覧ページの右上にある新規作成ボタンのラベル
        'edit_item' => '投稿を編集', //編集ページの左上にあるタイトル
        'view_item' => '投稿を表示', //編集ページの「○○を表示」ボタンのラベル
        'not_found' => '投稿は見つかりませんでした', //カスタム投稿を追加していない状態で、カスタム投稿一覧ページを開いたときに表示されるメッセージ
        'not_found_in_trash' => 'ゴミ箱に投稿はありません。', //カスタム投稿をゴミ箱に入れていない状態で、カスタム投稿のゴミ箱ページを開いたときに表示されるメッセージ
        'search_items' => '投稿を検索', //一覧ページの検索ボタンのラベル
    ),

    'public' => true, //ユーザーが管理画面で入力するか設定
    'publicly_queryable' => true, //カスタム投稿タイプの機能でページを生成するかどうかを指定
    'show_ui' => true, //管理画面にこのカスタム投稿タイプのページを表示するか設定
    'show_in_menu' => true, //管理画面にメニュー出すか設定
    'query_var' => true,
    'has_archive' => true, //「true」に指定すると投稿した記事の一覧ページ（投稿タイプのトップページ）を作成することができる
    'hierarchical' => false, //カスタム投稿に固定ページのような親子関係（階層）を持たせるか設定
    'menu_position' => 5, //カスタム投稿のメニューを追加する位置を整数で指定
    'rewrite' => true, //リライト設定
);
register_post_type("banner", $args);


// ビジュアルエディタ用スタイル適用
function my_theme_setup()
{
    // add_theme_support() で editor-styles を指定
    add_theme_support('editor-styles');

    // スタイルを直接記述する
    add_editor_style('assets/css/editor-style.css'); // パスを適切に指定する
}
add_action('after_setup_theme', 'my_theme_setup');

remove_filter('the_content', 'wpautop');
function my_tiny_mce_before_init($init_array)
{
    $init_array['valid_elements']          = '*[*]';
    $init_array['extended_valid_elements'] = '*[*]';

    return $init_array;
}
add_filter('tiny_mce_before_init', 'my_tiny_mce_before_init');
remove_filter('the_content', 'wpautop'); // 記事の自動整形を無効にする
remove_filter('the_excerpt', 'wpautop'); // 抜粋の自動整形を無効にする

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
// add_action('wp_head', 'fit_head_child');

function setup_theme()
{
    add_theme_support('title-tag');
}
// register_sidebar(array(
//   'name' => 'bizCalendar'
// ));

function custom_widget_area()
{
    register_sidebar(array(
        'name'          => __('カスタムウィジェットエリア', 'text_domain'),
        'id'            => 'custom-widget-area',
        'description'   => __('カスタムウィジェットエリアの説明文', 'text_domain'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
}
add_action('widgets_init', 'custom_widget_area');

/**
 * Get top advertisement
 */
if (!function_exists('topAdvertisements')) {
    function topAdvertisements()
    {
        $advs = SCF::get('top-advertisement');
        if (empty($advs)) {
            return null;
        }

        $result = array_map(function ($adv) {
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
if (!function_exists('otherBanners')) {
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

        $result = array_map(function ($bn) {
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

/**
 * Custom breadcrumbs
 */
if (!function_exists('custom_breadcrumbs')) {
    function custom_breadcrumbs($device = 'pc')
    {
        $largeClass = ($device == 'pc') ? 'breadcrumb' : 'breadcrumb_sp';
        $subClass = ($device == 'pc') ? 'breadcrumb__contents' : 'breadcrumb_sp__contents';
        $delimiter = '<p>></p>'; // Customize the delimiter between breadcrumbs
        $home = 'トップ'; // Customize the text for the homepage link
        $before = '<p>'; // Customize the HTML before the current breadcrumb
        $after = '</p>'; // Customize the HTML after the current breadcrumb

        if (!is_home() && !is_front_page() || is_paged()) {
            echo '<div class="'. $largeClass .'"><div class="'. $subClass .'">';

            global $post;
            $homeLink = get_home_url();
            echo $before . '<a href="' . $homeLink . '"><span>' . $home . '</span></a> ' . $after . $delimiter . ' ';

            if (is_category()) {
                $category = get_category(get_query_var('cat'), false);
                if ($category->parent != 0) {
                    $parents = get_category_parents($category->parent, true, ' ' . $delimiter . ' ');
                    echo $parents;
                }
                echo $before . single_cat_title('', false) . $after;
            } elseif (is_tag()) {
                echo $before . single_tag_title('', false) . $after;
            } elseif (is_author()) {
                global $author;
                $userdata = get_userdata($author);
                echo $before . 'Articles posted by ' . $userdata->display_name . $after;
            } elseif (is_search()) {
                echo $before . 'Search results for "' . get_search_query() . '"' . $after;
            } elseif (is_day()) {
                echo $before . '<a href="' . get_year_link(get_the_time('Y')) . '"><span>' . get_the_time('Y') . '</span></a> ' . $after . $delimiter . ' ';
                echo $before . '<a href="' . get_month_link(get_the_time('Y'), get_the_time('m')) . '"><span>' . get_the_time('F') . '</span></a> ' . $after . $delimiter . ' ';
                echo $before . get_the_time('d') . $after;
            } elseif (is_month()) {
                echo $before . '<a href="' . get_year_link(get_the_time('Y')) . '"><span>' . get_the_time('Y') . '</span></a> ' . $after . $delimiter . ' ';
                echo $before . get_the_time('F') . $after;
            } elseif (is_year()) {
                echo $before . get_the_time('Y') . $after;
            } elseif (is_single() && !is_attachment()) {
                if (get_post_type() != 'post') {
                    $post_type = get_post_type_object(get_post_type());
                    $slug = $post_type->rewrite;
                    echo $before . '<a href="' . $homeLink . '/' . $slug['slug'] . '/"><span>' . $post_type->labels->singular_name . '</span></a> ' . $after . $delimiter . ' ';
                    echo $before . get_the_title() . $after;
                } else {
                    $cat = get_the_category();
                    $cat = $cat[0];
                    $cats = get_category_parents($cat, true, ' ' . $delimiter . ' ');
                    echo $cats;
                    echo $before . get_the_title() . $after;
                }
            } elseif (!is_single() && !is_page() && get_post_type() != 'post' && !is_404()) {
                $post_type = get_post_type_object(get_post_type());
                echo $before . $post_type->labels->singular_name . $after;
            } elseif (is_attachment()) {
                $parent = get_post($post->post_parent);
                $cat = get_the_category($parent->ID);
                $cat = $cat[0];
                echo get_category_parents($cat, true, ' ' . $delimiter . ' ');
                echo $before . '<a href="' . get_permalink($parent) . '"><span>' . $parent->post_title . '</span></a> ' . $after . $delimiter . ' ';
                echo $before . get_the_title() . $after;
            } elseif (is_page() && !$post->post_parent) {
                echo $before . get_the_title() . $after;
            } elseif (is_page() && $post->post_parent) {
                $parent_id = $post->post_parent;
                $ignoreIds = [8323];
                if (!in_array($parent_id, $ignoreIds)) {
                    $breadcrumbs = array();
                    while ($parent_id) {
                        $page = get_post($parent_id);
                        $breadcrumbs[] = $before . '<a href="' . get_permalink($page->ID) . '"><span>' . get_the_title($page->ID) . '</span></a>' . $after;
                        $parent_id = $page->post_parent;
                    }
                    $breadcrumbs = array_reverse($breadcrumbs);
                    foreach ($breadcrumbs as $crumb) {
                        echo $crumb . ' ' . $delimiter . ' ';
                    }
                }
                
                echo $before . get_the_title() . $after;
            } elseif (is_search()) {
                echo $before . 'Search results for "' . get_search_query() . '"' . $after;
            } elseif (is_tag()) {
                echo $before . 'Posts tagged "' . single_tag_title('', false) . '"' . $after;
            } elseif (is_author()) {
                global $author;
                $userdata = get_userdata($author);
                echo $before . 'Articles posted by ' . $userdata->display_name . $after;
            } elseif (is_404()) {
                echo $before . 'Error 404' . $after;
            }

            echo '</div></div>';
        }
    }
}

/**
 * Custom pagination
 */
if (!function_exists('custom_pagination')) {
    function custom_pagination($args = '')
    {
        global $wp_query, $wp_rewrite;

        // Setting up default values based on the current URL.
        $pagenum_link = html_entity_decode(get_pagenum_link());
        $url_parts    = explode('?', $pagenum_link);

        // Get max pages and current page out of the current query, if available.
        if (isset($args['total'])) {
            $total = $args['total'] ?? 0;
        } else {
            $total   = isset($wp_query->max_num_pages) ? $wp_query->max_num_pages : 1;
        }
        
        // Append the format placeholder to the base URL.
        $pagenum_link = trailingslashit($url_parts[0]) . '%_%';

        // URL base depends on permalink settings.
        $format  = $wp_rewrite->using_index_permalinks() && !strpos($pagenum_link, 'index.php') ? 'index.php/' : '';

        if (is_tax()) {
            $format .= $wp_rewrite->using_permalinks() ? user_trailingslashit('?'. $wp_rewrite->pagination_base . '=%#%', 'paged') : '?paged=%#%';
            $current = get_query_var('page') ? (int) get_query_var('page') : 1;
        } else {
            $format .= $wp_rewrite->using_permalinks() ? user_trailingslashit($wp_rewrite->pagination_base . '/%#%', 'paged') : '?paged=%#%';
            $current = get_query_var('paged') ? (int) get_query_var('paged') : 1;
        }

        $defaults = array(
            'base'               => $pagenum_link, // http://example.com/all_posts.php%_% : %_% is replaced by format (below).
            'format'             => $format, // ?page=%#% : %#% is replaced by the page number.
            'total'              => $total,
            'current'            => $current,
            'aria_current'       => 'page',
            'show_all'           => false,
            'prev_next'          => true,
            'prev_text'          => __('<button class="page-btn_pre"><img src="' . get_template_directory_uri() . 'assets/img/dcr/arrow_prev.png" alt="prev"><p>前のページ</p></button>'),
            'next_text'          => __('<button class="page-btn_next"><p>次のページ</p><img src="' . get_template_directory_uri() . 'assets/img/dcr/arrow_next.png" alt="next"></button>'),
            'end_size'           => 1,
            'mid_size'           => 5,
            'type'               => 'plain',
            'add_args'           => array(), // Array of query args to add.
            'add_fragment'       => '',
            'before_page_number' => '',
            'after_page_number'  => '',
        );

        $args = wp_parse_args($args, $defaults);
        
        if (!is_array($args['add_args'])) {
            $args['add_args'] = array();
        }

        // Merge additional query vars found in the original URL into 'add_args' array.
        if (isset($url_parts[1])) {
            // Find the format argument.
            $format       = explode('?', str_replace('%_%', $args['format'], $args['base']));
            $format_query = isset($format[1]) ? $format[1] : '';
            wp_parse_str($format_query, $format_args);

            // Find the query args of the requested URL.
            wp_parse_str($url_parts[1], $url_query_args);

            // Remove the format argument from the array of query arguments, to avoid overwriting custom format.
            foreach ($format_args as $format_arg => $format_arg_value) {
                unset($url_query_args[$format_arg]);
            }

            $args['add_args'] = array_merge($args['add_args'], urlencode_deep($url_query_args));
        }

        // Who knows what else people pass in $args.
        $total = (int) $args['total'];
        if ($total < 2) {
            return;
        }

        $current  = (int) $args['current'];
        $end_size = (int) $args['end_size']; // Out of bounds? Make it the default.
        if ($end_size < 1) {
            $end_size = 1;
        }
        $mid_size = (int) $args['mid_size'];
        if ($mid_size < 0) {
            $mid_size = 2;
        }

        $add_args   = $args['add_args'];
        $r          = '';
        $page_links = array();
        $dots       = false;

        // Show post number per page
        $post_per_page = isset($args['posts_per_page']) ? $args['posts_per_page'] : get_option('posts_per_page', 0);
        $total_posts = (isset($args['found_posts'])) ? $args['found_posts'] : $wp_query->found_posts;
        $start_offset = ($current - 1) * $post_per_page;
        $end_offset = $start_offset + $post_per_page;
        $end_offset = ($end_offset > $total_posts) ? $total_posts : $end_offset;

        if ($args['prev_next'] && $current && 1 < $current) :
            $link = str_replace('%_%', 2 == $current ? '' : $args['format'], $args['base']);
            $link = str_replace('%#%', $current - 1, $link);
            if ($add_args) {
                $link = add_query_arg($add_args, $link);
            }
            $link .= $args['add_fragment'];

            $prev_link = sprintf(
                '<a href="%s"><button class="page-btn_pre"><img src="' . get_template_directory_uri() . '/assets/img/dcr/arrow_prev.png" alt="prev"><p>前のページ</p></button></a>',
                /**
                 * Filters the paginated links for the given archive pages.
                 *
                 * @since 3.0.0
                 *
                 * @param string $link The paginated link URL.
                 */
                esc_url(apply_filters('paginate_links', $link)),
                $args['prev_text']
            );
        endif;

        for ($n = 1; $n <= $total; $n++) :
            if ($n == $current) :
                $page_links[] = sprintf(
                    '<li class="page-item number navi-active"><a href="javascript:void(0)" class="page-link">%s</a></li>',
                    $args['before_page_number'] . number_format_i18n($n) . $args['after_page_number']
                );

                $dots = true;
            else :
                if ($args['show_all'] || ($n <= $end_size || ($current && $n >= $current - $mid_size && $n <= $current + $mid_size) || $n > $total - $end_size)) :
                    $link = str_replace('%_%', 1 == $n ? '' : $args['format'], $args['base']);
                    $link = str_replace('%#%', $n, $link);
                    if ($add_args) {
                        $link = add_query_arg($add_args, $link);
                    }
                    $link .= $args['add_fragment'];

                    $page_links[] = sprintf(
                        '<li class="page-item number"><a href="%s">%s</a></li>',
                        /** This filter is documented in wp-includes/general-template.php */
                        esc_url(apply_filters('paginate_links', $link)),
                        $args['before_page_number'] . number_format_i18n($n) . $args['after_page_number']
                    );

                    $dots = true;
                elseif ($dots && !$args['show_all']) :
                    $page_links[] = '<li class="page-item number">' . __('&hellip;') . '</li>';

                    $dots = false;
                endif;
            endif;
        endfor;

        if ($args['prev_next'] && $current && $current < $total) :
            $link = str_replace('%_%', $args['format'], $args['base']);
            $link = str_replace('%#%', $current + 1, $link);
            if ($add_args) {
                $link = add_query_arg($add_args, $link);
            }
            $link .= $args['add_fragment'];

            $next_link = sprintf(
                '<a href="%s"><button class="page-btn_next"><p>次のページ</p><img src="' . get_template_directory_uri() . '/assets/img/dcr/arrow_next.png" alt="next"></button></a>',
                /** This filter is documented in wp-includes/general-template.php */
                esc_url(apply_filters('paginate_links', $link)),
                $args['next_text']
            );
        endif;

        switch ($args['type']) {
            case 'array':
                return $page_links;

            case 'list':
                $r .= "<div class='pager_block'>\n\t<ul class='page-numbers'>\n\t<li>";
                $r .= implode("</li>\n\t<li>", $page_links);
                $r .= "</li>\n</ul>\n</div>\n";
                break;

            default:
                $r = '<div class="btn_flex2">';
                $r .= $prev_link ?? '';
                $r .= $next_link ?? '';
                $r .= '</div>';
                $r .= '<nav class="pagination-container"><ul class="pagination">';
                $r .= implode("\n", $page_links);
                $r .= '</ul></nav>';
                
                $r .= '</div>';
                break;
        }

        /**
         * Filters the HTML output of paginated links for archives.
         *
         * @since 5.7.0
         *
         * @param string $r    HTML output.
         * @param array  $args An array of arguments. See paginate_links()
         *                     for information on accepted arguments.
         */
        $r = apply_filters('paginate_links_output', $r, $args);

        return $r;
    }
}
