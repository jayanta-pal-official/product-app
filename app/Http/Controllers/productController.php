<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use Illuminate\Support\Facades\DB;

class productController extends Controller
{
    

    public function AllProducts(){
        $products = DB::table('products')->get(); 
        $data = "test";
        return view('allproducts', compact('data'));
    }
    public function productView()
    {
        $products = DB::table('products')->get();
        return view('productsList', ['data' => $products]);
    }

    public function productAdd(Request $request)
    {
        $request->validate([
            'product_name' => 'required',
            'product_description' => 'required',
            'product_quantity' => 'required',
            'product_price' => 'required'
        ]);

        $product = DB::table('products')
            ->insert([
                'name' => $request->product_name,
                'description' => $request->product_description,
                'quantity' => $request->product_quantity,
                'price' => $request->product_price
            ]);
            return redirect()->route('productsView');
    }

    public function productDelete($id)
    {
        $product = DB::table('products')
            ->where('id', $id)
            ->delete();
            return redirect()->route('productsView');
    }

    public function productUpdate(Request $request)
    {

        $request->validate([
            'product_name' => 'required',
            'product_description' => 'required',
            'product_quantity' => 'required',
            'product_price' => 'required',
            'id' => 'required',
        ]);


        $id = $request->id;
        $product = DB::table('products')
            ->where('id', $id)
            ->update([
                'name' => $request->product_name,
                'description' => $request->product_description,
                'quantity' => $request->product_quantity,
                'price' => $request->product_price
            ]);
            
            return redirect()->route('productsView');
    }
}
