<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\BackgroundController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\HomepageController;
use App\Models\Homepage;

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
});

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->name('dashboard.')->prefix('dashboard')->group(function(){
    Route::get('/', [DashboardController::class, 'index'])->name('index');

    Route::middleware(['admin'])->group(function () {
       Route::resource('homepage', HomepageController::class);
       Route::resource('about', AboutController::class);
       Route::resource('faq', FaqController::class);
       Route::resource('background', BackgroundController::class)->only(['index', 'edit', 'update']);
    });
});