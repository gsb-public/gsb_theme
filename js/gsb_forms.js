(function ($) {

  /**
   * Prevent form submit on choosing an autocomplete suggestion
   */
  Drupal.behaviors.prevent_submit_on_autocomplete = {
    attach: function () {
      $('input.form-text.form-autocomplete').keypress(function (e) {
        if (e.keyCode == 13) {
          e.preventDefault();
        }
      });
    }
  };

  /**
   * Placeholder for IE9-
   */
  Drupal.behaviors.placeholder = {
    attach: function () {
      if (!Modernizr.input.placeholder) {
        var $placeholder = $('[placeholder]');
        $placeholder.focus(function () {
          var input = $(this);
          if (input.val() == input.attr('placeholder')) {
            input.val('');
            input.removeClass('placeholder');
          }
        }).blur(function () {
          var input = $(this);
          if (input.val() == '' || input.val() == input.attr('placeholder')) {
            input.addClass('placeholder');
            input.val(input.attr('placeholder'));
          }
        }).blur();
        $placeholder.parents('form').submit(function () {
          $(this).find('[placeholder]').each(function () {
            var input = $(this);
            if (input.val() == input.attr('placeholder')) {
              input.val('');
            }
          });
        });
      }
    }
  };

  /**
   * Modify collapsible functional for Filter regions and industry or anything else taxonomy
   */
  Drupal.behaviors.collapsible_patch = {
    attach: function () {
      var $widget = $('.exposed_filter_widget .views-exposed-widget');
      $widget.once().children('label').click(function () {
        $widget
          .toggleClass('collapsed')
          .find('.views-widget')
            .toggle();
      });

      // CHECK IF ANY INPUT IS CHECKED (TO MAINTAIN COLLAPSED)
      var checkedInput = false;
      $('.exposed_filter_widget .bef-checkboxes input').each(function () {
        if ($(this).attr('checked')) {
          checkedInput = true;
        }
      });

      if (checkedInput) {
        $widget
          .addClass('collapsed')
          .find('.views-widget')
            .show();
      }
    }
  };

}(jQuery));
