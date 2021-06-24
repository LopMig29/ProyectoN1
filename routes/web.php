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

Route::middleware(["auth"])->group(function () {
    Route::get('/students', [MyFirstController::class,'index']);
    Route::get('/create', [MyFirstController::class,'create']);
    Route::post('/students', [MyFirstController::class,'store']);
    Route::delete('/students/{id}', [MyFirstController::class, 'destroy']);
    Route::get('/students/{id}', [MyFirstController::class, 'edit']);
    Route::patch('/student/{id}', [MyFirstController::class, 'update']);

    Route::get('/students-vue',[StudentsController::class, 'index']);
    Route::get('/students-vue/list',[StudentsController::class, 'list']);
    Route::get('/students/edit/{id}', [StudentsController::class, 'edit']);
    Route::put('/student-vue/{id}', [StudentsController::class, 'update']);
    Route::delete('/students-vue/{id}', [StudentsController::class, 'destroy']);

    Route::get('/employees-vue',[EmployeesController::class, 'index']);
    Route::get('employees-vue/create', [EmployeesController::class,'create']);
    Route::post('/employees-vue', [EmployeesController::class,'store']);
    Route::patch('/employees-vue/{id}', [EmployeesController::class, 'update']);
    Route::get('/employees-vue/list',[EmployeesController::class, 'list']);
    Route::get('/employees-vue/{id}', [EmployeesController::class, 'edit']);
    Route::delete('/employees-vue/{id}', [EmployeesController::class, 'destroy']);    
});