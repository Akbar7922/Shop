<?php

use App\Models\Message;
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
        Schema::create('messages_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Message::class);
            $table->foreignIdFor(User::class);
            $table->unsignedInteger('message_status_id');
            $table->foreign('message_status_id')
                ->references('id')->on('message_statuses')->cascadeOnDelete();
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
        Schema::dropIfExists('messages_logs');
    }
};
