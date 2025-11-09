<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            if (!Schema::hasColumn('site_settings', 'about_title')) {
                $table->string('about_title')->nullable()->after('hero_subtitle');
            }
            if (!Schema::hasColumn('site_settings', 'about_subtitle')) {
                $table->string('about_subtitle')->nullable()->after('about_title');
            }
            if (!Schema::hasColumn('site_settings', 'about_paragraph_1')) {
                $table->text('about_paragraph_1')->nullable()->after('about_subtitle');
            }
            if (!Schema::hasColumn('site_settings', 'about_paragraph_2')) {
                $table->text('about_paragraph_2')->nullable()->after('about_paragraph_1');
            }
            if (!Schema::hasColumn('site_settings', 'clients_enabled')) {
                $table->boolean('clients_enabled')->default(true)->after('about_paragraph_2');
            }
        });
    }

    public function down(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            if (Schema::hasColumn('site_settings', 'clients_enabled')) {
                $table->dropColumn('clients_enabled');
            }
            if (Schema::hasColumn('site_settings', 'about_paragraph_2')) {
                $table->dropColumn('about_paragraph_2');
            }
            if (Schema::hasColumn('site_settings', 'about_paragraph_1')) {
                $table->dropColumn('about_paragraph_1');
            }
            if (Schema::hasColumn('site_settings', 'about_subtitle')) {
                $table->dropColumn('about_subtitle');
            }
            if (Schema::hasColumn('site_settings', 'about_title')) {
                $table->dropColumn('about_title');
            }
        });
    }
};
