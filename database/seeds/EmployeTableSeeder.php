<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Employe;

class EmployeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $nb = ['B','BE','BEC'];
        foreach(range(1, 200) as $index)
        {
            Employe::create([
                'email' => $faker->email,
                'password' => Hash::make("password"),
                'firstname' => $faker->firstName,
                'lastname' => $faker->lastName,
                'birth' => $faker->date('Y-m-d', '- 18 years'),
                'bsn' => $faker->numberBetween(100000000, 9999999999),
                'phone' => $faker->phoneNumber ,
                'license' => $faker->randomElement($nb),
                'isAdmin' => false,
                'isActive' => true
            ]);
        }
    }
}
