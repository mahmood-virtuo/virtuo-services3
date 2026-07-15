<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <?php
    $seoPage = array(
        'title' => 'UAE Business Setup & Consulting Services | Virtuo ',
        'description' => 'Virtuo helps UAE businesses establish, operate and scale with company formation, PRO services, visas, marketing and AI automation.',
        'path' => '/',
        'type' => 'website',
        'breadcrumbTitle' => 'Home',
        'schemaType' => 'WebPage',
        'ogImage' => '/assets/img/og/home.jpg',
        'image' => '/assets/img/slider/1st.webp',
        'imageAlt' => 'Virtuo Services UAE business setup and consultancy',
        'heroImage' => '/assets/img/slider/1st.webp',
        'heroImageMobile' => '/assets/img/slider/1st-mobile.webp'
    );
    include __DIR__ . '/partials/seo.php';
    require_once __DIR__ . '/partials/blog-taxonomy.php';
    $blogPosts = virtuo_get_blog_posts();

    function virtuo_truncate_text($text, $limit = 40) {
        $text = trim($text);

        if (function_exists('mb_strlen') && function_exists('mb_substr')) {
            if (mb_strlen($text, 'UTF-8') <= $limit) {
                return $text;
            }

            return rtrim(mb_substr($text, 0, $limit, 'UTF-8')) . '...';
        }

        if (strlen($text) <= $limit) {
            return $text;
        }

        return rtrim(substr($text, 0, $limit)) . '...';
    }
    ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php include __DIR__ . '/partials/favicon.php'; ?>
    <?php $loadSwiperAssets = true; ?>

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

<body class="home-page">

    <?php include __DIR__ . '/partials/header.php'; ?>


    <!-- main-area -->
    <div class="main-area fix">


        <!-- slider-area -->
        <section class="slider__area">
            <div class="swiper-container slider-active">
                <div class="swiper-wrapper">
                    <div class="swiper-slide slider__bg hero-image-styles" data-background="assets/img/slider/1st.webp" data-background-mobile="assets/img/slider/1st-mobile.webp">
                        <div class="container site-content-gutter custom-container">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="slider__content">
                                        <h1 class="title">Build Your Business On a <span style="color: var(--tg-theme-primary)">Strong Foundation</span></h1>
                                        <p>We provide end-to-end company formation and corporate structuring solutions across the UAE, specializing in Mainland, Free Zone, and Offshore setups. From licensing and compliance to ongoing corporate support, we help businesses launch and grow with confidence.</p>
                                        <a href="/about" class="tg-btn tg-btn-four">Learn more <img src="assets/img/icons/right_arrow02.svg" alt="" class="injectable"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide slider__bg hero-image-styles" data-lazy-background="assets/img/slider/2nd.webp" data-lazy-background-mobile="assets/img/slider/2nd-mobile.webp">
                        <div class="container site-content-gutter custom-container">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="slider__content">
                                        <h2 class="title">Navigating <span style="color: var(--tg-theme-primary)">Government Processes</span>, Seamlessly</h2>
                                        <p>Our dedicated PRO specialists manage government approvals, document processing, labor and immigration requirements, and regulatory procedures, ensuring your business remains compliant and operational without administrative burdens.</p>
                                        <a href="/about" class="tg-btn tg-btn-four">Learn More <img src="assets/img/icons/right_arrow02.svg" alt="" class="injectable"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide slider__bg hero-image-styles" data-lazy-background="assets/img/slider/3rd.webp" data-lazy-background-mobile="assets/img/slider/3rd-mobile.webp">
                        <div class="container site-content-gutter custom-container">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="slider__content">
                                        <h2 class="title">Your <span style="color: var(--tg-theme-primary)">Pathway to Living and Working</span> in the UAE</h2>
                                        <p>We offer comprehensive immigration and residency services, assisting individuals, families, and businesses with visa applications, residency permits, sponsorships, and related government procedures through a streamlined process.</p>
                                        <a href="/about" class="tg-btn tg-btn-four">Learn More <img src="assets/img/icons/right_arrow02.svg" alt="" class="injectable"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide slider__bg hero-image-styles" data-lazy-background="assets/img/slider/4th.webp" data-lazy-background-mobile="assets/img/slider/4th-mobile.webp">
                        <div class="container site-content-gutter custom-container">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="slider__content">
                                        <h2 class="title">Turning Visibility into <span style="color: var(--tg-theme-primary)">Measurable Growth</span></h2>
                                        <p>We help businesses strengthen their digital presence through strategic marketing, branding, content creation, social media management, performance advertising, and lead generation campaigns designed to drive sustainable growth.</p>
                                        <a href="/about" class="tg-btn tg-btn-four">Learn More <img src="assets/img/icons/right_arrow02.svg" alt="" class="injectable"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide slider__bg hero-image-styles" data-lazy-background="assets/img/slider/5th.webp" data-lazy-background-mobile="assets/img/slider/5th-mobile.webp">
                        <div class="container site-content-gutter custom-container">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="slider__content">
                                        <h2 class="title">Empowering Businesses Through <span style="color: var(--tg-theme-primary)">Intelligent Automation</span></h2>
                                        <p>Leverage the power of artificial intelligence to optimize operations, automate workflows, enhance customer experiences, and improve decision-making with tailored technology solutions built for modern businesses.</p>
                                        <a href="/about" class="tg-btn tg-btn-four">Learn More <img src="assets/img/icons/right_arrow02.svg" alt="" class="injectable"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="slider__nav slider__bar-pagination"></div>
            <?php
            $scrollTarget = '#home-about';
            $scrollLabel = 'Scroll to who we are section';
            $scrollText = '';
            include __DIR__ . '/partials/scroll-down.php';
            ?>
        </section>
        <!-- slider-area-end -->

        <!-- marquee-area -->
        <?php include __DIR__ . '/partials/service-marquee.php'; ?>



        <!-- marquee-area-end -->

        <!-- 2nd section -->

        <section id="home-about" class="about__area-four section-py-130">
            <div class="container site-content-gutter custom-container home-page-container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-lg-6 col-md-10 order-0 order-lg-2">
                        <div class="about__img-four">
                            <div class="about__mask-img">
                                <img src="assets/img/images/h4_about_img.webp" alt="Business consultants discussing company formation in Dubai" loading="lazy" decoding="async" width="623" height="566">
                            </div>
                            <div class="shape">
                                <img src="assets/img/images/h4_about_shape.svg" alt="" aria-hidden="true" class="alltuchtopdown">
                            </div>

                            <div class="circle__wrap circle__wrap-two" data-aos="zoom-in" data-aos-delay="600" style="left: auto; right: -291px; top:-159px;">
                                <div class="icon" style="background-color: #564ABE; height: 100px; width: 100px;">
                                    
                                    <img src="/assets/img/icons/Virtuo.svg" width="55" height="55" alt="" style="rotate: 25deg;" />
                                </div>
                                <div class="content">
                                    <h6 class="circle rotateme">VIRTUO • ESTABLISH • OPERATE • INNOVATE •</h6>
                                </div>
                            </div>


                            <!-- </div> -->
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about__content-four">
                            <div class="section__title mb-20">
                                <span class="sub-title">Who we are</span>
                                <h2 class="title">Building A Business In The UAE <strong>Shouldn't Feel Like</strong> Managing Five Different Companies.</h2>
                            </div>
                            <p style="margin-bottom:-20px !important; color: #EE4C01; text-transform: uppercase;">FOR MANY ENTREPRENURS, IT DOES</p><br>


                            <p>
                                One company handles incorporation. Another manages visas. A third takes care of
                                government paperwork. Marketing lives somewhere else. Technology becomes yet
                                another relationship to manage.

                                Before long, you're spending more time coordinating providers than building
                                your business.
                            </p>

                            <p style="
                                   margin-top: 10px;
                                   margin-bottom: 20px !important;
                                   color: #ee4c01;
                                   text-transform: uppercase;
                            ">
                                That's why Virtuo was built differently.
                            </p>

                            <p>
                                We bring together company formation, PRO services, residency solutions,
                                marketing, and AI-powered technology into one integrated ecosystem designed to
                                support businesses from launch to long-term growth.

                                From your first trade license to your next phase of expansion, we're built to
                                be more than a service provider.
                            </p>

                            <p style="margin-top: 10px; margin-bottom: 10px; color: #ee4c01">
                                <i><b>We're built to become part of your team.</b></i>
                            </p>

                            <p>
                                <b>One Team. One Relationship. Every Solution Under One Roof.</b>
                            </p>

                            <a href="/contact" class="tg-btn tg-btn-three"> Build With Virtuo <img src="assets/img/icons/right_arrow.svg" alt="" class="injectable"></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="about__shape-two">
                <img src="assets/img/images/h4_about_shape01.svg" alt="" aria-hidden="true">
            </div>
        </section>

        <!-- 2nd Section Ends -->

        <!-- 3rd Section -->

        <!-- marquee-area -->
        

        <section class="cta__area-five home-main-cta">
            <div class="container site-content-gutter custom-container home-page-container">
                <div class="row align-items-center">
                    <div class="col-xl-6 col-lg-5">
                        <div class="cta__content-five">
                            <h2 class="title">Start Your UAE Move With the Right Structure.</h2>
                            <p style="color:white;">From business setup and residency to banking readiness, market entry, and relocation support, Virtuo helps entrepreneurs, investors, freelancers, and families enter the UAE with clarity.</p>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-7">
                        <div class="cta__content-right-two">
                            
                            <a href="https://wa.me/971565151315" class="tg-btn tg-btn-four tg-btn-six tg-btn-lavender-2nd" target="_blank" rel="noopener" aria-label="Chat with Virtuo on WhatsApp">Get Expert Guidance
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
        <!-- marquee-area-end -->




        <!-- 3rd Section Ends -->



        <!-- choose-area -->

        <section class="choose__area-five section-py-130 virtuo-eye-section">
            <div class="container site-content-gutter custom-container home-page-container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-lg-5 col-12 virtuo-eye-media-col">
                        <div class="choose__img-wrap-four virtuo-eye-visual" style="position: relative;">
                            <img src="assets/img/images//about_virtuo_eye.webp" alt="Client trust and business relationship visual" data-aos="fade-left" data-aos-delay="200" style="width: 100%; height: auto; padding-left: 0px !important;" loading="lazy" decoding="async" width="600" height="450">
                            
                            <div class="circle__wrap circle__wrap-two" data-aos="zoom-in" data-aos-delay="600" style="left: auto; right: -80px; top:-63px;">
                                <div class="icon" style="background-color: #564ABE; height: 100px; width: 100px;">
                                    
                                    <img src="/assets/img/icons/Virtuo.svg" width="55" height="55" alt="" style="rotate: 25deg;" />
                                </div>
                                <div class="content">
                                    <h6 class="circle rotateme">VIRTUO • ESTABLISH • OPERATE • INNOVATE •</h6>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-12 virtuo-eye-content-col">
                        <div class="choose__content-five virtuo-eye-content" style="max-width: auto; margin-left: -21px;">
                            <div class="section__title mb-15">
                                <span class="sub-title">Why Choose us</span>
                                <h2 class="title">Businesses Don't <span style="font-weight: 400;"><i>Grow On Paper</i></span>. They Grow On Trust.</h2>
                            </div>
                            <p style="margin-bottom:10px !important; color: #EE4C01; text-transform: uppercase;">Anyone can process paperwork.</p>

                            <p>What clients remember—and what ultimately determines the success of a long-term relationship—is how they're treated along the way.

                            <p style="margin-bottom:10px !important; margin-top: -25px;">At Virtuo, we believe that business owners deserve more than generic support and one-size-fits-all solutions. They deserve a team that listens, communicates clearly, and takes ownership from start to finish.

                                That's why we've built our approach around responsiveness, transparency, and accountability. Every client engagement is handled with the same level of care and attention we would expect for our own businesses. </p>
                            <p style="margin-bottom:10px !important; color: #EE4C01; text-transform: uppercase;">Deadlines matter. Communication matters. Trust matters.</p>


                            <p style="margin-bottom:10px !important; margin-top: 0px;">Whether we're helping a founder launch their first venture, supporting an established company with compliance, or implementing solutions to help a business grow, we approach every relationship with the same commitment—to deliver reliable advice, responsive service, and results that create lasting value.</p>

                            <p style="margin-bottom:10px !important; margin-top: 10px; color: #EE4C01;"><b><i>Because in the end, exceptional service isn't about promises.</i></b></p>

                            <p><b>It's about being the team people trust when something important needs to get done.</b></p>
                        </div>
                    </div>


                </div>
            </div>
        </section>
            <section
  class="section-py-130 home-services-section"
  style="background-repeat: no-repeat; background-size: cover; background-image: url('assets/img/images/virtuo-footer-gradient-1920x908.webp');"
  data-background="assets/img/images/virtuo-footer-gradient-1920x908.webp"
>
            <div class="container site-content-gutter custom-container home-page-container">
                <div class="row justify-content-center">
                    <div class="col-xl-5 col-lg-8">
                        <div class="section__title white-title text-center mb-50">
                            <span class="sub-title" style="color: #EE4c01">Core Services</span>
                            <h2 class="title">Expert Solutions for Accelerated Business Growth</h2>
                        </div>
                    </div>
                </div>
                <div class="services__item-wrap-two">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="itemOne-tab" data-bs-toggle="tab" data-bs-target="#itemOne-tab-pane" type="button" role="tab" aria-controls="itemOne-tab-pane" aria-selected="true">
                                <span class="content__left">
                                    <strong>UAE Business Formation, <br>Structuring & Compliance</strong>
                                </span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="14" viewBox="0 0 22 14" fill="none">
                                    <path d="M1 7H21M21 7L15.1421 1.14214M21 7L15.1421 12.8579" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="itemTwo-tab" data-bs-toggle="tab" data-bs-target="#itemTwo-tab-pane" type="button" role="tab" aria-controls="itemTwo-tab-pane" aria-selected="false">
                                <span class="content__left">
                                    <strong>Government Relations<br /> & PRO Services</strong>
                                </span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="14" viewBox="0 0 22 14" fill="none">
                                    <path d="M1 7H21M21 7L15.1421 1.14214M21 7L15.1421 12.8579" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="itemThree-tab" data-bs-toggle="tab" data-bs-target="#itemThree-tab-pane" type="button" role="tab" aria-controls="itemThree-tab-pane" aria-selected="false">
                                <span class="content__left">
                                    <strong>Immigration & Residency<br /> Solutions</strong>
                                </span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="14" viewBox="0 0 22 14" fill="none">
                                    <path d="M1 7H21M21 7L15.1421 1.14214M21 7L15.1421 12.8579" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="itemFour-tab" data-bs-toggle="tab" data-bs-target="#itemFour-tab-pane" type="button" role="tab" aria-controls="itemFour-tab-pane" aria-selected="false">
                                <span class="content__left">
                                    <strong>Digital Marketing &<br /> Brand Development</strong>
                                </span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="14" viewBox="0 0 22 14" fill="none">
                                    <path d="M1 7H21M21 7L15.1421 1.14214M21 7L15.1421 12.8579" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="itemFive-tab" data-bs-toggle="tab" data-bs-target="#itemFive-tab-pane" type="button" role="tab" aria-controls="itemFive-tab-pane" aria-selected="false">
                                <span class="content__left">
                                    <strong>AI Automation & Technology<br /> Solutions</strong>
                                </span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="14" viewBox="0 0 22 14" fill="none">
                                    <path d="M1 7H21M21 7L15.1421 1.14214M21 7L15.1421 12.8579" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="itemOne-tab-pane" role="tabpanel" aria-labelledby="itemOne-tab" tabindex="0">
                            <div class="services__item-nine shine__animate-item">
                                <div class="services__thumb-seven shine__animate-link">
                                    <a href="/uae-business-formation-structuring-and-compliance"><img src="assets/img/services/h8_services_img011.webp" alt="UAE business formation consultants" loading="lazy" decoding="async" width="726" height="400"></a>
                                </div>
                                <div class="services__content-nine">
                                    <h2 class="title"><a href="/uae-business-formation-structuring-and-compliance">UAE Business Formation, Structuring & Compliance</a></h2>
                                    <p>Establish your business with the right structure, licensing, and regulatory framework for long-term success.</p>
                                    <a href="/uae-business-formation-structuring-and-compliance" class="tg-btn tg-btn-four"><img src="assets/img/icons/right_arrow02.svg" alt="" class="injectable"></a>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="itemTwo-tab-pane" role="tabpanel" aria-labelledby="itemTwo-tab" tabindex="0">
                            <div class="services__item-nine shine__animate-item">
                                <div class="services__thumb-seven shine__animate-link">
                                    <a href="/government-relations-and-pro-services"><img src="assets/img/services/h8_services_img022.webp" alt="Government relations and PRO services support" loading="lazy" decoding="async" width="726" height="400"></a>
                                </div>
                                <div class="services__content-nine">
                                    <h2 class="title"><a href="/government-relations-and-pro-services">Government Relations & PRO Services</a></h2>
                                    <p>Simplify approvals, renewals, document processing, and corporate administration through dedicated PRO support.</p>
                                    <a href="/government-relations-and-pro-services" class="tg-btn tg-btn-four"><img src="assets/img/icons/right_arrow02.svg" alt="" class="injectable"></a>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="itemThree-tab-pane" role="tabpanel" aria-labelledby="itemThree-tab" tabindex="0">
                            <div class="services__item-nine shine__animate-item">
                                <div class="services__thumb-seven shine__animate-link">
                                    <a href="/immigration-and-residency-solutions"><img src="assets/img/services/h8_services_img03.webp" alt="UAE immigration and residency services" loading="lazy" decoding="async" width="726" height="400"></a>
                                </div>
                                <div class="services__content-nine">
                                    <h2 class="title"><a href="/immigration-and-residency-solutions">Immigration & Residency Solutions</a></h2>
                                    <p>Comprehensive visa and residency services for entrepreneurs, investors, executives, employees, and families.</p>
                                    <a href="/immigration-and-residency-solutions" class="tg-btn tg-btn-four"><img src="assets/img/icons/right_arrow02.svg" alt="" class="injectable"></a>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="itemFour-tab-pane" role="tabpanel" aria-labelledby="itemFour-tab" tabindex="0">
                            <div class="services__item-nine shine__animate-item">
                                <div class="services__thumb-seven shine__animate-link">
                                    <a href="/digital-marketing-and-brand-development"><img src="assets/img/services/h8_services_img01.webp" alt="Digital marketing and brand development team" loading="lazy" decoding="async" width="726" height="400"></a>
                                </div>
                                <div class="services__content-nine">
                                    <h2 class="title"><a href="/digital-marketing-and-brand-development">Digital Marketing & Brand Development</a></h2>
                                    <p>Build your presence, generate leads, and grow your brand through strategic marketing and digital solutions.</p>
                                    <a href="/digital-marketing-and-brand-development" class="tg-btn tg-btn-four"><img src="assets/img/icons/right_arrow02.svg" alt="" class="injectable"></a>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="itemFive-tab-pane" role="tabpanel" aria-labelledby="itemFive-tab" tabindex="0">
                            <div class="services__item-nine shine__animate-item">
                                <div class="services__thumb-seven shine__animate-link">
                                    <a href="/ai-automation-and-technology-solutions"><img src="assets/img/services/h8_services_img02.webp" alt="AI automation and technology solutions" loading="lazy" decoding="async" width="726" height="400"></a>
                                </div>
                                <div class="services__content-nine">
                                    <h2 class="title"><a href="/ai-automation-and-technology-solutions">AI Automation & Technology Solutions</a></h2>
                                    <p>Leverage AI, automation, and modern technology to improve efficiency, reduce costs, and scale intelligently.</p>
                                    <a href="/ai-automation-and-technology-solutions" class="tg-btn tg-btn-four"><img src="assets/img/icons/right_arrow02.svg" alt="" class="injectable"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- services-area-end -->
        <!-- marquee-area -->
        <?php
        $serviceMarqueeVariant = 'plain';
        $serviceMarqueeExtraClass = 'home-core-services-marquee';
        include __DIR__ . '/partials/service-marquee.php';
        unset($serviceMarqueeVariant, $serviceMarqueeExtraClass);
        ?>
       
        <!-- cta-area-end -->
        
        <?php include __DIR__ . '/partials/sections/built-entrepreneurs.php'; ?>

        <!-- blog-post-area -->
        <section class="blog__post-area-six section-py-130">
            <div class="container site-content-gutter custom-container home-page-container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-8">
                        <div class="section__title text-center mb-50">
                            <span class="sub-title">Our Latest Blogs</span>
                            <h2 class="title">Our expert team will help you to Grow Business</h2>
                        </div>
                    </div>
                </div>
                <div class="row gutter-y-30 justify-content-center">
                    <?php foreach (array_slice($blogPosts, 0, 3) as $blogPost) : ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="blog__post-item shine__animate-item">
                            <div class="blog__post-thumb shine__animate-link">
                                <a href="<?php echo htmlspecialchars($blogPost['url'], ENT_QUOTES, 'UTF-8'); ?>"><img src="<?php echo htmlspecialchars($blogPost['image'], ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($blogPost['alt'], ENT_QUOTES, 'UTF-8'); ?>" loading="lazy" decoding="async" width="900" height="643"></a>
                                <div class="blog__post-date-two">
                                    <span>
                                        <img src="assets/img/icons/calendar.svg" alt="" class="injectable"> <?php echo htmlspecialchars($blogPost['date'], ENT_QUOTES, 'UTF-8'); ?>
                                    </span>
                                </div>
                            </div>
                            <div class="blog__post-content">
                                <a href="<?php echo htmlspecialchars(virtuo_blog_get_category_url($blogPost['category']), ENT_QUOTES, 'UTF-8'); ?>" class="blog__post-tag"><?php echo htmlspecialchars(virtuo_blog_get_category_label($blogPost['category']), ENT_QUOTES, 'UTF-8'); ?></a>
                                <h2 class="title"><a href="<?php echo htmlspecialchars($blogPost['url'], ENT_QUOTES, 'UTF-8'); ?>" title="<?php echo htmlspecialchars($blogPost['detail_title'], ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars(virtuo_truncate_text($blogPost['detail_title'], 33), ENT_QUOTES, 'UTF-8'); ?></a></h2>
                                <div class="blog__post-author">
                                    <a href="<?php echo htmlspecialchars($blogPost['url'], ENT_QUOTES, 'UTF-8'); ?>"><img src="<?php echo htmlspecialchars($blogPost['author_image'], ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($blogPost['author'], ENT_QUOTES, 'UTF-8'); ?> author portrait" loading="lazy" decoding="async" width="100" height="100"></a>
                                    <span>By <a href="<?php echo htmlspecialchars($blogPost['url'], ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($blogPost['author'], ENT_QUOTES, 'UTF-8'); ?></a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    </div>
    <!-- </main> -->
    <?php include __DIR__ . '/partials/footer.php'; ?>
    <?php include __DIR__ . '/partials/scripts.php'; ?>









</body>

</html>
<!-- ------For OG Images Names For Social Media Sharing------ -->
<!-- assets/img/og/
  home.jpg
  about.jpg
  uae-business-formation.jpg
  pro-services.jpg
  immigration-residency.jpg
  digital-marketing.jpg
  ai-automation.jpg
  contact.jpg
  blog.jpg
  blog-post-example.jpg -->
  <!-- ------------For Favicons------------- -->
