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
        Schema::create('association_member_ocupations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('membership_id')->constrained('association_members');
            $table->string('organization');
            $table->string('position');
            $table->date('from_date');
            $table->date('to_date')->nullable();
            $table->integer('continuing')->default(0);
            $table->text('address')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('email')->nullable();
            $table->string('web')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('association_member_ocupations');
    }
};
