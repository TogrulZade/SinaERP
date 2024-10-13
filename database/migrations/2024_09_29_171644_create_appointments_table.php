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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("doctor_id");
            $table->unsignedBigInteger("patient_id");
            $table->unsignedBigInteger("queue_number");
            $table->timestamp("appointment_date");
            $table->enum("status", ['in_queue', "in_progress", "completed", "cancelled"]);
            $table->timestamps();

            $table->foreign("doctor_id")->references("id")->on("users")->cascadeOnDelete();
            $table->foreign("patient_id")->references("id")->on("users")->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
