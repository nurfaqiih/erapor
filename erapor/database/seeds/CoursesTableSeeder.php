<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class CoursesTableSeeder extends Seeder {

    public function run()
    {
        $time = Carbon\Carbon::now();
        $course = [
            [
                'kode'       => 'A001',
                'name'       => 'Pendidikan Agama dan Budi Pekerti',
                'type'       => 'Kelompok A (wajib)',
                'created_at' => $time,
                'updated_at' => $time
            ],
            [   
                'kode'       => 'A002',
                'name'       => 'Pendidikan Pancasila dan Kewarganegaraan',
                'type'       => 'Kelompok A (wajib)',
                'created_at' => $time,
                'updated_at' => $time
            ],    
            [
                'kode'       => 'A003',
                'name'       => 'Bahasa Indonesia',
                'type'       => 'Kelompok A (wajib)',
                'created_at' => $time,
                'updated_at' => $time
            ],
            [
                'kode'       => 'A004',
                'name'       => 'Matematika',
                'type'       => 'Kelompok A (wajib)',
                'created_at' => $time,
                'updated_at' => $time
            ],
            [
                'kode'       => 'A005',
                'name'       => 'Sejarah Indonesia',
                'type'       => 'Kelompok A (wajib)',
                'created_at' => $time,
                'updated_at' => $time
            ],
            [
                'kode'       => 'A006',
                'name'       => 'Bahasa Inggris',
                'type'       => 'Kelompok A (wajib)',
                'created_at' => $time,
                'updated_at' => $time
            ],
            [
                'kode'       => 'B001',
                'name'       => 'Seni Budaya',
                'type'       => 'Kelompok B (wajib)',
                'created_at' => $time,
                'updated_at' => $time
            ],
            [
                'kode'       => 'B002',
                'name'       => 'Pendidikan Jasmani, Olah Raga dan Kesehatan',
                'type'       => 'Kelompok B (wajib)',
                'created_at' => $time,
                'updated_at' => $time
            ],
            [
                'kode'       => 'B003',
                'name'       => 'Prakarya dan Kewirausahaan',
                'type'       => 'Kelompok B (wajib)',
                'created_at' => $time,
                'updated_at' => $time
            ],
            [
                'kode'       => 'C011',
                'name'       => 'Biologi',
                'type'       => 'Kelompok C (peminatan)',
                'created_at' => $time,
                'updated_at' => $time
            ],
            [
                'kode'       => 'C012',
                'name'       => 'Fisika',
                'type'       => 'Kelompok C (peminatan)',
                'created_at' => $time,
                'updated_at' => $time
            ],
            [
                'kode'       => 'C013',
                'name'       => 'Kimia',
                'type'       => 'Kelompok C (peminatan)',
                'created_at' => $time,
                'updated_at' => $time
            ],
            [
                'kode'       => 'C021',
                'name'       => 'Geografi',
                'type'       => 'Kelompok C (peminatan)',
                'created_at' => $time,
                'updated_at' => $time
            ],
            [
                'kode'       => 'C022',
                'name'       => 'Sosiologi',
                'type'       => 'Kelompok C (peminatan)',
                'created_at' => $time,
                'updated_at' => $time
            ],
            [
                'kode'       => 'C023',
                'name'       => 'Ekonomi',
                'type'       => 'Kelompok C (peminatan)',
                'created_at' => $time,
                'updated_at' => $time
            ],
        ];
        \App\Course::insert($course);
    }
}
