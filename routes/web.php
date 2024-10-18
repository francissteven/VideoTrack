<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ScormController;
use App\Http\Controllers\VideojsController;

Route::get('/', [MainController::class, 'index'])->name('videos');
Route::get('/scorm', [ScormController::class, 'index'])->name('scorm');
Route::get('/videojs', [VideojsController::class, 'index'])->name('videojs');
