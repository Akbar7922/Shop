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
        Schema::create('send_activation_codes', function (Blueprint $table) {
            $table->id();
            $table->string('activation_code', 20);
            $table->string('mobile', 11);
            $table->tinyInteger('message_type'); // activationCode ---- orderTrackingCode
            $table->tinyInteger('send_status'); // receive or notReceive
            $table->foreignId('register_user_id')->references('id')
                ->on('users')->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('send_activation_codes');
    }
};
