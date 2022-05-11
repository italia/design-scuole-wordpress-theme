/* JS include */

// @codekit-append "functions.js";

/* Functions */

/* Responsive DOM */
var $movenav = $("#sub-nav .nav-list");
$movenav.responsiveDom({
  appendTo: ".nav-list-mobile",
  mediaQuery: "(max-width: 1200px)",
});
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
    if (window_top > div_top) {
      $("#main-header").addClass("is-sticky");
      $("#main-wrapper").addClass("sticked-menu");
      $("body").addClass("sticked-menu-body");
    } else {
      $("#main-header").removeClass("is-sticky");
      $("#main-wrapper").removeClass("sticked-menu");
      $("body").removeClass("sticked-menu-body");
    }
  }
  $(function () {
    $(window).scroll(sticky_relocate);
    sticky_relocate();
  });
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
      } else {
        $(this)
          .parent()
          .parent()
          .find(".toggle-dropdown")
          .removeClass("active");
        $(this).addClass("active");
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
  const history = document.querySelector(".history-carousel");
  const year = document.querySelector(".year-carousel");

  if (history && year) {
    var main = new Splide(".history-carousel", {
      pagination: false,
      arrows: false,
      perPage: 3,
      perMove: 1,
      gap: "1rem",
      speed: (number = 800),
      breakpoints: {
        800: {
          perPage: 2,
        },
        520: {
          perPage: 1,
        },
      },
    }).mount();

    var secondary = new Splide(".year-carousel", {
      pagination: false,
      perPage: 3,
      perMove: 1,
      speed: (number = 800),
      cloneStatus: false,
      gap: "0rem",
      breakpoints: {
        800: {
          perPage: 2,
        },
        520: {
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
        gap: "2rem",
        perPage: 2,
        perMove: 1,
        speed: (number = 800),
        breakpoints: {
          768: {
            perPage: 1,
            arrows: false,
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
            gap: "2rem",
          },
          600: {
            perPage: 1,
          },
        },
      }).mount();
    });
  }
});

document.addEventListener("DOMContentLoaded", function () {
  const twoCarousel = document.querySelectorAll(".simple-two-carousel");

  if (twoCarousel.length) {
    twoCarousel.forEach((element) => {
      setTimeout(() => {
        new Splide(element, {
          gap: "2rem",
          arrows: true,
          isNavigation: true,
          pagination: false,
          perPage: 2,
          perMove: 1,
          breakpoints: {
            1024: {
              perPage: 1,
              perMove: 1,
              arrows: false,
              pagination: true,
            },
          },
        }).mount();
      }, 500);
    });
  }
});

document.addEventListener("DOMContentLoaded", function () {
  setTimeout(() => {
    new Splide(".carousel-classroom", {
      gap: "1.5rem",
      arrows: true,
      pagination: false,
      perMove: 1,
      perPage: 3,
      padding: { left: "200px", right: "200px" },
      breakpoints: {
        1200: {
          perPage: 2,
          padding: { left: "120px", right: "120px" },
        },
        768: {
          padding: { left: "120px", right: "120px" },
        },
        550: {
          gap: "0.5rem",
          perPage: 1,
          padding: { left: "80px", right: "80px" },
        },
      },
    }).mount();
  }, 500);
});

/* Carousel */
jQuery(document).ready(function ($) {
  $(".carousel-simple").owlCarousel({
    nav: true,
    navText: [
      '<svg class="svg-arrow-circular-left"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-arrow-circular-left"></use></svg>',
      '<svg class="svg-arrow-circular-right"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-arrow-circular-right"></use></svg>',
    ],
    dots: false,
    margin: 30,
    loop: false,
    autoplay: false,
    autoplayTimeout: 4000,
    autoplayHoverPause: true,
    responsive: {
      0: {
        items: 1,
        stagePadding: 0,
        dots: true,
        margin: 0,
        nav: false,
      },
      576: {
        items: 1,
        stagePadding: 0,
        dots: true,
        margin: 0,
        nav: false,
      },
      768: {
        items: 2,
        stagePadding: 0,
        dots: true,
        nav: false,
      },
      992: {
        items: 2,
        stagePadding: 0,
        dots: true,
        nav: false,
      },
      1400: {
        items: 2,
        stagePadding: 0,
      },
    },
  });
  $(".carousel-simple-pager").owlCarousel({
    nav: false,
    navText: [
      '<svg class="svg-arrow-circular-left"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-arrow-circular-left"></use></svg>',
      '<svg class="svg-arrow-circular-right"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-arrow-circular-right"></use></svg>',
    ],
    dots: true,
    margin: 30,
    loop: false,
    autoplay: false,
    autoplayTimeout: 4000,
    autoplayHoverPause: true,
    responsive: {
      0: {
        items: 1,
        stagePadding: 0,
        margin: 0,
      },
      576: {
        items: 1,
        stagePadding: 0,
        margin: 0,
      },
      768: {
        items: 2,
        stagePadding: 0,
      },
      992: {
        items: 2,
        stagePadding: 0,
      },
      1400: {
        items: 2,
        stagePadding: 0,
      },
    },
  });
  $(".carousel-single").owlCarousel({
    nav: true,
    navText: [
      '<svg class="svg-arrow-circular-left"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-arrow-circular-left"></use></svg>',
      '<svg class="svg-arrow-circular-right"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-arrow-circular-right"></use></svg>',
    ],
    dots: false,
    margin: 30,
    loop: false,
    autoplay: false,
    autoplayTimeout: 4000,
    autoplayHoverPause: true,
    responsive: {
      0: {
        items: 1,
        stagePadding: 0,
        dots: true,
        margin: 0,
        nav: false,
      },
      576: {
        items: 1,
        stagePadding: 0,
        dots: true,
        margin: 0,
        nav: false,
      },
      768: {
        items: 1,
        stagePadding: 0,
        dots: true,
        nav: false,
      },
      992: {
        items: 1,
        stagePadding: 0,
        dots: true,
        nav: false,
      },
      1400: {
        items: 1,
        stagePadding: 0,
        dots: true,
      },
    },
  });
  $(".carousel-double").owlCarousel({
    nav: true,
    navText: [
      '<svg class="svg-arrow-circular-left"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-arrow-circular-left"></use></svg>',
      '<svg class="svg-arrow-circular-right"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-arrow-circular-right"></use></svg>',
    ],
    dots: false,
    margin: 30,
    loop: false,
    autoplay: false,
    autoplayTimeout: 4000,
    autoplayHoverPause: true,
    responsive: {
      0: {
        items: 1,
        stagePadding: 0,
        dots: true,
        margin: 0,
        nav: false,
      },
      576: {
        items: 1,
        stagePadding: 0,
        dots: true,
        margin: 0,
        nav: false,
      },
      768: {
        items: 1,
        stagePadding: 0,
        dots: true,
        nav: false,
      },
      992: {
        items: 2,
        stagePadding: 0,
        dots: true,
        nav: false,
      },
      1400: {
        items: 2,
        stagePadding: 0,
        dots: true,
      },
    },
  });
  $(".carousel-large").owlCarousel({
    nav: true,
    navText: [
      '<svg class="svg-arrow-circular-left"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-arrow-circular-left"></use></svg>',
      '<svg class="svg-arrow-circular-right"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-arrow-circular-right"></use></svg>',
    ],
    dots: false,
    margin: 24,
    loop: false,
    autoplay: false,
    autoplayTimeout: 4000,
    autoplayHoverPause: true,
    responsive: {
      0: {
        items: 1,
        stagePadding: 0,
        dots: true,
        margin: 0,
        nav: false,
      },
      576: {
        items: 2,
        stagePadding: 0,
        dots: true,
        nav: false,
      },
      768: {
        items: 3,
        stagePadding: 0,
        dots: true,
        nav: false,
      },
      992: {
        items: 3,
        stagePadding: 0,
        dots: true,
        nav: false,
      },
      1400: {
        items: 3,
        stagePadding: 0,
      },
    },
  });

  calendaryears = $(".carousel-calendar-years");
  calendarevents = $(".carousel-calendar");

  calendaryears.on("change.owl.carousel", function (event) {
    if (event.namespace && event.property.name === "position") {
      var target = event.relatedTarget.relative(event.property.value, true);
      calendarevents.owlCarousel("to", target, 500, true);
    }
  });

  calendaryears.owlCarousel({
    nav: true,
    navText: [
      '<svg class="svg-arrow-circular-left"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-arrow-circular-left"></use></svg>',
      '<svg class="svg-arrow-circular-right"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-arrow-circular-right"></use></svg>',
    ],
    center: false,
    items: 2,
    loop: false,
    dots: false,
    margin: 0,
    responsive: {
      0: {
        items: 1,
      },
      768: {
        items: 2,
      },
      992: {
        items: 2,
      },
      1200: {
        items: 3,
      },
    },
  });

  calendarevents.owlCarousel({
    nav: false,
    mouseDrag: false,
    touchDrag: false,
    pullDrag: false,
    center: false,
    items: 2,
    loop: false,
    dots: false,
    margin: 30,
    lazyLoad: true,

    responsive: {
      0: {
        items: 1,
      },
      768: {
        items: 2,
      },
      992: {
        items: 2,
      },
      1200: {
        items: 3,
      },
    },
  });

  function brandSliderClasses() {
    calendaryears.each(function () {
      var total = $(this).find(".owl-item.active").length;
      $(this).find(".owl-item").removeClass("firstactiveitem");
      $(this).find(".owl-item").removeClass("lastactiveitem");
      $(this)
        .find(".owl-item.active")
        .each(function (index) {
          if (index === 0) {
            $(this).addClass("firstactiveitem");
          }
          if (index === 1) {
            $(this).addClass("lastactiveitem");
          }
        });
    });
  }
  brandSliderClasses();
  calendaryears.on("translated.owl.carousel", function (event) {
    brandSliderClasses();
  });

  // $(function() {
  //   var owl = $('.carousel-cards'),
  //   owlOptions = {
  //     nav: false,
  //     navText: ['<svg class="svg-arrow-circular-left"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-arrow-circular-left"></use></svg>','<svg class="svg-arrow-circular-right"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-arrow-circular-right"></use></svg>'],
  //     dots: false,
  //     margin: 30,
  //     loop: false,
  //     autoplay: false,
  //     responsive: {
  //       0: {
  //       items: 1,
  //       stagePadding: 40,
  //       loop: true,
  //       center: false,
  //       dots: true,
  //       },
  //       576: {
  //       items: 2,
  //       stagePadding: 40,
  //       loop: true,
  //       center: false,
  //       dots: true,
  //       },
  //       768: {
  //       items: 2,
  //       stagePadding: 0,
  //       loop: true,
  //       center: false,
  //       dots: true,
  //       },
  //       1200: {
  //       items: 3,
  //       stagePadding: 0,
  //       }
  //     }
  //   };

  //   if ( $(window).width() < 1200 ) {
  //     var owlActive = owl.owlCarousel(owlOptions);
  //   } else {
  //     owl.addClass('off');
  //   }

  //   $(window).resize(function() {
  //     if ( $(window).width() < 1200 ) {
  //       if ( $('.carousel-cards').hasClass('off') ) {
  //         var owlActive = owl.owlCarousel(owlOptions);
  //         owl.removeClass('off');
  //       }
  //     } else {
  //       if ( !$('.carousel-cards').hasClass('off') ) {
  //         owl.addClass('off').trigger('destroy.owl.carousel');
  //         owl.find('.owl-stage-outer').children(':eq(0)').unwrap();
  //       }
  //     }
  //   });
  // });

  $(".carousel-hours").owlCarousel({
    nav: true,
    navText: [
      '<svg class="svg-arrow-circular-left"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-arrow-circular-left"></use></svg>',
      '<svg class="svg-arrow-circular-right"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-arrow-circular-right"></use></svg>',
    ],
    dots: false,
    margin: 25,
    loop: false,
    autoplay: false,
    autoplayTimeout: 4000,
    autoplayHoverPause: true,
    responsive: {
      0: {
        items: 1,
        stagePadding: 80,
        margin: 10,
      },
      576: {
        items: 2,
        stagePadding: 120,
      },
      768: {
        items: 2,
        stagePadding: 120,
      },
      992: {
        items: 2,
        stagePadding: 120,
      },
      1200: {
        items: 3,
        stagePadding: 200,
      },
    },
  });
});
/* End Carousel */

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
      e.preventDefault();
      e.stopPropagation();
      $(this).toggleClass("active");
      $(this).next(".dropdown-content").slideToggle(100);
    });
    $(document).click(function (e) {
      $(".dropdown-content").slideUp(100);
      $(".dropdown-content").removeClass("active");
      $(".dropdown-toggle").removeClass("active");
    });
  }
});
/* End Simple Toggle */

/* User Logged Sticky */
$(document).ready(function () {
  function header_utils_sticky() {
    var window_top = $(window).scrollTop();
    var div_top = $("#main-wrapper").offset().top;
    if (window_top > div_top) {
      $(".header-utils").appendTo($(".header-utils-sticky"));
      $(".header-utils-wrapper").addClass("utils-moved");
      $("#sub-nav .nav-list-primary").appendTo($(".sticky-main-nav"));
    } else {
      $(".header-utils").appendTo($(".header-utils-wrapper"));
      $(".header-utils-wrapper").removeClass("utils-moved");
      $(".header-top .nav-list-primary").appendTo($("#sub-nav .nav-container"));
    }
  }
  $(function () {
    $(window).scroll(header_utils_sticky);
    header_utils_sticky();
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
