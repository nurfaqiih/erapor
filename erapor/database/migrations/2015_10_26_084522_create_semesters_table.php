<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSemestersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('semesters', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('rombel_id');
			$table->integer('student_id');
			$table->integer('semester');
			$table->string('year');
			$table->integer('alfa');
			$table->integer('izin');
			$table->integer('sakit');
			$table->string('pramuka');
			$table->string('uks');
			$table->string('desc');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('semesters');
	}

}
