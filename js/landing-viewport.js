(function ($) {
    Drupal.behaviors.gsb_theme = {
        attach: function (context, settings) {

            /* viewport sizing */
            // tagging video player div
            var vid = $('#kaltura-player1');
            // setting default video resolution
            var vid_w_orig = 2800;
            var vid_h_orig = 1600;

            // jQuery.browser.mobile will be true if the browser is a mobile device
            (function(a){(jQuery.browser=jQuery.browser||{}).mobile=/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4))})(navigator.userAgent||navigator.vendor||window.opera);

            // additional check for tablets, isMobile.any() will return null if it's a desktop/laptop
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

            // custom check for ipad/iphone using chrome browser
            var chrome = navigator.userAgent.match('CriOS');

            function setVideoScale(choice, width, height) {
                // get the parent element size
                var container_w = choice.parent().width();
                var container_h = choice.parent().height();
                // use largest scale factor of horizontal/vertical
                var scale_w = container_w / width;
                var scale_h = container_h / height;
                var scale = scale_w > scale_h ? scale_w : scale_h;
                // scale the component
                choice.width(scale * width + 25);
                choice.height(scale * height);
            };

            function setWidthHeight(type, vpWidth, vpHeight, windowWidth) {
                if (type === 'video') {
                    $('.pane-landingpage-video, #landing-video').css({'width': vpWidth +'vw', 'height': vpHeight + 'vh'});
                    setVideoScale(vid, vid_w_orig, vid_h_orig);
                    if (isMobile.any() != null) {
                        if ((windowWidth >= 768) && (windowWidth < 1337)){
                            $('#kaltura-player1').css({'transform': 'scale(1, 1) translateX(-10%) translateY(-2%)'});
                            $('.pane-landingpage-video, #landing-video').css({'margin-bottom': '-101px'});
                            if (chrome != null) {
                                $('.pane-landingpage-video, #landing-video').css({'margin-bottom': '-139px'});
                            }
                        }
                    }
                }
                else if (type === 'image') {
                    $('.field-name-field-homepage-image-desktop, .field-name-field-homepage-image-tablet, .field-name-field-homepage-image-mobile').css({'width': vpWidth +'vw', 'height': vpHeight + 'vh'});
                    if (jQuery.browser.mobile === true) {
                        switch (true) {
                            case ((windowWidth >= 320) && (windowWidth < 375)): //i5 portrait
                                $('.field-name-field-homepage-image-mobile').css({'margin-bottom': '-105px'});
                                break;
                            case ((windowWidth >= 375) && (windowWidth < 414)): //i6 portrait
                                $('.field-name-field-homepage-image-mobile').css({'margin-bottom': '-115px'});
                                break;
                            case ((windowWidth >= 414) && (windowWidth < 540)): //i6+ portrait
                                $('.field-name-field-homepage-image-mobile').css({'margin-bottom': '-124px'});
                                break;
                            case ((windowWidth >= 540) && (windowWidth < 601)): //i5 landscape
                                $('.field-name-field-homepage-image-tablet').css({'margin-bottom': '-105px'});
                                break;
                            case ((windowWidth >= 663) && (windowWidth < 736)): //i6/i7/i8 landscape
                                $('.field-name-field-homepage-image-tablet').css({'margin-bottom': '-35px'});
                                if (chrome != null) {
                                    $('.field-name-field-homepage-image-tablet').css({'margin-bottom': '-10px'});
                                }
                                break;
                            case (windowWidth === 736): //i6+ landscape
                                $('.field-name-field-homepage-image-tablet').css({'margin-bottom': '-85px'});
                                if (chrome != null) {
                                    $('.field-name-field-homepage-image-tablet').css({'margin-bottom': '-65px'});
                                }
                                break;
                        }
                    }
                }
            };

            /* landing viewport tagline */
            $('#landing-video').append("<p class='landing-video-tagline'>Change Lives. <br class='tagline-break'/>Change Organizations. <br class='tagline-break'/>Change the world.</p>");

            function inspectViewPort() {
                windowWidth = $(window).innerWidth();
                if ((windowWidth >= 768)) {
                    //toggle 'video' to 'image' below for seeing image instead of video
                    setWidthHeight('video', 100, 100, windowWidth);
                }
                else {
                    setWidthHeight('image', 100, 100, windowWidth);
                }
            };

            /* jQuery function literal for smart resizing */
            (function($,sr){
                // http://unscriptable.com/2009/03/20/debouncing-javascript-methods/
                // detection period 'threshold', and a boolean indicating whether the signal should happen at the beginning of the detection period (true) or at the end 'execAsap'
                var debounce = function (func, threshold, execAsap) {
                    // handle to setTimeout async task (detection period)
                    var timeout;
                    // return the new debounced function which executes the original function only once until the detection period expires
                    return function debounced () {
                        var obj = this; // reference to original context object
                        var args = arguments; // arguments object at execution time
                        // detection is executed if/when the threshold expires
                        function delayed () {
                            // if we're executing at the end of the detection period
                            if (!execAsap)
                                func.apply(obj, args); // execute now
                            timeout = null; // clear timeout handle
                        };
                        // stop any current detection period
                        if (timeout)
                            clearTimeout(timeout);
                        // if we're not waiting, and we're executing at the beginning of the detection period
                        else if (execAsap)
                            func.apply(obj, args); // execute now
                        // reset the detection period
                        timeout = setTimeout(delayed, threshold || 100);
                    };
                };
                // extending jQuery for smartresize (sr is argument initially passed in from function literal) operation
                jQuery.prototype[sr] = function(fn){  return fn ? this.bind('resize', debounce(fn)) : this.trigger(sr); };
            })(jQuery,'smartresize');

            // declares initial sizes for viewports on first page load
            inspectViewPort();
            // will now recognize orientation change with throttling and debouncing checks
            $(window).smartresize(function(){
                inspectViewPort();
            });

            /* scroll down button */
            $('.scrollLink').on('click', function() {
                windowHeight = $(window).innerHeight();
                windowWidth = $(window).innerWidth();
                if ((windowWidth >= 600) && (windowWidth < 1280) && (windowHeight >= 600)) {
                    // video splash scroll - tablet
                    $('html, body').animate({
                        scrollTop: ( $('.pane-bundle-mission-statement').offset().top+70)
                    }, 800);
                }
                else if ((windowWidth >= 1280) && (windowHeight >= 600)) {
                    // video splash scroll - desktop
                    $('html, body').animate({
                        scrollTop: ( $('.pane-bundle-mission-statement').offset().top+100)
                    }, 800);
                }
                else {
                    // Image splash scroll
                    $('html, body').animate({
                        scrollTop: ( $('.pane-bundle-mission-statement').offset().top+45)
                    }, 800);
                }
            });

            /* Viewport text */
            $('div.viewport-text').wrapAll('<div class="viewport-text-wrapper"></div>');
        }
    }
})(jQuery);
