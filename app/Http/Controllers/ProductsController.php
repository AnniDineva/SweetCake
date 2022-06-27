<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Whisslist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductsController extends Controller
{
    public function index(){
        $products = Product::paginate(6);
        return view('shop', compact('products'));
    }

    public function show($id){

        $product=Product::find($id);
        $products = Product::get();
        $guestID = session('guestID');
        
        if (Auth::check()) {
            $wish=Whisslist::where('product_id', $id)->where('user_id', Auth::user()->id)
            ->count();
        }else{
            $wish=Whisslist::where('product_id', $id)->where('guest_id', $guestID)
            ->count();
        }

        return view('shop_details', compact('product', 'products', 'wish'));
    }
}
