<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class RombelStudentTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create();
        $rombel = \App\Rombel::lists('id');
        $student = \App\Student::lists('id');

        foreach (range(1, 400) as $index)
        {
            \App\Rombel::find($faker->randomElement($rombel))
                ->student()->attach($faker->randomElement($student), [
                    'year' => $faker->randomElement(['2013/2014', '2014/2015'])
                ]);
        }

    }
}
