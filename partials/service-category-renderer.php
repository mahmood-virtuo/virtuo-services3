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
        <section class="work__area-two has-animation" style="margin-top: 100px;">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-8">
                        <div class="section__title text-center mb-60">
                            <span class="sub-title">Our Working Portfolio</span>
                            <h2 class="title">Your UAE Business Setup Journey, Simplified</h2>
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
                                    <h3 class="title">Free Consultation</h3>
                                    <p>15-30 Minutes</p>
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
                                    <h3 class="title">Business Structure & Proposal</h3>
                                    <p>1 Business Day</p>
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
                                    <h3 class="title">Foreign Ownership Alignment</h3>
                                    <p>100% Guaranteed</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="work__item-two text-center">
                                <div class="work__icon-two">
                                    <i class="flaticon-handshake"></i>
                                </div>
                                <div class="work__content-two">
                                    <span class="work__step">Step-04</span>
                                    <h3 class="title">Corporate Tax Optimization</h3>
                                    <p>Complete 0% Structuring</p>
                                </div>
                            </div>
                        </div>
                        <div style="margin:100px;" class="services__details-content-top">
                            <h2 class="title">
                                Why Do Businesses Choose Virtuo?
                            </h2>
                            <p>
                                Setting up a company in a UAE free zone requires the right expertise, guidance, and support to ensure a smooth and compliant process. Virtuo Services F.Z.C provides professional assistance to entrepreneurs, startups, SMEs, and international businesses looking to establish their presence in the UAE. With in-depth knowledge of free zone regulations and strong industry connections, we make the company formation process simple, efficient, and transparent.

                                Our Advantages :
                                Expertise across all major UAE free zones (DMCC, IFZA, RAKEZ, SHAMS, JAFZA, and more)
                                Fast and transparent processing
                                Strong relationships with free zone authorities
                                Tailored solutions for startups, SMEs, and multinational companies
                                Cost-effective and efficient setup packages
                            </p>
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
            array('one', '1. What is the main difference between Free Zone and Mainland setup?', 'Free Zone companies allow for 100% foreign ownership without a local agent, but they are restricted from trading directly inside the UAE mainland market without a local distributor or mainland branch setup. Mainland companies can trade anywhere across the UAE but are subject to different regulatory structures.'),
            array('two', '2. Can I open a corporate bank account with a Free Zone license?', 'Yes. Once your Free Zone license is issued and your corporate documents are finalized, you can open a business bank account with any major local or international bank operating in the UAE. Virtuo provides complete documentation support to streamline this approval process.'),
            array('three', '3. How long does the entire setup process take?', 'Initial approvals and license issuance timelines depend on the chosen jurisdiction and activity. With complete documents, Virtuo helps keep the process structured, transparent, and efficient from consultation through final incorporation.'),
            array('four', '4. Can Virtuo support visas and post-incorporation requirements?', 'Yes. Virtuo supports visa processing, Emirates ID steps, corporate bank account preparation, renewals, and ongoing compliance so your company can stay operational after setup.'),
        );
        ?>
        <section class="faq__area-three">
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
                    <div class="col-xl-8 col-lg-10" style="width: 100%;">
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
                                                    <?php echo htmlspecialchars($faq[2]); ?>
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
                        <p style="margin-bottom: 15px;"> Business Setup in Dubai Free Zones </p>
                        <h2 class="title">
                            Build Your UAE Business with Confidence
                        </h2>
                        <p>
                            Dubai's Free Zones have become a global gateway for entrepreneurs, investors, and international companies seeking a business-friendly environment with world-class infrastructure and regulatory efficiency. Offering 100% foreign ownership, streamlined licensing procedures, and attractive tax advantages, Free Zones provide an ideal foundation for sustainable growth.

                            At Virtuo Services F.Z.C., we simplify the entire company formation journey. From selecting the right Free Zone and obtaining licenses to managing visas and compliance requirements, our experts handle every step with precision, allowing you to focus on growing your business from day one.
                        </p>
                    </div>
                    <div class="services__details-thumb">
                        <img src="assets/img/services/services_details_img01.webp" alt="<?php echo htmlspecialchars($tab); ?>">
                    </div>
                    <div class="services__details-content">
                        <h2 class="title-two">
                            Our Free Zone Setup Services Include
                        </h2>
                        <p class="info-one">
                            <b> 1. Business Activity Selection and License Type</b>
                        </p>
                        <p class="info-two">
                            Expert guidance on choosing the right commercial, professional, or industrial licenses to match your corporate goals and ensure full regulatory compliance.
                        </p>
                        <p class="info-one">
                            <b> 2. Free Zone Selection & Real Estate Procurement</b>
                        </p>
                        <p class="info-two">
                            Identifying the ideal economic zone for your industry and setting up physical or virtual office spaces, flexi-desks, or premium corporate spaces tailored to your needs.
                        </p>
                        <p class="info-one">
                            <b>3. Name Approval & Initial Documentation</b>
                        </p>
                        <p class="info-two">
                            Managing trade name reservations and navigating initial structural approvals with local authorities to ensure a smooth legal launch.
                        </p>
                        <p class="info-one">
                            <b> 4. Visa and Immigration Processing</b>
                        </p>
                        <p class="info-two">
                            Fast-tracked management of investor, partner, employee, and family residency visas, including medical tests and Emirates ID assistance.
                        </p>
                        <p class="info-one">
                            <b> 5. Corporate Bank Account Assistance</b>
                        </p>
                        <p class="info-two">
                            Document compilation, profile positioning, and direct introductions to leading UAE local and international banks for swift account opening.
                        </p>
                        <p class="info-one">
                            <b> 6. Corporate Governance & Structure Advisory</b>
                        </p>
                        <p class="info-two">
                            Custom selection of the right legal entity structure (FZE, FZCO, or Branch) to protect your equity and maximize operational efficiency.
                        </p>
                        <p class="info-one">
                            <b> 7. Document Clearing & Government Relations (PRO)</b>
                        </p>
                        <p class="info-two">
                            Handling all interactions, submissions, and approvals with government bodies and ministries, minimizing administrative friction for your team.
                        </p>
                        <p class="info-one">
                            <b> 8. Post-Incorporation Corporate Support</b>
                        </p>
                        <p class="info-two">
                            Continued operational assistance post-incorporation, covering everything from annual license renewals to ongoing corporate compliance.
                        </p>
                        <div class="services__details-inner-images">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="img-one">
                                        <img src="assets/img/services/services_img01.webp" alt="<?php echo htmlspecialchars($tab); ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="img-two">
                                        <img src="assets/img/services/services_img02.webp" alt="<?php echo htmlspecialchars($tab); ?>">
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
                            <!-- Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer gravida, sapien sit amet dignissim suscipit, lorem ipsum facilisis neque, at tincidunt ipsum augue non justo. -->
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
                    <a href="/contact" class="tg-btn tg-btn-three">
                        Contact With Us
                        <img src="assets/img/icons/right_arrow.svg" alt="" class="injectable">
                    </a>
                    <div class="shape">
                        <img src="assets/img/images/sidebar_contact_shape01.svg" alt="shape" class="rotateme">
                        <img src="assets/img/images/sidebar_contact_shape02.svg" alt="shape" class="alltuchtopdown">
                    </div>
                </div>
            </div>
        </aside>
        <?php
    }
}
