<?php

class Recipe extends Eloquent {

  protected $table = 'recipes';

  public function author()
  {
    return $this->belongsTo('Author');
  }

  public function ingredients()
  {
    return $this->hasMany('Ingredient');
  }

  public function steps()
  {
    return $this->hasMany('Steps');
  }

}