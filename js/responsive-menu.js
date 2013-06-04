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

Drupal.behaviors.responsiveSearch = {
  attach: function (context, settings) {
    $(context).find('#search-touch-button').click(function() {
      $('#google-appliance-block-form').toggleClass('open');
    });
  }
};

Drupal.behaviors.responsiveMenutoggle = {
  attach: function (context, settings) {
    $(context).find('#block-system-main-menu li').click(function() {
      $(this).toggleClass('open');
    });
  }
};

}(jQuery));
