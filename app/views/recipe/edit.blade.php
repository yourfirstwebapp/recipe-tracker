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
      array('authors' => $authors, 'recipe' => $recipe))}}

    <div class="form-group">
      {{ Form::submit('Update',
        array('class' => 'btn btn-primary')) }}
    </div>

  {{ Form::close() }}

  {{ Form::model($recipe,
    array(
      'route' => array('recipe.destroy', $recipe->id),
      'method' => 'delete',
      'class' => 'delete-recipe-form'
    )) }}

    <div class="form-group">
      <button type="submit" class="btn btn-danger">
        Delete Recipe</button>
    </div>

  {{ Form:: close() }}

@stop