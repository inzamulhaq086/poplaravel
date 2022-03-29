<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\DashboardController;
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
    return view('welcome');
});

Route::get('/dashboard',DashboardController::class)->middleware(['auth'])->name('dashboard');
Route::resource('/blog',BlogController::class)->except('show')->middleware(['auth']); //expect diye  function off kore
Route::get('/copypost/{id}',[BlogController::class,'copypost'])->middleware(['auth'])->name('blog.copypost');

require __DIR__.'/auth.php';
