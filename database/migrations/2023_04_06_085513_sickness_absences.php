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
        Schema::create('sickness_absences', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->foreignId('reason_id')->references('id')->on('reasons');
            $table->foreignId('student_id')->references('id')->on('students');
            $table->mediumInteger('Duration'); // secconds 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
