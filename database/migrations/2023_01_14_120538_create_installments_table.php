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
        Schema::create('installments', function (Blueprint $table) {
            $table->id();
            $table->double('price');
            $table->foreignIdFor(\App\Models\Order::class);
            $table->date('due_date');
            $table->tinyInteger('status')->default(0); // 0 -> paied    1 -> not pay
            $table->foreignIdFor(\App\Models\Transaction::class);
            $table->string('barcode', 50);
            $table->text('description');
            $table->foreignId('register_user_id')->references('id')
                ->on('users')->cascadeOnDelete();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('installments');
    }
};
