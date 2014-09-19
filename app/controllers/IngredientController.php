<?php

class IngredientController extends \BaseController {

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$recipe_id = Input::get('recipe_id');

		$ingredient = new Ingredient;
		$ingredient->recipe_id = $recipe_id;
		$ingredient->name = Input::get('name');
		$ingredient->amount = Input::get('amount');
		$ingredient->unit = Input::get('unit');
		$ingredient->order = Input::get('order');

		$success = $ingredient->save();

		// Set the proper response data, based on
		// whether or not the ingredient was added
		$response = array();
		if ($success) {
			// Generate the ingredient's HTML from our partial view
			$ingredient_html = View::make('recipe.partials.ingredient',
    		array('ingredient' => $ingredient))
				->render();

			// Return a "success" status and the ingredient's HTML
	    $response = array(
	      'status' => 'success',
	      'item' => $ingredient_html
	    );
		}
		else {
			// Generate the errors' HTML from our partial view
			$errors_html = View::make('partials.errors',
				array('errors' => $ingredient->errors()))
				->render();

			// Return the error messages
			$response = array(
	      'status' => 'fail',
	      'errors' => $errors_html
	    );
		}

		// Return the JSON response
		return Response::json($response);
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
