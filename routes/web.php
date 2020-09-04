<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 */

/* Navigation */
Route::get('/lang/{id}', 'Controller@language');

Route::get('/', function () {
    return view('index');
});

Route::get('/legal', function () {
    return view('legal');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

/* Qr Codes */
Route::get('/getVehicleQRCodeBySKU', 'QrCodeController@getVehicleQRCodeBySKU')->name('/getVehicleQRCodeBySKU');

/* RD Mail Form */
Route::get('/send-mail', 'RdMailFormController@RDMailForm')->name('/send-mail.get');
Route::post('/send-mail', 'RdMailFormController@RDMailForm')->name('/send-mail.post');

/* Subscription Manager */
Route::post('/subscribe', 'SubscriptionController@subscribe')->name('/subscribe.Post');

Route::get('/unsubscribe', 'SubscriptionController@unsubscribe')->name('/unsubscribe.Get');
Route::post('/unsubscribe', 'SubscriptionController@unsubscribe')->name('/unsubscribe.Post');

Route::get('/admin/subscribers', 'SubscriptionAuthController@subscribers')->name('/admin/subscribers.Get');



/* Catalogue View Data*/
Route::get('/catalogue', 'CatalogueController@filter')->name('/catalogue');
Route::get('/catalogue/all', 'CatalogueController@allvisible')->name('/catalogue/all');
Route::get('/catalogue/hidden', 'CatalogueAuthController@hidden')->name('/catalogue/hidden');
Route::get('/catalogue/filterby', 'CatalogueController@filter')->name('/catalogue/filterby');
Route::get('/catalogue/vehicle/id/{id}', 'CatalogueController@vehicleDetail') ->name('/catalogue/vehicle/id');
Route::get('/catalogue/vehicle/sku/{sku}', 'CatalogueController@vehicleDetailBySKU') ->name('/vehicle/sku');


/* Catalogue Store New Data */
Route::get('/submit-vehicle', 'CatalogueAuthController@submitVehicleGet')->name('/submit-vehicle.Get');
Route::post('/submit-vehicle', 'CatalogueAuthController@submitVehiclePost')->name('/submit-vehicle.Post');
Route::post('/submit-image', 'CatalogueAuthController@submitImagePost')->name('/submit-image.Post');


/* Catalogue Delete Data*/
Route::get('/delete/vehicle/{vehicleId}', 'CatalogueAuthController@deleteVehicle')->name('/delete/vehicle/id');
Route::get('/delete/vehicle/{vehicleId}/yes', 'CatalogueAuthController@deleteVehicle')->name('/delete/vehicle/id/yes');
Route::get('/delete/image/{imageId}', 'CatalogueAuthController@deleteImage')->name('/delete/image/id');


/* Catalogue Modify Data*/
Route::get('/modify/vehicle/{id}', 'CatalogueAuthController@modifyVehicleID')->name('/modify/vehicle/id');
Route::post('/submit-vehicle/{id}', 'CatalogueAuthController@modifyVehicleIDPost')->name('/submit-vehicle/id');


/* Auth */
Auth::routes();
Route::get('/login', function () {
    return view('auth.login');
})->name('login');
Route::get('/home', 'HomeController@index')->name('/home');


