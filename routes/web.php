<?php

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
    return redirect(route('login'));
});

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('dashboard');

Route::get('/verify-payment/{id}', 'PaymentVerificationController@verifyPayment')->name('payment-verify');

Route::group(['middleware' => ['auth']], function () {
    Route::post('/transfer-payment', 'PaymentController@transferPayment')->name('payment-transfer');
    Route::get('/transactions', 'PaymentController@transactions')->name('payment-account');
});