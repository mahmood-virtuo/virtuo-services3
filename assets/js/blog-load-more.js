(function () {
  var list = document.querySelector("[data-blog-load-list]");

  if (!list) {
    return;
  }

  var items = Array.prototype.slice.call(list.querySelectorAll("[data-blog-load-item]"));
  var sentinel = list.querySelector("[data-blog-load-sentinel]");
  var loadButton = sentinel ? sentinel.querySelector(".blog-load-more-btn") : null;
  var initialCount = parseInt(list.getAttribute("data-blog-load-initial") || "5", 10);
  var batchSize = parseInt(list.getAttribute("data-blog-load-size") || "5", 10);
  var visibleCount = Number.isFinite(initialCount) && initialCount > 0 ? initialCount : 5;
  var revealCount = Number.isFinite(batchSize) && batchSize > 0 ? batchSize : 5;
  var observer = null;

  if (!items.length || !sentinel) {
    return;
  }

  function updateItems() {
    items.forEach(function (item, index) {
      item.classList.toggle("blog-load-hidden", index >= visibleCount);
    });

    if (visibleCount >= items.length) {
      sentinel.hidden = true;

      if (observer) {
        observer.disconnect();
      }
    } else {
      sentinel.hidden = false;
    }
  }

  function revealNextBatch() {
    visibleCount += revealCount;
    updateItems();
  }

  updateItems();

  if (loadButton) {
    loadButton.addEventListener("click", revealNextBatch);
  }

  if (!("IntersectionObserver" in window)) {
    items.forEach(function (item) {
      item.classList.remove("blog-load-hidden");
    });
    sentinel.hidden = true;
    return;
  }

  observer = new IntersectionObserver(
    function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          revealNextBatch();
        }
      });
    },
    {
      rootMargin: "300px 0px",
      threshold: 0,
    }
  );

  observer.observe(sentinel);
})();
