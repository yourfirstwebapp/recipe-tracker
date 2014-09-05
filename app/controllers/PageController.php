<?php

class PageController extends BaseController {

  function index() {
    return View::make('page.index');
  }

  function about() {
    return View::make('page.about');
  }

  function contact() {
    return View::make('page.contact');
  }

}