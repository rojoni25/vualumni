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
        Schema::create('association_members', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('membership_id')->nullable();
            $table->string('name');
            $table->string('name_bangla');
            $table->date('dob');
            $table->string('blood_group');
            $table->string('gender');
            $table->string('maritial_status');
            $table->string('spouse_name')->nullable();
            $table->string('son_count')->nullable();
            $table->string('daughter_count')->nullable();
            $table->string('mobile')->nullable();
            $table->string('emergency_mobile')->nullable();
            $table->string('email')->nullable();
            $table->json('permanent_address')->nullable();
            $table->json('present_address')->nullable();
            $table->string('membership_type')->nullable();
            $table->string('signature')->nullable();
            $table->string('photo')->nullable();
            $table->string('nid')->nullable();
            $table->string('nid_photo')->nullable();
            $table->string('certificate')->nullable();
            $table->string('status')->default('pending');
            $table->string('completed_steps')->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('association_members');
    }
};
