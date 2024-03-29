<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('period_id');
            $table->unsignedBigInteger('program_id');
            $table->year('year');
            $table->date('date_begin');
            $table->date('date_end')->nullable();
            $table->time('time_begin', 0)->nullable();
            $table->time('time_end', 0)->nullable();
            $table->string('location');
            $table->longtext('description');
            $table->timestamps();

            $table->foreign('period_id')->references('id')->on('periods');
            $table->foreign('program_id')->references('id')->on('programs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
