<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStateOrDistrictsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('state_or_districts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('countries_id')->nullable();
            $table->foreign('countries_id')->references('id')->on('countries')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('cities_id')->nullable();
            $table->foreign('cities_id')->references('id')->on('cities')->onDelete('cascade')->onUpdate('cascade');
            $table->string('state');
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
        Schema::dropIfExists('state_or_districts');
    }
}
