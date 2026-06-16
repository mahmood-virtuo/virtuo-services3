<!-- JS here -->
<script src="assets/js/vendor/jquery-3.6.0.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.magnific-popup.min.js"></script>
<script src="assets/js/jquery.odometer.min.js"></script>
<script src="assets/js/jquery.appear.js"></script>
<script src="assets/js/swiper-bundle.min.js"></script>
<script src="assets/js/jquery.parallaxScroll.min.js"></script>
<script src="assets/js/jquery.marquee.min.js"></script>
<script src="assets/js/tg-cursor.min.js"></script>
<script src="assets/js/ajax-form.js"></script>
<script src="assets/js/svg-inject.min.js"></script>
<script src="assets/js/wow.min.js"></script>
<script src="assets/js/aos.js"></script>
<script src="assets/js/main.js"></script>
<script src="assets/js/virtuo-mega-menu.js"></script>
<script src="assets/js/virtuo-phone-field.js"></script>

<script>
    if (typeof SVGInject === "function") {
        SVGInject(document.querySelectorAll("img.injectable"));
    }

    document.querySelectorAll(".circle.rotateme, .circle-two.rotateme").forEach(function (el) {
        const originalText = (el.getAttribute("data-circle-text") || el.textContent || "").trim();

        if (!originalText) return;

        el.setAttribute("data-circle-text", originalText);
        el.innerHTML = "";

        const chars = originalText.split("");
        const angle = 360 / chars.length;

        chars.forEach(function (char, index) {
            const span = document.createElement("span");
            span.textContent = char;
            span.style.transform = "rotate(" + index * angle + "deg)";
            el.appendChild(span);
        });
    });
</script>

<!-- for tabs  -->
 <script>
(function () {
    const tabLinks = document.querySelectorAll(".service-tab-link");
    const tabPanels = document.querySelectorAll(".service-tab-panel");

    if (!tabLinks.length || !tabPanels.length) return;

    function activateServiceTab(tabName) {
        tabLinks.forEach(function (link) {
            link.classList.toggle("is-active", link.getAttribute("data-service-tab") === tabName);
        });

        tabPanels.forEach(function (panel) {
            panel.classList.toggle("is-active", panel.getAttribute("data-service-panel") === tabName);
        });
    }

    tabLinks.forEach(function (link) {
        link.addEventListener("click", function (e) {
            e.preventDefault();

            const tabName = link.getAttribute("data-service-tab");

            if (!tabName) return;

            activateServiceTab(tabName);
            history.replaceState(null, "", "#" + tabName);
        });
    });

    const hashTab = window.location.hash.replace("#", "");
    const defaultTab = document.querySelector(".service-tab-link.is-active")?.getAttribute("data-service-tab") || "mainland";

    activateServiceTab(hashTab || defaultTab);
})();
</script>