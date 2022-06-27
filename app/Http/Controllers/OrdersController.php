<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $orders = Order::where('user_id', Auth::user()->id)
                ->orderBy('created_at', 'DESC')
                ->paginate(5);   
               
        return view('my_orders', compact('orders'));
    }

    
    
    
    public function show($id)
    {
        $thisOrder=Order::find($id);
        $orderProducts=OrderProduct::where('orders_id', $id)
            ->get();
            
        $orderAddress=Address::where('id', $thisOrder->address_id)
            ->first();
            
        return view('order_details', compact('thisOrder', 'orderProducts', 'orderAddress'));
    }

}
