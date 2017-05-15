<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('students', function(Blueprint $table)
		{
            $table->engine = 'InnoDB';
		$table->increments('id');
            $table->string('name');
            $table->string('nis');
            $table->date('birth');
            $table->string('birth_place');
            $table->smallInteger('gender');
            $table->string('kelas');
            $table->string('agama');
            $table->string('anak_ke');
            $table->string('address');
            $table->string('telp');
            $table->string('sekolah_asal');
            $table->string('ayah');
            $table->string('ibu');
            $table->string('address_ortu');
            $table->string('telp_ortu');
            $table->string('job_ayah');
            $table->string('job_ibu');
            $table->string('wali');
            $table->string('address_wali');
            $table->string('telp_wali');
            $table->string('job_wali');
            $table->smallInteger('bp');
			$table->timestamps();

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('students');
	}

}
