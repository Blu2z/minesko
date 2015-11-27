<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\EmployeProject;
use App\Project;
use App\Employe;

class EmployeProjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $employeIds = Employe::lists('id');
        $projectIds = Project::lists('id');

        foreach(range(1, 500) as $index)
        {
            $project_id = $faker->randomElement($projectIds->toArray());
            $project = Project::find($project_id);
            $start = $project->startDate;
            $end = $project->endDate;
            
            EmployeProject::create([
                'singleDate' => date_format($faker->dateTimeBetween($start, $end), 'Y-m-d'),
                'project_id'  => $project_id,
                'user_id' => $faker->randomElement($employeIds->toArray()),
            ]);
        }
    }
}
