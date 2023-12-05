<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class productController extends Controller
{
    public function index(){
        return view('product.index',[
            'products' => product::get()
        ]);
    }
    public function create(){
        return view('product.create');
    }
    public function store(Request $request){
        // validation
        $request->validate([
            'name'=> 'required',
            'description'=> 'required',
            'image'=> 'required|mimes:jpeg,jpg,png,gif|max:1000'
        ]);

        // upload image
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('products') , $imageName);
        
        $product = new Product;
        $product->image = $imageName;
        $product->name = $request->name;
        $product->description = $request->description;

        $product->save();
        return back()->withSuccess('Product Created !!!!');
    }

    public function edit($id){
        $product = Product::where('id' , $id)->first();
        return view('product.edit', ['product' => $product]);
    }

    public function update(Request $request, $id){
        $request->validate([
            'name'=> 'required',
            'description'=> 'required',
            'image'=> 'nullable|mimes:jpeg,jpg,png,gif|max:1000'
        ]);
        $product = Product::where('id' , $id)->first();
        if(isset($request->image)){
            // upload image
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('products') , $imageName);
            $product->image = $imageName;

        }

        $product->name = $request->name;
        $product->description = $request->description;

        $product->save();
        return back()->withSuccess('Product Updated !!!!');
    }

    public function destroy($id){
        $product = Product::where('id' , $id)->first();
        $product->delete();
        return back()->withSuccess('Product Deleted !!!!');

    }
}
