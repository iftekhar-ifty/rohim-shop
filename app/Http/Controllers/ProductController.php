<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Image;
class ProductController extends Controller
{
    public function create()
    {

    
    	  return view('main.product.create');
    }

   
    public function store(Request $request)
    {
         
        $validatedData = $request->validate([
         'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
 
        ]);
 
		if ($request->has('image')) {
            $image=$request->file('image');
          $imageName = 'product-'.'-'.time().'.'.$image->getClientOriginalExtension();

          $post = Image::make($image)->resize(260,260)->save(base_path('public/storage/uploads/'.$imageName));
			}
   

        $save = new Product;
        $save->name = $request->title;
        $save->image = $imageName;
        $save->price = $request->price;
        $save->off_price = $request->off_price;
        $save->expiry = $request->expiry;
        $save->save();

 
        return back()->with('status', 'product Uploads');
 
    }

    public function edit($id)
    {
    	$product = Product::find($id);
    	  return view('main.product.edit', compact('product'));
    }
    public function update(Request $request, $id)
    {
   		
   		$save = Product::find($id);
 
		
   
        $save->name = $request->title;
        if ($request->has('image')) {
            $image=$request->file('image');
          $imageName = 'product-'.'-'.time().'.'.$image->getClientOriginalExtension();

          $post = Image::make($image)->resize(260,260)->save(base_path('public/storage/uploads/'.$imageName));
        $save->image = $imageName;
			}else{
        $save->image = $save->image;
				
			}
        $save->price = $request->price;
        $save->off_price = $request->off_price;
        $save->expiry = $request->expiry;
        $save->save();

 
        return back()->with('status', 'product Update Successfully');
    }

    public function delete($id)
    {
    	$delteData = Product::find($id);
    	$delteData->delete();
    	  return back()->with('status', 'Product Deleted Successfully');
    }
}
