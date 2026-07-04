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
        'heroImage' => '/assets/img/bg/HEADER.webp',
        'heroImageMobile' => '/assets/img/bg/HEADER-mobile.webp'
    );
    include __DIR__ . '/partials/seo.php';
    require_once __DIR__ . '/partials/blog-posts.php';
    $blogPosts = virtuo_get_blog_posts();
    $postsPerPage = 4;
    $totalPosts = count($blogPosts);
    $totalPages = max(1, (int) ceil($totalPosts / $postsPerPage));
    $currentPage = max(1, (int) ($_GET['page'] ?? 1));
    $currentPage = min($currentPage, $totalPages);
    $blogPostOffset = ($currentPage - 1) * $postsPerPage;
    $pagedBlogPosts = array_slice($blogPosts, $blogPostOffset, $postsPerPage);
    ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php include __DIR__ . '/partials/favicon.php'; ?>

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

<body class="blog-page">

    <!-- preloader -->
    <?php include __DIR__ . '/partials/header.php'; ?>
    <!-- header-area-end -->



    <!-- main-area -->
    <main class="main-area fix">


        <!-- breadcrumb-area -->
        <section class="breadcrumb__area">
            <div class="breadcrumb__bg" data-background="assets/img/bg/HEADER.webp"></div>
            <div class="container site-content-gutter">
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
        <section class="marquee__area">
            <div class="slider__marquee clearfix marquee-wrap">
                <div class="marquee_mode marquee__group">
                    <h6 class="marquee__item">
                        <a href="/government-relations-and-pro-services"> <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 500 500" fill="none" style="margin-left:-4px;width:34px;height:34px;display:inline-block;vertical-align:middle;margin-right:12px;position:relative;top:0px;color:#EE4C01;">
                                <path fill="currentColor" d="M0 250C0 111.929 111.929 0 250 0h250v250c0 138.071-111.929 250-250 250S0 388.071 0 250Z"></path>
                            </svg>PRO SERVICES</a>
                    </h6>
                    <h6 class="marquee__item">
                        <a href="/uae-business-formation-structuring-and-compliance"><svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 500 500" fill="none" style="margin-left:-4px;width:34px;height:34px;display:inline-block;vertical-align:middle;margin-right:12px;position:relative;top:0px;color:#EE4C01;">
                                <path fill="currentColor" d="M0 250C0 111.929 111.929 0 250 0h250v250c0 138.071-111.929 250-250 250S0 388.071 0 250Z"></path>
                            </svg>BUSINESS SETUP</a>
                    </h6>
                    <h6 class="marquee__item">
                        <a href="/immigration-and-residency-solutions#immigration-residency-solutions-golden-visa-uae"> <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 500 500" fill="none" style="margin-left:-4px;width:34px;height:34px;display:inline-block;vertical-align:middle;margin-right:12px;position:relative;top:0px;color:#EE4C01;">
                                <path fill="currentColor" d="M0 250C0 111.929 111.929 0 250 0h250v250c0 138.071-111.929 250-250 250S0 388.071 0 250Z"></path>
                            </svg>GOLDEN VISA</a>
                    </h6>
                    <h6 class="marquee__item">
                        <a href="/uae-business-formation-structuring-and-compliance#business-bank-account-opening"> <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 500 500" fill="none" style="margin-left:-4px;width:34px;height:34px;display:inline-block;vertical-align:middle;margin-right:12px;position:relative;top:0px;color:#EE4C01;">
                                <path fill="currentColor" d="M0 250C0 111.929 111.929 0 250 0h250v250c0 138.071-111.929 250-250 250S0 388.071 0 250Z"></path>
                            </svg>BANK ACCOUNT OPENING</a>
                    </h6>
                    <h6 class="marquee__item">
                        <a href="/digital-marketing-and-brand-development#digital-marketing-brand-development-brand-development"> <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 500 500" fill="none" style="margin-left:-4px;width:34px;height:34px;display:inline-block;vertical-align:middle;margin-right:12px;position:relative;top:0px;color:#EE4C01;">
                                <path fill="currentColor" d="M0 250C0 111.929 111.929 0 250 0h250v250c0 138.071-111.929 250-250 250S0 388.071 0 250Z"></path>
                            </svg> BRAND DEVELOPMENT</a>
                    </h6>
                    <h6 class="marquee__item">
                        <a href="/immigration-and-residency-solutions#immigration-residency-solutions-investor-visa-dubai"> <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 500 500" fill="none" style="margin-left:-4px;width:34px;height:34px;display:inline-block;vertical-align:middle;margin-right:12px;position:relative;top:0px;color:#EE4C01;">
                                <path fill="currentColor" d="M0 250C0 111.929 111.929 0 250 0h250v250c0 138.071-111.929 250-250 250S0 388.071 0 250Z"></path>
                            </svg> INVEST IN DUBAI</a>
                    </h6>
                    <h6 class="marquee__item">
                        <a href="/immigration-and-residency-solutions#immigration-residency-solutions-freelance-visa"> <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 500 500" fill="none" style="margin-left:-4px;width:34px;height:34px;display:inline-block;vertical-align:middle;margin-right:12px;position:relative;top:-2px;color:#EE4C01;">
                                <path fill="currentColor" d="M0 250C0 111.929 111.929 0 250 0h250v250c0 138.071-111.929 250-250 250S0 388.071 0 250Z"></path>
                            </svg> FREELANCE VISA</a>
                    </h6>
                    <h6 class="marquee__item">
                        <a href="/digital-marketing-and-brand-development"> <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 500 500" fill="none" style="margin-left:-4px;width:34px;height:34px;display:inline-block;vertical-align:middle;margin-right:12px;position:relative;top:-2px;color:#EE4C01;">
                                <path fill="currentColor" d="M0 250C0 111.929 111.929 0 250 0h250v250c0 138.071-111.929 250-250 250S0 388.071 0 250Z"></path>
                            </svg>DIGITAL MARKETING</a>
                    </h6>
                    <h6 class="marquee__item">
                        <a href="/ai-automation-and-technology-solutions"> <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 500 500" fill="none" style="margin-left:-4px;width:34px;height:34px;display:inline-block;vertical-align:middle;margin-right:12px;position:relative;top:-2px;color:#EE4C01;">
                                <path fill="currentColor" d="M0 250C0 111.929 111.929 0 250 0h250v250c0 138.071-111.929 250-250 250S0 388.071 0 250Z"></path>
                            </svg>AI AUTOMATION</a>
                    </h6>
                    <h6 class="marquee__item">
                        <a href="/government-relations-and-pro-services"> <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 500 500" fill="none" style="margin-left:-4px;width:34px;height:34px;display:inline-block;vertical-align:middle;margin-right:12px;position:relative;top:-2px;color:#EE4C01;">
                                <path fill="currentColor" d="M0 250C0 111.929 111.929 0 250 0h250v250c0 138.071-111.929 250-250 250S0 388.071 0 250Z"></path>
                            </svg>GOVERNMENT RELATIONS</a>
                    </h6>
                    <h6 class="marquee__item">
                        <a href="/digital-marketing-and-brand-development#web-digital-solutions-website-development"> <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 500 500" fill="none" style="margin-left:-4px;width:34px;height:34px;display:inline-block;vertical-align:middle;margin-right:12px;position:relative;top:-2px;color:#EE4C01;">
                                <path fill="currentColor" d="M0 250C0 111.929 111.929 0 250 0h250v250c0 138.071-111.929 250-250 250S0 388.071 0 250Z"></path>
                            </svg>WEB DEVELOPMENT</a>
                    </h6>
                    <h6 class="marquee__item">
                        <a href="/immigration-and-residency-solutions#immigration-residency-solutions-residence-visa"> <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 500 500" fill="none" style="margin-left:-4px;width:34px;height:34px;display:inline-block;vertical-align:middle;margin-right:12px;position:relative;top:-2px;color:#EE4C01;">
                                <path fill="currentColor" d="M0 250C0 111.929 111.929 0 250 0h250v250c0 138.071-111.929 250-250 250S0 388.071 0 250Z"></path>
                            </svg>RESIDENCY SOLUTION</a>
                    </h6>
                    <h6 class="marquee__item">
                        <a href="/digital-marketing-and-brand-development#digital-marketing-brand-development-marketing-solutions"> <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 500 500" fill="none" style="margin-left:-4px;width:34px;height:34px;display:inline-block;vertical-align:middle;margin-right:12px;position:relative;top:-2px;color:#EE4C01;">
                                <path fill="currentColor" d="M0 250C0 111.929 111.929 0 250 0h250v250c0 138.071-111.929 250-250 250S0 388.071 0 250Z"></path>
                            </svg>MARKETING SOLUTION</a>
                    </h6>
                </div>
            </div>
        </section>
        <!-- marquee-area-end -->



        <!-- blog-post-area -->
        <section class="blog__post-area-five section-py-130">
            <div class="container site-content-gutter">
                <div class="row">
                    <div class="col-70 order-0 order-lg-2">
                        <div class="inner-blog-post-wrap">
                            <?php foreach ($pagedBlogPosts as $blogPost) : ?>
                                <?php include __DIR__ . '/partials/blog-post-card.php'; ?>
                            <?php endforeach; ?>
                        </div>
                        <?php if ($totalPages > 1) : ?>
                            <nav class="pagination__wrap mt-40">
                                <ul class="list-wrap">
                                    <?php for ($pageNumber = 1; $pageNumber <= $totalPages; $pageNumber++) : ?>
                                        <li<?php echo $pageNumber === $currentPage ? ' class="active"' : ''; ?>>
                                            <a href="<?php echo $pageNumber === 1 ? '/blog' : '/blog?page=' . $pageNumber; ?>"><?php echo $pageNumber; ?></a>
                                        </li>
                                    <?php endfor; ?>
                                </ul>
                            </nav>
                        <?php endif; ?>
                    </div>
                    <div class="col-30 blog-sidebar-column">
                        <aside class="blog__sidebar">
                            <?php include __DIR__ . '/partials/blog-sidebar-categories.php'; ?>
                            <?php include __DIR__ . '/partials/blog-sidebar-tags.php'; ?>
                            <?php include __DIR__ . '/partials/blog-recent-posts.php'; ?>
                        </aside>
                        <div class="blog-sidebar-sticky-slot">
                            <div class="blog-sidebar-sticky-inner">
                                <?php include __DIR__ . '/partials/sidebar-consultation-form.php'; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- blog-post-area-end -->

    </main>
    <!-- main-area-end -->

    <!-- footer-area -->
    <?php include __DIR__ . '/partials/footer.php'; ?>
    <?php include __DIR__ . '/partials/scripts.php'; ?>
    <script src="assets/js/blog-sticky-form.js"></script>
    <!-- footer-area-end -->

</body>

</html>
