<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController; 
use App\Http\Controllers\AuthController;
use OpenApi\Annotations as OA;

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

/**
 * @OA\Info(
 *     title="API Documentation",
 *     version="1.0.0",
 *     description="This is the API documentation for the product management application.",
 *     @OA\Contact(
 *         name="Your Name",
 *         email="your-email@example.com"
 *     )
 * )
 */


Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::middleware('auth:api')->group(function () {
    Route::get('/products', [ProductController::class, 'index']);
    Route::get('/products/{id}', [ProductController::class, 'show']);
});

