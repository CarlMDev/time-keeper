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
        Schema::create('time_record_modifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('time_record_id');
            $table->foreignId('user_id');
            $table->enum('modification_type', ['Edit', 'Delete']);
            $table->dateTime('existing_record_date_time')->default(NULL);
            $table->dateTime('requested_record_date_time')->default(NULL);
            $table->boolean('request_processed')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('time_record_modifications');
    }
};
