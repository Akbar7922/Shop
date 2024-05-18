<?php

use App\Models\City;
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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 250);
            $table->string('family', 255)->nullable();
            $table->string('mobile', 11);
            $table->string('tell', 11)->nullable();
            $table->string('email')->nullable()->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('unique_code', 50)->unique();
            $table->foreignIdFor(City::class)->default(1);
            $table->json('addresses')->nullable();
            $table->unsignedInteger('user_type_id');
            $table->foreign('user_type_id')
                ->references('id')->on('user_types')->onDelete('cascade');
            $table->string('user_unique_code', 50)->nullable();
            $table->double('wallet')->default(0);
            $table->json('socialNetworks')->nullable();
            $table->tinyInteger('level')->default(3);
            $table->string('pic')->nullable();
            $table->tinyInteger('isActive')->default(1);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('users');
    }
};
