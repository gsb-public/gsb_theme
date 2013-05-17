// RESPONSIVE MENUS
(function ($) {

Drupal.behaviors.responsiveMenu = {
  attach: function (context, settings) {
    $(context).find('#nav-touch-button').click(function() {
      $(this).parent().toggleClass('open');
    });
  }
};

Drupal.behaviors.responsivePrograms = {
  attach: function (context, settings) {
    $(context).find('#program-links-title').click(function() {
      $(this).parent().toggleClass('open');
    });
  }
};

}(jQuery));
