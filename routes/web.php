<?php

use App\Http\Controllers\homecontroller;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\homecontroller;
// use App\Http\Controllers\RegisterController;

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
    return view('home');
});
Route::middleware('auth')->get('/home', [homecontroller::class,'index']);

Route::get('/login', [homecontroller::class,'login'])->name('login');

Route::post('login',[homecontroller::class,'verify']);

Route::get('/register',[homecontroller::class,'register']);

Route::get('/users',[homecontroller::class,'user']);

Route::get('user/{id}',[homecontroller::class,'edit']);

Route::get('user/delete/{id}',[homecontroller::class,'delete']);

Route::post('user/{id}',[homecontroller::class,'update']);

Route::post('/register',[homecontroller::class,'store']);
Route::post('/logout',[homecontroller::class,'logout']);
Route::get('/profile',[homecontroller::class,'profile']);
Route::post('/profile/{id}',[homecontroller::class,'profile_update']);

