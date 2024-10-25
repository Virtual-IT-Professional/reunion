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
        Schema::create('admin_panels', function (Blueprint $table) {
            $table->id();
            $table->string('adminName')->nullable();
            $table->string('phone')->nullable();
            $table->string('emailAddress')->nullable();
            $table->string('department')->nullable();
            $table->string('shift')->nullable();
            $table->string('volantiarId')->nullable();
            $table->string('volantiarType')->nullable();
            $table->string('adminType')->nullable();
            $table->string('password')->nullable();
            $table->string('batchSession')->nullable();
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
        Schema::dropIfExists('admin_panels');
    }
};
