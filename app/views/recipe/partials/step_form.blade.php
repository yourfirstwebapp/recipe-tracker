<div class="recipe-form-container">

  {{ Form::open(array(
      'route' => 'step.store',
      'class' => 'recipe-form recipe-item-form hide'
    )) }}

    {{ Form::hidden('recipe_id', $recipe->id) }}

    <div class="form-group">
      {{ Form::label('instructions', 'Instructions') }}
      {{ Form::textarea('instructions', null,
        array('class' => 'form-control', 'placeholder' => 'e.g. Next, mix the flour and ...')) }}
    </div>
    <div class="form-group">
      {{ Form::button('Add',
        array('type' => 'submit', 'class' => 'btn btn-success')) }}
    </div>

  {{ Form::close() }}

  <p><a class="toggle-recipe-form" href="#">+ Add step</a></p>

</div>