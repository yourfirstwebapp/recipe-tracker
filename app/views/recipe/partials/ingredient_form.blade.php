<div class="recipe-item-form-container">

  <div class="recipe-item-form-errors"></div>

  {{ Form::open(array(
      'route' => 'ingredient.store',
      'class' => 'recipe-item-form'
    )) }}

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
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', null,
          array('class' => 'form-control', 'placeholder' => 'e.g. cinnamon')) }}
      </div>
      <div class="col-xs-2">
        {{ Form::button('Add',
          array('type' => 'submit', 'class' => 'btn btn-success')) }}
      </div>
    </div>

  {{ Form::close() }}

  <p><a class="toggle-recipe-item-form" href="#">+ Add ingredient</a></p>

</div>