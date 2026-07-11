<?php
$breadcrumbPageTitle = $breadcrumbPageTitle ?? '';
$breadcrumbPageUrl = $breadcrumbPageUrl ?? basename($_SERVER['PHP_SELF']);
$breadcrumbDefaultMain = $breadcrumbDefaultMain ?? '';
$breadcrumbDefaultSub = $breadcrumbDefaultSub ?? '';
?>

<!-- breadcrumb-area -->
<section class="breadcrumb__area">
    <div class="breadcrumb__bg" data-background="/assets/img/bg/HEADER.webp" style="background-size: cover; background-repeat: no-repeat;"></div>

    <div class="container site-content-gutter custom-container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb__content">
                    <h1 class="title"><?php echo htmlspecialchars($breadcrumbPageTitle); ?></h1>

                    <nav class="breadcrumb service-breadcrumb" data-page-title="<?php echo htmlspecialchars($breadcrumbPageTitle); ?>" data-page-url="<?php echo htmlspecialchars($breadcrumbPageUrl); ?>">

                        <span property="itemListElement" typeof="ListItem">
                            <a href="/">Home</a>
                        </span>

                        <span class="breadcrumb-separator">
                            <i class="fas fa-angle-right"></i>
                        </span>

                        <span property="itemListElement" typeof="ListItem">
                            <a href="<?php echo htmlspecialchars($breadcrumbPageUrl); ?>">
                                <?php echo htmlspecialchars($breadcrumbPageTitle); ?>
                            </a>
                        </span>

                        <span class="breadcrumb-separator js-service-breadcrumb-main-separator">
                            <i class="fas fa-angle-right"></i>
                        </span>

                        <span class="js-service-breadcrumb-main" property="itemListElement" typeof="ListItem" aria-current="page">
                            <?php echo htmlspecialchars($breadcrumbDefaultMain); ?>
                        </span>

                        <span class="breadcrumb-separator js-service-breadcrumb-sub-separator" style="<?php echo $breadcrumbDefaultSub !== '' ? '' : 'display: none;'; ?>">
                            <i class="fas fa-angle-right"></i>
                        </span>

                        <span class="js-service-breadcrumb-sub" property="itemListElement" typeof="ListItem" aria-current="page" style="<?php echo $breadcrumbDefaultSub !== '' ? '' : 'display: none;'; ?>"><?php echo htmlspecialchars($breadcrumbDefaultSub); ?></span>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- breadcrumb-area-end -->
