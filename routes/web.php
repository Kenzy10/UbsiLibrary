<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibraryController;

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

Route::get('/', [LibraryController::class, 'index']);

Route::prefix('/library')->name('library.')->group(function() {
    Route::get('/', [LibraryController::class, 'index'])->name('index');
    Route::get('/data', [LibraryController::class, 'data'])->name('data');
    Route::post('/store', [LibraryController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [LibraryController::class, 'edit'])->name('edit');
    Route::patch('/update/{id}', [LibraryController::class, 'update'])->name('update');
    Route::delete('/destroy/{id}', [LibraryController::class, 'destroy'])->name('destroy');
});
