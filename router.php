<?php
$path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
$blogPostSlugs = array(
    "mainland-free-zone-or-offshore-uae-structuring-us-founders",
    "why-us-wireless-itad-operators-are-looking-at-the-uae",
    "why-us-wireless-and-itad-operators-are-looking-at-the-uae",
    "uae-business-setup-geopolitics-2026",
    "golden-visa-eligibility-guide",
    "freelance-visa-uae-guide",
);

if ($path !== "/" && file_exists(__DIR__ . $path . ".php")) {
    require __DIR__ . $path . ".php";
    return;
}

if ($path === "/blog/") {
    header("Location: /blog", true, 301);
    exit;
}

if (in_array($path, array("/blog/tag", "/blog/tag/", "/blog/category", "/blog/category/"), true)) {
    header("Location: /blog", true, 301);
    exit;
}

if (preg_match('#^/blog/(tag|category)/([^/]+)/$#', $path, $matches)) {
    header("Location: /blog/" . $matches[1] . "/" . $matches[2], true, 301);
    exit;
}

if (preg_match('#^/blog/([^/]+)/$#', $path, $matches) && in_array($matches[1], $blogPostSlugs, true)) {
    header("Location: /blog/" . $matches[1], true, 301);
    exit;
}

$noSlashPath = rtrim($path, "/");

if ($path !== "/" && substr($path, -1) === "/" && file_exists(__DIR__ . $noSlashPath . ".php")) {
    header("Location: " . $noSlashPath, true, 301);
    exit;
}

if (preg_match('#^/blog/category/([^/]+)$#', $path, $matches)) {
    $_GET["category"] = $matches[1];
    require __DIR__ . "/blog-category.php";
    return;
}

if (preg_match('#^/blog/tag/([^/]+)$#', $path, $matches)) {
    $_GET["tag"] = $matches[1];
    require __DIR__ . "/blog-tag.php";
    return;
}

if ($path === "/sitemap.xml") {
    require __DIR__ . "/sitemap.php";
    return;
}

if ($path !== "/" && file_exists(__DIR__ . $path)) {
    return false;
}

if ($path === "/") {
    require __DIR__ . "/index.php";
    return;
}

http_response_code(404);
require __DIR__ . "/error.php";
