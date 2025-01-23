//Button muni ko line 728
// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function () {
    scrollFunction()
};

function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("movetop").style.display = "block";
    } else {
        document.getElementById("movetop").style.display = "none";
    }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}

//service ko lai line 760
jQuery(document).ready(function ($) { // Ensure jQuery is used properly
    $('.owl-three').owlCarousel({
        loop: true,
        stagePadding: 20,
        margin: 20,
        autoplay: true,
        autoplayTimeout: 5000,
        autoplaySpeed: 1000,
        autoplayHoverPause: false,
        nav: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            991: {
                items: 3
            },
            1200: {
                items: 4
            }
        }
    })
})
//service finish

//menu ko lai line 799
jQuery(window).on("scroll", function () {
    var scroll = jQuery(window).scrollTop();

    if (scroll >= 80) {
        jQuery("#site-header").addClass("nav-fixed");
    } else {
        jQuery("#site-header").removeClass("nav-fixed");
    }
});

//Main navigation Active Class Add Remove
jQuery(".navbar-toggler").on("click", function () {
    jQuery("header").toggleClass("active");
});
jQuery(document).on("ready", function () {
    if (jQuery(window).width() > 991) {
        jQuery("header").removeClass("active");
    }
    jQuery(window).on("resize", function () {
        if (jQuery(window).width() > 991) {
            jQuery("header").removeClass("active");
        }
    });
});
//finished for menu

//disable body scroll which navbar is in active 
//line 828
jQuery(function () {
    jQuery('.navbar-toggler').click(function () {
        jQuery('body').toggleClass('noscroll');
    })
});



