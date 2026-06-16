<?php
if (!function_exists('virtuo_service_slug')) {
    function virtuo_service_slug($text)
    {
        $slug = strtolower(trim($text));
        $slug = str_replace('&', 'and', $slug);
        $slug = preg_replace('/[^a-z0-9]+/', '-', $slug);
        return trim($slug, '-');
    }
}

if (!function_exists('virtuo_check_icon')) {
    function virtuo_check_icon()
    {
        ?>
        <div class="icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="11" viewBox="0 0 14 11" fill="none">
                <path d="M12.091 2L5.091 9L1.90918 5.81818" stroke="currentColor" stroke-width="2.1875" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </div>
        <?php
    }
}

if (!function_exists('virtuo_sidebar_arrow')) {
    function virtuo_sidebar_arrow()
    {
        ?>
        <span>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="14" viewBox="0 0 24 14" fill="none">
                <path d="M1 6.7777H22.6667M22.6667 6.7777L16.9683 1M22.6667 6.7777L16.9683 12.5556" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </span>
        <?php
    }
}

if (!function_exists('virtuo_render_work_line_shape')) {
    function virtuo_render_work_line_shape()
    {
        static $workLineShape = null;

        if ($workLineShape === null) {
            $templatePath = __DIR__ . '/../uae-business-formation.php';
            $template = is_readable($templatePath) ? file_get_contents($templatePath) : '';

            if ($template && preg_match('/<div class="work__line-shape">\s*(<svg[\s\S]*?<\/svg>)\s*<\/div>/', $template, $matches)) {
                $workLineShape = $matches[1];
            } else {
                $workLineShape = '<svg xmlns="http://www.w3.org/2000/svg" width="1151" height="81" viewBox="0 0 1151 81" fill="currentColor"><path class="dashed1" stroke-width="3" d="M1 6C210 70 400 94 583 43C777 -65 956 115 1150 30" /></svg>';
            }
        }
        ?>
        <div class="work__line-shape">
            <?php echo $workLineShape; ?>
        </div>
        <?php
    }
}

if (!function_exists('virtuo_render_work_section')) {
    function virtuo_render_work_section()
    {
        ?>
        <!-- work-area -->
        <section class="work__area-two has-animation" style="margin-top: 80px;">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-8">
                        <div class="section__title text-center mb-60">
                            <span class="sub-title">Our Working Portfolio</span>
                            <h2 class="title">Easy 3 steps of the recruitment work process</h2>
                        </div>
                    </div>
                </div>
                <div class="work__item-wrap-two">
                    <?php virtuo_render_work_line_shape(); ?>
                    <div class="row gutter-y-30 justify-content-center">
                        <div class="col-lg-4 col-md-6">
                            <div class="work__item-two text-center">
                                <div class="work__icon-two">
                                    <i class="flaticon-health-insurance"></i>
                                </div>
                                <div class="work__content-two">
                                    <span class="work__step">Step-01</span>
                                    <h3 class="title">Choose Insurance</h3>
                                    <p>Transform your business with ourtransfo reive consulting solutione go beyond short-term fixes to deliver</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="work__item-two text-center">
                                <div class="work__icon-two">
                                    <i class="flaticon-growth"></i>
                                </div>
                                <div class="work__content-two">
                                    <span class="work__step">Step-02</span>
                                    <h3 class="title">Meet With Agent</h3>
                                    <p>Transform your business with ourtransfo reive consulting solutione go beyond short-term fixes to deliver</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="work__item-two text-center">
                                <div class="work__icon-two">
                                    <i class="flaticon-handshake"></i>
                                </div>
                                <div class="work__content-two">
                                    <span class="work__step">Step-03</span>
                                    <h3 class="title">Start Your Policy</h3>
                                    <p>Transform your business with ourtransfo reive consulting solutione go beyond short-term fixes to deliver</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- work-area-end -->
        <?php
    }
}

if (!function_exists('virtuo_render_faq_section')) {
    function virtuo_render_faq_section($accordionId, $panelId)
    {
        $faqs = array(
            array('one', 'How do I create an invoice using Finwave?'),
            array('two', 'Can I track expenses using This Application?'),
            array('three', 'Is there a mobile app for Finwave?'),
            array('four', 'Can I integrate Finwave with other accounting software?'),
            array('five', 'How often are software updates released for Finwave?'),
            array('six', 'Is Finwave payment processing secure?'),
        );
        ?>
        <section class="faq__area-three" style="margin-top: 80px;">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="section__title text-center mb-50">
                            <span class="sub-title">
                                FREQUENTLY ASKED QUESTIONS
                            </span>
                            <h2 class="title">
                                Got any questions?
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-lg-10">
                        <div class="faq__wrap faq__wrap-three">
                            <div class="accordion" id="<?php echo htmlspecialchars($accordionId); ?>">
                                <?php foreach ($faqs as $index => $faq) :
                                    $collapseId = $panelId . '-collapse-' . $faq[0];
                                    ?>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button<?php echo $index === 0 ? '' : ' collapsed'; ?>" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo htmlspecialchars($collapseId); ?>" aria-expanded="<?php echo $index === 0 ? 'true' : 'false'; ?>" aria-controls="<?php echo htmlspecialchars($collapseId); ?>">
                                                <?php echo htmlspecialchars($faq[1]); ?>
                                            </button>
                                        </h2>
                                        <div id="<?php echo htmlspecialchars($collapseId); ?>" class="accordion-collapse collapse" data-bs-parent="#<?php echo htmlspecialchars($accordionId); ?>">
                                            <div class="accordion-body">
                                                <p>
                                                    Quis nostrud exercitation ullamco laboris nisi ut aliquip excommodorem ipsum dolor sit adipiscing elitaaey um dolor sitter amet consect eturellam eu neque esacilifacilisis sit elitaaey um dolor sitter amet consect eturellam eu neque esacilifacilisis.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="faq__shape-wrap">
            </div>
        </section>
        <?php
    }
}

if (!function_exists('virtuo_render_service_panels')) {
    function virtuo_render_service_panels($pageSlug, $tabs)
    {
        foreach ($tabs as $index => $tab) :
            $panelId = $pageSlug . '-' . virtuo_service_slug($tab);
            $accordionId = 'accordion-' . $panelId;
            ?>
            <!-- <?php echo htmlspecialchars($tab); ?> Tab Panel -->
            <div class="service-tab-panel<?php echo $index === 0 ? ' is-active' : ''; ?>" id="<?php echo htmlspecialchars($panelId); ?>" data-service-panel="<?php echo htmlspecialchars($panelId); ?>">
                <div class="services__details-wrap">
                    <div class="services__details-content-top">
                        <h2 class="title">
                            <?php echo htmlspecialchars($tab); ?>
                        </h2>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer business setup support helps companies launch, operate, and grow with confidence across the UAE market.
                        </p>
                    </div>
                    <div class="services__details-thumb">
                        <img src="assets/img/services/services_details_img01.jpg" alt="<?php echo htmlspecialchars($tab); ?>">
                    </div>
                    <div class="services__details-content">
                        <h2 class="title-two">
                            Raise Capital Faster & Negotiate On Your Own Terms
                        </h2>
                        <p class="info-one">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec facilisis, lorem at tincidunt facilisis, neque lorem volutpat lorem, vitae facilisis lorem magna sed neque.
                        </p>
                        <p class="info-two">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent vel augue vitae lectus malesuada consequat. Donec vitae semper justo.
                        </p>
                        <div class="services__details-quality">
                            <h2 class="title-two">
                                Quality Industrial Working
                            </h2>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere, mauris vitae tincidunt dignissim, lectus ipsum tincidunt lorem, sed aliquet lorem neque at magna.
                            </p>
                            <div class="services__details-quality-inner">
                                <ul class="list-wrap about__list-item-two">
                                    <li><?php virtuo_check_icon(); ?>Company formation support</li>
                                    <li><?php virtuo_check_icon(); ?>Documentation assistance</li>
                                    <li><?php virtuo_check_icon(); ?>Licensing guidance</li>
                                    <li><?php virtuo_check_icon(); ?>Ongoing compliance</li>
                                </ul>
                                <div class="services__details-client-wrap">
                                    <div class="client__box-two">
                                        <div class="icon">
                                            <i class="flaticon-investment">
                                            </i>
                                        </div>
                                        <div class="content">
                                            <h2 class="count">
                                                65%
                                            </h2>
                                            <span>
                                                Successful
                                            </span>
                                        </div>
                                    </div>
                                    <div class="client__box-two">
                                        <div class="icon">
                                            <i class="flaticon-growth">
                                            </i>
                                        </div>
                                        <div class="content">
                                            <h2 class="count">
                                                95%
                                            </h2>
                                            <span>
                                                Goal Achieve
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="services__details-inner-images">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="img-one">
                                        <img src="assets/img/services/services_img01.jpg" alt="<?php echo htmlspecialchars($tab); ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="img-two">
                                        <img src="assets/img/services/services_img02.jpg" alt="<?php echo htmlspecialchars($tab); ?>">
                                        <a href="https://www.youtube.com/watch?v=6mkoGSqTqFI" class="play__btn-two popup-video">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="28" viewBox="0 0 22 28" fill="none">
                                                <path d="M0 2.66333C0 1.081 1.75049 0.125316 3.08152 0.980974L20.7163 12.3176C21.941 13.1049 21.941 14.8951 20.7163 15.6824L3.08152 27.019C1.7505 27.8747 0 26.919 0 25.3367V2.66333Z" fill="currentColor" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer gravida, sapien sit amet dignissim suscipit, lorem ipsum facilisis neque, at tincidunt ipsum augue non justo.
                        </p>
                    </div>
                    <?php virtuo_render_work_section(); ?>
                    <?php virtuo_render_faq_section($accordionId, $panelId); ?>
                </div>
            </div>
            <!-- <?php echo htmlspecialchars($tab); ?> Tab Panel End -->
        <?php endforeach;
    }
}

if (!function_exists('virtuo_render_service_sidebar')) {
    function virtuo_render_service_sidebar($pageSlug, $tabs)
    {
        ?>
        <aside class="services__sidebar">
            <div class="sidebar__widget">
                <div class="sidebar__cat-list">
                    <ul class="list-wrap">
                        <?php foreach ($tabs as $index => $tab) :
                            $panelId = $pageSlug . '-' . virtuo_service_slug($tab);
                            ?>
                            <li>
                                <a href="#<?php echo htmlspecialchars($panelId); ?>" class="service-tab-link<?php echo $index === 0 ? ' is-active' : ''; ?>" data-service-tab="<?php echo htmlspecialchars($panelId); ?>">
                                    <?php echo htmlspecialchars($tab); ?>
                                    <?php virtuo_sidebar_arrow(); ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            <div class="sidebar__widget">
                <div class="sidebar__contact">
                    <h4 class="title">
                        Your Gateway to Seamless Business Success in Dubai
                    </h4>
                    <p>
                        Navigating complex UAE regulations seamlessly so you can focus exclusively on scaling your corporate vision.
                    </p>
                    <a href="contact.php" class="tg-btn tg-btn-three">
                        Contact With Us
                        <img src="assets/img/icons/right_arrow.svg" alt="" class="injectable">
                    </a>
                    <div class="shape">
                        <img src="assets/img/images/sidebar_contact_shape01.svg" alt="shape" class="rotateme">
                        <img src="assets/img/images/sidebar_contact_shape02.svg" alt="shape" class="alltuchtopdown">
                    </div>
                </div>
            </div>
            <div class="sidebar__widget">
                <h4 class="sidebar__widget-title">
                    Service Brochure
                </h4>
                <div class="sidebar__brochure">
                    <p>
                        View our 2025 Business prospectus of brochure for an easy to read guide on all of the services offer.
                    </p>
                    <a href="assets/img/services/services_details_img01.jpg" target="_blank" download>
                        <span class="content">
                            <strong>
                                PDF. Download
                            </strong>
                        </span>
                    </a>
                    <a href="assets/img/services/services_details_img01.jpg" target="_blank" download>
                        <span class="content">
                            <strong>
                                PDF. Download
                            </strong>
                        </span>
                    </a>
                </div>
            </div>
        </aside>
        <?php
    }
}
