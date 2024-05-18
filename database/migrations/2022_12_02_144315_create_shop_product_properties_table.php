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
        Schema::create('shop_product_properties', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\ShopProduct::class);
            $table->unsignedInteger('property_id');
            $table->foreign('property_id')->references('id')
                ->on('properties')->cascadeOnDelete();
            $table->string('value', 250);
            $table->foreignId('register_user_id')
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
        Schema::dropIfExists('shop_product_properties');
    }
};
