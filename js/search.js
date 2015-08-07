(function ($) {

  /**
   * Add javascript functionality to the search menu.
   */
  Drupal.behaviors.gsb_search_box = {
    attach: function () {
      $('#navigation').addClass('search-closed');
      $('#navigation .global-search #edit-submit').click(function(e) {
        if ($('#navigation').hasClass('search-closed')) {
          $('#navigation').removeClass('search-closed');
          $('#navigation').addClass('search-open');
          e.preventDefault();
        }
      });
    }
  };

}(jQuery));
