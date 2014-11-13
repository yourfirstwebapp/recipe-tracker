
// Send the CSRF token (from the csrf-token meta tag)
// along with all with Ajax requests, automatically
$.ajaxSetup({
  headers: {
    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
  }
});


$(document).ready(function() {

  /**
   * Recipe forms
   */

  $('.toggle-recipe-form').click(function(e) {
    e.preventDefault();
    var $form = $(this).closest('.recipe-form-container')
      .find('form');
    $form.toggleClass('hide');
  });


  /**
   * Add recipe items
   */

  $('.recipe-item-form').submit(function(e) {

    // Prevent the traditional form submission
    e.preventDefault();

    // The form element
    var $form = $(this);

    // The form's URL
    var formURL = $form.attr('action');

    // Get the form inputs' values in a string
    // formatted as name1=value1&name2=value2, etc.
    var formData = $form.serialize();

    // Get the current number of items
    // and set our new item's order to that number + 1
    var $itemContainer = $form.closest('.recipe-item-container');
    var $itemList = $itemContainer.find('.list-group');
    var itemOrder = $itemList.find('li').length + 1;

    // Add the order value to our form data
    formData = formData + "&order=" + itemOrder;

    // Submit the form data via Ajax
    $.post(
      formURL,
      formData,
      function(jsonObject) {
        // Remove any previous errors
        $form.find('.alert').remove();

        // Act according to the status returned
        var status = jsonObject["status"];
        if (status == "success") {
          var itemHTML = jsonObject["item"];
          $itemList.append(itemHTML);

          // Reset the text input values and hide the form
          $form.find('input[type="text"]').val('');
          $form.addClass('hide');
        }
        else if (status == "fail") {
          var errorsHTML = jsonObject["errors"];
          $form.prepend(errorsHTML);
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

    $.post(
      formURL,
      formData,
      function(json) {
        var $item = $form.closest('.list-group-item');
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
      // Access the dragged item and parent list
      var $draggedItem = ui.item;
      var $itemList = $draggedItem.closest('.list-group');

      // The request URL
      var requestURL = $itemList.attr('data-update-orders-url');

      // Get the items' ids from their data-id attributes
      var itemIdArray = $itemList.sortable('toArray',
        { attribute: 'data-id' });

      var requestData = {
        ids: itemIdArray,
        _method: 'put'
      };

      // Make the Ajax request
      $.post(
        requestURL,
        requestData,
        function(jsonObject) {
          // Show a success message
          var $message = $(jsonObject["message"]);
          $message.insertAfter($itemList);

          // Hide the message after 3 seconds
          setTimeout(function() {
            $message.fadeOut();
          }, 1500);
        },
        'json'
      );
    }
  });


  /**
   * Delete a recipe
   */

  $('.delete-recipe-form').submit(function(e) {
    // NOT confirmed until the user confirms
    // both confirm alert messages
    var confirmed = false;
    var firstMessage = 'Are you SURE you wish to delete this recipe?'
      + ' All of its information will be lost.';
    if (confirm(firstMessage)) {
      // Confirm again...
      var lastMessage = 'POSITIVE you want to delete it?'
        + ' There\'s no turning back...';
      if (confirm(lastMessage)) {
        confirmed = true;
      }
    }

    // If NOT confirmed, block
    // the form submit (i.e. deletion)
    if (!confirmed) {
      return false;
    }
  });

});