(function () {
  function initBlogStickyForm() {
    if (!document.body.classList.contains("blog-page")) return;

    var slot = document.querySelector(".blog-sidebar-sticky-slot");
    var inner = document.querySelector(".blog-sidebar-sticky-inner");
    var column = document.querySelector(".blog-sidebar-column");
    var header = document.querySelector(".header__area, .tg-header__area, header");

    if (!slot || !inner || !column) return;

    function resetSticky() {
      inner.style.position = "";
      inner.style.top = "";
      inner.style.left = "";
      inner.style.width = "";
      inner.style.maxWidth = "";
      inner.style.zIndex = "";
      inner.style.boxSizing = "";
      inner.style.transform = "";
    }

    function updateSticky() {
      if (window.innerWidth < 992) {
        resetSticky();
        slot.style.minHeight = "";
        return;
      }

      var scrollY = window.pageYOffset || document.documentElement.scrollTop;
      var headerHeight = header ? header.getBoundingClientRect().height : 90;
      var offset = headerHeight + 40;

      resetSticky();

      var slotRect = slot.getBoundingClientRect();
      var columnRect = column.getBoundingClientRect();

      var slotTop = slotRect.top + scrollY;
      var columnTop = columnRect.top + scrollY;
      var columnBottom = columnTop + column.offsetHeight;
      var formHeight = inner.offsetHeight;
      var stopPoint = columnBottom - formHeight - offset;

      slot.style.minHeight = formHeight + "px";

      if (scrollY + offset < slotTop) {
        resetSticky();
        slot.style.minHeight = formHeight + "px";
        return;
      }

      if (scrollY > stopPoint) {
        var absoluteTop = columnBottom - slotTop - formHeight;

        inner.style.position = "absolute";
        inner.style.top = absoluteTop + "px";
        inner.style.left = "0";
        inner.style.width = "100%";
        inner.style.maxWidth = "100%";
        inner.style.boxSizing = "border-box";
        inner.style.zIndex = "1";
        return;
      }

      inner.style.position = "fixed";
      inner.style.top = offset + "px";
      inner.style.left = slotRect.left + "px";
      inner.style.width = slotRect.width + "px";
      inner.style.maxWidth = slotRect.width + "px";
      inner.style.boxSizing = "border-box";
      inner.style.zIndex = "1";
    }

    window.addEventListener("scroll", updateSticky, { passive: true });
    window.addEventListener("resize", updateSticky);
    window.addEventListener("load", updateSticky);

    setTimeout(updateSticky, 300);
  }

  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", initBlogStickyForm);
  } else {
    initBlogStickyForm();
  }
})();
