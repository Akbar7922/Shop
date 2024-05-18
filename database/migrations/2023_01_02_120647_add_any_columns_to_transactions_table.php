<?php

use App\Models\ForPayments;
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
        Schema::table('transactions', function (Blueprint $table) {
            $table->foreignIdFor(ForPayments::class);
            $table->string('trackingCode', 80)->unique();
            $table->text('description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('transactions', function (Blueprint $table) {
            //
        });
    }
};
