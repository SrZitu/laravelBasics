<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BladePracticeController extends Controller
{
    public function page(Request $request)
    {
        $num1 = $request->num1;
        $num2 = $request->num2;
        $sum = $num1 + $num2;
        $data = ['result' => $sum];
        return view('page.home', $data);
    }
    function  dataRetrive()
    {
        $users = [
            ['name' => "sazzadur ", 'job' => "Laravel Developer"],
            ['name' => "sakibur ", 'job' => "Assistant Engineer"],
            ['name' => "shahriar ", 'job' => "AI Engineer"],
            ['name' => "Zahinul ", 'job' => "BB AD"]
        ];
        return view('page.foreachData', ['users' => $users]);
    }
    function showLayout()
    {
        return view('home');
    }

    //Middleware
    function checkRequest()
    {
        return "HLLO FROM SRZ";
    }

    function redeirect1()
    {
        return "from redirect 1";
    }
    function redeirect2()
    {
        return "from redirect 2";
    }
    function hello1()
    {
        return "from hello 1";
    }
    function hello2()
    {
        return "from hello 2";
    }
    function hello3()
    {
        return "from hello 3";
    }

    //manipulate request
   function manipulateRequest(Request $request){
    $result= $request->header();
    return response()->json($result);
   }
}
