(function ($) {

  /**
   * Add javascript functionality to the search menu.
   */
  Drupal.behaviors.gsb_search_box = {
    attach: function () {
      $('#navigation').addClass('search-closed');
      $('.global-search input[type="submit"]').click(function(e) {
        if ($('#navigation').hasClass('search-closed')) {
          $('#navigation').removeClass('search-closed');
          $('#navigation').addClass('search-open');
          $('.global-search input[name="search_keys"]').focus();
          e.preventDefault();
        }
      });
    }
  };

}(jQuery));
