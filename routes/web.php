<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\StrukController;
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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::prefix('barang')->group(function () {   
        Route::get('/', [BarangController::class, 'index'])->name('barang.index');
        Route::get('/create', [BarangController::class, 'create'])->name('barang.create');
        Route::post('/store', [BarangController::class, 'store'])->name('barang.store');
        Route::get('/edit/{id}', [BarangController::class, 'edit'])->name('barang.edit');
        Route::patch('/update/{id}', [BarangController::class, 'update'])->name('barang.update');
        Route::delete('/delete/{id}', [BarangController::class, 'destroy'])->name('barang.delete');
    });
    Route::prefix('struk')->group(function () {   
        Route::get('/', [StrukController::class, 'index'])->name('struk.index'); 
        Route::get('/create', [StrukController::class, 'create'])->name('struk.create');
        Route::post('/store', [StrukController::class, 'store'])->name('struk.store');
        Route::get('/show/{id}', [StrukController::class, 'show'])->name('struk.show');
        Route::get('/cetak/{id}', [StrukController::class, 'cetak'])->name('struk.cetak');
        Route::get('/edit/{id}', [StrukController::class, 'edit'])->name('struk.edit');
        Route::patch('/update/{id}', [StrukController::class, 'update'])->name('struk.update');
        Route::delete('/delete/{id}', [StrukController::class, 'destroy'])->name('struk.delete');
    });
});
