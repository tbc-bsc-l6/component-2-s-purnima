<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class MakeUsersSeeder extends Seeder
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
                'name'=>'Admin',
                'email'=>'purnima@admin.com',
                'is_admin'=>'1',
                'password'=> bcrypt('admin1234'),
            ],

            [
                'name'=>'User',
                'email'=>'purnima@gmail.com',
                'is_admin'=>'0',
                'password'=> bcrypt('user1234'),
            ],

        ];
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }

}
