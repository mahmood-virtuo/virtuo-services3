<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <?php
    $seoPage = array(
        'title' => 'Page Not Found | Virtuo',
        'description' => 'The page you are looking for does not exist or has been moved.',
        'path' => '/404',
        'type' => 'website',
        'breadcrumbTitle' => '404 Error',
        'schemaType' => '', // Leave empty or remove
        'serviceType' => '', // Leave empty or remove
        'image' => '/assets/img/bg/HEADER.webp',
        'heroImage' => '/assets/img/bg/HEADER.webp'
    );
    include __DIR__ . '/partials/seo.php';
    ?>
    
    <meta name="robots" content="noindex, follow"> 
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include __DIR__ . '/partials/favicon.php'; ?>
    <!-- CSS here -->
    <link rel="stylesheet" href="<?php echo htmlspecialchars(virtuo_asset_url('/assets/css/bootstrap.min.css'), ENT_QUOTES, 'UTF-8'); ?>">
    <?php if (!empty($loadWowAssets)) : ?>
    <link rel="stylesheet" href="<?php echo htmlspecialchars(virtuo_asset_url('/assets/css/animate.min.css'), ENT_QUOTES, 'UTF-8'); ?>">
    <?php endif; ?>
    <?php if (!empty($loadMagnificPopupAssets)) : ?>
    <link rel="stylesheet" href="<?php echo htmlspecialchars(virtuo_asset_url('/assets/css/magnific-popup.css'), ENT_QUOTES, 'UTF-8'); ?>">
    <?php endif; ?>
    <link rel="stylesheet" href="<?php echo htmlspecialchars(virtuo_asset_url('/assets/css/fontawesome-all.min.css'), ENT_QUOTES, 'UTF-8'); ?>">
    <link rel="stylesheet" href="<?php echo htmlspecialchars(virtuo_asset_url('/assets/css/tg-flaticon.css'), ENT_QUOTES, 'UTF-8'); ?>">
    <?php if (!empty($loadSwiperAssets)) : ?>
    <link rel="stylesheet" href="<?php echo htmlspecialchars(virtuo_asset_url('/assets/css/swiper-bundle.min.css'), ENT_QUOTES, 'UTF-8'); ?>">
    <?php endif; ?>
    <link rel="stylesheet" href="<?php echo htmlspecialchars(virtuo_asset_url('/assets/css/default.css'), ENT_QUOTES, 'UTF-8'); ?>">
    <link rel="stylesheet" href="<?php echo htmlspecialchars(virtuo_asset_url('/assets/css/default-icons.css'), ENT_QUOTES, 'UTF-8'); ?>">
    <link rel="stylesheet" href="<?php echo htmlspecialchars(virtuo_asset_url('/assets/css/aos.css'), ENT_QUOTES, 'UTF-8'); ?>">
    <link rel="stylesheet" href="<?php echo htmlspecialchars(virtuo_asset_url('/assets/css/tg-cursor.css'), ENT_QUOTES, 'UTF-8'); ?>">
    <?php
    $virtuoCssFamily = 'error';
    include __DIR__ . '/partials/main-styles.php';
    ?>
</head>

<body>
    <?php include __DIR__ . '/partials/header.php'; ?>
    <!-- main-area -->
    <main class="main-area fix">
        <!-- breadcrumb-area -->
        <?php
    $breadcrumbPageTitle = 'Page Not Found';

    include __DIR__ . '/partials/service-breadcrumb.php';
    ?>
        <!-- breadcrumb-area-end -->
        <!-- breadcrumb-area-end -->


        <!-- marquee-area -->
        <?php
        $serviceMarqueeVariant = 'plain';
        include __DIR__ . '/partials/service-marquee.php';
        unset($serviceMarqueeVariant);
        ?>
        <!-- marquee-area-end -->



        <!-- error-area -->
        <section class="error-area section-py-130">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="error-wrap text-center">
                            <div class="error-content">
                                <h2 class="title">ERROR PAGE 404! <span>Sorry! This Page is Not Available!</span></h2>
                                <div class="tg-button-wrap">
                                    <a href="/" class="tg-btn">Go To Home Page <img src="/assets/img/icons/right_arrow.svg" alt="" class="injectable" aria-hidden="true"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- error-area-end -->

    </main>
    <!-- main-area-end -->
    <!-- footer-area -->
    <?php include __DIR__ . '/partials/footer.php'; ?>
    <?php include __DIR__ . '/partials/scripts.php'; ?>
    <!-- footer-area-end -->
</body>

</html>
