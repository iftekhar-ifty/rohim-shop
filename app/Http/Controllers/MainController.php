<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class MainController extends Controller
{
    public function index(Request $request)
    {

    	$products = Product::take(6)->get();
      
        return view('main', compact('products'));
    }


    public  function more_data(Request $request){
        if($request->ajax()){
            $skip=$request->skip;
            $take=6;
            $products=Product::skip($skip)->take($take)->get();
            return response()->json($products);
        }else{
            return response()->json('Direct Access Not Allowed!!');
        }
    }

    public function filterPrice(Request $request)
    {
    	$maxPrice =  $request->max;
    	 $products = Product::where('off_price', '<', $maxPrice)->get();
    	 return view('main', compact('products'));
    }
    public function filterDate(Request $request)
    {
    	 $maxDate =  $request->date;
    	 $products = Product::whereDate('expiry', '<=', $maxDate)->get();
    	 return view('main', compact('products'));
    }

     public function search(Request $request)
    {
    	 $searchData =  $request->searchData;
    	 $products = Product::query()
					   ->where('name', 'LIKE', "%{$searchData}%")
					   ->get();
    	 return view('main', compact('products'));
    }

    public function admin()
    {
    		$products = Product::latest()->get();
    	  return view('main.dashboard', compact('products'));
    }
}
