/**
 * app.js
 *
 * Contain all handlers for JavaScript applications.
 */
(function() {
    var lastTime = 0,
        vendors = ['ms', 'moz', 'webkit', 'o'];

    for (var x = 0; x < vendors.length && !window.requestAnimationFrame; x++) {
        window.requestAnimationFrame = window[vendors[x] + 'RequestAnimationFrame'];
        window.cancelAnimationFrame = window[vendors[x] + 'CancelAnimationFrame'];
    }

    if (!window.requestAnimationFrame) {
        window.requestAnimationFrame = function(callback, element) {
            var currTime = new Date().getTime(),
                timeToCall = Math.max(0, 16 - (currTime - lastTime));

            id = window.setTimeout(function() {
                callback(currTime + timeToCall);
            }, timeToCall);

            lastTime = currTime + timeToCall;

            return id;
        };
    }

    if (!window.cancelAnimationFrame) {
        window.cancelAnimationFrame = function(id) {
            clearTimeout(id);
        };
    }
})();

var requesting = false;

function onScrollSliderParallax() {
    if (!requesting) {
        requesting = true;

        requestAnimationFrame(function() {
            APP.slider.sliderParallax();
        });
    }

    debounce(function() {
        requesting = false;
    }, 100);
}

function debounce(func, wait, immediate) {
    var timeout, args, context, timestamp, result;

    return function() {
        context = this;
        args = arguments;
        timestamp = new Date();

        var later = function() {
            var last = (new Date()) - timestamp;

            if (last < wait) {
                timeout = setTimeout(later, wait - last);
            } else {
                timeout = null;
                if (!immediate) {
                    result = func.apply(context, args);
                }
            }
        };

        var callNow = immediate && !timeout;

        if (!timeout) {
            timeout = setTimeout(later, wait);
        }

        if (callNow) {
            result = func.apply(context, args);
        }

        return result;
    };
}

var APP = APP || {};

(function($) {
    var $window = $(window),
        $html = $('html'),
        $body = $('body'),
        $preloader_wrapper_inner = $('.preloader_main_wrapper_inner'),
        $header = $('#masthead'),
        $nav = $('#site-navigation'),
        $anchorMenuItem = $("ul.menu a[href^='#']:not([href='#'])"),
        $mobileMenu = $('#mobile-menu'),
        $section = $('section'),
        $slider = $('#slider'),
        $sliderParallax = $('.slider-parallax'),
        $sliderCaption = $('.slider-caption'),
        $sliderScroll = $('.scroll-down'),
        $fullScreen = $('.full-screen'),
        $parallax = $('.parallax'),
        $cssAnimate = $('.animated'),
        $wowAnimate = $('.wow'),
        $youtubeBgPlayer = $('.yt-bg-player'),
        $portfolioFilter = $('#portfolio-filter'),
        $portfolioWrap = $('.portfolio-wrap'),
        $portfolioContainer = $('#portfolio-container');
    $portfolioItem = $('.portfolio-item'),
        $portfolioLoader = $('#portfolio-loader'),
        $blogWrap = $('.blog-wrap'),
        $iconServiceModule = $('.icon-service-img-module'),
        $contactForm = $('#contact-form'),
        $subscribeForm = $('#subscribe-form'),
        $cfProcess = $('.contact-form-process'),
        $cfResult = $('#contact-form-result'),
        $msResult = $('#subscribe-form-result'),
        $gmContainer = $('#gmap-container'),
        $socialLink = $('.social-link'),
        $goToTop = $('#go-to-top'),
        $processLabel = $('.process-label li'),
        $owlCarouselProcess = $('.process-container.owl-carousel'),
        $owlCarouselTeam = $('.team-container.owl-carousel'),
        $owlCarouselTestimonial = $('.testimonial-container.owl-carousel'),
        $owlCarouselClient = $('.client-container.owl-carousel'),
        $owlCarouselTwitter = $('.tweet-container.owl-carousel'),
        $ocUpsellsProduct = $('.upsells #oc-product'),
        $ocRelatedProduct = $('.related #oc-product');
    $primaryMenuLink = $('ul#primary-menu li a');
	
	var fancybox = $('.fancybox');

//========================================
// Fancybox
//======================================== 	
	
    APP.initialize = {
        init: function() {
            APP.initialize.bootstrap();
            APP.initialize.responsiveClasses();
            APP.initialize.pageTransition();
            APP.initialize.imageFade();
            APP.initialize.fullScreen();
            APP.initialize.triangle();
            APP.initialize.topScrollOffset();
            APP.initialize.goToTop();
        },

        bootstrap: function() {
            var buttonStyle = app_vars.btn_style == '1' ? 'btn-light' : 'btn-dark';

            $('table').addClass('table');
            $('form').addClass('clearfix');
            $('label input').not(':input[type=checkbox]').addClass('form-control');
            $('input[type=submit]').addClass('btn ' + buttonStyle + ' btn-md');
            $('select').addClass('btn dropdown-toggle').wrap('<div class="select ' + buttonStyle + '"></div>');
        },

        responsiveClasses: function() {
            var jRes = jRespond([{
                    label: 'smallest',
                    enter: 0,
                    exit: 479
                },
                {
                    label: 'handheld',
                    enter: 480,
                    exit: 767
                },
                {
                    label: 'tablet',
                    enter: 768,
                    exit: 991
                },
                {
                    label: 'laptop',
                    enter: 992,
                    exit: 1199
                },
                {
                    label: 'desktop',
                    enter: 1200,
                    exit: 10000
                }
            ]);

            jRes.addFunc([{
                    breakpoint: 'desktop',
                    enter: function() {
                        $body.addClass('device-lg');
                    },
                    exit: function() {
                        $body.removeClass('device-lg');
                    }
                },

                {
                    breakpoint: 'laptop',
                    enter: function() {
                        $body.addClass('device-md');
                    },
                    exit: function() {
                        $body.removeClass('device-md');
                    }
                },

                {
                    breakpoint: 'tablet',
                    enter: function() {
                        $body.addClass('device-sm small-device');
                    },
                    exit: function() {
                        $body.removeClass('device-sm small-device');
                    }
                },

                {
                    breakpoint: 'handheld',
                    enter: function() {
                        $body.addClass('device-xs small-device');
                    },
                    exit: function() {
                        $body.removeClass('device-xs small-device');
                    }
                },

                {
                    breakpoint: 'smallest',
                    enter: function() {
                        $body.addClass('device-xxs small-device');
                    },
                    exit: function() {
                        $body.removeClass('device-xxs small-device');
                    }
                }
            ]);

            if (APP.isMobile.any()) {
                $body.addClass('device-touch');
            }
        },

        pageTransition: function() {
            if ($preloader_wrapper_inner.hasClass('animsition')) {
                $preloader_wrapper_inner.wrapInner('<div class="animsition"></div>').removeClass('animsition');

                var loaderStyle = app_vars.page_transition_spinner,
                    loaderSpinnerColor = app_vars.loading_spinner_color,
                    loaderBgColor = app_vars.loading_background_color,
                    loaderBgStyle = ' style="background-color:' + loaderSpinnerColor + ';"',
                    loaderBorderStyle1 = ' style="border:2px solid ' + loaderSpinnerColor + ';"',
                    loaderBorderStyle2 = ' style="border-color:' + loaderSpinnerColor + ' transparent;"',
                    loaderBorderStyle3 = ' style="border-color:' + loaderSpinnerColor + ';"',
                    loaderBorderStyle4 = ' style="border-left-color:transparent; border-right-color:transparent; border-bottom-color:' + loaderSpinnerColor + ';"',
                    loaderBorderStyle4 = ' style="border-left-color:transparent; border-right-color:transparent; border-bottom-color:' + loaderSpinnerColor + ';"',
                    loaderBgBorderStyle = ' style="background-color:' + loaderSpinnerColor + '; border-color:' + loaderSpinnerColor + ';"',
                    loaderBgImageStyle = ' style="background-image:-webkit-linear-gradient(transparent 0%, transparent 70%, ' + loaderSpinnerColor + ' 30%, ' + loaderSpinnerColor + ' 100%); background-image:linear-gradient(transparent 0%, transparent 70%, ' + loaderSpinnerColor + ' 30%, ' + loaderSpinnerColor + ' 100%);"',
                    loaderStyleHtml = '';

                if (loaderStyle == '1') {
                    loaderStyleHtml = '<div class="ball-pulse"><div' + loaderBgStyle + '></div><div' + loaderBgStyle + '></div><div' + loaderBgStyle + '></div></div>';
                } else if (loaderStyle == '2') {
                    loaderStyleHtml = '<div class="ball-grid-pulse"><div' + loaderBgStyle + '></div><div' + loaderBgStyle + '></div><div' + loaderBgStyle + '></div><div' + loaderBgStyle + '></div><div' + loaderBgStyle + '></div><div' + loaderBgStyle + '></div><div' + loaderBgStyle + '></div><div' + loaderBgStyle + '></div><div' + loaderBgStyle + '></div></div>';
                } else if (loaderStyle == '3') {
                    loaderStyleHtml = '<div class="ball-clip-rotate"><div' + loaderBorderStyle1 + '></div></div>';
                } else if (loaderStyle == '4') {
                    loaderStyleHtml = '<div class="ball-clip-rotate-pulse"><div' + loaderBgStyle + '></div><div' + loaderBorderStyle2 + '></div></div>';
                } else if (loaderStyle == '5') {
                    loaderStyleHtml = '<div class="ball-clip-rotate-multiple"><div' + loaderBorderStyle1 + '></div><div' + loaderBorderStyle1 + '></div></div>';
                } else if (loaderStyle == '6') {
                    loaderStyleHtml = '<div class="square-spin"><div' + loaderBgBorderStyle + '></div></div>';
                } else if (loaderStyle == '7') {
                    loaderStyleHtml = '<div class="ball-pulse-rise"><div' + loaderBgStyle + '></div><div' + loaderBgStyle + '></div><div' + loaderBgStyle + '></div><div' + loaderBgStyle + '></div><div' + loaderBgStyle + '></div></div>';
                } else if (loaderStyle == '8') {
                    loaderStyleHtml = '<div class="ball-rotate"><div' + loaderBgStyle + '></div></div>';
                } else if (loaderStyle == '9') {
                    loaderStyleHtml = '<div class="cube-transition"><div' + loaderBgStyle + '></div><div' + loaderBgStyle + '></div></div>';
                } else if (loaderStyle == '10') {
                    loaderStyleHtml = '<div class="ball-zig-zag"><div' + loaderBgStyle + '></div><div' + loaderBgStyle + '></div></div>';
                } else if (loaderStyle == '11') {
                    loaderStyleHtml = '<div class="ball-zig-zag-deflect"><div' + loaderBgStyle + '></div><div' + loaderBgStyle + '></div></div>';
                } else if (loaderStyle == '12') {
                    loaderStyleHtml = '<div class="ball-triangle-path"><div' + loaderBorderStyle3 + '></div><div' + loaderBorderStyle3 + '></div><div' + loaderBorderStyle3 + '></div></div>';
                } else if (loaderStyle == '13') {
                    loaderStyleHtml = '<div class="ball-scale"><div' + loaderBgStyle + '></div></div>';
                } else if (loaderStyle == '14') {
                    loaderStyleHtml = '<div class="line-scale"><div' + loaderBgStyle + '></div><div' + loaderBgStyle + '></div><div' + loaderBgStyle + '></div><div' + loaderBgStyle + '></div><div' + loaderBgStyle + '></div></div>';
                } else if (loaderStyle == '15') {
                    loaderStyleHtml = '<div class="line-scale-party"><div' + loaderBgStyle + '></div><div' + loaderBgStyle + '></div><div' + loaderBgStyle + '></div><div' + loaderBgStyle + '></div></div>';
                } else if (loaderStyle == '16') {
                    loaderStyleHtml = '<div class="ball-scale-multiple"><div' + loaderBgStyle + '></div><div' + loaderBgStyle + '></div><div' + loaderBgStyle + '></div><div' + loaderBgStyle + '></div><div' + loaderBgStyle + '></div></div>';
                } else if (loaderStyle == '17') {
                    loaderStyleHtml = '<div class="ball-pulse-sync"><div' + loaderBgStyle + '></div><div' + loaderBgStyle + '></div><div' + loaderBgStyle + '></div></div>';
                } else if (loaderStyle == '18') {
                    loaderStyleHtml = '<div class="ball-beat"><div' + loaderBgStyle + '></div><div' + loaderBgStyle + '></div><div' + loaderBgStyle + '></div></div>';
                } else if (loaderStyle == '19') {
                    loaderStyleHtml = '<div class="line-scale-pulse-out"><div' + loaderBgStyle + '></div><div' + loaderBgStyle + '></div><div' + loaderBgStyle + '></div><div' + loaderBgStyle + '></div><div' + loaderBgStyle + '></div></div>';
                } else if (loaderStyle == '20') {
                    loaderStyleHtml = '<div class="line-scale-pulse-out-rapid"><div' + loaderBgStyle + '></div><div' + loaderBgStyle + '></div><div' + loaderBgStyle + '></div><div' + loaderBgStyle + '></div><div' + loaderBgStyle + '></div></div>';
                } else if (loaderStyle == '21') {
                    loaderStyleHtml = '<div class="ball-scale-ripple"><div' + loaderBorderStyle1 + '></div></div>';
                } else if (loaderStyle == '22') {
                    loaderStyleHtml = '<div class="ball-scale-ripple-multiple"><div' + loaderBorderStyle1 + '></div><div' + loaderBorderStyle1 + '></div><div' + loaderBorderStyle1 + '></div></div>';
                } else if (loaderStyle == '23') {
                    loaderStyleHtml = '<div class="ball-spin-fade-loader"><div' + loaderBgStyle + '></div><div' + loaderBgStyle + '></div><div' + loaderBgStyle + '></div><div' + loaderBgStyle + '></div><div' + loaderBgStyle + '></div><div' + loaderBgStyle + '></div><div' + loaderBgStyle + '></div><div' + loaderBgStyle + '></div></div>';
                } else if (loaderStyle == '24') {
                    loaderStyleHtml = '<div class="line-spin-fade-loader"><div' + loaderBgStyle + '></div><div' + loaderBgStyle + '></div><div' + loaderBgStyle + '></div><div' + loaderBgStyle + '></div><div' + loaderBgStyle + '></div><div' + loaderBgStyle + '></div><div' + loaderBgStyle + '></div><div' + loaderBgStyle + '></div></div>';
                } else if (loaderStyle == '25') {
                    loaderStyleHtml = '<div class="triangle-skew-spin"><div' + loaderBorderStyle4 + '></div></div>';
                } else if (loaderStyle == '26') {
                    loaderStyleHtml = '<div class="pacman"><div' + loaderBorderStyle3 + '></div><div' + loaderBorderStyle3 + '></div><div' + loaderBgStyle + '></div><div' + loaderBgStyle + '></div><div' + loaderBgStyle + '></div></div>';
                } else if (loaderStyle == '27') {
                    loaderStyleHtml = '<div class="ball-grid-beat"><div' + loaderBgStyle + '></div><div' + loaderBgStyle + '></div><div' + loaderBgStyle + '></div><div' + loaderBgStyle + '></div><div' + loaderBgStyle + '></div><div' + loaderBgStyle + '></div><div' + loaderBgStyle + '></div><div' + loaderBgStyle + '></div><div' + loaderBgStyle + '></div></div>';
                } else if (loaderStyle == '28') {
                    loaderStyleHtml = '<div class="semi-circle-spin"><div' + loaderBgImageStyle + '></div></div>';
                }
                
                $('.animsition').animsition({
                    inClass: 'fade-in',
                    outClass: 'fade-out',
                    inDuration: 1500,
                    outDuration: 800,
                    //linkElement: '.animsition-link, a[href^="' + app_vars.home_url + '"]:not([target="_blank"]):not([href^="' + app_vars.current_page_url + '#"]):not([href^="#"]):not([href*="#respond"]):not([href*="javascript"]):not([href*=".jpg"]):not([href*=".jpeg"]):not([href*=".gif"]):not([href*=".png"]):not([href*=".mov"]):not([href*=".swf"]):not([href*=".mp4"]):not([href*=".flv"]):not([href*=".avi"]):not([href*=".mp3"]):not([href^="mailto:"])',
                    loading: true,
                    loadingParentElement: '.preloader_main_wrapper_inner',
                    loadingClass: 'loading-spinner',
                    unSupportCss: [
                        'animation-duration',
                        '-webkit-animation-duration',
                        '-o-animation-duration'
                    ],
                    overlay: false,
                    overlayClass: 'animsition-overlay-slide',
                    overlayParentElement: '.preloader_main_wrapper_inner'
                });

                $('.loading-spinner').css('background-color', loaderBgColor);
                $('.loading-spinner').append(loaderStyleHtml);
            }
        },

        imageFade: function() {
            $('.image-fade').hover(function() {
                $(this).animate({
                    opacity: 0.8
                }, 500);
            }, function() {
                $(this).animate({
                    opacity: 1
                }, 500);
            })
        },

        fullScreen: function() {
            var headerHeight = 0,
                wpAdminBarHeight = APP.initialize.wpAdminBar();

            if ($body.hasClass('small-device')) {
                headerHeight = 70;
            }

            if ($fullScreen.length > 0) {
                $fullScreen.each(function() {
                    var scrHeight = $window.height() - headerHeight - wpAdminBarHeight;

                    $(this).css('height', scrHeight);

                    if ($(this).attr('id') == 'slider' && $(this).has('.swiper-slide')) {
                        $(this).find('.swiper-slide').css('height', scrHeight);
                    }
                });
            }
        },

        triangle: function() {
            $section.each(function() {

                if (!$(this).is('.slider, .promo-box-hor-module, .client-module, .fun-fact-module, .subscribe-module, #shipping-calculator-form') && !$(this).prev().is('.slider, .promo-box-hor-module, .client-module, .fun-fact-module, .subscribe-module, .img-background, .yt-bg-player')) {
                    $(this).prepend('<div class="triangle wow fadeInDown" data-wow-delay=".5s"></div>');

                    $(this).find('.triangle').css({
                        'border-left': $(this).width() / 3 + 'px solid transparent',
                        'border-right': $(this).width() / 3 + 'px solid transparent',
                        'border-top-color': $(this).prev().css('background-color')
                    });
                }
                // New Code For Elementor
                if (!$(this).is('.elementor-element .slider,.elementor-element .promo-box-hor-module,.elementor-element .client-module,.elementor-element .fun-fact-module,.elementor-element .subscribe-module,.elementor-element #shipping-calculator-form') && !$(this).parent('.elementor-widget-container').parent('.elementor-element').prev('.elementor-element').children('.elementor-widget-container').children('section').is('.elementor-element .slider,.elementor-element .promo-box-hor-module,.elementor-element .client-module,.elementor-element .fun-fact-module,.elementor-element .subscribe-module,.elementor-element .img-background,.elementor-element .yt-bg-player')) {
                    $(this).find('.triangle').css({
                        'border-left': $(this).width() / 3 + 'px solid transparent',
                        'border-right': $(this).width() / 3 + 'px solid transparent',
                        'border-top-color': $(this).parent().parent().prev().children('.elementor-widget-container').children('.module').css('background-color')
                    });
                }
            });
        },

        topScrollOffset: function() {
            var topOffsetScroll = 0,
                adminBarHeight = APP.initialize.wpAdminBar();

            if ($header.hasClass('sticky')) {
                if (!$header.hasClass('sticky-header')) {
                    topOffsetScroll = adminBarHeight + 140;
                } else {
                    topOffsetScroll = adminBarHeight + 70;
                }
            } else {
                topOffsetScroll = adminBarHeight;
            }

            return topOffsetScroll;
        },

        wpAdminBar: function() {
            var wpAdminBarHeight = 0;

            if ($body.hasClass('admin-bar')) {
                wpAdminBarHeight = $('#wpadminbar').height();
            }

            return wpAdminBarHeight;
        },

        goToTop: function() {
            $goToTop.click(function(e) {
                $('body, html').stop(true).animate({
                    scrollTop: 0
                }, 500, 'easeInOutExpo');

                e.preventDefault();
            });
        },

        goToTopScroll: function() {
            if ($body.hasClass('device-lg') || $body.hasClass('device-md') || $body.hasClass('device-sm')) {
                if ($window.scrollTop() > 450) {
                    $goToTop.fadeIn();
                } else {
                    $goToTop.fadeOut();
                }
            }
        }
    }

    APP.header = {
        init: function() {
            APP.header.progressBar();
            APP.header.anchorMenu();
            APP.header.headerMenu();
            APP.header.menuInvert();
            APP.header.mobileMenu();
        },

        progressBar: function() {
            $('.scroll-progress-bar .scroll-shadow').css('box-shadow', '0 0 10px' + app_vars.progress_bar_color + ', 0 0 5px ' + app_vars.progress_bar_color);

            var $progressBar = $('#scroll-progress-bar').find('div');

            $window.scroll(function() {
                var current = $window.scrollTop(),
                    max = $body.height() - $window.height();

                $progressBar.width((current / max) * 100 + '%');
            });
        },

        anchorMenu: function() {
            $("ul.menu a[href='#']").click(function(e) {
                e.preventDefault();
            });

            if ($anchorMenuItem.length > 0 && app_vars.current_page_url != app_vars.home_url) {
                $anchorMenuItem.each(function() {
                    $(this).attr('href', app_vars.home_url + this.hash.replace('#', '#smoothscroll-'));
                });
            }
        },

        headerMenu: function() {
            var wpAdminBarHeight = APP.initialize.wpAdminBar(),
                jRes = jRespond([{
                        label: 'wpadminbar_600',
                        enter: 0,
                        exit: 600
                    },
                    {
                        label: 'wpadminbar_782',
                        enter: 601,
                        exit: 782
                    }
                ]);

            if ($body.hasClass('admin-bar')) {
                if (jRes.getBreakpoint() != 'wpadminbar_600') {
                    $header.css('margin-top', wpAdminBarHeight + 'px');
                } else {
                    $header.css('padding-top', wpAdminBarHeight + 'px');
                }
            }

            if ($body.hasClass('device-md') || $body.hasClass('device-lg')) {
                if ($window.scrollTop() > 0) {
                    if ($header.hasClass('sticky') && !$header.hasClass('no-sticky')) {
                        $header.addClass('sticky-header');

                        if ($body.hasClass('admin-bar')) {
                            $header.css('margin-top', 0);
                        }
                    }
                } else {
                    if ($header.hasClass('sticky-header')) {
                        $header.removeClass('sticky-header');

                        $header.css('top', 0);

                    }
                }
            } else {
                $('#masthead:not(.no-sticky)').addClass('sticky-header');
            }

            if ($body.hasClass('small-device')) {
                if ($header.hasClass('sticky-header')) {
                    $('#slider, .page-header').css({
                        'top': 70 + wpAdminBarHeight + 'px',
                        'margin-bottom': 70 + wpAdminBarHeight + 'px'
                    });

                    if ($body.hasClass('admin-bar')) {
                        $header.css({
                            'margin-top': 0,
                            'padding-top': 0
                        });
                    }
                } else {
                    $('#slider, .page-header').css({
                        'top': 0,
                        'margin-bottom': 0
                    });
                }
            } else {
                if ($('#slider, .page-header').parent().hasClass('elementor-widget-container')) {
                    $('#slider, .page-header').css({
                        'top': '-115px',
                        'margin-bottom': '-85px'
                    });
                } else {

                    $('#slider, .page-header').css({
                        'top': '-85px',
                        'margin-bottom': '-85px'
                    });
                }


            }

            if ($header.hasClass('sticky-header')) {
                if (wpAdminBarHeight == 32 || (jRes.getBreakpoint() == 'wpadminbar_782' && wpAdminBarHeight == 46)) {
                    $header.css('top', wpAdminBarHeight + 'px');
                }

                if ($body.hasClass('small-device')) {
                    if (jRes.getBreakpoint() == 'wpadminbar_600') {
                        if ($window.scrollTop() > wpAdminBarHeight) {
                            $header.css('top', 0);
                        } else {
                            $header.css('top', wpAdminBarHeight - $window.scrollTop() + 'px');
                        }
                    }
                }
            }
        },

        menuInvert: function() {
            $('.main-navigation ul ul').each(function(index, element) {
                var $menuChildElement = $(element),
                    windowWidth = $window.width(),
                    menuChildOffset = $menuChildElement.offset(),
                    menuChildWidth = $menuChildElement.width(),
                    menuChildLeft = menuChildOffset.left;

                if (windowWidth - (menuChildWidth + menuChildLeft) < 0) {
                    $menuChildElement.addClass('menu-pos-invert');
                }
            });

        },

        mobileMenu: function() {
            $mobileMenu.click(function() {
                $mobileMenu.toggleClass('closed');

                if ($mobileMenu.hasClass('closed')) {
                    var wpAdminBarHeight = APP.initialize.wpAdminBar();

                    $nav.slideDown();

                    setTimeout(function() {
                        if ($nav.height() + $nav.offset().top > $window.height()) {
                            $nav.css('height', $window.height() - 70 - wpAdminBarHeight + 'px');
                        }
                    }, 500);
                } else {
                    $nav.slideUp();
                }
            });
            $primaryMenuLink.click(function(e) {
                if ($mobileMenu.hasClass('closed')) {
                    $mobileMenu.removeClass('closed');
                    $nav.slideUp();
                }
            });
        },

        activateCurrentMenu: function() {
            $anchorMenuItem.each(function() {
                var sectionContainer = $('section' + this.hash),
                    windowScrollTop = $window.scrollTop(),
                    topOffsetScroll = APP.initialize.topScrollOffset();

                if (sectionContainer.length > 0) {
                    var sectionOffset = sectionContainer.offset().top;

                    if (sectionOffset - windowScrollTop - topOffsetScroll <= 5) {
                        $(this).closest('ul').children().removeClass('current-menu-item');
                        $(this).parent().addClass('current-menu-item');
                    } else {
                        $(this).parent().removeClass('current-menu-item');
                    }
                }
            });
        }
    }

    APP.slider = {
        init: function() {
            APP.slider.sliderParallax();
            APP.slider.sliderScrollDown();
            APP.slider.swiperSlider();
        },

        sliderParallax: function() {
            if ($sliderParallax.length > 0) {
                if (!APP.isMobile.any()) {
                    var parallaxHeight = $sliderParallax.outerHeight();

                    if (parallaxHeight > $window.scrollTop()) {
                        if ($window.scrollTop() > 0) {
                            var tranformAmount1 = (($window.scrollTop()) / 3),
                                tranformAmount2 = (($window.scrollTop()) / 6);

                            $sliderParallax.stop(true, true).transition({
                                y: tranformAmount1
                            }, 0);
                            $sliderCaption.stop(true, true).transition({
                                y: -tranformAmount2
                            }, 0);
                            $sliderScroll.stop(true, true).css('bottom', 40 + $window.scrollTop() + 'px');
                        } else {
                            $sliderParallax.transition({
                                y: 0
                            }, 0);
                            $sliderCaption.transition({
                                y: 0
                            }, 0);
                            $sliderScroll.css('bottom', '40px');
                        }
                    }

                    if (requesting) {
                        requestAnimationFrame(function() {
                            APP.slider.sliderParallax();
                        });
                    }
                }
            }
        },

        sliderFade: function() {
            if (!APP.isMobile.any()) {
                if ($window.scrollTop() > 0) {
                    var sliderHeight = $slider.outerHeight();

                    $slider.find($sliderCaption).css('opacity', ((sliderHeight / 2 - $window.scrollTop()) / sliderHeight).toFixed(1));
                    $slider.find($sliderScroll).css('opacity', ((sliderHeight / 3 - $window.scrollTop()) / sliderHeight).toFixed(1));
                    $slider.find('#slider-arrow-left, #slider-arrow-right').css('opacity', ((sliderHeight / 2 - $window.scrollTop()) / sliderHeight).toFixed(1));
                } else {
                    $slider.find($sliderCaption).css('opacity', 1);
                    $slider.find($sliderScroll).css('opacity', 1);
                    $slider.find('#slider-arrow-left, #slider-arrow-right').css('opacity', 1);
                }
            }
        },

        sliderScrollDown: function() {

            var $scrollToElement = $slider.next();
            if ($slider.parent().hasClass('elementor-widget-container')) {
                var $scrollToElement = $slider.closest('section.elementor-element').next();
            } else {
                var $scrollToElement = $slider.next();
            }

            if ($scrollToElement.length > 0) {
                $sliderScroll.click(function() {
                    var topOffsetScroll = APP.initialize.topScrollOffset();

                    $('html, body').stop(true).animate({
                        scrollTop: $scrollToElement.offset().top - topOffsetScroll
                    }, 1000, 'easeInOutExpo');
                });
            }
        },

        swiperSlider: function() {
            if ($('.swiper-container').length > 0) {
                var autoslide = $('.swiper-container').attr('data-autoslide');
                var sliderspeed = $('.swiper-container').attr('data-sliderspeed');
                var autoplaySet = '';
                var autoplaySpeed = '';
                if (sliderspeed !== '') {
                    autoplaySpeed = sliderspeed;
                    console.log(sliderspeed);
                } else {
                    autoplaySpeed = 5000;
                }

                if (autoslide !== '') {
                    if (autoslide == 1 || autoslide == 'on') {
                        var swipersetting = {
                            slidesPerView: 1,
                            grabCursor: true,
                            resizeReInit: true,
                            autoplay: {
                                delay: autoplaySpeed,
                                disableOnInteraction: false,
                            },
                            loop: true,
                            navigation: {
                                nextEl: '#slider-arrow-right',
                                prevEl: '#slider-arrow-left',
                            },
                            on: {
                                init: function(swiper) {
                                    $('.slider').find('[data-animation]').each(function() {
                                        var $toAnimateElement = $(this),
                                            animationDelayTime = Number($(this).attr('data-animation-delay'));
                                        var elementAnimation = $toAnimateElement.attr('data-animation');
                                        $toAnimateElement.addClass('no-animation');
                                        setTimeout(function() {
                                            $toAnimateElement.removeClass('no-animation').addClass('animated ' + elementAnimation);
                                        }, animationDelayTime);
                                    });
                                },
                                slideChangeTransitionStart: function(swiper) {
                                    $('.slider').find('[data-animation]').each(function() {
                                        var $toAnimateElement = $(this);
                                        var elementAnimation = $toAnimateElement.attr('data-animation');

                                        $toAnimateElement.removeClass('animated').removeClass(elementAnimation).addClass('no-animation');
                                    });
                                },
                                slideChangeTransitionEnd: function(swiper) {
                                    $('.slider .swiper-slide.swiper-slide-active').each(function() {
                                        var toAnimateElement = $(this);
                                        console.log(parseInt(toAnimateElement.attr('data-swiper-slide-index'), 10) + 1);
                                        $('#slide-number-current').html(parseInt(toAnimateElement.attr('data-swiper-slide-index'), 10) + 1);
                                        if (parseInt(toAnimateElement.attr('data-swiper-slide-index')) > 0) {

                                        }

                                    });
                                    $('.slider .swiper-slide.swiper-slide-active [data-animation]').each(function() {
                                        var $toAnimateElement = $(this),
                                            animationDelayTime = Number($(this).attr('data-animation-delay'));
                                        var elementAnimation = $toAnimateElement.attr('data-animation');

                                        $toAnimateElement.addClass('no-animation');

                                        setTimeout(function() {
                                            $toAnimateElement.removeClass('no-animation').addClass('animated ' + elementAnimation);
                                        }, animationDelayTime);
                                    });
                                }
                            }
                        }

                    } else {

                        var swipersetting = {
                            grabCursor: true,
                            resizeReInit: true,
                            navigation: {
                                nextEl: '#slider-arrow-right',
                                prevEl: '#slider-arrow-left',
                            },
                            on: {
                                init: function(swiper) {
                                    $('.slider').find('[data-animation]').each(function() {
                                        var $toAnimateElement = $(this),
                                            animationDelayTime = Number($(this).attr('data-animation-delay'));

                                        var elementAnimation = $toAnimateElement.attr('data-animation');

                                        $toAnimateElement.addClass('no-animation');

                                        setTimeout(function() {
                                            $toAnimateElement.removeClass('no-animation').addClass('animated ' + elementAnimation);
                                        }, animationDelayTime);
                                    });
                                },
                                slideChangeTransitionStart: function(swiper) {
                                    console.log($('.swiper-container .swiper-wrapper .swiper-slide-active').index() + 1);
                                    //  $('#slide-number-current').html($('.swiper-container .swiper-wrapper .swiper-slide-active').index() + 1);

                                    $('.slider').find('[data-animation]').each(function() {
                                        var $toAnimateElement = $(this);
                                        var elementAnimation = $toAnimateElement.attr('data-animation');

                                        $toAnimateElement.removeClass('animated').removeClass(elementAnimation).addClass('no-animation');
                                    });
                                },
                                slideChangeTransitionEnd: function(swiper) {
                                    $('.slider .swiper-slide.swiper-slide-active').each(function() {
                                        var toAnimateElement = $(this);
                                        $('#slide-number-current').html(toAnimateElement.index() + 1);
                                    });

                                    $('.slider .swiper-slide.swiper-slide-active [data-animation]').each(function() {
                                        var $toAnimateElement = $(this),
                                            animationDelayTime = Number($(this).attr('data-animation-delay'));

                                        var elementAnimation = $toAnimateElement.attr('data-animation');

                                        $toAnimateElement.addClass('no-animation');

                                        setTimeout(function() {
                                            $toAnimateElement.removeClass('no-animation').addClass('animated ' + elementAnimation);
                                        }, animationDelayTime);
                                    });
                                }
                            }
                        }

                    }

                    var swiperSlider = new Swiper('.swiper-container', swipersetting);

                    if (autoslide !== '') {
                        if (autoslide == 1 || autoslide == 'on') {
                            var total_slides = swiperSlider.slides.length - 2;
                        } else {
                            var total_slides = swiperSlider.slides.length;
                            $('#slide-number-current').html(swiperSlider.activeIndex + 1);
                        }
                    }
                    $('#slide-number-total').html(total_slides);

                }
            }
        }
    }

    APP.portfolio = {
        init: function() {
            APP.portfolio.load();
            APP.portfolio.filter();
            APP.portfolio.ajaxload();
        },

        load: function() {
            var portfolioItemWidth = 0,
                portfolioWrapWidth = $portfolioWrap.width();
				var portfolioitemcount = $portfolioWrap.data('itemcolumn');
            if ($body.hasClass('device-lg')) {
               portfolioItemWidth = portfolioWrapWidth / portfolioitemcount;
            } else if ($body.hasClass('device-md')) {
                portfolioItemWidth = portfolioWrapWidth / 3;
            } else if ($body.hasClass('device-sm') || $body.hasClass('device-xs')) {
                portfolioItemWidth = portfolioWrapWidth / 2;
            } else {
                portfolioItemWidth = portfolioWrapWidth;
            }

            $portfolioItem.css('width', portfolioItemWidth + 'px');


            var portfolioModules = $('.portfolio-module .portfolio-filters a.active').data('filter');
            //alert(portfolioModules);
            if (portfolioModules == "*") {
                $portfolioWrap.imagesLoaded(function() {
                    $portfolioWrap.isotope({
                        transitionDuration: '.65s'
                    });
                });
            } else {
                $portfolioWrap.imagesLoaded(function() {
                    $portfolioWrap.isotope({
                        transitionDuration: '.65s',
                        filter: portfolioModules
                    });
                });
            }

        },

        filter: function() {
            $portfolioFilter.find('a').click(function(e) {
                $portfolioFilter.find('a.active').removeClass('active');
                $(this).addClass('active');

                $portfolioWrap.isotope({
                    filter: $(this).attr('data-filter')
                });

                e.preventDefault();
            });

            $portfolioFilter.on({
                click: function(e) {
                    e.preventDefault();
                }
            }, 'a.active');
        },

        ajaxload: function() {			
			
			$portfolioItem.find(".ajax-content-box").click( function( e ) {
				var portfolioId = $( this ).parents( '.portfolio-item' ).attr( 'id' );

				if ( ! $( this ).parents( '.portfolio-item' ).hasClass( 'portfolio-active' ) ) {
				APP.portfolio.loadPortfolio( portfolioId );
				}
				e.preventDefault();
			});
            $portfolioItem.find("a.fancybox-images").click( function( e ) {
				e.preventDefault();		
				var popupItemID = $(this).next('div').attr('id');
				
				if ($("#"+popupItemID).length) {
					//$("#"+popupItemID).children('.fancybox').fancybox();
					if($('.popup_preview').children('a').hasClass('fancybox')){
						$('.popup_preview').children('a').removeClass('fancybox');
					}
					$("#"+popupItemID).children('a').addClass('fancybox');
							fancybox.fancybox({
	loop : false
});
					$("#"+popupItemID).children('.fancybox:first-child').trigger('click');
				}
				return false;
			});
			
			
        },

        loadPortfolio: function(portfolioId) {
            var portfolioNext = APP.portfolio.getNextItem(portfolioId),
                portfolioPrev = APP.portfolio.getPrevItem(portfolioId);

            APP.portfolio.closePortfolio();
            $portfolioLoader.fadeIn();

            $portfolioContainer.load(
                $.ajax({
                    type: 'POST',
                    url: app_vars.ajax_url,
                    data: {
                        action: 'ajax_portfolio',
                        portfolio_id: portfolioId,
                        portfolio_next: portfolioNext,
                        portfolio_prev: portfolioPrev
                    },

                    success: function(html) {
                        $portfolioContainer.append(html);
                        APP.portfolio.initializePortfolio(portfolioId);
                        APP.portfolio.openPortfolio(portfolioId);

                        $portfolioItem.removeClass('portfolio-active');
                        $('#' + portfolioId).addClass('portfolio-active');
                    }
                })
            );
        },

        getNextItem: function(portfolioId) {
            var portfolioNext = '',
                hasNext = $('#' + portfolioId).nextAll(':visible').first();
                hasPrev = $('#' + portfolioId).prevAll(':visible').last();

            if (hasNext.length != 0) {
                portfolioNext = hasNext.attr('id');
            }else if(hasPrev.length != 0){
                portfolioNext = hasPrev.attr('id');
            }

            return portfolioNext;
        },

        getPrevItem: function(portfolioId) {
            var portfolioPrev = '',
                hasPrev = $('#' + portfolioId).prevAll(':visible').first();
                hasNext = $('#' + portfolioId).nextAll(':visible').last();
            
            if (hasPrev.length != 0) {
                portfolioPrev = hasPrev.attr('id');
            }else if(hasNext.length != 0){
                portfolioPrev = hasNext.attr('id');
            }

            return portfolioPrev;
        },

        closePortfolio: function() {
            if ($portfolioContainer.find('#portfolio-ajax-single').length != 0) {

                $portfolioContainer.fadeOut(500, function() {
                    $(this).find('#portfolio-ajax-single').remove();
                });

                $portfolioContainer.removeClass('ajax-portfolio-opened');
            }
        },

        initializePortfolio: function(portfolioId) {
            $('#next-portfolio, #prev-portfolio').click(function(e) {
                if ($body.hasClass('device-md') || $body.hasClass('device-lg')) {
                    $portfolioContainer.height(0);
                }

                var portfolioId = $(this).attr('data-id');

                $portfolioItem.removeClass('portfolio-active');
                $('#' + portfolioId).addClass('portfolio-active');

                APP.portfolio.loadPortfolio(portfolioId);

                e.preventDefault();
            });

            $portfolioContainer.on('click', '#close-portfolio', function(e) {
                if ($body.hasClass('device-md') || $body.hasClass('device-lg')) {
                    $portfolioContainer.height(0);
                }

                $portfolioContainer.fadeOut(500, function() {
                    $portfolioContainer.find('#portfolio-ajax-single').remove();
                });

                $portfolioItem.removeClass('portfolio-active');
                $portfolioContainer.removeClass('ajax-portfolio-opened');

                e.preventDefault();
            });
        },

        openPortfolio: function(portfolioId) {
            var topOffsetScroll = APP.initialize.topScrollOffset();

            $portfolioContainer.addClass('ajax-portfolio-opened');

            setTimeout(function() {
                $portfolioContainer.imagesLoaded(function() {
                    $portfolioContainer.fadeIn(500);

                    APP.widget.flexSlider();
                    APP.initialize.imageFade();
                    APP.widget.magnificPopup();

                    var containerHeight = 'auto';

                    if ($portfolioContainer.find('.fslider').length > 0) {
                        containerHeight = $('#master.fslider').height() + 78;
                    } else {
                        containerHeight = $('.portfolio-single-image').height();
                    }

                    if ($body.hasClass('device-md') || $body.hasClass('device-lg')) {
                        $portfolioContainer.height(containerHeight);
                        $('#portfolio-single-content').height(containerHeight);

                        $('#portfolio-single-content').niceScroll('.portfolio-single-content', {
                            cursorcolor: $('.portfolio-ajax-single').css('color'),
                            cursorwidth: '5px',
                            cursorfixedheight: 50,
                            cursorborder: 0,
                            cursorborderradius: 0,
                            scrollspeed: 10,
                            mousescrollstep: 10,
                            horizrailenabled: false,
                            autohidemode: false,
                            zindex: 99
                        });
                    }

                    $portfolioLoader.fadeOut();

                    if ($body.hasClass('device-md') || $body.hasClass('device-lg')) {
                        scrollToTop = $portfolioContainer.offset().top - topOffsetScroll - 90;
                    } else {
                        scrollToTop = $portfolioContainer.offset().top - topOffsetScroll;
                    }

                    $('html, body').stop(true, true).animate({
                        scrollTop: scrollToTop
                    }, 800, 'easeOutQuad');
                });
            }, 500);
        },
    }

    APP.blog = {
        init: function() {
            APP.blog.containerHeight();
        },

        containerHeight: function() {
            setTimeout(function() {
                if ($blogWrap.find('.blog-item').length > 0) {
                    var $blogItem = $blogWrap.find('.blog-item .entry-media');

                    var containerHeight = $blogItem.eq(0).width() * 3 / 4;

                    $blogItem.css('height', containerHeight + 'px');

                    $('.see-more-wrap').css('height', containerHeight + 'px');
                }
            }, 500);
        }
    }

    APP.process = {
        init: function() {
            APP.process.owlCarousel();
        },

        label: function() {
            var i = 0,
                labelSum = $processLabel.length;

            var percent = 100 / (labelSum == 1 ? 2 : labelSum - 1);

            $processLabel.each(function() {
                var labelWidth = $(this).find('span').width();

                $(this).css({
                    'left': i * percent + '%',
                    'width': labelWidth + 1 + 'px',
                    'margin-left': -(labelWidth / 2) + 'px'
                });

                i++;
            });
        },

        owlCarousel: function() {
            $owlCarouselProcess.owlCarousel({
                items: 1,
                smartSpeed: 500
            });

            $owlCarouselProcess.find('.owl-dots').addClass('line-process-wrapper');

            var i = 1,
                $owlCarouselDots = $owlCarouselProcess.find('.owl-dots'),
                $owlCarouselDot = $owlCarouselDots.find('.owl-dot');

            $owlCarouselDot.each(function() {
                $(this).attr('data-order', i);
                i++;
            });

            var i = 0,
                dotSum = $owlCarouselDot.length;

            var percent = 100 / (dotSum == 1 ? 2 : dotSum - 1);

            $owlCarouselDot.each(function() {
                $(this).css({
                    left: i * percent + "%"
                });

                i++;
            });

            $owlCarouselProcess.on('changed.owl.carousel', function(event) {
                var lineWidth = $owlCarouselDot.eq(event.item.index).attr('data-order') - 1,
                    lineProcess = $('.line-process'),
                    $owlCarouselDotActive = $owlCarouselDots.find('.owl-dot.active');

                lineProcess.width(percent * lineWidth + '%');

                $owlCarouselDot.each(function() {
                    if ($(this).attr('data-order') < $owlCarouselDotActive.attr('data-order')) {
                        $(this).children('span').addClass('process-active-dot');
                    } else {
                        $(this).children('span').removeClass('process-active-dot');
                    }
                });

                $processLabel.each(function() {
                    if ($(this).attr('data-order') == $owlCarouselDotActive.attr('data-order')) {
                        $(this).addClass('process-active');
                    } else {
                        $(this).removeClass('process-active');
                    }
                });
            });
        }
    }

    APP.team = {
        init: function() {
            APP.team.owlCarousel();
            APP.team.profileContainer();
            APP.team.touch();
        },

        owlCarousel: function() {
            $owlCarouselTeam.owlCarousel({
                smartSpeed: 200,
                mouseDrag: false,
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    479: {
                        items: 2
                    },
                    991: {
                        items: 3
                    },
                    1200: {
                        items: 4
                    }
                }
            });

            $owlCarouselTeam.find('.owl-dots').addClass('dot-container');
        },

        profileContainer: function() {
            $owlCarouselTeam.imagesLoaded(function() {
                $owlCarouselTeam.find('.team-member').each(function() {
                    var containerWidth = $(this).find('.member-image').width();
                    var containerHeight = $(this).find('.member-image').height();


                    $(this).find('.member-profile').css({
                        'top': containerHeight + 'px',
                        'width': containerWidth + 'px',
                        'height': containerHeight + 'px'
                    });

                    $(this).on('mouseenter', function() {
                        $(this).find('.member-bio').niceScroll({
                            cursorcolor: $('.team-member .member-profile').css('color'),
                            cursorwidth: '3px',
                            cursorfixedheight: 30,
                            cursorborder: 0,
                            cursorborderradius: 0,
                            scrollspeed: 10,
                            mousescrollstep: 10,
                            horizrailenabled: false,
                            autohidemode: false,
                            zindex: 1
                        });
                    }).on('mouseleave', function() {
                        $(this).find('.member-bio').getNiceScroll().remove();
                    });
                });
            });
        },

        touch: function() {
            if ($body.hasClass('device-touch')) {
                $owlCarouselTeam.on('mouseup', '.team-member', function() {
                    if (!$(this).hasClass('active')) {
                        $(this).find('.member-profile').stop(true).animate({
                            'top': '0'
                        }, 350, 'easeOutQuad');

                        $(this).addClass('active');
                    } else {
                        var containerHeight = $(this).find('.member-image').css('height');

                        $(this).find('.member-profile').stop(true).animate({
                            'top': containerHeight
                        }, 350, 'easeOutQuad');

                        $(this).removeClass('active');
                    }
                });
            }
        }
    }

    APP.skillBar = {
        init: function() {
            APP.skillBar.counter();
        },

        counter: function() {
            if ($('#skill-bar').length > 0) {
                var waypoint = new Waypoint({
                    element: '#skill-bar',
                    handler: function() {
                        $('.skill-bar').each(function() {
                            $(this).find('.bar-timer').countTo();

                            var toWidth = $(this).find('.bar-timer').data('to');

                            $(this).find('.line-active').width(toWidth + '%');
                        });

                        this.destroy();
                    },
                    offset: '80%'
                });
            }
        }
    }

    APP.funFact = {
        init: function() {
            APP.funFact.counter();
        },

        counter: function() {
            if ($('.fun-fact-module').length > 0) {
                var waypoint = new Waypoint({
                    element: '.fun-fact-module',
                    handler: function() {
                        $('.fact-item').each(function() {
                            $(this).find('.fact-number').css('visibility', 'visible');
                            $(this).find('.fact-number').countTo();
                        });

                        this.destroy();
                    },
                    offset: 'bottom-in-view'
                });
            }
        }
    }

    APP.testimonial = {
        init: function() {
            APP.testimonial.owlCarousel();
        },

        owlCarousel: function() {
            $owlCarouselTestimonial.owlCarousel({
                smartSpeed: 200,
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    479: {
                        items: 2
                    }
                }
            });

            $owlCarouselTestimonial.find('.owl-dots').addClass('dot-container');
        },
    }

    APP.client = {
        init: function() {
            APP.client.owlCarousel();
        },

        owlCarousel: function() {
            $owlCarouselClient.owlCarousel({
                autoplay: true,
                autoplayHoverPause: true,
                autoplaySpeed: 1000,
                autoplayTimeout: 2000,
                smartSpeed: 1200,
                stagePadding: 0,
                center: false,
                loop: true,
                rewind: true,
                dots: false,
                responsive: {
                    0: {
                        items: 2,
                        margin: 20
                    },
                    479: {
                        items: 3,
                        margin: 70
                    },
                    767: {
                        items: 4,
                        margin: 70
                    },
                    991: {
                        items: 4,
                        margin: 100
                    },
                    1200: {
                        items: 4,
                        margin: 120
                    }
                }
            });
        },
    }

    APP.pricingTable = {
        init: function() {
            APP.pricingTable.active();
        },

        active: function() {
            if ($('.pricing-item').length > 0) {
                $('.pricing-item').each(function() {
                    $(this).hover(function() {
                        if ($(this).find('.pb-special-price').length == 0) {
                            $(this).find('.item-price').addClass('pb-active-price');
                            $('.pricing-table-container').find('.pb-special-price').addClass('special-price').removeClass('pb-special-price');
                        }
                    }, function() {
                        if ($(this).find('.pb-active-price').length > 0) {
                            $(this).find('.pb-active-price').removeClass('pb-active-price');
                            $('.pricing-table-container').find('.special-price').removeClass('special-price').addClass('pb-special-price');
                        }
                    });
                });
            }
        }
    }

    APP.twitter = {
        init: function() {
            APP.twitter.owlCarousel();
        },

        owlCarousel: function() {
            $owlCarouselTwitter.owlCarousel({
                animateIn: 'flipInX',
                animateOut: 'zoomOut',
                smartSpeed: 500,
                items: 1,
                loop: true,
                center: true,
                margin: 10,
                autoplay: false,
                autoplayTimeout: 4000,
                autoplayHoverPause: true,
                responsive: {
                    0: {
                        nav: false
                    },
                    768: {
                        nav: true
                    }
                }
            });

            $owlCarouselTwitter.find('.owl-dots').addClass('dot-container');
            $owlCarouselTwitter.find('.owl-prev').addClass('carousel-control left').empty().append('<i class="fa fa-angle-left"></i>');
            $owlCarouselTwitter.find('.owl-next').addClass('carousel-control right ').empty().append('<i class="fa fa-angle-right"></i>');
        }
    }

    APP.serviceBox = {
        init: function() {
            APP.serviceBox.containerHeight();
        },

        containerHeight: function() {
            if ($iconServiceModule.length > 0) {
                if (!$body.hasClass('small-device')) {
                    $iconServiceModule.imagesLoaded(function() {
                        var imgBoxHeight = $('.icon-box-img').height(),
                            leftBoxHeight = $('.left-icon-boxes').height();

                        if (imgBoxHeight < leftBoxHeight) {
                            $('.icon-box-img').css('margin-top', (leftBoxHeight - imgBoxHeight) / 2 + 'px');
                        } else {
                            $('.left-icon-boxes, .right-icon-boxes').css('margin-top', (imgBoxHeight - leftBoxHeight) / 2 - 10 + 'px');
                        }
                    });
                } else {
                    $('.icon-box-img').css('margin-top', '');
                    $('.left-icon-boxes, .right-icon-boxes').css('margin-top', '');
                }
            }
        }
    }

    APP.footer = {
        init: function() {
            APP.footer.socialLink();
        },

        socialLink: function() {
            if ($socialLink.length != 0) {
                $socialLink.find('li a').each(function() {
                    var title = $(this).find('div').text();

                    $(this).attr('data-original-title', title);

                    $(this).tooltip({
                        placement: 'top',
                        container: 'body'
                    });
                });

                $socialLink.find('ul li a i').each(function() {
                    $(this).after($(this).clone());
                });
            }
        }
    }

    APP.product = {
        init: function() {
            APP.product.addToCart();
            APP.product.carousel();
        },

        addToCart: function() {
            var $addToCartEL = $('.product-overlay a.add_to_cart_button');

            $addToCartEL.each(function() {
                $(this).click(function() {
                    var $addToCartEL = $(this),
                        t = setTimeout(function() {
                            if ($addToCartEL.next('.added_to_cart').length > 0) {
                                $addToCartEL.html('<i class="fa fa-check-circle-o"></i>' + app_vars.added_to_cart);
                            }
                        }, 1000);
                });
            });
        },

        carousel: function() {
            if ($ocUpsellsProduct.find('.oc-item').length > 0) {
                $ocUpsellsProduct.owlCarousel({
                    margin: 10,
                    nav: false,
                    dots: true,
                    responsive: {
                        0: {
                            items: 1
                        },
                        600: {
                            items: 2
                        },
                        1000: {
                            items: 3
                        }
                    }
                });

                $ocUpsellsProduct.find('.owl-dots').addClass('dot-container');
            }

            if ($ocRelatedProduct.length) {
                $ocRelatedProduct.owlCarousel({
                    margin: 20,
                    nav: false,
                    dots: true,
                    responsive: {
                        0: {
                            items: 1
                        },
                        600: {
                            items: 2
                        },
                        1000: {
                            items: 4
                        }
                    }
                });

                $ocRelatedProduct.find('.owl-dots').addClass('dot-container');
            }
        }
    }

    APP.isMobile = {
        Android: function() {
            return navigator.userAgent.match(/Android/i);
        },

        BlackBerry: function() {
            return navigator.userAgent.match(/BlackBerry/i);
        },

        iOS: function() {
            return navigator.userAgent.match(/iPhone|iPad|iPod/i);
        },

        Opera: function() {
            return navigator.userAgent.match(/Opera Mini/i);
        },

        Windows: function() {
            return navigator.userAgent.match(/IEMobile/i);
        },

        any: function() {
            return (APP.isMobile.Android() || APP.isMobile.BlackBerry() || APP.isMobile.iOS() || APP.isMobile.Opera() || APP.isMobile.Windows());
        }
    }

    APP.widget = {
        init: function() {
            APP.widget.wow();
            APP.widget.smoothScroll();
            APP.widget.magnificPopup();
            APP.widget.youtubeBgVideo();
            APP.widget.sendMail();
            APP.widget.subscribe();
        },

        wow: function() {
            if ($wowAnimate.length > 0) {
                var wow = new WOW({
                    mobile: false
                });

                wow.init();
            }
        },

        smoothScroll: function() {
            var hashLocation = false;

            if (location.hash) {
                hashLocation = window.location.hash;

                setTimeout(function() {
                    hashLocation = window.location.hash;
                }, 1);
            }

            if (hashLocation) {
                var reSmooth = /^#smoothscroll-/;
                var hashLocation;

                if (reSmooth.test(location.hash)) {
                    $('.animsition').on('animsition.inStart', function() {
                        hashLocation = '#' + location.hash.replace(reSmooth, '');

                        $.smoothScroll({
                            beforeScroll: function(options) {
                                options.offset = 0 - APP.initialize.topScrollOffset();
                            },
                            easing: 'swing',
                            speed: 'auto',
                            autoCoefficient: 2,
                            scrollTarget: hashLocation
                        });

                    });
                }
            };

            $anchorMenuItem.smoothScroll({
                beforeScroll: function(options) {
                    options.offset = 0 - APP.initialize.topScrollOffset();
                },
                easing: 'swing',
                speed: 'auto',
                autoCoefficient: 1
            });
        },

        magnificPopup: function() {
            $('.entry-content a:has(img)').each(function() {
                var url = $(this).attr('href');

                if (url.match(/\.(jpeg|jpg|gif|png)$/) != null) {
                    $(this).attr('data-lightbox', 'image');
                }
            });

            var $lightboxImage = $('[data-lightbox="image"]'),
                $lightboxGalleryEl = $('[data-lightbox="gallery"]');

            if ($lightboxImage.length > 0) {
                $lightboxImage.magnificPopup({
                    type: 'image',
                    closeOnContentClick: true,
                    closeBtnInside: false,
                    tLoading: '<i class="fa fa-spinner fa-pulse"></i>',
                    fixedContentPos: true,
                    mainClass: 'mfp-fade',
                    image: {
                        verticalFit: true
                    },
                    callbacks: {
                        open: function() {
                            $html.on('touchmove', function(e) {
                                e.preventDefault();
                            });
                        },
                        afterClose: function() {
                            $html.off('touchmove');
                        }
                    }
                });
            }

            if ($lightboxGalleryEl.length > 0) {
                $lightboxGalleryEl.each(function() {
                    $(this).magnificPopup({
                        delegate: 'a[data-lightbox="gallery-item"]',
                        type: 'image',
                        closeOnContentClick: true,
                        closeBtnInside: false,
                        tLoading: '<i class="fa fa-spinner fa-pulse"></i>',
                        fixedContentPos: true,
                        mainClass: 'mfp-fade',
                        image: {
                            verticalFit: true
                        },
                        gallery: {
                            enabled: true,
                            navigateByImgClick: true,
                            preload: [0, 1]
                        }
                    });
                });
            }
        },

        parallax: function() {
            if ($parallax.length > 0) {
                if (!APP.isMobile.any()) {
                    $body.imagesLoaded({
                        background: 'section.parallax'
                    }, function() {
                        $.stellar({
                            responsive: true,
                            horizontalScrolling: false
                        });
                    });
                } else {
                    $parallax.addClass('mobile-parallax');
                }
            }
        },

        youtubeBgVideo: function() {
            if ($youtubeBgPlayer.length > 0 && !APP.isMobile.any()) {
                $youtubeBgPlayer.each(function() {
                    var $element = $(this),
                        ytbgVideo = $(this).attr('data-yt-video');
                    var bgPlayerParams = {
                        videoURL: ytbgVideo,
                        mute: true,
                        quality: 'default',
                        opacity: 1,
                        containment: 'self',
                        optimizeDisplay: true,
                        loop: true,
                        vol: 80,
                        autoPlay: true,
                        realfullscreen: true,
                        showYTLogo: false,
                        showControls: false,
                        stopMovieOnBlur: true
                    }
                    $element.mb_YTPlayer(bgPlayerParams);
                    $(window).resize(function() {
                        $element.mb_YTPlayer(bgPlayerParams);
                    });
                    $(this).append('<div class="yt-control"><i class="fa fa-pause" data-original-title="' + app_vars.pause + '"></i><i class="fa fa-volume-up" data-original-title="' + app_vars.unmute + '"></i><i class="fa fa-external-link-square" data-original-title="' + app_vars.popup + '"></i></div>');

                    $('.yt-control i').tooltip({
                        placement: 'top',
                        container: 'body'
                    });

                    $element.find('.yt-control i').click(function() {
                        var ytControlClass = $(this).attr('class');

                        switch (ytControlClass) {
                            case 'fa fa-pause':
                                $element.YTPPause();;
                                break;
                            case 'fa fa-play':
                                $element.YTPPlay();
                                break;
                            case 'fa fa-volume-off':
                                $element.YTPMute();
                                break;
                            case 'fa fa-volume-up':
                                $element.YTPUnmute();
                                break;
                            case 'fa fa-external-link-square':
                                $element.YTPPause();
                                $element.find('.yt-control').children().eq(0).toggleClass('fa-pause fa-play');

                                $(this).magnificPopup({
                                    items: {
                                        src: ytbgVideo
                                    },
                                    type: 'iframe',
                                    removalDelay: 160,
                                    mainClass: 'mfp-fade',
                                    preloader: false,
                                    fixedContentPos: false
                                }).magnificPopup('open');
                                break;
                        }
                    });

                    $element.find('.yt-control').children().eq(0).click(function() {
                        $(this).toggleClass('fa-pause fa-play');

                        if ($(this).hasClass('fa-play')) {
                            $(this).attr('data-original-title', app_vars.play);
                        } else {
                            $(this).attr('data-original-title', app_vars.pause);
                        }

                        $(this).tooltip('hide');
                    });

                    $element.find('.yt-control').children().eq(1).click(function() {
                        $(this).toggleClass('fa-volume-up fa-volume-off');

                        if ($(this).hasClass('fa-volume-up')) {
                            $(this).attr('data-original-title', app_vars.unmute);
                        } else {
                            $(this).attr('data-original-title', app_vars.mute);
                        }

                        $(this).tooltip('hide');
                    });
                });
            }
        },

        sendMail: function() {
            $contactForm.validate({
                submitHandler: function(form) {
                    $cfProcess.fadeIn();

                    $.ajax({
                        type: 'POST',
                        url: app_vars.ajax_url,
                        dataType: 'JSON',
                        data: $contactForm.serialize(),
                        success: function(data) {
                            $cfProcess.fadeOut();
                            $contactForm.find('.cf-form-control').val('');

                            if (data.error) {
                                $cfResult.find('span').html('<i class="fa fa-times-circle-o"></i>' + data.error);
                            } else {
                                $cfResult.find('span').html('<i class="fa fa-check-circle-o"></i>' + data.success);
                            }

                            $cfResult.show('slow').delay(3000).hide('slow');
                        },
                        error: function(data, errorThrown) {
                            console.log(errorThrown);
                        }
                    });

                    return false;
                }
            });

            $('#contact-form-submit').on('click', function() {
                setTimeout(function() {
                    $contactForm.find('.error').each(function() {
                        var text = $(this).text();

                        $(this).closest('fieldset').find('input, textarea').blur();

                        if (text != '') {
                            $element = $(this).closest('fieldset').find("input[type!='hidden'], textarea");

                            $element.val(text);
                            $element.addClass('error');

                            $element.focus(function() {
                                if ($(this).val() === text) {
                                    $(this).val('');
                                    $(this).removeClass('error');
                                }
                            });
                        }
                    });
                }, 500);
            });

            $('#contact-form-message').niceScroll({
                cursorcolor: $('.contact-module').css('color'),
                cursorwidth: '5px',
                cursorfixedheight: 25,
                cursorborder: 0,
                cursorborderradius: 0,
                scrollspeed: 5,
                mousescrollstep: 5,
                horizrailenabled: false,
                autohidemode: false,
                zindex: 99
            });
        },

        subscribe: function() {
            $subscribeForm.validate({
                submitHandler: function(form) {
                    $.ajax({
                        type: 'POST',
                        url: app_vars.ajax_url,
                        dataType: 'JSON',
                        data: $subscribeForm.serialize(),
                        success: function(data) {
                            if (data.error) {
                                $msResult.html('<i class="fa fa-times-circle-o"></i>' + data.error);
                                console.log(data.error);
                            } else {
                                $msResult.html('<i class="fa fa-check-circle-o"></i>' + data.success);
                            }

                            $msResult.show('slow').delay(3000).hide('slow');
                        },
                        error: function(data, errorThrown) {
                            console.log(errorThrown);
                        }
                    });

                    return false;
                }
            });

            $('#subscribe-form-submit').on('click', function() {
                setTimeout(function() {
                    $subscribeForm.find('.error').each(function() {
                        var text = $(this).text();

                        $(this).closest('form').find('input').blur();

                        if (text != '') {
                            $element = $(this).closest('form').find('input');

                            $element.val(text);
                            $element.addClass('error');

                            $element.focus(function() {
                                if ($(this).val() === text) {
                                    $(this).val('');
                                    $(this).removeClass('error');
                                }
                            });
                        }
                    });
                }, 500);
            });
        },

        googleMap: function() {
            if ($gmContainer.next().length > 0) {
                var bgColor = $gmContainer.next().css('background-color');
            } else {
                var bgColor = $('.site-footer').css('background-color');
            }

            $gmContainer.css('background-color', bgColor);
            $('#gmap .square, #gmap .rectangle').css('background-color', bgColor);

            $("a[href='#google-map']").tooltip({
                placement: 'bottom',
                container: 'body'
            });

            var title = $("a[href='#google-map']").attr('data-original-title');

            $("a[href='#google-map']").click(function(e) {
                var $element = $(this);

                if ($element.hasClass('map-active')) {
                    $gmContainer.slideUp('slow');
                } else {
                    $gmContainer.slideDown();

                    setTimeout(function() {
                        var topOffsetScroll = APP.initialize.topScrollOffset();

                        $('html, body').stop(true).animate({
                            scrollTop: $element.offset().top - topOffsetScroll - 10
                        }, 'slow', 'easeInBack');
                    }, 100);

                    setTimeout(function() {
                        if ($gmContainer.find('.gm-style').length == 0) {
                            google.maps.event.addDomListener(window, 'load', APP.widget.initializeMap());
                        }
                    }, 500);
                }

                $element.toggleClass('map-active');

                if ($element.hasClass('map-active')) {
                    $element.attr('data-original-title', app_vars.close_map.toUpperCase());
                } else {
                    $element.attr('data-original-title', title);
                }

                $element.tooltip('hide');

                e.preventDefault();
            });
        },

        initializeMap: function() {
            var addLat = $gmContainer.attr('data-gmap-lat'),
                addLng = $gmContainer.attr('data-gmap-lng');

            var addLatlng = new google.maps.LatLng(addLat, addLng);

            var mapOptions = {
                zoom: 15,
                scrollwheel: false,
                center: addLatlng,
                styles: [{
                    "featureType": "landscape",
                    "stylers": [{
                        "saturation": -100
                    }, {
                        "lightness": 65
                    }, {
                        "visibility": "on"
                    }]
                }, {
                    "featureType": "poi",
                    "stylers": [{
                        "saturation": -100
                    }, {
                        "lightness": 51
                    }, {
                        "visibility": "simplified"
                    }]
                }, {
                    "featureType": "road.highway",
                    "stylers": [{
                        "saturation": -100
                    }, {
                        "visibility": "simplified"
                    }]
                }, {
                    "featureType": "road.arterial",
                    "stylers": [{
                        "saturation": -100
                    }, {
                        "lightness": 30
                    }, {
                        "visibility": "on"
                    }]
                }, {
                    "featureType": "road.local",
                    "stylers": [{
                        "saturation": -100
                    }, {
                        "lightness": 40
                    }, {
                        "visibility": "on"
                    }]
                }, {
                    "featureType": "transit",
                    "stylers": [{
                        "saturation": -100
                    }, {
                        "visibility": "simplified"
                    }]
                }, {
                    "featureType": "administrative.province",
                    "stylers": [{
                        "visibility": "off"
                    }]
                }, {
                    "featureType": "water",
                    "elementType": "labels",
                    "stylers": [{
                        "visibility": "on"
                    }, {
                        "lightness": -25
                    }, {
                        "saturation": -100
                    }]
                }, {
                    "featureType": "water",
                    "elementType": "geometry",
                    "stylers": [{
                        "hue": "#ffff00"
                    }, {
                        "lightness": -25
                    }, {
                        "saturation": -97
                    }]
                }]
            };

            var map = new google.maps.Map($gmContainer[0], mapOptions);

            google.maps.event.addDomListener(window, 'resize', function() {
                var center = map.getCenter();

                google.maps.event.trigger(map, 'resize');
                map.setCenter(center);
            });

            var iconMarker = 'M27.648 -41.399q0 -3.816 -2.7 -6.516t-6.516 -2.7 -6.516 2.7 -2.7 6.516 2.7 6.516 6.516 2.7 6.516 -2.7 2.7 -6.516zm9.216 0q0 3.924 -1.188 6.444l-13.104 27.864q-0.576 1.188 -1.71 1.872t-2.43 0.684 -2.43 -0.684 -1.674 -1.872l-13.14 -27.864q-1.188 -2.52 -1.188 -6.444 0 -7.632 5.4 -13.032t13.032 -5.4 13.032 5.4 5.4 13.032z';

            var marker = new google.maps.Marker({
                position: addLatlng,
                map: map,
                icon: {
                    path: iconMarker,
                    scale: 1,
                    strokeOpacity: 0,
                    fillColor: app_vars.accent_color,
                    fillOpacity: 1,
                    size: new google.maps.Size(35, 55),
                    origin: new google.maps.Point(0, 0),
                    anchor: new google.maps.Point(10, 10)
                },
                clickable: false
            });
        },

        flexSlider: function() {
            var $flexSliderEl = $('.fslider:not( #master, #slave )'),
                $flexSliderMasterEl = $('#master.fslider'),
                $flexSliderSlaveEl = $('#slave.fslider');

            if ($flexSliderEl.length > 0) {
                $flexSliderEl.each(function() {
                    var flexSliderAnimation = $(this).attr('data-animation');

                    if (!flexSliderAnimation) {
                        flexSliderAnimation = 'slide';
                    }

                    $(this).flexslider({
                        selector: '.slider-wrap > .slide',
                        animation: flexSliderAnimation,
                        controlNav: true,
                        directionNav: false,
                        slideshowSpeed: 5000,
                        animationSpeed: 700,
                        smoothHeight: true,
                        useCSS: false
                    });
                });

                $flexSliderEl.find('.clone a').removeAttr('data-lightbox');
            }

            if ($flexSliderMasterEl.length > 0 && $flexSliderSlaveEl.length > 0) {
                var flexsItemWidth = $flexSliderSlaveEl.attr('data-item-width'),
                    flexsItemMargin = $flexSliderSlaveEl.attr('data-item-margin');

                $flexSliderMasterEl.flexslider({
                    selector: '.slider-wrap > .slide',
                    animation: 'fade',
                    controlNav: false,
                    directionNav: false,
                    animationLoop: false,
                    slideshow: false,
                    useCSS: false,
                    slideshowSpeed: 5000,
                    animationSpeed: 700,
                    sync: '#slave'
                });

                $flexSliderSlaveEl.flexslider({
                    selector: '.slider-wrap > .slide',
                    animation: 'slide',
                    controlNav: false,
                    directionNav: false,
                    animationLoop: false,
                    slideshow: false,
                    itemWidth: Number(flexsItemWidth),
                    itemMargin: Number(flexsItemMargin),
                    slideshowSpeed: 5000,
                    animationSpeed: 700,
                    smoothHeight: true,
                    useCSS: false,
                    asNavFor: '#master',
                    start: function(slider) {
                        var wow = new WOW({
                            boxClass: 'slide',
                            mobile: false
                        });

                        wow.init();
                    }
                });
            }
        }
    }

    APP.documentOnReady = {
        init: function() {
            APP.initialize.init();
            APP.widget.init();
            APP.header.init();
            APP.portfolio.init();
            APP.blog.init();
            APP.process.init();
            APP.team.init();
            APP.skillBar.init();
            APP.testimonial.init();
            APP.client.init();
            APP.funFact.init();
            APP.pricingTable.init();
            APP.twitter.init();
            APP.serviceBox.init();
            APP.footer.init();
            APP.product.init();
            APP.documentOnReady.windowscroll();

            if ($slider.length > 0) {
                APP.slider.init();
            }
        },

        windowscroll: function() {
            window.addEventListener('scroll', onScrollSliderParallax, false);
        }
    }

    APP.documentOnLoad = {
        init: function() {
            APP.process.label();
            APP.widget.parallax();
            APP.widget.googleMap();
            APP.widget.flexSlider();
            $('.preloader_main_wrapper').fadeOut();
        }
    }

    APP.documentOnScroll = {
        init: function() {
            APP.initialize.goToTopScroll();
            APP.header.activateCurrentMenu();
            APP.header.headerMenu();
            APP.slider.sliderFade();
        }
    }

    APP.documentOnResize = {
        init: function() {
            setTimeout(function() {
                APP.header.headerMenu();
                APP.header.menuInvert();
                APP.portfolio.load();
                APP.blog.containerHeight();
                APP.process.label();
                APP.team.profileContainer();
                APP.serviceBox.containerHeight();

                if ($body.hasClass('device-md') || $body.hasClass('device-lg')) {
                    $portfolioContainer.css('height', $('.portfolio-single-image').height() + 'px');
                    $('#portfolio-single-content').css('height', $('.portfolio-single-image').height() + 'px');

                    $('.triangle').css({
                        'border-left': $section.width() / 3 + 'px solid transparent',
                        'border-right': $section.width() / 3 + 'px solid transparent'
                    });
                } else {
                    $portfolioContainer.css('height', '');
                    $('#portfolio-single-content').css('height', '');

                    $('.triangle').css({
                        'border-left': $section.width() / 2 + 'px solid transparent',
                        'border-right': $section.width() / 2 + 'px solid transparent'
                    });
                }

                if (!APP.isMobile.any()) {
                    APP.initialize.fullScreen();
                }
            }, 500);
        }
    }

    $(document).ready(APP.documentOnReady.init);
    $window.load(APP.documentOnLoad.init);
    $window.on('scroll', APP.documentOnScroll.init);
    $window.on('resize', APP.documentOnResize.init);
})(jQuery);
