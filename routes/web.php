<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/kuliner', [App\Http\Controllers\HomeController::class, 'kuliner'])->name('kuliner');
Route::get('/hotel', [App\Http\Controllers\HomeController::class, 'hotel'])->name('hotel');
Route::get('/tentang', [App\Http\Controllers\HomeController::class, 'tentang'])->name('tentang');

Route::prefix('admin')->group(function () {

    // dashboard 
    Route::get('', [App\Http\Controllers\Admin\IndexController::class, 'index'])->name('dashboard');

    Route::resource('wisata', App\Http\Controllers\Admin\WisataController::class, [
        'as' => 'admin',
        // 'only' => ['index', 'edit', 'store', 'destroy', 'show', 'update']
    ]);
    Route::resource('kuliner', App\Http\Controllers\Admin\KulinerController::class, [
        'as' => 'admin',
        // 'only' => ['index', 'edit', 'store', 'destroy', 'show', 'update']
    ]);

    Route::resource('hotel', App\Http\Controllers\Admin\HotelController::class, [
        'as' => 'admin',
        // 'only' => ['index', 'edit', 'store', 'destroy', 'show', 'update']
    ]);
    
});