@extends('layout')

@section('title', 'Create a Recipe')

@section('content')

  <div class="page-header">
    <h1>Create a Recipe</h1>
  </div>
  {{ Form::open(array('route' => 'recipe.store')) }}

    {{ View::make('recipe.partials.recipe_form',
      array('authors' => $authors))}}

    <div class="form-group">
      {{ Form::submit('Create',
        array('class' => 'btn btn-primary')) }}
    </div>

  {{ Form::close() }}

@stop