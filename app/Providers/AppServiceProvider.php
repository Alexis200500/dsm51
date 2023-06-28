<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Observers\GrupoLaboratorioObserver;
use App\GrupoLaboratorio;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        GrupoLaboratorio::observe(GrupoLaboratorioObserver::class);
    }
}
