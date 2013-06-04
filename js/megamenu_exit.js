(function ($) {

/**
 * Functionality to exit mega menu.
 */
Drupal.behaviors.megamenuexit = {
  attach: function (context, settings) {
    $('a.menu-minipanel').click(function(e) {
      if (!$(this).hasClass('qtip-hover')) {
        e.stopPropagation();
        e.preventDefault();
      }
    });
    $(document).on('hover', '.qtip-wrapper', function() {
      $(this).find('.qtip-content').once().before('<a href="#" class="qtip-close">Close</a>');
    });
    $(document).on('click', 'a.qtip-close', function() {
      $('.qtip-megamenu').hide();
    });
  }
};

}(jQuery));
