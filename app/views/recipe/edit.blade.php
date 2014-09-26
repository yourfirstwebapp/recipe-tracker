@extends('layout')

@section('title', 'Editing ' . $recipe->name)

@section('content')

  <div class="page-header">
    <h1>Editing {{ $recipe->name }}</h1>
  </div>
  {{ Form::model($recipe,
    array(
      'route' => array('recipe.update', $recipe->id),
      'method' => 'PUT',
    )) }}

    {{ View::make('recipe.partials.recipe_form',
      array('authors' => $authors, 'recipe' => $recipe))}}

    {{ Form::submit('Update',
      array('class' => 'btn btn-primary')) }}

  {{ Form::close() }}
@stop