@extends('layout')

@section('title', 'Create a Recipe')

@section('content')

  <h1>Create a Recipe</h1>
  {{ Form::open(array('route' => 'recipe.store')) }}

    <div class="form-group">
      {{ Form::label('name', 'Name') }}
      {{ Form::text('name', '',
        array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
      {{ Form::label('author_id', 'Author') }}
      {{ Form::select('author_id', $authors,
        array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
      {{ Form::label('servings', 'Servings') }}
      {{ Form::selectRange('servings', 1, 100,
        array('class' => 'form-control')) }}
    </div>

    <div class="form-group form-time clearfix">
      {{ Form::label('time_prep', 'Prep Time') }}
      {{ Form::selectRange('time_prep_hours', 0, 24,
        array('class' => 'form-control')) }}
      {{ Form::label('time_prep_hours', 'hrs',
        [ 'class' => 'select-label' ]) }}
      {{ Form::selectRange('time_prep_minutes', 0, 60,
        array('class' => 'form-control')) }}
      {{ Form::label('time_prep_minutes', 'mins',
        [ 'class' => 'select-label' ]) }}
    </div>

    <div class="form-group form-time clearfix">
      {{ Form::label('time_cook', 'Cook Time') }}
      {{ Form::selectRange('time_cook_hours', 0, 24,
        array('class' => 'form-control')) }}
      {{ Form::label('time_cook_hours', 'hrs',
        array('class' => 'select-label')) }}
      {{ Form::selectRange('time_cook_minutes', 0, 60,
        array('class' => 'form-control')) }}
      {{ Form::label('time_cook_minutes', 'mins',
        array('class' => 'select-label')) }}
    </div>

    {{ Form::submit('Create',
      array('class' => 'btn btn-primary')) }}

  {{ Form::close() }}
@stop