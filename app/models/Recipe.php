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
    'image' => 'image',
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

  // Run before a save is made to a database entry
  public function beforeSave() {
    // If there's a new image, move it to
    // the designated folder
    if ($this->isDirty('image')) {
      // Set the destination to our public/uploads folder
      // and name to the following format:
      // [id]_[timestamp].[extension]
      $destinationFolder = 'uploads';
      $destinationPath = public_path() . '/' . $destinationFolder;
      $fileName = $this->id . '_' . time() . '.' . $this->image->getClientOriginalExtension();

      // Upload the file and move it to the uploads folder
      $this->image->move($destinationPath, $fileName);

      // Set the new image file's path
      $newPath = $destinationFolder . '/' . $fileName;

      // Update the recipe's database entry
      $this->image = $newPath;
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
    $this->time_prep_hours = Input::get('time_prep_hours');
    $this->time_prep_minutes = Input::get('time_prep_minutes');
    $this->time_cook_hours = Input::get('time_cook_hours');
    $this->time_cook_minutes = Input::get('time_cook_minutes');
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
