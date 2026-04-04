<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ParadiseController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\GalleryController;
use App\Models\gallery;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/about', function() {
    return view('aboutus'); 
})->name('about');
Route::get('/showuser', [ServiceController::class, 'userindex'])->name('service');
Route::view('/contact', 'contact');
Route::post('/contact', [ParadiseController::class, 'store']);
//admin route
Route::get('/admin/login', [AuthController::class, 'showLogin']);
Route::post('/admin/login', [AuthController::class, 'login']);
Route::get('/admin/logout', [AuthController::class, 'logout']);
Route::middleware('admin')->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    });
    
    
    Route::view('/servicelisting', 'userservice');
    Route::get('/admin/service', [ServiceController::class, 'index'])->name('admin.service.index');
    Route::post('admin/service/status/{id}', [ServiceController::class, 'status'])
    ->name('admin.service.status');
    Route::get('/admin/service/create', [ServiceController::class, 'create'])->name('create.service');
    Route::post('/admin/service', [ServiceController::class, 'store']);
    Route::get('/admin/service/edit/{id}', [ServiceController::class, 'edit'])->name('admin.service.edit');
    Route::post('/admin/service/update/{id}', [ServiceController::class, 'update']);
    Route::delete('/admin/service/delete/{id}', [ServiceController::class, 'destroy'])->name('admin.service.delete');
    //contacts route
    Route::get('/admin/contacts', [ParadiseController::class, 'index']);
    //gallery route
    Route::get('/gallery', [GalleryController::class, 'indexuser'])->name('gallery');
    Route::get('/admin/gallery', [GalleryController::class, 'index'])->name('admin.gallery');
    Route::post('/admin/gallery', [GalleryController::class, 'store']);
    Route::get('/admin/gallery/create', [GalleryController::class, 'create'])->name("gallery.create");
    Route::get('admin/gallery/edit/{id}', [GalleryController::class, 'edit'])
    ->name('admin.gallery.edit');
    Route::post('admin/gallery/update/{id}', [GalleryController::class, 'update'])
    ->name('admin.gallery.update');
    Route::delete('/admin/gallery/delete/{id}', [GalleryController::class, 'destroy'])->name("admin.delete");
});
