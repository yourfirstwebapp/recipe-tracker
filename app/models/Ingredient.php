<?php

class Ingredient extends Ardent {

  // Database table name
  protected $table = 'ingredients';

  // Fields allowed to be mass-assigned
  protected $fillable = array(
    'recipe_id',
    'name',
    'amount',
    'unit',
    'order',
  );

  // Validation rules
  public static $rules = array(
    'recipe_id' => 'required',
    'name' => 'required',
    'amount' => 'required',
    'unit' => 'required',
    'order' => 'integer',
  );

}