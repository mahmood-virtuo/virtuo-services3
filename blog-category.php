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
        'image' => '/assets/img/bg/HEADER.webp',
        'heroImage' => '/assets/img/bg/HEADER.webp',
        'heroImageMobile' => '/assets/img/bg/HEADER-mobile.webp',
    );
    include __DIR__ . '/partials/seo.php';
    ?>
    <?php if (count($blogPosts) === 0) : ?>
        <meta name="robots" content="noindex, follow">
    <?php endif; ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/x-icon" href="/assets/img/favicon.png">
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/animate.min.css">
    <link rel="stylesheet" href="/assets/css/magnific-popup.css">
    <link rel="stylesheet" href="/assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="/assets/css/tg-flaticon.css">
    <link rel="stylesheet" href="/assets/css/swiper-bundle.min.css">
    <link rel="stylesheet" href="/assets/css/default.css">
    <link rel="stylesheet" href="/assets/css/default-icons.css">
    <link rel="stylesheet" href="/assets/css/odometer.css">
    <link rel="stylesheet" href="/assets/css/aos.css">
    <link rel="stylesheet" href="/assets/css/tg-cursor.css">
    <link rel="stylesheet" href="/assets/css/main.css">
</head>

<body class="blog-page">
    <?php include __DIR__ . '/partials/header.php'; ?>

    <main class="main-area fix">
        <section class="breadcrumb__area">
            <div class="breadcrumb__bg" data-background="/assets/img/bg/HEADER.webp" data-background-mobile="/assets/img/bg/HEADER-mobile.webp"></div>
            <div class="container site-content-gutter">
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

        <section class="blog__post-area-five section-py-130">
            <div class="container site-content-gutter">
                <div class="row">
                    <div class="col-70 order-0 order-lg-2">
                        <div class="inner-blog-post-wrap">
                            <div class="blog-taxonomy-intro mb-40">
                                <h2 class="title"><?php echo htmlspecialchars($categoryLabel, ENT_QUOTES, 'UTF-8'); ?></h2>
                                <p><?php echo htmlspecialchars($categoryDescription, ENT_QUOTES, 'UTF-8'); ?></p>
                            </div>

                            <?php if (count($blogPosts) > 0) : ?>
                                <?php foreach ($blogPosts as $blogPost) : ?>
                                    <?php include __DIR__ . '/partials/blog-post-card.php'; ?>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <p>No posts found.</p>
                            <?php endif; ?>
                        </div>
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
    </main>

    <?php include __DIR__ . '/partials/footer.php'; ?>
    <?php include __DIR__ . '/partials/scripts.php'; ?>
    <script src="/assets/js/blog-sticky-form.js"></script>
</body>

</html>
