<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class RombelTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $rombel = [];
        $kelas_id = \App\Kelas::lists('id');
        $time = \Carbon\Carbon::now();
        foreach (range(1, 300) as $index)
        {
            $id = $faker->randomElement($kelas_id);
            $kelas = \App\Kelas::find($id);
            $rombel[] = [
                'name' => $kelas->tingkat.' '.$kelas->jurusan.' '.$kelas->no,
                'year' => $faker->randomElement(['2013/2014', '2014/2015']),
                'kelas_id' => $id,
                'created_at' => $time,
                'updated_at' => $time
            ];
        }

        \App\Rombel::insert($rombel);

    }
}
