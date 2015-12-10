<?php

use Illuminate\Database\Seeder;
use App\User;
use DB;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(!Illuminate\Support\Facades\DB::table('users')->where('email', '=', 'momchev@bigmir.net')->count()){
            User::create([
                'email' => 'momchev@bigmir.net',
                'password' => Hash::make("pretorian"),
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
