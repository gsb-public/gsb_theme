(function ($) {

  Drupal.behaviors.spotlight_seemore = {
    attach: function (context, settings) {
      if ($('.spotlight').length>0) {
        var spotlightShowMore = $('.spotlight a.show-more'),
            visibleLines = 4,
            visibleHeight = visibleLines * parseInt(spotlightShowMore.siblings('.spotlight-story').children('p').css('line-height'));
        spotlightShowMore.each(function() {
          var visHeight = visibleHeight,
            $this = $(this);
          if ( !$this.hasClass('showmore-processed') ) {
            $this.addClass('showmore-processed');
            var spotlightStory = $this.siblings('.spotlight-story'),
                storyContent = spotlightStory.children('p').height();

             if ( spotlightStory.position().top > 285 && spotlightStory.children('p').height() > 57 && spotlightStory.parents('.span4').length == 0 ) { // >276 means description is lower 
               spotlightStory.css('max-height', 35); // set height to 2 lines
               visHeight = parseInt(visHeight / visibleLines * visibleLines/2);
             }
            if ( storyContent <= visHeight ) {
              $this.remove();
            } else {
              $this.click(function() {
                var $this = $(this);
                if ( !$this.hasClass('active') ) {
                  $this.html('<span>Show Less</span>');
                  spotlightStory.animate({'max-height' : storyContent}, 350);
                } else {
                  $this.html('<span>Show More</span>');
                  spotlightStory.animate({'max-height' : visHeight}, 300);
                }
                $this.toggleClass('active');
              });
            }
          }
        });
      }
    }
  }

  Drupal.behaviors.button_behavior = {
    attach: function (context, settings) {
      $('.video-play-icon').click(function () {
        $(this).prev().click();
      })
    }
  }

  Drupal.behaviors.accordion = {
    attach: function (context, settings) {

      // Define accordion title
      var acctitle = $('.acc-title');
      if ( acctitle.length > 0 ) {
        acctitle.each(function () {
          var $this = $(this);
          if (!$this.hasClass('header-processed')) {
            $this.addClass('header-processed');
            // find body container next to accordion title
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
      * A recursive function that checks elements next neighbour,
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

  // Use uniform.js to style checkboxes for club filters
  Drupal.behaviors.theme_checkboxes = {
    attach: function (context, settings) {
      if ($('.clubs-filter-exposed').length > 0) {
        $(".clubs-filter-exposed .bef-checkboxes .form-item input").uniform();
      }
    }
  }

  // Club search placeholder fallback
  Drupal.behaviors.search_autocomplete = {
    attach: function (context, settings) {
      if ($('.views-widget-filter-search_api_views_fulltext').length > 0) {
        var searhBox = $('.views-widget-filter-search_api_views_fulltext input'),
            searchLabel = searhBox.closest('.views-widget-filter-search_api_views_fulltext').children('label');
         if (searhBox.val() != '') {
           searchLabel.hide();
         }
         searhBox.focus(function () {
           searchLabel.hide();
         });
         searhBox.blur(function() {
           toggleLabel ($(this));
          });
         searhBox.change(function() {
           toggleLabel ($(this));
         });
         function toggleLabel (e) {
           var $this = e;
           if ($this.val() == '') {
             searchLabel.show();
           } else {
             searchLabel.hide();
           }
         }
      }
    }
  }
  
  /**
  * Check for social field fpp, if it exists, check the sourse.
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
          // Initialize twitterfeed.js function
          gsb_tweetfeed.init({
            search: _search,
            numTweets: _length,
            appendTo: '.pane-bundle-social-feed'
          });
        } 
      }
    }
  }

}(jQuery));