<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController; 
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

Route::get('/', [LoginController::class,'index'])->name('login')->middleware('guest');
Route::get('/loginAdmin', [LoginController::class,'loginAdmin']);
Route::post('/authenticateAdmin', [LoginController::class,'authenticateAdmin']);
Route::get('/homeAdmin', [LoginController::class,'homeAdmin'])->middleware('auth:admin');
Route::post('/logout', [LoginController::class,'logout']);
Route::post('/login', [LoginController::class, 'login'])->name('login');


Route::get('/register', [RegisterController::class,'index'])->middleware('guest');
Route::get('/reg', [RegisterController::class,'reg'])->middleware('auth:admin');
Route::post('/registerMember',[RegisterController::class,'register'])->middleware('guest');

Route::get('/delete-member/{id}', [RegisterController::class, 'delete'])->middleware('auth:admin');
Route::get('/view-member/{id}', [RegisterController::class, 'detail'])->name('view-member')->middleware('auth');
Route::get('/edit-member/{id}', [RegisterController::class, 'edit']);
Route::put('/update-member/{id}', [RegisterController::class, 'update']);



