<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BladePracticeController extends Controller
{
    public function page(Request $request){
        $num1=$request->num1;
        $num2=$request->num2;
        $sum=$num1+$num2;
        $data=['result'=>$sum];
        return view('page.home',$data);
    }
}
