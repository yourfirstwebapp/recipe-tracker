@extends('layout')

@section('title', 'Create a Recipe')

@section('content')

  <div class="page-header">
    <h1>Create a Recipe</h1>
  </div>
  {{ Form::open(array('route' => 'recipe.store')) }}

    <div class="form-group">
      {{ Form::label('name', 'Name') }}
      {{ Form::text('name', NULL,
        array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
      {{ Form::label('author_id', 'Author') }}
      {{ Form::select('author_id', $authors, NULL,
        array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
      {{ Form::label('servings', 'Servings') }}
      {{ Form::selectRange('servings', 1, 100, NULL,
        array('class' => 'form-control')) }}
    </div>

    <div class="form-group form-time clearfix">
      {{ Form::label('time_prep', 'Prep Time') }}
      {{ Form::selectRange('time_prep_hours', 0, 24, NULL,
        array('class' => 'form-control')) }}
      {{ Form::label('time_prep_hours', 'hrs',
        array('class' => 'select-label')) }}
      {{ Form::selectRange('time_prep_minutes', 0, 60, NULL,
        array('class' => 'form-control')) }}
      {{ Form::label('time_prep_minutes', 'mins',
        array('class' => 'select-label')) }}
    </div>

    <div class="form-group form-time clearfix">
      {{ Form::label('time_cook', 'Cook Time') }}
      {{ Form::selectRange('time_cook_hours', 0, 24, NULL,
        array('class' => 'form-control')) }}
      {{ Form::label('time_cook_hours', 'hrs',
        array('class' => 'select-label')) }}
      {{ Form::selectRange('time_cook_minutes', 0, 60, NULL,
        array('class' => 'form-control')) }}
      {{ Form::label('time_cook_minutes', 'mins',
        array('class' => 'select-label')) }}
    </div>

    <div class="form-group">
      {{ Form::submit('Create',
        array('class' => 'btn btn-primary')) }}
    </div>

  {{ Form::close() }}

@stop