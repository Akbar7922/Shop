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
        Schema::table('transactions', function (Blueprint $table) {
            $table->integer('status_code')->nullable()->after('reference_code');
            $table->string('status_text')->nullable()->after('status_code');
            $table->string('referenceID')->nullable()->after('status_text');
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
