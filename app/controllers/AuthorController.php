<?php

class AuthorController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$data = array();
    $authors = Author::get();
    $data['authors'] = $authors;
    return View::make('author.index', $data);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('author.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$author = new Author;
    $author->name = Input::get('name');

    $success = $author->save();

    if ($success) {
    	return Redirect::route('author.index')
		    ->with('message',
		      StatusMessage::success('Author created!'));
    }
    else {
	    return Redirect::route('author.create')
	      ->with('errors', $author->errors());
	  }
	}


}
