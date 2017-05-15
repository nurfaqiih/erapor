<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class KelasTableSeeder extends Seeder {

    public function run()
    {
        $kelas = [];
        $time = Carbon\Carbon::now();
        foreach (range(1, 2) as $index)
        {
            $tingkat = 'X';
            $jurusan = 'IPA';
            $kelas[] = [
                'tingkat'    => $tingkat,
                'jurusan'    => $jurusan,
                'no' => $index,
                'name' => $tingkat.' '.$jurusan.' '. $index,
                'created_at' => $time,
                'updated_at' => $time
            ];
        }

        foreach (range(1, 2) as $index)
        {
            $tingkat = 'X';
            $jurusan = 'IPS';
            $kelas[] = [
                'tingkat'    => $tingkat,
                'jurusan'    => $jurusan,
                'no' => $index,
                'name' => $tingkat.' '.$jurusan.' '. $index,
                'created_at' => $time,
                'updated_at' => $time
            ];
        }

        foreach (range(1, 2) as $index)
        {
            $tingkat = 'XI';
            $jurusan = 'IPA';
            $kelas[] = [
                'tingkat'    => $tingkat,
                'jurusan'    => $jurusan,
                'no' => $index,
                'name' => $tingkat.' '.$jurusan.' '. $index,
                'created_at' => $time,
                'updated_at' => $time
            ];
        }

        foreach (range(1, 2) as $index)
        {
            $tingkat = 'XI';
            $jurusan = 'IPS';
            $kelas[] = [
                'tingkat'    => $tingkat,
                'jurusan'    => $jurusan,
                'no' => $index,
                'name' => $tingkat.' '.$jurusan.' '. $index,
                'created_at' => $time,
                'updated_at' => $time
            ];
        }

        foreach (range(1, 2) as $index)
        {
            $tingkat = 'XII';
            $jurusan = 'IPA';
            $kelas[] = [
                'tingkat'    => $tingkat,
                'jurusan'    => $jurusan,
                'no' => $index,
                'name' => $tingkat.' '.$jurusan.' '. $index,
                'created_at' => $time,
                'updated_at' => $time
            ];
        }

        foreach (range(1, 2) as $index)
        {
            $tingkat = 'XII';
            $jurusan = 'IPS';
            $kelas[] = [
                'tingkat'    => $tingkat,
                'jurusan'    => $jurusan,
                'no' => $index,
                'name' => $tingkat.' '.$jurusan.' '. $index,
                'created_at' => $time,
                'updated_at' => $time
            ];
        }


        \App\Kelas::insert($kelas);

    }
}
