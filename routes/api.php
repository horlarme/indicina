<?php

use App\Http\Controllers\DecodeController;
use App\Http\Controllers\EncodeController;
use Illuminate\Support\Facades\Route;

Route::post('encode', EncodeController::class);
Route::get('decode/{url}', DecodeController::class);
