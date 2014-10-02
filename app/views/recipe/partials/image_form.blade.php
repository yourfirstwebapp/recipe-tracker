<div class="recipe-form-container">

  {{ Form::open(array(
      'action' => array('RecipeController@updateImage', $recipe->id),
      'method' => 'put',
      'files' => true,
      'class' => 'recipe-form hide'
    )) }}

    <div class="well">

      <div class="form-group">
        {{ Form::label('image', 'Image') }}
        {{ Form::file('image') }}
        <p class="help-block">Only .jpg, .png, and .gif files allowed</p>
      </div>

      {{ Form::button('Upload',
        array('type' => 'submit', 'class' => 'btn btn-success')) }}

    </div>

  {{ Form::close() }}

  <p><a class="toggle-recipe-form" href="#">+ Set image</a></p>

</div>