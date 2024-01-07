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
        Schema::create('user_information', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('resident_type');
            $table->string('unit_number');
            $table->string('lastname');
            $table->string('firstname');
            $table->string('middlename');
            $table->dateTime('date_of_birth');
            $table->string('gender');
            $table->string('civil_status');
            $table->string('nationality');
            $table->string('phone_number');
            $table->longText('preferred_mailing_address')->nullable();
            $table->date('turn_over_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_information');
    }
};
