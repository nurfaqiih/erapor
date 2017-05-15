<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;


class KepalaTableSeeder extends Seeder
{
    public function run()
    {
        $time = Carbon::now();
        $user = [
            'username'  => 'kepala',
            'password'  => bcrypt('kepala'),
            'email'     => 'satria.kepala@gmail.com',
            'role'      => 3,
            'name'      => 'Drs. JELTA MASRIL, M.M',
            'thumbnail' => '/profiles/default.jpg',
            'created_at'=> $time,
            'updated_at' => $time            
        ];

        \App\User::insert($user);

        \DB::table('kalenders')->insert([
            'semester' => 0
        ]);
    }
}
