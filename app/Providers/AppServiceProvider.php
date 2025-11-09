<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;
use App\Models\adminPanel;
use App\Models\SiteSetting;
use Illuminate\Support\Facades\Cache;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Share the authenticated admin user (if any) with all admin views
        View::composer('admin.*', function ($view) {
            $authId = null;
            if (Session::has('superAdmin')) {
                $authId = Session::get('superAdmin');
            } elseif (Session::has('modarator')) {
                $authId = Session::get('modarator');
            }
            $authAdmin = null;
            if ($authId) {
                $authAdmin = adminPanel::find($authId);
            }
            $view->with('authAdmin', $authAdmin);
        });

        // Share departments and admin rules globally for consistent dropdowns
        View::share('departments', [
            'Science',
            'Huminites',
            'Business Studies',
        ]);

        View::share('adminRules', [
            'Admin',
            'Modarator',
        ]);

        // Team designations for team management
        View::share('designations', [
            'IT Support',
            'FInance',
            'Co-Ordinator',
            'Contributor',
            'Chief Admin',
            'Volunteer',
        ]);

        // Global site settings (single row). Safe fallback when empty.
        try {
            $siteSettings = Cache::remember('site_settings', 3600, function(){
                return SiteSetting::first();
            });
        } catch (\Exception $e) {
            $siteSettings = null; // table may not exist yet
        }

        View::share('siteSettings', $siteSettings);
    }
}
