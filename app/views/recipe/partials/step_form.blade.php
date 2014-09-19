<div id="add_step_errors"></div>

<div id="add_step_form" class="add-recipe-item-form">

{{ Form::open(array('route' => 'step.store')) }}

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

</div>

<p><a id="show_add_step" href="#">+ Add step</a></p>