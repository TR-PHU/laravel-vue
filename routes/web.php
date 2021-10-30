<?php

use App\Http\Controllers\User\UserArticleControler;
use App\Http\Controllers\Admin\AdminArticleControler;
use App\Http\Controllers\Admin\UserManageController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeArticleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocationController;
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

Route::get('/', [HomeController::class,'index'])->name('homePage');

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:admin']], function () {
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('adminHome');
    Route::get('/users', [UserManageController::class, 'index'])->name('admin.manageUser');
    Route::get('/users/block/{user}', [UserManageController::class, 'blockUser'])->name('admin.blockUser');
    Route::get('/users/unblock/{user}', [UserManageController::class, 'unblockUser'])->name('admin.unblockUser');
});

Route::group(['prefix' => 'user', 'middleware' => ['auth','checkBlockUser','role:user']], function () {
    Route::resource('article', UserArticleControler::class)->names('userArticle');
});
Route::get('/location/province', [LocationController::class, 'getProvinces'])->name('getProvinces');
Route::get('/location/province/district/{province}', [LocationController::class, 'getDistricts'])->name('getDistricts');
Route::get('/location/province/district/ward/{district}', [LocationController::class, 'getWards'])->name('getWards');
Route::resource('article', HomeArticleController::class)->names('homeArticle');

Route::get('resource/categories', [CategoryController::class, 'index'])->name('getCategories');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
