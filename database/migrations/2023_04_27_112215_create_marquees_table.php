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
        Schema::create('marquees', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content_url')->nullable();
            $table->string('group')->default('Web');
            $table->string('added_by')->default('system');
            $table->text('category')->default('General');
            $table->integer('order')->default(0);
            $table->integer('pinned')->default(0);
            $table->timestamp('expiration')->nullable();
            $table->integer('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('marquees');
    }
};
