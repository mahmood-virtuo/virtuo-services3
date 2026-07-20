<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <?php
    $seoPage = array(
        'title' => 'About Virtuo | UAE Business Consultants',
        'description' => 'Learn about Virtuo, an Ajman Freezone partner helping UAE businesses with setup, PRO, residency, marketing and AI solutions today.',
        'path' => '/about',
        'type' => 'article',
        'breadcrumbTitle' => 'About Us',
        'schemaType' => 'AboutPage',
        'ogImage' => '/assets/img/og/home.jpg',
        'image' => '/assets/img/bg/HEADER.webp',
        'imageAlt' => 'Virtuo Services UAE business consultants',
        'heroImage' => '/assets/img/bg/HEADER.webp'
    );
    include __DIR__ . '/partials/seo.php';
    ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php include __DIR__ . '/partials/favicon.php'; ?>

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
    <?php
    $virtuoCssFamily = 'about';
    include __DIR__ . '/partials/main-styles.php';
    ?>
</head>

<body class="about-page">

    <?php include __DIR__ . '/partials/header.php'; ?>



    <!-- main-area -->
    <main class="main-area fix">


        <!-- breadcrumb-area -->
        <section class="breadcrumb__area">
            <div class="breadcrumb__bg" data-background="assets/img/bg/HEADER.webp"></div>
            <div class="container site-content-gutter custom-container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb__content">
                            <h1 class="title">About Us</h1>
                            <nav class="breadcrumb">
                                <span property="itemListElement" typeof="ListItem">
                                    <a href="/">Home</a>
                                </span>
                                <span class="breadcrumb-separator"><i class="fas fa-angle-right"></i></span>
                                <span property="itemListElement" typeof="ListItem">About us</span>
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


        <!-- about-area -->
        <section class="about__area section-py-130 about-intro-section">
            <div class="container site-content-gutter custom-container about-page-container">
                <div class="row align-items-center justify-content-center about-split-row">
                    <div class="col-lg-6 col-md-9 about-intro-media-column">
                        <div class="about__img-wrap">
                            <div>
                                <img src="assets/img/images/about_img01.webp" alt="About Img01" loading="eager" fetchpriority="high" decoding="async" width="713" height="755">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 about-intro-content-column">
                        <div class="about__content">
                            <div class="section__title mb-15">
                                <span class="sub-title">about Us</span>
                                <h2 class="title">Virtuo was created for <span class="about-heading-highlight">entrepreneurs, Investors, Freelancers, Professionals, and Families</span> who want to enter the UAE with clarity, confidence, and the right structure from day one.</h2>
                            </div>
                            <p>The UAE is one of the world’s fastest-growing business hubs, offering access to global markets, tax-efficient opportunities, residency options, banking, investment pathways, and a lifestyle built for ambition. But for many founders and foreign investors, the process can feel confusing: mainland or free zone, the right license activity, visa requirements, banking readiness, compliance, office options, relocation planning, and ongoing government procedures.</p>
                            <p>That is where Virtuo comes in.</p>
                            <p>We help simplify the UAE business setup and relocation journey by bringing key services together under one roof: company formation, structuring, PRO services, residency and visa support, banking preparation, compliance guidance, digital marketing, and AI-powered business solutions.</p>
                            <p>Our role is not just to process paperwork. Our role is to guide you toward the right decisions.</p>
                            <p>Whether you are launching a new company, expanding from America or another international market, relocating your family, applying for residency, setting up operations, or building your brand in the UAE, Virtuo helps you move forward with a clear plan and professional support at every step.</p>
                            <div class="about__content-bottom">
                                <a href="/contact" class="tg-btn tg-btn-three"> Build With Virtuo <img src="assets/img/icons/right_arrow.svg" alt="" class="injectable"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- about-area-end -->

        <!-- about-mission-vision-area -->
        <section class="about-mission-vision">
            <div class="container site-content-gutter custom-container about-page-container">
                <div class="about-mv-grid">

                    <article class="about-mv-card about-mv-card--vision" data-background="assets/img/images/our_mission.webp">
                        <div class="about-mv-card__content">
                            <h2 class="about-mv-card__title">Our Vision</h2>
                            <div class="about-mv-card__text">
                                <p>To become the trusted UAE market-entry partner for global entrepreneurs, helping them launch and structure their businesses with confidence.</p>
                                <p>We aim to empower businesses to relocate, grow, and succeed in one of the world's most forward-looking economies.</p>
                            </div>
                        </div>
                    </article>
                    <article class="about-mv-card about-mv-card--mission" data-background="assets/img/images/our_mission.webp">
                        <div class="about-mv-card__content">
                            <h2 class="about-mv-card__title">Our Mission</h2>
                            <div class="about-mv-card__text">
                                <p>Our mission is to make business setup, residency, and market entry in the UAE simpler, smarter, and more strategic for entrepreneurs, investors, and families.</p>
                                <p>We believe entering the UAE should not be overwhelming. With the right guidance, it can become one of the most important moves for your business, your wealth, and your future.</p>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </section>
        <!-- about-mission-vision-area-end -->

        <!-- about-story-area -->
        <section class="about-story-section">
            <div class="container site-content-gutter custom-container about-page-container">
                <div class="about-story-layout">
                    <div class="about-story-content">
                        <span class="about-story-label">OUR STORY</span>
                        <h2 class="title">Virtuo was founded with a practical understanding of what business owners actually need: <span class="about-story-highlight">Speed, Transparency, Structure, and Trusted Guidance.</span></h2>
                        <p>After years of building and exiting businesses in the American wireless industry and IT Asset Disposition space, our founder brought that real-world entrepreneurial experience to the UAE. Virtuo was built to help other founders avoid confusion, reduce delays, and make smarter decisions when entering one of the most dynamic markets in the world.</p>
                        <p>We understand the pressure of launching, relocating, opening bank accounts, building a brand, hiring support, and staying compliant. That is why our approach is built around clear advice, efficient execution, and long-term business readiness.</p>
                    </div>
                    <div>
                        <img src="/assets/img/about/about-story-dubai-office.webp" alt="Dubai business setup desk with Virtuo branding and skyline view" loading="lazy" decoding="async">
                    </div>
                </div>
            </div>
        </section>
        <!-- about-story-area-end -->

        <!-- marquee-area -->
        <?php include __DIR__ . '/partials/service-marquee.php'; ?>
        <!-- marquee-area-end -->

        <!-- 6th section -->

        <section id="home-about" class="about__area-four section-py-130 about-services-section">
            <div class="container site-content-gutter custom-container about-page-container">
                <div class="row align-items-center justify-content-center about-split-row">
                    <div class="col-lg-6 col-md-10 order-0 ">
                        <div class="about__img-four">
                            <div >
                                <div>
                                <img src="assets/img/images/virtuo_icon_about.webp" alt="About Img01" loading="lazy" decoding="async">
                                
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about__content-four">
                            <div class="section__title mb-20">
                                <span class="sub-title">Our Services</span>
                                <h2 class="title">What We Do</h2>
                            </div>
                            <p>Virtuo supports clients across five core areas:</p><br/>
                            <p class="about-service-name about-service-name--uppercase">UAE Business Formation, Structuring & Compliance</p>
                            <p>We help clients choose the right setup structure, whether mainland, free zone, or offshore, based on their business model, ownership goals, market access, visa needs, banking requirements, and long-term plans.</p><br/>
                            <p class="about-service-name about-service-name--uppercase">
                                Government Relations & PRO Services
                            </p>
                            <p>We manage key government processes, document handling, approvals, renewals, amendments, attestations, and corporate administration so clients can focus on building their business.</p><br/>
                            <p class="about-service-name">Immigration & Residency Solutions</p>
                            <p>We assist entrepreneurs, investors, professionals, and families with UAE residency pathways, visa support, Golden Visa guidance, dependent visas, and relocation requirements.</p><br/>
                            <p class="about-service-name">Digital Marketing & Brand Development</p>
                            <p>We help new and growing businesses build a credible market presence through brand strategy, website guidance, content, lead generation, and digital positioning.</p><br/>
                            <p class="about-service-name">AI Automation & Technology Solutions</p>
                            <p>We support businesses with practical AI and automation solutions designed to improve operations, save time, and create more efficient customer and internal workflows.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 6th Section Ends -->

        <!-- ------7th Section------- -->
        <section class="cta__area-five home-main-cta">
            <div class="container site-content-gutter custom-container about-page-container">
                <div class="row align-items-center">
                    <div class="col-xl-6 col-lg-5">
                        <div class="cta__content-five">
                            <h2 class="title">Start Your UAE Move With the Right Structure.</h2>
                            <p class="about-main-cta-copy">From business setup and residency to banking readiness, market entry, and relocation support, Virtuo helps entrepreneurs, investors, freelancers, and families enter the UAE with clarity.</p>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-7">
                        <div class="cta__content-right-two">
                            
                            <a href="https://wa.me/971565151315?text=Hi%20Virtuo!%20I'm%20interested%20in%20setting%20up%20a%20business%20in%20the%20UAE.%20I'd%20like%20to%20learn%20more%20about%20my%20options%20and%20schedule%20a%20free%20consultation" class="tg-btn tg-btn-four tg-btn-six tg-btn-lavender-2nd" target="_blank" rel="noopener" aria-label="Chat with Virtuo on WhatsApp">Get Expert Guidance
                                    <img src="/assets/img/icons/right_arrow.svg" alt="" class="injectable">
                                </a>
                        </div>
                    </div>
                </div>
            </div>


            


            <div class="cta__shape-wrap-two">
                <img src="assets/img/images/h7_cta_shape01.svg" alt="" aria-hidden="true">
                <img src="assets/img/images/h7_cta_shape02.svg" alt="" aria-hidden="true">
            </div>
        </section>
        <!-------7th Section Ends---- -->
        <!-- choose-area -->

        <section class="choose__area-five section-py-130 about-why-virtuo-section virtuo-eye-section">
            <div class="container site-content-gutter custom-container about-page-container">
                <div class="row align-items-center justify-content-between about-split-row">

                    <div class="col-xl-6 col-12 virtuo-eye-content-col">
                        <div class="choose__content-five about-why-virtuo-content">
                            <div class="section__title mb-15">
                                <h2 class="title">Why Virtuo</h2>
                            </div>
                            <p>Virtuo combines business setup expertise, PRO support, residency guidance, digital growth, and AI solutions in one integrated platform.</p>
                            <p>Clients choose Virtuo because we focus on more than forming a company. We focus on helping you build the right foundation.</p>
                            <p>We look at your goals, your business model, your banking needs, your visa requirements, your family situation, your market entry plan, and your long-term growth strategy. Then we help you move forward with a structure that makes sense.</p>
                            <p>Our approach is clear, professional, and practical.No unnecessary complications. No generic advice. No confusing process.Just the right guidance, the right setup, and the right support to help you build in the UAE with confidence.</p>
                        </div>
                    </div>
<div class="col-xl-5 col-12 virtuo-eye-media-col">
    <div class="choose__img-wrap-four about-eye-visual">
        <img
            src="assets/img/images/about_virtuo_eye.webp"
            alt="Client trust and business relationship visual"
            class="about-eye-img"
            data-aos="fade-left"
            data-aos-delay="200"
            loading="lazy"
            decoding="async"
            width="600"
            height="450"
        >
<div class="circle__wrap circle__wrap-two about-eye-badge" data-aos="zoom-in" data-aos-delay="600">
            <div class="icon">
                <img src="/assets/img/icons/Virtuo.svg" width="55" height="55" alt="" />
            </div>
            <div class="content">
                <h6 class="circle rotateme">VIRTUO • ESTABLISH • OPERATE • INNOVATE •</h6>
            </div>
        </div>
    </div>
</div>


                </div>
            </div>
        </section>
        <!-- choose-area-end -->

        <!-- marquee-area -->
        <?php include __DIR__ . '/partials/service-marquee.php'; ?>
        <!-- marquee-area-end -->

        <section class="virtuo-team section-py-130" aria-labelledby="virtuo-team-title">
            <div class="container site-content-gutter custom-container about-page-container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="section__title text-center mb-50">
                            <span class="sub-title">Expert Team</span>
                            <h2 class="title">Meet the Experts Behind Your Success</h2>
                        </div>
                    </div>
                </div>
                <div class="container site-content-gutter virtuo-team__container">
                    <div class="virtuo-team__intro">
                        <span class="sub-title">Core Team</span>
                        <h2 class="title" id="virtuo-team-title">Meet the Virtuo team</h2>
                    </div>
                    <div class="virtuo-team__grid">
                        <figure class="virtuo-team__member">
                            <img src="assets/img/team/jonaid.webp" alt="Jonaid" loading="lazy" decoding="async" width="300" height="329">
                            <figcaption>
                                <h3>Jonaid Ali Mohammad</h3>
                                <span>Business Consultant</span>
                                <div class="virtuo-team__social" aria-label="Jonaid Ali Mohammad social links">
                                    <a href="https://www.linkedin.com/in/jonaidamohammad" target="_blank" aria-label="Jonaid Ali Mohammad on LinkedIn" class="injectable">
                                    <svg xmlns="http://www.w3.org/2000/svg" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 512"><rect width="512" height="512" rx="115.61" ry="115.61"/><path fill="currentColor" d="M204.97 197.54h64.69v33.16h.94c9.01-16.16 31.04-33.16 63.89-33.16 68.31 0 80.94 42.51 80.94 97.81v116.92h-67.46l-.01-104.13c0-23.81-.49-54.45-35.08-54.45-35.12 0-40.51 25.91-40.51 52.72v105.86h-67.4V197.54zm-38.23-65.09c0 19.36-15.72 35.08-35.08 35.08-19.37 0-35.09-15.72-35.09-35.08 0-19.37 15.72-35.08 35.09-35.08 19.36 0 35.08 15.71 35.08 35.08zm-70.17 65.09h70.17v214.73H96.57V197.54z"/></svg>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                        <figure class="virtuo-team__member">
                            <img src="assets/img/team/hasan.webp" alt="Hasan" loading="lazy" decoding="async" width="300" height="329">
                            <figcaption>
                                <h3>Hasan Rauf</h3>
                                <span>Technology Advisor</span>
                                <div class="virtuo-team__social" aria-label="Hasan Rauf social links">
                                    <a href="https://www.linkedin.com/company/virtuouae/" target="_blank" aria-label="Hasan Rauf on LinkedIn" class="injectable">
                                        <svg xmlns="http://www.w3.org/2000/svg" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 509.64"><rect width="512" height="509.64" rx="115.61" ry="115.61"/><path fill="currentColor" d="M204.97 197.54h64.69v33.16h.94c9.01-16.16 31.04-33.16 63.89-33.16 68.31 0 80.94 42.51 80.94 97.81v116.92h-67.46l-.01-104.13c0-23.81-.49-54.45-35.08-54.45-35.12 0-40.51 25.91-40.51 52.72v105.86h-67.4V197.54zm-38.23-65.09c0 19.36-15.72 35.08-35.08 35.08-19.37 0-35.09-15.72-35.09-35.08 0-19.37 15.72-35.08 35.09-35.08 19.36 0 35.08 15.71 35.08 35.08zm-70.17 65.09h70.17v214.73H96.57V197.54z"/></svg>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                        <figure class="virtuo-team__member">
                            <img src="assets/img/team/affan.webp" alt="Affan" loading="lazy" decoding="async" width="300" height="338">
                            <figcaption>
                                <h3>Mohammad Affan</h3>
                                <span>Public Relations Manager</span>
                                <div class="virtuo-team__social" aria-label="Mohammad Affan social links">
                                    <a href="https://www.linkedin.com/in/mohammadaffan20" target="_blank" aria-label="Mohammad Affan on LinkedIn">
                                        <svg xmlns="http://www.w3.org/2000/svg" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 509.64"><rect width="512" height="509.64" rx="115.61" ry="115.61"/><path fill="currentColor" d="M204.97 197.54h64.69v33.16h.94c9.01-16.16 31.04-33.16 63.89-33.16 68.31 0 80.94 42.51 80.94 97.81v116.92h-67.46l-.01-104.13c0-23.81-.49-54.45-35.08-54.45-35.12 0-40.51 25.91-40.51 52.72v105.86h-67.4V197.54zm-38.23-65.09c0 19.36-15.72 35.08-35.08 35.08-19.37 0-35.09-15.72-35.09-35.08 0-19.37 15.72-35.08 35.09-35.08 19.36 0 35.08 15.71 35.08 35.08zm-70.17 65.09h70.17v214.73H96.57V197.54z"/></svg>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                        <figure class="virtuo-team__member">
                            <img src="assets/img/team/junaid.webp" alt="Junaid" loading="lazy" decoding="async" width="300" height="338">
                            <figcaption>
                                <h3>Junaid Mahmood</h3>
                                <span>Sr. IT Developer</span>
                                <div class="virtuo-team__social" aria-label="Junaid Mahmood social links">
                                    <a href="https://www.linkedin.com/company/virtuouae/" target="_blank" aria-label="Junaid Mahmood on LinkedIn" class="injectable">
                                        <svg xmlns="http://www.w3.org/2000/svg" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 509.64"><rect width="512" height="509.64" rx="115.61" ry="115.61"/><path fill="currentColor" d="M204.97 197.54h64.69v33.16h.94c9.01-16.16 31.04-33.16 63.89-33.16 68.31 0 80.94 42.51 80.94 97.81v116.92h-67.46l-.01-104.13c0-23.81-.49-54.45-35.08-54.45-35.12 0-40.51 25.91-40.51 52.72v105.86h-67.4V197.54zm-38.23-65.09c0 19.36-15.72 35.08-35.08 35.08-19.37 0-35.09-15.72-35.09-35.08 0-19.37 15.72-35.08 35.09-35.08 19.36 0 35.08 15.71 35.08 35.08zm-70.17 65.09h70.17v214.73H96.57V197.54z"/></svg>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                        <figure class="virtuo-team__member">
                            <img src="assets/img/team/zayn.webp" alt="Zayn" loading="lazy" decoding="async" width="300" height="338">
                            <figcaption>
                                <h3>Zayn Ali</h3>
                                <span>Sr. Product Designer</span>
                                <div class="virtuo-team__social" aria-label="Zayn Ali social links">
                                    <a href="https://www.linkedin.com/company/virtuouae/" target="_blank" aria-label="Zayn Ali on LinkedIn">
                                        <svg xmlns="http://www.w3.org/2000/svg" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 509.64"><rect width="512" height="509.64" rx="115.61" ry="115.61"/><path fill="currentColor" d="M204.97 197.54h64.69v33.16h.94c9.01-16.16 31.04-33.16 63.89-33.16 68.31 0 80.94 42.51 80.94 97.81v116.92h-67.46l-.01-104.13c0-23.81-.49-54.45-35.08-54.45-35.12 0-40.51 25.91-40.51 52.72v105.86h-67.4V197.54zm-38.23-65.09c0 19.36-15.72 35.08-35.08 35.08-19.37 0-35.09-15.72-35.09-35.08 0-19.37 15.72-35.08 35.09-35.08 19.36 0 35.08 15.71 35.08 35.08zm-70.17 65.09h70.17v214.73H96.57V197.54z"/></svg>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </div>
                </div>
            </div>
        </section>

        <!-- team-area-end -->
        <!-- team-area-end -->
        <!-- marquee-area -->
        <?php
        $serviceMarqueeVariant = 'plain';
        include __DIR__ . '/partials/service-marquee.php';
        unset($serviceMarqueeVariant);
        ?>
        <!-- marquee-area-end -->

        <!-- brand-area-end -->
        <?php include __DIR__ . '/partials/sections/built-entrepreneurs.php'; ?>

    </main>
    <!-- main-area-end -->
                            <!-- cta-area -->
        
        <!-- cta-area-end -->
    <!-- footer-area -->
    <?php include __DIR__ . '/partials/footer.php'; ?>
    <?php include __DIR__ . '/partials/scripts.php'; ?>
    <!-- footer-area-end -->






</body>

</html>
