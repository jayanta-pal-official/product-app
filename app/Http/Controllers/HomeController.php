<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\product;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){
        if(Auth::id()){
            $usertype = Auth()->user()->usertype;
            
            if( $usertype === 'admin'){
                $products = DB::table('products')->get(); 

                return view('admin.productsList',['data'=> $products ]);
            }
            if( $usertype === 'user'){
                $products = DB::table('products')->get(); 
               return view('allproducts',['data'=> $products ]);
            }
            
        }


        
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('welcome');
    }
}
