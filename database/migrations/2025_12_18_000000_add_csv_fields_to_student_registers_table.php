<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('student_registers', function (Blueprint $table) {
            $table->string('fatherName')->nullable()->after('studentName');
            $table->string('slNo')->nullable()->after('rollNo');
            $table->string('batch')->nullable()->after('department');
        });
    }

    public function down(): void
    {
        Schema::table('student_registers', function (Blueprint $table) {
            $table->dropColumn(['fatherName','slNo','batch']);
        });
    }
};
