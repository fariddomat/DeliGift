<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=User::create([
            'name'=>'Super Admin',
            'email'=>'admin@deligift.com',
            'password'=>bcrypt('admin'),
        ]);
        $user->attachRole('admin');

        $user2=User::create([
            'name'=>'Rep',
            'email'=>'rep@deligift.com',
            'password'=>bcrypt('rep'),
        ]);
        $user2->attachRole('representative');

        $user3=User::create([
            'name'=>'User',
            'email'=>'user@deligift.com',
            'password'=>bcrypt('user'),
        ]);
        $user3->attachRole('user');

    }
}
