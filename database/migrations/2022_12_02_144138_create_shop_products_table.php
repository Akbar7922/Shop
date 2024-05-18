<?php

use App\Models\Brand;
use App\Models\Product;
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
        Schema::create('shop_products', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Product::class);
            $table->foreignIdFor(Shop::class);
            $table->foreignIdFor(Brand::class);
            $table->integer('count');
            $table->double('price');
            $table->double('discounted_price')->nullable();
            $table->unsignedInteger('unit_id');
            $table->foreign('unit_id')->references('id')->on('units')->onDelete('cascade');
            $table->string('company', 250)->nullable();
            //            $table->tinyInteger('isProposal')->default(0);
            $table->tinyInteger('isProduct')->default(1);
            $table->json('pictures');
            $table->foreignId('register_user_id')
                ->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('shop_products');
    }
};
