<?php

use App\Http\Controllers\DecodeController;
use App\Http\Controllers\EncodeController;
use App\Http\Controllers\StatController;
use Illuminate\Support\Facades\Route;

Route::post('encode', EncodeController::class);
Route::get('decode/{url}', DecodeController::class)
    ->name('decode');
Route::get('statistic/{url}', StatController::class)
    ->name('stats');
