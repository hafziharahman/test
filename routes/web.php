<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GalleryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [AuthController::class, 'index']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/registrasi', [AuthController::class, 'registrasi']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/logout', [AuthController::class, 'logout']);
Route::middleware(['auth'])->group(function () {
    Route::get('/page', [GalleryController::class, 'index'])->middleware('web');
    Route::post('/store', [GalleryController::class, 'store'])->name('.store')->middleware('web');
    Route::get('/show', [GalleryController::class, 'show'])->middleware('web');
    Route::get('/images/{id}/edit', [GalleryController::class, 'edit'])->name('images.edit');
    Route::put('/images/{id}', [GalleryController::class, 'update'])->name('images.update');
    Route::delete('/delete/{id}', [GalleryController::class, 'destroy'])->name('images.destroy');
    Route::get('/data_saya', [GalleryController::class, 'data_saya'])->name('.data_saya')->middleware('web');
    Route::post('/images/{imageId}/addComment', [GalleryController::class, 'addComment'])->name('images.addComment');
    Route::get('/detail_image/{id}', [GalleryController::class, 'detail_image'])->name('detail_image')->middleware('web');

});



