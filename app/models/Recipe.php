<?php

class Recipe extends Ardent {

  //
  // Basic:

  // Database table name
  protected $table = 'recipes';

  // Validation rules
  public static $rules = array(
    'name' => 'required',
    'author_id' => 'required',
    'servings' => 'required',
    'time_prep' => 'required',
    'time_cook' => 'required',
    'image' => 'image',
  );
  public static $customMessages = array(
    'author_id.required' => 'The author field is required.',
  );


  // //
  // // Hooks:

  // // Delete a recipe's related items
  // // (i.e. ingredients and steps), before deleting
  // // the recipe itself
  // public function beforeDelete() {
  //   $this->ingredients()->delete();
  //   $this->steps()->delete();
  // }


  //
  // Scopes:

  // Retrieve newest recipes first
  public function scopeRecent($query)
  {
    return $query->orderBy('created_at', 'desc');
  }

  //
  // Relationships:

  public function author()
  {
    return $this->belongsTo('Author');
  }

  public function ingredients()
  {
    return $this->hasMany('Ingredient')
      ->orderBy('order');
  }

  public function steps()
  {
    return $this->hasMany('Step')
      ->orderBy('order');
  }


  //
  // Accessors:

  public function getTimePrepDisplayAttribute()
  {
    $display_time = $this->getDisplayTime( $this->time_prep );
    return $display_time;
  }

  public function getTimeCookDisplayAttribute()
  {
    $display_time = $this->getDisplayTime( $this->time_cook );
    return $display_time;
  }

  public function getTimePrepHoursAttribute()
  {
    return date('G', strtotime($this->time_prep));
  }

  public function getTimePrepMinutesAttribute()
  {
    return date('i', strtotime($this->time_prep));
  }

  public function getTimeCookHoursAttribute()
  {
    return date('G', strtotime($this->time_cook));
  }

  public function getTimeCookMinutesAttribute()
  {
    return date('i', strtotime($this->time_cook));
  }


  //
  // Utility:

  public function setInputData() {
    $this->name = Input::get('name');
    $this->author_id = Input::get('author_id');
    $this->servings = Input::get('servings');
    $this->time_prep =
      Input::get('time_prep_hours')           // HH
      . ':' . Input::get('time_prep_minutes') // :MM
      . ':00';                                // :SS
    $this->time_cook =
      Input::get('time_cook_hours')           // HH
      . ':' . Input::get('time_cook_minutes') // :MM
      . ':00';                                // :SS
  }


  //
  // Private:

  private function getDisplayTime($time) {
    $display_time = '';

    if (!empty($time)) {
      $timestamp = strtotime($time);

      if (date('G', $timestamp) > 0) {
        $display_time .= date('G', $timestamp) . ' hrs ';
      }
      if (date('i', $timestamp) > 0) {
        $display_time .= intval(date('i', $timestamp)) . ' mins';
      }

    }

    return $display_time;
  }

}
