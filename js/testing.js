(function($) {

    $(document).ready(function () {

        var isMobile = {
            KindleSilk: function() {
                return navigator.userAgent.match(/Silk/i);
            },
            Kindle: function() {
                return navigator.userAgent.match(/Kindle/i);
            },
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
                return (isMobile.KindleSilk() || isMobile.Kindle() || isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
            }
        };

        $('#landing-video').append('<div class="iframe-wrapper"></div>');

        if (isMobile.any() === null) {
            // future reference to chrome fix => https://github.com/inuyaksa/jquery.nicescroll/issues/799
            $("body").niceScroll({
                cursorborder: "none", // css definition for cursor border
                cursorwidth: "6px", // cursor width in pixel
                cursorborderradius: "18px", // border radius in pixel for cursor
                cursoropacitymax: .6, // change opacity when cursor is active range from 1 to 0
                zindex: 100, // change z-index for scrollbar div
                scrollspeed: 70, // scrolling speed
                mousescrollstep: 70, // scrolling speed with mouse wheel (pixel)
                hwacceleration: true, // use hardware accelerated scroll when supported
                preservenativescrolling: true, // you can scroll native scrollable areas with mouse, bubbling mouse wheel event
                enablekeyboard: true, // nicescroll can manage keyboard events
                smoothscroll: true, // scroll with ease movement
                enablemousewheel: true, // nicescroll can manage mouse wheel events
                enablekeyboard: true, // nicescroll can manage keyboard events
                smoothscroll: true // scroll with ease movement
            });
        }

    });
}) (jQuery);