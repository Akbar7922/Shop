<?php

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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class);
            $table->double('price');
            $table->double('send_price');
            $table->unsignedInteger('send_type_id');
            $table->unsignedInteger('pay_type_id');
            $table->foreign('send_type_id')->references('id')
                ->on('send_types')->cascadeOnDelete();
            $table->foreign('pay_type_id')->references('id')
                ->on('pay_types')->cascadeOnDelete();
            $table->string('tracking_code', 60);
            $table->text('address');
            $table->double('latitude')->default(0.0);
            $table->double('longitude')->default(0.0);
            $table->unsignedInteger('status_id');
            $table->foreign('status_id')->references('id')
                ->on('order_statuses')->cascadeOnDelete();
            $table->tinyInteger('isActive')->default(1);
            $table->foreignId('register_user_id')
                ->references('id')->on('users')->cascadeOnDelete();
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
        Schema::dropIfExists('orders');
    }
};
