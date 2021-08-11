<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeingReadyForTreatmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('being_ready_for_treatments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('prescriptions_id')->nullable();
            $table->foreign('prescriptions_id')->references('id')->on('prescriptions')->onDelete('cascade')->onUpdate('cascade');
            $table->string('text')->nullable();
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
        Schema::dropIfExists('being_ready_for_treatments');
    }
}
