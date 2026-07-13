<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <?php
    $seoPage = array(
        'title' => 'Insights & Resources for UAE Business Setup | Virtuo',
        'description' => 'Read Virtuo insights on UAE business setup, PRO services, immigration, residency, digital marketing, brand development and AI automation trends.',
        'path' => '/blog',
        'type' => 'article',
        'breadcrumbTitle' => 'Blogs',
        'schemaType' => 'Blog',
        'ogImage' => '/assets/img/og/home.jpg',
        'image' => '/assets/img/bg/HEADER.webp',
        'imageAlt' => 'Virtuo insights and resources for UAE business setup',
        'heroImage' => '/assets/img/bg/HEADER.webp'
    );
    include __DIR__ . '/partials/seo.php';
    require_once __DIR__ . '/partials/blog-posts.php';
    $blogPosts = virtuo_get_blog_posts();
    $postsPerPage = 5;
    $pagedBlogPosts = $blogPosts;
    $blogLoadEnabled = true;
    $blogLoadInitialCount = 5;
    $blogLoadBatchSize = 5;
    ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php include __DIR__ . '/partials/favicon.php'; ?>

    <!-- CSS here -->
    <link rel="stylesheet" href="<?php echo htmlspecialchars(virtuo_asset_url('assets/css/bootstrap.min.css'), ENT_QUOTES, 'UTF-8'); ?>">
    <?php if (!empty($loadWowAssets)) : ?>
    <link rel="stylesheet" href="<?php echo htmlspecialchars(virtuo_asset_url('assets/css/animate.min.css'), ENT_QUOTES, 'UTF-8'); ?>">
    <?php endif; ?>
    <?php if (!empty($loadMagnificPopupAssets)) : ?>
    <link rel="stylesheet" href="<?php echo htmlspecialchars(virtuo_asset_url('assets/css/magnific-popup.css'), ENT_QUOTES, 'UTF-8'); ?>">
    <?php endif; ?>
    <link rel="stylesheet" href="<?php echo htmlspecialchars(virtuo_asset_url('assets/css/fontawesome-all.min.css'), ENT_QUOTES, 'UTF-8'); ?>">
    <link rel="stylesheet" href="<?php echo htmlspecialchars(virtuo_asset_url('assets/css/tg-flaticon.css'), ENT_QUOTES, 'UTF-8'); ?>">
    <?php if (!empty($loadSwiperAssets)) : ?>
    <link rel="stylesheet" href="<?php echo htmlspecialchars(virtuo_asset_url('assets/css/swiper-bundle.min.css'), ENT_QUOTES, 'UTF-8'); ?>">
    <?php endif; ?>
    <link rel="stylesheet" href="<?php echo htmlspecialchars(virtuo_asset_url('assets/css/default.css'), ENT_QUOTES, 'UTF-8'); ?>">
    <link rel="stylesheet" href="<?php echo htmlspecialchars(virtuo_asset_url('assets/css/default-icons.css'), ENT_QUOTES, 'UTF-8'); ?>">
    <link rel="stylesheet" href="<?php echo htmlspecialchars(virtuo_asset_url('assets/css/aos.css'), ENT_QUOTES, 'UTF-8'); ?>">
    <link rel="stylesheet" href="<?php echo htmlspecialchars(virtuo_asset_url('assets/css/tg-cursor.css'), ENT_QUOTES, 'UTF-8'); ?>">
    <link rel="stylesheet" href="<?php echo htmlspecialchars(virtuo_asset_url('assets/css/main.min.css'), ENT_QUOTES, 'UTF-8'); ?>">
</head>

<body class="blog-page">

    <!-- preloader -->
    <?php include __DIR__ . '/partials/header.php'; ?>
    <!-- header-area-end -->



    <!-- main-area -->
    <main class="main-area fix">


        <!-- breadcrumb-area -->
        <section class="breadcrumb__area">
            <div class="breadcrumb__bg" data-background="assets/img/bg/HEADER.webp"></div>
            <div class="container site-content-gutter custom-container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb__content">
                            <h1 class="title">Blogs</h1>
                            <nav class="breadcrumb">
                                <span property="itemListElement" typeof="ListItem">
                                    <a href="/">Home</a>
                                </span>
                                <span class="breadcrumb-separator"><i class="fas fa-angle-right"></i></span>
                                <span property="itemListElement" typeof="ListItem">Latest Blogs</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- breadcrumb-area-end -->


        <!-- marquee-area -->
        <?php
        $serviceMarqueeVariant = 'plain';
        include __DIR__ . '/partials/service-marquee.php';
        unset($serviceMarqueeVariant);
        ?>
        <!-- marquee-area-end -->



        <!-- blog-post-area -->
        <?php include __DIR__ . '/partials/blog-listing-layout.php'; ?>
        <!-- blog-post-area-end -->

    </main>
    <!-- main-area-end -->

    <!-- footer-area -->
    <?php include __DIR__ . '/partials/footer.php'; ?>
    <?php include __DIR__ . '/partials/scripts.php'; ?>
    <script src="<?php echo htmlspecialchars(virtuo_asset_url('/assets/js/blog-sticky-widgets.min.js'), ENT_QUOTES, 'UTF-8'); ?>"></script>
    <script src="<?php echo htmlspecialchars(virtuo_asset_url('/assets/js/blog-load-more.min.js'), ENT_QUOTES, 'UTF-8'); ?>"></script>
    <!-- footer-area-end -->

</body>

</html>
