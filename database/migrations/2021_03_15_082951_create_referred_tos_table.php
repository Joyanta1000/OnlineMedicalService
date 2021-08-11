<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReferredTosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('referred_tos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('prescriptions_id')->nullable();
            $table->foreign('prescriptions_id')->references('id')->on('prescriptions')->onDelete('cascade')->onUpdate('cascade');
            $table->string('referred_to')->nullable();
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
        Schema::dropIfExists('referred_tos');
    }
}
