<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors_files', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('doctors_id')->nullable();
            $table->foreign('doctors_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('other_photos')->nullable();
            $table->string('pdf_file_of_certificate')->nullable();
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
        Schema::dropIfExists('doctors_files');
    }
}
