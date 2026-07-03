<?php
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$path = __DIR__ . $uri;
$blogPostSlugs = array(
    'mainland-free-zone-or-offshore-uae-structuring-us-founders',
    'why-us-wireless-itad-operators-are-looking-at-the-uae',
    'why-us-wireless-and-itad-operators-are-looking-at-the-uae',
    'uae-business-setup-geopolitics-2026',
    'golden-visa-eligibility-guide',
    'freelance-visa-uae-guide',
    'why-americans-relocating-uae-2026',
);

// --------------------------------------------------
// 1. SEO blog slugs -> real PHP files
// --------------------------------------------------

if ($uri === '/blog/mainland-free-zone-or-offshore-uae-structuring-us-founders') {
    require __DIR__ . '/blog-details.php';
    return true;
}

if ($uri === '/blog/why-us-wireless-itad-operators-are-looking-at-the-uae') {
    require __DIR__ . '/blog-details2.php';
    return true;
}

if ($uri === '/blog/why-us-wireless-and-itad-operators-are-looking-at-the-uae') {
    require __DIR__ . '/blog-details2.php';
    return true;
}

if ($uri === '/blog/uae-business-setup-geopolitics-2026') {
    require __DIR__ . '/blog-details3.php';
    return true;
}

if ($uri === '/blog/golden-visa-eligibility-guide') {
    require __DIR__ . '/blog-details4.php';
    return true;
}

if ($uri === '/blog/freelance-visa-uae-guide') {
    require __DIR__ . '/blog-details5.php';
    return true;
}
if ($uri === '/blog/why-americans-relocating-uae-2026') {
    require __DIR__ . '/blog-details6.php';
    return true;
}

if ($uri === '/blog/') {
    header('Location: /blog', true, 301);
    exit;
}

if (in_array($uri, array('/blog/tag', '/blog/tag/', '/blog/category', '/blog/category/'), true)) {
    header('Location: /blog', true, 301);
    exit;
}

if (preg_match('#^/blog/(tag|category)/([^/]+)/$#', $uri, $matches)) {
    header('Location: /blog/' . $matches[1] . '/' . $matches[2], true, 301);
    exit;
}

if (preg_match('#^/blog/([^/]+)/$#', $uri, $matches) && in_array($matches[1], $blogPostSlugs, true)) {
    header('Location: /blog/' . $matches[1], true, 301);
    exit;
}

$noSlashUri = rtrim($uri, '/');

if ($uri !== '/' && substr($uri, -1) === '/' && file_exists(__DIR__ . $noSlashUri . '.php')) {
    header('Location: ' . $noSlashUri, true, 301);
    exit;
}

if ($uri === '/sitemap.xml') {
    require __DIR__ . '/sitemap.php';
    return true;
}

if (preg_match('#^/blog/category/([^/]+)$#', $uri, $matches)) {
    $_GET['category'] = $matches[1];
    require __DIR__ . '/blog-category.php';
    return true;
}

if (preg_match('#^/blog/tag/([^/]+)$#', $uri, $matches)) {
    $_GET['tag'] = $matches[1];
    require __DIR__ . '/blog-tag.php';
    return true;
}

// --------------------------------------------------
// 2. Old blog URLs -> SEO slugs
// --------------------------------------------------

if ($uri === '/blog-details' || $uri === '/blog-details.php') {
    header('Location: /blog/mainland-free-zone-or-offshore-uae-structuring-us-founders', true, 301);
    exit;
}

if ($uri === '/blog-details2' || $uri === '/blog-details2.php') {
    header('Location: /blog/why-us-wireless-itad-operators-are-looking-at-the-uae', true, 301);
    exit;
}

if ($uri === '/blog-details3' || $uri === '/blog-details3.php') {
    header('Location: /blog/uae-business-setup-geopolitics-2026', true, 301);
    exit;
}

if ($uri === '/blog-details4' || $uri === '/blog-details4.php') {
    header('Location: /blog/golden-visa-eligibility-guide', true, 301);
    exit;
}

if ($uri === '/blog-details5' || $uri === '/blog-details5.php') {
    header('Location: /blog/freelance-visa-uae-guide', true, 301);
    exit;
}

if ($uri === '/blog-details6' || $uri === '/blog-details6.php') {
    header('Location: /blog/why-americans-relocating-uae-2026', true, 301);
    exit;
}

// --------------------------------------------------
// 3. Serve real static files directly
// assets/css/main.css, assets/js/..., images, etc.
// --------------------------------------------------

if ($uri !== '/' && file_exists($path) && !is_dir($path)) {
    return false;
}

// --------------------------------------------------
// 4. Homepage
// --------------------------------------------------

if ($uri === '/') {
    require __DIR__ . '/index.php';
    return true;
}

// --------------------------------------------------
// 5. Generic clean URL support
// Example:
// /about -> about.php
// /uae-business-formation -> uae-business-formation.php
// /government-relations-pro-services -> government-relations-pro-services.php
// --------------------------------------------------

$cleanPhpPath = __DIR__ . $uri . '.php';

if (file_exists($cleanPhpPath)) {
    require $cleanPhpPath;
    return true;
}

// --------------------------------------------------
// 6. Custom 404 page
// --------------------------------------------------

http_response_code(404);

if (file_exists(__DIR__ . '/error.php')) {
    require __DIR__ . '/error.php';
    return true;
}

echo '404 - Page not found';
return true;
