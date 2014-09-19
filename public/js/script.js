$(document).ready(function() {

  /**
   * Add recipe ingredients
   */

  var $addIngredientForm = $('#add_ingredient_form');

  $('#show_add_ingredient').click(function(e) {
    e.preventDefault();
    $addIngredientForm.toggle();
  });

  /**
   * Add recipe steps
   */

  var $addStepForm = $('#add_step_form');

  $('#show_add_step').click(function(e) {
    e.preventDefault();
    $addStepForm.toggle();
  });

});