<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'site_name','tagline','brand_color','contact_email','contact_phone','address',
        'facebook','twitter','instagram','youtube',
        'hero_title','hero_subtitle','event_date','logo','favicon','hero_image','extras','registration_open',
        'venue','participate_fee','guest_fee','bkash_number','nagad_number','payment_reference','emergency_phone',
        'parallax_image','parallax_video_url',
        'about_title','about_subtitle','about_paragraph_1','about_paragraph_2','clients_enabled'
    ];

    protected $casts = [
        'extras' => 'array',
        'event_date' => 'datetime',
        'registration_open' => 'boolean',
        'clients_enabled' => 'boolean',
    ];
}
