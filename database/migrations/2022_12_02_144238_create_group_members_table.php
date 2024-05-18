<?php

use App\Models\Group;
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
        Schema::create('group_members', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Group::class);
            $table->foreignIdFor(User::class);
            $table->tinyInteger('isAdmin')->default(0);
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
        Schema::dropIfExists('group_members');
    }
};
