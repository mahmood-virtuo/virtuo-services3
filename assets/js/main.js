(function ($) {
  "use strict";

  /*===========================================
	=            Windows Load          =
  =============================================*/
  $(window).on("load", function () {
    // preloader(); // disabled by request; uncomment to restore preloader
    wowAnimation();
    aosAnimation();
  });

  /*===========================================
	=            Preloader          =
=============================================*/
  /* Preloader function kept for future use. Restore by uncommenting preloader() in window load. */
  function preloader() {
    $(".preloader").delay(0).fadeOut();
  }

  /*===========================================
	=    		Mobile Menu			      =
=============================================*/
  //SubMenu Dropdown Toggle
  if ($(".tgmenu__wrap li.menu-item-has-children ul").length) {
    $(".tgmenu__wrap .navigation li.menu-item-has-children").append(
      '<div class="dropdown-btn"><span class="plus-line"></span></div>',
    );
  }

  //Mobile Nav Hide Show
  if ($(".tgmobile__menu").length) {
    var mobileMenuContent = $(".tgmenu__wrap .tgmenu__main-menu").html();
    $(".tgmobile__menu .tgmobile__menu-box .tgmobile__menu-outer").append(
      mobileMenuContent,
    );
    var $mobileMenu = $(".tgmobile__menu .navigation");

    $mobileMenu.find(".virtuo-services-mega").remove();
    $mobileMenu.find(".virtuo-mega-menu-trigger").removeClass("virtuo-mega-menu-trigger");
    $mobileMenu.find(".dropdown-btn").remove();
    $mobileMenu.find("li").each(function () {
      var $item = $(this);
      if ($item.children("ul").length) {
        $item.addClass("menu-item-has-children");
        $item.append('<div class="dropdown-btn"><span class="plus-line"></span></div>');
      } else {
        $item.removeClass("menu-item-has-children");
      }
    });

    //Dropdown Button
    $(".tgmobile__menu li.menu-item-has-children .dropdown-btn").on(
      "click",
      function () {
        $(this).toggleClass("open");
        $(this).siblings("ul").first().slideToggle(300);
      },
    );
    //Menu Toggle Btn
    $(".mobile-nav-toggler").on("click", function () {
      $("body").addClass("mobile-menu-visible");
    });

    //Menu Toggle Btn
    $(".tgmobile__menu-backdrop, .tgmobile__menu .close-btn").on(
      "click",
      function () {
        $("body").removeClass("mobile-menu-visible");
      },
    );
  }

  /*===========================================
	=     Menu sticky & Scroll to top      =
=============================================*/
  $(window).on("scroll", function () {
    var scroll = $(window).scrollTop();
    if (scroll < 245) {
      $("#sticky-header").removeClass("sticky-menu");
      $(".scroll-to-target").removeClass("open");
      $("#header-fixed-height").removeClass("active-height");
    } else {
      $("#sticky-header").addClass("sticky-menu");
      $(".scroll-to-target").addClass("open");
      $("#header-fixed-height").addClass("active-height");
    }
  });

  /*===========================================
	=           Scroll Up  	         =
=============================================*/
  if ($(".scroll-to-target").length) {
    $(".scroll-to-target").on("click", function () {
      var target = $(this).attr("data-target");
      // animate
      $("html, body").animate(
        {
          scrollTop: $(target).offset().top,
        },
        0,
      );
    });
  }

  /*===========================================
	=          Data Background    =
=============================================*/
  function tgResponsiveBackground($element, backgroundAttr, mobileAttr) {
    var mobileBackground = $element.attr(mobileAttr);

    if (
      mobileBackground &&
      window.matchMedia &&
      window.matchMedia("(max-width: 767px)").matches
    ) {
      return mobileBackground;
    }

    return $element.attr(backgroundAttr);
  }

  $("[data-background]").each(function () {
    var $this = $(this);
    var background = tgResponsiveBackground(
      $this,
      "data-background",
      "data-background-mobile",
    );

    if (background) {
      $this.css("background-image", "url(" + background + ")");
    }
  });

  $("[data-bg-color]").each(function () {
    $(this).css("background-color", $(this).attr("data-bg-color"));
  });

  /*=============================================
	=            Header Search            =
=============================================*/
  $(".search-open-btn").on("click", function () {
    $(".search__popup").addClass("search-opened");
    $(".search-popup-overlay").addClass("search-popup-overlay-open");
  });
  $(".search-close-btn").on("click", function () {
    $(".search__popup").removeClass("search-opened");
    $(".search-popup-overlay").removeClass("search-popup-overlay-open");
  });

  /*=============================================
=     Offcanvas Menu      =
=============================================*/
  $(".menu-tigger").on("click", function () {
    $(".offCanvas__info, .offCanvas__overly").addClass("active");
    return false;
  });
  $(".menu-close, .offCanvas__overly").on("click", function () {
    $(".offCanvas__info, .offCanvas__overly").removeClass("active");
  });

  /*=============================================
	=        Slider Active		      =
=============================================*/
  function virtuoInitSwiper(selector, options) {
    if (typeof Swiper === "undefined" || !document.querySelector(selector)) {
      return null;
    }

    return new Swiper(selector, options);
  }

  var sliderSwiper = virtuoInitSwiper(".slider-active", {
    spaceBetween: 0,
    effect: "fade",
    loop: true,
    autoplay: {
      delay: 6000,
    },
    navigation: {
      nextEl: ".slider-button-next",
      prevEl: ".slider-button-prev",
    },
    pagination: {
      el: ".slider__bar-pagination",
      clickable: true,
    },
  });

  /*=============================================
	=        Slider Active		      =
=============================================*/
  var sliderTwoSwiper = virtuoInitSwiper(".slider-active-two", {
    spaceBetween: 0,
    effect: "fade",
    loop: true,
    autoplay: {
      delay: 8000,
    },
    pagination: {
      el: ".slider__pagination",
      clickable: true,
    },
  });

  /*=============================================
	=        Slider Active		      =
=============================================*/
  var sliderTwoSwiper = virtuoInitSwiper(".slider-active-three", {
    spaceBetween: 0,
    effect: "fade",
    loop: true,
    autoplay: {
      delay: 8000,
    },
  });

  /*=============================================
	=        Slider Active		      =
=============================================*/
  var sliderSwiper = virtuoInitSwiper(".slider-active-four", {
    spaceBetween: 0,
    effect: "fade",
    loop: true,
    autoplay: {
      delay: 6000,
    },
    navigation: {
      nextEl: ".slider-button-next",
      prevEl: ".slider-button-prev",
    },
  });

  /*=============================================
	=        Slider Active		      =
=============================================*/
  var sliderSwiper = virtuoInitSwiper(".slider-active-five", {
    spaceBetween: 0,
    effect: "fade",
    loop: true,
    autoplay: {
      delay: 8000,
    },
    navigation: {
      nextEl: ".slider-button-next",
      prevEl: ".slider-button-prev",
    },
  });

  /*=============================================
	=        Brand Active		      =
=============================================*/
  var brandSwiper = virtuoInitSwiper(".brand-active", {
    // Optional parameters
    slidesPerView: 5,
    spaceBetween: 24,
    loop: true,
    breakpoints: {
      1500: {
        slidesPerView: 6,
      },
      1200: {
        slidesPerView: 5,
      },
      992: {
        slidesPerView: 4,
      },
      768: {
        slidesPerView: 3,
      },
      576: {
        slidesPerView: 3,
      },
      0: {
        slidesPerView: 2,
      },
    },
  });

  /*=============================================
	=        Brand Active Two	      =
=============================================*/
  var brandSwiper = virtuoInitSwiper(".brand-active-two", {
    // Optional parameters
    slidesPerView: 4,
    spaceBetween: 24,
    loop: true,
    breakpoints: {
      1500: {
        slidesPerView: 4,
      },
      1200: {
        slidesPerView: 4,
      },
      992: {
        slidesPerView: 4,
      },
      768: {
        slidesPerView: 3,
      },
      576: {
        slidesPerView: 3,
      },
      0: {
        slidesPerView: 2,
      },
    },
  });

  /*=============================================
	=        Services Active		      =
=============================================*/
  var servicesSwiper = virtuoInitSwiper(".services-active", {
    // Optional parameters
    slidesPerView: 4,
    spaceBetween: 24,
    loop: true,
    autoplay: {
      delay: 6000,
    },
    breakpoints: {
      1500: {
        slidesPerView: 4,
      },
      1200: {
        slidesPerView: 4,
      },
      992: {
        slidesPerView: 4,
      },
      768: {
        slidesPerView: 3,
      },
      576: {
        slidesPerView: 2,
      },
      0: {
        slidesPerView: 1,
      },
    },
  });

  /*=============================================
	=        Services Active		      =
=============================================*/
  var servicesSwiper = virtuoInitSwiper(".services-active-two", {
    // Optional parameters
    slidesPerView: 4,
    spaceBetween: 24,
    loop: true,
    autoplay: {
      delay: 6000,
    },
    breakpoints: {
      1500: {
        slidesPerView: 4,
      },
      1200: {
        slidesPerView: 3,
      },
      992: {
        slidesPerView: 3,
      },
      768: {
        slidesPerView: 2,
      },
      576: {
        slidesPerView: 1.5,
      },
      0: {
        slidesPerView: 1,
      },
    },
    pagination: {
      el: ".services__pagination",
      clickable: true,
    },
  });

  /*=============================================
	=        Services Active		      =
=============================================*/
  var servicesSwiper = virtuoInitSwiper(".services-active-three", {
    // Optional parameters
    slidesPerView: 4,
    spaceBetween: 24,
    loop: true,
    autoplay: {
      delay: 6000,
    },
    breakpoints: {
      1500: {
        slidesPerView: 4,
      },
      1200: {
        slidesPerView: 4,
      },
      992: {
        slidesPerView: 3,
      },
      768: {
        slidesPerView: 2,
      },
      576: {
        slidesPerView: 1.5,
      },
      0: {
        slidesPerView: 1,
      },
    },
  });

  /*=============================================
	=        Project Active		      =
=============================================*/
  var projectSwiper = virtuoInitSwiper(".project-active", {
    // Optional parameters
    slidesPerView: 3,
    spaceBetween: 24,
    loop: true,
    centeredSlides: true,
    breakpoints: {
      1500: {
        slidesPerView: 3,
      },
      1200: {
        slidesPerView: 3,
      },
      992: {
        slidesPerView: 2,
      },
      768: {
        slidesPerView: 1.5,
      },
      576: {
        slidesPerView: 1.3,
      },
      0: {
        slidesPerView: 1,
      },
    },
    navigation: {
      nextEl: ".project-button-next",
      prevEl: ".project-button-prev",
    },
  });

  /*=============================================
	=        Project Active		      =
=============================================*/
  var projectTwoSwiper = virtuoInitSwiper(".project-active-two", {
    // Optional parameters
    slidesPerView: 4,
    spaceBetween: 24,
    loop: true,
    breakpoints: {
      1500: {
        slidesPerView: 4,
      },
      1200: {
        slidesPerView: 4,
      },
      992: {
        slidesPerView: 3,
      },
      768: {
        slidesPerView: 2,
      },
      576: {
        slidesPerView: 1,
      },
      0: {
        slidesPerView: 1,
      },
    },
    navigation: {
      nextEl: ".project-button-next",
      prevEl: ".project-button-prev",
    },
  });

  /*=============================================
	=        Project Active		      =
=============================================*/
  var projectTwoSwiper = virtuoInitSwiper(".project-active-three", {
    // Optional parameters
    slidesPerView: 3,
    spaceBetween: 24,
    centeredSlides: true,
    loop: true,
    breakpoints: {
      1500: {
        slidesPerView: 3,
      },
      1200: {
        slidesPerView: 3,
      },
      992: {
        slidesPerView: 2.5,
      },
      768: {
        slidesPerView: 2,
      },
      576: {
        slidesPerView: 1,
      },
      0: {
        slidesPerView: 1,
      },
    },
    pagination: {
      el: ".project__pagination",
      clickable: true,
    },
  });

  /*=============================================
	=        Project Active		      =
=============================================*/
  var projectTwoSwiper = virtuoInitSwiper(".project-active-four", {
    // Optional parameters
    slidesPerView: 4,
    spaceBetween: 24,
    loop: true,
    autoplay: {
      delay: 6000,
    },
    breakpoints: {
      1500: {
        slidesPerView: 4,
      },
      1200: {
        slidesPerView: 4,
      },
      992: {
        slidesPerView: 4,
      },
      768: {
        slidesPerView: 3,
      },
      576: {
        slidesPerView: 1.5,
      },
      0: {
        slidesPerView: 1,
      },
    },
  });

  /*=============================================
	=        Project Active		      =
=============================================*/
  var projectSwiper = virtuoInitSwiper(".project-active-five", {
    // Optional parameters
    slidesPerView: 3,
    spaceBetween: 24,
    loop: true,
    centeredSlides: true,
    breakpoints: {
      1500: {
        slidesPerView: 3,
      },
      1200: {
        slidesPerView: 3,
      },
      992: {
        slidesPerView: 2.3,
      },
      768: {
        slidesPerView: 1.5,
      },
      576: {
        slidesPerView: 1.3,
      },
      0: {
        slidesPerView: 1,
      },
    },
    navigation: {
      nextEl: ".project-button-next",
      prevEl: ".project-button-prev",
    },
  });

  /*=============================================
	=        Project Active		      =
=============================================*/
  var projectSwiper = virtuoInitSwiper(".project-active-six", {
    // Optional parameters
    slidesPerView: 3,
    spaceBetween: 24,
    loop: true,
    breakpoints: {
      1500: {
        slidesPerView: 4,
      },
      1200: {
        slidesPerView: 4,
      },
      992: {
        slidesPerView: 3,
      },
      768: {
        slidesPerView: 2,
      },
      576: {
        slidesPerView: 1,
      },
      0: {
        slidesPerView: 1,
      },
    },
  });

  /*=============================================
	=        Project Active		      =
=============================================*/
  var projectSwiper = virtuoInitSwiper(".project-active-seven", {
    // Optional parameters
    slidesPerView: 3,
    spaceBetween: 24,
    loop: true,
    breakpoints: {
      1500: {
        slidesPerView: 3,
      },
      1200: {
        slidesPerView: 3,
      },
      992: {
        slidesPerView: 3,
      },
      768: {
        slidesPerView: 2,
      },
      576: {
        slidesPerView: 1,
      },
      0: {
        slidesPerView: 1,
      },
    },
    navigation: {
      nextEl: ".project-button-next",
      prevEl: ".project-button-prev",
    },
  });

  /*=============================================
	=          testimonial active              =
=============================================*/
  var swiper = virtuoInitSwiper(".testimonial__nav", {
    spaceBetween: 0,
    slidesPerView: 4,
  });
  var swiper2 = virtuoInitSwiper(".testimonial-active", {
    spaceBetween: 0,
    loop: true,
    autoplay: {
      delay: 6000,
    },
    thumbs: {
      swiper: swiper,
    },
    // And if we need scrollbar
    navigation: {
      nextEl: ".testimonial-button-next",
      prevEl: ".testimonial-button-prev",
    },
  });

  /*=============================================
	=        testimonial Active		      =
=============================================*/
  var testimonialSwiper = virtuoInitSwiper(".testimonial-active-two", {
    // Optional parameters
    slidesPerView: 3,
    spaceBetween: 24,
    loop: true,
    autoplay: {
      delay: 6000,
    },
    breakpoints: {
      1500: {
        slidesPerView: 3,
      },
      1200: {
        slidesPerView: 3,
      },
      992: {
        slidesPerView: 2,
      },
      768: {
        slidesPerView: 2,
      },
      576: {
        slidesPerView: 1,
      },
      0: {
        slidesPerView: 1,
      },
    },
    navigation: {
      nextEl: ".testimonial-button-next",
      prevEl: ".testimonial-button-prev",
    },
  });

  /*=============================================
	=        testimonial Active		      =
=============================================*/
  var testimonialSwiper = virtuoInitSwiper(".testimonial-active-three", {
    // Optional parameters
    slidesPerView: 3,
    spaceBetween: 24,
    loop: true,
    breakpoints: {
      1500: {
        slidesPerView: 3,
      },
      1200: {
        slidesPerView: 3,
      },
      992: {
        slidesPerView: 2,
      },
      768: {
        slidesPerView: 2,
      },
      576: {
        slidesPerView: 1,
      },
      0: {
        slidesPerView: 1,
      },
    },
    navigation: {
      nextEl: ".testimonial-button-next",
      prevEl: ".testimonial-button-prev",
    },
  });

  /*=============================================
	=        testimonial Active		      =
=============================================*/
  var testimonialSwiper = virtuoInitSwiper(".testimonial-active-four", {
    // Optional parameters
    slidesPerView: 2,
    spaceBetween: 24,
    loop: true,
    breakpoints: {
      1500: {
        slidesPerView: 2,
      },
      1200: {
        slidesPerView: 2,
      },
      992: {
        slidesPerView: 2,
      },
      768: {
        slidesPerView: 2,
      },
      576: {
        slidesPerView: 1,
      },
      0: {
        slidesPerView: 1,
      },
    },
    navigation: {
      nextEl: ".testimonial-button-next",
      prevEl: ".testimonial-button-prev",
    },
  });

  /*=============================================
	=        testimonial Active		      =
=============================================*/
  var testimonialSwiper = virtuoInitSwiper(".testimonial-active-five", {
    // Optional parameters
    direction: "vertical",
    slidesPerView: 2,
    spaceBetween: 24,
    loop: true,
    breakpoints: {
      1500: {
        slidesPerView: 2,
      },
      1200: {
        slidesPerView: 2,
      },
      992: {
        slidesPerView: 2,
      },
      768: {
        slidesPerView: 2,
      },
      576: {
        slidesPerView: 1,
      },
      0: {
        slidesPerView: 1,
      },
    },
    navigation: {
      nextEl: ".testimonial-button-next",
      prevEl: ".testimonial-button-prev",
    },
  });

  /*=============================================
	=        testimonial Active		      =
=============================================*/
  // var testimonialSwiper = new Swiper('.testimonial-active-five', {
  //     // Optional parameters
  //     spaceBetween: 10,
  //     loop: true,
  //     direction: 'vertical',
  //     autoHeight: true,
  //     watchSlidesProgress: true,
  //     watchSlidesVisibility: true,
  //     mousewheel: true,
  //     slidesPerView: 'auto',
  //     navigation: {
  //         nextEl: ".testimonial-button-next",
  //         prevEl: ".testimonial-button-prev"
  //     },
  // });

  /*=============================================
	=        Shop Active		      =
=============================================*/
  var shopSwiper = virtuoInitSwiper(".shop-active", {
    // Optional parameters
    slidesPerView: 4,
    spaceBetween: 24,
    loop: true,
    breakpoints: {
      1500: {
        slidesPerView: 4,
      },
      1200: {
        slidesPerView: 4,
      },
      992: {
        slidesPerView: 3,
      },
      768: {
        slidesPerView: 2,
      },
      576: {
        slidesPerView: 2,
      },
      0: {
        slidesPerView: 1,
      },
    },
    navigation: {
      nextEl: ".shop-button-next",
      prevEl: ".shop-button-prev",
    },
  });

  /*===========================================
      =       Coupon Active    =
=============================================*/
  $("#coupon-element").on("click", function () {
    $(".coupon__code-form").slideToggle(500);
    return false;
  });

  /*=============================================
	=    		pricing Active  	       =
=============================================*/
  $(".pricing-tab-switcher, .tab-btn").on("click", function () {
    ($(".pricing-tab-switcher, .tab-btn").toggleClass("active"),
      $(".pricing__tab").toggleClass("seleceted"),
      $(".pricing__price").toggleClass("change-subs-duration"));
  });

  /*=============================================
	=        Team Social Active 	       =
=============================================*/
  $(".social-toggle-icon").on("click", function () {
    $(this).parent().find("ul").slideToggle(400);
    $(this).find("i").toggleClass("fa-times");
    return false;
  });

  /*===========================================
	=    		 Cart Active  	         =
=============================================*/
  $(".cart-plus-minus").append(
    '<div class="dec qtybutton">-</div><div class="inc qtybutton">+</div>',
  );
  $(".qtybutton").on("click", function () {
    var $button = $(this);
    var oldValue = $button.parent().find("input").val();
    if ($button.text() == "+") {
      var newVal = parseFloat(oldValue) + 1;
    } else {
      // Don't allow decrementing below zero
      if (oldValue > 0) {
        var newVal = parseFloat(oldValue) - 1;
      } else {
        newVal = 0;
      }
    }
    $button.parent().find("input").val(newVal);
  });

  /*-------------------------------------
Intersection Observer
-------------------------------------*/
  if (!!window.IntersectionObserver) {
    let observer = new IntersectionObserver(
      (entries, observer) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            entry.target.classList.add("active-animation");
            //entry.target.src = entry.target.dataset.src;
            observer.unobserve(entry.target);
          }
        });
      },
      {
        rootMargin: "0px 0px -100px 0px",
      },
    );
    document.querySelectorAll(".has-animation").forEach((block) => {
      observer.observe(block);
    });
  } else {
    document.querySelectorAll(".has-animation").forEach((block) => {
      block.classList.remove("has-animation");
    });
  }

  /*===========================================
=         Marquee Active         =
=============================================*/
  if ($(".marquee_mode").length) {
    var isMobileOrTabletMarquee =
      window.matchMedia && window.matchMedia("(max-width: 991.98px)").matches;
    var marqueeSpeed = isMobileOrTabletMarquee ? 28 : 50;

    $(".marquee_mode").each(function () {
      var $marquee = $(this);

      if ($marquee.attr("data-marquee-initialized") === "true" || $marquee.children(".js-marquee-wrapper").length) {
        return;
      }

      $marquee.marquee({
        speed: marqueeSpeed,
        gap: 0,
        delayBeforeStart: 0,
        direction: $marquee.attr("data-direction") || "left",
        duplicated: true,
        pauseOnHover: true,
        startVisible: true,
      });

      $marquee.attr("data-marquee-initialized", "true").addClass("is-marquee-ready");
    });
  }

  /*===========================================
      =       Odometer Active    =
=============================================*/
  $(".odometer").appear(function (e) {
    var odo = $(".odometer");
    odo.each(function () {
      var countNumber = $(this).attr("data-count");
      $(this).html(countNumber);
    });
  });

  /*===========================================
	=        Magnific Popup    =
=============================================*/
  $(".popup-image").magnificPopup({
    type: "image",
    gallery: {
      enabled: true,
    },
  });

  /* magnificPopup video view */
  $(".popup-video").magnificPopup({
    type: "iframe",
  });

  /*===========================================
	=        Wow Active      =
=============================================*/
  function wowAnimation() {
    var wow = new WOW({
      boxClass: "wow",
      animateClass: "animated",
      offset: 0,
      mobile: false,
      live: true,
    });
    wow.init();
  }

  /*===========================================
	=           Aos Active       =
=============================================*/
  function aosAnimation() {
    AOS.init({
      duration: 700,
      mirror: true,
      once: true,
      disable: "mobile",
    });
  }
})(jQuery);

document.addEventListener("DOMContentLoaded", function () {
  const heroScrollButton = document.querySelector(".js-hero-scroll-down");

  if (!heroScrollButton) return;

  heroScrollButton.addEventListener("click", function (event) {
    const targetSelector = heroScrollButton.getAttribute("href");

    if (!targetSelector || !targetSelector.startsWith("#")) return;

    const target = document.querySelector(targetSelector);

    if (!target) return;

    event.preventDefault();

    const header =
      document.querySelector("#sticky-header") ||
      document.querySelector(".tg-header__area") ||
      document.querySelector("header");

    const headerOffset = header ? header.offsetHeight + 20 : 110;
    const targetTop =
      target.getBoundingClientRect().top + window.pageYOffset - headerOffset;

    window.scrollTo({
      top: targetTop,
      behavior: "smooth",
    });
  });
});

/* =========================================================
   Virtuo service hash scroll correction
   Keeps anchor sections from hiding behind sticky header
   ========================================================= */

(function () {
  "use strict";

  const SERVICE_PAGE = "/digital-marketing-and-brand-development";

  function normalizePath(path) {
    return path.replace(/\/$/, "");
  }

  function isDigitalMarketingPage() {
    return normalizePath(window.location.pathname) === SERVICE_PAGE;
  }

  function getHeaderOffset() {
    const stickyHeader = document.querySelector("#sticky-header");
    const headerHeight = stickyHeader
      ? Math.ceil(stickyHeader.getBoundingClientRect().height)
      : 90;

    return headerHeight + 24;
  }

  function scrollToHash(hash) {
    if (!isDigitalMarketingPage() || !hash) return;

    const targetId = decodeURIComponent(hash.replace("#", ""));
    const target = document.getElementById(targetId);

    if (!target) return;

    const targetTop =
      target.getBoundingClientRect().top +
      window.pageYOffset -
      getHeaderOffset();

    window.scrollTo({
      top: Math.max(targetTop, 0),
      behavior: "auto",
    });
  }

  function correctCurrentHashScroll() {
    if (!window.location.hash) return;

    /*
      Run twice because some sections/images/tabs can change height
      after the browser's first hash jump.
    */
    window.setTimeout(function () {
      scrollToHash(window.location.hash);
    }, 120);

    window.setTimeout(function () {
      scrollToHash(window.location.hash);
    }, 550);
  }

  window.addEventListener("load", correctCurrentHashScroll);
  window.addEventListener("hashchange", correctCurrentHashScroll);

  document.addEventListener("click", function (event) {
    const link = event.target.closest('a[href*="#"]');

    if (!link) return;

    const url = new URL(link.getAttribute("href"), window.location.origin);

    if (
      normalizePath(url.pathname) !== normalizePath(window.location.pathname)
    ) {
      return;
    }

    if (!url.hash) return;

    window.setTimeout(function () {
      scrollToHash(url.hash);
    }, 160);

    window.setTimeout(function () {
      scrollToHash(url.hash);
    }, 550);
  });
})();
