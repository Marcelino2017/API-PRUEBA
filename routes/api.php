<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CourseController;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/* Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
}); */

Route::get('/course', [CourseController::class, 'index']);
Route::post('/course', [CourseController::class, 'store']);
Route::get('/course/{course}', [CourseController::class, 'show']);
Route::put('/course/{course}', [CourseController::class, 'update']);
Route::delete('/course/{course}', [CourseController::class, 'destroy']);

//categorias
Route::get('/category', [CategoryController::class, 'index']);
Route::post('/category', [CategoryController::class, 'store']);
Route::get('/category/{category}', [CategoryController::class, 'show']);
Route::put('/category/{category}', [CategoryController::class, 'update']);
Route::delete('/category/{category}', [CategoryController::class, 'destroy']);
