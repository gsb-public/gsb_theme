(function ($) {

/**
 * Functionality to exit mega menu.
 */
Drupal.behaviors.megamenuexit = {
  attach: function (context, settings) {
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
      $('.qtip-megamenu').slideUp();
    });
  }
};

}(jQuery));
