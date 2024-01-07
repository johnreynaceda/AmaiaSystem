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
        Schema::create('pass_requests', function (Blueprint $table) {
            $table->id();
            $table->string('transaction_number');
            $table->foreignId('user_id')->nullable();
            $table->foreignId('pass_id');
            $table->string('visitor_name')->nullable();
            $table->string('email')->nullable();
            $table->string('building')->nullable();
            $table->string('unit')->nullable();
            $table->string('purpose')->nullable();
            $table->string('particulars')->nullable();
            $table->string('relation')->nullable();
            $table->string('quantity')->nullable();
            $table->string('contact_number')->nullable();
            $table->dateTime('request_date');
            $table->string('status')->default('pending');
            $table->dateTime('date_completed')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pass_requests');
    }
};
