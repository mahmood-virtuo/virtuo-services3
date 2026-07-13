<?php require_once __DIR__ . '/asset-helper.php'; ?>
<!-- JS here -->
<script src="<?php echo htmlspecialchars(virtuo_asset_url('/assets/js/vendor/jquery-3.6.0.min.js'), ENT_QUOTES, 'UTF-8'); ?>"></script>
<script src="<?php echo htmlspecialchars(virtuo_asset_url('/assets/js/bootstrap.min.js'), ENT_QUOTES, 'UTF-8'); ?>"></script>
<script src="<?php echo htmlspecialchars(virtuo_asset_url('/assets/js/jquery.magnific-popup.min.js'), ENT_QUOTES, 'UTF-8'); ?>"></script>
<script src="<?php echo htmlspecialchars(virtuo_asset_url('/assets/js/jquery.odometer.min.js'), ENT_QUOTES, 'UTF-8'); ?>"></script>
<script src="<?php echo htmlspecialchars(virtuo_asset_url('/assets/js/jquery.appear.js'), ENT_QUOTES, 'UTF-8'); ?>"></script>
<?php if (!empty($loadSwiperAssets)) : ?>
<script src="<?php echo htmlspecialchars(virtuo_asset_url('/assets/js/swiper-bundle.min.js'), ENT_QUOTES, 'UTF-8'); ?>"></script>
<?php endif; ?>
<script src="<?php echo htmlspecialchars(virtuo_asset_url('/assets/js/jquery.marquee.min.js'), ENT_QUOTES, 'UTF-8'); ?>"></script>
    <script src="<?php echo htmlspecialchars(virtuo_asset_url('/assets/js/tg-cursor.min.js'), ENT_QUOTES, 'UTF-8'); ?>"></script>
    <script src="<?php echo htmlspecialchars(virtuo_asset_url('/assets/js/ajax-form.js'), ENT_QUOTES, 'UTF-8'); ?>"></script>
    <script src="<?php echo htmlspecialchars(virtuo_asset_url('/assets/js/svg-inject.min.js'), ENT_QUOTES, 'UTF-8'); ?>"></script>
    <script src="<?php echo htmlspecialchars(virtuo_asset_url('/assets/js/wow.min.js'), ENT_QUOTES, 'UTF-8'); ?>"></script>
    <script src="<?php echo htmlspecialchars(virtuo_asset_url('/assets/js/aos.js'), ENT_QUOTES, 'UTF-8'); ?>"></script>
    <script src="<?php echo htmlspecialchars(virtuo_asset_url('/assets/js/main.js'), ENT_QUOTES, 'UTF-8'); ?>"></script>
    <script src="<?php echo htmlspecialchars(virtuo_asset_url('/assets/js/virtuo-performance.js'), ENT_QUOTES, 'UTF-8'); ?>"></script>
    <script src="<?php echo htmlspecialchars(virtuo_asset_url('/assets/js/virtuo-mega-menu.js'), ENT_QUOTES, 'UTF-8'); ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/intl-tel-input@25.3.1/build/js/intlTelInput.min.js"></script>
<script src="<?php echo htmlspecialchars(virtuo_asset_url('/assets/js/virtuo-footer-phone.js'), ENT_QUOTES, 'UTF-8'); ?>"></script>
<?php if (!empty($loadVirtuoServiceTabsBreadcrumb)) : ?>
<script src="<?php echo htmlspecialchars(virtuo_asset_url('/assets/js/virtuo-service-tabs-breadcrumb.js'), ENT_QUOTES, 'UTF-8'); ?>"></script>
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
