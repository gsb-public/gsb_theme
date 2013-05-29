(function ($) {

  /**
   * Functionallity for Spotlight block show more/less link
   */
  Drupal.behaviors.spotlight_seemore = {
    attach: function (context, settings) {
      $(window).bind('load ready resize', function(){
        // Check if spotlight exists.
        var $spotlight = $('.pane-bundle-spotlight')
        if ($spotlight.length) {
          // If the line height of the body text changes, adjust this.
          var visibleHeight = 18 * 4
          $spotlight.find('.pane-content > div').once('showmore-link').append('<p class="show-more"><span>Show More</span></p>')
          // Add behavior for every .show-more link.
          $spotlight.find('.show-more').once('showmore', function () {
            var $this = $(this),
              $spotlightContent = $this.siblings('.field-name-field-body'),
              contentHeight = $spotlightContent.find('p').height()
            // Remove .show-more if the body is less than the defined max height.
            $spotlightContent.css('height',visibleHeight)
            if (contentHeight <= visibleHeight) {
              $this.remove()
            }
            else {
              $this.click(function() {
                var $this = $(this), text, height
                // Expand description to its real height.
                if (!$this.hasClass('active')) {
                  text = Drupal.t('Show Less')
                  height = contentHeight
                }
                // Collapse description to defined max height.
                else {
                  text = Drupal.t('Show More')
                  height = visibleHeight
                }
                //$spotlightContent.removeAttr('style')
                $spotlightContent.animate({'height' : height}, 300)
                $this
                  .toggleClass('active')
                  .html('<span>' + text + '</span>')
              })
            }
          })
        }
      })
    }
  };


  /**
   * Add accordion functionality for both
   * fieldable panel pane and WYSIWYG.
   */
  Drupal.behaviors.accordion = {
    attach: function (context, settings) {
      // Define accordion title.
      var acctitle = $('.acc-title');
      if ( acctitle.length > 0 ) {
        acctitle.each(function () {
          var $this = $(this);
          if (!$this.hasClass('header-processed')) {
            $this.addClass('header-processed');
            // Find body container next to accordion title.
            var next = $this.next('.acc-body');
            // If there are more than 1 body alement after title
            // wrap them all into accordion-body-wrap class
            // by calling touchNeighbour recursive function.
            if ( next.length > 0 ) {
              next.wrapAll('<div class="accordion-body-wrap" />');
              touchNeighbour(next, 'acc-body');
            } else {
              // If the title has body after it - remove styling.
              $this.removeClass('acc-title');
            }
          }
        });
      }

      if ( $('.field-name-field-accordion-item, .acc-title').length > 0 ) {
        // Find accordion titles.
        var accordionHead = $(".field-name-field-accordion-item .field-name-field-title, .acc-title");
        accordionHead.each( function() {
          // Add functionality on each accordion header.
          var currentHead = $(this);
          if (!currentHead.hasClass('processed')) {
            // Add +/- icon on header.
            currentHead.addClass('processed')
              .prepend('<span class="accordion-toggle"></span>')
              .click(function (e) {
                var $this = $(this);
                if ($this.parents('.entity').length > 0) {
                  // If it's a fpp toggle body field.
                  $this.toggleClass('opened').parents('.entity').find('.field-name-field-body').slideToggle(250);
                } else {
                  // If it's inside WYSIWYG toggle body wrapper.
                  $this.toggleClass('opened').next('.accordion-body-wrap').slideToggle(250);
                }
            });
          }
        });
      }

      /**
       * A recursive function that checks elements next touchNeighbourr,
       * and if it has className or ClassName2 from arguments,
       * insert the it after checked element and repeat function.
       */
      function touchNeighbour(e, className, className2) {
        var next = e.parent().next();
        if ( next.hasClass(className) || next.hasClass(className2) ) {
          next.insertAfter(e);
          touchNeighbour(next, className, className2);
        } else {
          return false;
        }
      }
    }
  }

  /**
   * Check for social field fpp, if it exists, check the source.
   * If the source is twitter, grab the values from fields and
   * transmit them to gsb_tweetfeed function.
   */
  Drupal.behaviors.social_feed = {
    attach: function (context, settings) {
      if ($('.pane-bundle-social-feed').length > 0 && !$('.pane-bundle-social-feed').hasClass('processed')) {
        var socialWrapper = $('.pane-bundle-social-feed'),
            _source = socialWrapper.find('.field-name-field-feed-source').text();
        if ( _source.toLowerCase() == 'twitter') {
          // Get tweets number and search query.
          var _length = socialWrapper.find('.field-name-field-social-display-num').text(),
            _search = socialWrapper.find('.field-name-field-twitter-search').text();
          // Add wrapper for tweets.
          socialWrapper.addClass('twitter-feed designed-box processed')
            .append('<div clas="twitter-feed"/></div>');
          // Add background only if tweets qty less than 3.
          if (_length < 3) { socialWrapper.addClass('bg'); }
          // Initialize twitterfeed.js function.
          gsb_tweetfeed.init({
            search: _search,
            numTweets: _length,
            appendTo: '.pane-bundle-social-feed'
          });
        }
      }
    }
  }

  /**
   * Add highlighted map functionality for BI sidebar menu
   */
  Drupal.behaviors.map_hover = {
    attach: function (context, settings) {
      if ($('.bi-map').length) {
        var sidebar = $('#quicklinks'),
          biMenu = sidebar.find('.view-business-insights-sidebar'),
          biMap = sidebar.find('.bi-map'),
          biMaptext = biMap.find('.bi-map__text'),
          biMapOverlay = sidebar.find('.bi-map__overlay');

        /* if js is applied show map. */
        biMap.show();
        /* hide text block until user hovers or link is active. */
        biMaptext.hide();

        /* if location term page is opened, highlight the map. */
        var locationTerms = biMenu.find('.menu_region').find('a.active');
        if  (locationTerms.length) {
          change_map(locationTerms.text());
        }

        /* change map image on region hover */
        $('.bi-map-area').find('area').mouseover(function() {change_map($(this).attr('alt'));})
          .mouseout(function() {revert_map();});
        $('.bi-map')
          .mouseleave(function() {
            biMaptext.hide();
          });
      }

      /* change map background on hover */
      function change_map(t) {
        biMapOverlay.removeClass().addClass('bi-map__overlay ' + t.replace(/ /g, '').toLowerCase());
        biMaptext.show().text(t);
      }

      /* return default map background */
      function revert_map(t) {
        biMapOverlay.removeClass();
      }
    }
  }

  /**
   * Prevent form submit on chosing an autocomplete suggestion
   */
  Drupal.behaviors.prevent_submit_on_autocomplete = {
    attach: function (context, settings) {
      $('input.form-text.form-autocomplete').keypress(function(event) {
        return event.keyCode != 13;
      });
    }
  }

  /**
   * Modify collapsible functional for Filter regions and industry or anything else taxonomy
   */
  Drupal.behaviors.colapsable_patch = {
    attach: function (context, settings) {
         $('.exposed_filter_widget .views-exposed-widget').children('label:not(.colapsable_processed)').click(function(){
           $('.exposed_filter_widget .views-exposed-form .views-exposed-widget').toggleClass('collapsed')
           $('.exposed_filter_widget .views-exposed-form .views-exposed-widget .views-widget').toggle()
         }).addClass('colapsable_processed')

         //CHECK IF ANY INPUT IS CHECKED (TO MAINTAIN COLLAPSED)
         var checkedInput = false
        $('.exposed_filter_widget .bef-checkboxes input').each(function(index, val){
          if($(this).attr('checked'))
              checkedInput = true
        })

        if(checkedInput){
          $('.exposed_filter_widget .views-exposed-form .views-exposed-widget').addClass('collapsed')
          $('.exposed_filter_widget .views-exposed-form .views-exposed-widget .views-widget').show()
        }
    }
  }

  /**
   * Move quicklinks to top of page in mobile landscape context.
   */
  Drupal.behaviors.quicklinks ={
    attach: function (context, settings) {
      var mq = window.matchMedia( "(max-width: 568px)" );
      if (mq.matches) {
        $('#quicklinks').insertBefore($('#top-content'));
      }
    }
  }

  /**
   * Move search to top of page in mobile landscape context.
   */
  Drupal.behaviors.searchblock ={
    attach: function (context, settings) {
      var mq = window.matchMedia( "(max-width: 568px)" );
      if (mq.matches) {
        $('#google-appliance-block-form').insertBefore($('#nav-touch-wrapper'));
      }
    }
  }

  /**
   * Input type number alternative for spinner
   */
  Drupal.behaviors.spinner ={
    attach: function (context, settings) {
      if (!Modernizr.inputtypes.number) {
        $('.form-number').wrap('<span class="fake-input-wrapper" />')
        .after('<div class="arrows-wrapper"><button class="up" data-dir ="up" /><button class="down" data-dir ="down" /></div>');

        $('.fake-input-wrapper').each(function() {
          var numberInput = $(this).find('.form-number').attr('autocomplete','off'),
                min = parseInt(numberInput.attr('min')),
                max = parseInt(numberInput.attr('max')),
                step = parseInt(numberInput.attr('step'));

          $(this).find('button').click(function(e) {
            e.preventDefault();
            $(this).parent().prev().trigger('focus');
            var direction = $(this).data('dir'),
            val =  parseInt(numberInput.val());
            if (!val) {
              numberInput.val(min);
            } else if (val > max) {
              numberInput.val(max);
            } else {
              var mod = (val-min) % step;
              // increase or decrease depending on the button
              if(mod === 0) {
                ( direction === 'up' ) ?  val+=step: val-=step;
              } else {
                ( direction === 'up' ) ?  val+=step-mod: val-=step - step + mod;
              }
              if (val >=min && val < max ) {
                numberInput.val(val);
              }
            }
          });
        });
        $('.form-number').keydown(function(e) {
          if (e.which === 38) {
            $(this).next().find('.up').trigger('click');
          }
          if (e.which === 40) {
            $(this).next().find('.down').trigger('click');
          }
        });
      }
    }
  }

}(jQuery));
