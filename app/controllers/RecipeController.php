<?php

class RecipeController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$data = array();
    $recipes = Recipe::recent()->get();
    $recipes->load('author');
    $data['recipes'] = $recipes;
    return View::make('recipe.index', $data);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$data = array();
		$data['authors'] = ['' => ''] + Author::lists('name', 'id');
		return View::make('recipe.create', $data);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// Create a new recipe using the
		// user-submitted input data
		$recipe = new Recipe;
		$recipe->name = Input::get('name');
		$recipe->author_id = Input::get('author_id');
		$recipe->servings = Input::get('servings');
		$recipe->time_prep_hours = Input::get('time_prep_hours');
		$recipe->time_prep_minutes = Input::get('time_prep_minutes');
		$recipe->time_cook_hours = Input::get('time_cook_hours');
		$recipe->time_cook_minutes = Input::get('time_cook_minutes');

		// Save the recipe entry into the database
		// - will return false if the the model is invalid
		$success = $recipe->save();

		// Take the proper course of action based on
		// whether or not the recipe was created successfully
		if ($success) {
			// Redirect back to index after creating
			// and display success message
			return Redirect::route('recipe.index')
				->with('message', Alert::success('Recipe created!'));
		}
		else {
			// Redirect back to the create page
			// and display the error messages
			return Redirect::route('recipe.create')
				->with('errors', $recipe->errors());
		}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$recipe = Recipe::findOrFail($id);
		$recipe->load('author', 'ingredients', 'steps');

		$data = array();
		$data['recipe'] = $recipe;
		return View::make('recipe.show', $data);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		if (Input::hasFile('image')) {
			// Get the recipe from the database
			$recipe = Recipe::find($id);

			// Set the image, and check if it's valid
			$recipe->image = Input::file('image');
			$success = $recipe->save();

			// Redirect and show the appropriate message
			if ($success) {
				return Redirect::route('recipe.show', array('id' => $id))
					->with('message', Alert::success('Recipe image updated.'));
			}
			else {
				return Redirect::route('recipe.show', array('id' => $id))
					->with('errors', $recipe->errors());
			}
		}

		// Noting to update...
		// just go back to the recipe's page
		return Redirect::route('recipe.show', array('id' => $id));
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}