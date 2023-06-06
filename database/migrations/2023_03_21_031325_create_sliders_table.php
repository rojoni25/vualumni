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
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('photo');
            $table->double('width');
            $table->double('height');
            $table->double('size');
            $table->text('url')->nullable();
            $table->string('group')->nullable();
            $table->string('category')->nullable();
            $table->integer('pinned')->default(0);
            $table->integer('order')->default(0);
            $table->foreignId('added_by')->constrained('users')->nullable();
            $table->integer('status')->default(1);
            $table->timestamp('expiration')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sliders');
    }
};
