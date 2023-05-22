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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('thumbnail');
            $table->string('banner');
            $table->string('url')->nullable();
            $table->string('registration_url')->nullable();
            $table->text('content')->nullable();
            $table->text('venue')->nullable();
            $table->text('google_map')->nullable();
            $table->string('group')->default('web');
            $table->string('category')->default('general');
            $table->foreignId('added_by')->constrained('users')->nullable();
            $table->integer('pinned')->default(0);
            $table->integer('status')->default(1);
            $table->timestamp('registration_start')->nullable();
            $table->timestamp('registration_end')->nullable();
            $table->timestamp('event_start')->nullable();
            $table->timestamp('event_end')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
