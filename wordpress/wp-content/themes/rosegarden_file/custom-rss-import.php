<?php

/*
Template Name: Custom import RSS
*/

// no time limit
set_time_limit(0);

if ( !current_user_can('administrator') ) {
    echo 'Permission denied';
    exit;
}

// Delete old post
$args = array(
    'post_type' => PASTOR_POST_TYPE_NAME,
    'posts_per_page' => -1, // Retrieve all posts
);
$posts = get_posts($args);

// Loop through the posts and delete each one
foreach ($posts as $post) {
    wp_delete_post($post->ID, true);
}

/**
 * Total: 32 pages
 * https://www.rosegarden-ch.jp/church/pastor/blog/feed/?paged=32
 *  */ 

// RSS feed URL
$rssUrl = 'https://www.rosegarden-ch.jp/church/pastor/blog/feed/';
$oldBaseDir = 'https://www.rosegarden-ch.jp/wp/wp-content/uploads/';
$totalPages = 32;

// Destination folder to save downloaded images
$baseDir = rtrim(ABSPATH, '/') . '/wp-content/uploads/';
$index = 1;

for ($i = 1; $i <= $totalPages; $i++) {
    $url = $rssUrl . '?paged=' . $i;
    // Fetch the RSS feed
    $rssContent = file_get_contents($url);

    // Parse the RSS feed
    $rss = simplexml_load_string($rssContent);

    echo '<h1>==== PAGE: ' . $i . ' ====</h1><br/>';
    // Iterate through each item in the RSS feed
    foreach ($rss->channel->item as $item) {
        // Get the post title
        $postTitle = $item->title->__toString();
        
        // Extract the image URL from the content tag (adjust according to the feed structure)
        if ($item->children('content', true)->encoded) {
            $encodedContent = $item->children('content', true)->encoded;
            $postContent = html_entity_decode($encodedContent);

            // Regular expression pattern to match image tags
            $pattern = '/<img[^>]+src=[\'"]([^\'"]+)[\'"][^>]*>/i';

            // Perform the regular expression match
            preg_match_all($pattern, $postContent, $matches);

            // Extract the URLs from the matches
            $imageUrls = $matches[1];

            if (!empty($imageUrls)) {
                foreach ($imageUrls as $imageUrl) {
                    // Download the image if URL is found
                    if (strpos($imageUrl, 's.w.org') === false) {
                        // echo "  + Image URL: $imageUrl<br>";
                        // Extract the image file information
                        $imageInfo = pathinfo($imageUrl);
                        if (empty($imageInfo['basename'])) {
                            continue;
                        }

                        $dirName = rtrim(str_replace($oldBaseDir, '', $imageInfo['dirname']), '/');
                        $imageFileName = $imageInfo['basename'];
                        $dirPath = $baseDir . $dirName;
                        // echo '  + Directory path: ' . $dirPath . '<br/>';
                        if (!file_exists($dirPath)) {
                            if (mkdir($dirPath, 0777, true)) {
                                echo "  + The directory was created successfully.";
                            } else {
                                echo "  + Failed to create the directory.";
                            }
                        }

                        // Set the destination path to save the image
                        $destinationPath = $dirPath . '/' . $imageFileName;

                        // Download the image
                        file_put_contents($destinationPath, file_get_contents($imageUrl));

                        // // Replace the image URL in the post content
                        $newImageUrl = home_url() . '/wp-content/uploads/' . $dirName . '/' . $imageFileName;
                        // echo '  + New image URL: ' . $newImageUrl . '<br/>';
                        $postContent = str_replace($imageUrl, $newImageUrl, $postContent);
                    }
                }
            }

            // Create a new post
            $newPost = array(
                'post_title' => $item->title,
                'post_excerpt' => $item->description ?? '',
                'post_content' => $postContent,
                'post_type' => PASTOR_POST_TYPE_NAME,
                'post_date' => date('Y-m-d H:i:s', strtotime($item->pubDate->__toString())),
                'post_status' => 'publish'
            );
            // echo '<pre/>';
            // print_r($newPost);
            $postID = wp_insert_post($newPost, true);
            if (is_int($postID)) {
                echo $index . '/ [OK] ' . $postTitle . '. New ID: '. $postID .'<br/>';
            } else {
                echo $index . '/ [Failed] ' . $postTitle . '<br/>';
                var_dump($postID);
            }
            $index++;
        }
    }
}
?>
