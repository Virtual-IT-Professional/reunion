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
        Schema::create('geust_registers', function (Blueprint $table) {
            $table->id();
            $table->string('guestName')->nullable();
            $table->string('phone')->nullable();
            $table->string('guestRelation')->nullable();
            $table->string('linkStudent')->nullable();
            $table->string('blGroup')->nullable();
            $table->string('tShirtSize')->nullable();
            $table->string('status')->nullable();
            $table->string('comment')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('geust_registers');
    }
};
