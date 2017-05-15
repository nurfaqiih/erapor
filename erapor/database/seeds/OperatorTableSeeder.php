<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;


class OperatorTableSeeder extends Seeder {

    public function run()
    {
        $time = Carbon::now();
        $user = [
            'username'  => 'operator',
            'password'  => bcrypt('operator'),
            'email'     => 'satria.coc@gmail.com',
            'role'      => 2,
            'name'      => 'Operator',
            'thumbnail' => '/profiles/default.jpg',
            'created_at'=> $time,
            'updated_at' => $time
        ];

        \App\User::insert($user);
    }
}
