<?php

use App\Http\Controllers\AdminCheckerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeLoginController;
use App\Http\Controllers\MailSendingController;
use App\Http\Controllers\Role;
use App\Http\Controllers\SMTPController;
use App\Http\Controllers\UserRole;

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

Route::get('login',function(){
    return view('auth.login');
})->name('login');

Route::resource('employee',EmployeeLoginController::class);
Route::resource('smtp',SMTPController::class);
Route::resource('mail',MailSendingController::class);
Route::resource('role',Role::class);
Route::resource('acl-user',UserRole::class);
Route::resource('adminchecker',AdminCheckerController::class);
Route::get('/get-my-roles', [Role::class,'getPermissions'])->name('my-roles');
Route::post('/add-permission', [Role::class,'addPermission'])->name('add-permission');
Route::get('getUserByRole',[UserRole::class,'getUserByRole'])->name('get_users_by_role');
Route::post('assign_role_to_user',[UserRole::class,'assign_role_to_user'])->name('assign_role_to_user');
