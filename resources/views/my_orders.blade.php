@extends('layouts.layout')
@section('content')

<div class="container">
    <h2 class="text-center mt-5">My orders</h2>
    <div class="row mt-3">
        
        <div class="col">
            <div class="shopping__cart__table ">
                <table class="table border">
                    <thead>
                        <tr>
                            <th class="border-right text-center">Order #</th>
                            <th class="border-right text-center">Date</th>
                            <th class="border-right text-center">Customer name</th>
                            <th class="border-right text-center">Total price</th>
                            <th class="border-right text-center">Status order</th>
                            <th class="border-right text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td class="product__cart__item border-right border-left ">{{$order['id']}}</td>
                                <td class="product__cart__item border-right border-left ">{{$order['created_at']}}</td>
                                <td class="product__cart__item border-right border-left ">{{$order['uname']}}</td>
                                <td class="product__cart__item border-right border-left ">${{$order['total_sum']}}</td>
                                <td class="product__cart__item border-right border-left ">{{$order['status']}}</td>
                                <td class="product__cart__item border-right border-left ">
                                    <a href="{{route('orders.show',['id' => $order->id])}}">View order details</a>
                                </td>
                            </tr>
                            
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {{$orders->links() }}
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 float-right">
                    <div class="shop__last__text">
                        <p>Showing {{$orders->firstItem()}}-{{$orders->lastItem()}} of {{$orders->total()}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection