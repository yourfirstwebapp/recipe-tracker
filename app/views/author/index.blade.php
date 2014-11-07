@extends('layout')

@section('title', 'Authors')

@section('content')
  <div class="page-header">
    <a href="{{ URL::route('author.create') }}"
      class="btn btn-success">+ Author</a>
    <h1>Authors</h1>
  </div>
  <div class="list-group">
  @foreach($authors as $author)
    <div class="list-group-item">
      <h4 class="list-group-item-heading">
        {{ $author->name }}
      </h4>
    </div>
  @endforeach
</div>
@stop