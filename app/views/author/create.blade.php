@extends('layout')

@section('title', 'Create a Recipe')

@section('content')

  <div class="page-header">
    <h1>Create an Author</h1>
  </div>
  {{ Form::open(array('route' => 'author.store')) }}

    <div class="form-group">
      {{ Form::label('name', 'Name') }}
      {{ Form::text('name', NULL,
        array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
      {{ Form::submit('Create',
        array('class' => 'btn btn-primary')) }}
    </div>

  {{ Form::close() }}

@stop