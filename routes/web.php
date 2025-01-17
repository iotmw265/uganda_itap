<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ChartJSController;

use App\Http\Controllers\DataUploadController;

  
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/requestAPI/token', function () {
    return csrf_token();
});

Route::get('/login',function(){return view('login');});

Route::get('/',function(){return view('welcome');});
Route::get('/test',function(){return view('telecom_towers.site_analytics');});

//Route::post('/send-post-request',[DataUploadController::class, 'store' ]);


Route::middleware(['auth'])->group(function() {

Route::get('/home',function(){return view('cards');})->name('home');
    
Route::get('/environmental_monitoring',function(){return view('environmental_monitoring.index');})->name('environmental_monitoring.index');
    //lilongwe
//Route::get('/', [App\Http\Controllers\EnvironmentController::class, 'dashboardEnvironmental'])->name('data_centre.home');
Route::get('/data_centre_monitoring', [App\Http\Controllers\EnvironmentController::class, 'dashboardEnvironmental'])->name('data_centre.dashboard');
Route::get('/data_centre_monitoring/reports', [App\Http\Controllers\EnvironmentController::class, 'environmentalReports'])->name('data_centre.reports');

Route::get('/telecom_towers', [App\Http\Controllers\PowerController::class, 'index'])->name('telecom_towers.index');
Route::get('/power_states/reports', [App\Http\Controllers\PowerController::class, 'reports'])->name('telecom_towers.report');
    Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
});

Auth::routes();
