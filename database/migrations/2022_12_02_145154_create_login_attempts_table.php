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
        Schema::create('login_attempts', function (Blueprint $table) {
            $table->id();
            $table->string('username', 250);
            $table->string('password');
            $table->ipAddress();
            $table->macAddress()->nullable();
            $table->string('imei', 50)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('login_attempts');
    }
};
