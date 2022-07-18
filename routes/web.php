<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeLoginController;
use App\Http\Controllers\MailSendingController;
use App\Http\Controllers\SMTPController;

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
    return view('welcome');
})->name('home');

Route::resource('employee',EmployeeLoginController::class);
Route::resource('smtp',SMTPController::class);
Route::resource('mail',MailSendingController::class);
