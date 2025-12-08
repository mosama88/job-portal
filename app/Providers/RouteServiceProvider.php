<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{

    public const CANDIDATE_DASHBOARD = 'candidate/dashboard';
    public const COMPANY_DASHBOARD = 'company/dashboard';
    public const ADMIN_DASHBOARD = 'admin/dashboard';


    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
