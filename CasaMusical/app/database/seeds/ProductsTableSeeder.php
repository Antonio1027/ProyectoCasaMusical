<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;
use CasaMusical\Entities\Product;

class ProductsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 50) as $index)
		{
			Product::create([
				'product' => $faker->name,
				'model' => $faker->name,
				'price' => $faker->numberBetween($min = 10,$max = 2000),
				'gain' => $faker->numberBetween($min = 10,$max = 2000),
				'reserve' => $faker->numberBetween($min = 10,$max = 100),
				'status' => $faker->randomElement(['r','pr'])
			]);
		}
	}

}