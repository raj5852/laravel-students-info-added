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
            $table->unsignedBigInteger('user_id');
            $table->string('name');
            $table->string('educational_qualification');
            $table->string('date_of_birth');
            $table->string('district');
            $table->string('working_from');
            $table->string('appointed');
            $table->string('currentPosting');
            $table->string('previousposting');
            $table->string('bloodgroup');
            $table->string('mobile');
            $table->string('email');
            $table->string('profile_img');
            $table->string('division');
            $table->string('upazila');
            $table->string('batch');
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
