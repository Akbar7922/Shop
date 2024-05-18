<?php

use App\Models\City;
use App\Models\Job;
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
        Schema::create('cooperation_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(City::class);
            $table->foreignIdFor(Job::class);
            $table->tinyInteger('is_male');
            $table->string('national_code' , 10);
            $table->string('birthday_year' , 4)->nullable();
            $table->string('fullName' , 255);
            $table->tinyInteger('is_married');
            $table->tinyInteger('degreeOfEducation');
            $table->string('fieldOfStudy' , 255);
            $table->string('university_name' , 255);
            $table->string('tell' , 20);
            $table->string('mobile' , 12);
            $table->text('address');
            $table->text('description')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cooperation_requests');
    }
};
