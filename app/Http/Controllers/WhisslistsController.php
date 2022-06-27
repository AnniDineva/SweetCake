<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Whisslist;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class WhisslistsController extends Controller
{

    public function index(){

        $guestID = session('guestID');
        //dd($guestID);
        /*if (Auth::check()) {
            $wisshList=Whisslist::where('user_id',Auth::user()->id)
            ->get();
        }else{
            $wisshList=Whisslist::where('guest_id', $guestID)
            ->get();
           // dd($wisshList);
        }*/
        $wisshList = Whisslist::select('products.*')
            ->leftjoin('products', 'products.id', '=', 'whisslists.product_id');
        if (Auth::check()) {
            $wisshList=$wisshList->where('user_id',Auth::user()->id)
            ->get();
        }else{
            $wisshList=$wisshList->where('guest_id', $guestID)
            ->get();
           // dd($wisshList);
        }
       // dd($wisshList);
        return view('wisslist', compact('wisshList'));
    }

    public function store(Request $request){
        
        $request->validate([
            'product_id'=>  'required|integer|exists:products,id'
        ]);

        //$checkIfExistAuth=Whisslist::where('product_id',  $request->product_id)->where('user_id',Auth::user()->id );
        //$checkIfExistGuest=Whisslist::where('product_id',  $request->product_id)->where('guest_id',session('guestID'))->exists();

        if (Auth::check()) {
           // dd(Auth::check());
           
             
           
            $checkAuth=Whisslist::where('product_id',  $request->product_id)->where('user_id',Auth::user()->id );
            
            
            if(!$checkAuth->exists()){
                
                Whisslist::create([
                    'product_id'=>$request->product_id,
                    'user_id'=>Auth::user()->id
                ]);
            }else {
                $checkAuth->delete();
            }
            
        }else{
            $checkGuest=Whisslist::where('product_id',  $request->product_id)->where('guest_id',session('guestID') );
            
            if(!$checkGuest->exists()){
            
            Whisslist::create([
                'product_id'=>$request->product_id,
                'guest_id'=>session('guestID')
            ]);
            }else{
                $checkGuest->delete();
            }
        }
       return Redirect::back();

    }
}
