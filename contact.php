<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <?php
    $seoPage = array(
        'title' => 'Contact Virtuo | Get a Free Consultation in the UAE',
        'description' => 'Contact Virtuo, in Ajman Freezone for UAE company formation, PRO services, visas, digital marketing and AI automation support.',
        'path' => '/contact',
        'type' => 'article',
        'breadcrumbTitle' => 'Contact Us',
        'schemaType' => 'ContactPage',
        'ogImage' => '/assets/img/og/home.jpg',
        'image' => '/assets/img/bg/HEADER.webp',
        'imageAlt' => 'Contact Virtuo Services in the UAE',
        'heroImage' => '/assets/img/bg/HEADER.webp',
        'heroImageMobile' => '/assets/img/bg/HEADER-mobile.webp'
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
    <link rel="stylesheet" href="<?php echo htmlspecialchars(virtuo_asset_url('assets/css/swiper-bundle.min.css'), ENT_QUOTES, 'UTF-8'); ?>">
    <link rel="stylesheet" href="<?php echo htmlspecialchars(virtuo_asset_url('assets/css/default.css'), ENT_QUOTES, 'UTF-8'); ?>">
    <link rel="stylesheet" href="<?php echo htmlspecialchars(virtuo_asset_url('assets/css/default-icons.css'), ENT_QUOTES, 'UTF-8'); ?>">
    <link rel="stylesheet" href="<?php echo htmlspecialchars(virtuo_asset_url('assets/css/odometer.css'), ENT_QUOTES, 'UTF-8'); ?>">
    <link rel="stylesheet" href="<?php echo htmlspecialchars(virtuo_asset_url('assets/css/aos.css'), ENT_QUOTES, 'UTF-8'); ?>">
    <link rel="stylesheet" href="<?php echo htmlspecialchars(virtuo_asset_url('assets/css/tg-cursor.css'), ENT_QUOTES, 'UTF-8'); ?>">
    <link rel="stylesheet" href="<?php echo htmlspecialchars(virtuo_asset_url('assets/css/main.css'), ENT_QUOTES, 'UTF-8'); ?>">
</head>

<body class="contact-page">

    <!-- header-area -->
    <?php include __DIR__ . '/partials/header.php'; ?>

    <!-- header-area-end -->



    <!-- main-area -->
    <main class="main-area fix">


        <!-- breadcrumb-area -->
        <section class="breadcrumb__area">
            <div class="breadcrumb__bg" data-background="assets/img/bg/HEADER.webp" style="background-size:cover; background-repeat: no-repeat;"></div>
            <div class="container site-content-gutter custom-container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb__content">
                            <h1 class="title">Contact</h1>
                            <nav class="breadcrumb">
                                <span property="itemListElement" typeof="ListItem">
                                    <a href="/">Home</a>
                                </span>
                                <span class="breadcrumb-separator"><i class="fas fa-angle-right"></i></span>
                                <span property="itemListElement" typeof="ListItem">Contact</span>
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


         <!-- ------End New Code------ -->
        <!-- contact-area -->
        <section class="contact-page-form-section contact-figma-section">
            <div class="container site-content-gutter custom-container">
                <div class="contact-figma-panel">
                    <div class="contact-figma-main">
                        <div class="contact-figma-content">
                            <h2 class="contact-figma-title">Let's Start the Conversation</h2>
                            <p class="contact-figma-copy">Whether you're starting a business, expanding your operations, or seeking expert business support, our team is here to provide tailored solutions. Fill out the form below, and we'll get back to you promptly.</p>

                            <div class="contact-figma-details">
                                <a href="tel:+971565151315" class="contact-figma-detail">
                                    <span class="contact-figma-detail__icon"><img style="height: 18px; width: 18px; margin-top: 3px;" src="/assets/img/icons/footer-phone.svg" alt="" aria-hidden="true"></span>
                                    <span>+971 56 515 1315</span>
                                </a>
                                <a href="mailto:info@virtuo.ae" class="contact-figma-detail">
                                    <span class="contact-figma-detail__icon"><img style="height: 18px; width: 18px; margin-top: 3px;" src="/assets/img/icons/footer-mail.svg" alt="" aria-hidden="true"></span>
                                    <span>info@virtuo.ae</span>
                                </a>
                                <a class="contact-figma-detail contact-figma-detail--address">
                                    <span class="contact-figma-detail__icon"><img style="height: 18px; width: 18px; margin-top: 8px;" src="/assets/img/icons/footer-location.svg" alt="" aria-hidden="true"></span>
                                    <span>Office - BLV - 6F - SF60959<br>A Building - Ajman Blvd, Ajman Freezone<br>Sheikh Rashid Bin Saeed Al Maktoum St.<br>Ajman, United Arab Emirates</span>
                                </a>
                            </div>

                            <div class="footer-reference-left__social contact-figma-social">
                                <span>Follow Us :</span><br/><br/>
                                <a href="https://www.linkedin.com/in/jonaidamohammad" target="_blank" rel="noopener" aria-label="LinkedIn">
                                    <img src="/assets/img/icons/linkedin-icon.svg" class="my-social-links" alt="" aria-hidden="true">
                                </a>
                                <a href="https://www.instagram.com/" target="_blank" rel="noopener" aria-label="Instagram">
                                    <img src="/assets/img/icons/Instagram-icon.svg" class="my-social-links" alt="" aria-hidden="true">
                                </a>
                                <a href="https://www.facebook.com/" target="_blank" rel="noopener" aria-label="Facebook">
                                    <img src="/assets/img/icons/facebook-icon.svg" class="my-social-links" alt="" aria-hidden="true">
                                </a>
                            </div>

                            <div class="contact-figma-report-card">
                                <div class="contact-figma-report-card__text">
                                    <h3>The UAE Structure Report</h3>
                                    <p>Mainland, Free Zone, or Offshore - the wrong call costs you at the bank, in your visas, at tax time.</p>
                                </div>
                                <span class="contact-figma-report-card__icon">
                                    <img src="/assets/img/icons/contact_right_arrow.svg" alt="" aria-hidden="true">
                                </span>
                            </div>
                        </div>

                        <div class="contact-figma-form-card">
                            <div class="contact-page-form-wrap">
                                <div class="virtuo-reference-form">
                                    <div class="estimate__tab-wrap">
                                        <div class="estimate__tab-inner">
                                            <div class="tab-content">
                                                <div class="tab-pane fade show active">
                                                    <div class="estimate-form-wrap">
                                                        <form id="contact-quote-form" action="/assets/mail.php" method="POST">
                                                            <input type="hidden" name="form_type" value="footer_quote">
                                                            <div class="form-grp">
                                                                <input type="text" name="name" class="virtuo-name-input" placeholder="Full Name" autocomplete="name" minlength="2" maxlength="80" pattern="[A-Za-z ]{2,80}" title="Please enter a valid name using letters only." required>
                                                            </div>
                                                            <div class="form-grp">
                                                                <input type="email" name="email" placeholder="E-mail" required>
                                                            </div>
                                                            <div class="form-grp">
                                                                <input type="tel" name="phone_display" class="virtuo-footer-phone-input" placeholder="Phone" autocomplete="tel" inputmode="numeric" maxlength="15" pattern="[0-9]{5,15}" title="Please enter numbers only." required>
                                                                <input type="hidden" name="phone" value="">
                                                                <input type="hidden" name="phone_country" value="AE">
                                                            </div>
                                                            <div class="form-grp">
                                                                <select name="service" required>
                                                                    <option value="" disabled selected>Select Service</option>
                                                                    <option value="UAE Business Formation, Structuring & Compliance">UAE Business Formation, Structuring & Compliance</option>
                                                                    <option value="Government Relations & PRO Services">Government Relations & PRO Services</option>
                                                                    <option value="Immigration & Residency Solutions">Immigration & Residency Solutions</option>
                                                                    <option value="Digital Marketing & Brand Development">Digital Marketing & Brand Development</option>
                                                                    <option value="AI Automation & Technology Solutions">AI Automation & Technology Solutions</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-grp">
                                                                <select name="emirate" required>
                                                                    <option value="" disabled selected>Select Emirate</option>
                                                                    <option value="Abu Dhabi">Abu Dhabi</option>
                                                                    <option value="Dubai">Dubai</option>
                                                                    <option value="Sharjah">Sharjah</option>
                                                                    <option value="Ajman">Ajman</option>
                                                                    <option value="Fujairah">Fujairah</option>
                                                                    <option value="Ras Al Khaimah">Ras Al Khaimah</option>
                                                                    <option value="Umm Al Quwain">Umm Al Quwain</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-grp">
                                                                <input type="text" name="message" style="padding: 18px 10px 100px 10px;" placeholder="Message" required>
                                                            </div>
                                                            <button class="tg-btn tg-btn-seven" type="submit">Talk to an Expert</button>
                                                            <p class="ajax-response mb-0"></p>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <?php include __DIR__ . '/partials/service-marquee.php'; ?>
		        <!-- contact-area-end -->
        <section id="contact-faq" class="contact-faq-area">
            <div class="container site-content-gutter custom-container">
                <div class="contact-faq-area__header">
                    <h2 class="contact-faq-area__title">Frequently Asked Questions</h2>
                    <p class="contact-faq-area__subtitle">Straight answers to the questions we hear most — setup, visas, tax, and how we work.</p>
                </div>

                <div class="contact-faq-area__wrap">
                    <div class="accordion contact-faq-accordion" id="contact-faq-accordion">
                        <div class="accordion-item">
                            <h3 class="accordion-header" id="contact-faq-heading-one">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#contact-faq-collapse-one" aria-expanded="false" aria-controls="contact-faq-collapse-one">
                                    <span>1. How long does business setup take in the UAE?</span>
                                </button>
                            </h3>
                            <div id="contact-faq-collapse-one" class="accordion-collapse collapse" aria-labelledby="contact-faq-heading-one" data-bs-parent="#contact-faq-accordion">
                                <div class="accordion-body">
                                    Most licenses are issued within 5–10 working days once documents are complete. Visa processing can add 2–3 weeks depending on the authority and approvals required.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h3 class="accordion-header" id="contact-faq-heading-two">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#contact-faq-collapse-two" aria-expanded="false" aria-controls="contact-faq-collapse-two">
                                    <span>2. Do I need to be in the UAE to set up my company?</span>
                                </button>
                            </h3>
                            <div id="contact-faq-collapse-two" class="accordion-collapse collapse" aria-labelledby="contact-faq-heading-two" data-bs-parent="#contact-faq-accordion">
                                <div class="accordion-body">
                                    In many cases, the initial setup can begin remotely. Some steps, such as medical testing, Emirates ID biometrics, or bank-related requirements, may require your physical presence.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h3 class="accordion-header" id="contact-faq-heading-three">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#contact-faq-collapse-three" aria-expanded="false" aria-controls="contact-faq-collapse-three">
                                    <span>3. What is the real cost difference between Mainland and Free Zone?</span>
                                </button>
                            </h3>
                            <div id="contact-faq-collapse-three" class="accordion-collapse collapse" aria-labelledby="contact-faq-heading-three" data-bs-parent="#contact-faq-accordion">
                                <div class="accordion-body">
                                    The right option depends on your activity, ownership needs, visa requirements, office needs, and where you plan to trade. Free Zones can be leaner for many businesses, while Mainland can be better for direct UAE market access.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h3 class="accordion-header" id="contact-faq-heading-four">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#contact-faq-collapse-four" aria-expanded="false" aria-controls="contact-faq-collapse-four">
                                    <span>4. What happens after I submit this form?</span>
                                </button>
                            </h3>
                            <div id="contact-faq-collapse-four" class="accordion-collapse collapse" aria-labelledby="contact-faq-heading-four" data-bs-parent="#contact-faq-accordion">
                                <div class="accordion-body">
                                    Our team reviews your requirements, contacts you to clarify your business activity and goals, then recommends the most suitable setup, visa, banking, or compliance path.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h3 class="accordion-header" id="contact-faq-heading-five">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#contact-faq-collapse-five" aria-expanded="false" aria-controls="contact-faq-collapse-five">
                                    <span>5. Can Virtuo help with visas after company formation?</span>
                                </button>
                            </h3>
                            <div id="contact-faq-collapse-five" class="accordion-collapse collapse" aria-labelledby="contact-faq-heading-five" data-bs-parent="#contact-faq-accordion">
                                <div class="accordion-body">
                                    Yes. We can assist with investor visas, partner visas, employee visas, dependent visas, Emirates ID steps, medical testing guidance, and renewal coordination.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h3 class="accordion-header" id="contact-faq-heading-six">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#contact-faq-collapse-six" aria-expanded="false" aria-controls="contact-faq-collapse-six">
                                    <span>6. Do you help with business bank account preparation?</span>
                                </button>
                            </h3>
                            <div id="contact-faq-collapse-six" class="accordion-collapse collapse" aria-labelledby="contact-faq-heading-six" data-bs-parent="#contact-faq-accordion">
                                <div class="accordion-body">
                                    Yes. We help prepare the structure, documents, activity explanation, and compliance positioning banks usually expect before reviewing a business account application.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h3 class="accordion-header" id="contact-faq-heading-seven">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#contact-faq-collapse-seven" aria-expanded="false" aria-controls="contact-faq-collapse-seven">
                                    <span>7. Can I get advice before deciding which license to choose?</span>
                                </button>
                            </h3>
                            <div id="contact-faq-collapse-seven" class="accordion-collapse collapse" aria-labelledby="contact-faq-heading-seven" data-bs-parent="#contact-faq-accordion">
                                <div class="accordion-body">
                                    Yes. The purpose of the consultation is to understand your business model first, then guide you toward the license, jurisdiction, and structure that fits your goals.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ---New code------- -->
       <section class="choose__area-five section-py-130">
            <div class="container site-content-gutter custom-container home-page-container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-lg-5 col-md-9">
                        <div class="choose__img-wrap-four" style="margin-left: 0; margin-right: auto; max-width: 680px; position: relative;">
                            <img src="assets/img/images//about_virtuo_eye.jpg" alt="Client trust and business relationship visual" data-aos="fade-left" data-aos-delay="200" style="width: 100%; height: auto; padding-left: 0px !important;" loading="lazy" decoding="async" width="600" height="450">

                            <div class="circle__wrap circle__wrap-two" data-aos="zoom-in" data-aos-delay="600" style="left: auto; right: -55px; top: auto; bottom: -45px;">
                                <div class="icon" style="background-color: #564ABE; height: 100px; width: 100px;">

                                    <img src="/assets/img/icons/Virtuo.svg" width="55" height="55" alt="" style="rotate: 25deg;" />
                                </div>
                                <div class="content">
                                    <h6 class="circle rotateme">VIRTUO • ESTABLISH • OPERATE • INNOVATE •</h6>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="choose__content-five" style="max-width: auto; margin-left: -21px;">
                            <div class="section__title mb-15">
                                <h2 class="title">Why Virtuo</h2>
                            </div>
                            <p>Virtuo combines business setup expertise, PRO support, residency guidance, digital growth, and AI solutions in one integrated platform.</p>
                            <p>Clients choose Virtuo because we focus on more than forming a company. We focus on helping you build the right foundation.</p>
                            <p>We look at your goals, your business model, your banking needs, your visa requirements, your family situation, your market entry plan, and your long-term growth strategy. Then we help you move forward with a structure that makes sense.</p>
                            <p>Our approach is clear, professional, and practical.No unnecessary complications. No generic advice. No confusing process.Just the right guidance, the right setup, and the right support to help you build in the UAE with confidence.</p>
                        </div>
                    </div>


                </div>
            </div>
        </section>
         <!-- ------End New Code------ -->
        <!-- cta-area -->
        
        <!-- cta-area-end -->

        <!-- contact-map -->
        <!-- contact-map -->
<section class="contact-map-section" aria-label="Virtuo office location map">
    <div class="contact-map">
        <iframe
            title="Virtuo office location map"
            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d28833.432401497106!2d55.4394942!3d25.3988165!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f5784a7c97153%3A0x2f7b6f7ff376bcb3!2sAjman%20Free%20Zone!5e0!3m2!1sen!2sae!4v1783447037089!5m2!1sen!2sae"
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"
            tabindex="-1">
        </iframe>
    </div>
</section>
<!-- contact-map-end -->
        <!-- contact-map-end -->
    </main>
    <!-- main-area-end -->

    <!-- footer-area -->
    <?php include __DIR__ . '/partials/footer.php'; ?>
    <?php include __DIR__ . '/partials/scripts.php'; ?>
    <!-- footer-area-end -->

</body>

</html>
