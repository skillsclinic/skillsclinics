<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sessions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tutee_id')->index()->unsigned();
            $table->integer('mentor_id')->index()->unsigned();
            $table->date('date');
            $table->time('time_in');
            $table->time('time_out');
            $table->longText('areaOfConcern');
            $table->integer('pre_test');
            $table->integer('post_test');
            $table->integer('remarks');
            $table->timestamps();

            $table->foreign('tutee_id')->references('id')->on('tutees');
            $table->foreign('mentor_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sessions');
    }
}
