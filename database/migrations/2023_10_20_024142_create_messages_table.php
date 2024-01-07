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
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('receiver_id');
            $table->string('resident_name');
            $table->string('complainee_unit');
            $table->string('nature_of_complaint')->nullable();
            $table->string('label_type')->nullable();
            $table->string('subject');
            $table->longText('message');
            $table->date('date_completed')->nullable();
            $table->string('status')->default('active');
            $table->string('read_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
