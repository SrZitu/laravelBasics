<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;

class OrmPracticeController extends Controller
{
    public function createBrand(Request $request)
    {
        return  Brand::create($request->input());
    }


    public function updateBrand(Request $request)
    {
        return Brand::where('id', $request->id)->update($request->input());
    }
    public function updateorInsertBrand(Request $request)
    {
        //2 ta parameter nisse, 1st parameter match korbe then match na paile 2nd parameter ta create korbe
        return Brand::updateOrCreate(
            ['brandName' => $request->brandName],
            $request->input()
        );
    }
    public function deleterand(Request $request)
    {
        return Brand::where('id', $request->id)->delete();
    }

    public function increase()
    {
        return Product::where('id', 1)
            ->increment('price', 100);
    }

    public function allbrand()
    {
        // return Brand::get();
        return Brand::all();
    }
    public function singlebrand()
    {
        //    return Brand::first();

        return Brand::find(4);
    }
    public function listOfCol()
    {

        return Brand::pluck('brandName','id');
    }

}
