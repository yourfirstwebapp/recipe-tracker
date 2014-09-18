<?php

class Recipe extends Ardent {

  //
  // Basic:

  // Database table name
  protected $table = 'recipes';

  // Fields allowed to be mass-assigned
  protected $fillable = array(
    'author_id',
    'name',
    'image',
    'servings',
    'time_prep',
    'time_cook',
  );

  // Validation rules
  public static $rules = array(
    'name' => 'required',
    'author_id' => 'required',
    'servings' => 'required',
    'time_prep' => 'required',
    'time_cook' => 'required',
  );
  public static $customMessages = array(
    'author_id.required' => 'The author field is required.',
  );


  //
  // Hooks:

  // (used to be prepareData)
  public function beforeValidate() {
    // If prep & cook times are set in hours & minutes,
    // before saving the recipe entry...

    if (isset($this->time_prep_hours)
      && isset($this->time_prep_minutes)) {
      // 1. Convert them to the HH:MM:SS that
      //    the database recognizes
      $this->time_prep =
        $this->time_prep_hours . ':' .
        $this->time_prep_minutes . ':00';

      // 2. Clear out the hours and minutes values
      //    (as they don't exist in the database)
      unset($this->time_prep_hours);
      unset($this->time_prep_minutes);
    }

    // Do the same for cook time
    if (isset($this->time_cook_hours)
      && isset($this->time_cook_minutes)) {
      $this->time_cook =
        $this->time_cook_hours . ':' .
        $this->time_cook_minutes . ':00';
      unset($this->time_cook_hours);
      unset($this->time_cook_minutes);
    }
  }

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
    return $this->hasMany('Ingredient');
  }

  public function steps()
  {
    return $this->hasMany('Steps');
  }

}
