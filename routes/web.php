<?php

use App\Http\Controllers\DataMasterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MasterImagesController;
use App\Http\Controllers\NavigationController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::middleware('guest')->group(function () {
    Route::get('/', function () {
        return view('frontend.welcome');
    });
});

Auth::routes();


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    Route::resource('roles', RoleController::class);
    Route::resource('navigation', NavigationController::class);
    Route::resource('permissions', PermissionController::class);
    Route::resource('users', UserController::class);


    //Route Data Master
    Route::get('/data-master', [DataMasterController::class, 'index'])->name('data-master');
    Route::prefix('data-master')->group(function () {
        Route::resource('master-images', MasterImagesController::class);
    });
    

});
