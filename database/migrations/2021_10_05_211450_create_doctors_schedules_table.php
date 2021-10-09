<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors_schedules', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->unsignedBigInteger('doctors_id')->nullable();
        $table->foreign('doctors_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        $table->longText('schedule')->nullable();
        // $table->string('schedule_date');
        // $table->string('schedule_day');
        // $table->string('schedule_starting_time');
        // $table->string('schedule_ending_time');
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
        Schema::dropIfExists('doctors_schedules');
    }
}
