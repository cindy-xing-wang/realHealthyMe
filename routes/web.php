<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HealthProfessionalController;

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
    return view('auth/login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::group(['middleware'=>['auth','admin']], function(){
//     Route::resource('healthProfessional', HealthProfessionalController::class);
// });

Route::resource('healthProfessional', HealthProfessionalController::class);