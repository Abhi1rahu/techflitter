<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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
Route::get("/",[HomeController::Class,'home']);

Route::post("/save-details",[HomeController::Class,'saveDetails']);

Route::get("/view-details",[HomeController::Class,'viewDetails']);
Route::any("/delete/{id}",[HomeController::Class,'deleteDetails']);
//Route::any('/', 'HomeController@home');