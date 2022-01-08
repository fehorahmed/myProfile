<?php

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
    //
    Route::get('/admin/banner', [BannerPicController::class, 'index'])->name('admin.banner');
    Route::get('/admin/banner/add', [BannerPicController::class, 'create'])->name('admin.banner.add');
    Route::post('/admin/banner/add', [BannerPicController::class, 'store'])->name('admin.banner.store');
    Route::get('/admin/banner/active/{id}', [BannerPicController::class, 'active'])->name('admin.banner.active');
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
