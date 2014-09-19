<div class="recipe-ingredients">

  <h2>Ingredients</h2>

  <ul id="ingredients" class="list-group">
  @foreach ($ingredients as $ingredient)
    {{ View::make('recipe.partials.ingredient',
      array('ingredient' => $ingredient)) }}
  @endforeach
  </ul>

</div><!-- /.recipe-ingredients -->