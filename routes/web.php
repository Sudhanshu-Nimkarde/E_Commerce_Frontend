<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;



// Route::get('/', function () {
//     $response = Http::get('http://localhost:8000/api/ping');
//     return view('welcome', ['message' => $response->json('message')]);
// });

Route::get('/', function () {
    return view('home');
});

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/addUser', [AuthController::class, 'addUser'])->name('addUser');

Route::post('/login-user', [AuthController::class, 'loginUser'])->name('login.submit');


Route::get('/dashboard', [DashboardController::class, 'viewDashboard'])
    ->middleware('check.token')
    ->name('dashboard');
