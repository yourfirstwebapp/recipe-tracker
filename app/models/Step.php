<?php

class Step extends Ardent {

  // Database table name
  protected $table = 'steps';

  // Fields allowed to be mass-assigned
  protected $fillable = array(
    'recipe_id',
    'instructions',
    'order',
  );

  // Validation rules
  public static $rules = array(
    'recipe_id' => 'required',
    'instructions' => 'required',
    'order' => 'integer',
  );

}