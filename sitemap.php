<?php
require_once __DIR__ . '/partials/blog-taxonomy.php';
require_once __DIR__ . '/partials/services/digital-marketing/registry.php';

header('Content-Type: application/xml; charset=UTF-8');

if (!function_exists('virtuo_sitemap_url')) {
    function virtuo_sitemap_url($path)
    {
        if (preg_match('/^https?:\/\//', (string) $path)) {
            return $path;
        }

        $path = '/' . ltrim((string) $path, '/');

        return $path === '/' ? 'https://virtuo.ae/' : 'https://virtuo.ae' . $path;
    }
}

if (!function_exists('virtuo_sitemap_date')) {
    function virtuo_sitemap_date($date)
    {
        $timestamp = strtotime((string) $date);

        return $timestamp ? gmdate('Y-m-d', $timestamp) : '';
    }
}

if (!function_exists('virtuo_sitemap_add_url')) {
    function virtuo_sitemap_add_url(&$urls, $path, $lastmod = '')
    {
        $loc = virtuo_sitemap_url($path);

        if (isset($urls[$loc])) {
            return;
        }

        $urls[$loc] = array(
            'loc' => $loc,
            'lastmod' => virtuo_sitemap_date($lastmod),
        );
    }
}

$urls = array();

$staticPages = array(
    '/',
    '/about',
    '/contact',
    '/blog',
    '/privacy-policy',
    '/terms-conditions',
    '/uae-business-formation-structuring-and-compliance',
    '/government-relations-and-pro-services',
    '/immigration-and-residency-solutions',
    '/digital-marketing-and-brand-development',
    '/ai-automation-and-technology-solutions',
);

foreach ($staticPages as $path) {
    virtuo_sitemap_add_url($urls, $path);
}

foreach (virtuo_digital_service_registry() as $service) {
    if ($service['slug'] === virtuo_digital_service_default_slug()) {
        continue;
    }

    virtuo_sitemap_add_url($urls, $service['canonicalPath']);
}

$blogPosts = virtuo_get_blog_posts();

foreach ($blogPosts as $post) {
    virtuo_sitemap_add_url($urls, $post['url'], $post['date_sort'] ?? $post['date'] ?? '');
}

foreach (virtuo_blog_get_sorted_categories(false, $blogPosts) as $category) {
    $categoryPosts = virtuo_blog_filter_posts_by_category($category['slug'], $blogPosts);
    $lastmod = $categoryPosts[0]['date_sort'] ?? $categoryPosts[0]['date'] ?? '';

    virtuo_sitemap_add_url($urls, virtuo_blog_get_category_url($category['slug']), $lastmod);
}

$tagCounts = virtuo_blog_count_posts_by_tag($blogPosts);
$tagSlugs = array_keys($tagCounts);

usort($tagSlugs, function ($a, $b) {
    return strcasecmp(virtuo_blog_get_tag_label($a), virtuo_blog_get_tag_label($b));
});

foreach ($tagSlugs as $tagSlug) {
    $tagPosts = virtuo_blog_filter_posts_by_tag($tagSlug, $blogPosts);
    $lastmod = $tagPosts[0]['date_sort'] ?? $tagPosts[0]['date'] ?? '';

    virtuo_sitemap_add_url($urls, virtuo_blog_get_tag_url($tagSlug), $lastmod);
}

echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
<?php foreach ($urls as $url) : ?>
    <url>
        <loc><?php echo htmlspecialchars($url['loc'], ENT_XML1, 'UTF-8'); ?></loc>
        <?php if ($url['lastmod'] !== '') : ?>
        <lastmod><?php echo htmlspecialchars($url['lastmod'], ENT_XML1, 'UTF-8'); ?></lastmod>
        <?php endif; ?>
    </url>
<?php endforeach; ?>
</urlset>
