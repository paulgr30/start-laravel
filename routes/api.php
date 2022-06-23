<?php

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

/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
*/



// Autenticacion
Route::namespace('Core\Actions\Auths')->prefix('v1/auth')->group(function () {
    Route::post('login', 'LoginAction')->name('auth.login');
});

// Auth
Route::middleware('jwt.auth')->namespace('Core\Actions\Auths')->prefix('v1/auth')->group(
    function () {
        Route::post('refresh-token', 'RefreshTokenAction')->name('auth.refresh-token');
        Route::get('profile', 'ProfileAction')->name('auth.profile');
        Route::put('update-profile', 'UpdateProfileAction')->name('auth.update-profile');
        Route::post('change-password', 'ChangePasswordAction')->name('auth.change-password');
        Route::get('logout', 'LogoutAction')->name('auth.logout');
    }
);


// Users
Route::middleware('jwt.auth')->namespace('Core\Actions\Users')->prefix('v1')->group(
    function () {
        Route::get('users', 'GetUsersAction')->name('users.all');
        Route::get('users/bycriteria', 'GetUsersByCriteriaAction')->name('users.bycriteria');
        Route::get('users/{user}', 'GetUserAction')->name('users.show');
        Route::post('users', 'StoreUserAction')->name('users.store');
        Route::put('users/{user}', 'UpdateUserAction')->name('users.update');
        Route::delete('users/{user}', 'DestroyUserAction')->name('users.destroy');
    }
);


// Roles
Route::middleware('jwt.auth')->namespace('Core\Actions\Roles')->prefix('v1')->group(
    function () {
        Route::get('roles', 'GetRolesAction')->name('roles.all');
        Route::get('roles/{role}', 'GetRoleAction')->name('roles.show');
        
    }
);