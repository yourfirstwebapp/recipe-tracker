<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecipesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('recipes', function($table)
		{
			$table->increments('id');
			$table->integer('author_id')->unsigned();
			$table->string('name');
			$table->string('image');
			$table->integer('servings');
			$table->time('time_prep');
			$table->time('time_cook');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('recipes');
	}

}