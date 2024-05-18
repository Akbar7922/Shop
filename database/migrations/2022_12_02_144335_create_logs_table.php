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
        Schema::create('logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('activity_id');
            $table->foreign('activity_id')->references('id')
                ->on('activities')->cascadeOnDelete();
            $table->foreignIdFor(User::class)->default(0);
            $table->ipAddress();
            $table->tinyInteger('platform'); // 0-> web , 1-> android , 2-> iphone
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
        Schema::dropIfExists('logs');
    }
};
