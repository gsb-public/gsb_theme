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
      if (Modernizr.mq('(max-width: 999px)')) {
        $('.banner-title').insertAfter($('#sidebar .sidebar'));
        $('#google-appliance-block-form').insertBefore($('#nav-touch-wrapper'));
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


      }
    }
  };

  /**
   * Move Exec Ed program finder filters out of container for full width.
   */
  Drupal.behaviors.ee_filters = {
    attach: function () {
      $('.isotopify.program-list .isotopify-filters').insertBefore($('.pane-program-list .programs'));
    }
  };

  /**
   * Custom click for ee program finder date range.
   */
  Drupal.behaviors.programfinderDateRange = {
    attach: function () {
      $('.isotopify-filter-daterange-button').click(function () {
        $(this).toggleClass('open');
      });
    }
  };

}(jQuery));
