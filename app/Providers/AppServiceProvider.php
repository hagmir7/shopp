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
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Model::preventLazyLoading(! app()->isProduction()); // For N+ error

        $domain = str_replace('www.', '', request()->getHost());
        // dd($domain);
        $site = Site::where('domain', $domain)->first();
        if (!$site) {
            abort(404, message: $domain . " Is not registerd");
        }
        app()->instance('site', $site);

    }
}
