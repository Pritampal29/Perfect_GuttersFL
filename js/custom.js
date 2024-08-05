(function (jQuery) {
  "use strict";

  jQuery(window).on("load", function (e) {
    /*==================================================

					[ Page-Loader ]

     ==================================================*/

    jQuery("#pq-loading").fadeOut();

    jQuery("#pq-loading").delay(0).fadeOut("slow");

    var Scrollbar = window.Scrollbar;

    /*================================================

            			[humburger]

	================================================*/

    $(".humburger").click(function () {
      $(".header-area .nav-bar").toggleClass("side-menu-show");

      $(".nv-open-bg").toggleClass("dblk");
    });

    $(".nv-open-bg").click(function () {
      $(".header-area .nav-bar").removeClass("side-menu-show");

      $(".nv-open-bg").removeClass("dblk");
    });

    /*================================================

           			 [ban-slogan-slider]

	================================================*/

    var swiper = new Swiper(".ban-slogan .swiper", {
      slidesPerView: 1,

      spaceBetween: 10,

      loop: true,

      pagination: {
        el: ".ban-slogan .swiper-pagination",

        clickable: true,
      },
    });
    /*================================================

           			 [sub-menu-show]

	================================================*/
    $(".nav-bar ul li").click(function () {
      $(".sub-menu", this).slideToggle(200);
      $(this).siblings().find(".sub-menu").slideUp(200);
      $("span", this).toggleClass("rot-arw");
      $(this).siblings().find("span").removeClass("rot-arw");
    });

    /*================================================

           			 [review-slider]

	================================================*/

    var swiper = new Swiper(".review-slider .swiper", {
      slidesPerView: 2,

      spaceBetween: 22,

      loop: true,

      pagination: {
        el: ".review-slider .swiper-pagination",

        clickable: true,
      },

      breakpoints: {
        320: {
          slidesPerView: 1,

          spaceBetween: 10,
        },

        1024: {
          slidesPerView: 2,

          spaceBetween: 22,
        },
      },
    });

    /*================================================

           			 [depend-box-slider]

	================================================*/

    var swiper = new Swiper(".depend-box-slider .swiper", {
      loop: true,

      navigation: {
        nextEl: ".depend-box-slider .swiper-button-next",

        prevEl: ".depend-box-slider .swiper-button-prev",
      },

      pagination: {
        el: ".depend-box-slider .swiper-pagination",

        clickable: true,
      },

      breakpoints: {
        320: {
          slidesPerView: 1,

          spaceBetween: 10,
        },

        768: {
          slidesPerView: 2,

          spaceBetween: 20,
        },

        1200: {
          slidesPerView: 3,

          spaceBetween: 30,
        },
      },
    });

    /*==================================================

    				[ Back To Top ]

    ==================================================*/

    jQuery("#back-to-top").fadeOut();

    jQuery(window).on("scroll", function () {
      if (jQuery(this).scrollTop() > 250) {
        jQuery("#back-to-top").fadeIn(1400);
      } else {
        jQuery("#back-to-top").fadeOut(400);
      }
    });

    jQuery("#top").on("click", function () {
      jQuery("top").tooltip("hide");

      jQuery("body,html").animate(
        {
          scrollTop: 0,
        },
        800
      );

      return false;
    });

    /*================================================

           			[ Sticky Header ]

	================================================*/

    var view_width = jQuery(window).width();

    if (jQuery("header").hasClass("pq-has-sticky")) {
      jQuery(window).scroll(function () {
        var scrollTop = jQuery(window).scrollTop();

        if (scrollTop > 50) {
          jQuery("header").addClass(
            "pq-header-sticky animated fadeInDown animate__faster"
          );
        } else {
          jQuery("header").removeClass(
            "pq-header-sticky animated fadeInDown animate__faster"
          );
        }
      });
    }

    /*================================================

           			[ counter ]

	================================================*/

    var a = 0;

    $(window).scroll(function () {
      var oTop = $(".counter-area").offset().top - window.innerHeight;

      if (a == 0 && $(window).scrollTop() > oTop) {
        $(".count").each(function () {
          var $this = $(this);

          jQuery({ Counter: 0 }).animate(
            { Counter: $this.text() },
            {
              duration: 3000,

              easing: "swing",

              step: function () {
                $this.text(Math.ceil(this.Counter));
              },
            }
          );
        });

        a = 1;
      }
    });

    document.addEventListener("touchstart", function () {}, true);

    new WOW().init();
  });
})(jQuery);

/*================================================

           			[ Home gal Accordian ]

	================================================*/
$(document).ready(function () {
  $(".accordion-header").click(function () {
    var delay = 500;

    $(this).closest(".accordion-item").toggleClass("active");
    $(this).next(".accordion-content").slideToggle();

    $(this).find(".fas").toggleClass("fa-chevron-up fa-chevron-down");

    $(this).parent().siblings().find(".accordion-content").closest(".accordion-item").removeClass("active");
    $(this).parent().siblings().find(".accordion-content").slideUp();
    $(this).parent().siblings().find(".fas").removeClass("fa-chevron-up");
    $(this).parent().siblings().find(".fas").addClass("fa-chevron-down");

  });
});


$(document).ready(function() {
    var $gallery = $('#gallery').isotope({
        // options
        itemSelector: '.gallery-item',
        layoutMode: 'fitRows'
    });

    $('.filter-button-group').on('click', 'button', function() {
        var filterValue = $(this).attr('data-filter');
        $gallery.isotope({
            filter: filterValue
        });
    });

    $('.filter-button-group button').on('click', function() {
        $('.filter-button-group button').removeClass('active');
        $(this).addClass('active');
    });

    Fancybox.bind('[data-fancybox="gallery"]', {
      
    });
});