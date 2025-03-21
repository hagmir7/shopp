<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Site;
use Illuminate\Database\Eloquent\Model;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Model::preventLazyLoading(! app()->isProduction()); // For N+ error

        try {
            $domain = str_replace('www.', '', request()->getHost());
            $site = Site::where('domain', $domain)->first();
            if (!$site) {
                abort(404, message: $domain . " Is not registerd");
            }
            app()->instance('site', $site);
        } catch (\Throwable $th) {
        }


    }
}
