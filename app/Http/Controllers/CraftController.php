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


        // ===============Advanced joining where we can apply conditon in joining=========
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


        /*       ================Where===============
         The most basic call to the where method requires three arguments.
         The first argument is the name of the column. The second argument is an operator,
         which can be any of the database's supported operators.
         The third argument is the value to compare against the column's value.
         */

        /* ===============  ->where()  ===============
            ===============  ->where()   ===============
         It works like and operation in which 2 where conditions needed to satisfy condity
        If any of the where condition is false then return null

         */
        //  $data = DB::table('products')
        //  ->where('price', '=', 2000)
        //  ->where('title', 'LIKE', '%Slipper%')
        //  ->get();
        //  return $data;


        /* ===============  ->where()  ===============
            ===============  ->orwhere()   ===============*/

        //Here if two conditions staisty seperately and two conditions satisfied result will be showed
        //  $data = DB::table('products')
        //  ->where('price', '=', 3000)
        //  ->orwhere('title', 'LIKE', '%Slipper%')
        //  ->get();
        //  return $data;

        /* ===============  ->whereNot()  ===============*/

        //Exclude the where no column in database
        //  $data = DB::table('products')
        //  ->where('price', '=', 3000)
        //  ->whereNOt('title', 'LIKE', '%Slipper%')
        //  ->get();
        //  return $data;

        /*===============  ->orwhereNot()  ===============*
            its like         ->where()
                            ->orwhere()
                                                         */
        //  $data = DB::table('products')
        //  ->where('price', '=', 3000)
        //  ->orwhereNOt('title', 'LIKE', '%Shoe%')
        //  ->get();
        //  return $data;

        /* ===============  ->whereBetween()  ===============*/

        // $data = DB::table('products')
        // ->whereBetween('price', [10, 1000])
        // ->get();
        // return $data;

        /* ===============  ->whereNotBetween()  ===============*/

        // $data = DB::table('products')
        // ->whereNotBetween('price', [10, 2000])
        // ->get();
        // return $data;

        /* ===============  -> whereBetweenColumns()  ===============
       The whereBetweenColumns method verifies that a column's value is between the two values of two columns in the same table row:
         */
        // $patients = DB::table('patients')
        //     ->whereBetweenColumns('weight', ['minimum_allowed_weight', 'maximum_allowed_weight'])
        //     ->get();

        /* ===============  -> whereIn()  ===============*/
        // $data = DB::table('products')
        //     ->whereIn('id', [1, 3, 10])
        //     ->get();
        // return $data;

        /* ===============  -> whereNotIn()  ===============*/
        // $data = DB::table('products')
        //     ->whereNotIn('id', [1,2,4,6,8,10,12,14,16,18,20])
        //     ->get();
        // return $data;


        /* ===============  -> whereNull()  ===============*/
        // $data = DB::table('products')
        // ->whereNull('price')
        // ->get();
        // return $data;

        /* ===============  -> whereNull()  ===============*/
        // $data = DB::table('products')
        // ->whereNotNull('price')
        // ->get();
        // return $data;

        /* ===============  -> whereDate()  ===============
        The whereDate method may be used to compare a column's value against a date:
        */
        // $data = DB::table('products')
        // ->whereDate('updated_at', '2023-08-05 ')
        // ->get();
        // return $data;

        /* ===============  -> whereMonth()  ===============
      The whereMonth method may be used to compare a column's value against a specific month:
        */
        // $data = DB::table('products')
        // ->whereMonth('updated_at', '08 ')
        // ->get();
        // return $data;


        /* ===============  -> whereDay()  ===============
        The whereDay method may be used to compare a column's value against a specific Day:
        */
        // $data = DB::table('products')
        // ->whereDay('updated_at', '05 ')
        // ->get();
        // return $data;

        /* ===============  -> whereYear()  ===============
        The whereYear method may be used to compare a column's value against a specific Year:
        */
        // $data = DB::table('products')
        // ->whereYear('created_at', '2022')
        // ->get();
        // return $data;

        /* ===============  -> whereTime()  ===============
        The whereTime method may be used to compare a column's value against a specific Time:
        */
        // $data = DB::table('products')
        // ->whereTime('created_at', '20:08:12')
        // ->get();
        // return $data;

        /* ===============  -> whereColumn()  ===============
         The whereColumn method may be used to verify that two columns are equal:
        */
        // $data = DB::table('products')
        //     ->whereColumn('updated_at', '<', 'created_at')
        //     ->get();
        // return $data;

        /* ===============  -> whereColumn()  ===============
      You may also pass an array of column comparisons to the whereColumn method. These conditions will be joined using the and operator:
        */
        // $data = DB::table('products')
        //     ->whereColumn([
        //         ['category_id', '!=', 'brand_id'],
        //         ['updated_at', '<', 'created_at'],
        //     ])->get();
        // return $data;

        /* ===============  -> orderBy()  ===============
        The orderBy method allows you to sort the results of the query by a given column.
        The first argument accepted by the orderBy method should be the column you wish to sort by,
        while the second argument determines the direction of the sort and may be either asc or desc:

       */

        // $data = DB::table('brands')
        //   ->orderBy('brandName', 'desc')
        //   ->get();
        // return $data;

        // $data = DB::table('products')
        //   ->oldest()
        //   ->first();
        // return $data;

        //    $data = DB::table('products')
        //       ->latest()
        //       ->first();
        //     return $data;

        //  $data = DB::table('products')
        //           ->inRandomOrder()
        //           ->first();
        //         return $data;


        /* ===============  ->The groupBy & having Methods()  ===============
      As you might expect, the groupBy and having methods may be used to group the query results.
      The having method's signature is similar to that of the where method:

       */

        // $data = DB::table('products')
        //     ->groupBy('price')
        //     ->having('price',"<",'1000')
        //     ->get();
        // return $data;

        // $data = DB::table('products')
        //     ->groupBy('price')
        //     ->having('price', '>', 1000)
        //     ->get();

        // return $data;

        // $data = DB::table('products')
        //         ->groupBy('price')
        //         ->havingBetween('price',[20,1000])
        //         ->get();

        //     return $data;


        /* ===============  -> The skip & take Methods()  ===============
        You may use the skip and take methods to limit the number of results returned from the query
        or to skip a given number of results in the query:
       */

        //    $data=DB::table('products')
        //    ->skip(10)
        //    ->take(3)
        //    ->get();
        //    return $data;

        /* ===============  Insert Statements  ===============
        The query builder also provides an insert method that may be used to insert records into the database table.
        The insert method accepts an array of column names and values::
       */
        // $data = DB::table('brands')
        //     ->insert([
        //         'brandName' => 'Xio',
        //         'brandImg' => 'new image'
        //     ]);

        // return $data;


        // $data = DB::table('brands')
        //     ->insertOrIgnore([[
        //         'id'=>10,
        //         'brandName' => 'Xio',
        //         'brandImg' => 'new image'
        //     ],[
        //         'id'=>11,
        //         'brandName' => 'symphone',
        //         'brandImg' => 'symphonet image'
        //     ],
        //     ] );

        // return $data;

        // $data = DB::table('brands')
        //     ->upsert(
        //         [
        //             'id' => 10,
        //             'brandName' => 'Pixel',
        //             'brandImg' => 'new image'
        //         ],
        //         [
        //             'id',
        //             'brandName',
        //             'brandImg'
        //         ]
        //     );

        // return $data;

        // $data = DB::table('brands')
        //     ->where('id', 9)
        //     ->update([
        //         'brandName' => 'Realme',
        //         'brandImg' => 'Realme image'
        //     ]);
        // return $data;

        // $data = DB::table('brands')
        //     ->where('id', 11)
        //     ->delete();
        // return $data;


        //DELETE All data in the TABLE
        // $data = DB::table('brands')
        //     ->truncate()
        // return $data;


    }
}
