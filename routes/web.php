<?php

use App\Http\Controllers\IndexController;
use App\PHPRouter\Route\Route;

Route::get('/', [IndexController::class, 'render'])->middleware('auth')->name('index');