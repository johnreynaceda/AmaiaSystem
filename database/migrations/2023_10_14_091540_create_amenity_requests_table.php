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
        Schema::create('amenity_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('transaction_number');
            $table->foreignId('amenity_id');
            $table->dateTime('request_date');
            $table->longText('remark');
            $table->integer('no_of_person');
            $table->string('status')->default('pending');
            $table->string('amount')->nullable();
            $table->dateTime('date_completed')->nullable();
            $table->longText('visitors')->nullable();
            $table->string('attachment_path')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('amenity_requests');
    }
};
