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
}
