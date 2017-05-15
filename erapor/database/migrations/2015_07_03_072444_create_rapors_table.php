<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRaporsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('rapors', function(Blueprint $table)
		{
            $table->engine = 'InnoDB';
		$table->increments('id');
            $table->integer('student_id');
            $table->integer('section_id');
            $table->integer('rombel_id');
            $table->text('desc');
            $table->string('year');
            $table->smallInteger('semester');
            $table->integer('course_id');
            $table->string('desc_knowledge')->nullable();
            $table->string('desc_skill')->nullable();
            $table->string('desc_attitude')->nullable();
		$table->timestamps();


            $table->double('score_knowledge')->default(0);
            $table->char('letter_knowledge');
            $table->integer('NH')->default(0);
            $table->integer('UTS')->default(0);
            $table->integer('UAS')->default(0);

            $table->double('score_skill')->default(0);
            $table->char('letter_skill');
            $table->integer('NPr')->default(0);
            $table->integer('NPj')->default(0);
            $table->integer('NPo')->default(0);

            $table->double('score_attitude')->default(0);
            $table->char('letter_attitude');
            $table->integer('NO')->default(0);
            $table->integer('NDs')->default(0);
            $table->integer('NAt')->default(0);
            $table->integer('NJ')->default(0);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('rapors');
	}

}
