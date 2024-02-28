<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\EntryController;
use App\Http\Controllers\Web\MainController;
use App\Http\Controllers\Web\LogoutController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\VersionsController;
use App\Http\Controllers\Admin\UsersController;

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

Route::get('/', [MainController::class, 'index'])->name('main');

Route::get('entry', [EntryController::class, 'index'])->name('entry');
Route::post('login', [EntryController::class, 'login'])->name('login');
Route::get('logout', [LogoutController::class, 'logout'])->name('logout');

Route::middleware(['checkDashboardAccess'])->group(function () {
    Route::get('admin', [AdminController::class, 'index'])->name('admin');
    Route::get('users', [UsersController::class, 'index'])->name('users');
    Route::get('users_show/{page}/{limit}', [UsersController::class, 'show'])->name('users_show');
    Route::get('edit_user/{id}', [UsersController::class, 'edit'])->name('edit_user');
    Route::get('create_user', [UsersController::class, 'create'])->name('create_user');
    Route::get('refresh_users_filters', [UsersController::class, 'filters_refresh'])->name('refresh_users_filters');
    Route::post('user_search', [UsersController::class, 'search'])->name('user_search');
    Route::post('user_filters', [UsersController::class, 'filters'])->name('user_filters');
    Route::post('user_update', [UsersController::class, 'update'])->name('user_update');
    Route::post('user_store', [UsersController::class, 'store'])->name('user_store');
    Route::get('versions', [VersionsController::class, 'index'])->name('versions');
    Route::get('create_version', [VersionsController::class, 'create'])->name('create_version');
});