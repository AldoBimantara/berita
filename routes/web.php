<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\UserController;
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

Route::get('/', [NewsController::class, 'index'])->name('index');
Route::get('/news-details/{newsId}', [NewsController::class, 'details'])->name('news.details');
Route::get('/login-page', [AuthController::class, 'showLoginForm'])->name('guest.login-form');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['admin']], function () {
    Route::get('/admin/dashboard', [AuthController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/news/data', [NewsController::class, 'data'])->name('admin.news.data');
    Route::post('/admin/news/store', [NewsController::class, 'store'])->name('admin.news.store');
    Route::get('/admin/news/edit/{newsId}', [NewsController::class, 'edit'])->name('admin.news.edit');
    Route::put('/admin/news/update/{newsId}', [NewsController::class, 'update'])->name('admin.news.update');
    Route::delete('/admin/news/destroy/{newsId}', [NewsController::class, 'destroy'])->name('admin.news.destroy');
});