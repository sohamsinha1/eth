<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/admin',function() {

return view('auth.login');

});

Route::get('/profile', function () {
    return view('auth.profile');

})->middleware('auth');

Route::get('/users', function () {
    return view('auth.users');

})->middleware('auth');

Route::get('/company', function () {
    return view('auth.company');

})->middleware('auth');

Route::get('/company_users',function() {

return view('auth.companyuser');
})->middleware('auth');

// Route::get('/nur', function () {
//     return view('auth.nurse');

// })->middleware('auth');


// This is a route for insert data 
// Route::get('/insert',[App\Http\Controllers\Auth\LoginController::class, 'insert']);
Route::get('/login/admin',[App\Http\Controllers\Auth\LoginController::class, 'index']);
Route::post('/processlogin',[App\Http\Controllers\Auth\LoginController::class, 'processlogin']);
// Route::get('/login/admin',[App\Http\Controllers\Auth\LoginController::class, 'index']);
Route::get('/users_list',[App\Http\Controllers\Auth\LoginController::class, 'users_list']);
Route::get('/company_list',[App\Http\Controllers\Auth\LoginController::class, 'company_list']);
Route::get('/company_user/{id}',[App\Http\Controllers\Auth\LoginController::class, 'company_user'])->name('company.list');
Route::get('/logout',[App\Http\Controllers\Auth\LoginController::class, 'logout']);
// Route::get('/doctor_verify',[App\Http\Controllers\Auth\LoginController::class, 'image_view']);
// Route::DELETE('/pat_del/{id}',[App\Http\Controllers\Auth\LoginController::class, 'pat_del'])->name('patient.destroy');
// Route::DELETE('/doc_del/{id}',[App\Http\Controllers\Auth\LoginController::class, 'doc_del'])->name('doctor.destroy');
// Route::DELETE('/nurse_del/{id}',[App\Http\Controllers\Auth\LoginController::class, 'nur_del'])->name('nurse.destroy');
// // Route::DELETE('/doc_appr/{id}',[App\Http\Controllers\Auth\LoginController::class, 'doc_appr'])->name('doctor.approve');
// Route::DELETE('/doc_appr',[App\Http\Controllers\Auth\LoginController::class, 'doc_appr'])->name('doctor.approve');
Auth::routes();

    // Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
