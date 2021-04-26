<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DonateController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\SearchController;
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

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('video/view/{id}',[VideoController::class, 'index'])->name('video.index');

Route::group(['middleware' => 'auth'], function(){
    //User
    Route::group(['prefix' => 'user','middleware' => 'verified'], function(){
        Route::get('/',[UserController::class, 'index'])->name('user.index');
		Route::post('/update',[UserController::class, 'update'])->name('user.update');
    });


    Route::group(['prefix' => 'video','middleware' => 'verified'], function(){
		Route::get('/manage',[VideoController::class, 'manage'])->name('video.manage');
		Route::post('/create',[VideoController::class, 'create'])->name('video.create');
        Route::get('/finish', [VideoController::class, 'finishVideo'])->name('video.finish');
        Route::post('/{id}/act', [LikeController::class, 'actVideo'])->name('video.act');
    });

    Route::group(['prefix' => 'donate', 'middleware' => 'verified'], function(){
        Route::post('/{id}/donate', [DonateController::class, 'donate'])->name('donate.donate');
    });

    Route::post('/search',[SearchController::class,'search'])->name('search');

    Route::get('/logout',[LoginController::class,'logout']);
});
