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
        Schema::create('order_status_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Order::class);
            $table->unsignedInteger('order_status_id');
            $table->foreign('order_status_id')->references('id')
                ->on('order_statuses')->cascadeOnDelete();
            $table->foreignId('register_user_id')->references('id')
                ->on('users')->cascadeOnDelete();

            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('order_status_logs');
    }
};
