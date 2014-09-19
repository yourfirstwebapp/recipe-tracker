<div class="recipe-steps">

  <h2>Steps</h2>

  <ul id="steps" class="list-group">
  @foreach ($steps as $step)
    {{ View::make('recipe.partials.step',
      array('step' => $step)) }}
  @endforeach
  </ul>

</div>