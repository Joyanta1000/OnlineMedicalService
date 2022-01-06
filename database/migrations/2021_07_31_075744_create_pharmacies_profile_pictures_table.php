<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePharmaciesProfilePicturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pharmacies_profile_pictures', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pharmacies_id')->nullable();
            $table->foreign('pharmacies_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('pharmacies_profile_picture')->nullable();
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
        Schema::dropIfExists('pharmacies_profile_pictures');
    }
}
