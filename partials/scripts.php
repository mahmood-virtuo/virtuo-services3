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