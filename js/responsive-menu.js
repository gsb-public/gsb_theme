// RESPONSIVE MENUS
(function ($) {

Drupal.behaviors.responsiveMenu = {
  attach: function (context, settings) {
    $(context).find('#nav-touch-button').click(function() {
      $(this).parent().toggleClass('open');
    });
  }
};

}(jQuery));
