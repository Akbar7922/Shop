<?php

use App\Models\Brand;
use App\Models\Category;
use App\Models\Group;
use App\Models\Shop;
use App\Models\ShopProduct;
use App\Models\User;
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
        Schema::create('discounts', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Shop::class);
            $table->foreignIdFor(ShopProduct::class);
            $table->foreignIdFor(Category::class);
            $table->foreignIdFor(Brand::class);
            $table->double('discount_price'); // 0 -> not Active
            $table->double('discount_percentage'); // 0 -> not Active
            $table->foreignIdFor(User::class);
            $table->foreignIdFor(Group::class);
            $table->timestamp('start_date')->useCurrent();
            $table->timestamp('end_date')->useCurrent();
            $table->string('discount_code', 50)->unique();
            $table->tinyInteger('isActive')->default(1);
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
        Schema::dropIfExists('discounts');
    }
};
