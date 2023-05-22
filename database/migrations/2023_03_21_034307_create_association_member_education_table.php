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
        Schema::create('association_member_education', function (Blueprint $table) {
            $table->id();
            $table->foreignId('membership_id')->constrained('association_members');
            $table->string('degree')->nullable();
            $table->string('year')->nullable();
            $table->string('department')->nullable();
            $table->string('subject')->nullable();
            $table->string('institute')->nullable();
            $table->string('certificate')->nullable();
            $table->string('status')->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('association_member_education');
    }
};
