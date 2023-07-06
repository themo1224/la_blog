<?php

use App\Http\Controllers\dummyApi;

use App\Http\Controllers\PostController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('data', [dummyApi::class, 'getdata']);
// ------------   POST  ------------------------------
Route::post('/add_post', [PostController::class, 'add_post']);
Route::get('get_post', [PostController::class, 'get_posts']);
Route::get('get_post/{slug}', [PostController::class, 'show']);


// -----------     CATEGORY      -------------------------------
Route::resource('get_category', \App\Http\Controllers\CategoryController::class);
