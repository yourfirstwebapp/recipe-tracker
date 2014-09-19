<div id="add_ingredient_errors"></div>

<div id="add_ingredient_form" class="add-recipe-item-form">

{{ Form::open(array('route' => 'ingredient.store')) }}

  {{ Form::hidden('recipe_id', $recipe->id) }}

  <div class="form-group row">
    <div class="col-xs-3">
      {{ Form::label('amount', 'Amount') }}
      {{ Form::text('amount', null,
        array('class' => 'form-control', 'placeholder' => 'e.g. 3')) }}
    </div>
    <div class="col-xs-3">
      {{ Form::label('unit', 'Unit') }}
      {{ Form::text('unit', null,
        array('class' => 'form-control', 'placeholder' => 'e.g. tbsp')) }}
    </div>
    <div class="col-xs-4">
      {{ Form::label('ingredient', 'Ingredient') }}
      {{ Form::text('ingredient', null,
        array('class' => 'form-control', 'placeholder' => 'e.g. cinnamon')) }}
    </div>
    <div class="col-xs-2">
      {{ Form::button('Add',
        array('type' => 'submit', 'class' => 'btn btn-success')) }}
    </div>
  </div>

{{ Form::close() }}

</div>

<p><a id="show_add_ingredient" href="#">+ Add ingredient</a></p>