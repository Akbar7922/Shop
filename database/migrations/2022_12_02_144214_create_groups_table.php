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
        Schema::create('groups', function (Blueprint $table) {
            $table->id();
            $table->string('title', 250);
            $table->string('link', 250);
            $table->string('unique_name');
            $table->tinyInteger('isGroup')->default(1); // channel - group
            $table->string('pic', 200);
            $table->foreignId('register_user_id')
                ->references('id')->on('users')->onDelete('cascade');
            $table->tinyInteger('isActive')->default(1);
            $table->tinyInteger('isDel')->default(0);
            $table->text('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('groups');
    }
};
