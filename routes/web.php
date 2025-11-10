<?php

use App\Http\Controllers\Admin\MovieController;
use App\Http\Controllers\CatalogController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('movies', MovieController::class);
});

Route::get('/', [CatalogController::class, 'index'])->name('catalog.index');
Route::get('/movies/{movie}', [CatalogController::class, 'show'])->name('catalog.show');
