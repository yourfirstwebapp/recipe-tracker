<?php

class Author extends Ardent {

  protected $table = 'authors';

  public static $rules = array(
    'name' => 'required',
  );

}