<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->text('body');
            $table->foreignId('sender_user_id')->references('id')
                ->on('users')->cascadeOnDelete();
            $table->foreignId('reciver_user_id')->references('id')
                ->on('users')->cascadeOnDelete();
            $table->tinyInteger('receiver_type'); // channel , group , user
            $table->foreignId('message_parent_id')
                ->references('id')->on('messages')->cascadeOnDelete();
            $table->tinyInteger('message_type'); // text , pictire , video , music , file
            $table->tinyInteger('isNotification')->default(0);
            $table->tinyInteger('isDel')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('messages');
    }
};
