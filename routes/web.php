<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\indexController;
use App\Http\Controllers\loginController;

// Маршутиризация для главной страницы
Route::get("/", [indexController::class, "indexPage"])->name("index_page");

// Маршутиризация для страницы входа
Route::get("/login", [loginController::class, "loginPage"])->name("login_page");
Route::post("/login", [loginController::class, "processingForm"])->name("login_form");