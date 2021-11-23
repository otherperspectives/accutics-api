<?php

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


// Users Routes

Route::get('users', [\App\Http\Controllers\UserController::class, 'index']);
Route::get('user/search', [\App\Http\Controllers\UserController::class, 'show']);

// Campaigns Routes
Route::get('campaigns', [\App\Http\Controllers\CampaignController::class, 'index']);
Route::get('campaign/search', [\App\Http\Controllers\CampaignController::class, 'search']);
Route::post('campaign', [\App\Http\Controllers\CampaignController::class, 'store']);

