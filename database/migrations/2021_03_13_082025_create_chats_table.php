<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chats', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('senders_id')->nullable();
            $table->foreign('senders_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('recievers_id')->nullable();
            $table->foreign('recievers_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('message_id')->nullable();
            $table->string('senders_full_name')->nullable();
            $table->string('message')->nullable();
            $table->string('file')->nullable();
            $table->string('time')->nullable();
            $table->string('is_seen')->default('0');
            $table->string('is_deleted')->default('0');
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
        Schema::dropIfExists('chats');
    }
}
