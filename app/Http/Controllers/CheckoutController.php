<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Address;
use App\Models\OrderProduct;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewOrderFormMail ;


class CheckoutController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $userDetails = session()->get('cart');

        if (Auth::check()){
            $addresses=Address::where('user_id', Auth::user()->id)
            ->get();
            return view('checkout', compact('addresses'));
        }else{
            return view('checkout');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' =>  'required|string|max:255',
            'phone' => 'required',
            'email' => 'required|string|email|max:255',
            'address'=>'required',
            'town'=>'required',
            'postcode'=>'required'
        ]);
        

        if($request->has('create_accaunt')){
            $request->validate([
                'password' => 'required|string|min:8',
                'email' => "unique:users"
                
            ]);
            
            Auth::login($user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]));
            
            $user_id=$user->id;

            event(new Registered($user));
            
        }else{
            if (Auth::check()) {
                $request->validate([
                    'user_id' => 'required|exists:users,id'
                    
                ]);

                $user_id=$request->user_id;

            } else{
                $user_id=null;
                $address_id=null;
            }
           
        }

        $total=0;

        foreach(session('cart') as $id => $details){
            $total += $details['price'] * $details['qty'] ;
        }

        if(Auth::check() || $request->has('create_accaunt')){

            $isDefaultCheck = Address::where('user_id', $user_id)->whereNotNull('is_default')->exists();

            $addressRecord = [
                'user_id' => $user_id,
                'address' => $request->address,
                'town' => $request->town,
                'zip_code' => $request->postcode
            ];

            if (!$isDefaultCheck){
                $addressRecord['is_default'] = 1;
            }

            $address = Address::firstOrCreate($addressRecord);
            $address_id=$address->id;

            $order= Order::create([
                'user_id' => $user_id,
                'uname' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address_id'=>$address_id,
                'status'=>'Acctepted',
                'total_sum'=>$total,
                'note_for_order'=>$request->note_for_order
            ]);
        }else{
            $order= Order::create([
                'user_id' => $user_id,
                'uname' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address_id'=>$address_id,
                'status'=>'Acctepted',
                'total_sum'=>$total,
                'note_for_order'=>$request->note_for_order,
                'guest_address'=>$request->address.' '. $request->town.' '.$request->postcode
            ]);
            $address=Order::find($order->id);
           // dd($address);
        }
        
        
       

        $cart=session()->get('cart');

        foreach ($cart as $key=>$product) {
            OrderProduct:: create([
                'orders_id'=>$order->id,
                'product_id'=>$key,
                'title'=>$product['title'],
                'price'=>$product['price'],
                'qty'=>$product['qty'],
                'img'=>$product['img']


            ]);
        }

        Mail::to($request->email)->send(new NewOrderFormMail( $request->name, $request->phone, $cart, $order, $address ));
        
        session()->forget('cart');

        return redirect('/shoping_cart')->with('success', 'Succefull added order!');
    }

}
