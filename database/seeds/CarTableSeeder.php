<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use \App\Car;

class CarTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        $car = factory(\App\Car::class)->make();
//        dd($car);
//        $faker = \Faker\Factory::create();
        
//        $carIds = \App\Car::lists('id');
//        $employeIds = \App\Employe::lists('id');

        $faker = Faker::create();

        foreach(range(1, 20) as $index)
        {
            Car::create([
                'date_add' => date_format($faker->dateTimeThisYear('now'), 'Y-m-d'),
                'isActive' => 1,
                'brand' => str_random(25),
                'car_type' => str_random(8),
                'license_plate' => str_random(8)
            ]);
        }
    }
}
