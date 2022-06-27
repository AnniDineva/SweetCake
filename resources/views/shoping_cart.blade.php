@extends('layouts.layout')
@section('content')

    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="breadcrumb__text">
                        <h2>Shopping cart</h2>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="breadcrumb__links">
                        <a href="{{route('home')}}">Home</a>
                        <span>Shopping cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="shopping__cart__table ">
                        <table class="table border">
                            <thead>
                                <tr>
                                    <th class="border-right text-center">Product</th>
                                    <th class="border-right text-center">Quantity</th>
                                    <th class="border-right text-center">Price</th>
                                    <th class="border-right text-center">Total</th>
                                    <th class="border-right text-center">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $total = 0 ?>
                                @if(session('cart'))
                                    @foreach(session('cart') as $id => $details)
                                        <?php $total += $details['price'] * $details['qty'] ;?>
                                        <tr>
                                            <td class="product__cart__item border-right border-left ">
                                                <div class="product__cart__item__pic">
                                                    <a href="{{route('shop_details', ['id' => $id])}}">
                                                        <img src="{{ asset('/img/shop/' . $details['img'] ) }}" alt="" class="img_cart">
                                                        <h6>{{$details['title']}} </h6>
                                                    </a>
                                                </div>
                                                
                                            </td>
                                            <td class="quantity__item border-right">
                                                <div class="quantity">
                                                    <div >
                                                        <input type="number" min="1" max="1000" name="qty" value="{{$details['qty']}}" class="text-center form-control" data-id="{{$id}}"/>
                                                    </div>
                                                </div>
                                                
                                            </td>
                                            <td class="cart__price border-right text-center" >$ {{$details['price']}}</td>
                                            <td class="cart__price border-right text-center " id="item_price_{{$id}}"> ${{ $details['price'] * $details['qty'] }}</td>
                                            <td class="cart__close border-right text-center">
                                            <a href="{{route('cart.destroy', ['id'=>$id])}}" class="remove-from-cart">
                                            
                                            <span class="icon_close"></span></a></td>
                                        </tr>
                                    @endforeach
                                @endif
                                        <tr class="visible-xs">
                                            <td class="border-left "></td>
                                            <td></td>
                                            <td class=""><strong>Total:</strong></td>
                                            <td class="col-lg-6 col-md-6 col-sm-6 border-left " id="total_price"><strong>$ {{ $total }}</strong></td>
                                            <td class="border-right "></td>
                                            
                                        </tr>                        
                                        <tr >
                                            <td class="col-lg-6 col-md-6 col-sm-6">
                                                <div class="continue__btn">
                                                    <a href="{{ url('/') }}">Continue Shopping</a>
                                                </div>
                                            </td>
                                            
                                        </tr>
                                                                   
                            </tbody>
                            <tfoot>
                                
                            </tfoot>
                        </table>
                    </div>
                </div><!--.col-8-->
                <div class="col-lg-4">
                    <div class="cart__discount">
                        <h6>Discount codes</h6>
                        <form action="#">
                            <input type="text" placeholder="Coupon code">
                            <button type="submit">Apply</button>
                        </form>
                    </div>
                    <div class="cart__total">
                        <h6>Cart total</h6>
                        <ul>
                            
                            <li>Total: <span class="backet_total_price">$ {{ $total }}</span></li>
                        </ul>
                    @if(session('cart'))
                        <a href="{{route('checkout.create')}}" class="primary-btn">Proceed to checkout</a>
                    @endif
                    </div>
                </div>
            </div><!--.row-->
        </div><!--.container-->
    </section>
    <!-- Shopping Cart Section End -->
    
@endsection

    