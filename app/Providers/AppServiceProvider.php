<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

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
        // URL definitions
        $rootURL        =   config('app.rootURL');
        $baseURL        =   config('app.url');
        
        $imagesURL      =   $rootURL."/images";
        $cssURL         =   $rootURL."/css";
        $jsURL          =   $rootURL."/js";
        $catalogueURL   =   $baseURL."/catalogue";
        $vehicleURL     =   $catalogueURL."/vehicle";
        
        View::share('rootURL', $rootURL);
        View::share('baseURL', $baseURL);
        
        View::share('imagesURL', $imagesURL);
        View::share('cssURL', $cssURL);
        View::share('jsURL', $jsURL);
        View::share('catalogueURL', $catalogueURL);
        View::share('vehicleURL', $vehicleURL);
        
        
        // Various
        $direccion  = "Rambla Josep Taradellas, 2";
        $cod_postal  = "08500";
        $poblacion  = "Vic";
        $provincia = "(Barcelona)";
        $pais = $provincia." [ES]";
        $telefono = "(+34) 938 833 128";
        $email = "info@sonocar.es";
        $google_maps_url = "https://goo.gl/maps/q2j7xr2uhjEQweiv8";
        
        View::share('nombre_empresa', env('APP_NAME', ""));
        View::share('propietario', "Jordi Domingo");
        View::share('nif_propietario', "9999999999X");
        View::share('dominio', "sonocar.cat");
        View::share('horario', "L-S de 10h a 14h y de 17h a 20:30h");
        View::share('telefono', "<a href='tel:$telefono'>$telefono</a>");
        View::share('email', "<a href='mailto:$email'>$email</a>");
        View::share('direccion', $direccion);
        View::share('cod_postal', $cod_postal);
        View::share('poblacion', $poblacion);
        View::share('pais', $pais);
        View::share('google_maps_url', $google_maps_url);
        View::share('google_maps_iframeURL', "https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d371.0675957024464!2d2.2512924!3d41.92423!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12a52711a4e6a35d%3A0xfde903741a3fedd8!2ssonocar!5e0!3m2!1ses!2ses!4v1595545083331!5m2!1ses!2ses");
        View::share('menuSeparator', "<span class='nav-item btn invisible'><span class='mdi mdi-slash-forward'></span></span>");
        View::share('direccion_html', "<a href='" . $google_maps_url . "' target='_blank'>" . $direccion . " - " . $cod_postal . " - " . $poblacion . " " . $pais . "</a>");
        
        $mdiIconNoImage = "mdi-camera-off";
        View::share('mdiIconNoImage', $mdiIconNoImage);
    }
}
