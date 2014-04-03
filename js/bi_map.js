(function ($) {

  /**
   * Add highlighted map functionality for BI sidebar menu
   */
  Drupal.behaviors.map_hover = {
    attach: function () {
      var $biMap = $('.bi-map');
      if ($biMap.length) {
        var sidebar = $('#quicklinks'),
          biMenu = sidebar.find('.view-business-insights-sidebar'),
          biMap = sidebar.find('.bi-map'),
          biMaptext = biMap.find('.bi-map__text'),
          biMapOverlay = sidebar.find('.bi-map__overlay');

        /* if js is applied show map. */
        biMap.show();
        /* hide text block until user hovers or link is active. */
        biMaptext.hide();

        /* if location term page is opened, highlight the map. */
        var locationTerms = biMenu.find('.menu_region').find('a.active');
        if  (locationTerms.length) {
          change_map(locationTerms.text());
        }

        /* change map image on region hover */
        $('.bi-map-area').find('area').mouseover(function() {change_map($(this).attr('alt'));})
          .mouseout(function() {revert_map();});
        $biMap.mouseleave(function() {
          biMaptext.hide();
        });
      }

      /* change map background on hover */
      function change_map(t) {
        biMapOverlay.removeClass().addClass('bi-map__overlay ' + t.replace(/ /g, '').toLowerCase());
        biMaptext.show().text(t);
      }

      /* return default map background */
      function revert_map(t) {
        biMapOverlay.removeClass();
      }
    }
  };

}(jQuery));
