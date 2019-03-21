(function ($) {

  /**
   * Functionality for Spotlight block show more/less link
   */
  Drupal.behaviors.spotlight_seemore = {
    attach: function () {
      $(window).bind('load ready resize', function () {
        // Check if spotlight exists.
        var $spotlight = $('.pane-bundle-spotlight, .pane-bundle-house-ads');
        if ($spotlight.length) {
          // If the line height of the body text changes, adjust this.
          var visibleHeight = 19 * 4;
          $spotlight.find('.pane-content > div > div').once('showmore-link').append('<div class="show-more"><span>Show More</span></div>');
          // Add behavior for every .show-more link.
          $spotlight.find('.show-more').once('showmore', function () {
            var $this = $(this),
              $spotlightContent = $this.siblings('.field-name-field-body'),
              contentHeight = $spotlightContent.find('p').height();
            // Remove .show-more if the body is less than the defined max height.
            $spotlightContent.css('height', visibleHeight);
            if (contentHeight <= visibleHeight) {
              $this.remove();
            }
            else {
              $this.click(function () {
                var $this = $(this), text, height;
                // Expand description to its real height.
                if (!$this.hasClass('active')) {
                  text = Drupal.t('Show Less');
                  height = contentHeight;
                }
                // Collapse description to defined max height.
                else {
                  text = Drupal.t('Show More');
                  height = visibleHeight;
                }
                //$spotlightContent.removeAttr('style')
                $spotlightContent.animate({'height': height}, 300);
                $this
                  .toggleClass('active')
                  .html('<span>' + text + '</span>');
              });
            }
          });
        }
      });
    }
  };

  /**
   * Add accordion functionality for both
   * fieldable panel pane and WYSIWYG.
   */
  Drupal.behaviors.accordion = {
    attach: function () {
      // Define accordion title.
      var acctitle = $('.acc-title');
      if (acctitle.length > 0) {
        acctitle.once(function () {
          var $this = $(this);
          // Find body container next to accordion title.
          var next = $this.next('.acc-body');
          // If there is more than 1 body an element after title
          // wrap them all into accordion-body-wrap class
          // by calling touchNeighbour recursive function.
          var found_body = false;
          var acc_body_elements;
          if (next.length > 0) {
            next.wrapAll('<div class="accordion-body-wrap" />');
            touchNeighbour(next, 'acc-body');
            found_body = true;
          }
          else {
            // make one last attempt to find acc-body elements
            // lists may have an acc-body elements as li items
            next = $this.next();
            if (next.prop('tagName') == 'UL') {
              var ul_element = next;
              acc_body_elements = next.children('.acc-body');
              if (acc_body_elements.length > 0) {
                ul_element.wrapAll('<div class="accordion-body-wrap" />');
                touchNeighbour(ul_element, 'acc-body');
                found_body = true;
              }
            }
            else if (next.prop('tagName') == 'TABLE') {
              var table_element = next;
              acc_body_elements = next.find('.acc-body');
              if (acc_body_elements.length > 0) {
                table_element.wrapAll('<div class="accordion-body-wrap" />');
                touchNeighbour(table_element, 'acc-body');
                found_body = true;
              }
            }
          }
          if (found_body === false) {
            // If the title has body after it - remove styling.
            $this.removeClass('acc-title');
          }

          // Add functionality on each accordion header.
          // Add +/- icon on header.
          $this.click(function () {
            var $this = $(this);
            if ($this.parents('.entity').length > 0) {
              // If it's a fpp toggle body field.
              $this.toggleClass('opened').parents('.entity').find('.accordion-body-wrap').slideToggle(250);
            }
            else {
              // If it's inside WYSIWYG toggle body wrapper.
              $this.toggleClass('opened').next('.accordion-body-wrap').slideToggle(250);
            }
          });
        });
      }

      /**
       * A recursive function that checks elements next touchNeighbourr,
       * and if it has className or ClassName2 from arguments,
       * insert the it after checked element and repeat function.
       */
      function touchNeighbour(e, className, className2) {
        var next = e.parent().next();
        if (next.hasClass(className) || next.hasClass(className2)) {
          next.insertAfter(e);
          touchNeighbour(next, className, className2);
        }
        else {
          return false;
        }
      }
    }
  };

  /**
   * Move quicklinks to top of page in mobile landscape context.
   * Move search to top of page in mobile landscape context.
   */
  Drupal.behaviors.mainmenu_mobile = {
    attach: function () {
      if (Modernizr.mq('(max-width: 568px)')) {
        $('#quicklinks').insertBefore($('#top-content'));
        $('#block-gsb-public-custom-blocks-gpcb-enews-signup').insertBefore($('#block-menu-menu-footer-1'));
        $('.gsb-landing-events .inner-sidebar-wrapper').insertBefore($('#main'));
        $('.page-events .inner-sidebar-wrapper .pane-bundle-links').insertAfter($('.page-events .inner-sidebar-wrapper .pane-views-exp-gsb-event-panel-pane-2 .pane-content'));
      }
      if (Modernizr.mq('(max-width: 655px)')) {
        $('.node-program.view-mode-full .ds-learn .field-name-field-video').insertAfter($('.node-program.view-mode-full .ds-learn .group-wrapper-learn'));
        $('.node-program.view-mode-full .ds-learn .field-name-field-learn-more-photo').insertAfter($('.node-program.view-mode-full .ds-learn .group-wrapper-learn'));
        $(".field-name-social-buttons-bottom").insertBefore($('.group-wrapper-tablet-4'));
        $(".short-url-wrapper").insertBefore($('.group-wrapper-tablet-4'));
        //$(".social-media-wrapper").insertBefore($(".group-wrapper-tablet-4") );
      }
      if (Modernizr.mq('(max-width: 999px)')) {
        $('.banner-title').insertAfter($('#sidebar .sidebar'));
        $('.ds-main-wrapper .ds-right').insertBefore($('.ds-main-wrapper .ds-left'));
      }
      if (Modernizr.mq('(max-width: 1169px)')) {
        $('#coveo-search-block-form').insertBefore($('#nav-touch-wrapper'));
      }
      if (Modernizr.mq('(max-width: 1024px)')) {
        $('#block-block-41').insertAfter($('#footer-logo') );
        $('#block-menu-menu-footer-4').insertAfter($('#block-block-41'));
        $('#block-menu-menu-footer-5').insertAfter($('#block-block-41'));
      }
      if (Modernizr.mq('(max-width: 850px)')) {
        $('.front #quicklinks').insertBefore($('.front-slider-pane'));
      }

    }
  };

  /**
   * Input type number alternative for spinner
   */
  Drupal.behaviors.spinner = {
    attach: function () {
      // detect IE 10
      if (Function('/*@cc_on return document.documentMode===10@*/')()) {
        var isIE10 = true;
      }
      // detect IE 9
      if (Function('/*@cc_on return document.documentMode===9@*/')()) {
        var isIE9 = true;
      }
      if (!Modernizr.inputtypes.number || isIE10 || isIE9) {
        var $form_number = $('.form-number');
        $form_number.wrap('<span class="fake-input-wrapper" />')
          .after('<div class="arrows-wrapper"><button class="up" data-dir ="up" /><button class="down" data-dir ="down" /></div>');

        $('.fake-input-wrapper').each(function () {
          var numberInput = $(this).find('.form-number').attr('autocomplete', 'off'),
            min = parseInt(numberInput.attr('min')),
            max = parseInt(numberInput.attr('max')),
            step = parseInt(numberInput.attr('step'));

          $(this).find('button').click(function (e) {
            e.preventDefault();
            $(this).parent().prev().trigger('focus');
            var direction = $(this).data('dir'),
              val = parseInt(numberInput.val());
            if (!val) {
              numberInput.val(min);
            }
            else if (val > max) {
              numberInput.val(max);
            }
            else {
              var mod = (val - min) % step;
              // increase or decrease depending on the button
              if (mod === 0) {
                ( direction === 'up' ) ? val += step : val -= step;
              }
              else {
                ( direction === 'up' ) ? val += step - mod : val -= mod;
              }
              if (val >= min && val < max) {
                numberInput.val(val);
              }
            }
          });
        });
        $form_number.keydown(function (e) {
          if (e.which === 38) {
            $(this).next().find('.up').trigger('click');
          }
          if (e.which === 40) {
            $(this).next().find('.down').trigger('click');
          }
        });
      }
    }
  };

  /**
   * Changes the anchor element for the Views back to top link.
   */
  Drupal.behaviors.goTopLink = {
    attach: function () {
      if ($('#header-wrapper').length) {
        $('.go-to-top-link').find('a').attr('href', '#header-wrapper');
      }
    }
  };

  /**
   * Custom Styling for selectbox.
   */
  Drupal.behaviors.customSelect = {
    attach: function () {
      $('select').not('.hasCustomSelect, .searchworks-select, #edit-state, #modalContent select, [multiple="multiple"], #emma_member_country').customSelect();
    }
  };

  /**
   * Custom hover for home page image cta.
   */
  Drupal.behaviors.homepageImageCta = {
    attach: function () {
      $('.pane-bundle-homepage-cta a').hover(function () {
        $(this).closest('.group-wrapper-content').toggleClass('hover');
      });
    }
  };

  /**
   * Move Infographic button out of figure for image resource
   */
  Drupal.behaviors.image_resource_infographic_button = {
    attach: function () {
      $('.image-enlarge-bar').each(function () {
        // Get the figure tag.
        $figure = $(this).parent();

        // Remove the button.
        $button = $(this).detach();

        // Put it back on after the figure tag.
        $figure.after($button);
      });
    }
  };

  /**
   * Add mmenu library for offcanvas filters
   */
  Drupal.behaviors.mmenu = {
    attach: function () {
      if (Modernizr.mq('(max-width: 568px)')) {
        //debugger;
        $('#views-exposed-form-gsb-all-research-listing-all-research-panel-pane .fieldset-wrapper').wrapInner('<div class="bef-secondary-options"></div>');
        //var $wrapper = $('.fieldset-wrapper').not('#views-exposed-form-gsb-all-research-listing-all-research-panel-pane .fieldset-wrapper');
        var $wrapper = $('#edit-secondary .fieldset-wrapper');
        $('#edit-field-event-date-value2-value-wrapper').hide();
        $('#edit-field-event-date-value-value-wrapper').hide();
        $wrapper.mmenu({
          // Options
          navbar: {
            add: true,
            title: 'Narrow your results',
            titleLink: parent
          },

          offCanvas: {
            position: 'right',
          }
        });

        $('.fieldset-title').click(function () {
          $wrapper.data('mmenu').open();
        });
        $('.mm-navbar .mm-title').click(function () {
          $wrapper.data('mmenu').close();
        });

        //var pTop = '';
        //var pLeft = '';

        //$("#edit-date-search-value-datepicker-popup-0").click(function(){
        //  pTop = ($(this).offset().top +20)  + 'px';
        //  pLeft = ($(this).offset().left + 250) + 'px';
        //  $('#ui-datepicker-div').css({'left':pLeft, 'top':pTop});
        //});
        //$("#edit-field-event-date-value-value-datepicker-popup-0").click(function(){
        //  pTop = ($(this).offset().top +20)  + 'px';
        //  pLeft = ($(this).offset().left + 250) + 'px';
        //  $('#ui-datepicker-div').css({'left':pLeft, 'top':pTop});
        //});
        $('.mm-panels #edit-done').click(function () {
          $('.results-wrapper').remove();
          var $checked = "";
          url_path = "";
          $checked = $('input:checkbox').filter(':checked');
          var final_url = "";
          var search_term = "";
          url_all = $(location).attr('href');
          var base_url = "";
          if (url_all.indexOf('?') != -1) {
            url_parts = url_all.split('?');
            base_url = url_parts[0];
          } else {
            base_url = url_all;
          }
          $checked.each(function () {
            final_url += $(this).attr("name") + '=' + $(this).attr("value") + '&';
          });

          $(' input[type="text"]:not(".link-box")').each(function() {
            if ($(this).val()) {
              final_url += $(this).attr('name') + "=" + $(this).val() + '&';
            }
          });
          final_url = base_url + "?" + final_url;
          $(location).attr('href', (final_url));
        });

        $('.views-submit-button input').click( function() {
          $('#edit-done').click();
        });

        $('.mm-navbar .mm-title').click(function () {
          $wrapper.data('mmenu').close();
        });

      }
    }
  };

  /**
   * Create the responsive side tray for Program Finder
   */
  Drupal.behaviors.program_finder = {
    attach: function () {

      // Check if this is the Program Finder page
      var $isotopifyFilters = $("#isotopify .isotopify-filters");
      if (!$isotopifyFilters.length) {
        return;
      }

      if (Modernizr.mq('(max-width: 920px)')) {

        // Get the uniqueID used by Isotopify
        var uniqueID = '';
        $('.isotopify').each(function(index) {
          uniqueID = $(this).attr('id');
        });

        // Wrap up the edit filters to be put into the side tray
        $("#edit-filters").wrap("<div id='wrapper'></div>");
        $("#wrapper").wrap("<div id='outer'></div>");
        $("#outer").prepend("<a id='filters' href='#'>Filters</a>");

        $('#edit-filter-program-topic').multicheckbox();
        $('#edit-filter-program-location').multicheckbox();
        $('#edit-filter-career-level').multicheckbox();
        $('#edit-filter-leadership-level').multicheckbox();

        selects = ['program-topic', 'program-location', 'career-level', 'leadership-level'];
        for (var select_id in selects) {
          var choices = $('.form-item-filter-' + selects[select_id]).find('option:selected').map(function() {
            return this.value;
          }).get().join(",").split(',');
          if (choices.length == 1 && choices[0] == '') {
            choices = null;
          }
          var filterID = selects[select_id];
          Drupal.isotopify.setFilter.checkboxes(uniqueID, filterID, choices);
        }

        // Set filters for the Date range
        var fromDate = $('#edit-date-range-from').val();
        var toDate = $('#edit-date-range-to').val();

        Drupal.isotopify.setFilter.daterange(uniqueID, fromDate.replace(/-/g, ''), toDate.replace(/-/g, ''));
        // Update using the set filters
        Drupal.isotopify.update(uniqueID);


        // Create the 'Done' button in the side tray
        var $doneButton = $('<button class="checkbox-apply">' + Drupal.t('Done') + '</button>').click(function (e) {
          e.preventDefault();
          // Set filters for the Topic, Location and Career-level selects
          selects = ['program-topic', 'program-location', 'career-level', 'leadership-level'];
          for (var select_id in selects) {
            var choices = $('.form-item-filter-' + selects[select_id] + ' input:checked').map(function() {
              return this.value;
            }).get().join(",").split(',');

            if (choices.length == 1 && choices[0] == '') {
              choices = null;
            }
            var filterID = selects[select_id];
            Drupal.isotopify.setFilter.checkboxes(uniqueID, filterID, choices);
          }
          // Set filters for the Date range
         fromDate = $('#edit-date-range-from').val();
         toDate = $('#edit-date-range-to').val();

          Drupal.isotopify.setFilter.daterange(uniqueID, fromDate.replace(/-/g, ''), toDate.replace(/-/g, ''));
          // Update using the set filters
          Drupal.isotopify.update(uniqueID);
          // Close the side tray
          wrapper.data('mmenu').close();
        });
        // Add the 'Done' button to the bottom of the side tray
        $("#edit-filters").append($doneButton);
        $doneButton.attr('disabled', 'disabled');

        var $clearAllButton = $('<button class="checkbox-clear-all">Clear All</button>').click(function(e) {
          e.preventDefault();
          $("#edit-filters :checkbox").each(function (){
            $(this).attr('checked', false);
          });
          $doneButton.attr('disabled', 'disabled');
          // Update using the set filters
          var filters = ['program-topic', 'program-location', 'career-level', 'leadership-level'];
          for (var select_id in selects) {
            Drupal.isotopify.setFilter.checkboxes(uniqueID, selects[select_id], []);
          }
          Drupal.isotopify.update(uniqueID);
        });
        // Add the 'Done' button to the bottom of the side tray
        $("#edit-filters").append($clearAllButton);


        $('#edit-date-range-from').get(0).type = 'date';
        $('#edit-date-range-to').get(0).type = 'date';

        $("#edit-filters :checkbox").click(function () {
          var anyChecked = false;
          $("#edit-filters :checkbox").each(function (){
            if ($(this).attr('checked') == 'checked') {
              anyChecked = true;
            }
          });
          if (anyChecked) {
            $doneButton.removeAttr('disabled');
          }
          else {
            $doneButton.attr('disabled', 'disabled');
          }
        });

        // Move the Search outside of the side tray
        var search = $(".form-item-search").detach();
        $("#outer").after(search);

        // Create the side tray
        var wrapper = $('#wrapper');
        wrapper.mmenu({
          // Options
          navbar: {
            add: true,
            title: 'Filters',
            titleLink: parent
          },
          offCanvas: {
            position: 'right',
          }
        });

        // Have the Filters link open the side tray
        $('#filters').click(function () {
          $("label[for='edit-date-range-from']").text("Date From");
          $("label[for='edit-date-range-to']").text("Date To");
          var anyChecked = false;
          $("#edit-filters :checkbox").each(function (){
            if ($(this).attr('checked') == 'checked') {
              anyChecked = true;
            }
          });
          if (anyChecked) {
            $doneButton.removeAttr('disabled');
          }
          else {
            $doneButton.attr('disabled', 'disabled');
          }

          var startDate ='';
          var endDate ='';
          if (fromDate.indexOf("-") > -1) {
            startDate = fromDate;
          } else {
            startDate = fromDate.substring(0, 4) + '-' + fromDate.substring(4, 6) + '-' + fromDate.substring(6, 8);
          }
          if (toDate.indexOf("-") > -1) {
            endDate = toDate;
          } else {
            endDate = toDate.substring(0, 4) + '-' + toDate.substring(4, 6) + '-' + toDate.substring(6, 8);
          }
          $('#edit-date-range-from').val(startDate);
          $('#edit-date-range-to').val(endDate);
          wrapper.data('mmenu').open();
        });

        $('.isotopify-filter-daterange input').change(function () {
            $doneButton.removeAttr('disabled');
        });

        // Set up the Close for the side tray
        $('.mm-navbar .mm-title').click(function () {
          wrapper.data('mmenu').close();
        });

      }

    }
  };

  /**
   * Move Exec Ed program finder search submit button.
   */
  Drupal.behaviors.ee_finder_search = {
    attach: function () {
      $('#isotopify-filters #edit-submit').insertAfter($('#isotopify-filters #edit-search--2'));
    }
  };

  /**
   * CSS style change for program application deadlines.
  */
  Drupal.behaviors.eeProgramsUpcomingDeadlines = {
    attach: function () {
      $(".pane-ee-programs-upcoming-deadlines").each(function(i, obj) {
        if($(this).find('div.list-cta').length != 0)
        {
          $(this).css({"padding-bottom": "0px"});
          $(this).find(".view-display-id-upcoming_deadlines").css({"border-bottom": "none","margin-bottom":"0px"});
        }
      });
    }
  };

    /* viewport sizing */
    $(function() {

        // tagging video player div
        var vid = $('#kaltura-player1');
        // tagging image div
        var img = $('.panels-layout-gsb-homepage .pane-landingpage-video img, .panels-layout-gsb-homepage .pane-bundle-landing-viewport img');
        // setting default video resolution
        var vid_w_orig = 2800;
        var vid_h_orig = 1600;
        // setting default mobile img resolution
        var mob_w_orig = 1200;
        var mob_h_orig = 1600;
        // setting default tablet img resolution
        var tab_w_orig = 2398;
        var tab_h_orig = 1440;

        // jQuery.browser.mobile will be true if the browser is a mobile device
        (function(a){(jQuery.browser=jQuery.browser||{}).mobile=/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4))})(navigator.userAgent||navigator.vendor||window.opera);

        function setVideoScale(choice, width, height) {
              // get the parent element size
              var container_w = choice.parent().width();
              var container_h = choice.parent().height();
              // use largest scale factor of horizontal/vertical
              var scale_w = container_w / width;
              var scale_h = container_h / height;
              var scale = scale_w > scale_h ? scale_w : scale_h;
              // scale the component
              vid.width(scale * width);
              vid.height(scale * height);
        };

        function setWidthHeight(type, vpWidth, vpHeight, windowWidth) {
            if (type === 'video') {
                $('.pane-landingpage-video, #landing-video').css({'width': vpWidth +'vw', 'height': vpHeight + 'vh'});
                $('#kaltura-player1').css({'bottom': '15%'});
                setVideoScale(vid, vid_w_orig, vid_h_orig);
            }
            else if (type === 'image') {
                $('.field-name-field-homepage-image-desktop, .field-name-field-homepage-image-tablet, .field-name-field-homepage-image-mobile').css({'width': vpWidth +'vw', 'height': vpHeight + 'vh'});

                if ((windowWidth >= 320) && (windowWidth < 375)) {//i5 portrait
                    if (jQuery.browser.mobile === true) {
                        $('.field-name-field-homepage-image-mobile').css({'margin-bottom': '-105px'});
                    }
                    else {
                        $('.field-name-field-homepage-image-mobile').css({'margin-bottom': '-50px'});
                    }
                }
                else if ((windowWidth >= 375) && (windowWidth < 414)) {//i6 portrait
                    if (jQuery.browser.mobile === true) {
                        $('.field-name-field-homepage-image-mobile').css({'margin-bottom': '-115px'});
                    }
                    else {
                        $('.field-name-field-homepage-image-mobile').css({'margin-bottom': '-50px'});
                    }
                }
                else if ((windowWidth >= 414) && (windowWidth < 568)) {//i6+ portrait
                    if (jQuery.browser.mobile === true) {
                        $('.field-name-field-homepage-image-mobile').css({'margin-bottom': '-124px'});
                    }
                    else {
                        $('.field-name-field-homepage-image-mobile').css({'margin-bottom': '-50px'});
                    }
                }
                else if ((windowWidth >= 568) && (windowWidth < 600)) {//i5 landscape
                    if (jQuery.browser.mobile === true) {
                        $('.field-name-field-homepage-image-mobile').css({'margin-bottom': '-105px'});
                    }
                    else {
                        $('.field-name-field-homepage-image-mobile').css({'margin-bottom': '-50px'});
                    }
                }
                else if ((windowWidth >= 600) && (windowWidth < 667)) {
                    $('.field-name-field-homepage-image-tablet').css({'margin-bottom': '-64px'});
                    setVideoScale(img, tab_w_orig, tab_h_orig);
                }
                else if ((windowWidth >= 667) && (windowWidth < 736)) {//i6 landscape
                    if (jQuery.browser.mobile === true) {
                        $('.field-name-field-homepage-image-tablet').css({'margin-bottom': '-110px'});
                    }
                    else {
                        $('.field-name-field-homepage-image-tablet').css({'margin-bottom': '-35px'});
                    }
                }
                else if ((windowWidth >= 736) && (windowWidth < 737)) {//i6+ landscape
                    if (jQuery.browser.mobile === true) {
                        $('.field-name-field-homepage-image-tablet').css({'margin-bottom': '-118px'});
                    }
                    else {
                        $('.field-name-field-homepage-image-tablet').css({'margin-bottom': '-35px'});
                    }
                }
                else if ((windowWidth >= 737) && (windowWidth < 768)) {//i6+ landscape
                    if (jQuery.browser.mobile === true) {
                        $('.field-name-field-homepage-image-tablet').css({'margin-bottom': '-118px'});
                    }
                    else {
                        $('.field-name-field-homepage-image-tablet').css({'margin-bottom': '-64px'});
                    }
                }
                else if ((windowWidth >= 768) && (windowWidth < 1025)){
                    $('.field-name-field-homepage-image-tablet').css({'margin-bottom': '5px'});
                    setVideoScale(img, tab_w_orig, tab_h_orig);
                }
                else if ((windowWidth >= 1025) && (windowWidth < 1200)){
                    $('.field-name-field-homepage-image-tablet').css({'margin-bottom': '-65px'});
                    setVideoScale(img, tab_w_orig, tab_h_orig);
                }
                else if ((windowWidth >= 1200) && (windowWidth < 1365)){
                    $('.field-name-field-homepage-image-desktop').css({'margin-bottom': '-20px'});
                    setVideoScale(img, tab_w_orig, tab_h_orig);
                }
                else if ((windowWidth >= 1365)){
                    $('.field-name-field-homepage-image-desktop').css({'margin-bottom': '-19px'});
                    setVideoScale(img, tab_w_orig, tab_h_orig);
                }
            }
        };

        // encapsulates video div so not to overlap image div with blank screen when not in use
        var vid_container = $('div.landing-video').wrapAll('<div class="video-scale"></div>');

        function inspectViewPort() {
            windowHeight = $(window).innerHeight();
            windowWidth = $(window).innerWidth();
            if ((windowWidth >= 600) && (windowHeight >= 600)) {
                $(this).append(vid_container);
                //toggle below for seeing image instead of video
                setWidthHeight('video', 100, 100, windowWidth);
            }
            else {
                vid_container.detach();
                setWidthHeight('image', 100, 100, windowWidth);
            }
        };

        // jQuery function literal for smart resizing
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

        /* updated scroll functionality for the 2019 site refresh */
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
    });
    /* Viewport text */
    $(function() {
      $('div.viewport-text').wrapAll('<div class="viewport-text-wrapper"></div>');
    });
    /* Scroll up/down navigation becomes sticky */
    $(function() {
        var scrollPos = 0;
        $(window).scroll(function () {
            var curScrollPos = $(this).scrollTop();
            if (curScrollPos > scrollPos) {
                //Scrolling down - remove the fixed position menu
              $('#header-wrapper.awemenu-sticky').removeClass('awemenu-sticky');
            } else {
                //Scrolling up - add the fixed position menu
                $('#header-wrapper').addClass('awemenu-sticky');
            }
            scrollPos = curScrollPos;
        });
    });
    /* Voices detail page customization */
    $(function() {
        // Adding some wrappers for ease in styling.
        $(".node-type-voices .breadcrumb").prependTo(".node-type-voices .group-left");
        $(".node-type-voices .group-voices-group .fieldset-wrapper").prepend("<span class='label'>Voices of Stanford GSB</span>");
        $(".node-type-voices .group-left, .node-type-voices .group-right").wrapAll('<div class="content-wrapper"></div>');
        $(".node-type-voices .group-right h1").contents().unwrap().wrap('<div/>');
        $(".node-type-voices .group-left .field-name-social-buttons-bottom, .node-type-voices .group-left .short-url-wrapper.field-name-field-link-single").wrapAll('<div class="social-media-wrapper"></div>');
        var htmlColorString = $(".node-type-voices .group-voices-group .field-name-field-background-color").text();
        $(".node-type-voices .group-header fieldset.group-voices-group ").addClass(htmlColorString).wrapAll('<div class="voices-header-group-wrapper"></div>');
        var tabletName = $("fieldset.group-voices-group").find("h1").text();
        $("<div class='tabletname'>" + tabletName + "</div>").appendTo(".group-wrapper-tablet-1");
        $("fieldset.group-voices-group .field-name-field-degree-year").clone().appendTo(".group-wrapper-tablet-1");
        $("fieldset.group-voices-group .field-name-field-title-position-single").clone().appendTo(".group-wrapper-tablet-1");
    });
    /* Getting the active-trail deeper into the site. */
    $(function() {
        /* MD Megamenu */
        if (window.location.href.indexOf("/experience") > -1) {
          $("#md-megamenu-1 .awemenu-item-level-1.awemenu-item-1-1").addClass("awemenu-active-trail");
        }
        else if (window.location.href.indexOf("/programs/") > -1) {
          $("#md-megamenu-1 .awemenu-item-level-1.awemenu-item-1-2").addClass("awemenu-active-trail");
        }
        else if (window.location.href.indexOf("/faculty-research/") > -1) {
          $("#md-megamenu-1 .awemenu-item-level-1.awemenu-item-1-3").addClass("awemenu-active-trail");
        }
        else if (window.location.href.indexOf("/insights/") > -1) {
          $("#md-megamenu-1 .awemenu-item-level-1.awemenu-item-1-4").addClass("awemenu-active-trail");
        }
        else if (window.location.href.indexOf("/alumni/") > -1) {
          $("#md-megamenu-1 .awemenu-item-level-1.awemenu-item-1-5").addClass("awemenu-active-trail");
        }
        else if (window.location.href.indexOf("/events/") > -1) {
          $("#md-megamenu-1 .awemenu-item-level-1.awemenu-item-1-6").addClass("awemenu-active-trail");
        }
        /* Exec-ed menus */
        if (window.location.href.indexOf("/exec-ed/programs/") > -1) {
            $(".md-megamenu-executive-edu-main-menu .awemenu-item-level-1.awemenu-item-1-1").addClass("awemenu-active-trail");
        }
        else if (window.location.href.indexOf("/exec-ed/organizations/") > -1) {
            $(".md-megamenu-executive-edu-main-menu .awemenu-item-level-1.awemenu-item-1-2").addClass("awemenu-active-trail");
        }
        else if (window.location.href.indexOf("/exec-ed/difference/") > -1) {
            $(".md-megamenu-executive-edu-main-menu .awemenu-item-level-1.awemenu-item-1-3").addClass("awemenu-active-trail");
        }
        else if (window.location.href.indexOf("/exec-ed/admission/") > -1) {
            $(".md-megamenu-executive-edu-main-menu .awemenu-item-level-1.awemenu-item-1-4").addClass("awemenu-active-trail");
        }
        /* Seed menus */
        if (window.location.href.indexOf("/seed/mission/") > -1) {
            $(".md-megamenu-seed-main-menu .awemenu-item-level-1.awemenu-item-1-1").addClass("awemenu-active-trail");
        }
        else if (window.location.href.indexOf("/seed/transformation-program/") > -1) {
            $(".md-megamenu-seed-main-menu .awemenu-item-level-1.awemenu-item-1-2").addClass("awemenu-active-trail");
        }
        else if (window.location.href.indexOf("/seed/coaches-consultants/") > -1) {
            $(".md-megamenu-seed-main-menu .awemenu-item-level-1.awemenu-item-1-3").addClass("awemenu-active-trail");
        }
        else if (window.location.href.indexOf("/seed/student-internships/") > -1) {
            $(".md-megamenu-seed-main-menu .awemenu-item-level-1.awemenu-item-1-4").addClass("awemenu-active-trail");
        }
        else if (window.location.href.indexOf("/seed/news-events/") > -1) {
            $(".md-megamenu-seed-main-menu .awemenu-item-level-1.awemenu-item-1-4").addClass("awemenu-active-trail");
        }
    });
    /* Mobile menu manipulation*/
    $(function(){
        updateMenutitles();
        $(window).resize(function() {
            updateMenutitles();
        });
        function updateMenutitles() {
            var width = $(window).width();
            if (width < 1199) {
              $(".mm-header.about-GSB").prependTo("#block-menu-menu-md-mm-experience-leadership");
              $(".mm-header.about-degree-programs").prependTo("#block-menu-menu-md-mm-experience-learning");
              $(".mm-header.featured-programs").prependTo("#block-menu-menu-md-mm-exec-ed-featured-prog");
              $("#block-menu-menu-md-mm-programs-utility").appendTo("#block-menu-menu-md-mm-programs-online");
            };
            if (width < 599) {
              $(".social-media-wrapper").appendTo(".group-wrapper-tablet-2");
            };
            if (width >= 600 && width < 1199) {
              $(".social-media-wrapper").insertBefore(".group-wrapper-tablet-4");
            };
        };
    });

    $(function(){
        function updateMenuLinks() {
            var width = $(window).width();
            if (width <= 1199) {
                $("#sidebar").find(".menu > li.expanded")
                    .click(function (e) {
                        // Creating variables for the different levels of navigation
                        var self = $(this);

                        if ((self).hasClass("expanded")) {
                            // allows only one top-level and active-trail open at the same time.
                            $(".level-1").not(self).removeClass('open');
                        };
                        if (self.length) {
                            // Toggles the open.
                            self.toggleClass("open");
                            // Toggles the open and makes sure the parent stays open
                            if (self.hasClass("level-3")) {
                                self.parent().closest("li").toggleClass("open");
                            }
                            if (self.hasClass("level-4")) {
                                self.parent().closest("li").toggleClass("open");
                            }
                            if (self.hasClass("level-5")) {
                                self.parent().closest("li").toggleClass("open");
                            }
                        };
                    });
            };
        };

        updateMenuLinks();

        // Duplicating the top level link to a span.
        $("#sidebar").find(".content .menu li.expanded > a").each(function(i) {
          $(this).clone()
              .replaceWith("<span class='sub-menus'>" + $(this).html() + "</span>")
              .insertAfter(this);
          $(this).addClass("sub-menus-desktop");
        });
        // adding classes for the mobile version
        $("#sidebar li.expanded").each(function() {
            $(this).addClass("level-" + ($(this).parents("li").length +1));
        });
    });

    // Make md-megamenu (main, exec-ed, and seed) accessible by tab keys
    $(function(){
        $("#md-megamenu-1, .md-megamenu-executive-edu-main-menu, .md-megamenu-seed-main-menu").attr("role", "navigation");
        /*  Each event assigned to a variable for easy implementation.  */
        var myEvents = {
            click: function(e) {
                $(this)
                    .addClass("awemenu-active")
                    .children("ul")
                    .show()
                    .end()
                    .siblings("li")
                    .find("ul")
                    .css("display", "")
                    .css("z-index", "")
                    .closest("li")
                    .removeClass("awemenu-active");
            },
            keydown: function(e) {
                e.stopPropagation();
                if (e.keyCode == 9) {
                    if (!e.shiftKey && $("nav li").index($(this)) == $("nav li").length - 1)
                        $("nav li:first").focus();
                    else if (e.shiftKey && $("nav li").index($(this)) === 0)
                        $("nav ul:first > li:last")
                            .focus()
                            .blur();
                }
            },
            keyup: function(e) {
                e.stopPropagation();
                if (e.keyCode == 9) {
                    if (myEvents.cancelKeyup) myEvents.cancelKeyup = false;
                    else myEvents.click.apply(this, arguments);
                }
            }
        };
        $("#navigation")
            .on("click", "li", myEvents.click)
            .on("keydown", "li", myEvents.keydown)
            .on("keyup", "li", myEvents.keyup);

        //  this is needed to keep tabbing focus correct
        $("nav li").each(function(i) {
            this.tabIndex = i;
        });

    }); // close of accessibilty modification for menus
    // Landing viewport
    $(function() {
      $(".pane-bundle-landing-viewport").find("#landing-video").closest(".pane-bundle-landing-viewport").addClass("landing-video");
      $(".pane-bundle-landing-viewport").find(".field-name-field-homepage-image-desktop").closest(".pane-bundle-landing-viewport").addClass("landing-image");
    })


}(jQuery));
