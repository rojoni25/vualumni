<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('member_id')->constrained('association_members');
            $table->bigInteger('membership_id')->nullable();
            $table->string('transaction_id')->nullable();
            $table->string('method')->nullable();
            $table->string('payment_for')->nullable();
            $table->double('amount');
            $table->json('statement');
            $table->timestamp('payment_date')->nullable();
            $table->timestamp('confirmation_date')->nullable();
            $table->foreignId('confirmed_by')->constrained('users');
            $table->string('status')->default('Pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
