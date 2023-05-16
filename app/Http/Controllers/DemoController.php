<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
