// RESPONSIVE MENUS
(function ($) {

Drupal.behaviors.responsiveMenu = {
  attach: function (context, settings) {
    $(context).find('#nav-touch-button').click(function() { $(this).parent().toggleClass('open');});
    $(context).find('#program-links-title').click(function() { $(this).parent().toggleClass('open');});
    $(context).find('#sidebar h2').click(function() { $(this).parent().toggleClass('open');});
    $(context).find('.pane-block h2.pane-title').click(function() { $(this).parent().toggleClass('open');});
    $(context).find('#views-exposed-form-gsb-event-event-listing-pane .views-exposed-widget label').click(function() { $(this).parent().toggleClass('open');});
    $(context).find('#search-touch-button').click(function() { $('#google-appliance-block-form').toggleClass('open');});
    $(context).find('#block-system-main-menu li').click(function() { $(this).toggleClass('open');});
  }
};

}(jQuery));
