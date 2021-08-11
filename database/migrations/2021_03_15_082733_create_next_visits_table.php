<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNextVisitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('next_visits', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('prescriptions_id')->nullable();
            $table->foreign('prescriptions_id')->references('id')->on('prescriptions')->onDelete('cascade')->onUpdate('cascade');
            $table->string('next_visit')->nullable();
            $table->string('is_active')->nullable();
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
        Schema::dropIfExists('next_visits');
    }
}
