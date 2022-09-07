<?php

use App\Http\Controllers\Auth\LoginController as AuthLoginController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Quotes\QuotesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('/user_login_check', [AuthLoginController::class, 'check'])->name('check_user');

Route::middleware('auth:api')->group(function () {
    Route::get('/quotes_list', [QuotesController::class, 'fetch_random_quotes'])->name('fetch_random_quotes');

});
