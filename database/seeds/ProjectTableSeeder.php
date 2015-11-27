<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use App\Project;

class ProjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach(range(1, 50) as $index)
        {
            $endDate = date_format($faker->dateTimeThisYear('+ 150 days'), 'Y-m-d');
            $startDate = date_format($faker->dateTimeThisYear($endDate), 'Y-m-d');

            Project::create([
                'title' =>str_random(25),
                'startDate' => $startDate,
                'endDate' => $endDate,
                'mandagen' => $faker->numberBetween(0, 150),
                'user_id' => 3,
                'postal' => $faker->numberBetween(0, 999999),
                'city' => str_random(64),
                'street' => str_random(64),
                'description' => str_random(64),
                'length' => $faker->numberBetween(0, 9999),
                'area' => $faker->numberBetween(0, 99999),
                'project_type' => str_random(64),
                'color' => $faker->numberBetween(0, 999999),
                'logo' => str_random(64),
            ]);
        }
    }
}
