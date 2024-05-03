<?php

use App\Http\Controllers\DataController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/productType', [DataController::class, 'getProductType']);
Route::get('/products', [DataController::class, 'getProduct']);
// Route::get('/products/list', [DataController::class, 'getProductList']);
Route::get('/products/group', [DataController::class, 'getProductGroup']);
Route::get('/products/grade/quantity', [DataController::class, 'getProductGradeCounts']);
Route::get('/products/size/quantity', [DataController::class, 'getProductSizeCounts']);
Route::get('/products/connection/quantity', [DataController::class, 'getProductConnectionCounts']);

