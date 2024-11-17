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
        Schema::create('ledgers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('member_id')->constrained('member_registration', 'member_id')->nullable();
            $table->foreignId('staff_id')->constrained()->nullable();
            $table->string('transaction_id');
            $table->text('item');
            $table->json('details');
            $table->string('category');
            $table->double('in')->nullable();
            $table->double('out')->nullable();
            $table->double('previous_amount')->nullable();
            $table->double('current_amount')->nullable();
            $table->date('transaction_date');
            $table->timestamp('transaction_timestamp');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ledgers');
    }
};
