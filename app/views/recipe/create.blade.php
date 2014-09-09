@extends('layout')

@section('title', 'Create a Recipe')

@section('content')

  <h1>Create a Recipe</h1>
  {{ Form::open(array('route' => 'recipe.store')) }}

    {{ ControlGroup::generate(
      Form::label('name', 'Name'),
      Form::text('name')
    ) }}

    {{ ControlGroup::generate(
      Form::label('author', 'Author'),
      Form::select('author', $authors)
    ) }}

    {{ ControlGroup::generate(
      Form::label('time_prep', 'Prep Time'),
      '<div class="row">'
        . '<div class="col-xs-6">'
        . InputGroup::withContents(Form::selectRange('time_prep_hours', 0, 24))->append('hrs')
        . '</div>'
        . '<div class="col-xs-6">'
        . InputGroup::withContents(Form::selectRange('time_prep_minutes', 0, 60))->append('mins')
        . '</div>'
      . '</div>'
    ) }}

    {{ ControlGroup::generate(
      Form::label('time_cook', 'Cook Time'),
      '<div class="row">'
        . '<div class="col-xs-6">'
        . InputGroup::withContents(Form::selectRange('time_cook_hours', 0, 24))->append('hrs')
        . '</div>'
        . '<div class="col-xs-6">'
        . InputGroup::withContents(Form::selectRange('time_cook_minutes', 0, 60))->append('mins')
        . '</div>'
      . '</div>'
    ) }}

    {{ Form::submit('Create', [ 'class' => 'btn btn-primary' ]) }}

  {{ Form::close() }}
@stop