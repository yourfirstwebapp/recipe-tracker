<div class="recipe-item-container">

  @if ($recipe->image)
    <div class="recipe-image">
      <img alt="{{ $recipe->image }}"
        src="{{ URL::asset($recipe->image) }}">
    </div>
  @endif

  {{ View::make('recipe.partials.image_form',
    array('recipe' => $recipe)) }}

</div>