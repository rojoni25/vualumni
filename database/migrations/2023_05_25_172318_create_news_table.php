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
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->string('group');
            $table->string('category')->nullable();
            $table->text('content')->nullable();
            $table->text('thumbnail')->nullable();
            $table->integer('pinned')->default(0);
            $table->foreignId('added_by')->constrained('users')->nullable();
            $table->integer('status')->default(1);
            $table->timestamp('news_date')->default(date('Y-m-d H:i:s'));
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
