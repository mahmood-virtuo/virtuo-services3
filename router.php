<?php
$path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
$blogPostSlugs = array(
    "mainland-free-zone-or-offshore-the-uae-structuring-decision-serious-us-founders-cannot-afford-to-get-wrong",
    "why-us-wireless-and-itad-operators-are-looking-at-the-uae",
    "beyond-company-formation-why-the-uae-is-becoming-a-strategic-business-base-in-2026",
    "the-uae-golden-visa-comparing-every-real-way-to-qualify",
    "freelance-visa-or-green-residence-the-independent-professionals-setup-decision",
    "why-americans-are-relocating-to-the-uae-in-2026",
);

$blogPostRoutes = array(
    "/blog/mainland-free-zone-or-offshore-the-uae-structuring-decision-serious-us-founders-cannot-afford-to-get-wrong" => "blog-details.php",
    "/blog/why-us-wireless-and-itad-operators-are-looking-at-the-uae" => "blog-details2.php",
    "/blog/beyond-company-formation-why-the-uae-is-becoming-a-strategic-business-base-in-2026" => "blog-details3.php",
    "/blog/the-uae-golden-visa-comparing-every-real-way-to-qualify" => "blog-details4.php",
    "/blog/freelance-visa-or-green-residence-the-independent-professionals-setup-decision" => "blog-details5.php",
    "/blog/why-americans-are-relocating-to-the-uae-in-2026" => "blog-details6.php",
);

$oldBlogPostRoutes = array(
    "/blog/mainland-free-zone-or-offshore-uae-structuring-us-founders" => "/blog/mainland-free-zone-or-offshore-the-uae-structuring-decision-serious-us-founders-cannot-afford-to-get-wrong",
    "/blog/why-us-wireless-itad-operators-are-looking-at-the-uae" => "/blog/why-us-wireless-and-itad-operators-are-looking-at-the-uae",
    "/blog/uae-business-setup-geopolitics-2026" => "/blog/beyond-company-formation-why-the-uae-is-becoming-a-strategic-business-base-in-2026",
    "/blog/golden-visa-eligibility-guide" => "/blog/the-uae-golden-visa-comparing-every-real-way-to-qualify",
    "/blog/freelance-visa-uae-guide" => "/blog/freelance-visa-or-green-residence-the-independent-professionals-setup-decision",
    "/blog/why-americans-relocating-uae-2026" => "/blog/why-americans-are-relocating-to-the-uae-in-2026",
);

$serviceRoutes = array(
    "/uae-business-formation-structuring-and-compliance" => "uae-business-formation.php",
    "/government-relations-and-pro-services" => "government-relations-pro-services.php",
    "/immigration-and-residency-solutions" => "immigration-residency-solutions.php",
    "/digital-marketing-and-brand-development" => "digital-marketing-brand-development.php",
    "/ai-automation-and-technology-solutions" => "ai-automation-technology-solutions.php",
);

$oldServiceRoutes = array(
    "/uae-business-formation" => "/uae-business-formation-structuring-and-compliance",
    "/government-relations-pro-services" => "/government-relations-and-pro-services",
    "/immigration-residency-solutions" => "/immigration-and-residency-solutions",
    "/digital-marketing-brand-development" => "/digital-marketing-and-brand-development",
    "/ai-automation-technology-solutions" => "/ai-automation-and-technology-solutions",
);

if (isset($oldBlogPostRoutes[$path])) {
    header("Location: " . $oldBlogPostRoutes[$path], true, 301);
    exit;
}

if (isset($oldServiceRoutes[$path])) {
    header("Location: " . $oldServiceRoutes[$path], true, 301);
    exit;
}

if (isset($blogPostRoutes[$path])) {
    require __DIR__ . "/" . $blogPostRoutes[$path];
    return;
}

if (isset($serviceRoutes[$path])) {
    require __DIR__ . "/" . $serviceRoutes[$path];
    return;
}

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
