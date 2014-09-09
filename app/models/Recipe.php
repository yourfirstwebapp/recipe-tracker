<?php

class Recipe extends Eloquent {

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

  // Called when a new model is created
  public static function boot()
  {
    parent::boot();

    // Setup event bindings...
    Recipe::observe(new RecipeObserver);
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

class RecipeObserver {

  public function saving($recipe)
  {
    // If prep & cook times are set in hours & minutes,
    // before saving the recipe entry...

    if (isset($recipe->time_prep_hours)
      && isset($recipe->time_prep_minutes)) {
      // 1. Convert them to the HH:MM:SS that
      //    the database recognizes
      $recipe->time_prep =
        $recipe->time_prep_hours . ':' .
        $recipe->time_prep_minutes . ':00';

      // 2. Clear out the hours and minutes values
      //    (as they don't exist in the database)
      unset($recipe->time_prep_hours);
      unset($recipe->time_prep_minutes);
    }

    // Do the same for cook time
    if (isset($recipe->time_cook_hours)
      && isset($recipe->time_cook_minutes)) {
      $recipe->time_cook =
        $recipe->time_cook_hours . ':' .
        $recipe->time_cook_minutes . ':00';
      unset($recipe->time_cook_hours);
      unset($recipe->time_cook_minutes);
    }
  }

}