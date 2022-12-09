<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ClienteController;
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
Route::controller(UserController::class)->group(function(){
    Route::get('/', 'login')->name('login');
    Route::get('logout', 'logout')->name('logout'); //url, action(method), route name
    Route::post('validate_login', 'validateLogin')->name('validate_login');
    Route::get('registration', 'registration')->name('registration');
    Route::post('validate_registration', 'validateRegistration')->name('validate_registration');
});

Route::controller(ClienteController::class)->group(function(){
    Route::get('painel/{id}', 'painel')->name('painel');
    Route::get('cliente_form', 'clienteForm')->name('cliente_form');
    Route::post('cliente_insert', 'clienteInsert')->name('cliente_insert');
    Route::get('cliente_edit/{id}', 'clienteEdit')->name('cliente_edit');
    Route::post('cliente_update/{id}', 'clienteUpdate')->name('cliente_update');
    Route::post('cliente_delete/{id}', 'clienteDelete')->name('cliente_delete');
});


//Route::get('/', function () {
 //   return view('welcome');
//});
