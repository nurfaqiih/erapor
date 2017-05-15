<?php

use App\Section;
use App\Student;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class SectionsTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create();
        $seksi = [];
        $time = Carbon\Carbon::now();
        $teacher = \App\Teacher::lists('id');
        $rombel = \App\Rombel::lists('id');
        foreach (range(1, 100) as $index)
        {
            $seksi[] = [
                'kode'       => $faker->phoneNumber,
                'year'       => $faker->randomElement(['2013/2014', '2014/2015']),
                'teacher_id' => $faker->randomElement($teacher),
                'rombel_id'  => $faker->randomElement($rombel),
                'created_at' => $time,
                'updated_at' => $time
            ];
        }
        Section::insert($seksi);

    }
}
