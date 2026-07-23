<?php require_once __DIR__ . '/asset-helper.php'; ?>
<!-- JS here -->
<script src="<?php echo htmlspecialchars(virtuo_asset_url('/assets/js/vendor/jquery-3.6.0.min.js'), ENT_QUOTES, 'UTF-8'); ?>"></script>
<script src="<?php echo htmlspecialchars(virtuo_asset_url('/assets/js/bootstrap.min.js'), ENT_QUOTES, 'UTF-8'); ?>"></script>
<?php if (!empty($loadMagnificPopupAssets)) : ?>
<script src="<?php echo htmlspecialchars(virtuo_asset_url('/assets/js/jquery.magnific-popup.min.js'), ENT_QUOTES, 'UTF-8'); ?>"></script>
<?php endif; ?>
<?php if (!empty($loadSwiperAssets)) : ?>
<script src="<?php echo htmlspecialchars(virtuo_asset_url('/assets/js/swiper-bundle.min.js'), ENT_QUOTES, 'UTF-8'); ?>"></script>
<?php endif; ?>
<?php if (!empty($loadJqueryMarquee)) : ?>
<script src="<?php echo htmlspecialchars(virtuo_asset_url('/assets/js/jquery.marquee.min.js'), ENT_QUOTES, 'UTF-8'); ?>"></script>
<?php endif; ?>
    <?php $tgCursorScriptUrl = virtuo_asset_url('/assets/js/tg-cursor.min.js'); ?>
    <script>
        (function () {
            if (
                !window.matchMedia ||
                !window.matchMedia("(hover: hover) and (pointer: fine)").matches ||
                window.matchMedia("(prefers-reduced-motion: reduce)").matches
            ) {
                return;
            }

            var tgCursorScriptUrl = <?php echo json_encode($tgCursorScriptUrl, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT); ?>;

            if (document.querySelector('script[src="' + tgCursorScriptUrl + '"]')) {
                return;
            }

            var script = document.createElement("script");
            script.src = tgCursorScriptUrl;
            script.async = true;
            document.head.appendChild(script);
        })();
    </script>
    <script src="<?php echo htmlspecialchars(virtuo_asset_url('/assets/js/ajax-form.min.js'), ENT_QUOTES, 'UTF-8'); ?>"></script>
    <script src="<?php echo htmlspecialchars(virtuo_asset_url('/assets/js/svg-inject.min.js'), ENT_QUOTES, 'UTF-8'); ?>"></script>
    <?php if (!empty($loadWowAssets)) : ?>
    <script src="<?php echo htmlspecialchars(virtuo_asset_url('/assets/js/wow.min.js'), ENT_QUOTES, 'UTF-8'); ?>"></script>
    <?php endif; ?>
    <script src="<?php echo htmlspecialchars(virtuo_asset_url('/assets/js/aos.js'), ENT_QUOTES, 'UTF-8'); ?>"></script>
    <script src="<?php echo htmlspecialchars(virtuo_asset_url('/assets/js/main.min.js'), ENT_QUOTES, 'UTF-8'); ?>"></script>
    <script src="<?php echo htmlspecialchars(virtuo_asset_url('/assets/js/virtuo-performance.min.js'), ENT_QUOTES, 'UTF-8'); ?>"></script>
    <script src="<?php echo htmlspecialchars(virtuo_asset_url('/assets/js/virtuo-mega-menu.min.js'), ENT_QUOTES, 'UTF-8'); ?>"></script>
<?php if (!empty($deferHomepageFooterPhoneAssets)) : ?>
<?php
$virtuoHomeFooterPhoneLoaderUrl = virtuo_asset_url('/assets/js/virtuo-home-footer-phone-loader.min.js');
$virtuoIntlTelStylesheetUrl = 'https://cdn.jsdelivr.net/npm/intl-tel-input@25.3.1/build/css/intlTelInput.css';
$virtuoIntlTelScriptUrl = 'https://cdn.jsdelivr.net/npm/intl-tel-input@25.3.1/build/js/intlTelInput.min.js';
$virtuoFooterPhoneScriptUrl = virtuo_asset_url('/assets/js/virtuo-footer-phone.min.js');
?>
<script
    src="<?php echo htmlspecialchars($virtuoHomeFooterPhoneLoaderUrl, ENT_QUOTES, 'UTF-8'); ?>"
    data-phone-stylesheet-url="<?php echo htmlspecialchars($virtuoIntlTelStylesheetUrl, ENT_QUOTES, 'UTF-8'); ?>"
    data-phone-library-url="<?php echo htmlspecialchars($virtuoIntlTelScriptUrl, ENT_QUOTES, 'UTF-8'); ?>"
    data-phone-initializer-url="<?php echo htmlspecialchars($virtuoFooterPhoneScriptUrl, ENT_QUOTES, 'UTF-8'); ?>"
></script>
<?php
unset(
    $virtuoHomeFooterPhoneLoaderUrl,
    $virtuoIntlTelStylesheetUrl,
    $virtuoIntlTelScriptUrl,
    $virtuoFooterPhoneScriptUrl
);
?>
<?php else : ?>
<script src="https://cdn.jsdelivr.net/npm/intl-tel-input@25.3.1/build/js/intlTelInput.min.js"></script>
<script src="<?php echo htmlspecialchars(virtuo_asset_url('/assets/js/virtuo-footer-phone.min.js'), ENT_QUOTES, 'UTF-8'); ?>"></script>
<?php endif; ?>
<?php if (!empty($loadVirtuoServiceTabsBreadcrumb)) : ?>
<script src="<?php echo htmlspecialchars(virtuo_asset_url('/assets/js/virtuo-service-tabs-breadcrumb.min.js'), ENT_QUOTES, 'UTF-8'); ?>"></script>
<?php endif; ?>

<script>
    if (typeof SVGInject === "function") {
        SVGInject(document.querySelectorAll("img.injectable"));
    }

    document.querySelectorAll(".circle.rotateme, .circle-two.rotateme").forEach(function(el) {
        const originalText = (el.getAttribute("data-circle-text") || el.textContent || "").trim();

        if (!originalText) return;

        el.setAttribute("data-circle-text", originalText);
        el.innerHTML = "";

        const chars = originalText.split("");
        const angle = 360 / chars.length;

        chars.forEach(function(char, index) {
            const span = document.createElement("span");
            span.textContent = char;
            span.style.transform = "rotate(" + index * angle + "deg)";
            el.appendChild(span);
        });
    });
</script>

<!-- for tabs  -->
