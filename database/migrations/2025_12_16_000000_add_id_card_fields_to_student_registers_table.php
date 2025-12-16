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
        Schema::table('student_registers', function (Blueprint $table) {
            $table->string('id_card_number')->nullable()->unique();
            $table->string('id_card_status')->nullable()->default('NotIssued');
            $table->timestamp('id_card_issued_at')->nullable();
            $table->timestamp('id_card_printed_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('student_registers', function (Blueprint $table) {
            $table->dropColumn(['id_card_number','id_card_status','id_card_issued_at','id_card_printed_at']);
        });
    }
};
