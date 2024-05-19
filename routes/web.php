<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DepartamentController;
use BeyondCode\LaravelWebSockets\Apps\AppProvider;
use BeyondCode\LaravelWebSockets\Dashboard\DashboardLogger;
use Illuminate\Http\Request;
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/gate', [App\Http\Controllers\AuthorizationController::class, 'index'])->name('gate')->middleware('can:isAdmin');

// Show Register/Create Form
Route::get('/create', [UserController::class, 'create'])->can('isAdmin');

// Create New User
Route::post('/users', [UserController::class, 'store'])->can('isAdmin');

Route::get('employee/{departament}', 'App\Http\Controllers\UserController@getUsers')->name('employee')->can('isAdmin');

Route::get('/home', [DepartamentController::class, 'index']);

// Route::get('/dep', [DepartamentController::class, 'getDepartament']);
// Route::post('/add', [DepartamentController::class, 'create'])->name('add');

Route::get('dep',['uses'=>'App\Http\Controllers\DepartamentController@getDepartament'])->name('dep')->can('isAdmin');
Route::post('add',['uses'=>'App\Http\Controllers\DepartamentController@create'])->name('add')->can('isAdmin');


// Update User
Route::get('/edit/{user}', [UserController::class, 'edit'])->name('edit')->middleware('can:update,user');

Route::put('/upd/{user}', [UserController::class, 'update'])->name('update')->middleware('can:update,user');

Route::get('/delete/{user}', [UserController::class,'destroy'])->name('delete')->can('isAdmin');

Route::get('/create', [UserController::class, 'create'])->can('isAdmin');

Route::post('/addE', [UserController::class, 'store'])->can('isAdmin');




