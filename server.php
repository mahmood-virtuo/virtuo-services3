<?php
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$path = __DIR__ . $uri;
$blogPostSlugs = array(
    'mainland-free-zone-or-offshore-the-uae-structuring-decision-serious-us-founders-cannot-afford-to-get-wrong',
    'why-us-wireless-and-itad-operators-are-looking-at-the-uae',
    'beyond-company-formation-why-the-uae-is-becoming-a-strategic-business-base-in-2026',
    'the-uae-golden-visa-comparing-every-real-way-to-qualify',
    'freelance-visa-or-green-residence-the-independent-professionals-setup-decision',
    'why-americans-are-relocating-to-the-uae-in-2026',
    'uae-taxes-explained-2026-every-tax-who-pays-it-and-what-you-dont-owe',
    'ajman-free-zone-2026-cost-0-tax-and-the-10-billion-economy-behind-it',
);

$oldBlogPostRoutes = array(
    '/blog/mainland-free-zone-or-offshore-uae-structuring-us-founders' => '/blog/mainland-free-zone-or-offshore-the-uae-structuring-decision-serious-us-founders-cannot-afford-to-get-wrong',
    '/blog/why-us-wireless-itad-operators-are-looking-at-the-uae' => '/blog/why-us-wireless-and-itad-operators-are-looking-at-the-uae',
    '/blog/uae-business-setup-geopolitics-2026' => '/blog/beyond-company-formation-why-the-uae-is-becoming-a-strategic-business-base-in-2026',
    '/blog/golden-visa-eligibility-guide' => '/blog/the-uae-golden-visa-comparing-every-real-way-to-qualify',
    '/blog/freelance-visa-uae-guide' => '/blog/freelance-visa-or-green-residence-the-independent-professionals-setup-decision',
    '/blog/why-americans-relocating-uae-2026' => '/blog/why-americans-are-relocating-to-the-uae-in-2026',
    '/blog/uae-taxes-explained-2026' => '/blog/uae-taxes-explained-2026-every-tax-who-pays-it-and-what-you-dont-owe',
    '/blog/ajman-free-zone-2026' => '/blog/ajman-free-zone-2026-cost-0-tax-and-the-10-billion-economy-behind-it',
);

$serviceRoutes = array(
    '/uae-business-formation-structuring-and-compliance' => 'uae-business-formation.php',
    '/government-relations-and-pro-services' => 'government-relations-pro-services.php',
    '/immigration-and-residency-solutions' => 'immigration-residency-solutions.php',
    '/digital-marketing-and-brand-development' => 'digital-marketing-brand-development.php',
    '/ai-automation-and-technology-solutions' => 'ai-automation-technology-solutions.php',
);

$oldServiceRoutes = array(
    '/uae-business-formation' => '/uae-business-formation-structuring-and-compliance',
    '/government-relations-pro-services' => '/government-relations-and-pro-services',
    '/immigration-residency-solutions' => '/immigration-and-residency-solutions',
    '/digital-marketing-brand-development' => '/digital-marketing-and-brand-development',
    '/ai-automation-technology-solutions' => '/ai-automation-and-technology-solutions',
);

if (isset($oldBlogPostRoutes[$uri])) {
    header('Location: ' . $oldBlogPostRoutes[$uri], true, 301);
    exit;
}

if (isset($oldServiceRoutes[$uri])) {
    header('Location: ' . $oldServiceRoutes[$uri], true, 301);
    exit;
}

// --------------------------------------------------
// 1. SEO blog slugs -> real PHP files
// --------------------------------------------------

if ($uri === '/blog/mainland-free-zone-or-offshore-the-uae-structuring-decision-serious-us-founders-cannot-afford-to-get-wrong') {
    require __DIR__ . '/blog-details.php';
    return true;
}

if ($uri === '/blog/why-us-wireless-and-itad-operators-are-looking-at-the-uae') {
    require __DIR__ . '/blog-details2.php';
    return true;
}

if ($uri === '/blog/beyond-company-formation-why-the-uae-is-becoming-a-strategic-business-base-in-2026') {
    require __DIR__ . '/blog-details3.php';
    return true;
}

if ($uri === '/blog/the-uae-golden-visa-comparing-every-real-way-to-qualify') {
    require __DIR__ . '/blog-details4.php';
    return true;
}

if ($uri === '/blog/freelance-visa-or-green-residence-the-independent-professionals-setup-decision') {
    require __DIR__ . '/blog-details5.php';
    return true;
}
if ($uri === '/blog/why-americans-are-relocating-to-the-uae-in-2026') {
    require __DIR__ . '/blog-details6.php';
    return true;
}

if ($uri === '/blog/uae-taxes-explained-2026-every-tax-who-pays-it-and-what-you-dont-owe') {
    require __DIR__ . '/blog-details7.php';
    return true;
}

if ($uri === '/blog/ajman-free-zone-2026-cost-0-tax-and-the-10-billion-economy-behind-it') {
    require __DIR__ . '/blog-details8.php';
    return true;
}

if (isset($serviceRoutes[$uri])) {
    require __DIR__ . '/' . $serviceRoutes[$uri];
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
    header('Location: /blog/mainland-free-zone-or-offshore-the-uae-structuring-decision-serious-us-founders-cannot-afford-to-get-wrong', true, 301);
    exit;
}

if ($uri === '/blog-details2' || $uri === '/blog-details2.php') {
    header('Location: /blog/why-us-wireless-and-itad-operators-are-looking-at-the-uae', true, 301);
    exit;
}

if ($uri === '/blog-details3' || $uri === '/blog-details3.php') {
    header('Location: /blog/beyond-company-formation-why-the-uae-is-becoming-a-strategic-business-base-in-2026', true, 301);
    exit;
}

if ($uri === '/blog-details4' || $uri === '/blog-details4.php') {
    header('Location: /blog/the-uae-golden-visa-comparing-every-real-way-to-qualify', true, 301);
    exit;
}

if ($uri === '/blog-details5' || $uri === '/blog-details5.php') {
    header('Location: /blog/freelance-visa-or-green-residence-the-independent-professionals-setup-decision', true, 301);
    exit;
}

if ($uri === '/blog-details6' || $uri === '/blog-details6.php') {
    header('Location: /blog/why-americans-are-relocating-to-the-uae-in-2026', true, 301);
    exit;
}

if ($uri === '/blog-details7' || $uri === '/blog-details7.php') {
    header('Location: /blog/uae-taxes-explained-2026-every-tax-who-pays-it-and-what-you-dont-owe', true, 301);
    exit;
}

if ($uri === '/blog-details8' || $uri === '/blog-details8.php') {
    header('Location: /blog/ajman-free-zone-2026-cost-0-tax-and-the-10-billion-economy-behind-it', true, 301);
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
// /uae-business-formation-structuring-and-compliance -> uae-business-formation.php
// /government-relations-and-pro-services -> government-relations-pro-services.php
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
