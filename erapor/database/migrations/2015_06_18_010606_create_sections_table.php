<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSectionsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sections', function(Blueprint $table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('kode');
            $table->string('year');
            $table->smallInteger('semester')->unsigned();
            $table->smallInteger('status');
            $table->integer('teacher_id')->unsigned();
            $table->integer('rombel_id')->unsigned();
            $table->integer('course_id');
            $table->timestamps();


            $table->foreign('teacher_id')->references('id')->on('teachers')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('rombel_id')->references('id')->on('rombels')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sections');
    }

}
