
// Send the CSRF token (from the csrf-token meta tag)
// along with all with Ajax requests, automatically
$.ajaxSetup({
  headers: {
    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
  }
});


$(document).ready(function() {

  /**
   * Add recipe items
   */

  $('.toggle-recipe-item-form').click(function(e) {
    e.preventDefault();
    var $form = $(this).closest('.recipe-item-form-container')
      .find('form');
    $form.toggle();
  });

  $('.recipe-item-form').submit(function(e) {
    e.preventDefault();

    var $form = $(this);
    var $itemContainer = $form.closest('.recipe-item-container');

    // Get the form's URL from its "action" attribute
    // that was set with the proper url using form_open()
    var formURL = $form.attr('action');

    // Get the form inputs' values in a string
    // formatted as name1=value1&name2=value2, etc.
    var formData = $form.serialize();

    // Get the current number of items
    // and set our new item's order to that number + 1
    var $itemList = $itemContainer.find('.list-group');
    var itemOrder = $itemList.find('li').length + 1;

    // Add the order value to our form data
    formData = formData + "&order=" + itemOrder;

    // Submit the form data via Ajax
    $.post(
      formURL,
      formData,
      function(json) {
        // Clear any previous errors
        var $additemErrors = $itemContainer.find('.recipe-item-form-errors');
        $additemErrors.empty();

        // Act according to the status returned
        var status = json["status"];
        if (status == "success") {
          var itemHTML = json["item"];
          $itemList.append(itemHTML);

          // Reset the text input values and hide the form
          $form.find('input[type="text"]').val('');
          $form.hide();
        }
        else if (status == "fail") {
          var errorsHTML = json["errors"];
          $additemErrors.html(errorsHTML);
        }
      },
      'json'
    );

  });


  /**
   * Delete recipe items
   */

  $('.delete-recipe-item-form').submit(function(e) {
    e.preventDefault();

    var $form = $(this);
    var formURL = $form.attr('action');
    var formData = $form.serialize();
    var $item = $form.closest('.list-group-item');

    $.post(
      formURL,
      formData,
      function(json) {
        $item.fadeOut(function() {
          $item.remove();
        });
      },
      'json'
    );

  });


  /**
   * Reordering ingredients / steps
   */

  // Make the ingredient and step list items sortable
  $('.recipe-item-list').sortable({
    stop: function(e, ui) {
      // Access the dragged item via ui object
      // supplied by jQuery UI
      var $draggedItem = ui.item;

      var $itemList = $draggedItem.closest('.list-group');

      // Get an array (converted to a string) of the
      // items' ids, using the sortable toArray() function
      var itemIdArray = $itemList.sortable('toArray',
        { attribute: 'data-id' });

      var controllerActionURL = $itemList.attr('data-update-orders-url');
      var submitData = {
        ids: itemIdArray
      };

      $.post(
        controllerActionURL,
        submitData,
        function(json) {
          // Nothing to do here...
        },
        'json'
      );
    }
  });

});