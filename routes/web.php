<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\MyFirstController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/students', [MyFirstController::class,'index'])->middleware('auth');
Route::get('/create', [MyFirstController::class,'create'])->middleware('auth');
Route::post('/students', [MyFirstController::class,'store'])->middleware('auth');
Route::delete('/students/{id}', [MyFirstController::class, 'destroy'])->middleware('auth');
Route::get('/students/{id}', [MyFirstController::class, 'edit'])->middleware('auth');
Route::patch('/student/{id}', [MyFirstController::class, 'update'])->middleware('auth');

Route::get('/students-vue',[StudentsController::class, 'index'])->middleware('auth');
Route::get('/students-vue/list',[StudentsController::class, 'list'])->middleware('auth');
Route::get('/students/edit/{id}', [StudentsController::class, 'edit'])->middleware('auth');
Route::put('/student-vue/{id}', [StudentsController::class, 'update'])->middleware('auth');
Route::delete('/students-vue/{id}', [StudentsController::class, 'destroy'])->middleware('auth');

Route::get('/employees-vue',[EmployeesController::class, 'index'])->middleware('auth');
Route::get('employees-vue/create', [EmployeesController::class,'create'])->middleware('auth');
Route::post('/employees-vue', [EmployeesController::class,'store'])->middleware('auth');
Route::patch('/employees-vue/{id}', [EmployeesController::class, 'update'])->middleware('auth');
Route::get('/employees-vue/list',[EmployeesController::class, 'list'])->middleware('auth');
Route::get('/employees-vue/{id}', [EmployeesController::class, 'edit'])->middleware('auth');
Route::delete('/employees-vue/{id}', [EmployeesController::class, 'destroy'])->middleware('auth');