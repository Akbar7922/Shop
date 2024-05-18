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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->double('price');
            $table->string('reference_code');
            $table->unsignedInteger('status_id');
            $table->foreign('status_id')->references('id')
                ->on('statuses')->cascadeOnDelete();
            $table->foreignId('register_use_id')
                ->references('id')->on('users')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('transactions');
    }
};
