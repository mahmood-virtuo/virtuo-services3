<?php
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$path = __DIR__ . $uri;

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