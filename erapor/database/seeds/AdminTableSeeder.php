<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder {

    public function run()
    {
    	$time = Carbon::now();
        $user = [
            'username'  => 'admin',
            'password'  => bcrypt('admin'),
            'email'     => 'satria.unp@gmail.com',
            'role'      => 1,
            'name'      => 'Administrator',
            'thumbnail' => '/profiles/default.jpg',
            'created_at'=> $time,
            'updated_at' => $time
        ];

        \App\User::insert($user);
    }
}
