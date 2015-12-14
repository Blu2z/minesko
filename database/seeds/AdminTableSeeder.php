<?php

use Illuminate\Database\Seeder;
use App\User;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(!Illuminate\Support\Facades\DB::table('users')->where('email', '=', 'Blu2z@yandex.ru')->count()){
            User::create([
                'email' => 'Blu2z@yandex.ru',
                'password' => Hash::make("qweq@"),
                'firstname' => NULL,
                'lastname' => NULL,
                'birth' => NULL,
                'role' => 1,
                'isActive' => true,
                'activationCode' => 'lwibgfasihdgaskndgfv'
            ]);
        }
    }
}
