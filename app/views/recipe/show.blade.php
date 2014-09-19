@extends('layout')

@section('title', $recipe->name)

@section('content')

  <h1>{{ $recipe->name }}</h1>
  <p>by {{ $recipe->author->name }}</p>

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
    array('ingredients' => $recipe->ingredients)) }}

  {{ View::make('recipe.partials.ingredient_form',
    array('recipe' => $recipe)) }}

  {{ View::make('recipe.partials.steps',
    array('steps' => $recipe->steps)) }}

  {{ View::make('recipe.partials.step_form',
    array('recipe' => $recipe)) }}

@stop