<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\indexController;

// Маршутиризация для главной страницы
Route::get("/", [indexController::class, "indexPage"])->name("index");