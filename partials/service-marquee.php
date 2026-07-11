<?php
if (($serviceMarqueeVariant ?? '') === 'plain') {
    $serviceMarqueeItems = [
        ['/government-relations-and-pro-services', 'PRO SERVICES'],
        ['/uae-business-formation-structuring-and-compliance', 'BUSINESS SETUP'],
        ['/immigration-and-residency-solutions#immigration-residency-solutions-golden-visa-uae', 'GOLDEN VISA'],
        ['/uae-business-formation-structuring-and-compliance#business-bank-account-opening', 'BANK ACCOUNT OPENING'],
        ['/digital-marketing-and-brand-development#digital-marketing-brand-development-brand-development', 'BRAND DEVELOPMENT'],
        ['/immigration-and-residency-solutions#immigration-residency-solutions-investor-visa-dubai', 'INVEST IN DUBAI'],
        ['/immigration-and-residency-solutions#immigration-residency-solutions-freelance-visa', 'FREELANCE VISA'],
        ['/digital-marketing-and-brand-development', 'DIGITAL MARKETING'],
        ['/ai-automation-and-technology-solutions', 'AI AUTOMATION'],
        ['/government-relations-and-pro-services', 'GOVERNMENT RELATIONS'],
        ['/digital-marketing-and-brand-development#web-digital-solutions-website-development', 'WEB DEVELOPMENT'],
        ['/immigration-and-residency-solutions#immigration-residency-solutions-residence-visa', 'RESIDENCY SOLUTION'],
        ['/digital-marketing-and-brand-development#digital-marketing-brand-development-marketing-solutions', 'MARKETING SOLUTION'],
    ];
    $serviceMarqueeSectionClass = trim('marquee__area ' . ($serviceMarqueeExtraClass ?? ''));
    $serviceMarqueeIconStyle = 'margin-left:-4px;width:34px;height:34px;display:inline-block;vertical-align:middle;margin-right:12px;position:relative;top:0px;color:#EE4C01;';
    ?>
<section class="<?php echo htmlspecialchars($serviceMarqueeSectionClass, ENT_QUOTES, 'UTF-8'); ?>">
    <div class="slider__marquee clearfix marquee-wrap">
        <div class="marquee_mode marquee__group">
            <?php foreach ($serviceMarqueeItems as [$serviceMarqueeHref, $serviceMarqueeLabel]) : ?>
                <h6 class="marquee__item">
                    <a href="<?php echo htmlspecialchars($serviceMarqueeHref, ENT_QUOTES, 'UTF-8'); ?>"><svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 500 500" fill="none" aria-hidden="true" focusable="false" style="<?php echo htmlspecialchars($serviceMarqueeIconStyle, ENT_QUOTES, 'UTF-8'); ?>">
                            <path fill="currentColor" d="M0 250C0 111.929 111.929 0 250 0h250v250c0 138.071-111.929 250-250 250S0 388.071 0 250Z"></path>
                        </svg><?php echo htmlspecialchars($serviceMarqueeLabel, ENT_QUOTES, 'UTF-8'); ?></a>
                </h6>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php
    return;
}
?>
<section class="marquee__area-three">
    <div class="slider__marquee clearfix marquee-wrap-two marquee-wrap-four">
        <div class="marquee_mode marquee__group">
            <h6 class="marquee__item marquee__item-two">
                <a href="/government-relations-and-pro-services"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 500 500" fill="none" class="w-10 h-10" aria-hidden="true" focusable="false">
                        <path fill="currentColor" d="M0 250C0 111.929 111.929 0 250 0h250v250c0 138.071-111.929 250-250 250S0 388.071 0 250Z" />
                    </svg>PRO SERVICES</a>
            </h6>
            <h6 class="marquee__item marquee__item-two">
                <a href="/uae-business-formation-structuring-and-compliance"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 500 500" fill="none" class="w-10 h-10" aria-hidden="true" focusable="false">
                        <path fill="currentColor" d="M0 250C0 111.929 111.929 0 250 0h250v250c0 138.071-111.929 250-250 250S0 388.071 0 250Z" />
                    </svg>BUSINESS SETUP</a>
            </h6>
            <h6 class="marquee__item marquee__item-two">
                <a href="/immigration-and-residency-solutions#immigration-residency-solutions-golden-visa-uae"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 500 500" fill="none" class="w-10 h-10" aria-hidden="true" focusable="false">
                        <path fill="currentColor" d="M0 250C0 111.929 111.929 0 250 0h250v250c0 138.071-111.929 250-250 250S0 388.071 0 250Z" />
                    </svg>GOLDEN VISA</a>
            </h6>
            <h6 class="marquee__item marquee__item-two">
                <a href="/uae-business-formation-structuring-and-compliance#business-bank-account-opening"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 500 500" fill="none" class="w-10 h-10" aria-hidden="true" focusable="false">
                        <path fill="currentColor" d="M0 250C0 111.929 111.929 0 250 0h250v250c0 138.071-111.929 250-250 250S0 388.071 0 250Z" />
                    </svg>BANK ACCOUNT OPENING</a>
            </h6>
            <h6 class="marquee__item marquee__item-two">
                <a href="/digital-marketing-and-brand-development#digital-marketing-brand-development-brand-development"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 500 500" fill="none" class="w-10 h-10" aria-hidden="true" focusable="false">
                        <path fill="currentColor" d="M0 250C0 111.929 111.929 0 250 0h250v250c0 138.071-111.929 250-250 250S0 388.071 0 250Z" />
                    </svg>BRAND DEVELOPMENT</a>
            </h6>
            <h6 class="marquee__item marquee__item-two">
                <a href="/immigration-and-residency-solutions#immigration-residency-solutions-investor-visa-dubai"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 500 500" fill="none" class="w-10 h-10" aria-hidden="true" focusable="false">
                        <path fill="currentColor" d="M0 250C0 111.929 111.929 0 250 0h250v250c0 138.071-111.929 250-250 250S0 388.071 0 250Z" />
                    </svg>INVEST IN DUBAI</a>
            </h6>
            <h6 class="marquee__item marquee__item-two">
                <a href="/immigration-and-residency-solutions#immigration-residency-solutions-freelance-visa"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 500 500" fill="none" class="w-10 h-10" aria-hidden="true" focusable="false">
                        <path fill="currentColor" d="M0 250C0 111.929 111.929 0 250 0h250v250c0 138.071-111.929 250-250 250S0 388.071 0 250Z" />
                    </svg>FREELANCE VISA</a>
            </h6>
            <h6 class="marquee__item marquee__item-two">
                <a href="/digital-marketing-and-brand-development"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 500 500" fill="none" class="w-10 h-10" aria-hidden="true" focusable="false">
                        <path fill="currentColor" d="M0 250C0 111.929 111.929 0 250 0h250v250c0 138.071-111.929 250-250 250S0 388.071 0 250Z" />
                    </svg>DIGITAL MARKETING</a>
            </h6>
            <h6 class="marquee__item marquee__item-two">
                <a href="/ai-automation-and-technology-solutions"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 500 500" fill="none" class="w-10 h-10" aria-hidden="true" focusable="false">
                        <path fill="currentColor" d="M0 250C0 111.929 111.929 0 250 0h250v250c0 138.071-111.929 250-250 250S0 388.071 0 250Z" />
                    </svg>AI AUTOMATION</a>
            </h6>
            <h6 class="marquee__item marquee__item-two">
                <a href="/government-relations-and-pro-services"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 500 500" fill="none" class="w-10 h-10" aria-hidden="true" focusable="false">
                        <path fill="currentColor" d="M0 250C0 111.929 111.929 0 250 0h250v250c0 138.071-111.929 250-250 250S0 388.071 0 250Z" />
                    </svg>GOVERNMENT RELATIONS</a>
            </h6>
            <h6 class="marquee__item marquee__item-two">
                <a href="/digital-marketing-and-brand-development#web-digital-solutions-website-development"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 500 500" fill="none" class="w-10 h-10" aria-hidden="true" focusable="false">
                        <path fill="currentColor" d="M0 250C0 111.929 111.929 0 250 0h250v250c0 138.071-111.929 250-250 250S0 388.071 0 250Z" />
                    </svg>WEB DEVELOPMENT</a>
            </h6>
            <h6 class="marquee__item marquee__item-two">
                <a href="/immigration-and-residency-solutions#immigration-residency-solutions-residence-visa"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 500 500" fill="none" class="w-10 h-10" aria-hidden="true" focusable="false">
                        <path fill="currentColor" d="M0 250C0 111.929 111.929 0 250 0h250v250c0 138.071-111.929 250-250 250S0 388.071 0 250Z" />
                    </svg>RESIDENCY SOLUTION</a>
            </h6>
            <h6 class="marquee__item marquee__item-two">
                <a href="/digital-marketing-and-brand-development#digital-marketing-brand-development-marketing-solutions"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 500 500" fill="none" class="w-10 h-10" aria-hidden="true" focusable="false">
                        <path fill="currentColor" d="M0 250C0 111.929 111.929 0 250 0h250v250c0 138.071-111.929 250-250 250S0 388.071 0 250Z" />
                    </svg>MARKETING SOLUTION</a>
            </h6>
        </div>
    </div>
</section>
