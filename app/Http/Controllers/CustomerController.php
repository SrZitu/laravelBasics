<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
          //$data = DB::table('posts')->get();
        //   $data=DB::table('posts')->where('id','4')->first();
        // $data=DB::table('posts')->select('name','gender')->distinct()->get();
        //  $data=DB::table('posts')->select('name','gender')->distinct()->get();

        //$data = DB::table('posts')->select('name', 'gender', 'age')->where('name', 'vel')->get();
        //return $data;

        //$name = DB::table('posts')->where('name', 'qui')->value('age');
        //return  $name;

        // $post = DB::table('customers')->find(3);
        // return $post;
        // $names = DB::table('customers')->pluck('name');
        // $data = [];

        // foreach ($names as $name) {
        //     $data[] = ['name' => $name];
        // }

        // // Cast the data array to an object
        // $dataObject = json_decode(json_encode($data), false);

        // return response()->json($dataObject);

        $posts= DB::table('customers')->select('name');
        $added =$posts->addSelect('age')->get();
       
        return $added;
        //dd($added);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCustomerRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
