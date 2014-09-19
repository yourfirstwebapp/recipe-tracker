<?php

class StepController extends \BaseController {

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$recipe_id = Input::get('recipe_id');

		$step = new Step;
		$step->recipe_id = $recipe_id;
		$step->instructions = Input::get('instructions');
		$step->order = Input::get('order');

		$success = $step->save();

		$response = array();
		if ($success) {
			$step_html = View::make('recipe.partials.step',
    		array('step' => $step))
				->render();
			$response = array(
	      'status' => 'success',
	      'item' => $step_html
	    );
		}
		else {
			$errors_html = View::make('partials.errors',
				array('errors' => $step->errors()))
				->render();
			$response = array(
	      'status' => 'fail',
	      'errors' => $errors_html
	    );
		}

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
