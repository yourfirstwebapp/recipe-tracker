<?php

class RecipeTableSeeder extends Seeder {

    public function run()
    {
      // Faker: to create fake data
      $faker = Faker\Factory::create();

      // Delete all ingredients, steps, recipes, authors,
      // in that order, due to relationship dependencies
      DB::table('ingredients')->delete();
      DB::table('steps')->delete();
      DB::table('recipes')->delete();
      DB::table('authors')->delete();

      // Create new author,
      // to be referenced by recipes below
      $author_id = DB::table('authors')->insertGetId(array(
        'name' => $faker->name
        ));

      // Create 3 recipes
      $num_to_create = 3;
      for ($i = 0; $i < $num_to_create; $i++) {
        $recipe_id = DB::table('recipes')->insertGetId(array(
          'name' => $faker->text(20),
          'image' => str_replace('public/', '',
            $faker->image('public/uploads', 1200, 300)),
          'author_id' => $author_id,
          'servings' => $faker->randomDigitNotNull,
          'time_prep' => $faker->time,
          'time_cook' => $faker->time,
          ));

        // Create 3 ingredients and 3 steps
        // for the newly-created recipe
        for ($y = 0; $y < $num_to_create; $y++) {
          DB::table('ingredients')->insert(array(
            'recipe_id' => $recipe_id,
            'name' => $faker->word,
            'amount' => $faker->randomDigitNotNull,
            'unit' => $faker->word,
            'order' => ($y + 1),
            ));
          DB::table('steps')->insert(array(
            'recipe_id' => $recipe_id,
            'instructions' => $faker->sentence,
            'order' => ($y + 1),
            ));
        }
      }
    }

}