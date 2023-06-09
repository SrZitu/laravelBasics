<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DemoController;
use App\Http\Controllers\OrmPracticeController;

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

Route::get('/demoaction',  [DemoController::class,'demoAction']);
Route::get('/demoaction/{name}/{age}',  [DemoController::class,'demoInfo']);
Route::post('/demoJsonBody',  [DemoController::class,'requestBody']);
Route::post('/headreq',  [DemoController::class,'requestHeader']);
Route::post('/allrequest/{name}/{age}',  [DemoController::class,'extractAllRequest']);
Route::post('/fileupload',  [DemoController::class,'FileUpload']);
Route::post('/requestIp',  [DemoController::class,'requestIp']);
Route::post('/cookieManage',  [DemoController::class,'cookieManage']);
Route::get('/responseMultiple',  [DemoController::class,'responseMultiple']);
Route::get('/JsonResponse',  [DemoController::class,'JsonResponse']);


Route::get('/{num1}/{num2}',[BladePracticeController::class,'page']);

//for orm craft practice routes
Route::post('/createBrands',[OrmPracticeController::class,'createBrands']);
Route::post('/updateBrand',[OrmPracticeController::class,'updateBrand']);
Route::post('/increase',[OrmPracticeController::class,'increase']);
