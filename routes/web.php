<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ServicesController;
use App\Http\Controllers\Admin\AboutsController;
use App\Http\Controllers\Admin\PagesController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Admin\PricingController;
use App\Http\Controllers\Admin\TeamController;
use Illuminate\Support\Facades\Route;

use \Mcamara\LaravelLocalization\Facades\LaravelLocalization;






Route::group(['prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function (){


    require __DIR__.'/auth.php';
    Route::get('/', [HomeController::class, 'index'])->name('home');


});




Route::get('/logout', function () {
    return view('site.home');
})->name('logout');



Route::group(['middleware' => ['auth']], function () {
    Route::get('/admin', [AdminController::class,'index'])->name('admin');
    Route::resources([
        'admin/services'  => ServicesController::class,
        'admin/abouts' => AboutsController::class,
        'admin/pages' => PagesController::class,
        'admin/portfolio' => PortfolioController::class,
        'admin/team' => TeamController::class,
        'admin/pricing' => PricingController::class,

    ]);

});
