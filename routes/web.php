<?php

use App\Http\Controllers\IndexController;
use App\PHPRouter\Route\Route;

Route::get('/', [IndexController::class, 'render'])->name('index');