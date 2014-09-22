<li class="list-group-item">
  {{ Form::open(array(
    'route' => array('ingredient.destroy', $ingredient->id),
    'method' => 'delete',
    'class' => 'delete-recipe-item-form',
    )) }}
  <button
    class="btn btn-danger btn-xs pull-right delete-recipe-item"
    type="submit">
    <i class="glyphicon glyphicon-remove"></i></button>
  {{ Form::close() }}
  {{ $ingredient->amount
    . ' ' . $ingredient->unit
    . ' ' . $ingredient->name }}
</li>