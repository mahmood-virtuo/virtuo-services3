(function () {
  "use strict";

  if ("scrollRestoration" in history) {
    history.scrollRestoration = "manual";
  }

  function escapeSelector(value) {
    if (window.CSS && typeof window.CSS.escape === "function") {
      return window.CSS.escape(value);
    }

    return String(value).replace(/["\\]/g, "\\$&");
  }

  function cleanText(element) {
    if (!element) return "";

    const clone = element.cloneNode(true);

    clone
      .querySelectorAll(".digital-service-arrow, span, svg, img, i")
      .forEach(function (item) {
        item.remove();
      });

    return clone.textContent.replace(/\s+/g, " ").trim();
  }

  function getLinkTitle(link) {
    if (!link) return "";

    return (
      link.getAttribute("data-breadcrumb-title") ||
      link.getAttribute("data-service-title") ||
      cleanText(link)
    );
  }

  function updateServiceBreadcrumb(mainText, subText) {
    const breadcrumb = document.querySelector(".service-breadcrumb");

    if (!breadcrumb) return;

    const main = breadcrumb.querySelector(".js-service-breadcrumb-main");
    const sub = breadcrumb.querySelector(".js-service-breadcrumb-sub");
    const subSeparator = breadcrumb.querySelector(
      ".js-service-breadcrumb-sub-separator",
    );

    if (!main) return;

    main.textContent = mainText || "";

    if (sub && subSeparator && subText) {
      sub.textContent = subText;
      sub.style.display = "inline";
      subSeparator.style.display = "inline";
    } else if (sub && subSeparator) {
      sub.textContent = "";
      sub.style.display = "none";
      subSeparator.style.display = "none";
    }
  }

  function getServicePanel(panelId) {
    return (
      document.querySelector(
        '.service-tab-panel[data-service-panel="' +
          escapeSelector(panelId) +
          '"]',
      ) || document.getElementById(panelId)
    );
  }

  function getHeaderOffset() {
    const header =
      document.querySelector("#sticky-header") ||
      document.querySelector(".tg-header__area") ||
      document.querySelector("header");
    const fallbackOffset = 115;

    if (!header) return fallbackOffset;

    const headerHeight = Math.ceil(header.getBoundingClientRect().height);

    return headerHeight > 0 ? headerHeight + 20 : fallbackOffset;
  }

  function getPanelScrollTarget(panel) {
    if (!panel) return null;

    return (
      panel.querySelector(".services__details-content-top") ||
      panel.querySelector(".services__details-wrap") ||
      panel.closest(".services__details-wrap") ||
      panel
    );
  }

  function scrollToServicePanel(panel, behavior) {
    const target = getPanelScrollTarget(panel);

    if (!target) return;

    const top =
      target.getBoundingClientRect().top + window.pageYOffset - getHeaderOffset();

    window.scrollTo({
      top: Math.max(0, top),
      behavior: behavior || "smooth",
    });
  }

  function scheduleServicePanelScroll(panel, behavior) {
    if (!panel) return;

    requestAnimationFrame(function () {
      window.setTimeout(function () {
        scrollToServicePanel(panel, behavior);
      }, 40);
    });
  }

  function scrollPageTopAfterTabActivation() {
    requestAnimationFrame(function () {
      window.setTimeout(function () {
        window.scrollTo({ top: 0, left: 0, behavior: "auto" });
      }, 40);
    });
  }

  function getRequestedTab() {
    const tab = new URLSearchParams(window.location.search).get("tab");

    return tab || window.location.hash.replace("#", "");
  }

  function getTabUrl(tabName) {
    const url = new URL(window.location.href);

    url.searchParams.set("tab", tabName);
    url.hash = "";

    return url.pathname + url.search;
  }

  function pushTabUrl(tabName) {
    if (!tabName || !history.pushState) return;

    history.pushState(null, "", getTabUrl(tabName));
  }

  function replaceTabUrl(tabName) {
    if (!tabName || !history.replaceState) return;

    history.replaceState(null, "", getTabUrl(tabName));
  }

  function isSamePageHashLink(link) {
    if (!link) return false;

    const href = link.getAttribute("href");

    if (!href || href.charAt(0) === "#") return false;

    try {
      const url = new URL(href, window.location.href);
      const currentPath = window.location.pathname.replace(/\/+$/, "") || "/";
      const targetPath = url.pathname.replace(/\/+$/, "") || "/";

      return Boolean(
        url.hash &&
          url.origin === window.location.origin &&
          targetPath === currentPath,
      );
    } catch (error) {
      return false;
    }
  }

  function showOnlyPanel(panelId) {
    const panels = document.querySelectorAll(".service-tab-panel");
    let activePanel = null;

    panels.forEach(function (panel) {
      const isActive =
        panel.id === panelId ||
        panel.getAttribute("data-service-panel") === panelId;

      panel.classList.toggle("is-active", isActive);
      panel.style.display = isActive ? "block" : "none";

      if (isActive) {
        activePanel = panel;
      }
    });

    return activePanel || getServicePanel(panelId);
  }

  function fadePanel(panel, callback) {
    if (!panel) {
      if (typeof callback === "function") callback();
      return;
    }

    panel.classList.add("digital-panel-changing");

    window.setTimeout(function () {
      if (typeof callback === "function") {
        callback();
      }

      panel.classList.remove("digital-panel-changing");
      panel.classList.add("digital-panel-ready");

      window.setTimeout(function () {
        panel.classList.remove("digital-panel-ready");
      }, 260);
    }, 120);
  }

  function updatePanelContent(panel, mainTitle, subTitle) {
    if (!panel || !subTitle) return;

    const serviceName = subTitle;
    const categoryName = mainTitle;

    const topBlock = panel.querySelector(".services__details-content-top");
    const eyebrow = topBlock ? topBlock.querySelector("p") : null;
    const heading = topBlock
      ? topBlock.querySelector("h2.title, .title")
      : null;
    const topParagraphs = topBlock
      ? Array.from(topBlock.querySelectorAll("p"))
      : [];

    if (eyebrow) {
      eyebrow.textContent = serviceName + " In The UAE";
    }

    if (heading) {
      heading.textContent = serviceName + " Built Around Your Business Needs";
    }

    if (topParagraphs[1]) {
      topParagraphs[1].textContent =
        serviceName +
        " requires the right strategy, clear execution, and consistent optimization to support your business growth.";
    }

    if (topParagraphs[2]) {
      topParagraphs[2].textContent =
        "Virtuo supports your " +
        serviceName.toLowerCase() +
        " requirements as part of our " +
        categoryName.toLowerCase() +
        " service, helping your business improve visibility, presentation, leads, and digital performance.";
    }

    const thumbImg = panel.querySelector(".services__details-thumb img");

    if (thumbImg) {
      thumbImg.alt = serviceName;
    }

    const titleTwo = panel.querySelector(
      ".services__details-content .title-two",
    );

    if (titleTwo) {
      titleTwo.textContent = "Our " + serviceName + " Support Includes";
    }

    const pointTitles = panel.querySelectorAll(
      ".services__details-content .info-one b",
    );
    const pointDescriptions = panel.querySelectorAll(
      ".services__details-content .info-two",
    );

    const titles = [
      serviceName + " Discovery And Audit",
      serviceName + " Strategy Planning",
      serviceName + " Creative And Content Direction",
      serviceName + " Implementation",
      serviceName + " Tracking And Reporting",
      serviceName + " Optimization Support",
    ];

    const descriptions = [
      "We review your current business position, audience, assets, competitors, and goals before planning the right approach.",
      "We define the structure, messaging, content direction, conversion path, and priorities for execution.",
      "We prepare the required copy, visuals, creative direction, page content, campaign assets, or brand material.",
      "We configure, publish, launch, or deliver the required work based on the selected service scope.",
      "We track performance indicators such as visibility, traffic, engagement, enquiries, leads, and conversion activity.",
      "We improve the strategy, content, creative assets, pages, or campaigns based on actual performance data.",
    ];

    pointTitles.forEach(function (item, index) {
      if (titles[index]) {
        item.textContent = index + 1 + ". " + titles[index];
      }
    });

    pointDescriptions.forEach(function (item, index) {
      if (descriptions[index]) {
        item.textContent = descriptions[index];
      }
    });

    const whyTitle = panel.querySelector(
      ".work__area-two .services__details-content-top h2.title",
    );

    if (whyTitle) {
      whyTitle.textContent = "Why Choose Virtuo For " + serviceName + "?";
    }

    const faqFirstButton = panel.querySelector(".faq__wrap .accordion-button");

    if (faqFirstButton) {
      faqFirstButton.textContent =
        "1. What is included in " + serviceName + "?";
    }
  }

  function initSimpleServiceTabs() {
    const tabLinks = Array.from(
      document.querySelectorAll(".service-tab-link[data-service-tab]"),
    );
    const tabPanels = Array.from(
      document.querySelectorAll(".service-tab-panel"),
    );

    if (!tabLinks.length || !tabPanels.length) return;

    function activateServiceTab(tabName, shouldScroll) {
      const targetPanel = getServicePanel(tabName);
      const targetLink = tabLinks.find(function (link) {
        return link.getAttribute("data-service-tab") === tabName;
      });

      if (!targetPanel || !targetLink) return false;

      tabLinks.forEach(function (link) {
        link.classList.toggle(
          "is-active",
          link.getAttribute("data-service-tab") === tabName,
        );
      });

      tabPanels.forEach(function (panel) {
        const isActive =
          panel.id === tabName ||
          panel.getAttribute("data-service-panel") === tabName;

        panel.classList.toggle("is-active", isActive);
        panel.style.display = isActive ? "block" : "none";
      });

      updateServiceBreadcrumb(getLinkTitle(targetLink), "");

      if (shouldScroll) {
        scheduleServicePanelScroll(targetPanel);
      }

      return true;
    }

    function activateHashTab(shouldScroll) {
      const requestedTab = getRequestedTab();
      const defaultTab =
        document
          .querySelector(".service-tab-link.is-active")
          ?.getAttribute("data-service-tab") ||
        tabLinks[0]?.getAttribute("data-service-tab");

      const activeTab = requestedTab || defaultTab;

      if (!activeTab) return;

      const activated = activateServiceTab(activeTab, false);

      if (activated && requestedTab && shouldScroll) {
        replaceTabUrl(activeTab);
        scrollPageTopAfterTabActivation();
      }
    }

    tabLinks.forEach(function (link) {
      link.addEventListener("click", function (event) {
        event.preventDefault();

        const tabName = link.getAttribute("data-service-tab");

        if (!tabName) return;

        if (!activateServiceTab(tabName, false)) return;

        pushTabUrl(tabName);
        scrollPageTopAfterTabActivation();
      });
    });

    document.addEventListener("click", function (event) {
      const link = event.target.closest("a[href*='#']");

      if (!isSamePageHashLink(link)) return;

      const hashTab = new URL(link.getAttribute("href"), window.location.href)
        .hash.replace("#", "");

      if (!hashTab || !getServicePanel(hashTab)) return;

      event.preventDefault();

      if (activateServiceTab(hashTab, false)) {
        pushTabUrl(hashTab);
        scrollPageTopAfterTabActivation();
      }
    });

    activateHashTab(Boolean(getRequestedTab()));

    window.addEventListener("hashchange", function () {
      activateHashTab(true);
    });

    window.addEventListener("popstate", function () {
      activateHashTab(true);
    });

    window.addEventListener("load", function () {
      activateHashTab(Boolean(getRequestedTab()));
    });
  }

  function initNestedDigitalServiceTabs() {
    const mainLinks = Array.from(
      document.querySelectorAll(".digital-service-main-link[data-service-tab]"),
    );
    const subLinks = Array.from(
      document.querySelectorAll(".digital-service-sub-link[data-parent-tab]"),
    );
    const panels = Array.from(document.querySelectorAll(".service-tab-panel"));
    //NewlyAddedCodeStartsHere
    const mainPanelOriginalContent = new Map();

    panels.forEach(function (panel) {
      const panelId = panel.getAttribute("data-service-panel") || panel.id;

      if (panelId) {
        mainPanelOriginalContent.set(panelId, panel.innerHTML);
      }
    });

    function restoreMainPanelContent(panelId) {
      const panel = getServicePanel(panelId);
      const originalContent = mainPanelOriginalContent.get(panelId);

      if (panel && typeof originalContent === "string") {
        panel.innerHTML = originalContent;
      }

      return panel;
    }
    //NewlyAddedCodeEndsHere
    if (!mainLinks.length || !panels.length) return;

    function closeAllMainItems() {
      document
        .querySelectorAll(".digital-service-main-item")
        .forEach(function (item) {
          item.classList.remove("is-open");
        });
    }

    function clearActiveLinks() {
      mainLinks.forEach(function (link) {
        link.classList.remove("is-active");
      });

      subLinks.forEach(function (link) {
        link.classList.remove("is-active");
      });
    }

    function openMain(mainLink, allowToggleClose, shouldScroll) {
      const mainItem = mainLink.closest(".digital-service-main-item");
      const panelId = mainLink.getAttribute("data-service-tab");
      const wasOpen = mainItem && mainItem.classList.contains("is-open");
      const mainTitle = getLinkTitle(mainLink);

      if (allowToggleClose && wasOpen) {
        closeAllMainItems();
        clearActiveLinks();

        mainLink.classList.add("is-active");

        // const panel = showOnlyPanel(panelId);
        //NewlyAddedCodeStartsHere
        const panel = showOnlyPanel(panelId);
        restoreMainPanelContent(panelId);
        //NewlyAddedCodeEndsHere
        fadePanel(panel, function () {
          updateServiceBreadcrumb(mainTitle, "");
        });

        if (history.replaceState) {
          // history.replaceState(null, "", "#" + panelId);
        }

        if (shouldScroll && panel) {
          scheduleServicePanelScroll(panel);
        }

        return;
      }

      closeAllMainItems();
      clearActiveLinks();

      if (mainItem) {
        mainItem.classList.add("is-open");
      }

      mainLink.classList.add("is-active");

      //   const panel = showOnlyPanel(panelId);
      //NewlyAddedCodeStartsHere
      const panel = showOnlyPanel(panelId);
      restoreMainPanelContent(panelId);
      //NewlyAddedCodeEndsHere
      fadePanel(panel, function () {
        updateServiceBreadcrumb(mainTitle, "");
      });

      if (history.replaceState) {
        // history.replaceState(null, "", "#" + panelId);
      }

      if (shouldScroll && panel) {
        scheduleServicePanelScroll(panel);
      }
    }

    function openSub(subLink, shouldScroll) {
      const parentPanelId = subLink.getAttribute("data-parent-tab");
      const mainLink = document.querySelector(
        '.digital-service-main-link[data-service-tab="' +
          escapeSelector(parentPanelId) +
          '"]',
      );

      if (!mainLink) return;

      const mainTitle = getLinkTitle(mainLink);
      const subTitle = getLinkTitle(subLink);

      closeAllMainItems();
      clearActiveLinks();

      const mainItem = mainLink.closest(".digital-service-main-item");

      if (mainItem) {
        mainItem.classList.add("is-open");
      }

      mainLink.classList.add("is-active");
      subLink.classList.add("is-active");

      const panel = showOnlyPanel(parentPanelId);

      //   fadePanel(panel, function () {
      //     updatePanelContent(panel, mainTitle, subTitle);
      //     updateServiceBreadcrumb(mainTitle, subTitle);
      //   });
      //ReplaceOneStartshere
      fadePanel(panel, function () {
        const subHash = subLink.getAttribute("href") || "";
        const templateId = subHash.replace("#", "");
        const template = document.querySelector(
          '.digital-sub-template[data-sub-template="' + templateId + '"]',
        );

        if (template) {
          const templateContent = template.querySelector(
            ".services__details-wrap",
          );

          if (templateContent) {
            panel.innerHTML = "";
            panel.appendChild(templateContent.cloneNode(true));
          }
        } else {
          updatePanelContent(panel, mainTitle, subTitle);
        }

        updateServiceBreadcrumb(mainTitle, subTitle);

        if (shouldScroll) {
          scheduleServicePanelScroll(panel);
        }
      });
      //ReplaceOneEndshere
      const subHash = subLink.getAttribute("href");

      if (subHash && history.replaceState) {
        replaceTabUrl(subHash.replace("#", ""));
      }

    }

    mainLinks.forEach(function (mainLink) {
      mainLink.addEventListener("click", function (event) {
        event.preventDefault();
        const tabName = mainLink.getAttribute("data-service-tab");

        openMain(mainLink, true, false);

        if (tabName) {
          pushTabUrl(tabName);
          scrollPageTopAfterTabActivation();
        }
      });
    });

    subLinks.forEach(function (subLink) {
      subLink.addEventListener("click", function (event) {
        event.preventDefault();
        const tabName = (subLink.getAttribute("href") || "").replace("#", "");

        openSub(subLink, false);

        if (tabName) {
          pushTabUrl(tabName);
          scrollPageTopAfterTabActivation();
        }
      });
    });

    function activateInitialNestedTab(shouldScroll) {
      const requestedTab = getRequestedTab();
      const hash = requestedTab ? "#" + requestedTab : "";

      if (hash) {
        const matchingSubLink = document.querySelector(
          '.digital-service-sub-link[href="' + hash + '"]',
        );

        if (matchingSubLink) {
          openSub(matchingSubLink, false);

          if (shouldScroll) {
            replaceTabUrl(requestedTab);
            scrollPageTopAfterTabActivation();
          }

          return;
        }

        const panelId = hash.replace("#", "");
        const matchingMainLink = document.querySelector(
          '.digital-service-main-link[data-service-tab="' +
            escapeSelector(panelId) +
            '"]',
        );

        if (matchingMainLink) {
          openMain(matchingMainLink, false, false);

          if (shouldScroll) {
            replaceTabUrl(panelId);
            scrollPageTopAfterTabActivation();
          }

          return;
        }
      }

      const firstMainLink = mainLinks[0];

      if (firstMainLink) {
        openMain(firstMainLink, false, false);
      }
    }

    document.addEventListener("click", function (event) {
      const link = event.target.closest("a[href*='#']");

      if (!isSamePageHashLink(link)) return;

      const hash = new URL(link.getAttribute("href"), window.location.href).hash;
      const matchingSubLink = hash
        ? document.querySelector('.digital-service-sub-link[href="' + hash + '"]')
        : null;
      const matchingMainLink = hash
        ? document.querySelector(
            '.digital-service-main-link[data-service-tab="' +
              escapeSelector(hash.replace("#", "")) +
              '"]',
          )
        : null;

      if (!matchingSubLink && !matchingMainLink) return;

      event.preventDefault();

      if (matchingSubLink) {
        openSub(matchingSubLink, false);
      } else if (matchingMainLink) {
        openMain(matchingMainLink, false, false);
      }

      pushTabUrl(hash.replace("#", ""));
      scrollPageTopAfterTabActivation();
    });

    activateInitialNestedTab(Boolean(getRequestedTab()));

    window.addEventListener("hashchange", function () {
      activateInitialNestedTab(true);
    });

    window.addEventListener("popstate", function () {
      activateInitialNestedTab(true);
    });
  }

  document.addEventListener("DOMContentLoaded", function () {
    initSimpleServiceTabs();
    initNestedDigitalServiceTabs();
  });
})();
