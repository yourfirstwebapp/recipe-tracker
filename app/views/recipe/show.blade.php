@extends('layout')

@section('title', $recipe->name)

@section('content')

  <h1>{{ $recipe->name }}</h1>

  <div class="row recipe-quick-facts">
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

  <div class="recipe-ingredients">

    <h2>Ingredients</h2>

    <p>Ingredients will go here...</p>

  </div><!-- /.recipe-ingredients -->

  <div class="recipe-steps">

    <h2>Steps</h2>

    <p>Steps will go here...</p>

  </div><!-- /.recipe-steps -->

@stop