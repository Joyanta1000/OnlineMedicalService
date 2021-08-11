<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicinesForPatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicines_for_patients', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('prescriptions_id')->nullable();
            $table->foreign('prescriptions_id')->references('id')->on('prescriptions')->onDelete('cascade')->onUpdate('cascade');
            $table->string('medicine')->nullable();
            $table->string('type')->nullable();
            $table->string('after_or_before_what')->nullable();
            $table->string('days')->nullable();
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
        Schema::dropIfExists('medicines_for_patients');
    }
}
