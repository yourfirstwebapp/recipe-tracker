<div class="recipe-item-container">

  <h2>Ingredients</h2>

  <ul class="list-group recipe-item-list"
    data-update-orders-url="{{ URL::action('IngredientController@updateOrders') }}">
  @foreach ($recipe->ingredients as $ingredient)
    {{ View::make('recipe.partials.ingredient',
      array('ingredient' => $ingredient)) }}
  @endforeach
  </ul>

  {{ View::make('recipe.partials.ingredient_form',
    array('recipe' => $recipe)) }}

</div>