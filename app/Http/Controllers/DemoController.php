<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class DemoController extends Controller
{
    public function demoAction()
    {
        return "Hello from Demo Controller";
    }

    /*
Request class provides a way to access the data that was submitted with an HTTP request.
The demoInfo() function takes a Request object as its only argument. It then uses the name and age properties of the request object
to get the name and age of the user who submitted the request.Finally, it returns a string that contains the user's name and age.
*/
    function demoInfo(Request $request): string
    {
        $name = $request->name;
        $age = $request->age;
        return  "Name is  $name and age is  $age";
    }

    public function requestBody(Request $request): array
    {

        //returning all the json data as array
        //if we want  to save data from json body then we use $request->input
        return  $request->input();
    }

    public function requestHeader(Request $request): string
    {
        $name = $request->header('name');
        $age = $request->header('age');
        $address = $request->header('address');
        //returning all the json data as array
        // return  $request->header();
        return  "Name is  $name and age is  $age and address is $address";
    }

    public function extractAllRequest(Request $request): array
    {
        $name = $request->name;
        $age = $request->age;
        $pin = $request->header(key: 'pin');
        $city = $request->input(key: 'city');
        $postcode = $request->input(key: 'postcode');

        //returning all the extract value as array
        return array(
            "name" => $name,
            "age" => $age,
            "pin" => $pin,
            "city" => $city,
            "postcode" => $postcode
        );
    }

    function MultipartFormData(Request $request): array
    {
        $img = $request->file('photo');
        $fileSize = filesize($img);
        $filetType = filetype($img);
        $originalName = $img->getClientOriginalName();
        $tempFileName = $img->getFilename();
        $extension = $img->extension($img);

        return array(
            'fileSize' => $fileSize,
            'filetType' => $filetType,
            'originalName' => $originalName,
            'tempFileName' => $tempFileName,
            'extension' => $extension,
        );
    }

    function FileUpload(Request $request): bool
    {
        $img = $request->file('photo');
        $photoFIle = $img->storeAs('upload', $img->getClientOriginalName());
        $photoFIle = $img->move(public_path('upload/image'), $img->getClientOriginalName());
        return true;
    }

    function requestIp(Request $request): int
    {
        //return which types of contents are allowed. */* means all content types are allowed.
        // return $request->getAcceptableContentTypes();

        //return the ip address of the client
        // return $request->ip();

        if ($request->accepts(['application/json'])) {
            return 1;
        } else {
            return 0;
        }
    }
    function cookieManage(Request $request): array
    {
        return $request->cookie();
    }
    /*============================Response  Formate========================*/

    function responseMultiple(Request $request): int|string|array|bool|null
    {
        //return true;
        //multiple array

        //returing this array as json as a response
        //return response()->json(['name'=>"sakib","age"=>13]);

        return array(
            array(
                "name" => "sazzad",
                "age" => "30"
            ),

            array(
                "name" => "zitu",
                "age" => "29"
            )



        );
    }

    function JsonResponse(): JsonResponse
    {
        $code = 201;
        $msg = "success";
        $data = ['name' => "sakib", "age" => 13];
        return response()->json(['msg' => $msg, "data" => $data], $code);
    }

    // redirected to demoaction route

    function redirectResponse()
    {
        return  redirect('/demoaction');
    }

    function fileBinary()
    {
        $photoFIle = 'upload/image/BMI-Calculator.png';
        return response()->file($photoFIle);
    }

    function fileDOwnload()
    {
        $photoFIle = 'upload/image/BMI-Calculator.png';
        return response()->download($photoFIle);
    }

    //generating response cookie
    function responseCookie()
    {
        $name = "response_cookie";
        $value = "srz13";
        $minutes = 140;
        $path = "/";
        $domain = $_SERVER['SERVER_NAME'];
        $secure = false;
        $httpOnly = true;

        return response('Hello World')->cookie(
            $name,
            $value,
            $minutes,
            $path,
            $domain,
            $secure,
            $httpOnly
        );
    }

    //ataching headers to response
    function attachHeaderResponse()
    {
        return response("hello")
            ->header('header 1', '111')
            ->header('header 2', '112');
    }

    function returnView()
    {
        //if my view is in specific folder.then give the folder and . then the blade view page name
        //here folder name page and added .index to indicate that it referencing that folder's index view.
        //if we add anoter folder called primary in page folder then the return would be
        //return view('page.primary.index');
        return view('page.index');
    }

    //laravel log
    /*
    To help you learn more about what's happening within your application,
    Laravel provides robust logging services that allow you to log messages to files,
    the system error log, and even to Slack to notify your entire team.
    */
    function logs(Request $request): int

    {
        $sum = $request->num1 + $request->num2;
        Log::info($sum);
        Log::emergency($sum);
        Log::alert($sum);
        Log::critical($sum);
        Log::error($sum);
        Log::warning($sum);
        Log::notice($sum);
        Log::debug($sum);
        return $sum;
    }

    //session
    function sessionPut(Request $request)
    {
        $email = $request->email;
        $request->session()->put('email', $email);
        return true;
    }
    function sessionPull(Request $request)
    {
        //lost the session data after first execution

        return $request->session()->pull('email', 'SESSION MISSiING');
    }
    function sessionGet(Request $request): string
    {
        //getting session again and again
        $value = $request->session()->get('email', 'default');
        return $value;
    }
    function sessionForget(Request $req)
    {
        //for deleting the specific value
        $req->session()->forget('email');
        return true;
    }
    function sessionFlush(Request $req)
    {
        //for deleting the whole session value
        return $req->session()->flush('email');
    }

    /*Question 1:
You have a Laravel application with a form that submits user information using a POST request.
Write the code to retrieve the 'name' input field value from the request and store it in a variable called $name.
*/
    function retriveName(Request $request)
    {
        $name = $request->input('name');
        return $name;
    }
    /*
Question 2:
In your Laravel application, you want to retrieve the value of the 'User-Agent' header from the current request.
Write the code to accomplish this and store the value in a variable called $userAgent.
*/
    function userAgent(Request $request): string
    {

        $userAgent = $request->header('User-Agent');
        return $userAgent;
    }

    /*
Question 3:
You are building an API endpoint in Laravel that accepts a GET request with a 'page' query parameter.
Write the code to retrieve the value of the 'page' parameter from the current request and store it in a variable called $page.
If the parameter is not present, set $page to null.
*/
public function page(Request $request, $page="null")
{
    $page= response()->json(['page' => $page]);
    return $page;
}

    /*Question 4:
Create a JSON response in Laravel with the following data:
*/
    function responseJson(): JsonResponse
    {
        $message = "Success";
        $data = ["name=" => "John Doe", "age" => "25"];
        return response()->json(['message' => $message, 'data' => $data]);
    }

    /*
  Question 5:
You are implementing a file upload feature in your Laravel application.
Write the code to handle a file upload named 'avatar' in the current request and
store the uploaded file in the 'public/uploads' directory. Use the original filename for the uploaded file.
  */
    function fileUP(Request $request)
    {
        $img = $request->file('avatar');
        $photoFIle = $img->storeAs('public/uploads', $img->getClientOriginalName());
    }

    /*
Question 6:
Retrieve the value of the 'remember_token' cookie from the current request in Laravel
and store it in a variable called $rememberToken. If the cookie is not present, set $rememberToken to null.
  */
    function rememberCookie(Request $request)
    {
        $rememberToken = $request->cookie('remember_token', null);
        return $rememberToken;
    }
/*
Question 7:
Create a route in Laravel that handles a POST request to the '/submit' URL.
Inside the route closure, retrieve the 'email' input parameter from the request
and store it in a variable called $email. Return a JSON response with the following data
{
    "success": true,
    "message": "Form submitted successfully."
}
*/

}
