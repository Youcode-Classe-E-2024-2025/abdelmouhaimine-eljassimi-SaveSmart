<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FamilyController;

Route::get('/', function () {
    return view('welcome');
});

Route::post('register', [UserController::class, 'register']);
Route::get('register', [UserController::class, 'showRegistrationForm']);
Route::get('login', [UserController::class, 'showLoginForm']);
Route::post('login', [UserController::class, 'login']);

Route::get('/familyform', function () {return view('familyform');});

Route::get('/family', [FamilyController::class, 'index']);
Route::post('/createprofile', [FamilyController::class, 'create']);

Route::post('/validateprofile', [FamilyController::class, 'validateprofile']);


