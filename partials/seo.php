<?php
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

$seoPage = isset($seoPage) && is_array($seoPage) ? $seoPage : array();
$seoDefaults = array(
    'title' => 'Virtuo Services | UAE Business Setup & PRO Services',
    'description' => 'Virtuo Services F.Z.C helps UAE businesses establish, operate and scale with company formation, PRO services, visas, marketing and AI automation.',
    'path' => '/',
    'type' => 'website',
    'breadcrumbTitle' => 'Home',
    'schemaType' => 'WebPage',
    'image' => 'https://virtuo.ae/assets/img/logo/w_logo.svg',
    'heroImage' => '',
);

$seo = array_merge($seoDefaults, $seoPage);
$canonicalUrl = virtuo_seo_url($seo['path']);
$ogImage = virtuo_seo_url($seo['image']);
$heroImage = !empty($seo['heroImage']) ? virtuo_seo_url($seo['heroImage']) : '';

include_once dirname(__DIR__) . '/includes/schema-config.php';
include_once dirname(__DIR__) . '/includes/schema.php';
?>
<title><?php echo virtuo_seo_escape($seo['title']); ?></title>
<meta name="description" content="<?php echo virtuo_seo_escape($seo['description']); ?>">
<link rel="canonical" href="<?php echo virtuo_seo_escape($canonicalUrl); ?>">
<link rel="apple-touch-icon" href="/assets/img/favicon.png">
<?php if ($heroImage !== '') : ?>
<link rel="preload" as="image" href="<?php echo virtuo_seo_escape($heroImage); ?>" fetchpriority="high">
<?php endif; ?>
<meta property="og:type" content="<?php echo virtuo_seo_escape($seo['type']); ?>">
<meta property="og:title" content="<?php echo virtuo_seo_escape($seo['title']); ?>">
<meta property="og:description" content="<?php echo virtuo_seo_escape($seo['description']); ?>">
<meta property="og:url" content="<?php echo virtuo_seo_escape($canonicalUrl); ?>">
<meta property="og:image" content="<?php echo virtuo_seo_escape($ogImage); ?>">
<meta property="og:site_name" content="Virtuo Services F.Z.C">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="<?php echo virtuo_seo_escape($seo['title']); ?>">
<meta name="twitter:description" content="<?php echo virtuo_seo_escape($seo['description']); ?>">
<meta name="twitter:image" content="<?php echo virtuo_seo_escape($ogImage); ?>">
<?php $schemaJson = function_exists('generate_schema_output') ? generate_schema_output() : ''; ?>
<?php if ($schemaJson !== '') : ?>
<script type="application/ld+json"><?php echo $schemaJson; ?></script>
<?php endif; ?>
