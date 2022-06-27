@extends('layouts.layout')
@section('content')

<div class="container">
    <h2 class="mb-5 mt-5 text-center">Order Details</h2>
    <div class="row mt-3">
        
        <div class="col">
            <div class="shopping__cart__table ">
                <table class="table border">
                    <thead>
                        <tr>
                            <th class="border-right text-center">Order #</th>
                            <th class="border-right text-center">Date</th>
                            <th class="border-right text-center">Customer details</th>
                            <th class="border-right text-center">Total price</th>
                            <th class="border-right text-center">Status order</th>
                        </tr>
                    </thead>
                    <tbody>
                    
                            <tr>
                                <td class="product__cart__item border-right border-left ">{{$thisOrder['id']}}</td>
                                <td class="product__cart__item border-right border-left ">{{$thisOrder['created_at']}}</td>
                                <td class="product__cart__item border-right border-left ">
                                    <p>{{$thisOrder['uname']}}</p>
                                    <p>{{$thisOrder['email']}}</p>
                                    <p>{{$thisOrder['phone']}}</p>
                                    <p>{{$orderAddress['zip_code']}},{{$orderAddress['town']}},{{$orderAddress['address']}} </p>
                                </td>
                                <td class="product__cart__item border-right border-left ">${{$thisOrder['total_sum']}}</td>
                                <td class="product__cart__item border-right border-left ">{{$thisOrder['status']}}</td>
                                
                            </tr>
                        
                    </tbody>
                </table>
            </div>
            <h2 class="mb-5 mt-5 text-center">Order Products</h2>
            <div class="shopping__cart__table ">
                <table class="table border">
                    <thead>
                        <tr>
                            <th class="border-right text-center">Product #</th>
                            <th class="border-right text-center">Product</th>
                            <th class="border-right text-center">Price</th>
                            <th class="border-right text-center">Quantity</th>
                            <th class="border-right text-center">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orderProducts as $product)
                            
                        
                    
                            <tr>
                                <td class="product__cart__item border-right border-left ">{{$product['id']}}</td>
                                
                                <td class="product__cart__item border-right border-left ">
                                    <a href="{{route('shop_details', ['id' => $product['product_id']])}}">
                                        <img src="{{ asset('/img/shop/' . $product['img'] ) }}" alt="" class="img_cart">
                                        <h6>{{$product['title']}} </h6>
                                    </a>
                                </td>
                                <td class="product__cart__item border-right border-left ">${{$product['price']}}</td>
                                <td class="product__cart__item border-right border-left ">{{$product['qty']}}</td>
                                <td class="product__cart__item border-right border-left ">${{$product['qty']*$product['price']}}</td>
                                
                            </tr>
                        @endforeach    
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection