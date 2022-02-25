(function($) {
    "use strict";
    if ($.fn.menumaker) {
        let menuArgs = {
            title: "Menu", // The text of the button which toggles the menu
            breakpoint: 767, // The breakpoint for switching to the mobile view
            format: "multitoggle" // It takes three values: dropdown for a simple toggle menu, select for select list menu, multitoggle for a menu where each submenu can be toggled separately
        };
        let cssmenu = $("#cssmenu").menumaker(menuArgs);
        var siteNavigation = $('#cssmenu').children('ul');
        siteNavigation.find('a').on('focus blur', function() {
            let parentEl = $(this).parents('.menu-item, .page_item');
            let menufocus = parentEl.toggleClass('focus');
        });

        /*--------------------------------------------------------------
         Keyboard Navigation
        ----------------------------------------------------------------*/
        function faith_fix_keynavigation() {
            if ($(window).width() <= menuArgs['breakpoint']) {
                $('#cssmenu').find("li").last().bind('keydown', function(e) {
                    console.log(e.keyCode);
                    if (e.which === 9) {
                        e.preventDefault();
                        $('#cssmenu.small-screen #menu-button').focus();
                    }
                });
            }
        }

        faith_fix_keynavigation();

        $(window).resize(function() {

            faith_fix_keynavigation();

        });

    }
    $(window).on('scroll', function() {
        var topspace = $(this).scrollTop();
        if (topspace > 1) {
            $('.menu-area').addClass("sticky-menu");
        } else {
            $('.menu-area').removeClass("sticky-menu");
        }
        if (topspace > 300) {
            $('.scrooltotop').css('display', 'block');
        } else {
            $('.scrooltotop').css('display', 'none');
        }
    });
    jQuery(window).on('load', function() {
        $('.scrooltotop').css('display', 'none');
        $('.masonaryactive').masonry({
            itemSelector: '.blog-grid-layout',
        });
        $('#preloader').fadeOut('slow', function() {
            $(this).remove();
        });
    });
    $('.scrooltotop').click(function() {
        $('html,body').animate({ scrollTop: 0 }, 'slow');
        return false;
    });
    $('.contact-form').parents('.entry-content').addClass('contact-form-parent');
    $('.tagcloud a').removeAttr('style');
    $('.header-three .social-link-top').append('<a href="#" class="fa fa-search searchicon"></a>');
    //* nav_searchFrom
    var searchPopupDiv = $('.searchicon');
    searchPopupDiv.on('click', function(e) {
        e.preventDefault();
        $('.searchform-area').toggleClass('show');
        return false;
    });
    $('.search-close i').on('click', function() {
        $('.searchform-area').removeClass('show');
        return false;
    });

    $('.featured-slider__active').owlCarousel({
        items: 2,
        nav: true,
        autoplay: false,
        navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
        smartSpeed: 1000,
        margin: 15,
        rewind: true,
        loop: true,
        dots: false,
        autoHeight: true,
        mouseDrag: true,
        pullDrag: false,
        center: true,
        responsive: {
            0: {
                items: 1,
            },
            // breakpoint from 480 up
            480: {
                items: 1,
                margin: 15
            },
            // breakpoint from 768 up
            768: {
                items: 1,
            },
            992: {
                items: 1,
            },
            1200: {
                items: 2,
            }
        }
    });
    $('table').addClass('table-bordered table').wrap('<div class="table-responsive"></div>');
    $('.shop_table').removeClass('table-bordered');
    $('.navigation.pagination').addClass('Page navigation example');
    $('.navigation.pagination div.nav-links').wrapInner('<ul class="pagination"></ul>');
    $('div.nav-links ul.pagination * ').wrap('<li class="page-item"></li>');

})(jQuery);