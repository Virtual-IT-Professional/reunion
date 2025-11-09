<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            if (!Schema::hasColumn('site_settings', 'parallax_image')) {
                $table->string('parallax_image')->nullable()->after('hero_image');
            }
            if (!Schema::hasColumn('site_settings', 'parallax_video_url')) {
                $table->string('parallax_video_url')->nullable()->after('parallax_image');
            }
        });
    }

    public function down(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            if (Schema::hasColumn('site_settings', 'parallax_video_url')) {
                $table->dropColumn('parallax_video_url');
            }
            if (Schema::hasColumn('site_settings', 'parallax_image')) {
                $table->dropColumn('parallax_image');
            }
        });
    }
};
