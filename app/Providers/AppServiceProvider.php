<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        config(['session.secure' => true]);
        config(['session.same_site' => 'none']);

        Gate::define('viewApiDocs', function () {
            return app()->environment('local');
        });
    }
}
