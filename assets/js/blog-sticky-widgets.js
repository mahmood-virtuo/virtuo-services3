(function () {
  "use strict";

  function initBlogStickyWidgets() {
    if (!document.body.classList.contains("blog-page")) return;

    var header = document.querySelector(
      "#sticky-header, .tg-header__area, .header__area, header"
    );
    var layout = document.querySelector(".blog-listing-layout");
    var widgets = [
      {
        slot: document.querySelector(".blog-left-recent-sticky-slot"),
        inner: document.querySelector(".blog-left-recent-sticky-inner"),
        boundary: document.querySelector(".blog-left-sidebar-column"),
      },
      {
        slot: document.querySelector(".blog-right-sticky-slot"),
        inner: document.querySelector(".blog-right-sticky-inner"),
        boundary: document.querySelector(".blog-right-sidebar-column"),
      },
    ].filter(function (item) {
      return item.slot && item.inner;
    });

    if (!layout || !widgets.length) return;

    var ticking = false;

    function getOffset() {
      var headerHeight = header ? header.getBoundingClientRect().height : 90;
      return headerHeight + 24;
    }

    function resetWidget(item) {
      item.inner.style.position = "";
      item.inner.style.top = "";
      item.inner.style.left = "";
      item.inner.style.width = "";
      item.inner.style.maxWidth = "";
      item.inner.style.zIndex = "";
      item.inner.style.boxSizing = "";
      item.inner.style.transform = "";
      item.slot.style.minHeight = "";
      item.slot.style.position = "";
    }

    function getBoundaryRect(item, scrollY) {
      var boundary = item.boundary;

      if (!boundary || boundary.offsetHeight <= item.inner.offsetHeight) {
        boundary = layout;
      }

      var boundaryRect = boundary.getBoundingClientRect();

      if (boundary.offsetHeight < layout.offsetHeight) {
        boundary = layout;
        boundaryRect = layout.getBoundingClientRect();
      }

      return {
        top: boundaryRect.top + scrollY,
        bottom: boundaryRect.top + scrollY + boundary.offsetHeight,
      };
    }

    function updateWidget(item) {
      resetWidget(item);

      if (window.innerWidth < 992) return;

      var scrollY = window.pageYOffset || document.documentElement.scrollTop;
      var offset = getOffset();
      var slotRect = item.slot.getBoundingClientRect();
      var slotTop = slotRect.top + scrollY;
      var innerHeight = item.inner.offsetHeight;
      var boundary = getBoundaryRect(item, scrollY);
      var stopPoint = boundary.bottom - innerHeight - offset;

      item.slot.style.position = "relative";
      item.slot.style.minHeight = innerHeight + "px";

      if (scrollY + offset < slotTop) return;

      if (scrollY > stopPoint) {
        item.inner.style.position = "absolute";
        item.inner.style.top =
          Math.max(0, boundary.bottom - slotTop - innerHeight) + "px";
        item.inner.style.left = "0";
        item.inner.style.width = "100%";
        item.inner.style.maxWidth = "100%";
        item.inner.style.zIndex = "3";
        item.inner.style.boxSizing = "border-box";
        return;
      }

      item.inner.style.position = "fixed";
      item.inner.style.top = offset + "px";
      item.inner.style.left = slotRect.left + "px";
      item.inner.style.width = slotRect.width + "px";
      item.inner.style.maxWidth = slotRect.width + "px";
      item.inner.style.zIndex = "3";
      item.inner.style.boxSizing = "border-box";
    }

    function updateAll() {
      ticking = false;
      widgets.forEach(updateWidget);
    }

    function requestUpdate() {
      if (ticking) return;

      ticking = true;
      window.requestAnimationFrame(updateAll);
    }

    window.addEventListener("scroll", requestUpdate, { passive: true });
    window.addEventListener("resize", requestUpdate);
    window.addEventListener("load", requestUpdate);

    requestUpdate();
    window.setTimeout(requestUpdate, 300);
    window.setTimeout(requestUpdate, 1000);
  }

  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", initBlogStickyWidgets);
  } else {
    initBlogStickyWidgets();
  }
})();
