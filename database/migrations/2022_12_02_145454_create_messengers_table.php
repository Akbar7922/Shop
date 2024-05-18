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
        Schema::create('messengers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('driver_user_id');
            $table->foreign('driver_user_id')->references('id')
                ->on('users')->cascadeOnDelete();
            $table->string('car', 250);
            $table->string('engine_number', 50);
            $table->tinyInteger('car_type'); // car - motorcycle
            $table->string('plates_number', 50);
            $table->string('driver_nationalCode', 10);
            $table->timestamp('end_insurance_date')->useCurrent();
            $table->timestamp('end_exam_date')->useCurrent();
            $table->string('color', 100);
            $table->tinyInteger('status'); // 1-> Servicing 0-> sleep
            $table->timestamp('start_contract_date')->useCurrent();
            $table->timestamp('end_contract_date')->useCurrent();
            $table->string('driver_pic');
            $table->string('contract_file');
            $table->string('insurance_file');
            $table->string('exam_file');
            $table->string('card_file');
            $table->tinyInteger('isActive')->default(1);
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
        Schema::dropIfExists('messengers');
    }
};
