(function () {
  "use strict";

  function getResponsiveBackground(element) {
    var mobileBackground = element.getAttribute("data-lazy-background-mobile");

    if (mobileBackground && window.matchMedia && window.matchMedia("(max-width: 767px)").matches) {
      return mobileBackground;
    }

    return element.getAttribute("data-lazy-background");
  }

  function applyLazyBackground(element) {
    var background = getResponsiveBackground(element);

    if (!background || element.dataset.lazyBackgroundLoaded === "true") {
      return;
    }

    var image = new Image();
    image.onload = function () {
      element.style.backgroundImage = "url(" + background + ")";
      element.dataset.lazyBackgroundLoaded = "true";
    };
    image.src = background;
  }

  function loadLazyBackgrounds() {
    document.querySelectorAll("[data-lazy-background]").forEach(applyLazyBackground);
  }

  function scheduleLazyBackgrounds() {
    if ("requestIdleCallback" in window) {
      window.requestIdleCallback(loadLazyBackgrounds, { timeout: 1200 });
      return;
    }

    window.setTimeout(loadLazyBackgrounds, 400);
  }

  function improveSliderBulletLabels() {
    document
      .querySelectorAll(".slider__bar-pagination .swiper-pagination-bullet")
      .forEach(function (bullet, index) {
        bullet.setAttribute("role", "button");
        bullet.setAttribute("tabindex", "0");
        bullet.setAttribute("aria-label", "Go to slide " + (index + 1));
      });
  }

  document.addEventListener("DOMContentLoaded", function () {
    scheduleLazyBackgrounds();
    improveSliderBulletLabels();
  });

  window.addEventListener("load", function () {
    loadLazyBackgrounds();
    improveSliderBulletLabels();
  });
})();
