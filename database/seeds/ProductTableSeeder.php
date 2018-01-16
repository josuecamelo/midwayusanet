<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Product;

class ProductTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
//		DB::table('products')->truncate();
		
//		$faker = Faker::create();
		
		foreach (range(1, 100) as $i)
		{
//			$nome = $faker->firstName();
			
//			Product::create([
//				'name' => $nome,
//				'presentation' => $faker->randomDigit . $faker->shuffle('kg', 'g'),
//				'description' => $faker->sentence(),
//				'benefits' => $faker->text(),
//				'link_purchase' => $faker->url,
//				'shopify' => $faker->text(),
//				'excerpt' => $faker->text(),
//				'video' => $faker->url,
//				'tags' => $faker->word . ', ' . $faker->word . ', ' . $faker->word,
//				'image' => $faker->imageUrl($width = 400, $height = 650),
//				'topics' => $faker->sentence() . '|' . $faker->sentence() . '|' . $faker->sentence(),
//				'line_id' => 1,
//				'flavor_id' =>  $faker->randomElement($array = array ('1','2','3')),
//				'type_id' => $faker->randomElement($array = array ('1','2','3')),
//				'highlights_portion' => $faker->sentence() . '|' . $faker->sentence() . '|' . $faker->sentence(),
//				'visibility' => 1,
//				'slug' => strtolower(str_slug($nome)),
//				'serving_size' => $faker->randomDigit . $faker->randomElement($array = array ('g','kg','l')),
//				'complement' => $faker->sentence(),
//				'nutrients' => $faker->word,
//				'nutrient_qty' => $faker->randomDigit,
//				'nutrient_vd' => $faker->randomDigit,
//				'created_at' => $faker->dateTime(),
//				'updated_at' => $faker->dateTime()
//			]);
		}
	}
}
