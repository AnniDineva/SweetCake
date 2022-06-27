<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Routing\Redirector;



class CartController extends Controller
{
    private $cardSessionName='cart';

    public function store(Request $request){
        $message='Product added to cart successfully!';
        //$request->session()->forget('cart');
        
        //Добавяме в кошницата
        $request->validate([
            'id' => 'exists:products|required',
            'qty' => 'numeric|between:1,1000'
        ]);
        $id=$request['id'];
        $qty=$request['qty'];

        //dd($request);
        $product = Product::find($id);
        if(!$product) {
            abort(404);
        }
        $cart = session()->get('cart');
        // if cart is empty then this the first product
        if(!$cart) {
            $cart = [
                    $id => [
                        "title" => $product->title,
                        "qty" => $qty,
                        "price" => $product->price,
                        "img" => $product->img
                    ]
            ];
            session()->put('cart', $cart);
            
            $this->calculateTotal();
           // dd($cart);
            return redirect()->back()->with('success', $message);

        }
        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {
            $cart[$id]['qty']=$cart[$id]['qty']+$qty;
            session()->put('cart', $cart);
            
            $this->calculateTotal();
            //dd($cart);
            return redirect()->back()->with('success', $message);
        }
        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "title" => $product->title,
            "qty" => $qty,
            "price" => $product->price,
            "img" => $product->img
        ];
        session()->put('cart', $cart);
        
        $this->calculateTotal();
        //dd($cart);
       return redirect()->back()->with('success', $message);
       
}

    public function index(){
        //Изкарва списъка с добавените продукти
        return view('shoping_cart');
    }

    public function update(Request $request){
        
        //Промяна по продукта в количката
        $request->validate([
            'id' => 'exists:products|required',
            'qty' => 'numeric|between:1,1000|required'
        ]);
        $cart = session()->get('cart');
        $productID=$request->id;
       //dd($productID);
        $qty=$request->qty;
        //dd($cart[$productID]);
        if(isset($cart[$productID])) {
            $cart[$request->id]['qty']=$qty;
            $item_price=$qty*$cart[$productID]['price'];
            //dd($item_price);
            $total_price=0;
            
            foreach ($cart as $product) {
                $total_price +=  $product['price']*$product['qty'];
            }
            
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
            
            $this->calculateTotal();

            return response()-> json([
                'item_price' => $item_price,
                'total_price' => $total_price,
            ]);
            
        }
        
    }

    public function destroy(Request $request){
        //Delete item from the backet
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }

            $this->calculateTotal();
            //session()->flash('success', 'Product removed successfully');
            //$request->session()->push('cart',$cart);
            return redirect()->back()->with('success', 'Deleted from cart successfully');

           
        }
    }

    public function calculateTotal(){
        $total_price = 0;
        $cart = collect(session('cart', []));
        if ($cart->count()){
            $total_price = $cart->sum(function($cartProduct){
                return $cartProduct['price']*$cartProduct['qty'];
            });
        }

        session()->put('cart_total_price', number_format($total_price, 2, '.', ' '));
    }

    public function test(){
        dd(session()->all());
    }
}
