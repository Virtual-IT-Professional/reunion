<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            if(!Schema::hasColumn('site_settings','venue')) $table->string('venue')->nullable()->after('hero_image');
            if(!Schema::hasColumn('site_settings','participate_fee')) $table->integer('participate_fee')->nullable()->after('venue');
            if(!Schema::hasColumn('site_settings','guest_fee')) $table->integer('guest_fee')->nullable()->after('participate_fee');
            if(!Schema::hasColumn('site_settings','bkash_number')) $table->string('bkash_number',50)->nullable()->after('guest_fee');
            if(!Schema::hasColumn('site_settings','nagad_number')) $table->string('nagad_number',50)->nullable()->after('bkash_number');
            if(!Schema::hasColumn('site_settings','payment_reference')) $table->string('payment_reference',100)->nullable()->after('nagad_number');
            if(!Schema::hasColumn('site_settings','emergency_phone')) $table->string('emergency_phone',100)->nullable()->after('payment_reference');
        });
    }

    public function down(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            foreach(['venue','participate_fee','guest_fee','bkash_number','nagad_number','payment_reference','emergency_phone'] as $col){
                if(Schema::hasColumn('site_settings',$col)) $table->dropColumn($col);
            }
        });
    }
};
