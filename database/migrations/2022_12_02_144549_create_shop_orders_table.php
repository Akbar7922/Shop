<?php

use App\Models\Order;
use App\Models\Shop;
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
        Schema::create('shop_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Shop::class);
            $table->double('price');
            $table->foreignId('middleMan_id')
                ->references('id')->on('users')->cascadeOnDelete();
            $table->bigInteger('status_id');
            $table->foreignIdFor(Order::class);
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
        Schema::dropIfExists('shop_orders');
    }
};
