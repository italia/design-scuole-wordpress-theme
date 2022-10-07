/* JS include */

// @codekit-append "functions.js";

/* Functions */

/* Responsive DOM */
// var $movenav = $('#sub-nav .nav-list');
// $movenav.responsiveDom({
//   appendTo: '.nav-list-mobile',
//   mediaQuery: '(max-width: 1200px)'
// });
var $usermenu = $(".menu-user-wrapper");
$usermenu.responsiveDom({
  appendTo: ".menu-user-mobile",
  mediaQuery: "(max-width: 1200px)",
});
var $description = $(".article-description");
$description.responsiveDom({
  appendTo: ".article-description-mobile",
  mediaQuery: "(max-width: 768px)",
});
var $searchfilters = $(".search-results-filters");
$searchfilters.responsiveDom({
  appendTo: ".search-results-filters-mobile",
  mediaQuery: "(max-width: 992px)",
});
/* End Transport Responsive DOM */

/* jPush Menu */
jQuery(document).ready(function ($) {
  $(".toggle-menu").jPushMenu({
    closeOnClickLink: false,
    activeClass: "is-active",
  });
  $(".close-user-menu").jPushMenu({
    closeOnClickLink: false,
    activeClass: "is-active",
  });
  $(".menu-mobile-close").click(function () {
    $(".push-body").removeClass("push-body-search");
    $(".push-body").removeClass("push-body-toleft");
    $(".push-body").removeClass("push-body-toright");
    $(".cbp-spmenu-search").removeClass("menu-open");
  });
  $(document).on("click", function () {
    $(".push-body").removeClass("push-body-search");
    $(".push-body").removeClass("push-body-toleft");
    $(".push-body").removeClass("push-body-toright");
    $(".cbp-spmenu-search").removeClass("menu-open");
  });
});
/* End jPush Menu */

/* Perfect Scrollbar */
$(document).ready(function ($) {
  $(".perfect-scrollbar").perfectScrollbar();
  $(".map-aside").perfectScrollbar();
});
/* End Perfect Scrollbar */

/* Responsive Multilevel Menu */
/* $(document).ready(function ($) {
  $( '.dl-menuwrapper' ).dlmenu();
}); */
/* End Responsive Multilevel Menu */

/* Sticky Header */
$(document).ready(function () {
  function sticky_relocate() {
    var window_top = $(window).scrollTop();
    var div_top = $("#main-wrapper").offset().top;
    if (Math.round(window.devicePixelRatio * 100) < 250) {
      if (window_top > div_top) {
        $("#main-header").addClass("is-sticky");
        $("#main-wrapper").addClass("sticked-menu");
        $("body").addClass("sticked-menu-body");
        $(".nav-list-secondary a").attr("tabindex", "-1");
      } else {
        $("#main-header").removeClass("is-sticky");
        $("#main-wrapper").removeClass("sticked-menu");
        $("body").removeClass("sticked-menu-body");
        $(".nav-list-secondary a").removeAttr("tabindex");
      }
    } else {
      $("#main-header").addClass("zoom");
      $(".cbp-spmenu-vertical.cbp-spmenu-left").addClass("zoom");
    }
  }
  $(function () {
    $(window).scroll(sticky_relocate);
    sticky_relocate();
  });
});

jQuery(window).resize(function () {
  if (Math.round(window.devicePixelRatio * 100) >= 250) {
    $("#main-header").addClass("zoom");
    $(".cbp-spmenu-vertical.cbp-spmenu-left").addClass("zoom");
  } else {
    $("#main-header").removeClass("zoom");
    $(".cbp-spmenu-vertical.cbp-spmenu-left").removeClass("zoom");
  }
});
/* End Sticky Header */

/* Main Menu */
$(document).ready(function () {
  if ($(".nav-list").length) {
    $(".nav-list .toggle-dropdown").on("click", function (e) {
      if ($(this).next(".menu-dropdown").hasClass("active")) {
        $(this).next(".menu-dropdown").slideUp(100);
        $(this).next(".menu-dropdown").removeClass("active");
        $(this).removeClass("active");
        $(this).attr("aria-expanded", "false");
      } else {
        $(this)
          .parent()
          .parent()
          .find(".toggle-dropdown")
          .removeClass("active");
        $(this)
          .parent()
          .parent()
          .find(".toggle-dropdown")
          .attr("aria-expanded", "false");
        $(this).addClass("active");
        $(this).attr("aria-expanded", "true");
        $(this).parent().parent().find(".menu-dropdown").removeClass("active");
        $(this).parent().parent().find(".menu-dropdown").slideUp(100);
        $(this).next(".menu-dropdown").slideDown(100);
        $(this).next(".menu-dropdown").addClass("active");
      }
      e.stopPropagation();
      e.preventDefault();
    });
    $(document).click(function (e) {
      $(".menu-dropdown").slideUp(100);
      $(".menu-dropdown").removeClass("active");
      $(".toggle-dropdown").removeClass("active");
      $(".toggle-dropdown").attr("aria-expanded", "false");
    });
    $(".menu-dropdown").click(function (e) {
      e.stopPropagation();
    });
  }
});
/* End Main Menu */

/* Mobile Menu Back Text */
/* $(document).ready(function() {
  if ($(".dl-menuwrapper").length) {
    $(".dl-menu .toggle-dropdown").on("click", function(){
      $(".dl-back a").replaceWith('<a href="#">' + $(this).text() + '</a>');
    });
    $(".dl-back").on("click", function(){
      $(".dl-back a").replaceWith('<a href="#">' + $(this).parent().parent().parent().prev('.toggle-dropdown').text() + '</a>');
    });
  }
}); */
/* End Mobile Menu Back Text */

/* Scroll Anchor Offset */
$(function () {
  $(".scroll-anchor-offset").bind("click", function (event) {
    var $anchor = $(this);
    $("html, body")
      .stop()
      .animate(
        {
          scrollTop: $($anchor.attr("href")).offset().top - 150,
        },
        200,
        "easeInOutExpo"
      );
    event.preventDefault();
  });
});
/* End Scroll Anchor Offset */

/* Accordion */
$(document).ready(function () {
  if ($(".accordion-wrapper").length) {
    accordion();
  }
}); // end ready
/* End Accordion */
document.addEventListener("DOMContentLoaded", function () {
  function accessibilityMobile() {
    const hamburger = document.querySelector(".hamburger.toggle-menu");
    const generalSearchBar = document.querySelector(
      ".cbp-spmenu.cbp-spmenu-vertical.cbp-spmenu-left"
    );
    const focussables = generalSearchBar.querySelectorAll(
      'a[href]:not([disabled]), button:not([disabled]), textarea:not([disabled]), input[type="text"]:not([disabled]), input[type="radio"]:not([disabled]), input[type="checkbox"]:not([disabled]), select:not([disabled])'
    );

    if (window.matchMedia("(min-width: 1200px)").matches) {
      focussables.forEach((element) => {
        element.setAttribute("aria-hidden", "true");
        element.setAttribute("tabindex", "-1");
      });
      hamburger.setAttribute("aria-hidden", "true");
      hamburger.setAttribute("tabindex", "-1");
    } else {
      focussables.forEach((element) => {
        element.removeAttribute("aria-hidden");
        element.removeAttribute("tabindex");
      });
      hamburger.removeAttribute("aria-hidden");
      hamburger.removeAttribute("tabindex");
    }
  }

  let resizeId;
  window.addEventListener("resize", () => {
    clearTimeout(resizeId);
    resizeId = setTimeout(accessibilityMobile(), 500);
  });

  accessibilityMobile();
});

document.addEventListener("DOMContentLoaded", function () {
  const history = document.querySelector(".history-carousel");
  const year = document.querySelector(".year-carousel");

  if (history && year) {
    var main = new Splide(history, {
      pagination: false,
      arrows: false,
      perPage: 3,
      perMove: 1,
      gap: "1rem",
      speed: (number = 800),
      slideFocus: false,
      breakpoints: {
        800: {
          pagination: false,
          slideFocus: false,
          perPage: 2,
        },
        520: {
          pagination: false,
          slideFocus: false,
          perPage: 1,
        },
      },
    }).mount();

    var secondary = new Splide(year, {
      pagination: false,
      perPage: 3,
      perMove: 1,
      speed: (number = 800),
      cloneStatus: false,
      slideFocus: false,
      gap: 0,
      breakpoints: {
        800: {
          gap: "0rem",
          pagination: false,
          slideFocus: false,
          perPage: 2,
        },
        520: {
          gap: "0rem",
          pagination: false,
          slideFocus: false,
          perPage: 1,
        },
      },
    }).mount();

    main.sync(secondary);
  }
});

document.addEventListener("DOMContentLoaded", function () {
  const doubles = document.querySelectorAll(".splide-double");
  const carouselCards = document.querySelectorAll(".carousel-cards");
  if (doubles.length) {
    doubles.forEach((element) => {
      new Splide(element, {
        pagination: true,
        arrows: true,
        gap: "2rem",
        perPage: 2,
        perMove: 1,
        speed: (number = 800),
        slideFocus: false,
        breakpoints: {
          1300: {
            arrows: false,
            pagination: true,
            slideFocus: false,
          },
          768: {
            perPage: 1,
            arrows: false,
            pagination: true,
            slideFocus: false,
          },
        },
      }).mount();
    });
  }

  if (carouselCards.length) {
    carouselCards.forEach((element) => {
      new Splide(element, {
        destroy: true,
        breakpoints: {
          992: {
            destroy: false,
            arrows: false,
            pagination: false,
            perPage: 2,
            perMove: 1,
            speed: (number = 800),
            slideFocus: false,
            gap: "2rem",
          },
          600: {
            slideFocus: false,
            pagination: false,
            arrows: false,
            perPage: 1,
          },
        },
      }).mount();
    });
  }
});

document.addEventListener("DOMContentLoaded", function () {
  const classCarousels = document.querySelectorAll(".carousel-classroom");
  const twoCarousel = document.querySelectorAll(".simple-two-carousel");
  const insideCarousel = document.querySelectorAll(".inside-carousel");

  if (classCarousels.length) {
    setTimeout(() => {
      classCarousels.forEach((element) => {
        new Splide(element, {
          gap: "1.5rem",
          arrows: true,
          pagination: false,
          slideFocus: false,
          perMove: 1,
          perPage: 3,
          padding: { left: "200px", right: "200px" },
          breakpoints: {
            1200: {
              slideFocus: false,
              perPage: 2,
              padding: { left: "120px", right: "120px" },
            },
            768: {
              slideFocus: false,
              padding: { left: "120px", right: "120px" },
            },
            550: {
              slideFocus: false,
              gap: "0.5rem",
              perPage: 1,
              padding: { left: "80px", right: "80px" },
            },
          },
        }).mount();
      });
    }, 600);
  }

  if (twoCarousel.length) {
    setTimeout(() => {
      twoCarousel.forEach((element) => {
        new Splide(element, {
          gap: "2rem",
          arrows: true,
          perPage: 2,
          perMove: 1,
          pagination: false,
          slideFocus: false,
          breakpoints: {
            1300: {
              arrows: false,
              slideFocus: false,
            },
            768: {
              arrows: false,
              slideFocus: false,
              perPage: 1,
              perMove: 1,
            },
          },
        }).mount();
      });
    }, 800);
  }

  if (insideCarousel.length) {
    setTimeout(() => {
      insideCarousel.forEach((element) => {
        new Splide(element, {
          gap: "50px",
          arrows: true,
          perPage: 2,
          slideFocus: false,
          perMove: 1,
          padding: { left: "50px", right: "50px" },
          breakpoints: {
            1300: {
              slideFocus: false,
              arrows: false,
              padding: { left: "0", right: "0" },
            },
            768: {
              arrows: false,
              slideFocus: false,
              padding: { left: "0", right: "0" },
              perPage: 1,
              perMove: 1,
            },
          },
        }).mount();
      });
    }, 800);
  }
});

/* Responsive Tabs */
$(".responsive-tabs").responsiveTabs({
  startCollapsed: "accordion",
});
/* End Responsive Tabs */

/* FitVids */
$(document).ready(function () {
  $(".video-container ").fitVids();
});
/* End FitVids */

/* Sticky Sidebar */
jQuery(document).ready(function ($) {
  if ($(".sticky-sidebar").length) {
    var window_width = jQuery(window).width();
    if (window_width < 992) {
      jQuery(".sticky-sidebar").trigger("sticky_kit:detach");
    } else {
      make_sticky();
    }
    jQuery(window).resize(function () {
      window_width = jQuery(window).width();
      if (window_width < 992) {
        jQuery(".sticky-sidebar").trigger("sticky_kit:detach");
      } else {
        make_sticky();
      }
    });
    function make_sticky() {
      jQuery(".sticky-sidebar").stick_in_parent({
        parent: ".sticky-sidebar-container",
        offset_top: 100,
      });
      jQuery(".sticky-sidebar")
        .on("sticky_kit:bottom", function (e) {
          jQuery(this).parent().css("position", "static");
        })
        .on("sticky_kit:unbottom", function (e) {
          jQuery(this).parent().css("position", "relative");
        });
    }
  }
});
/* End Sticky Sidebar */

/* Simple Toggle */

$(document).ready(function () {
  if ($(".dropdown-toggle").length) {
    $(".dropdown-toggle").click(function (e) {
      // e.preventDefault();
      // e.stopPropagation();
      // $(this).toggleClass('active');
    });
    $(document).click(function (e) {
      $(".dropdown-toggle").removeClass("show");
    });
  }
});
/* End Simple Toggle */

$(document).ready(function () {
  var skiplink = document.querySelector(".skiplink");
  var mainMenu = skiplink?.querySelector('[href="#menu-principale"]');
  mainMenu.addEventListener("click", () => {
    var sticky = document.querySelector(".sticky-main-nav");
    setTimeout(() => {
      var nav = sticky.querySelector("#menu-principale a");
      nav.focus();
    }, 100);
  });
});

/* User Logged Sticky */
$(document).ready(function () {
  function header_utils_sticky() {
    var window_top = $(window).scrollTop();
    var div_top = $("#main-wrapper").offset().top;
    var containerDsk = document.querySelector(".sticky-main-nav");
    var navContainer = document.querySelector("#sub-nav .nav-container");
    var mainNav = document.querySelector("#sub-nav .nav-container .main-nav");
    var navListPrimaryBottom = document.querySelector(
      ".header-bottom .dl-menu.nav-list-primary"
    );
    var navListPrimaryTop = document.querySelector(
      ".header-top .sticky-main-nav .main-nav"
    );

    var linkList = document.querySelectorAll(".sticky-main-nav a");

    if (window.matchMedia("(min-width: 1200px)").matches) {
      linkList.forEach((element) => {
        element.removeAttribute("tabindex");
      });
      if (window_top > div_top) {
        $(".header-utils-wrapper").addClass("utils-moved");
        if (!navListPrimaryTop) {
          containerDsk.insertAdjacentElement("afterbegin", mainNav);
        }
      } else {
        $(".header-utils-wrapper").removeClass("utils-moved");
        if (!navListPrimaryBottom) {
          navContainer?.insertAdjacentElement("afterbegin", navListPrimaryTop);
        }
      }
    }
  }
  $(function () {
    $(window).scroll(header_utils_sticky);
    header_utils_sticky();
  });

  function tabIndexHmburger() {
    var nav = document.querySelector(".cbp-spmenu-vertical.cbp-spmenu-left");
    var linkList = document.querySelectorAll(
      ".cbp-spmenu-vertical.cbp-spmenu-left a"
    );

    // Options for the observer (which mutations to observe)
    const config = { attributes: true };

    // Callback function to execute when mutations are observed
    const callback = function (mutationList, observer) {
      // Use traditional 'for loops' for IE 11
      for (const mutation of mutationList) {
        if (mutation.type === "attributes") {
          if (mutation.target.classList.contains("menu-open")) {
            linkList.forEach((element) => {
              element.removeAttribute("tabindex");
            });
            catchFocus(linkList);
          } else {
            linkList.forEach((element) => {
              element.setAttribute("tabindex", "-1");
            });
          }
        }
      }
    };

    // Create an observer instance linked to the callback function
    const observer = new MutationObserver(callback);
    observer.observe(nav, config);

    // Later, you can stop observing
    // observer.disconnect();
  }

  function catchFocus(linkList) {
    document.addEventListener("keydown", (e) => {
      var userMenu = document.querySelector(".toggle-user-menu-mobile");
      var modal = document.querySelector('[data-target="#access-modal"]');
      var closeMenu = document.querySelector(".hamburger.is-active");
      var logo = document.querySelector(".logo-header a");
      if (
        e.which == 9 &&
        !e.shiftKey &&
        document.activeElement == linkList[linkList.length - 1]
      ) {
        if (userMenu) {
          userMenu.focus();
        } else {
          modal.focus();
        }
      }

      if (e.which == 9 && e.shiftKey && document.activeElement === closeMenu) {
        logo.focus();
      }
    });
  }

  tabIndexHmburger();

  var resizeId;
  window.addEventListener("resize", function () {
    clearTimeout(resizeId);
    resizeId = setTimeout(header_utils_sticky, 200);
  });
});
/* End User Logged Sticky */

/* Match Height */
$(document).ready(function () {
  if ($(".match-height").length) {
    $(function () {
      $(".match-height").matchHeight();
    });
  }
});
/* Match Height */

function isIE() {
  const ua = window.navigator.userAgent;
  const msie = ua.indexOf("MSIE ");
  const trident = ua.indexOf("Trident/");
  return msie > 0 || trident > 0;
}

function getZoomBrowser() {
  const isFirefox = navigator.userAgent.toLowerCase().indexOf("firefox") > -1;

  const mediaQueryBinarySearch = function (
    property,
    unit,
    a,
    b,
    maxIter,
    epsilon
  ) {
    var matchMedia;
    var head, style, div;
    if (window.matchMedia) {
      matchMedia = window.matchMedia;
    } else {
      head = document.getElementsByTagName("head")[0];
      style = document.createElement("style");
      head.appendChild(style);

      div = document.createElement("div");
      div.className = "mediaQueryBinarySearch";
      div.style.display = "none";
      document.body.appendChild(div);

      matchMedia = function (query) {
        style.sheet.insertRule(
          "@media " +
            query +
            "{.mediaQueryBinarySearch " +
            "{text-decoration: underline} }",
          0
        );
        var matched = getComputedStyle(div, null).textDecoration == "underline";
        style.sheet.deleteRule(0);
        return { matches: matched };
      };
    }
    var ratio = binarySearch(a, b, maxIter);
    if (div) {
      head.removeChild(style);
      document.body.removeChild(div);
    }
    return ratio;

    function binarySearch(a, b, maxIter) {
      var mid = (a + b) / 2;
      if (maxIter <= 0 || b - a < epsilon) {
        return mid;
      }
      var query = "(" + property + ":" + mid + unit + ")";
      if (matchMedia(query).matches) {
        return binarySearch(mid, b, maxIter - 1);
      } else {
        return binarySearch(a, mid, maxIter - 1);
      }
    }
  };

  const mediaQueryBinarySearchFirefox = mediaQueryBinarySearch(
    "min--moz-device-pixel-ratio",
    "",
    0,
    10,
    20,
    0.0001
  );
  const zoomFirefox = Math.round(mediaQueryBinarySearchFirefox * 100) / 100;

  const zoomIe =
    Math.round(
      (document.documentElement.offsetHeight / window.innerHeight) * 100
    ) / 100;

  const zoom = Math.round((window.outerWidth / window.innerWidth) * 100) / 100;

  if (isFirefox) return zoomFirefox;
  if (isIE()) return zoomIe;
  return zoom;
}

const searchModal = document.querySelector("#search-modal");

function initCleanInput() {
  if (!searchModal) return;

  const formInput = searchModal.querySelector(".search-form #search-input");
  const cleanBtn = searchModal.querySelector(".search-form .clean-input");

  formInput?.addEventListener("input", () => {
    formInput.value.length > 0
      ? cleanBtn.classList.add("show")
      : cleanBtn.classList.remove("show");
  });

  cleanBtn.addEventListener("click", () => {
    formInput.value = "";
    cleanBtn.classList.remove("show");
  });
}

initCleanInput();

function closeUserMenu() {
  var btn = document.querySelector(".close-user-menu");
  var body = document.querySelector("body");
  var menu = document.querySelector(".cbp-spmenu-right");

  btn?.addEventListener("click", () => {
    body.classList.remove("push-body-toleft");
    menu.classList.remove("menu-open");
  });
}

closeUserMenu();

function tabIndexUser() {
  var nav = document.querySelector(".cbp-spmenu-vertical.cbp-spmenu-right");
  var linkList = document.querySelectorAll(
    ".cbp-spmenu-vertical.cbp-spmenu-right a"
  );
  var buttonList = document.querySelectorAll(
    ".cbp-spmenu-vertical.cbp-spmenu-right button"
  );

  // Options for the observer (which mutations to observe)
  const config = { attributes: true };

  // Callback function to execute when mutations are observed
  const callback = function (mutationList, observer) {
    // Use traditional 'for loops' for IE 11
    for (const mutation of mutationList) {
      if (mutation.type === "attributes") {
        if (mutation.target.classList.contains("menu-open")) {
          linkList.forEach((element) => {
            element.removeAttribute("tabindex");
          });
          buttonList.forEach((element) => {
            element.removeAttribute("tabindex");
          });
          catchFocusUser(linkList, buttonList);
        } else {
          linkList.forEach((element) => {
            element.setAttribute("tabindex", "-1");
          });
          buttonList.forEach((element) => {
            element.setAttribute("tabindex", "-1");
          });
        }
      }
    }
  };

  // Create an observer instance linked to the callback function
  const observer = new MutationObserver(callback);
  observer.observe(nav, config);

  // Later, you can stop observing
  // observer.disconnect();
}

function catchFocusUser(linkList, buttonList) {
  document.addEventListener("keydown", (e) => {
    var notification = document.querySelector(".toggle-user-menu-mobile");
    var logo = document.querySelector(".hamburger");
    if (
      e.which == 9 &&
      !e.shiftKey &&
      document.activeElement == linkList[linkList.length - 1]
    ) {
      notification.focus();
    }

    if (e.which == 9 && e.shiftKey && document.activeElement == buttonList[0]) {
      logo.focus();
    }
  });
}

tabIndexUser();
