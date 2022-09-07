<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Quotes\QuotesController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});
Route::get('/register', function () {
    return view('auth.register');
});
Route::post('/store_user', [LoginController::class, 'store'])->name('store_user');

Route::view('/quotes_view', ['quotes.random_quotes']);
Route::get('/quotes_list', [QuotesController::class, 'fetch_random_quotes'])->name('fetch_random_quotes');
Route::view('/quotes_list_with_token', ['quotes.token_quotes']);
