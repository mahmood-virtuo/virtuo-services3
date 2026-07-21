<!doctype html>
<html class="no-js blog-details-html" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <?php
    $seoPage = array(
        "title" => "UAE Taxes Explained 2026: Every Tax, Who Pays It & What You Don't Owe | Virtuo",
        'description' => 'The complete UAE tax guide for 2026 — corporate tax, VAT, excise, customs, DMTT, municipal fees, and the six taxes that simply do not exist. With a live corporate tax calculator and profile-based breakdown.',
        'path' => '/blog/uae-taxes-explained-2026-every-tax-who-pays-it-and-what-you-dont-owe',
        'type' => 'article',
        'breadcrumbTitle' => 'UAE Taxes Explained 2026',
        'schemaType' => 'Article',
        'ogImage' => '/assets/img/og/uae-taxes-explained-2026.jpg',
        'heroImage' => '/assets/img/slider/7th_blog.webp',
        'heroImageMobile' => '/assets/img/slider/7th_blog.webp'
    );
    require_once __DIR__ . '/partials/blog-posts.php';
    $currentBlogPost = virtuo_get_blog_post_by_file(basename(__FILE__));
    if ($currentBlogPost) {
        $primaryOg = '/assets/img/og/' . $currentBlogPost['slug'] . '.jpg';
        $legacyOg = '/assets/img/og/uae-taxes-explained-2026.jpg';
        $seoPage['ogImage'] = is_file(__DIR__ . $primaryOg)
            ? $primaryOg
            : (is_file(__DIR__ . $legacyOg) ? $legacyOg : $currentBlogPost['image']);
        $seoPage['image'] = $currentBlogPost['image'];
        $seoPage['imageAlt'] = $currentBlogPost['alt'];
        $seoPage['ogImageAlt'] = $currentBlogPost['alt'];
    }
    include __DIR__ . '/partials/seo.php';
    $loadJqueryMarquee = true;
    ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="/assets/img/favicon.png">

    <!-- CSS here -->
    <link rel="stylesheet" href="<?php echo htmlspecialchars(virtuo_asset_url('/assets/css/bootstrap.min.css'), ENT_QUOTES, 'UTF-8'); ?>">
    <?php if (!empty($loadWowAssets)) : ?>
    <link rel="stylesheet" href="<?php echo htmlspecialchars(virtuo_asset_url('/assets/css/animate.min.css'), ENT_QUOTES, 'UTF-8'); ?>">
    <?php endif; ?>
    <?php if (!empty($loadMagnificPopupAssets)) : ?>
    <link rel="stylesheet" href="<?php echo htmlspecialchars(virtuo_asset_url('/assets/css/magnific-popup.css'), ENT_QUOTES, 'UTF-8'); ?>">
    <?php endif; ?>
    <link rel="stylesheet" href="<?php echo htmlspecialchars(virtuo_asset_url('/assets/css/fontawesome-all.min.css'), ENT_QUOTES, 'UTF-8'); ?>">
    <link rel="stylesheet" href="<?php echo htmlspecialchars(virtuo_asset_url('/assets/css/tg-flaticon.css'), ENT_QUOTES, 'UTF-8'); ?>">
    <?php if (!empty($loadSwiperAssets)) : ?>
    <link rel="stylesheet" href="<?php echo htmlspecialchars(virtuo_asset_url('/assets/css/swiper-bundle.min.css'), ENT_QUOTES, 'UTF-8'); ?>">
    <?php endif; ?>
    <link rel="stylesheet" href="<?php echo htmlspecialchars(virtuo_asset_url('/assets/css/default.css'), ENT_QUOTES, 'UTF-8'); ?>">
    <link rel="stylesheet" href="<?php echo htmlspecialchars(virtuo_asset_url('/assets/css/default-icons.css'), ENT_QUOTES, 'UTF-8'); ?>">
    <link rel="stylesheet" href="<?php echo htmlspecialchars(virtuo_asset_url('/assets/css/aos.css'), ENT_QUOTES, 'UTF-8'); ?>">
    <link rel="stylesheet" href="<?php echo htmlspecialchars(virtuo_asset_url('/assets/css/tg-cursor.css'), ENT_QUOTES, 'UTF-8'); ?>" media="(hover: hover) and (pointer: fine)">
    <?php
    $virtuoCssFamily = 'blog-details';
    include __DIR__ . '/partials/main-styles.php';
    ?>

    <script type="application/ld+json">
    {"@context":"https://schema.org","@type":"FAQPage","mainEntity":[{"@type":"Question","name":"Does the UAE have personal income tax?","acceptedAnswer":{"@type":"Answer","text":"No. The UAE does not levy personal income tax on salaries, wages, dividends, or personal investment returns. This applies to all residents regardless of nationality."}},{"@type":"Question","name":"What is the UAE corporate tax rate in 2026?","acceptedAnswer":{"@type":"Answer","text":"9% on taxable profit above AED 375,000. The first AED 375,000 is taxed at 0%. Free zone companies qualifying as a Qualifying Free Zone Person (QFZP) can earn 0% on qualifying income, provided they meet substance, activity, and de-minimis conditions under Ministerial Decision 229 of 2025."}},{"@type":"Question","name":"Do I need to register for VAT in the UAE?","acceptedAnswer":{"@type":"Answer","text":"Yes, if your annual taxable supplies and imports exceed AED 375,000. Voluntary registration is available from AED 187,500. VAT is 5% on most goods and services, with 0% on exports and exemptions for certain financial services and residential property transactions."}},{"@type":"Question","name":"What is the UAE DMTT and does it affect my business?","acceptedAnswer":{"@type":"Answer","text":"The Domestic Minimum Top-up Tax (DMTT) is a 15% minimum effective tax rate applying to multinational enterprise groups with consolidated global revenue of EUR 750 million or more. It is effective from fiscal years starting January 1, 2025. The vast majority of SMEs, freelancers, and individual founders are not affected."}},{"@type":"Question","name":"Is there capital gains tax in the UAE?","acceptedAnswer":{"@type":"Answer","text":"No. The UAE does not impose capital gains tax on personal investment returns, property sales, or asset disposals. Capital gains earned through a UAE business may be included in taxable business profit subject to the 9% corporate tax rate, but there is no separate capital gains tax."}}]}
    </script>
</head>
<body class="blog-details-page">
    <!-- header-area -->
    <?php include __DIR__ . '/partials/header.php'; ?>
    <!-- header-area-end -->

    <main class="main-area fix">
        <section class="slider__area blog-static-hero">
                    <div class="slider__bg hero-image-styles" data-background="/assets/img/slider/7th_blog.webp" data-background-mobile="/assets/img/slider/7th_blog.webp">
                        <div class="container site-content-gutter custom-container">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="slider__content">
                                        <h1 class="title">UAE <span class="tax-hero-accent">Taxes Explained</span> 2026: Every Tax, Who Pays It, and What You Don't Owe</h1>
                                        <p>The UAE is not tax-free. It never was. But it is one of the most tax-efficient jurisdictions in the world — if you know which taxes apply to you and which ones simply don't exist.</p>
                                        <a href="https://wa.me/971565151315?text=Hi%20Virtuo!%20I'm%20interested%20in%20setting%20up%20a%20business%20in%20the%20UAE.%20I'd%20like%20to%20learn%20more%20about%20my%20options%20and%20schedule%20a%20free%20consultation" target="_blank" rel="noopener" class="tg-btn tg-btn-four">Talk To Us<img src="/assets/img/icons/right_arrow02.svg" alt="" class="injectable"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php
            $scrollTarget = '#blog-detail-content';
            $scrollLabel = 'Scroll to article content';
            $scrollText = '';
            include __DIR__ . '/partials/scroll-down.php';
            ?>
        </section>

        <section class="marquee__area-three">
            <div class="slider__marquee clearfix marquee-wrap-two marquee-wrap-four">
                <div class="marquee_mode marquee__group">
                    <h6 class="marquee__item marquee__item-two"><a href="/government-relations-pro-services"><svg xmlns="http://www.w3.org/2000/svg" width="500" height="500" viewBox="0 0 500 500" fill="none" class="w-10 h-10"><path fill="currentColor" d="M0 250C0 111.929 111.929 0 250 0h250v250c0 138.071-111.929 250-250 250S0 388.071 0 250Z" /></svg>PRO SERVICES</a></h6>
                    <h6 class="marquee__item marquee__item-two"><a href="/uae-business-formation"><svg xmlns="http://www.w3.org/2000/svg" width="500" height="500" viewBox="0 0 500 500" fill="none" class="w-10 h-10"><path fill="currentColor" d="M0 250C0 111.929 111.929 0 250 0h250v250c0 138.071-111.929 250-250 250S0 388.071 0 250Z" /></svg>BUSINESS SETUP</a></h6>
                    <h6 class="marquee__item marquee__item-two"><a href="/immigration-residency-solutions#immigration-residency-solutions-golden-visa-uae"><svg xmlns="http://www.w3.org/2000/svg" width="500" height="500" viewBox="0 0 500 500" fill="none" class="w-10 h-10"><path fill="currentColor" d="M0 250C0 111.929 111.929 0 250 0h250v250c0 138.071-111.929 250-250 250S0 388.071 0 250Z" /></svg>GOLDEN VISA</a></h6>
                    <h6 class="marquee__item marquee__item-two"><a href="/uae-business-formation#business-bank-account-opening"><svg xmlns="http://www.w3.org/2000/svg" width="500" height="500" viewBox="0 0 500 500" fill="none" class="w-10 h-10"><path fill="currentColor" d="M0 250C0 111.929 111.929 0 250 0h250v250c0 138.071-111.929 250-250 250S0 388.071 0 250Z" /></svg>BANK ACCOUNT OPENING</a></h6>
                    <h6 class="marquee__item marquee__item-two"><a href="/digital-marketing-brand-development#digital-marketing-brand-development-brand-development"><svg xmlns="http://www.w3.org/2000/svg" width="500" height="500" viewBox="0 0 500 500" fill="none" class="w-10 h-10"><path fill="currentColor" d="M0 250C0 111.929 111.929 0 250 0h250v250c0 138.071-111.929 250-250 250S0 388.071 0 250Z" /></svg>BRAND DEVELOPMENT</a></h6>
                    <h6 class="marquee__item marquee__item-two"><a href="/immigration-residency-solutions#immigration-residency-solutions-investor-visa-dubai"><svg xmlns="http://www.w3.org/2000/svg" width="500" height="500" viewBox="0 0 500 500" fill="none" class="w-10 h-10"><path fill="currentColor" d="M0 250C0 111.929 111.929 0 250 0h250v250c0 138.071-111.929 250-250 250S0 388.071 0 250Z" /></svg>INVEST IN DUBAI</a></h6>
                    <h6 class="marquee__item marquee__item-two"><a href="/digital-marketing-brand-development"><svg xmlns="http://www.w3.org/2000/svg" width="500" height="500" viewBox="0 0 500 500" fill="none" class="w-10 h-10"><path fill="currentColor" d="M0 250C0 111.929 111.929 0 250 0h250v250c0 138.071-111.929 250-250 250S0 388.071 0 250Z" /></svg>DIGITAL MARKETING</a></h6>
                </div>
            </div>
        </section>

        <!-- blog-details-area -->
        <section id="blog-detail-content" class="blog__details-area section-py-130">
            <div class="container site-content-gutter custom-container">
                <div class="blog-details-layout">
                    <div class="blog-details-sidebar-stack">
                        <?php include __DIR__ . '/partials/blog-details-sidebar-left.php'; ?>
                        <?php include __DIR__ . '/partials/blog-details-sidebar-right.php'; ?>
                    </div>
                    <div class="blog-details-main-column">
                        <div class="blog__details-wrap">
                            <div class="blog__details-content blog-details-article tax-article" id="blogDetailsArticle">
                                <div class="blog__post-meta">
                                    <ul class="list-wrap">
                                        <li><img src="/assets/img/icons/calendar.svg" alt="" class="injectable">Jul 2, 2026</li>
                                    </ul>
                                </div>


<!-- THE MYTH -->
<div class="sec-head reveal">
  <div class="sec-eyebrow">The record, set straight</div>
  <h2 class="title-two">Start here before reading anything else</h2>
  <div class="sec-sub">Two statements are both true. Most content about UAE taxes gets at least one of them wrong.</div>
</div>

<div class="myth-block reveal">
  <div class="myth-card">
    <span class="mr-badge">The myth</span>
    <div class="mr-text">"The UAE is completely tax-free. There are no taxes in Dubai."</div>
  </div>
  <div class="reality-card">
    <span class="mr-badge">The reality</span>
    <div class="mr-text">"The UAE has seven types of tax or fee that can apply to a business. Knowing which ones apply to <em>you</em> — and which six don't — is the entire game."</div>
  </div>
</div>

<!-- TAXES THAT EXIST -->
<div class="sec-head reveal">
  <div class="sec-eyebrow">The taxes that exist</div>
  <h2 class="title-two">Seven. Not zero. Not fifty.</h2>
  <div class="sec-sub">These are the taxes and fees in force in the UAE in 2026. Most businesses encounter two or three of them — which ones depend entirely on your structure, your revenue, and what you sell.</div>
</div>

<div class="tax-grid blog-card-grid reveal" id="tax-grid">

  <!-- 1. Corporate Tax -->
  <div class="tax-card blog-data-card" data-profiles="freelancer,mainland,freezone,mne">
    <div class="tc-header">
      <div class="tc-name">Corporate Tax (CT)</div>
      <div class="tc-rate">9%<small>above AED 375k</small></div>
    </div>
    <div class="tc-who">Applies to businesses with taxable profit above AED 375,000. Free zone QFZP entities can earn 0% on qualifying income — but only with genuine substance and compliant activity.</div>
    <div class="tc-threshold"><svg width="14" height="14" viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="2"><circle cx="7" cy="7" r="6"/><path d="M7 4v3l2 2"/></svg> Filing: 9 months after tax period end</div>
    <div class="tc-note">First AED 375,000: 0%. Everything above: 9%. Small Business Relief available for revenue ≤ AED 3M (until 31 Dec 2026). Free zone companies must still register with the FTA even at 0%.</div>
  </div>

  <!-- 2. VAT -->
  <div class="tax-card blog-data-card" data-profiles="freelancer,mainland,freezone,mne">
    <div class="tc-header">
      <div class="tc-name">Value Added Tax (VAT)</div>
      <div class="tc-rate">5%<small>standard rate</small></div>
    </div>
    <div class="tc-who">Mandatory registration when annual taxable supplies exceed AED 375,000. Voluntary from AED 187,500. Applies to most goods and services supplied in the UAE.</div>
    <div class="tc-threshold"><svg width="14" height="14" viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="2"><circle cx="7" cy="7" r="6"/><path d="M7 4v3l2 2"/></svg> Filing: 28 days after VAT period end</div>
    <div class="tc-note">0% on exports, international transport, first residential property supply, healthcare, education. Exempt: certain financial services, subsequent residential property sales. Businesses can recover input VAT on purchases.</div>
  </div>

  <!-- 3. Excise Tax -->
  <div class="tax-card blog-data-card" data-profiles="mainland,mne">
    <div class="tc-header">
      <div class="tc-name">Excise Tax</div>
      <div class="tc-rate">50–100%<small>product-specific</small></div>
    </div>
    <div class="tc-who">Applies only to manufacturers, importers, and stockpilers of specific products deemed harmful to health or the environment. Does not affect most businesses.</div>
    <div class="tc-threshold"><svg width="14" height="14" viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="2"><circle cx="7" cy="7" r="6"/><path d="M7 4v3l2 2"/></svg> Filing: 15th day after each tax period</div>
    <div class="tc-note">100% on tobacco, e-cigarettes, e-liquids, energy drinks. 50% on carbonated and sweetened beverages. Calculated on retail price or FTA standard price — whichever is higher.</div>
  </div>

  <!-- 4. Customs / Import Duty -->
  <div class="tax-card blog-data-card" data-profiles="mainland,freezone,mne">
    <div class="tc-header">
      <div class="tc-name">Customs / Import Duty</div>
      <div class="tc-rate">5%<small>of CIF value</small></div>
    </div>
    <div class="tc-who">Applies to imports of goods into the UAE mainland. Goods entering from GCC member states are generally duty-free. Free zone imports are suspended until goods enter the mainland.</div>
    <div class="tc-threshold"><svg width="14" height="14" viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="2"><circle cx="7" cy="7" r="6"/><path d="M7 4v3l2 2"/></svg> Paid at point of import clearance</div>
    <div class="tc-note">Calculated on Cost + Insurance + Freight (CIF). CEPA partner countries (India, Turkey, Indonesia, South Korea, Australia and 27 others) often benefit from reduced or zero rates. Some goods carry different rates — tobacco and alcohol face higher duties.</div>
  </div>

  <!-- 5. DMTT -->
  <div class="tax-card blog-data-card" data-profiles="mne">
    <div class="tc-header">
      <div class="tc-name">Domestic Minimum Top-up Tax (DMTT)</div>
      <div class="tc-rate">15%<small>min effective rate</small></div>
    </div>
    <div class="tc-who">Applies only to multinational enterprise groups with consolidated global revenue of EUR 750 million or more (in at least two of the last four fiscal years). The vast majority of businesses are unaffected.</div>
    <div class="tc-threshold"><svg width="14" height="14" viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="2"><circle cx="7" cy="7" r="6"/><path d="M7 4v3l2 2"/></svg> Effective from 1 Jan 2025 · First filing due 2027</div>
    <div class="tc-note">A top-up mechanism — not a replacement for corporate tax. If a group's effective tax rate on UAE profits falls below 15%, the DMTT bridges the gap. OECD Pillar Two aligned. Cabinet Decision No. 142 of 2024.</div>
  </div>

  <!-- 6. Municipal / Housing Fee -->
  <div class="tax-card blog-data-card" data-profiles="freelancer,hnwi,mainland,freezone">
    <div class="tc-header">
      <div class="tc-name">Municipal / Housing Fee</div>
      <div class="tc-rate">5–10%<small>of annual rent</small></div>
    </div>
    <div class="tc-who">Paid by tenants on residential and commercial properties. Rate varies by emirate. Added to utility bills (DEWA/ADDC). Applies to anyone renting property in the UAE.</div>
    <div class="tc-threshold"><svg width="14" height="14" viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="2"><circle cx="7" cy="7" r="6"/><path d="M7 4v3l2 2"/></svg> Collected through utility bills (monthly)</div>
    <div class="tc-note">Dubai: 5% of annual rent value. Sharjah / Ajman: 10%. Ras Al Khaimah: not charged. Paid by the tenant, not the owner. Separate from any maintenance fees charged by building developers.</div>
  </div>

  <!-- 7. Property Transfer Fee -->
  <div class="tax-card blog-data-card" data-profiles="hnwi,mainland">
    <div class="tc-header">
      <div class="tc-name">Property Transfer Fee</div>
      <div class="tc-rate">4%<small>of purchase price</small></div>
    </div>
    <div class="tc-who">One-time fee payable to the Dubai Land Department at the point of property sale or transfer. Typically split 50/50 between buyer and seller, though negotiable. No annual property tax exists.</div>
    <div class="tc-threshold"><svg width="14" height="14" viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="2"><circle cx="7" cy="7" r="6"/><path d="M7 4v3l2 2"/></svg> One-time at transaction</div>
    <div class="tc-note">Applies in Dubai. Other emirates have different rates. Commercial property purchases also attract 5% VAT. There is no annual recurring property tax in the UAE — no equivalent of council tax, property tax, or rates.</div>
  </div>

  <!-- 8. Tourism Dirham -->
  <div class="tax-card blog-data-card" data-profiles="hnwi">
    <div class="tc-header">
      <div class="tc-name">Tourism Dirham (Hotel Tax)</div>
      <div class="tc-rate">AED 7–20<small>per room per night</small></div>
    </div>
    <div class="tc-who">Levied on hotel guests in Dubai. Rate varies by hotel star rating and room type. Applies to the first 30 nights of a hotel stay. Does not apply to long-term residential rentals.</div>
    <div class="tc-threshold"><svg width="14" height="14" viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="2"><circle cx="7" cy="7" r="6"/><path d="M7 4v3l2 2"/></svg> Per room, per night · First 30 nights</div>
    <div class="tc-note">AED 7: 1-star · AED 10: 2-star · AED 15: 3/4-star · AED 20: 5-star. Charged separately from the room rate and from 5% VAT. Two-bedroom suites are charged per room (double the rate).</div>
  </div>

</div><!-- /tax-grid -->

<!-- ZERO TAXES -->
<div class="sec-head sec-head--spaced reveal">
  <div class="sec-eyebrow">The taxes that don't exist</div>
  <h2 class="title-two">Six things you will never pay in the UAE</h2>
  <div class="sec-sub">These are not deferred, capped, or conditionally waived. They simply don't exist in the UAE tax code — and that distinction is worth writing down.</div>
</div>

<div class="zero-grid reveal">
  <div class="zero-card">
    <div class="zc-icon">💼</div>
    <div class="zc-name">Personal Income Tax</div>
    <div class="zc-rate">0%</div>
    <div class="zc-label">does not exist</div>
  </div>
  <div class="zero-card">
    <div class="zc-icon">📈</div>
    <div class="zc-name">Capital Gains Tax</div>
    <div class="zc-rate">0%</div>
    <div class="zc-label">does not exist</div>
  </div>
  <div class="zero-card">
    <div class="zc-icon">🏠</div>
    <div class="zc-name">Inheritance / Estate Tax</div>
    <div class="zc-rate">0%</div>
    <div class="zc-label">does not exist</div>
  </div>
  <div class="zero-card">
    <div class="zc-icon">💰</div>
    <div class="zc-name">Wealth Tax</div>
    <div class="zc-rate">0%</div>
    <div class="zc-label">does not exist</div>
  </div>
  <div class="zero-card">
    <div class="zc-icon">🏦</div>
    <div class="zc-name">Withholding Tax</div>
    <div class="zc-rate">0%</div>
    <div class="zc-label">does not exist</div>
  </div>
  <div class="zero-card">
    <div class="zc-icon">👩‍💼</div>
    <div class="zc-name">Payroll Tax (expats)</div>
    <div class="zc-rate">0%</div>
    <div class="zc-label">not for non-GCC nationals</div>
  </div>
</div>

<!-- PROFILE SELECTOR -->
<div class="sec-head sec-head--spaced reveal">
  <div class="sec-eyebrow">Your tax profile</div>
  <h2 class="title-two">Which taxes actually apply to you?</h2>
  <div class="sec-sub">Select the profile that best describes your situation to see which of the seven taxes above are relevant to you — and which you can stop worrying about.</div>
</div>

<div class="profile-bar reveal">
  <div class="profile-top">I am a...</div>
  <div class="profile-btns">
    <button class="p-btn" data-profile="freelancer"><span class="pb-icon">🧑‍💻</span><span class="pb-label">Freelancer / Solo</span></button>
    <button class="p-btn" data-profile="freezone"><span class="pb-icon">🏢</span><span class="pb-label">Free Zone Company</span></button>
    <button class="p-btn" data-profile="mainland"><span class="pb-icon">🌆</span><span class="pb-label">Mainland LLC</span></button>
    <button class="p-btn" data-profile="hnwi"><span class="pb-icon">👤</span><span class="pb-label">Individual / HNWI</span></button>
    <button class="p-btn" data-profile="mne"><span class="pb-icon">🌐</span><span class="pb-label">Large MNE Group</span></button>
  </div>
</div>
<div class="profile-note reveal" id="profile-note"></div>

<!-- CALCULATOR -->
<div class="calc-block reveal">
  <div class="calc-eyebrow">Live Calculator</div>
  <div class="calc-title">What will your UAE corporate tax actually be?</div>
  <div class="calc-sub">Enter your expected annual taxable profit and choose your entity type. See your tax owed in real time.</div>
  <div class="calc-grid">
    <div class="calc-inputs">
      <label class="calc-label">Annual taxable profit (AED)</label>
      <div class="calc-input-wrap">
        <span class="calc-prefix">AED</span>
        <input class="calc-input" type="number" id="calc-profit" placeholder="e.g. 1,500,000" min="0" step="50000">
      </div>
      <label class="calc-label">Entity type</label>
      <div class="calc-toggle">
        <button class="ct-btn active" data-type="mainland" id="btn-mainland">Mainland / Standard</button>
        <button class="ct-btn" data-type="freezone" id="btn-freezone">Free Zone (QFZP)</button>
      </div>
      <label class="calc-label calc-label--spaced">Revenue (for Small Business Relief check)</label>
      <div class="calc-input-wrap">
        <span class="calc-prefix">AED</span>
        <input class="calc-input" type="number" id="calc-revenue" placeholder="e.g. 2,000,000" min="0" step="50000">
      </div>
    </div>
    <div class="calc-result" id="calc-result">
      <div class="cr-label">Your estimated tax breakdown</div>
      <div id="calc-output">
        <p class="tax-calc-empty">Enter your annual profit above to see your corporate tax calculation.</p>
      </div>
    </div>
  </div>
</div>

<!-- GLOBAL COMPARISON -->
<div class="compare-strip reveal">
  <div class="sec-head sec-head--flush">
    <div class="sec-eyebrow">Global context</div>
    <h2 class="title-two">UAE vs the world</h2>
    <div class="sec-sub">Statutory rates — what you pay before credits, deductions, and special regimes.</div>
  </div>
  <div class="rate-type-tabs">
    <button class="rt-btn active" data-rtype="corporate">Corporate Tax</button>
    <button class="rt-btn" data-rtype="personal">Personal Income Tax</button>
  </div>
  <div id="rate-bars"></div>
</div>

<!-- FAQ -->
<div class="sec-head sec-head--spaced reveal">
  <div class="sec-eyebrow">The questions everyone asks</div>
  <h2 class="title-two">Five things people get wrong about UAE taxes</h2>
</div>
<div class="vt-article">
<div class="vt-acc reveal">
  <details open>
    <summary>Does a UAE Golden Visa make me tax-resident? <span class="pl">+</span></summary>
    <div class="bd">Not automatically — but it makes it significantly easier to establish tax residency. The UAE does not apply a minimum-stay rule to <em>hold</em> a Golden Visa. But to claim UAE tax residency under most double-tax treaty frameworks or to sever residency in a high-tax home country, you typically need to demonstrate meaningful physical presence and economic ties. The UAE's own tax residency criteria (Cabinet Decision No. 85 of 2022) require 183+ days of physical presence per year, or 90 days if you have a "permanent residence or carry on a job or business" in the UAE. A Golden Visa is the legal basis that makes this presence coherent — it's the foundation, not the certificate itself.</div>
  </details>
  <details>
    <summary>Does the free zone 0% rate automatically apply to my company? <span class="pl">+</span></summary>
    <div class="bd">No. Every free zone entity is a taxable person under UAE Corporate Tax law. The 0% rate on qualifying income only applies if your company qualifies as a Qualifying Free Zone Person (QFZP) — which requires simultaneously meeting five conditions: adequate substance in the free zone, qualifying income only (or within the de-minimis threshold of 5% / AED 5M), no election to be taxed at standard rates, full transfer pricing compliance, and audited financial statements. Failing any one condition loses QFZP status for that entire tax year and the four following years. The FTA is actively reviewing QFZP compliance in 2026.</div>
  </details>
  <details>
    <summary>Are capital gains from selling a UAE property taxable? <span class="pl">+</span></summary>
    <div class="bd">Not through a capital gains tax — which doesn't exist in the UAE. However, if you are a business that buys and sells property as part of its trading activity, gains may be included in taxable business profit and subject to the 9% corporate tax rate. If you are an individual selling a property held as a personal investment, there is no tax on the gain. The one-time 4% property transfer fee is payable at the point of sale (typically shared between buyer and seller) regardless of any gain or loss on the transaction.</div>
  </details>
  <details>
    <summary>Does the DMTT affect my free zone company? <span class="pl">+</span></summary>
    <div class="bd">Only if your free zone company is a constituent entity of a multinational group with EUR 750 million or more in consolidated global revenue in at least two of the last four fiscal years. If your business is independent, or part of a smaller group, the DMTT does not apply — regardless of your free zone status. For in-scope groups, the DMTT can apply even to entities with QFZP status, because the Pillar Two effective tax rate calculation differs from the standard UAE corporate tax calculation and a group-wide top-up may arise even where the local entity pays 0% corporate tax.</div>
  </details>
  <details>
    <summary>Do I need to register for both corporate tax and VAT? <span class="pl">+</span></summary>
    <div class="bd">Quite possibly — they are separate registrations with separate thresholds and timelines. Corporate tax registration is mandatory for all taxable persons regardless of revenue level (the FTA has set registration deadlines by trade licence issuance month). VAT registration is mandatory when taxable supplies and imports exceed AED 375,000 annually, with a penalty of AED 10,000 for late registration. A business can be registered for corporate tax but not VAT (if below the VAT threshold), or for both simultaneously. Free zone companies that have not yet filed their first corporate tax return and obtained a Tax Registration Number should do so before the 30 September 2026 deadline if their financial year ended 31 December 2025.</div>
  </details>
</div>
</div>

<!-- CTA -->
<div class="vt-panel vt-reveal">
  <div class="vt-eyebrow">Virtuo Services · UAE Compliance & Business Setup</div>
  <div class="vt-ptitle">Know what you owe. Build what you keep.</div>
  <p class="vt-psub">Virtuo helps businesses structure correctly from day one — so the right taxes apply, the wrong assumptions don't cost you, and your UAE platform holds up at every renewal and audit.</p>
  <a class="vt-cta" href="https://wa.me/971565151315?text=Hi%20Virtuo!%20I'm%20interested%20in%20setting%20up%20a%20business%20in%20the%20UAE.%20I'd%20like%20to%20learn%20more%20about%20my%20options%20and%20schedule%20a%20free%20consultation" target="_blank" rel="noopener">Talk to Virtuo on WhatsApp</a>
  <p class="vt-psub tax-cta-contact">info@virtuo.ae &nbsp;·&nbsp; +971 56 515 1315</p>
</div>

<div class="sources reveal">
  <strong>Official sources only. All tax rates, thresholds and filing deadlines are drawn directly from UAE federal legislation and official government bodies.</strong>
  <br><br>
  <strong>Corporate Tax (9% / 0%):</strong> Federal Decree-Law No. 47 of 2022 on the Taxation of Corporations and Businesses (UAE Ministry of Finance); UAE Official Government Portal — u.ae/en/information-and-services/finance-and-investment/taxation/corporate-tax; Federal Tax Authority (FTA) Corporate Tax legislation page — tax.gov.ae/en/legislation/corporate.tax.aspx; Ministerial Decision No. 139 of 2023 on Qualifying Income (QFZP activities); Ministerial Decision No. 229 of 2025 (updated QFZP conditions and qualifying activities); Cabinet Decision No. 75 of 2023 on Administrative Penalties for violations of tax legislation; Cabinet Decision No. 100 of 2023 on determining categories of taxable persons; Federal Decree-Law No. 47 of 2022, Article 21 — Small Business Relief threshold AED 3,000,000 revenue; Ministerial Decision No. 73 of 2023 on Small Business Relief.
  <br><br>
  <strong>VAT (5%):</strong> Federal Decree-Law No. 8 of 2017 on Value Added Tax (original legislation); Federal Decree-Law No. 16 of 2025 amending the VAT Law (5-year VAT credit limitation, effective 1 January 2026); UAE Official Government Portal — u.ae/en/information-and-services/finance-and-investment/taxation/value-added-tax-vat; Federal Tax Authority VAT legislation — tax.gov.ae/en/legislation/vat.aspx; Cabinet Decision No. 46 of 2020 on zero-rating of exported services.
  <br><br>
  <strong>Excise Tax (50–100%):</strong> Federal Decree-Law No. 7 of 2017 on Excise Tax; Cabinet Decision No. 38 of 2017 on Excise Goods, Excise Tax Rates and the Method of Calculating the Excise Price (tobacco 100%, carbonated beverages 50%); Cabinet Decision No. 52 of 2019 amending excise goods to include energy drinks (100%) and sweetened beverages (50%); Federal Tax Authority Excise Tax legislation — tax.gov.ae/en/legislation/excise.tax.aspx.
  <br><br>
  <strong>Customs Duty (5%):</strong> GCC Common Customs Tariff (standard rate 5% on CIF value), administered through UAE Federal Customs Authority — fcauae.gov.ae; UAE Ministry of Finance; duty-free access for CEPA partner countries — UAE Ministry of Foreign Trade (MoFT) / MOFAIC.
  <br><br>
  <strong>DMTT — Domestic Minimum Top-up Tax (15%):</strong> Cabinet Decision No. 142 of 2024 on the Domestic Minimum Top-up Tax (DMTT); UAE Ministry of Finance official DMTT page — mof.gov.ae/en/public-finance/tax/uae-domestic-minimum-top-up-tax; UAE Ministry of Finance official page — mof.gov.ae/en/public-finance/tax/top-up-tax; OECD/G20 Inclusive Framework on BEPS — Pillar Two GloBE Model Rules (reference framework).
  <br><br>
  <strong>Municipal / Housing Fee:</strong> Dubai Municipality fee structure (5% of annual rental value, collected via DEWA utility bills) — dm.gov.ae; Dubai Electricity and Water Authority (DEWA) — dewa.gov.ae.
  <br><br>
  <strong>Property Transfer Fee (4%):</strong> Dubai Land Department (DLD) — dubailand.gov.ae; DLD official fee schedule — 4% of property sale value.
  <br><br>
  <strong>Tourism Dirham:</strong> Dubai Department of Economy and Tourism (DET) — dubaitourism.ae; official Tourism Dirham fee schedule (AED 7–20 per room per night by hotel star rating, first 30 nights).
  <br><br>
  <strong>UAE Tax Residency:</strong> Cabinet Decision No. 85 of 2022 on Tax Residency in the UAE (183-day and 90-day rules); UAE Ministry of Finance.
  <br><br>
  <strong>International rate comparisons:</strong> OECD Corporate Tax Statistics, 2025 edition (oecd.org) — worldwide average statutory corporate income tax rate 23.58% across 181 jurisdictions; Tax Foundation, "Corporate Tax Rates by Country 2025" (taxfoundation.org) — the internationally recognised statistical reference for statutory corporate rate comparisons; UK corporate tax rate 25% — HM Revenue & Customs (hmrc.gov.uk) / UK Finance Act 2021; US federal corporate tax rate 21% — Internal Revenue Service (irs.gov) / Tax Cuts and Jobs Act 2017; Germany corporate rate ~30% (federal 15% + solidarity surcharge + trade tax) — German Federal Ministry of Finance (bundesfinanzministerium.de); France corporate rate 25% — Direction Générale des Finances Publiques (impots.gouv.fr); Singapore corporate rate 17% — Inland Revenue Authority of Singapore (iras.gov.sg).
  <br><br>
  Figures current as of July 2026. Tax legislation and rates are subject to change — always verify current requirements with the Federal Tax Authority (tax.gov.ae) or the UAE Ministry of Finance (mof.gov.ae) before making compliance or business decisions. This article is for educational purposes only and does not constitute tax, legal, or financial advice. Consult a UAE-registered tax agent for your specific situation.
</div>
                            </div>

                            <div class="blog__details-bottom">
                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="post-tags">
                                            <h5 class="title">Post Tags:</h5>
                                            <?php include __DIR__ . '/partials/blog-post-tags.php'; ?>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <?php include __DIR__ . '/partials/blog-social-share.php'; ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="blog__avatar-wrap mb-60">
                            <div class="blog__avatar-img">
                                <a href="#"><img src="/assets/img/blog/blog_avatar01.webp" alt="Jonaid Ali Mohammad" loading="lazy" decoding="async" width="300" height="329"></a>
                            </div>
                            <div class="blog__avatar-info">
                                <span class="designation">CEO/Founder, Virtuo</span>
                                <h4 class="name"><a href="#">Jonaid Ali Mohammad</a></h4>
                                <p>An American entrepreneur with 18+ years in the Global Wireless Industry and IT Asset Disposition, Jonaid built and exited businesses before relocating to Dubai. Through Virtuo, he advises entrepreneurs, investors, and families on UAE business structuring, residency, banking readiness, tax considerations, and market entry.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- blog-details-area-end -->
    </main>
    <!-- main-area-end -->

    <!-- footer-area -->
    <?php include __DIR__ . '/partials/footer.php'; ?>
    <?php include __DIR__ . '/partials/scripts.php'; ?>
    <script src="<?php echo htmlspecialchars(virtuo_asset_url('/assets/js/blog-details.min.js'), ENT_QUOTES, 'UTF-8'); ?>"></script>
    <script src="<?php echo htmlspecialchars(virtuo_asset_url('/assets/js/blog-toc.min.js'), ENT_QUOTES, 'UTF-8'); ?>"></script>
    <script src="<?php echo htmlspecialchars(virtuo_asset_url('/assets/js/blog-detail-sticky-widgets.min.js'), ENT_QUOTES, 'UTF-8'); ?>"></script>
    <!-- footer-area-end -->
</body>
</html>
