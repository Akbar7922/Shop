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
        Schema::create('send_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Order::class);
            $table->foreignIdFor(\App\Models\Messenger::class);
            $table->double('send_price');
            $table->timestamp('send_date');
            $table->timestamp('receive_date')->useCurrent();
            $table->unsignedInteger('order_status_id');
            $table->foreign('order_status_id')->references('id')
                ->on('order_statuses')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('send_orders');
    }
};
