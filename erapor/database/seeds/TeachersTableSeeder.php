<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class TeachersTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create();
        $teacher = [];
        $time = Carbon\Carbon::now();
        $course_id = \App\Course::lists('id');
        
        $guru = [            
            ['nama'=>'Yasmina','gender'=>'2'],
            ['nama'=>'Fitriyenti','gender'=>'2'],
            ['nama'=>'Wahyuni Hamdi','gender'=>'2'],
            ['nama'=>'Rodiah','gender'=>'2'],
            ['nama'=>'Edi Syarif','gender'=>'1'],
            ['nama'=>'Riza Nofita','gender'=>'2'],
            ['nama'=>'Daswita','gender'=>'2'],
            ['nama'=>'Nevia Limbetriza','gender'=>'2'],
            ['nama'=>'Candra','gender'=>'1'],
            ['nama'=>'Yanti Darmi','gender'=>'2'],
            ['nama'=>'Welismaini','gender'=>'2'],
            ['nama'=>'Effiananda','gender'=>'2'],
            ['nama'=>'Siti Aminah','gender'=>'2'],
            ['nama'=>'Sri Rizani','gender'=>'2'],
            ['nama'=>'Zekriani','gender'=>'2'],
            ['nama'=>'Lusi Marlice','gender'=>'2'],
            ['nama'=>'Feri Herawati','gender'=>'2'],
            ['nama'=>'Busyra Ilyas','gender'=>'2'],
            ['nama'=>'Titin Suhartini','gender'=>'2'],
            ['nama'=>'Mawardi','gender'=>'1'],
            ['nama'=>'Masri','gender'=>'1'],
            ['nama'=>'Tuti Alawiyah','gender'=>'2'],
            ['nama'=>'Yulidarman','gender'=>'1'],
            ['nama'=>'Rusniarti. R','gender'=>'2'],
            ['nama'=>'Zailan Syarhani','gender'=>'2'],
            ['nama'=>'Nurjanah','gender'=>'2'],
            ['nama'=>'Aniswanti','gender'=>'2'],
            ['nama'=>'Novita','gender'=>'2'],
            ['nama'=>'Afrienituti','gender'=>'2'],
            ['nama'=>'Beti Zahara','gender'=>'2'],
            ['nama'=>'Nurhaida','gender'=>'2'],
            ['nama'=>'Azwarman','gender'=>'1'],
            ['nama'=>'Syofiarni Yasin','gender'=>'2'],
            ['nama'=>'Asrizal. B','gender'=>'1'],
            ['nama'=>'Yendri Faizal','gender'=>'1'],
            ['nama'=>'Zulfarida','gender'=>'2'],
            ['nama'=>'Anidarlis','gender'=>'2'],
            ['nama'=>'Gusti Harwita','gender'=>'2'],
            ['nama'=>'Ade Afrina','gender'=>'2'],
            ['nama'=>'Fitrianis','gender'=>'2'],
            ['nama'=>'Suswita Anggraini','gender'=>'2'],
            ['nama'=>'Arselen','gender'=>'1'],
            ['nama'=>'Endiamon','gender'=>'2'],
            ['nama'=>'Desmawati','gender'=>'2'],
            ['nama'=>'Zulfaneli','gender'=>'2'],
            ['nama'=>'Sri Indrawati Prihatin Ningsih','gender'=>'2'],
            ['nama'=>'Asnitati','gender'=>'2'],
            ['nama'=>'Fauzi Thalib','gender'=>'1'],
            ['nama'=>'Azharman','gender'=>'1'],
            ['nama'=>'Lasmiati','gender'=>'2'],
            ['nama'=>'Juniar','gender'=>'2'],
            ['nama'=>'Yundriani','gender'=>'2'],
            ['nama'=>'Seprah Madeni','gender'=>'2'],
            ['nama'=>'Azdiwandi','gender'=>'1'],
            ['nama'=>'Darneti','gender'=>'2'],
            ['nama'=>'Rasmini. R','gender'=>'2'],
            ['nama'=>'Jelta Masril','gender'=>'1'],
            ['nama'=>'Anidar','gender'=>'2'],
            ['nama'=>'M. Zainal','gender'=>'1'],
            ['nama'=>'Erdawati','gender'=>'2'],
            ['nama'=>'Marshal Zen','gender'=>'1'],
            ['nama'=>'Ermina','gender'=>'2'],
            ['nama'=>'Netridawati','gender'=>'2'],
            ['nama'=>'Ermawati','gender'=>'2'],
            ['nama'=>'Fitra Deswita','gender'=>'2'],
            ['nama'=>'Ratnawita','gender'=>'2'],
            ['nama'=>'Atmajaleli','gender'=>'2'],
            ['nama'=>'Khairina','gender'=>'2'],
            ['nama'=>'Netti Endo Smitri','gender'=>'2'],
            ['nama'=>'Ria Angrianie','gender'=>'2'],
            ['nama'=>'Desmiwarni','gender'=>'2'],
            ['nama'=>'Melya Kiki Wirianingsih','gender'=>'2'],
            ['nama'=>'Yulismar','gender'=>'2'],
            ['nama'=>'Desi Anggia Murni','gender'=>'2'],
            ['nama'=>'Mardiahayati','gender'=>'2'],
            ['nama'=>'Edrihanif','gender'=>'2'],
            ['nama'=>'Khairani Jaloeis','gender'=>'2'],
            ['nama'=>'Etty Kasyanti','gender'=>'2'],
            ['nama'=>'Jefri Nelwin','gender'=>'1'],
            ['nama'=>'Herman','gender'=>'1'],
        ];


        foreach (range(1, 80) as $index)
        {
            $teacher[] = [
                'name'       => $guru[$index - 1]['nama'],
                'nip'        => $faker->creditCardNumber,
                'birth'      => $faker->date(),
                'birth_place'=> $faker->city,
                'gender'     => $guru[$index - 1]['gender'],
                'user_id'    => $index,
                'course_id'  => $faker->randomElement($course_id),
                'created_at' => $time,
                'updated_at' => $time
            ];
        }


        \App\Teacher::insert($teacher);

    }
}
