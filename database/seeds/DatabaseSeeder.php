<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(CarTableSeeder::class);
        $this->call(EmployeTableSeeder::class);
        $this->call(ProjectTableSeeder::class);
        $this->call(CarCalendarTableSeeder::class);
        $this->call(EmployeCalendarTableSeeder::class);
        $this->call(CarProjectTableSeeder::class);
        $this->call(EmployeProjectTableSeeder::class);

        Model::reguard();
    }
}
