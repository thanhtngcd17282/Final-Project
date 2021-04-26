<?php

use App\Http\Controllers\Admin\Dashboard;
use App\Http\Controllers\Admin\VideoController;
use Illuminate\Support\Facades\Route;

Route::get('dashboard', [Dashboard::class,'index'])->name('dashboard.index');

Route::get('videos',[VideoController::class,'index'])->name('videos.index');
Route::get('videos/user/{id}',[VideoController::class,'videoByUser'])->name('videos.videoByUser');
Route::get('videos/store/{id}',[VideoController::class,'store'])->name('videos.store');
Route::get('videos/restore/{id}',[VideoController::class,'restore'])->name('videos.restore');

Route::resources([
    'users' => UserController::class
]);
