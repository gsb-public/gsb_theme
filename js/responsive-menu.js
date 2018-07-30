// RESPONSIVE MENUS
(function ($) {

Drupal.behaviors.responsiveMenu = {
  attach: function (context, settings) {
    $(context).find('#nav-touch-button').click(function() { $(this).parent().toggleClass('open');});
    $(context).find('#search-close').click(function() { $(this).closest('#navigation').removeClass('search-open').addClass('search-closed');});
    $(context).find('#program-links-title').click(function() { $(this).parent().toggleClass('open');});
    $(context).find('#sidebar h2').click(function() { $(this).parent().toggleClass('open');});
    $(context).find('.pane-block h2.pane-title').click(function() { $(this).parent().toggleClass('open');});
    $(context).find('#views-exposed-form-gsb-event-event-listing-pane .views-exposed-widget label').click(function() { $(this).parent().toggleClass('open');});
    $(context).find('#search-touch-button').click(function() { $('#coveo-search-block-form').toggleClass('open');});
    $(context).find('#insights-search-touch-button').click(function() { $('#insights-search-block-form').toggleClass('open'); $(this).toggleClass('open');});
    $(context).find('#block-system-main-menu li').click(function() { $(this).toggleClass('open');});
    $(context).find('#block-menu-menu-executive-education-mega-me li').click(function() { $(this).toggleClass('open');});
    $(context).find('#block-menu-menu-mega-menu-seed li').click(function() { $(this).toggleClass('open');});
    $(context).find('#block-menu-section-27256').click(function() { $(this).toggleClass('open');});
  }
};

}(jQuery));
