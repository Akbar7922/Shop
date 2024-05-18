<?php

use App\Models\Discount;
use App\Models\ShopOrder;
use App\Models\ShopProduct;
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
        Schema::create('shop_order_products', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(ShopOrder::class);
            $table->foreignIdFor(ShopProduct::class);
            $table->double('price');
            $table->integer('count');
            $table->foreignIdFor(Discount::class);
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
        Schema::dropIfExists('shop_order_products');
    }
};
