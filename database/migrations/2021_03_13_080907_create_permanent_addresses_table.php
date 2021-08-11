<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermanentAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permanent_addresses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('doctors_id')->nullable();
            $table->foreign('doctors_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('patients_id')->nullable();
            $table->foreign('patients_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('phermacies_id')->nullable();
            $table->foreign('phermacies_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('permanent_country_id')->nullable();
            $table->foreign('permanent_country_id')->references('id')->on('countries')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('permanent_city_id')->nullable();
            $table->foreign('permanent_city_id')->references('id')->on('cities')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('permanent_thana_id')->nullable();
            $table->foreign('permanent_thana_id')->references('id')->on('thanas')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('permanent_area_id')->nullable();
            $table->foreign('permanent_area_id')->references('id')->on('areas')->onDelete('cascade')->onUpdate('cascade');
            $table->string('permanent_address')->nullable();
            $table->string('permanent_address_zip_code')->nullable();
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
        Schema::dropIfExists('permanent_addresses');
    }
}
