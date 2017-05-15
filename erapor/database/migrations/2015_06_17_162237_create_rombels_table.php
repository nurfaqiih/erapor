<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRombelsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('rombels', function(Blueprint $table)
		{
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('kode');
            $table->string('name');
            $table->string('year');
			$table->timestamps();

            $table->integer('kelas_id')->unsigned()->index();
            $table->foreign('kelas_id')->references('id')->on('kelas');

            $table->integer('teacher_id')->unsigned()->index();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('rombels');
	}

}
