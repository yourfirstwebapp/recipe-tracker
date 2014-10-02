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
		$ingredient = Ingredient::find($id);
		$ingredient->delete();

		$response = array('status' => 'success');
		return Response::json($response);
	}


	/**
	 * Update order values of multiple items
	 *
	 * @return Response
	 */
	public function updateOrders() {
		// Get the array of item ids
		$ids = Input::get('ids');

		// Keep track of the current order
		$order = 1;
		foreach ($ids as $id) {
			// Update the item with the designated/current order
			Ingredient::where('id', $id)
				->update(array('order' => $order));

			// Increment the order counter
			$order++;
		}

		$response = array(
			'status' => 'success',
			'message' => StatusMessage::success('Updated order saved.')
		);
		return Response::json($response);
	}


}
