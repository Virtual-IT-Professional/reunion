<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Convert table and its columns to utf8mb4
        DB::statement("ALTER TABLE `student_registers` CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
    }

    public function down(): void
    {
        // No-op: reverting charset may cause data loss; keep as utf8mb4
    }
};
