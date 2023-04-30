<?php

use App\Http\Controllers\employeeController;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Expr\PostDec;

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

route::resource('employee', employeeController::class);


Route::get('/', [employeeController::class, 'login']);
Route::post('/login', [employeeController::class, 'checklogin']);

Route::get('edit/{id}', [employeeController::class, 'edit']);
Route::post('edit/{id}', [employeeController::class, 'update']);
Route::get('delete/{id}', [employeeController::class, 'destroy']);
