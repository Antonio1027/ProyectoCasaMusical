<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;
use CasaMusical\Entities\Provider;

class ProvidersTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			Provider::create([
				'name'=>$faker->company,
				'home'=>$faker->address,
				'phone'=>$faker->phoneNumber,
				'description'=>$faker->sentence($nbWords = 4),
				'delivery_time'=> 4
			]);
		}
	}

}