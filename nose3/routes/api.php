<?php

use App\Http\Controllers\SongController;
use Illuminate\Support\Facades\Route;

Route::apiResource('songs', SongController::class);


