<?php
require_once __DIR__ . '/partials/blog-taxonomy.php';

$categorySlug = strtolower(trim((string) ($_GET['category'] ?? '')));

if (!virtuo_blog_category_exists($categorySlug)) {
    http_response_code(404);
    include __DIR__ . '/error.php';
    exit;
}

$categories = virtuo_blog_categories();
$category = $categories[$categorySlug];
$categoryLabel = $category['label'];
$categoryDescription = $category['description'];
$blogPosts = virtuo_blog_filter_posts_by_category($categorySlug);
$pagedBlogPosts = $blogPosts;
$blogListingTitle = $categoryLabel;
$blogListingDescription = $categoryDescription;
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <?php
    $seoPage = array(
        'title' => $category['seo_title'],
        'description' => $category['seo_description'],
        'path' => virtuo_blog_get_category_url($categorySlug),
        'type' => 'website',
        'breadcrumbTitle' => $categoryLabel,
        'schemaType' => 'CollectionPage',
        'ogImage' => '/assets/img/og/blog.jpg',
        'image' => '/assets/img/bg/HEADER.webp',
        'imageAlt' => 'Virtuo blog category insights',
        'heroImage' => '/assets/img/bg/HEADER.webp',
        'heroImageMobile' => '/assets/img/bg/HEADER-mobile.webp',
    );
    include __DIR__ . '/partials/seo.php';
    ?>
    <?php if (count($blogPosts) === 0) : ?>
        <meta name="robots" content="noindex, follow">
    <?php endif; ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php include __DIR__ . '/partials/favicon.php'; ?>
    <link rel="stylesheet" href="<?php echo htmlspecialchars(virtuo_asset_url('/assets/css/bootstrap.min.css'), ENT_QUOTES, 'UTF-8'); ?>">
    <link rel="stylesheet" href="<?php echo htmlspecialchars(virtuo_asset_url('/assets/css/animate.min.css'), ENT_QUOTES, 'UTF-8'); ?>">
    <link rel="stylesheet" href="<?php echo htmlspecialchars(virtuo_asset_url('/assets/css/magnific-popup.css'), ENT_QUOTES, 'UTF-8'); ?>">
    <link rel="stylesheet" href="<?php echo htmlspecialchars(virtuo_asset_url('/assets/css/fontawesome-all.min.css'), ENT_QUOTES, 'UTF-8'); ?>">
    <link rel="stylesheet" href="<?php echo htmlspecialchars(virtuo_asset_url('/assets/css/tg-flaticon.css'), ENT_QUOTES, 'UTF-8'); ?>">
    <?php if (!empty($loadSwiperAssets)) : ?>
    <link rel="stylesheet" href="<?php echo htmlspecialchars(virtuo_asset_url('/assets/css/swiper-bundle.min.css'), ENT_QUOTES, 'UTF-8'); ?>">
    <?php endif; ?>
    <link rel="stylesheet" href="<?php echo htmlspecialchars(virtuo_asset_url('/assets/css/default.css'), ENT_QUOTES, 'UTF-8'); ?>">
    <link rel="stylesheet" href="<?php echo htmlspecialchars(virtuo_asset_url('/assets/css/default-icons.css'), ENT_QUOTES, 'UTF-8'); ?>">
    <link rel="stylesheet" href="<?php echo htmlspecialchars(virtuo_asset_url('/assets/css/odometer.css'), ENT_QUOTES, 'UTF-8'); ?>">
    <link rel="stylesheet" href="<?php echo htmlspecialchars(virtuo_asset_url('/assets/css/aos.css'), ENT_QUOTES, 'UTF-8'); ?>">
    <link rel="stylesheet" href="<?php echo htmlspecialchars(virtuo_asset_url('/assets/css/tg-cursor.css'), ENT_QUOTES, 'UTF-8'); ?>">
    <link rel="stylesheet" href="<?php echo htmlspecialchars(virtuo_asset_url('/assets/css/main.min.css'), ENT_QUOTES, 'UTF-8'); ?>">
</head>

<body class="blog-page">
    <?php include __DIR__ . '/partials/header.php'; ?>

    <main class="main-area fix">
        <section class="breadcrumb__area">
            <div class="breadcrumb__bg" data-background="/assets/img/bg/HEADER.webp" data-background-mobile="/assets/img/bg/HEADER-mobile.webp"></div>
            <div class="container site-content-gutter custom-container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb__content">
                            <h1 class="title"><?php echo htmlspecialchars($categoryLabel, ENT_QUOTES, 'UTF-8'); ?></h1>
                            <nav class="breadcrumb">
                                <span property="itemListElement" typeof="ListItem">
                                    <a href="/">Home</a>
                                </span>
                                <span class="breadcrumb-separator"><i class="fas fa-angle-right"></i></span>
                                <span property="itemListElement" typeof="ListItem">
                                    <a href="/blog">Blogs</a>
                                </span>
                                <span class="breadcrumb-separator"><i class="fas fa-angle-right"></i></span>
                                <span property="itemListElement" typeof="ListItem"><?php echo htmlspecialchars($categoryLabel, ENT_QUOTES, 'UTF-8'); ?></span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php include __DIR__ . '/partials/blog-listing-layout.php'; ?>
    </main>

    <?php include __DIR__ . '/partials/footer.php'; ?>
    <?php include __DIR__ . '/partials/scripts.php'; ?>
    <script src="<?php echo htmlspecialchars(virtuo_asset_url('/assets/js/blog-sticky-widgets.js'), ENT_QUOTES, 'UTF-8'); ?>"></script>
</body>

</html>
