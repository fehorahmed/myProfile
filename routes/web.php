<?php

use App\Http\Controllers\AboutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BannerPicController;

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


Route::get('/', [HomeController::class, 'home']);


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('backend.index');
    })->name('dashboard');


    //Test Perpous
    Route::get('/dashboard2', function () {
        return view('backend.dashboard');
    });
    // Banner Section
    Route::get('/admin/banner', [BannerPicController::class, 'index'])->name('admin.banner');
    Route::get('/admin/banner/add', [BannerPicController::class, 'create'])->name('admin.banner.add');
    Route::post('/admin/banner/add', [BannerPicController::class, 'store'])->name('admin.banner.store');
    Route::get('/admin/banner/active/{id}', [BannerPicController::class, 'active'])->name('admin.banner.active');
    Route::get('/admin/banner/edit/{id}', [BannerPicController::class, 'edit'])->name('admin.banner.edit');
    Route::post('/admin/banner/update', [BannerPicController::class, 'update'])->name('admin.banner.update');
    Route::get('/admin/banner/destroy/{id}', [BannerPicController::class, 'destroy'])->name('admin.banner.destroy');

     // About Section
     Route::get('/admin/about', [AboutController::class, 'index'])->name('admin.about');
     Route::get('/admin/about/add', [AboutController::class, 'create'])->name('admin.about.add');
     Route::post('/admin/about/add', [AboutController::class, 'store'])->name('admin.about.store');
     Route::get('/admin/about/active/{id}', [AboutController::class, 'active'])->name('admin.about.active');
     Route::get('/admin/about/edit/{id}', [AboutController::class, 'edit'])->name('admin.about.edit');
     Route::post('/admin/about/update', [AboutController::class, 'update'])->name('admin.about.update');
     Route::get('/admin/about/destroy/{id}', [AboutController::class, 'destroy'])->name('admin.about.destroy');



});



// Route::get('/', function () {
//     return view('welcome');
// });


// Route::get('/admin/home',[AdminController::class,'index'])->name('admin.home');
// Route::get('/admin/bannerpic',[BannerPicController::class,'index'])->name('banner.home');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');


require __DIR__ . '/auth.php';
