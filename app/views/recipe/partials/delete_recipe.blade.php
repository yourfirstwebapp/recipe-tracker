{{ Form::open(array(
    'route' => array('recipe.destroy', $recipe->id),
    'method' => 'delete',
    'class' => 'delete-recipe-form'
  )) }}

  <div class="form-group">
    <button type="submit" class="btn btn-danger">
      Delete Recipe</button>
  </div>

{{ Form:: close() }}