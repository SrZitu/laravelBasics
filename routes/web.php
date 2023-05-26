<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\DemoMiddleware;
use App\Http\Controllers\DemoController;
use App\Http\Controllers\BladePracticeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/hello', function () {
    return "Hello World";
});

Route::get('/demoaction',  [DemoController::class, 'demoAction']);
Route::get('/demoaction/{name}/{age}',  [DemoController::class, 'demoInfo']);
Route::post('/demoJsonBody',  [DemoController::class, 'requestBody']);
Route::post('/headreq',  [DemoController::class, 'requestHeader']);
Route::post('/allrequest/{name}/{age}',  [DemoController::class, 'extractAllRequest']);
Route::post('/formdata',  [DemoController::class, 'MultipartFormData']);
Route::post('/fileupload',  [DemoController::class, 'FileUpload']);
Route::post('/requestIp',  [DemoController::class, 'requestIp']);
Route::post('/cookieManage',  [DemoController::class, 'cookieManage']);
Route::get('/responseMultiple',  [DemoController::class, 'responseMultiple']);
Route::get('/JsonResponse',  [DemoController::class, 'JsonResponse']);
Route::get('/redirectResponse',  [DemoController::class, 'redirectResponse']);
Route::get('/fileBinary',  [DemoController::class, 'fileBinary']);
Route::get('/fileDOwnload',  [DemoController::class, 'fileDOwnload']);
Route::get('/responseCookie',  [DemoController::class, 'responseCookie']);
Route::get('/attachHeaderResponse',  [DemoController::class, 'attachHeaderResponse']);
Route::get('/returnView',  [DemoController::class, 'returnView']);
Route::get('/logs/{num1}/{num2}',  [DemoController::class, 'logs']);
Route::get('/sessionPut/{email}',  [DemoController::class, 'sessionPut']);
Route::get('/sessionPull}',  [DemoController::class, 'sessionPull']);
Route::get('/sessionGet}',  [DemoController::class, 'sessionGet']);
Route::get('/sessionForget}',  [DemoController::class, 'sessionForget']);
Route::get('/sessionFlush}',  [DemoController::class, 'sessionFlush']);

//module 14 assignment routes
Route::post('/retriveName',  [DemoController::class, 'retriveName']);
Route::post('/userAgent',  [DemoController::class, 'userAgent']);
Route::get('/page', [DemoController::class, 'page']);
Route::get('/responseJson',  [DemoController::class, 'responseJson']);
Route::post('/fileUP',  [DemoController::class, 'fileUP']);
Route::get('/rememberCookie',  [DemoController::class, 'rememberCookie']);
Route::post('/submit', function (Request $request) {
    $email = $request->input('email');
    if ($email) {
        $responseData = [
            'success' => true,
            'message' => 'Form submitted successfully.'
        ];
        return response()->json($responseData);
    } else {
        return "Please Enter Email";
    }
});

//module 15 Blade Practicing Route

//Middleware
// Route::get('/checkRequest',[BladePracticeController::class,'checkRequest'])->middleware([DemoMiddleware::class]);
// Route::get('/redeirect1',[BladePracticeController::class,'redeirect1'])->middleware([DemoMiddleware::class]);
// Route::get('/redeirect2',[BladePracticeController::class,'redeirect2'])->middleware([DemoMiddleware::class]);

//middilware to a group route
Route::middleware(['demo'])->group(function(){
    Route::get('/hello1/{key}', [BladePracticeController::class, 'hello1']);
    Route::get('/hello2/{key}', [BladePracticeController::class, 'hello2']);
    Route::get('/hello3/{key}', [BladePracticeController::class, 'hello3']);

});



Route::get('/{num1}/{num2}',[BladePracticeController::class,'page']);

Route::get('/dataRetrive', [BladePracticeController::class, 'dataRetrive']);


//maseter layout concept route
Route::get('/', [BladePracticeController::class, 'showLayout']);

