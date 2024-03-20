<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CarouselItemsController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\StudentController;
use App\Http\Controllers\Api\PlayerController;
use App\Http\Controllers\Api\PromptController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Carousel Items
Route::get('/carousel', [CarouselItemsController::class, 'index']);
Route::get('/carousel/{id}', [CarouselItemsController::class, 'show']);
Route::post('/carousel', [CarouselItemsController::class, 'store']);
Route::put('/carousel/{id}', [CarouselItemsController::class, 'update']);
Route::delete('/carousel/{id}', [CarouselItemsController::class, 'destroy']);

// User
Route::get('/user', [UserController::class, 'index']);
Route::get('/user/{id}', [UserController::class, 'show']);
Route::post('/user', [UserController::class, 'store'])->name('user.store');
Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');
Route::put('/user/email/{id}', [UserController::class, 'update_email'])->name('user.email');
Route::put('/user/password/{id}', [UserController::class, 'update_password'])->name('user.password');
Route::delete('/user/{id}', [UserController::class, 'destroy']);
 
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