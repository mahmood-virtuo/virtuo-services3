(function () {
  "use strict";

  function initVirtuoMegaMenu() {
    document
      .querySelectorAll("[data-virtuo-mega-menu]")
      .forEach(function (megaMenu) {
        const categories = Array.from(
          megaMenu.querySelectorAll("[data-mega-category]"),
        );
        const panels = Array.from(
          megaMenu.querySelectorAll("[data-mega-panel]"),
        );

        if (!categories.length || !panels.length) return;

        function activateCategory(name) {
          categories.forEach(function (category) {
            category.classList.toggle(
              "is-active",
              category.dataset.megaCategory === name,
            );
          });

          panels.forEach(function (panel) {
            panel.classList.toggle(
              "is-active",
              panel.dataset.megaPanel === name,
            );
          });
        }

        categories.forEach(function (category) {
          category.addEventListener("mouseenter", function () {
            activateCategory(category.dataset.megaCategory);
          });

          category.addEventListener("focus", function () {
            activateCategory(category.dataset.megaCategory);
          });

          category.addEventListener("click", function (e) {
            e.preventDefault();
            activateCategory(category.dataset.megaCategory);
          });
        });

        const activeCategory =
          megaMenu.querySelector("[data-mega-category].is-active") ||
          categories[0];

        if (activeCategory) {
          activateCategory(activeCategory.dataset.megaCategory);
        }
      });
  }

  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", initVirtuoMegaMenu);
  } else {
    initVirtuoMegaMenu();
  }
})();
