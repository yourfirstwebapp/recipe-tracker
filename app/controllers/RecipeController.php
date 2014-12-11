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
    $recipe->setInputData();

    // Save the recipe entry into the database
    $success = $recipe->save();

    if ($success) {
    	return Redirect::route('recipe.index')
		    ->with('message',
		      StatusMessage::success('Recipe created!'));
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
		$recipe = Recipe::findOrFail($id);

		$data = array();
		$data['recipe'] = $recipe;
		$data['authors'] = ['' => ''] + Author::lists('name', 'id');
		return View::make('recipe.edit', $data);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id) {
		$recipe = Recipe::findOrFail($id);
    $recipe->setInputData();

		// Unset the recipe's image to bypass validation
	  unset($recipe->image);

		$success = $recipe->save();

		if ($success) {
			return Redirect::route('recipe.show', $id)
				->with('message', StatusMessage::success('Recipe updated!'));
		}
		else {
			return Redirect::route('recipe.edit', $id)
				->with('errors', $recipe->errors());
		}
	}

	/**
	 * Update the specified recipe's image in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function updateImage($id)
	{
		if (Input::hasFile('image'))
    {
      // Retrieve the recipe
      $recipe = Recipe::find($id);

      // Set the image
      $recipe->image = Input::file('image');

      // Validate the recipe to make sure the file is an image
      if ( $recipe->validate() ) {
        // Move the file and save the recipe
        $uploadsPath = $recipe->image->move('uploads');
        $recipe->image = $uploadsPath;
        $recipe->save();

        return Redirect::route('recipe.show', array('id' => $id))
          ->with('message', StatusMessage::success('Recipe image updated.'));
      }
      else {
        return Redirect::route('recipe.show', array('id' => $id))
          ->with('errors', $recipe->errors());
      }
    }

    // Go back to the recipe's page and show an error
    return Redirect::route('recipe.show', array('id' => $id))
      ->with('message', StatusMessage::danger('Please select an image file.'));
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$recipe = Recipe::findOrFail($id);
		$recipe->delete();
		return Redirect::route('recipe.index')
			->with('message', StatusMessage::info('Recipe deleted.'));
	}


}