<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>
            Immigration &amp; Residency Solutions
        </title>
        <meta name="description" content="Virtuo Services -  Business Consulting HTML Template">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
        <!-- Place favicon.ico in the root directory -->
        <!-- CSS here -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/animate.min.css">
        <link rel="stylesheet" href="assets/css/magnific-popup.css">
        <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
        <link rel="stylesheet" href="assets/css/tg-flaticon.css">
        <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">
        <link rel="stylesheet" href="assets/css/default.css">
        <link rel="stylesheet" href="assets/css/default-icons.css">
        <link rel="stylesheet" href="assets/css/odometer.css">
        <link rel="stylesheet" href="assets/css/aos.css">
        <link rel="stylesheet" href="assets/css/tg-cursor.css">
        <link rel="stylesheet" href="assets/css/main.css">
    </head>
    <body>
        <?php include __DIR__ . '/partials/header.php'; ?>
        <?php include __DIR__ . '/partials/service-category-renderer.php'; ?>
        <?php
            $pageTitle = 'Immigration & Residency Solutions';
            $pageSlug = 'immigration-residency-solutions';
            $tabs = array(
                'Immigration Services',
                'Dependent Visa',
                'Investor Visa Dubai',
                'GDRFA Services Dubai',
                'Consulate Services Dubai',
                'Freelance Visa',
                'Golden Visa UAE',
                'Residence Visa',
                'Employment Visa',
            );
        ?>
        <!-- main-area -->
        <main class="main-area fix">
            <!-- breadcrumb-area -->
            <section class="breadcrumb__area">
                <div class="breadcrumb__bg" data-background="assets/img/bg/HEADER.jpg" style="background-size:cover; background-repeat: no-repeat;">
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="breadcrumb__content">
                                <h2 class="title">
                                    <?php echo htmlspecialchars($pageTitle); ?>
                                </h2>
                                <nav class="breadcrumb">
                                    <span property="itemListElement" typeof="ListItem">
                                        <a href="index-5.php">
                                            Home
                                        </a>
                                    </span>
                                    <span class="breadcrumb-separator">
                                        <i class="fas fa-angle-right">
                                        </i>
                                    </span>
                                    <span property="itemListElement" typeof="ListItem">
                                        <?php echo htmlspecialchars($pageTitle); ?>
                                    </span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- breadcrumb-area-end -->
            <!-- services-details-area -->
            <!-- services-details-area -->
            <section class="services__details-area section-py-130">
                <div class="container">
                    <div class="row">
                        <div class="col-70 order-0 order-lg-2">
                            <?php virtuo_render_service_panels($pageSlug, $tabs); ?>
                        </div>
                        <div class="col-30">
                            <?php virtuo_render_service_sidebar($pageSlug, $tabs); ?>
                        </div>
                    </div>
                </div>
            </section>
            <!-- services-details-area-end -->
        </main>
        <!-- main-area-end -->
        <!-- footer-area -->
        <?php include __DIR__ . '/partials/footer.php'; ?>
        <?php include __DIR__ . '/partials/scripts.php'; ?>
        <!-- footer-area-end -->
    </body>
</html>
