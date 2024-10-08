<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\AdminAddController;
use App\Http\Controllers\AdminChangeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckOutController;
use App\Http\Controllers\HeaderAdminController;
use App\Http\Controllers\HeaderController;
use HomepageController;
use App\Http\Controllers\PasswordRecoveryController;
use App\Http\Controllers\ProductDetailsController;
use App\Http\Controllers\ProductListController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomepageController::class, 'index'])->name('homepage');
Route::post('/', [HomepageController::class, 'calculate'])->name('homepage.calculate');

