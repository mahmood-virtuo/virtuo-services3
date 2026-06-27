(function () {
  function slugify(text) {
    return text
      .toLowerCase()
      .trim()
      .replace(/&/g, " and ")
      .replace(/[^a-z0-9]+/g, "-")
      .replace(/^-+|-+$/g, "");
  }

  function alpha(index) {
    var letters = "";
    var value = index;

    while (value > 0) {
      value -= 1;
      letters = String.fromCharCode(97 + (value % 26)) + letters;
      value = Math.floor(value / 26);
    }

    return letters;
  }

  function initBlogToc() {
    var article = document.getElementById("blogDetailsArticle");
    var toc = document.getElementById("blogArticleToc");

    if (!article || !toc) return;

    var headings = Array.prototype.slice
      .call(article.querySelectorAll("h2, h3, h4"))
      .filter(function (heading) {
        var text = heading.textContent.trim();
        if (!text) return false;
        if (heading.closest(".blog__details-bottom, .blog__avatar-wrap, form, [hidden]")) return false;
        return true;
      });

    if (!headings.length) return;

    var usedIds = {};
    var h2Count = 0;
    var h3Count = 0;
    var h4Count = 0;
    var h3IsExplicit = false;
    var activeLinks = [];

    headings.forEach(function (heading) {
      var text = heading.textContent.trim();
      var level = heading.tagName.toLowerCase();
      var number;

      if (level === "h2") {
        h2Count += 1;
        h3Count = 0;
        h4Count = 0;
        h3IsExplicit = false;
        number = String(h2Count);
      } else if (level === "h3") {
        if (!h2Count) h2Count = 1;
        h3Count += 1;
        h4Count = 0;
        h3IsExplicit = true;
        number = h2Count + "." + h3Count;
      } else {
        if (!h2Count) h2Count = 1;
        if (!h3Count || !h3IsExplicit) {
          h3Count += 1;
          h4Count = 0;
          h3IsExplicit = false;
          number = h2Count + "." + h3Count;
        } else {
          h4Count += 1;
          number = h2Count + "." + h3Count + alpha(h4Count);
        }
      }

      if (!heading.id) {
        var baseId = slugify(text) || "article-section";
        var nextId = baseId;
        var index = 2;

        while (document.getElementById(nextId) || usedIds[nextId]) {
          nextId = baseId + "-" + index;
          index += 1;
        }

        heading.id = nextId;
        usedIds[nextId] = true;
      }

      var item = document.createElement("li");
      var link = document.createElement("a");

      item.className = "blog-toc__item blog-toc__item--" + level;
      link.href = "#" + heading.id;
      link.innerHTML = '<span class="blog-toc__num">' + number + '</span><span class="blog-toc__text"></span>';
      link.querySelector(".blog-toc__text").textContent = text;

      link.addEventListener("click", function (event) {
        event.preventDefault();

        var offset = 120;
        var targetTop = heading.getBoundingClientRect().top + window.pageYOffset - offset;

        window.scrollTo({
          top: targetTop,
          behavior: "smooth"
        });

        history.pushState(null, "", "#" + heading.id);
      });

      item.appendChild(link);
      toc.appendChild(item);
      activeLinks.push({ heading: heading, link: link });
    });

    function updateActiveLink() {
      var offset = 130;
      var current = activeLinks[0];

      activeLinks.forEach(function (entry) {
        if (entry.heading.getBoundingClientRect().top - offset <= 0) {
          current = entry;
        }
      });

      activeLinks.forEach(function (entry) {
        entry.link.classList.toggle("is-active", entry === current);
      });
    }

    window.addEventListener("scroll", updateActiveLink, { passive: true });
    window.addEventListener("resize", updateActiveLink);
    updateActiveLink();
  }

  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", initBlogToc);
  } else {
    initBlogToc();
  }
})();
