<!-- preloader disabled - restore by uncommenting this block
<div class="preloader">
    <div class="preloader-inner">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </div>
</div>
preloader disabled end -->

<!-- Scroll-top -->
<button type="button" class="scroll__top scroll-to-target" data-target="html" aria-label="Back to top">
    <?php if (!empty($useInlineFontAwesomeIcons)) : ?>
    <i aria-hidden="true" style="display: inline-block; font-style: normal; line-height: 1;"><svg xmlns="http://www.w3.org/2000/svg" width=".875em" height="1em" viewBox="0 0 448 512" fill="currentColor" focusable="false" style="display: block;"><path d="M240.971 130.524l194.343 194.343c9.373 9.373 9.373 24.569 0 33.941l-22.667 22.667c-9.357 9.357-24.522 9.375-33.901.04L224 227.495 69.255 381.516c-9.379 9.335-24.544 9.317-33.901-.04l-22.667-22.667c-9.373-9.373-9.373-24.569 0-33.941L207.03 130.525c9.372-9.373 24.568-9.373 33.941-.001z"/></svg></i>
    <?php else : ?>
    <i class="fas fa-chevron-up" aria-hidden="true"></i>
    <?php endif; ?>
</button>
<!-- Scroll-top-end-->

<!-- header-area -->
<header class="transparent-header">
    <?php include __DIR__ . '/google-analytics.php'; ?>
    <div class="tg-header__top">
        <div class="container site-content-gutter custom-container virtuo-px-100">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <div class="tg-header__top-info">
                        <ul class="list-wrap">
                            <li><i class="flaticon-placeholder"></i>Office - BLV - 6F - SF60959<br>A Building - Ajman Blvd, Ajman Freezone<br>Sheikh Rashid Bin Saeed Al Maktoum St.<br>Ajman, United Arab Emirates</li>
                            <li><i class="flaticon-envelope"></i><a href="mailto:setup@virtuo.ae">setup@virtuo.ae</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="tg-header__top-right">
                        <ul class="list-wrap">
                            <li class="log-in">
                                <a href="/contact"><img src="/assets/img/icons/lock.svg" alt="" class="injectable">Log in</a>
                            </li>
                            <li>
                                <div class="tg-header__top-social">
                                    <ul class="list-wrap">
                                        <li><a href="https://www.facebook.com/" target="_blank" rel="noopener" aria-label="Visit Virtuo Services on Facebook"><img src="/assets/img/icons/facebook.svg" alt="" class="injectable"></a></li>
                                        <li><a href="https://www.instagram.com/" target="_blank" rel="noopener" aria-label="Visit Virtuo Services on Instagram"><img src="/assets/img/icons/instagram.svg" alt="" class="injectable"></a></li>
                                        <li><a href="https://www.linkedin.com/company/virtuouae/" target="_blank" rel="noopener" aria-label="Visit Virtuo Services on LinkedIn"><img src="/assets/img/icons/linkedin.svg" alt="" class="injectable"></a></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="header-fixed-height"></div>
    <div id="sticky-header" class="tg-header__area tg-header__area-five">
        <div class="container site-content-gutter custom-container">
            <div class="tgmenu__wrap">
                <nav class="tgmenu__nav">
                    <div class="logo">
                        <a href="/"><img src="/assets/img/logo/w_logo.svg" alt="Virtuo Services" width="145" height="39"></a>
                    </div>
                    <div class="logo d-none">
                        <a href="/"><img src="/assets/img/logo/logo.svg" alt="Virtuo Services" width="145" height="39"></a>
                    </div>
                    <div class="tgmenu__navbar-wrap tgmenu__main-menu d-none d-lg-flex">
                        <ul class="navigation">

                            <li>
                                <a href="/about">About</a>
                            </li>
                            <li class="menu-item-has-children virtuo-mega-menu-trigger"><a href="#">Services<?php if (!empty($useInlineFontAwesomeIcons)) : ?><svg class="home-services-nav-chevron" xmlns="http://www.w3.org/2000/svg" width=".875em" height="1em" viewBox="0 0 448 512" fill="currentColor" focusable="false" aria-hidden="true"><path transform="rotate(180 224 256)" d="M240.971 130.524l194.343 194.343c9.373 9.373 9.373 24.569 0 33.941l-22.667 22.667c-9.357 9.357-24.522 9.375-33.901.04L224 227.495 69.255 381.516c-9.379 9.335-24.544 9.317-33.901-.04l-22.667-22.667c-9.373-9.373-9.373-24.569 0-33.941L207.03 130.525c9.372-9.373 24.568-9.373 33.941-.001z"/></svg><?php endif; ?></a>
                                <div class="virtuo-services-mega" data-virtuo-mega-menu>
                                    <div class="virtuo-services-mega__inner">
                                        <div class="virtuo-services-mega__categories" role="list">
                                            <button type="button" class="is-active" data-mega-category="formation" data-mega-link="/uae-business-formation-structuring-and-compliance">UAE Business Formation, Structuring &amp; Compliance</button>
                                            <button type="button" data-mega-category="pro" data-mega-link="/government-relations-and-pro-services">Government Relations &amp; PRO Services</button>
                                            <button type="button" data-mega-category="immigration" data-mega-link="/immigration-and-residency-solutions">Immigration &amp; Residency Solutions</button>
                                           <button type="button" data-mega-category="marketing" data-mega-link="/digital-marketing-and-brand-development">Digital Marketing &amp; Brand Development</button>
                                            <button type="button" data-mega-category="ai" data-mega-link="/ai-automation-and-technology-solutions">AI Automation &amp; Technology Solutions</button>
                                        </div>
                                        <div class="virtuo-services-mega__divider" aria-hidden="true"></div>
                                        <div class="virtuo-services-mega__panels">
                                            <div class="virtuo-services-mega__panel is-active" data-mega-panel="formation">
                                                <a href="/uae-business-formation-structuring-and-compliance?tab=mainland">Mainland Business Setup</a>
                                                <a href="/uae-business-formation-structuring-and-compliance?tab=freezone">Free Zone Business Setup</a>
                                                <a href="/uae-business-formation-structuring-and-compliance?tab=offshore">Offshore Business Setup</a>
                                                <a href="/uae-business-formation-structuring-and-compliance?tab=virtual">Virtual Office</a>
                                                <a href="/uae-business-formation-structuring-and-compliance?tab=business-bank-account-opening">BUSINESS BANK ACCOUNT OPENING</a>
                                            </div>
                                            <div class="virtuo-services-mega__panel" data-mega-panel="pro">
                                                <a href="/government-relations-and-pro-services?tab=government-relations-pro-services-trade-license-services">Trade License Services</a>
                                                <a href="/government-relations-and-pro-services?tab=government-relations-pro-services-legal-attestation-services">Legal Attestation Services</a>
                                                <a href="/government-relations-and-pro-services?tab=government-relations-pro-services-document-clearance-services">Document Clearance Services</a>
                                                <a href="/government-relations-and-pro-services?tab=government-relations-pro-services-translation-services">Translation Services</a>
                                                <a href="/government-relations-and-pro-services?tab=government-relations-pro-services-power-of-attorney">Power Of Attorney</a>
                                                <a href="/government-relations-and-pro-services?tab=government-relations-pro-services-mohre-services">MOHRE Services</a>
                                                <a href="/government-relations-and-pro-services?tab=government-relations-pro-services-notary-public-services-dubai">Notary Public Services Dubai</a>
                                                <a href="/government-relations-and-pro-services?tab=government-relations-pro-services-mohre-inquiry-services">Corporate Compliance</a>
                                            </div>
                                            <div class="virtuo-services-mega__panel" data-mega-panel="immigration">
                                                <a href="/immigration-and-residency-solutions?tab=immigration-residency-solutions-immigration-services">Immigration Services</a>
                                                <a href="/immigration-and-residency-solutions?tab=immigration-residency-solutions-freelance-visa">FREELANCE VISA</a>
                                                <a href="/immigration-and-residency-solutions?tab=immigration-residency-solutions-dependent-visa">Dependent Visa</a>
                                                <a href="/immigration-and-residency-solutions?tab=immigration-residency-solutions-golden-visa-uae">Golden Visa UAE</a>
                                                <a href="/immigration-and-residency-solutions?tab=immigration-residency-solutions-investor-visa-dubai">Investor Visa Dubai</a>
                                                <a href="/immigration-and-residency-solutions?tab=immigration-residency-solutions-residence-visa">Residence Visa</a>
                                                <a href="/immigration-and-residency-solutions?tab=immigration-residency-solutions-gdrfa-services-dubai">GDRFA Services Dubai</a>
                                                <a href="/immigration-and-residency-solutions?tab=immigration-residency-solutions-employment-visa">Employment Visa</a>
                                                <a href="/immigration-and-residency-solutions?tab=immigration-residency-solutions-consulate-services-dubai">Consulate Services Dubai</a>
                                            </div>
                                                <div class="virtuo-services-mega__panel" data-mega-panel="marketing">
                                                <a href="/digital-marketing-and-brand-development">WEB &amp; DIGITAL SOLUTIONS</a>
                                                <a href="/digital-marketing-and-brand-development?tab=digital-marketing-brand-development-social-media-management">SOCIAL MEDIA MANAGEMENT</a>
                                                <a href="/digital-marketing-and-brand-development?tab=digital-marketing-brand-development-brand-development">BRAND DEVELOPMENT</a>
                                                <a href="/digital-marketing-and-brand-development?tab=digital-marketing-brand-development-marketing-solutions">MARKETING SOLUTIONS</a>
                                            </div>
                                            <div class="virtuo-services-mega__panel" data-mega-panel="ai">
                                                <a href="/ai-automation-and-technology-solutions?tab=ai-automation-technology-solutions-ai-automation">AI Automation</a>
                                                <a href="/ai-automation-and-technology-solutions?tab=ai-automation-technology-solutions-technology-solutions">Technology Solutions</a>
                                                <a href="/ai-automation-and-technology-solutions?tab=ai-automation-technology-solutions-workflow-automation">Workflow Automation</a>
                                                <a href="/ai-automation-and-technology-solutions?tab=ai-automation-technology-solutions-business-process-automation">Business Process Automation</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <ul class="sub-menu virtuo-mobile-services-menu">
                                    <li class="menu-item-has-children">
                                        <a href="/uae-business-formation-structuring-and-compliance">UAE Business Formation, Structuring &amp; Compliance</a>
                                        <ul class="sub-menu">
                                            <li><a href="/uae-business-formation-structuring-and-compliance?tab=mainland">Mainland Business Setup</a></li>
                                            <li><a href="/uae-business-formation-structuring-and-compliance?tab=freezone">Free Zone Business Setup</a></li>
                                            <li><a href="/uae-business-formation-structuring-and-compliance?tab=offshore">Offshore Business Setup</a></li>
                                            <li><a href="/uae-business-formation-structuring-and-compliance?tab=virtual">Virtual Office</a></li>
                                            <li><a href="/uae-business-formation-structuring-and-compliance?tab=business-bank-account-opening">Business Bank Account Opening</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="/government-relations-and-pro-services">Government Relations &amp; PRO Services</a>
                                        <ul class="sub-menu">
                                            <li><a href="/government-relations-and-pro-services?tab=government-relations-pro-services-trade-license-services">Trade License Services</a></li>
                                            <li><a href="/government-relations-and-pro-services?tab=government-relations-pro-services-legal-attestation-services">Legal Attestation Services</a></li>
                                            <li><a href="/government-relations-and-pro-services?tab=government-relations-pro-services-document-clearance-services">Document Clearance Services</a></li>
                                            <li><a href="/government-relations-and-pro-services?tab=government-relations-pro-services-translation-services">Translation Services</a></li>
                                            <li><a href="/government-relations-and-pro-services?tab=government-relations-pro-services-power-of-attorney">Power Of Attorney</a></li>
                                            <li><a href="/government-relations-and-pro-services?tab=government-relations-pro-services-mohre-services">MOHRE Services</a></li>
                                            <li><a href="/government-relations-and-pro-services?tab=government-relations-pro-services-notary-public-services-dubai">Notary Public Services Dubai</a></li>
                                            <li><a href="/government-relations-and-pro-services?tab=government-relations-pro-services-mohre-inquiry-services">Corporate Compliance</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="/immigration-and-residency-solutions">Immigration &amp; Residency Solutions</a>
                                        <ul class="sub-menu">
                                            <li><a href="/immigration-and-residency-solutions?tab=immigration-residency-solutions-immigration-services">Immigration Services</a></li>
                                            <li><a href="/immigration-and-residency-solutions?tab=immigration-residency-solutions-freelance-visa">Freelance Visa</a></li>
                                            <li><a href="/immigration-and-residency-solutions?tab=immigration-residency-solutions-dependent-visa">Dependent Visa</a></li>
                                            <li><a href="/immigration-and-residency-solutions?tab=immigration-residency-solutions-golden-visa-uae">Golden Visa UAE</a></li>
                                            <li><a href="/immigration-and-residency-solutions?tab=immigration-residency-solutions-investor-visa-dubai">Investor Visa Dubai</a></li>
                                            <li><a href="/immigration-and-residency-solutions?tab=immigration-residency-solutions-residence-visa">Residence Visa</a></li>
                                            <li><a href="/immigration-and-residency-solutions?tab=immigration-residency-solutions-gdrfa-services-dubai">GDRFA Services Dubai</a></li>
                                            <li><a href="/immigration-and-residency-solutions?tab=immigration-residency-solutions-employment-visa">Employment Visa</a></li>
                                            <li><a href="/immigration-and-residency-solutions?tab=immigration-residency-solutions-consulate-services-dubai">Consulate Services Dubai</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="/digital-marketing-and-brand-development">Digital Marketing &amp; Brand Development</a>
                                        <ul class="sub-menu">
                                            <li>
                                                <a href="/digital-marketing-and-brand-development">Web &amp; Digital Solutions</a>
                                            </li>
                                            <li><a href="/digital-marketing-and-brand-development?tab=digital-marketing-brand-development-social-media-management">Social Media Management</a></li>
                                            <li><a href="/digital-marketing-and-brand-development?tab=digital-marketing-brand-development-brand-development">Brand Development</a></li>
                                            <li><a href="/digital-marketing-and-brand-development?tab=digital-marketing-brand-development-marketing-solutions">Marketing Solutions</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="/ai-automation-and-technology-solutions">AI Automation &amp; Technology Solutions</a>
                                        <ul class="sub-menu">
                                            <li><a href="/ai-automation-and-technology-solutions?tab=ai-automation-technology-solutions-ai-automation">AI Automation</a></li>
                                            <li><a href="/ai-automation-and-technology-solutions?tab=ai-automation-technology-solutions-technology-solutions">Technology Solutions</a></li>
                                            <li><a href="/ai-automation-and-technology-solutions?tab=ai-automation-technology-solutions-workflow-automation">Workflow Automation</a></li>
                                            <li><a href="/ai-automation-and-technology-solutions?tab=ai-automation-technology-solutions-business-process-automation">Business Process Automation</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="/blog">Blog</a>
                            </li>



                            <li>
                                <a href="/contact">Contact</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tgmenu__action tgmenu__action-five">
                        <ul class="list-wrap">
                            <li class="header-contact">
                                <a href="https://wa.me/971565151315?text=Hi%20Virtuo!%20I'm%20interested%20in%20setting%20up%20a%20business%20in%20the%20UAE.%20I'd%20like%20to%20learn%20more%20about%20my%20options%20and%20schedule%20a%20free%20consultation" class="header-whatsapp-btn" target="_blank" rel="noopener" aria-label="Chat with Virtuo on WhatsApp"><?php if (!empty($useInlineFontAwesomeIcons)) : ?><i aria-hidden="true" style="display: inline-block; font-style: normal; line-height: 1;"><svg xmlns="http://www.w3.org/2000/svg" width=".875em" height="1em" viewBox="0 0 448 512" fill="currentColor" focusable="false" style="display: block;"><path d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"/></svg></i><?php else : ?><i class="fab fa-whatsapp" aria-hidden="true"></i><?php endif; ?>
                                <span>WhatsApp</span>
                            </a>
                            </li>
                            <li class="offCanvas-menu">
                                <a href="javascript:void(0)" class="menu-tigger" role="button" aria-label="Open menu">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="mobile-nav-toggler" role="button" tabindex="0" aria-label="Open mobile menu"><i class="tg-flaticon-menu" aria-hidden="true"></i></div>
                </nav>
            </div>
        </div>
    </div>


    <!-- Mobile Menu  -->
    <div class="tgmobile__menu">
        <nav class="tgmobile__menu-box">
            <div class="close-btn"><i class="tg-flaticon-close-1"></i></div>
            <div class="nav-logo">
                <a href="/"><img src="/assets/img/logo/logo.svg" alt="Virtuo Services" width="145" height="39"></a>
            </div>
            <div class="tgmobile__menu-outer">
                <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
            </div>
            <div class="social-links">
                <ul class="list-wrap">
                <li><a href="https://www.linkedin.com/company/virtuouae/" target="_blank" rel="noopener" aria-label="LinkedIn">
                                    <img src="/assets/img/icons/linkedin-icon.svg" class="my-social-links" alt="" aria-hidden="true">
                                </a></li>
                <li><a href="https://www.instagram.com/" target="_blank" rel="noopener" aria-label="LinkedIn">
                                    <img src="/assets/img/icons/Instagram-icon.svg" class="my-social-links" alt="" aria-hidden="true">
                                </a></li>
                <li><a href="https://www.facebook.com/" target="_blank" rel="noopener" aria-label="LinkedIn">
                                    <img src="/assets/img/icons/facebook-icon.svg" class="my-social-links" alt="" aria-hidden="true">
                                </a></li>
            </ul>
            </div>
        </nav>
    </div>
    <div class="tgmobile__menu-backdrop"></div>
    <!-- End Mobile Menu -->

    <!-- offCanvas-menu -->
    <div class="offCanvas__info">
        <div class="offCanvas__close-icon menu-close">
            <button type="button" aria-label="Close menu"><img src="/assets/img/icons/times.svg" alt="" class="injectable"></button>
        </div>
        <div class="offCanvas__logo mb-30">
            <a href="/"><img src="/assets/img/logo/logo.svg" alt="Virtuo Services" width="145" height="39"></a>
        </div>
        <div class="offCanvas__content">
            <p class="offcanvas-intro">Empowering businesses to establish, operate, and scale in the UAE. Virtuo delivers integrated solutions across business formation, government relations, immigration, digital marketing, and AI driven technology, providing everything ambitious companies need under one trusted partner.</p>
        </div>
        <div class="offCanvas__side-info">
            <div class="contact-list">
                <i class="flaticon-placeholder"></i>
                <p><span>Office - BLV - 6F - SF60959<br>A Building - Ajman Blvd, Ajman Freezone<br>Sheikh Rashid Bin Saeed Al Maktoum St.<br>Ajman, United Arab Emirates</span></p>
            </div>
            <div class="contact-list">
                <a href="https://wa.me/971565151315?text=Hi%20Virtuo!%20I'm%20interested%20in%20setting%20up%20a%20business%20in%20the%20UAE.%20I'd%20like%20to%20learn%20more%20about%20my%20options%20and%20schedule%20a%20free%20consultation" target="_blank" rel="noopener" aria-label="Chat with Virtuo on WhatsApp"><?php if (!empty($useInlineFontAwesomeIcons)) : ?><i class="offcanvas-whatsapp-icon" aria-hidden="true" style="display: inline-block; font-style: normal; line-height: 1;"><svg xmlns="http://www.w3.org/2000/svg" width=".875em" height="1em" viewBox="0 0 448 512" fill="currentColor" focusable="false" style="display: block;"><path d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"/></svg></i><?php else : ?><i class="fab fa-whatsapp offcanvas-whatsapp-icon" aria-hidden="true"></i><?php endif; ?><span>+971 56 515 1315</span></a>
            </div>
            <div class="contact-list">
                <i class="flaticon-envelope"></i>
                <a href="mailto:setup@virtuo.ae">setup@virtuo.ae</a>
            </div>
        </div>
        <div class="offCanvas__social">
            <h6 class="title">Follow us</h6>
            <ul class="list-wrap">
                <li><a href="https://www.linkedin.com/company/virtuouae/" target="_blank" rel="noopener" aria-label="LinkedIn">
                                    <img src="/assets/img/icons/linkedin-icon.svg" class="my-social-links" alt="" aria-hidden="true">
                                </a></li>
                <li><a href="https://www.instagram.com/" target="_blank" rel="noopener" aria-label="LinkedIn">
                                    <img src="/assets/img/icons/Instagram-icon.svg" class="my-social-links" alt="" aria-hidden="true">
                                </a></li>
                <li><a href="https://www.facebook.com/" target="_blank" rel="noopener" aria-label="LinkedIn">
                                    <img src="/assets/img/icons/facebook-icon.svg" class="my-social-links" alt="" aria-hidden="true">
                                </a></li>
            </ul>
        </div>
    </div>
    <div class="offCanvas__overly"></div>
    <!-- offCanvas-menu-end -->

</header>
<!-- header-area-end -->
