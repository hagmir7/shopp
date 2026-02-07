<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Site;
use Illuminate\Database\Eloquent\Model;
use Filament\Facades\Filament;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void {}

    public function boot(): void
    {
        // Prevent lazy loading in dev
        Model::preventLazyLoading(!app()->isProduction());

        // // Detect current site by domain
        try {
            $domain = str_replace('www.', '', request()->getHost());
            $site = Site::where('domain', $domain)->firstOrFail();
            app()->instance('site', $site);
        } catch (\Throwable $th) {
            abort(404, $domain . " is not registered");
        }

        // Filament topbar hook for theme switcher
        Filament::serving(function () use ($site) {
            Filament::registerRenderHook(
                'content.topbar.start',
                fn(): string => \Livewire\Livewire::mount('theme-switcher', ['site' => $site])->html()
            );
        });
    }
}
