<?php

class PageController extends BaseController {

  function getIndex() {
    return View::make('page.index');
  }

}