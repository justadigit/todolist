<?php

use App\Http\Controllers\TodoController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::resource('todos', TodoController::class);
Route::put('/todos/{todo}/complete', [TodoController::class, 'complete']);
Route::delete('/todos/{todo}/incomplete', [TodoController::class, 'incomplete']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');