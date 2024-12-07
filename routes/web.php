<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/loginform',[AuthController::class, 'loginform'])->name('login-form');
Route::middleware(['auth','role:admin'])->group(function(){
Route::get('/admin-dashboard',[AuthController::class, 'admindashboard'])->name('admindashboard');



});
Route::middleware(['auth','role:user'])->group(function(){
   
    Route::get('/user-dashboard',[AuthController::class, 'userdashboard'])->name('userdashboard');
    
    
    });

Route::post('/login',[AuthController::class, 'login'])->name('login');

Route::post('/logout',[AuthController::class, 'logout'])->name('logout');