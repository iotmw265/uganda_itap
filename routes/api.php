<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataUploadController;

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

Route::group(['middleware' => ['auth:sanctum']], function() {

    Route::post("logout", [\App\Http\Controllers\UserController::class, "logoutAPI"]);
    
    Route::get('get-user-profile', [\App\Http\Controllers\UserController::class, "userProfileAPI"]);

   

    

    Route::post('/UserDetails', [\App\Http\Controllers\TempController::class, 'UserDetails' ]);
    
    Route::post('update', [\App\Http\Controllers\TempController::class, 'update' ]);

    Route::post('getUserData', [\App\Http\Controllers\TempController::class, 'getUserData' ]);

    
});


Route::post('/send-post-request',[DataUploadController::class, 'insert' ]);

Route::post('/generator_parameters', 'App\Http\Controllers\DataUploadController@receiveData')->name('generator_post');



// Route::post('user/subscription/payment/callback', [\App\Http\Controllers\TempController::class, "userSubscriptionCallback"]);

Route::post('login', [\App\Http\Controllers\UserController::class, 'loginAPI']);

Route::post('/create-users', [\App\Http\Controllers\CreateUsersController::class, 'createUserEntries']);



Route::post('/latest', [\App\Http\Controllers\TempController::class, 'getLatestTemperature' ]);

Route::post('/aggregated-data', [\App\Http\Controllers\TempController::class, 'getAggregatedData']);

Route::get('/bt-status', [\App\Http\Controllers\TempController::class, 'getUpsStatus']);

Route::get('/ll-status', [\App\Http\Controllers\TempController::class, 'getUpsStatusLL']);

Route::get('/fuel-status', [\App\Http\Controllers\TempController::class, 'fuel']);