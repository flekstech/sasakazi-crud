<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

use App\Models\User;

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
    $users = User::where('id','!=',Auth::user()->id)->get();
    return view('index',compact('users'));
})->middleware('auth');

Auth::routes();
Route::resource('users', UserController::class)->middleware('auth');


