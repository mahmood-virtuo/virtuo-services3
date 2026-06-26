<?php
$schema_site_url = 'https://virtuo.ae/';
$schema_organization_name = 'Virtuo Services F.Z.C';
$schema_logo = 'https://virtuo.ae/assets/img/logo/w_logo.svg';
$schema_email = 'setup@virtuo.ae';
$schema_phone = '+971 56 515 1315';
$schema_address_street = 'Office - BLV - 6F - SF60959, A Building, Ajman Blvd, Ajman Freezone, Sheikh Rashid Bin Saeed Al Maktoum St.';
$schema_address_locality = 'Ajman';
$schema_address_region = 'Ajman';
$schema_address_country = 'AE';
$schema_same_as = array(
    'https://facebook.com',
    'https://instagram.com',
    'https://x.com/home',
);

$schema_current_file = basename($_SERVER['PHP_SELF'] ?? 'index.php');
$schema_request_path = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);
$schema_request_slug = trim((string) $schema_request_path, '/');
$schema_request_file = $schema_request_slug === '' ? 'index.php' : basename($schema_request_slug);

if ($schema_request_file !== 'index.php' && strpos($schema_request_file, '.') === false) {
    $schema_request_file .= '.php';
}

$schema_page_file = $schema_request_file !== 'index.php' ? $schema_request_file : $schema_current_file;
$schema_page_map = array(
    'index.php' => 'home',
    'about' => 'about',
    'services.php' => 'services',
    '/contact' => 'contact',
    '/blog' => 'blog',
    'post.php' => 'article',
    '//uae-business-formation' => 'services',
    '///government-relations-pro-services' => 'services',
    '/immigration-residency-solutions' => 'services',
    '/immigration-residency-solutions' => 'services',
    '/ai-automation-technology-solutions' => 'services',
);

$seoPage = isset($seoPage) && is_array($seoPage) ? $seoPage : array();
$page_type = $schema_page_map[$schema_page_file] ?? $schema_page_map[$schema_current_file] ?? 'page';

if (!empty($seoPage['schemaType'])) {
    if ($seoPage['schemaType'] === 'Service') {
        $page_type = 'services';
    } elseif ($seoPage['schemaType'] === 'ContactPage') {
        $page_type = 'contact';
    } elseif ($seoPage['schemaType'] === 'Blog') {
        $page_type = 'blog';
    } elseif ($seoPage['schemaType'] === 'AboutPage') {
        $page_type = 'about';
    } elseif ($seoPage['schemaType'] === 'Article') {
        $page_type = 'article';
    }
}

$page_title = $seoPage['title'] ?? 'Virtuo Services | UAE Business Setup & PRO Services';
$page_description = $seoPage['description'] ?? 'Virtuo Services F.Z.C helps UAE businesses establish, operate and scale with company formation, PRO services, visas, marketing and AI automation.';

if (function_exists('virtuo_seo_url')) {
    $page_url = virtuo_seo_url($seoPage['path'] ?? ($schema_page_file === 'index.php' ? '/' : '/' . preg_replace('/\.php$/', '', $schema_page_file)));
    $page_image = virtuo_seo_url($seoPage['image'] ?? $schema_logo);
} else {
    $schema_path = $seoPage['path'] ?? ($schema_page_file === 'index.php' ? '/' : '/' . preg_replace('/\.php$/', '', $schema_page_file));
    $schema_path = '/' . ltrim((string) $schema_path, '/');
    $page_url = $schema_path === '/' ? $schema_site_url : rtrim($schema_site_url, '/') . $schema_path;
    $page_image = $seoPage['image'] ?? $schema_logo;
}

$page_breadcrumb_title = $seoPage['breadcrumbTitle'] ?? $page_title;
$page_content_excerpt = $seoPage['excerpt'] ?? $page_description;
$service_name = $seoPage['serviceType'] ?? $page_breadcrumb_title;
$service_description = $page_content_excerpt;
$article_author = $seoPage['author'] ?? $schema_organization_name;
$article_date_published = $seoPage['datePublished'] ?? '';
$include_local_business_schema = in_array($schema_page_file, array('index.php', 'services.php', '/contact'), true);
