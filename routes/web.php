<?php

use App\Http\Controllers\Admin\MovieController;
use App\Http\Controllers\CatalogController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')
    ->middleware('basic.auth')
    ->name('admin.')
    ->group(function () {
        Route::get('movies/import', [MovieController::class, 'importForm'])->name('movies.import.form');
        Route::post('movies/import', [MovieController::class, 'import'])->name('movies.import');
        Route::resource('movies', MovieController::class);
    });

Route::get('/movies', [CatalogController::class, 'index'])->name('catalog.index');
Route::get('/movies/{movie}', [CatalogController::class, 'show'])->name('catalog.show');

Route::redirect('/', '/movies');
