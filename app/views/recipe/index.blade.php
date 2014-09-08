@extends('layout')

@section('title', 'Recipes')

@section('content')
  <h1>Recipes</h1>
  <div class="list-group">
  @foreach($recipes as $recipe)
    <a class="list-group-item"
      href="{{ URL::route('recipe.show', $recipe->id) }}">
      <h4 class="list-group-item-heading">
        {{ $recipe->name }}
      </h4>
      <p class="list-group-item-text">
        by {{ $recipe->author->name }}
      </p>
    </a>
  @endforeach
</div>
@stop