<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsHavingProblemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients_having_problems', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('prescriptions_id')->nullable();
            $table->foreign('prescriptions_id')->references('id')->on('prescriptions')->onDelete('cascade')->onUpdate('cascade');
            $table->string('having_problem')->nullable();
            $table->string('duration')->nullable();
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
        Schema::dropIfExists('patients_having_problems');
    }
}
