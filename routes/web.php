<?php

use App\Http\Controllers\MyFirstController;
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


Auth::routes();
Route::get('/students', [MyFirstController::class,'index']);
Route::get('/create', [MyFirstController::class,'create']);
Route::post('/students', [MyFirstController::class,'store']);
Route::delete('/students/{id}', [MyFirstController::class, 'destroy']); 
Route::get('/students/{id}', [MyFirstController::class, 'edit']); 
Route::patch('/student/{id}', [MyFirstController::class, 'update']); 


Route::get('/home', [App\Http\Controllers\MyFirstController::class, 'index']);


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
