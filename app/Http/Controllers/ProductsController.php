<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

class ProductsController extends Controller
{
    public function index(){
        $products = Product::all();
        return view('/products/select',['products' => $products]);
    }

    public function create(Request $request){
        $products = new Product;
        $products->name = $request->name;
        $products->brand = $request->brand;
        $products->price = $request->price;
        $products->save();

        return redirect('/products/select');
    }

    public function update(Request $request){
        $products = Ingredient::find($request->id);
        $products->name = $request->name;
        $products->brand = $request->brand;
        $products->price = $request->price;
        $products->save();
        return redirect('/products/select');
    }

    public function delete(Request $request){
        $products = Ingredient::where('id',$request->id)->delete();
        return redirect('/products/select');
    }
}
