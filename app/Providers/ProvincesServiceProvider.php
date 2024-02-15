<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ProvincesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('provinces', function () {
            return [
                "02" =>"Ciudad Autónoma de Buenos Aires",
                "58" =>"Neuquén",
                "74" =>"San Luis",
                "82" =>"Santa Fe",
                "46" =>"La Rioja",
                "10" =>"Catamarca",
                "90" =>"Tucumán",
                "22" =>"Chaco",
                "34" =>"Formosa",
                "78" =>"Santa Cruz",
                "26" =>"Chubut",
                "50" =>"Mendoza",
                "30" =>"Entre Ríos",
                "70" =>"San Juan",
                "38" =>"Jujuy",
                "86" =>"Santiago del Estero",
                "62" =>"Río Negro",
                "18" =>"Corrientes",
                "54" =>"Misiones",
                "66" =>"Salta",
                "14" =>"Córdoba",
                "06" =>"Buenos Aires",
                "42" =>"La Pampa",
                "94" =>"Tierra del Fuego"
            ];
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
