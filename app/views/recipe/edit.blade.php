@extends('layout')

@section('title', 'Editing ' . $recipe->name)

@section('content')

  <div class="page-header">
    <h1>Editing {{ $recipe->name }}</h1>
  </div>
  {{ Form::model($recipe,
    array(
      'route' => array('recipe.update', $recipe->id),
      'method' => 'put',
    )) }}

    {{ View::make('recipe.partials.recipe_form',
      array('authors' => $authors))}}

    <div class="form-group">
      {{ Form::submit('Update',
        array('class' => 'btn btn-primary')) }}
    </div>

  {{ Form::close() }}

  {{ View::make('recipe.partials.delete_recipe',
    array('recipe' => $recipe)) }}

@stop