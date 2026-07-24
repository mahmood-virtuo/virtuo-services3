<?php
require_once __DIR__ . '/asset-helper.php';

if (!function_exists('virtuo_seo_escape')) {
    function virtuo_seo_escape($value)
    {
        return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
    }
}

if (!function_exists('virtuo_seo_url')) {
    function virtuo_seo_url($path)
    {
        if (preg_match('/^https?:\/\//', (string) $path)) {
            return $path;
        }

        $path = '/' . ltrim((string) $path, '/');

        return $path === '/' ? 'https://virtuo.ae/' : 'https://virtuo.ae' . $path;
    }
}

if (!function_exists('virtuo_seo_local_image_exists')) {
    function virtuo_seo_local_image_exists($path)
    {
        $path = parse_url((string) $path, PHP_URL_PATH);

        if ($path === null || trim($path) === '') {
            return false;
        }

        $localPath = dirname(__DIR__) . '/' . ltrim(urldecode($path), '/');

        return is_file($localPath);
    }
}

if (!function_exists('virtuo_seo_resolve_image')) {
    function virtuo_seo_resolve_image($seo)
    {
        $candidates = array(
            $seo['ogImage'] ?? '',
            $seo['image'] ?? '',
            $seo['heroImage'] ?? '',
            '/assets/img/slider/1st.webp',
        );

        foreach ($candidates as $candidate) {
            $candidate = trim((string) $candidate);

            if ($candidate === '') {
                continue;
            }

            if (preg_match('/^https?:\/\//', $candidate)) {
                return virtuo_seo_url($candidate);
            }

            if (virtuo_seo_local_image_exists($candidate)) {
                return virtuo_seo_url($candidate);
            }
        }

        return virtuo_seo_url('/assets/img/slider/1st.webp');
    }
}

if (!function_exists('virtuo_seo_normalize_asset_path')) {
    function virtuo_seo_normalize_asset_path($path)
    {
        $path = parse_url((string) $path, PHP_URL_PATH);

        if ($path === null || trim($path) === '') {
            return '';
        }

        return '/' . ltrim($path, '/');
    }
}

if (!function_exists('virtuo_seo_uses_shared_header_image')) {
    function virtuo_seo_uses_shared_header_image($path)
    {
        return virtuo_seo_normalize_asset_path($path) === '/assets/img/bg/HEADER.webp';
    }
}

if (!function_exists('virtuo_seo_uses_old_shared_header_mobile_image')) {
    function virtuo_seo_uses_old_shared_header_mobile_image($path)
    {
        return virtuo_seo_normalize_asset_path($path) === '/assets/img/bg/HEADER-mobile.webp';
    }
}

$seoPage = isset($seoPage) && is_array($seoPage) ? $seoPage : array();
$seoDefaults = array(
    'title' => 'Virtuo Services | UAE Business Setup & PRO Services',
    'description' => 'Virtuo Services F.Z.C helps UAE businesses establish, operate and scale with company formation, PRO services, visas, marketing and AI automation.',
    'path' => '/',
    'type' => 'website',
    'breadcrumbTitle' => 'Home',
    'schemaType' => 'WebPage',
    'image' => '/assets/img/slider/1st.webp',
    'imageAlt' => 'Virtuo Services UAE business setup and consultancy',
    'ogImage' => '',
    'ogImageAlt' => '',
    'heroImage' => '',
    'heroImageMobile' => '',
);

$seo = array_merge($seoDefaults, $seoPage);

if (
    virtuo_seo_uses_shared_header_image($seo['heroImage'] ?? '') &&
    (
        empty($seo['heroImageMobile']) ||
        virtuo_seo_uses_shared_header_image($seo['heroImageMobile']) ||
        virtuo_seo_uses_old_shared_header_mobile_image($seo['heroImageMobile'])
    )
) {
    $seo['heroImageMobile'] = '/assets/img/bg/HEADER_Mobile.webp';
}

$canonicalUrl = virtuo_seo_url($seo['path']);
$ogImage = virtuo_seo_resolve_image($seo);
$ogImageAlt = $seo['ogImageAlt'] !== '' ? $seo['ogImageAlt'] : ($seo['imageAlt'] !== '' ? $seo['imageAlt'] : $seo['title']);
$heroImage = !empty($seo['heroImage']) ? virtuo_seo_url($seo['heroImage']) : '';
$heroImageMobile = !empty($seo['heroImageMobile']) ? virtuo_seo_url($seo['heroImageMobile']) : '';

include_once dirname(__DIR__) . '/includes/schema-config.php';
include_once dirname(__DIR__) . '/includes/schema.php';
?>
<title><?php echo virtuo_seo_escape($seo['title']); ?></title>
<meta name="description" content="<?php echo virtuo_seo_escape($seo['description']); ?>">
<link rel="canonical" href="<?php echo virtuo_seo_escape($canonicalUrl); ?>">
<?php if (!empty($useHomepageLocalPoppins)) : ?>
<!-- Homepage only: preload the Poppins face used by the first hero heading. -->
<link rel="preload" href="/assets/fonts/poppins/poppins-v24-latin-600.woff2" as="font" type="font/woff2" crossorigin>
<?php else : ?>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500&display=swap">
<?php endif; ?>
<?php if ($seo['heroImage'] !== '' && $seo['heroImageMobile'] !== '') : ?>
<?php if ($seo['heroImage'] === $seo['heroImageMobile']) : ?>
<link rel="preload" as="image" type="image/webp" href="<?php echo virtuo_seo_escape($seo['heroImage']); ?>" fetchpriority="high">
<?php else : ?>
<link rel="preload" as="image" type="image/webp" href="<?php echo virtuo_seo_escape($seo['heroImage']); ?>" fetchpriority="high" media="(min-width: 768px)">
<link rel="preload" as="image" type="image/webp" href="<?php echo virtuo_seo_escape($seo['heroImageMobile']); ?>" fetchpriority="high" media="(max-width: 767px)">
<?php endif; ?>
<?php elseif ($seo['heroImage'] !== '') : ?>
<link rel="preload" as="image" type="image/webp" href="<?php echo virtuo_seo_escape($seo['heroImage']); ?>" fetchpriority="high">
<?php endif; ?>
<meta property="og:type" content="<?php echo virtuo_seo_escape($seo['type']); ?>">
<meta property="og:title" content="<?php echo virtuo_seo_escape($seo['title']); ?>">
<meta property="og:description" content="<?php echo virtuo_seo_escape($seo['description']); ?>">
<meta property="og:url" content="<?php echo virtuo_seo_escape($canonicalUrl); ?>">
<meta property="og:image" content="<?php echo virtuo_seo_escape($ogImage); ?>">
<meta property="og:image:secure_url" content="<?php echo virtuo_seo_escape($ogImage); ?>">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
<meta property="og:image:alt" content="<?php echo virtuo_seo_escape($ogImageAlt); ?>">
<meta property="og:site_name" content="Virtuo Services F.Z.C">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="<?php echo virtuo_seo_escape($seo['title']); ?>">
<meta name="twitter:description" content="<?php echo virtuo_seo_escape($seo['description']); ?>">
<meta name="twitter:image" content="<?php echo virtuo_seo_escape($ogImage); ?>">
<?php $schemaJson = function_exists('generate_schema_output') ? generate_schema_output() : ''; ?>
<?php if ($schemaJson !== '') : ?>
<script type="application/ld+json"><?php echo $schemaJson; ?></script>
<?php endif; ?>
