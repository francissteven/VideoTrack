<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ScormController;

Route::get('/', [MainController::class, 'index'])->name('videos');
Route::get('/scorm', [ScormController::class, 'index'])->name('scorm');
