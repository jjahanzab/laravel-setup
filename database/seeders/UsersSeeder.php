<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'username'=>'Admin',
                'email'=>'admin@gmail.com',
                'role_id'=>'1',
                'password'=> bcrypt('123456'),
            ],
            [
                'username'=>'User',
                'email'=>'user@gmail.com',
                'role_id'=>'2',
                'password'=> bcrypt('123456'),
            ],
        ];
  
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}

   

