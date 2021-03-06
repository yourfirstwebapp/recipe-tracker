<div class="recipe-item-container">

  <h2>Steps</h2>

  <ul class="list-group recipe-item-list"
    data-update-orders-url="{{ URL::action('StepController@updateOrders') }}">
  @foreach ($recipe->steps as $step)
    {{ View::make('recipe.partials.step',
      array('step' => $step)) }}
  @endforeach
  </ul>

  {{ View::make('recipe.partials.step_form',
    array('recipe' => $recipe)) }}

</div>