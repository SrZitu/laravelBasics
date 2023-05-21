<?php

use App\Http\Controllers\DemoController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

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
Route::post('/retriveName',  [DemoController::class, 'retriveName']);
Route::post('/userAgent',  [DemoController::class, 'userAgent']);
Route::get('/page/{page?}', [DemoController::class, 'page']);
Route::get('/responseJson',  [DemoController::class, 'responseJson']);
Route::post('/fileUP',  [DemoController::class, 'fileUP']);
Route::get('/rememberCookie',  [DemoController::class, 'rememberCookie']);
Route::post('/submit', function (Illuminate\Http\Request $request) {
    $email = $request->input('email');

    $responseData = [
        'success' => true,
        'message' => 'Form submitted successfully.'
    ];

    return response()->json($responseData);
});

