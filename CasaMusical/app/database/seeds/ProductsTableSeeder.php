<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;
use CasaMusical\Entities\Product;
use CasaMusical\Entities\Sale;

class ProductsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 50) as $index)
		{
			$producto = Product::create([
				'product' => $faker->name,
				'model' => $faker->name,
				'price_iva' => $faker->numberBetween($min = 10,$max = 2000),
				'gain' => $faker->numberBetween($min = 10,$max = 2000),
				'price' => $faker->numberBetween($min = 10,$max = 2000),
				'reserve' => $faker->numberBetween($min = 10,$max = 100),
				'status' => $faker->randomElement(['r','pr'])
			]);
			Sale::create([
				'product' => $producto->product,
				'model' => $producto->model,
				'price' => $producto->price,
				'quantity' => $faker->numberBetween($min = 1,$max = 10),
				'total' => $faker->numberBetween($min = 10,$max = 2000)
			]);
		}
	}

}