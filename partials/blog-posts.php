<?php
if (!function_exists('virtuo_get_blog_posts')) {
    function virtuo_get_blog_posts()
    {
        return require __DIR__ . '/blog-data.php';
    }
}
