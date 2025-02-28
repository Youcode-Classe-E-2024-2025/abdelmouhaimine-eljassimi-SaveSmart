<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FamilyController;
use App\Http\Controllers\TotalBalanceController;
use App\Http\Controllers\SavingGoalController;
use App\Http\Controllers\CategoryController;
use App\Http\Middleware\FamilyAuth;
use App\Http\Middleware\UserAuth;

Route::post('register', [UserController::class, 'register']);
Route::get('register', [UserController::class, 'showRegistrationForm']);
Route::get('login', [UserController::class, 'showLoginForm']);
Route::post('login', [UserController::class, 'login']);



Route::get('/logoutprofile', [FamilyController::class, 'logout']);
Route::get('//logout', [UserController::class, 'logout']);


Route::middleware(UserAuth::class)->group(function () {
    Route::get('/familyform', function () {return view('familyform');});
    Route::get('/family', [FamilyController::class, 'index']);
    Route::post('/createprofile', [FamilyController::class, 'create']);
    Route::post('/validateprofile', [FamilyController::class, 'validateprofile']);
});

Route::middleware(FamilyAuth::class)->group(function () {
    Route::get('/',[UserController::class, 'dashboard']);
    Route::resource('categories', CategoryController::class);
    Route::post('/addMoney', [SavingGoalController::class, 'addMoney']);
    Route::post('/SavingGoal', [SavingGoalController::class, 'SavingGoal']);
});



