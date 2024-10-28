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
        Schema::create('student_registers', function (Blueprint $table) {
            $table->id();
            $table->string('studentName')->nullable();
            $table->string('phone')->nullable();
            $table->string('emailAddress')->nullable();
            $table->string('department')->nullable();
            $table->string('shift')->nullable();
            $table->string('rollNo')->nullable();
            $table->string('professionDetails')->nullable();
            $table->string('currentAddress')->nullable();
            $table->string('blGroup')->nullable();
            $table->string('tShirtSize')->nullable();
            $table->string('totalAttend')->nullable();
            $table->string('experience')->nullable();
            $table->string('paymentBy')->nullable();
            $table->string('paymentId')->nullable();
            $table->string('paymentAmount')->nullable();
            $table->string('status')->nullable();
            $table->string('comment')->nullable();
            $table->string('password')->nullable();
            $table->string('politicalProblem')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_registers');
    }
};
