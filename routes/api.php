<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookAuthorsController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\AuthorsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\LoansController;

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

Route::post('/login', [AuthController::class, 'login']);


Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::apiResource('user', UsersController::class);
    Route::apiResource('author', AuthorsController::class);
    Route::apiResource('book', BooksController::class);
    Route::apiResource('book_author', BookAuthorsController::class);
    Route::apiResource('loan', LoansController::class);

    // Route::get('user-count', [UsersController::class, 'usercount']);     
    // Route::get('book-count', [BooksController::class, 'bookcount']);     
    // Route::get('loan-count', [LoansController::class, 'loancount']);     
});
