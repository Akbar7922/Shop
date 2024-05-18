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
        Schema::create('favorites', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\ShopProduct::class);
            $table->foreignIdFor(\App\Models\Category::class);
            $table->foreignIdFor(\App\Models\Brand::class);
            $table->tinyInteger('entity_type')->default(0); // 0 -> shopProduct  , 1 -> Category  , 2 -> Brand
            $table->foreignIdFor(\App\Models\User::class);
            $table->foreignId('register_user_id')
                ->references('id')->on('users')->cascadeOnDelete();
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
        Schema::dropIfExists('favorites');
    }
};
