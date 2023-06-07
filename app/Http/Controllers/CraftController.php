<?php

namespace App\Http\Controllers;

use Illuminate\Database\Query\JoinClause;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CraftController extends Controller
{
    function demoAction()
    {
        //retrive all data of a table using get() method
        // $data = DB::table('products')->get();
        // return $data;

        //retriving single data

        //first() retrives the first row
        //$data=DB::table('products')->where('id','4')->first();

        //retrive data of specific id
        //$products = DB::table('products')->find(3);

        //retrive data of one column using pluck()
        // $brandName = DB::table('brands')->distinct()->pluck('brandName');
        // return $brandName;

        //retriving single colmn data in key value pair
        //2 ta value use korle object akare data return kore .2nd ta key and first ta value mean kore
        // $brandName = DB::table('brands')->pluck('brandImg', 'brandName');
        // return $brandName;

        // aggregating functions
        // $price=DB::table('products')->count();
        // $price=DB::table('products')->max('price');
        // $price=DB::table('products')->min('price');
        // $price=DB::table('products')->avg('price');
        // $price = DB::table('products')->sum('price');
        // return $price;

        // select returns the columns we want to retrive
        // distinct() helps to get columns unique value only.
        // $data=DB::table('products')->select('title')->distinct()->get();
        // return $data;

        //
        /*=================================Joining=============================================

        The query builder may also be used to add join clauses to your queries.
        To perform a basic "inner join", you may use the join method on a query builder instance.
        The first argument passed to the join method is the name of the table you need to join to,
        while the remaining arguments specify the column constraints for the join.
        You may even join multiple tables in a single query:

        ===================================================================================================*/
        // $result = DB::table('products')
        //     ->join('categories', 'products.category_id', '=', 'categories.id')
        //     ->join('brands', 'products.brand_id', '=', 'brands.id')
        //     ->select('products.id', 'products.title', 'products.remark', 'categories.categoryName', 'brands.brandName')
        //     ->get();
        // return $result;

        //  $result = DB::table('products')
        //     ->leftJoin('categories', 'products.category_id', '=', 'categories.id')
        //     ->leftJoin('brands', 'products.brand_id', '=', 'brands.id')
        //     ->select('products.id', 'products.title', 'products.remark', 'categories.categoryName', 'brands.brandName')
        //     ->get();
        // return $result;

        // $result = DB::table('products')
        //     ->rightJoin('categories', 'products.category_id', '=', 'categories.id')
        //     ->rightJoin('brands', 'products.brand_id', '=', 'brands.id')
        //     ->select('products.id', 'products.title', 'products.remark', 'categories.categoryName', 'brands.brandName')
        //     ->get();
        // return $result;

        // $result = DB::table('products')
        //     ->crossJoin('brands')
        //     ->get();
        // return $result;

        // advanced joining where we can apply conditon in joining
        // $result = DB::table('products')
        //     ->join('categories', function (JoinClause $join) {
        //         $join->on('products.category_id', '=', 'categories.id')
        //             ->where('products.price', '>', 2000);
        //     })
        //     ->join('brands', function (JoinClause $join) {
        //         $join->on('products.brand_id', '=', 'brands.id')
        //             ->where('brands.brandName', '=', 'easy');
        //     })
        //     ->get();
        // return $result;

        /*                          ======Subquery Joins=====
       You may use the joinSub, leftJoinSub, and rightJoinSub methods to join a query to a subquery.
       Each of these methods receives three arguments: the subquery, its table alias, and a closure that defines the related columns.
       */
        // $latestProduct = DB::table('products')
        //     ->select('products.id','products.title','products.remark','products.price')
        //     ->where('products.price', '=',2000)
        //     ->groupBy('products.id', 'products.title', 'products.remark','products.price');

        // $users = DB::table('brands')
        //     ->joinSub($latestProduct, 'products', function (JoinClause $join) {
        //         $join->on('brands.id', '=', 'products.id');
        //     })->get();
        // return $users;


        /*       ================Union===============
        The query builder also provides a convenient method to "union" two or more queries together.
         For example, you may create an initial query and use the union method to union it with more queries:
        */
        // $query1 = DB::table('products')->where('products.price', '<', 2000);
        // $query2 = DB::table('products')->where('products.price', '=', 5000);
        // $result = $query1->union($query2)->get();
        // return $result;
    }
}
