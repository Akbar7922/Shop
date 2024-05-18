<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configs', function (Blueprint $table) {
            $table->id();
            $table->string('app_name');
            $table->string('small_logo' , 255);
            $table->string('large_logo' , 255)->nullable();
            $table->string('placeholder' , 255)->nullable();
            $table->string('main_color' , 10)->nullable();
            $table->string('tell' , 20)->nullable();
            $table->string('mobile' , 20);
            $table->string('email' , 250);
            $table->string('address' , 255)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('configs');
    }
};
