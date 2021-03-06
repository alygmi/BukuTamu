<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InputController;
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

Route::get('/welcome', function () 
{
    return view('welcome');
});
Route::get('/', [InputController::class, 'index'])->name('index');
Route::get('/input', [InputController::class, 'create'])->name('inputForm');
Route::get('/show', [InputController::class, 'show'])->name('show')->middleware('auth');

Route::post('/input', [InputController::class, 'input'])->name('input');
Route::get('/update/{id}', [InputController::class, 'updateForm'])->name('updateForm')->where('id', '[0-9]+');
Route::post('/update', [InputController::class, 'update'])->name('update');

Route::get('/delete/{id}', [InputController::class, 'delete'])->name('delete')->where('id','[0-9]+');
Route::get('/login', [LoginController::class, 'index'])->middleware('guest');
Route::get('/register', [RegisterController::class, 'index']);

Route::post('/register', [RegisterController::class, 'store']);
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/logout', [LoginController::class, 'logout']);

Route::post('/logout', [LoginController::class, 'proses_logout'])->name('logout');
