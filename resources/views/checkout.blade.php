@extends('layouts.layout')
@section('content')


    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="breadcrumb__text">
                        <h2>Checkout</h2>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="breadcrumb__links">
                        <a href="{{route('home')}}">Home</a>
                        <span>Checkout</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
            @endif
            <div class="checkout__form">
                <form action="{{route('checkout.store')}}" method="post">
                @csrf
                    <div class="row">
                        
                        <div class="col-lg-6 col-md-6">
                            @auth 
                                <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
                            @endauth
                            <h6 class="coupon__code"><span class="icon_tag_alt"></span> Have a coupon? <a href="#">Click
                            here</a> to enter your code</h6>
                            <h6 class="checkout__title">Billing Details</h6>
                            <div class="checkout__input">
                                <p> Name<span>*</span></p>
                                 <input type="text" name="name" @auth value="{{ Auth::user()->name }}"@endauth value="{{old('name')}}" >
                            </div>
                            @error('username')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            @auth
                            <div class="checkout__input mb-">
                                <p>Address<span>*</span></p>
                                <select class="form-control jq-select2 mb-5" name="address">
                                    @foreach ($addresses as $address)
                                      <option value="{{$address->address}}"
                                        @if($address->is_default==1)
                                         selected="selected"
                                         @endif 
                                        >{{$address->address}}</option>  
                                    @endforeach
                                    
                                </select>
                            </div>
                            @endauth
                            @guest
                            <div class="checkout__input">
                                <p>Address<span>*</span></p>
   
                                <input type="text" placeholder="Street Address" value="{{old('address')}}" class="checkout__input__add" name="address">
                                
                            </div>
                            @endguest
                            
                            <div class="checkout__input">
                                <p>Town/City<span>*</span></p>
                                <input type="text" name="town" value="{{old('town')}}" >
                            </div>
                            
                            <div class="checkout__input">
                                <p>Postcode / ZIP<span>*</span></p>
                                <input type="text" name="postcode" value="{{old('postcode')}}" id="postcode">
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Phone<span>*</span></p>
                                        <input type="text" name="phone" value="{{old('phone')}}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email<span>*</span></p>
                                        <input type="text" name="email" @auth value="{{ auth()->user()->email }}"@endauth value="{{old('email')}}" >
                                    </div>
                                </div>
                                @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                
                            </div>
                            @guest

                            <div class="checkout__input__checkbox">
                                <label for="acc">
                                    Create an account?
                                    <input type="checkbox" id="acc" name="create_accaunt">
                                    <span class="checkmark"></span>
                                </label>
                                <p>Create an account by entering the information below. If you are a returning customer
                                please login at the top of the page</p>
                            </div>
                            <div class="checkout__input">
                                <p>Account Password<span>*</span></p>
                                <input type="password" name="password">
                                <p>Confirm Password<span>*</span></p>
                                <input type="password" tabindex="5" size="22"name="password_confirmation" />
                            </div>
                            @endguest

                            
                            <div class="checkout__input">
                                <p>Order notes</p>
                                <input type="text"
                                placeholder="Notes about your order, e.g. special notes for delivery." name="note_for_order" value="{{old('note_for_order')}}">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="checkout__order">
                                <h6 class="order__title">Your order</h6>
                                <table class="table border">
                                    <thead>
                                        <tr>
                                            <th class="border-right col">Product</th>
                                            <th class="border-right col">Qty</th>
                                            <th class="border-right col">Price</th>
                                            <th class="border-right col">Total</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $total = 0 ?>
                                        @if(session('cart'))
                                            @foreach(session('cart') as $id => $details)
                                                <?php $total += $details['price'] * $details['qty'] ;?>
                                                <tr>
                                                    <td class="product__cart__item border-right border-left">                                                       
                                                        <h6>{{$details['title']}} </h6>
                                                    </td>
                                                    <td class="quantity__item border-right">{{$details['qty']}}</td>
                                                    <td class="cart__price border-right text-center" >$ {{$details['price']}}</td>
                                                    <td class="cart__price border-right text-center " id="item_price_{{$id}}"> ${{ $details['price'] * $details['qty'] }}</td>
                                                </tr>
                                            @endforeach
                                        @endif
                                                <tr class="visible-xs">
                                                    <td class="border-left "></td>
                                                    <td></td>
                                                    <td class=""><strong>Total:</strong></td>
                                                    <td class="col-lg-6 col-md-6 col-sm-6 border-left " id="total_price"><strong>$ {{ $total }}</strong>
                                                    <input type="hidden" value="{{$total}}" name="total_sum">
                                                    </td>   
                                                </tr>                        
                                                                      
                                    </tbody>
                                    <tfoot>
                                        
                                    </tfoot>
                                </table>
                               
                                
                                <!--<div class="checkout__input__checkbox">
                                    <label for="payment">
                                        Check Payment
                                        <input type="checkbox" id="payment">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="checkout__input__checkbox">
                                    <label for="paypal">
                                        Paypal
                                        <input type="checkbox" id="paypal">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>-->
                                <button type="submit" class="site-btn">PLACE ORDER</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->

    
@endsection