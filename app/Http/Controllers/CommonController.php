<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommonController extends Controller
{
    /**
     * Do logic to show first table
     */

     private function doLogicFirst() {
        $result = DB::table('categories as C')
        ->join('products as P','P.category_id','=','C.category_id')
        ->join('suppliers as S','S.supplier_id','=','P.supplier_id')
        ->select('C.category_name','P.product_name','S.supplier_name')
        ->get();
        return $result;

     }

     /**
     * Do logic to show second table
     */

     private function doLogicSecond() {
        $result = DB::table('products as P')
        ->leftJoin('prices as PR','PR.product_id','=','P.product_id')
        ->select('P.product_name','PR.price')
        ->groupBy('P.product_name')
        ->get();
        return $result;
     }


     /**
     * Do logic to show third table
     */

     private function doLogicthird() {
        $result = DB::table('categories as C')
        ->join('products as P','P.category_id','=','C.category_id')
        ->join('suppliers as S','S.supplier_id','=','P.supplier_id')
        ->join('prices as PR','PR.product_id','=','P.product_id')
        ->select('PR.price','C.category_name','P.product_name','S.supplier_name')
        ->get();
        return $result;

     }

     /**
     * Do logic to show fourth table
     */

     private function doLogicFourth() {
        $result = DB::table('products as P')
        ->join('categories as C','C.category_id','=','P.category_id')
        ->join('suppliers as S','S.supplier_id','=','P.supplier_id')
        ->leftJoin('prices as PR','PR.product_id','=','P.product_id')
        ->select(DB::raw('avg(PR.price) as price,count(S.supplier_name) as total_product'),'S.supplier_name')
        ->groupBy('S.supplier_name')
        ->get();
        return $result;
     }

     /**
     * Proccess data after button click
     */

     public function tableOne(Request $request) {
        $table1 = $this->doLogicFirst();
        $table2 = $this->doLogicSecond();
        $table3 = $this->doLogicThird();
        $table4 = $this->doLogicFourth();
        return response()->json(['table1'=>$table1,'table2'=>$table2,'table3'=>$table3,'table4'=>$table4], 200);
    } 
}
