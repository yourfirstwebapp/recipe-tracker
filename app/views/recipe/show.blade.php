@extends('layout')

@section('title', $recipe->name)

@section('content')

  <div class="page-header">
    <a class="btn btn-primary"
      href="{{ URL::route('recipe.edit', $recipe->id) }}">
      <i class="glyphicon glyphicon-edit"></i> Edit</a>
    <h1>{{ $recipe->name }}</h1>
  </div>
  <p>by {{ $recipe->author->name }}</p>

  {{ View::make('recipe.partials.image',
    array('recipe' => $recipe)) }}

  <div class="row">
    <div class="col-md-4">
      <h4>Servings</h4>
      {{ $recipe->servings }}
    </div>
    <div class="col-md-4">
      <h4>Prep Time</h4>
      {{ $recipe->time_prep_display }}
    </div>
    <div class="col-md-4">
      <h4>Cook Time</h4>
      {{ $recipe->time_cook_display }}
    </div>
  </div>

  {{ View::make('recipe.partials.ingredients',
    array('recipe' => $recipe)) }}

  {{ View::make('recipe.partials.steps',
    array('recipe' => $recipe)) }}

@stop