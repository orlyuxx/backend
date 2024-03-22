<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CarouselItemsController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\StudentController;
use App\Http\Controllers\Api\PlayerController;
use App\Http\Controllers\Api\PromptController;
use App\Http\Controllers\Api\AuthController;
use App\Models\Prompt;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Public APIs
Route::post('/login',   [AuthController::class, 'login'])->name('user.login');
Route::post('/user',    [UserController::class, 'store'])->name('user.store');

// Private APIs
Route::middleware(['auth:sanctum'])->group(function () {

    Route::post('/logout', [AuthController::class, 'logout'])->name('user.logout');

    // Carousel Items
    Route::controller(CarouselItemsController::class)->group(function () {
        Route::get('/carousel',             'index');
        Route::get('/carousel/{id}',        'show');
        Route::post('/carousel',            'store');
        Route::put('/carousel/{id}',        'update');
        Route::delete('/carousel/{id}',     'destroy');
    });

    // User
    Route::controller(UserController::class)->group(function () {
        Route::get('/user',                 'index');
        Route::get('/user/{id}',            'show');
        Route::put('/user/{id}',            'update')->name('user.update');
        Route::put('/user/email/{id}',      'update_email')->name('user.email');
        Route::put('/user/password/{id}',   'update_password')->name('user.password');
        Route::delete('/user/{id}',         'destroy');
    });
    

});


 
// Student
Route::get('/student', [StudentController::class, 'index']);
Route::post('/student', [StudentController::class, 'store']);

// Player
Route::get('/player', [PlayerController::class, 'index']); 
Route::get('/player/{id}', [PlayerController::class, 'show']);
Route::post('/player', [PlayerController::class, 'store']);

// Prompts
Route::get('/prompt', [PromptController::class, 'index']);
Route::get('/prompt/{id}', [PromptController::class, 'show']);
Route::delete('/prompt/{id}', [PromptController::class, 'destroy']);
Route::post('/prompt', [PromptController::class, 'store']);