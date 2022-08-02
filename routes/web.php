<?php

use App\Http\Controllers\ACLPermissions;
use App\Http\Controllers\AdminCheckerController;
use App\Http\Controllers\AssignRoleToPermission;
use App\Http\Controllers\AUTHController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeLoginController;
use App\Http\Controllers\MailSendingController;
use App\Http\Controllers\Role;
use App\Http\Controllers\SMTPController;
use App\Http\Controllers\UserRole;
use App\Http\Controllers\MailController;

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


Route::resource('login',AUTHController::class);
Route::get('/login',[AUTHController::class,'index'])->name('login');


Route::get('send-mail', [MailController::class, 'sendMail'])->name('sendMail');


Route::middleware('auth')->group(function(){
    Route::get('add-role',function(){
        return view('acl.role.addroles');

    });
    Route::get('add-permission-info',function(){
        return view('acl.permission.addpermission');

    });
    Route::get('/logout',[AUTHController::class,'logout'])->name('logout');
    Route::get('/', [AUTHController::class,'home'])->name('home');
    Route::resource('employee',EmployeeLoginController::class);
    Route::resource('smtp',SMTPController::class);
    Route::resource('mail',MailSendingController::class);
    Route::resource('role',Role::class);
    Route::resource('acl-user',UserRole::class);
    Route::resource('permission',ACLPermissions::class);

    Route::post('/mail-accept/{id}',[AdminCheckerController::class,'accept'])->name('mailrequest.accept');
    Route::post('/mail-reject/{id}',[AdminCheckerController::class,'reject'])->name('mailrequest.reject');
    Route::resource('adminchecker',AdminCheckerController::class);
    Route::get('/adminchecks',[AdminCheckerController::class,'getInfos'])->name('adminchecker.getInfos');
    Route::get('/get-my-roles', [Role::class,'getPermissions'])->name('my-roles');
    Route::post('/add-permission', [Role::class,'addPermission'])->name('add-permission');
    Route::get('getUserByRole',[UserRole::class,'getUserByRole'])->name('get_users_by_role');
    Route::post('assign_role_to_user',[UserRole::class,'assign_role_to_user'])->name('assign_role_to_user');

    Route::get('publish-mail',[MailSendingController::class,'publishMail'])->name('publishmail');
    Route::resource('assign-role-permission', AssignRoleToPermission::class);
    Route::post('assingRoleToPermissions',[AssignRoleToPermission::class,'assingRoleToPermissions'])->name('assingRoleToPermissions');

});

