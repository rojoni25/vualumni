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
        Schema::create('notices', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('file');
            $table->string('url');
            $table->text('content');
            $table->string('group')->default('web');
            $table->string('category')->default('general');
            $table->foreignId('added_by')->constrained('users')->nullable();
            $table->integer('pinned')->default(0);
            $table->integer('status')->default(1);
            $table->timestamp('expiration')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notices');
    }
};
