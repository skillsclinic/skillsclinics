<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTuteesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tutees', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('student_id')->index()->unsigned();
            $table->integer('subject_id')->index()->unsigned();
            $table->string('professor');
            $table->string('month');
            $table->string('schoolYear');

            $table->timestamps();

            $table->foreign('student_id')->references('id')->on('users');
            $table->foreign('subject_id')->references('id')->on('subjects');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tutees');
    }
}
