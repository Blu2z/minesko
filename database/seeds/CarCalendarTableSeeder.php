<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\CarCalendar;
use App\Car;

class CarCalendarTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $carIds = Car::lists('id');
        
        foreach(range(1, 500) as $index)
        {
            $date = date_format($faker->dateTimeThisYear('+ 150 days'), 'Y-m-d');
            CarCalendar::create([
                'singleDate' => $date,
                'car_id' => $faker->randomElement($carIds->toArray())
            ]);
        }
    }
}
