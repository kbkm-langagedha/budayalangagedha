<?php

use App\Http\Controllers\AnggotaTeamController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\ContactController as AdminContactController;
use App\Http\Controllers\DataGambarController;
use App\Http\Controllers\DataMasterController;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\ArtikelController as FrontendArtikelController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\GaleryController;
use App\Http\Controllers\Frontend\HomeController as FrontendHomeController;
use App\Http\Controllers\Frontend\KalenderController;
use App\Http\Controllers\Frontend\ModulController;
use App\Http\Controllers\Frontend\ObjekKebudayaanController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KalenderRitualController;
use App\Http\Controllers\MasterArtikelController;
use App\Http\Controllers\MasterImagesController;
use App\Http\Controllers\ModulPembelajaranController;
use App\Http\Controllers\NavigationController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Models\DataGambar;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', [FrontendHomeController::class, 'welcome'])->name('welcome');
Route::get('/artikel', [FrontendArtikelController::class, 'artikel'])->name('artikel');
Route::get('/artikel/{slug}', [FrontendArtikelController::class, 'show'])->name('artikel.show');
Route::get('/modul', [ModulController::class, 'modul'])->name('modul');
Route::post('/modul/increment-view/{id}', [ModulController::class, 'incrementView'])->name('modul.increment-view');
Route::get('/kalender-ritual', [KalenderController::class, 'kalender'])->name('kalender-ritual');
Route::get('/kalender-ritual/month/{bulan}', [KalenderController::class, 'getRitualsByMonth'])->name('kalender-ritual.month');
Route::get('/tentang-desa', [AboutController::class, 'tentangDesa'])->name('tentang-desa');
Route::get('galeri-desa', [GaleryController::class, 'galeryDesa'])->name('galeri-desa');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::prefix('objek-budaya')->group(function () {
    Route::get('/', [ObjekKebudayaanController::class, 'objekBudaya'])->name('objek-budaya');
    Route::get('/objek1', [ObjekKebudayaanController::class, 'objek1'])->name('objek-budaya.objek1');
    Route::get('/objek2', [ObjekKebudayaanController::class, 'objek2'])->name('objek-budaya.objek2');
    Route::get('/objek3', [ObjekKebudayaanController::class, 'objek3'])->name('objek-budaya.objek3');
    Route::get('/objek4', [ObjekKebudayaanController::class, 'objek4'])->name('objek-budaya.objek4');
    Route::get('/objek5', [ObjekKebudayaanController::class, 'objek5'])->name('objek-budaya.objek5');
});

Auth::routes();


Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    Route::resource('roles', RoleController::class);
    Route::resource('navigation', NavigationController::class);
    Route::resource('permissions', PermissionController::class);
    Route::resource('users', UserController::class);

    Route::prefix('admin')->group(function () {

        //Route Data Master
        Route::get('data-master', [DataMasterController::class, 'index'])->name('data-master');
        Route::prefix('data-master')->group(function () {
            Route::resource('master-images', MasterImagesController::class);
            Route::resource('master-artikel', MasterArtikelController::class);
        });

        //Route Data Gambar
        Route::get('data-gambar', [DataGambarController::class, 'index'])->name('data-gambar.index');
        Route::post('data-gambar', [DataGambarController::class, 'store'])->name('data-gambar.store');
        Route::put('data-gambar/{id}', [DataGambarController::class, 'update'])->name('data-gambar.update');
        Route::delete('data-gambar/{image}', [DataGambarController::class, 'destroy'])->name('data-gambar.destroy');

        //Route Anggota Team
        Route::get('anggota-team', [AnggotaTeamController::class, 'index'])->name('anggota-team.index');
        Route::get('anggota-team/create', [AnggotaTeamController::class, 'create'])->name('anggota-team.create');
        Route::post('anggota-team', [AnggotaTeamController::class, 'store'])->name('anggota-team.store');
        Route::get('anggota-team/{anggotaTeam}/edit', [AnggotaTeamController::class, 'edit'])->name('anggota-team.edit');
        Route::put('anggota-team/{anggotaTeam}', [AnggotaTeamController::class, 'update'])->name('anggota-team.update');
        Route::delete('anggota-team/{anggotaTeam}', [AnggotaTeamController::class, 'destroy'])->name('anggota-team.destroy');

        //Route Artikel
        Route::get('data-artikel', [ArtikelController::class, 'index'])->name('data-artikel.index');
        Route::get('data-artikel/create', [ArtikelController::class, 'create'])->name('data-artikel.create');
        Route::post('data-artikel', [ArtikelController::class, 'store'])->name('data-artikel.store');
        Route::get('data-artikel/{dataArtikel}', [ArtikelController::class, 'show'])->name('data-artikel.show');
        Route::get('data-artikel/{dataArtikel}/edit', [ArtikelController::class, 'edit'])->name('data-artikel.edit');
        Route::put('data-artikel/{dataArtikel}', [ArtikelController::class, 'update'])->name('data-artikel.update');
        Route::delete('data-artikel/{dataArtikel}', [ArtikelController::class, 'destroy'])->name('data-artikel.destroy');

        //Route Modul Pembelajaran
        Route::get('modul-pembelajaran', [ModulPembelajaranController::class, 'index'])->name('modul-pembelajaran.index');
        Route::get('modul-pembelajaran/create', [ModulPembelajaranController::class, 'create'])->name('modul-pembelajaran.create');
        Route::post('modul-pembelajaran', [ModulPembelajaranController::class, 'store'])->name('modul-pembelajaran.store');
        Route::get('modul-pembelajaran/{modulPembelajaran}', [ModulPembelajaranController::class, 'show'])->name('modul-pembelajaran.show');
        Route::get('modul-pembelajaran/{modulPembelajaran}/edit', [ModulPembelajaranController::class, 'edit'])->name('modul-pembelajaran.edit');
        Route::put('modul-pembelajaran/{modulPembelajaran}', [ModulPembelajaranController::class, 'update'])->name('modul-pembelajaran.update');
        Route::delete('modul-pembelajaran/{modulPembelajaran}', [ModulPembelajaranController::class, 'destroy'])->name('modul-pembelajaran.destroy');

        Route::get('kalender-ritual', [KalenderRitualController::class, 'index'])->name('kalender-ritual.index');
        Route::get('kalender-ritual/create', [KalenderRitualController::class, 'create'])->name('kalender-ritual.create');
        Route::post('kalender-ritual', [KalenderRitualController::class, 'store'])->name('kalender-ritual.store');
        Route::get('kalender-ritual/{ritual}', [KalenderRitualController::class, 'show'])->name('kalender-ritual.show');
        Route::get('kalender-ritual/{ritual}/edit', [KalenderRitualController::class, 'edit'])->name('kalender-ritual.edit');
        Route::put('kalender-ritual/{ritual}', [KalenderRitualController::class, 'update'])->name('kalender-ritual.update');
        Route::delete('kalender-ritual/{ritual}', [KalenderRitualController::class, 'destroy'])->name('kalender-ritual.destroy');

        Route::get('data-contact', [AdminContactController::class, 'dataKontak'])->name('data-contact.index');
        Route::get('data-contact/{id}', [AdminContactController::class, 'show'])->name('data-contact.show');
        Route::post('data-contact/{id}/mark-read', [AdminContactController::class, 'markAsRead'])->name('data-contact.mark-read');
        Route::delete('data-contact/{id}', [AdminContactController::class, 'destroy'])->name('data-contact.destroy');
        Route::get('data-contact/unread/count', [AdminContactController::class, 'getUnreadCount'])->name('data-contact.unread-count');
    });
});
