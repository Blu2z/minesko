<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\CarProject;
use App\Project;
use App\Car;

class CarProjectTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        $carIds = Car::lists('id');
        $projectIds = Project::lists('id');

        foreach(range(1, 500) as $index)
        {
            $project_id = $faker->randomElement($projectIds->toArray());
            $project = Project::find($project_id);
            $start = $project->startDate;
            $end = $project->endDate;
            
            CarProject::create([
                'singleDate' => date_format($faker->dateTimeBetween($start, $end), 'Y-m-d'),
                'project_id'  => $project_id,
                'car_id' => $faker->randomElement($carIds->toArray()),
            ]);
        }
    }
}
