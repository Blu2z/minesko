<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\EmployeCalendar;
use App\Employe;

class EmployeCalendarTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $userIds = Employe::lists('id');

        foreach(range(1, 500) as $index)
        {
            EmployeCalendar::create([
                'singleDate' => date_format($faker->dateTimeThisYear('+ 150 days'), 'Y-m-d'),
                'user_id' => $faker->randomElement($userIds->toArray())
            ]);
        }
    }
}
