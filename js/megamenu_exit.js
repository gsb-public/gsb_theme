(function ($) {

/**
 * Functionality to exit mega menu.
 */
Drupal.behaviors.megamenuexit = {
  attach: function (context, settings) {
    // Ensure menu-minipanel is active.
    if (!settings.hasOwnProperty('menuMinipanels')) {
      return;
    }

    // If the width is greater than 568px and it's a touch device make the user
    // double click.
    if ($('html').hasClass('touch') && Modernizr.mq('(min-width: 569px)')) {
      // Trap the click event on the top megamenu items.
      $('a.menu-minipanel').click(function() {
        // If it's been clicked once then go to the site.
        if ($(this).hasClass('clickable')) {
          return true;
        }
        // If it hasn't been clicked add a class to show it's been clicked once
        else {
          // Remove all the clickable classes so we can move between menus.
          $('a.menu-minipanel').removeClass('clickable');

          // Add the clickable class and stop any action from happening.
          $(this).addClass('clickable');
          return false;
        }
      });
    }

    // Loop through each menu-minipanel and add a close button on hover.
    for (var i in settings.menuMinipanels.panels) {
      if (settings.menuMinipanels.panels.hasOwnProperty(i)) {
        $('a.menu-minipanel-' + settings.menuMinipanels.panels[i].mlid)
          .hover(function () {
            $('.qtip-content')
              .once('menu-minipanel-close')
              .before('<a href="#" class="qtip-close">Close</a>');
          });
      }
    }

    $(document).on('click', 'a.qtip-close', function() {
      // Remove all clickable classes so we can click again.
      $('a.menu-minipanel').removeClass('clickable');

      // Hide the qtip
      $('.qtip-megamenu').slideUp();
    });
  }
};

}(jQuery));
