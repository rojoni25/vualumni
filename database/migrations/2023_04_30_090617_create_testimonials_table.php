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
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->nullable();
            $table->string('user_name')->nullable();
            $table->text('designation')->nullable();
            $table->string('tagline')->nullable();
            $table->string('user_avatar')->nullable();
            $table->text('content');
            $table->text('video')->nullable();
            $table->foreignId('added_by')->constrained('users')->nullable();
            $table->integer('order')->nullable();
            $table->integer('status')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('testimonials');
    }
};
