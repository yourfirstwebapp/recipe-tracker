<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRecipeIdFkToStepsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('steps', function(Blueprint $table)
		{
			$table->foreign('recipe_id')->references('id')->on('recipes');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('steps', function(Blueprint $table)
		{
			$table->dropForeign('steps_recipe_id_foreign');
		});
	}

}
