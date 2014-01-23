/**
 *  This library adds show more/show less links.
 *  For views you need to add a show-more-less class to the view.
 *  For multiple fields you need to add a show-more-less class in display suite.
 *  For text areas you need to add a show-more-less class around the entire
 *  wrapper. You will also need to create another wrapper around the text that
 *  has a class of show-more-less-wrapper.
 *
 *  You can add optional classes to the same place you added show-more-less
 *  show-more-less-min-[n]: How many minimum lines (n) should be available to
 *    see the show more/less widget.
 *  show-more-less-num-[n]: How many lines (n) should be shown when closed.
 */
(function ($) {
  Drupal.behaviors.showMoreLess = {
    attach: function (context) {
      var counter, minimumToLaunch, $wrapper, $wrapperUL, $wrapperDiv, lineHeight;

      // Start a counter.
      counter = 0;

      // Loop through all the marked elements.
      $('.show-more-less:not(.show-more-less-processed)', context).addClass('show-more-less-processed').each(function() {
        counter++;
        $wrapper = $(this);
        // Add a class to the wrapper to make it unique.
        $wrapper.addClass('show-more-less-' + counter);

        // Get the minimum number needed to use show more/less
        minimumToLaunch = parseInt(Drupal.showMoreLess.getSetting($wrapper, 'min'));


        // Check to see if it's a text list.
        if ($wrapper.hasClass('field-type-text')) {
          $wrapperUL = $wrapper.find('ul');

          // Make sure we have the minimum length.
          if ($wrapperUL.children('li').length >= minimumToLaunch) {
            // Build our toggler
            Drupal.showMoreLess.toggler($wrapperUL, 'list', counter);
          }
        }
        // Check to see if it's a view.
        else if ($wrapper.hasClass('view')) {
          $wrapperDiv = $wrapper.find('.view-content');

          // Make sure we have the minimum length of lines.
          if ($wrapperDiv.find('.views-row').length >= minimumToLaunch) {
            // Build our toggler
            Drupal.showMoreLess.toggler($wrapperDiv, 'view', counter);
          }
        }
        // Otherwise let's assume it's text.
        else {
          $wrapperDiv = $wrapper.find('div.show-more-less-wrapper');

          // Get the lineHeight of the inside text so we can calculate number
          // of lines.
          lineHeight = $wrapperDiv.find(':first').css('line-height');
          lineHeight = parseFloat(lineHeight);

          // Get the entire div height.
          var divHeight = $wrapperDiv.height();

          // Make sure we have the minimum length of lines.
          if (divHeight >= lineHeight * minimumToLaunch) {
            // Build our toggler
            Drupal.showMoreLess.toggler($wrapperDiv, 'text', counter);
          }
        }
      });
    }
  };

  Drupal.showMoreLess = Drupal.showMoreLess || {};

  /**
   * Build the toggle link.
   *
   * @param $wrapper
   * @param $type
   * @param counter
   */
  Drupal.showMoreLess.toggler = function($wrapper, $type, counter) {
    var $toggler, id, $element;

    // Hide the overflow.
    $wrapper.css('overflow', 'hidden');

    // Add a link for people to click.
    $wrapper.after('<a class="show-more-less-toggler show-more-less-toggler-open" data-id="' + counter + '" href="#">' + Drupal.t('Show More') + '</a>');

    // Now create an object for that link.
    $toggler = $wrapper.next('.show-more-less-toggler');

    // Add click event.
    $toggler.click(function(e) {
      // Get the id from it.
      id = $(this).data('id');
      // Match our unique class so we operate on the right one.
      $element = $('.show-more-less-' + id);

      // If the link has an open class then it's currently open and we
      // need to close the div.  Otherwise open it.
      if ($(this).hasClass('show-more-less-toggler-open')) {
        Drupal.showMoreLess.close($element, $type);
      }
      else {
        Drupal.showMoreLess.open($element, $type);
      }

      // We don't want the click event to allow the site to redirect.
      e.preventDefault();
    });

    // Close by default.
    Drupal.showMoreLess.close($wrapper.parent('.show-more-less'), $type);
  }

  /**
   * Open area
   *
   * @param $element
   * @param $type
   */
  Drupal.showMoreLess.open = function($element, $type) {
    var newHeight, $wrapper, $lastItem;
    // Switch on what type of element it is.
    switch($type) {
      case 'view':
        // Get the wrapper.
        $wrapper = $element.children('.view-content');

        // Find the last item in the list.
        $lastItem = $wrapper.children('.views-row-last');

        // Calculate the new height by
        // Distance from the top of last + height of last - distance from the top of the wrapper
        newHeight = $lastItem.offset().top + $lastItem.height() - $wrapper.offset().top;
        break;

      case 'list':
        // Get the wrapper.
        $wrapper = $element.children('ul');

        // Find the last item in the list.
        $lastItem = $wrapper.children(':last');

        // Calculate the new height by
        // Distance from the top of last + height of last - distance from the top of the wrapper
        newHeight = $lastItem.offset().top + $lastItem.height() - $wrapper.offset().top;
        break;

      case 'text':
        // Get the wrapper.
        $wrapper = $element.children('div.show-more-less-wrapper');

        // Find the last element.
        $lastItem = $wrapper.children(':last');

        // Calculate the new height by
        // Distance from the top of last + height of last - distance from the top of the first element inside the wrapper.
        newHeight = $lastItem.offset().top + $lastItem.height() - $wrapper.children(':first').offset().top;
        break;
    }

    // Animate the area
    Drupal.showMoreLess.animateItem($wrapper, newHeight);

    // Switch the value of the toggle.
    $wrapper.siblings('.show-more-less-toggler').text(Drupal.t('Show Less'));

  }

  /**
   * Close area
   *
   * @param $element
   * @param $type
   */
  Drupal.showMoreLess.close = function($element, $type) {
    var numberToShow, $bottomItem, newHeight;
    // Get the number of rows to show.
    numberToShow = parseInt(Drupal.showMoreLess.getSetting($element, 'num'));
    switch ($type) {
      case 'view':
        // Find the wrapper.
        $wrapper = $element.children('.view-content');
        // Find the last item in the list.
        $bottomItem = $wrapper.find('.views-row:eq(' + numberToShow + ')');
        // Calculate the new height by
        // Distance from the top of last - distance from the top of the wrapper.
        newHeight = $bottomItem.offset().top - $wrapper.offset().top;
        break;

      case 'list':
        // Find the wrapper.
        $wrapper = $element.children('ul');
        // Find the last item in the list.
        $bottomItem = $wrapper.children('li:eq(' + numberToShow + ')');
        // Calculate the new height by
        // Distance from the top of last - distance from the top of the wrapper.
        newHeight = $bottomItem.offset().top - $wrapper.offset().top;
        break;

      case 'text':
        // Find the wrapper.
        $wrapper = $element.children('div.show-more-less-wrapper');
        // Find the line height.
        lineHeight = $wrapper.children(':first').css('line-height');
        lineHeight = parseFloat(lineHeight);

        // Calculate the new height by
        // line height * the number of items to show.
        newHeight = lineHeight * numberToShow;
        break;
    }

    // Animate the area
    Drupal.showMoreLess.animateItem($wrapper, newHeight);

    // Switch the value of the toggle.
    $wrapper.siblings('.show-more-less-toggler').text(Drupal.t('Show More'));
  }

  /**
   * Animate the area.
   *
   * @param $wrapper
   * @param newHeight
   */
  Drupal.showMoreLess.animateItem = function($wrapper, newHeight) {
    // Set the new height.
    $wrapper.animate({'height': newHeight + 'px'}, 500);
    // Toggle the open/close classes.
    $wrapper.siblings('.show-more-less-toggler').toggleClass('show-more-less-toggler-open').toggleClass('show-more-less-toggler-closed');
  }

  /**
   * Get the setting from the classes.
   *
   * @param $element
   * @param setting
   * @returns string
   */
  Drupal.showMoreLess.getSetting = function($element, setting) {
    // Set the defaults.
    defaults = {'min': 3, 'num': 3}

    // Match the setting.
    re = new RegExp('\\bshow-more-less-' + setting + '-(\\d+)\\b', 'i');
    value = $element.attr('class').match(re);

    // If there is no match return default, otherwise return the value.
    if (!value) {
      value = defaults[setting];
    }
    else {
      value = value[1];
    }

    return value;
  }
})(jQuery);

