<?php
require_once __DIR__ . '/partials/services/digital-marketing/registry.php';

$requestedDigitalTab = $_GET['tab'] ?? '';
$defaultDigitalSlug = virtuo_digital_service_default_slug();

if ($requestedDigitalTab === $defaultDigitalSlug) {
    header('Location: ' . virtuo_digital_service_base_path(), true, 301);
    exit;
}

$digitalActiveSlug = virtuo_digital_service_resolve_slug($requestedDigitalTab);
$digitalInvalidTab = $requestedDigitalTab !== '' && $digitalActiveSlug === '';

if ($digitalInvalidTab) {
    http_response_code(404);
    $digitalActiveSlug = $defaultDigitalSlug;
}

$digitalActiveEntry = virtuo_digital_service_get($digitalActiveSlug);
$digitalActiveHtml = virtuo_digital_service_render_content($digitalActiveEntry);
$faqs = virtuo_digital_service_extract_faqs($digitalActiveHtml);
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <?php
    $seoPage = array(
        'title' => $digitalActiveEntry['title'],
        'description' => $digitalActiveEntry['metaDescription'],
        'path' => $digitalActiveEntry['canonicalPath'],
        'type' => 'article',
        'breadcrumbTitle' => 'Digital Marketing & Brand Development',
        'schemaType' => 'Service',
        'serviceType' => $digitalActiveEntry['serviceType'],
        'excerpt' => $digitalActiveEntry['metaDescription'],
        'ogImage' => '/assets/img/og/home.jpg',
        'image' => '/assets/img/bg/HEADER.webp',
        'imageAlt' => 'Digital marketing and brand development services in the UAE',
        'heroImage' => '/assets/img/bg/HEADER.webp'
    );
    include __DIR__ . '/partials/seo.php';
    ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include __DIR__ . '/partials/favicon.php'; ?>
    <!-- CSS here -->
    <link rel="stylesheet" href="<?php echo htmlspecialchars(virtuo_asset_url('assets/css/bootstrap.min.css'), ENT_QUOTES, 'UTF-8'); ?>">
    <link rel="stylesheet" href="<?php echo htmlspecialchars(virtuo_asset_url('assets/css/animate.min.css'), ENT_QUOTES, 'UTF-8'); ?>">
    <link rel="stylesheet" href="<?php echo htmlspecialchars(virtuo_asset_url('assets/css/magnific-popup.css'), ENT_QUOTES, 'UTF-8'); ?>">
    <link rel="stylesheet" href="<?php echo htmlspecialchars(virtuo_asset_url('assets/css/fontawesome-all.min.css'), ENT_QUOTES, 'UTF-8'); ?>">
    <link rel="stylesheet" href="<?php echo htmlspecialchars(virtuo_asset_url('assets/css/tg-flaticon.css'), ENT_QUOTES, 'UTF-8'); ?>">
    <?php if (!empty($loadSwiperAssets)) : ?>
    <link rel="stylesheet" href="<?php echo htmlspecialchars(virtuo_asset_url('assets/css/swiper-bundle.min.css'), ENT_QUOTES, 'UTF-8'); ?>">
    <?php endif; ?>
    <link rel="stylesheet" href="<?php echo htmlspecialchars(virtuo_asset_url('assets/css/default.css'), ENT_QUOTES, 'UTF-8'); ?>">
    <link rel="stylesheet" href="<?php echo htmlspecialchars(virtuo_asset_url('assets/css/default-icons.css'), ENT_QUOTES, 'UTF-8'); ?>">
    <link rel="stylesheet" href="<?php echo htmlspecialchars(virtuo_asset_url('assets/css/odometer.css'), ENT_QUOTES, 'UTF-8'); ?>">
    <link rel="stylesheet" href="<?php echo htmlspecialchars(virtuo_asset_url('assets/css/aos.css'), ENT_QUOTES, 'UTF-8'); ?>">
    <link rel="stylesheet" href="<?php echo htmlspecialchars(virtuo_asset_url('assets/css/tg-cursor.css'), ENT_QUOTES, 'UTF-8'); ?>">
    <link rel="stylesheet" href="<?php echo htmlspecialchars(virtuo_asset_url('assets/css/main.min.css'), ENT_QUOTES, 'UTF-8'); ?>">
</head>

<body class="service-page digital-marketing-page" data-digital-service-page data-current-digital-service="<?php echo htmlspecialchars($digitalActiveSlug, ENT_QUOTES, 'UTF-8'); ?>">
    <?php include __DIR__ . '/partials/header.php'; ?>
    <!-- main-area -->
    <main class="main-area fix">
        <!-- breadcrumb-area -->
        <?php
        $breadcrumbPageTitle = 'Digital Marketing & Brand Development';
        $breadcrumbPageUrl = '/digital-marketing-and-brand-development';
        $breadcrumbDefaultMain = $digitalActiveEntry['breadcrumbMain'];
        $breadcrumbDefaultSub = $digitalActiveEntry['breadcrumbSub'];

        include __DIR__ . '/partials/service-breadcrumb.php';
        ?>
        <!-- breadcrumb-area-end -->

        <!-- marquee-area -->
        <?php
        $serviceMarqueeVariant = 'plain';
        include __DIR__ . '/partials/service-marquee.php';
        unset($serviceMarqueeVariant);
        ?>
        <!-- marquee-area-end -->

        <!-- services-details-area -->
        <section class="services__details-area section-py-130">
            <div class="container site-content-gutter custom-container">
                <div class="row">
                    <div class="col-70 order-0 order-lg-2">
                        <div id="digital-service-content" class="service-tab-panel is-active" data-service-panel="<?php echo htmlspecialchars($digitalActiveSlug, ENT_QUOTES, 'UTF-8'); ?>" data-current-digital-service-panel tabindex="-1" aria-busy="false">
                            <?php echo $digitalActiveHtml; ?>
                        </div>
                    </div>
                    <div class="col-30">
                        <aside class="services__sidebar">
                            <div class="sidebar__widget">
                                <!-- SideBar Starts Here   -->
                                <?php include __DIR__ . '/partials/services/digital-marketing/sidebar.php'; ?>
                                <!-- SideBar Ends Here -->
                            </div>
                            <?php include __DIR__ . '/partials/sidebar-consultation-form.php'; ?>
                        </aside>
                    </div>
                </div>
            </div>
        </section>
        <!-- services-details-area-end -->
    </main>
    <!-- main-area-end -->
    <!-- footer-area -->
    <?php include __DIR__ . '/partials/footer.php'; ?>
    <?php $loadVirtuoServiceTabsBreadcrumb = true; ?>
    <?php include __DIR__ . '/partials/scripts.php'; ?>
    <!-- footer-area-end -->

</body>

</html>
