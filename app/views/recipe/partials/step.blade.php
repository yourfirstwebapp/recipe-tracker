<li class="list-group-item"
  data-id="{{ $step->id }}">
  {{ Form::open(array(
    'route' => array('step.destroy', $step->id),
    'method' => 'delete',
    'class' => 'delete-recipe-item-form',
    )) }}
  <button
    class="btn btn-danger btn-xs pull-right delete-recipe-item"
    type="submit">
    <i class="glyphicon glyphicon-remove"></i></button>
  {{ Form::close() }}
  {{ $step->instructions }}
</li>