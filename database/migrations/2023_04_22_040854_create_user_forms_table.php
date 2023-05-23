<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_forms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('name')->nullable();
            $table->string('educational_qualification')->nullable();
            $table->string('date_of_birth')->nullable();
            $table->string('district')->nullable();
            $table->string('working_from')->nullable();
            $table->string('appointed')->nullable();
            $table->string('currentPosting')->nullable();
            $table->string('previousposting')->nullable();
            $table->string('bloodgroup')->nullable();
            $table->string('mobile')->nullable();
            $table->string('email')->nullable();
            $table->string('profile_img')->nullable();
            $table->string('division')->nullable();
            $table->string('upazila')->nullable();
            $table->string('batch')->nullable();
            $table->string('new_section')->nullable();
            $table->string('designation')->nullable();
            $table->string('home_district')->nullable();
            $table->string('last_name_of_regi')->nullable();
            $table->string('last_name_of_attach')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_forms');
    }
};
