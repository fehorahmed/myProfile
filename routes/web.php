<?php

use App\Http\Controllers\AboutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BannerPicController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ServiceController;

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

     // Experience Section
     Route::get('/admin/experience', [ExperienceController::class, 'index'])->name('admin.experience');
     Route::get('/admin/experience/add', [ExperienceController::class, 'create'])->name('admin.experience.add');
     Route::post('/admin/experience/add', [ExperienceController::class, 'store'])->name('admin.experience.store');
     Route::get('/admin/experience/active/{id}', [ExperienceController::class, 'active'])->name('admin.experience.active');
     Route::get('/admin/experience/edit/{id}', [ExperienceController::class, 'edit'])->name('admin.experience.edit');
     Route::post('/admin/experience/update', [ExperienceController::class, 'update'])->name('admin.experience.update');
     Route::get('/admin/experience/destroy/{id}', [ExperienceController::class, 'destroy'])->name('admin.experience.destroy');

     // Education Section
     Route::get('/admin/education', [EducationController::class, 'index'])->name('admin.education');
     Route::get('/admin/education/add', [EducationController::class, 'create'])->name('admin.education.add');
     Route::post('/admin/education/add', [EducationController::class, 'store'])->name('admin.education.store');
     Route::get('/admin/education/active/{id}', [EducationController::class, 'active'])->name('admin.education.active');
     Route::get('/admin/education/edit/{id}', [EducationController::class, 'edit'])->name('admin.education.edit');
     Route::post('/admin/education/update', [EducationController::class, 'update'])->name('admin.education.update');
     Route::get('/admin/education/destroy/{id}', [EducationController::class, 'destroy'])->name('admin.education.destroy');

     // Service Section
     Route::get('/admin/service', [ServiceController::class, 'index'])->name('admin.service');
     Route::get('/admin/service/add', [ServiceController::class, 'create'])->name('admin.service.add');
     Route::post('/admin/service/add', [ServiceController::class, 'store'])->name('admin.service.store');
     Route::get('/admin/service/active/{id}', [ServiceController::class, 'active'])->name('admin.service.active');
     Route::get('/admin/service/edit/{id}', [ServiceController::class, 'edit'])->name('admin.service.edit');
     Route::post('/admin/service/update', [ServiceController::class, 'update'])->name('admin.service.update');
     Route::get('/admin/service/destroy/{id}', [ServiceController::class, 'destroy'])->name('admin.service.destroy');

     // Project Section
     Route::get('/admin/project', [ProjectController::class, 'index'])->name('admin.project');
     Route::get('/admin/project/add', [ProjectController::class, 'create'])->name('admin.project.add');
     Route::post('/admin/project/add', [ProjectController::class, 'store'])->name('admin.project.store');
     Route::get('/admin/project/active/{id}', [ProjectController::class, 'active'])->name('admin.project.active');
     Route::get('/admin/project/edit/{id}', [ProjectController::class, 'edit'])->name('admin.project.edit');
     Route::post('/admin/project/update', [ProjectController::class, 'update'])->name('admin.project.update');
     Route::get('/admin/project/destroy/{id}', [ProjectController::class, 'destroy'])->name('admin.project.destroy');



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
