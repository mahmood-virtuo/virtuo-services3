<?php
if (!function_exists('virtuo_get_blog_posts')) {
    function virtuo_get_blog_posts()
    {
        $blogPosts = require __DIR__ . '/blog-data.php';

        usort($blogPosts, function ($a, $b) {
            $aTimestamp = strtotime($a['date_sort'] ?? $a['date'] ?? '');
            $bTimestamp = strtotime($b['date_sort'] ?? $b['date'] ?? '');

            return $bTimestamp <=> $aTimestamp;
        });

        return $blogPosts;
    }
}

if (!function_exists('virtuo_get_blog_post_by_file')) {
    function virtuo_get_blog_post_by_file($file)
    {
        foreach (virtuo_get_blog_posts() as $post) {
            if (($post['file'] ?? '') === $file) {
                return $post;
            }
        }

        return null;
    }
}

if (!function_exists('virtuo_get_blog_post_by_url')) {
    function virtuo_get_blog_post_by_url($url)
    {
        $urlPath = parse_url((string) $url, PHP_URL_PATH);

        foreach (virtuo_get_blog_posts() as $post) {
            if (($post['url'] ?? '') === $urlPath) {
                return $post;
            }
        }

        return null;
    }
}

if (!function_exists('virtuo_get_current_blog_post')) {
    function virtuo_get_current_blog_post($seoPage = null)
    {
        $currentPost = virtuo_get_blog_post_by_file(basename($_SERVER['SCRIPT_NAME'] ?? ''));

        if (!$currentPost && is_array($seoPage) && isset($seoPage['path'])) {
            $currentPost = virtuo_get_blog_post_by_url($seoPage['path']);
        }

        if (!$currentPost && isset($_SERVER['REQUEST_URI'])) {
            $currentPost = virtuo_get_blog_post_by_url($_SERVER['REQUEST_URI']);
        }

        return $currentPost;
    }
}

if (!function_exists('virtuo_get_popular_blog_tags')) {
    function virtuo_get_popular_blog_tags($limit = 10)
    {
        $tagCounts = array();

        foreach (virtuo_get_blog_posts() as $post) {
            foreach (($post['tags'] ?? array()) as $tag) {
                $tag = trim((string) $tag);

                if ($tag === '') {
                    continue;
                }

                if (!isset($tagCounts[$tag])) {
                    $tagCounts[$tag] = 0;
                }

                $tagCounts[$tag]++;
            }
        }

        uksort($tagCounts, function ($a, $b) use ($tagCounts) {
            $countComparison = $tagCounts[$b] <=> $tagCounts[$a];

            if ($countComparison !== 0) {
                return $countComparison;
            }

            return strcasecmp($a, $b);
        });

        return array_slice(array_keys($tagCounts), 0, $limit);
    }
}
