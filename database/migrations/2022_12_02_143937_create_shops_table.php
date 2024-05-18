<?php

use App\Models\Category;
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
        Schema::create('shops', function (Blueprint $table) {
            $table->id();
            $table->foreignId('manager_user_id')
                ->references('id')->on('users')->onDelete('cascade');
            $table->string('name', 250);
            $table->string('manager_moblie', 11);
            $table->string('manager_natoinalCode', 10);
            $table->foreignIdFor(Category::class);
            $table->json('tell');
            $table->json('addresses');
            $table->foreignId('main_shop_id')->references('id')
                ->on('shops')->onDelete('cascade');
            $table->json('hoursOfWork');
            $table->tinyInteger('isOpen')->default(0);
            $table->tinyInteger('isActive')->default(1);
            $table->string('logo')->nullable();
            $table->tinyInteger('shopType')->default('1'); // Shop - home
            $table->string('license')->nullable();
            $table->string('contract');
            $table->string('start_contract_date');
            $table->string('end_contract_date');
            $table->string('manager_pic')->nullable();
            $table->foreignId('register_user_id')
                ->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('shops');
    }
};
