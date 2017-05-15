<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

/**
 * Class DatabaseSeeder
 */
class DatabaseSeeder extends Seeder {

    /**
     * @var array
     */
    protected $tables = [
        'users',
        'rombel_student',
        'rombels',
        'teachers',
        'students',
        'courses',
        'kelas',
        'sections',

    ];

    /**
     * @var array
     */
    protected $seeders = [
        'UsersTableSeeder',
        'CoursesTableSeeder',
        'StudentsTableSeeder',
        'TeachersTableSeeder',
        'KelasTableSeeder',
        'AdminTableSeeder',
        'OperatorTableSeeder',
        'KepalaTableSeeder',
    ];
    /**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		$this->cleanDatabase();

        foreach ($this->seeders as $seeder)
        {
            $this->call($seeder);
        }
	}

    private function cleanDatabase()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        foreach ($this->tables as $table)
        {
            DB::table($table)->truncate();
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }

}
