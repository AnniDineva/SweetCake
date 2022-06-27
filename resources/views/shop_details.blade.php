
@extends('layouts.layout')
@section('content')
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="breadcrumb__text">
                        <h2>Product detail</h2>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="breadcrumb__links">
                        <a href="{{route('home')}}">Home</a>
                        <a href="{{route('shop')}}">Shop</a>
                        <span>Sweet autumn leaves</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Shop Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="product__details__img">
                        <div class="product__details__big__img">
                            <img class="big_img" src="{{ asset('/img/shop/' . $product->img) }}" alt="">
                        </div>
                        <div class="product__details__thumb">
                            <div class="pt__item active">
                                <img data-imgbigurl="{{ asset('/img/shop/' . $product->img) }}"
                                src="{{ asset('/img/shop/' . $product->img) }}" alt="">
                            </div>
                            <div class="pt__item">
                                <img data-imgbigurl="{{ asset('/img/shop/' . $product->img) }}"
                                src="{{ asset('/img/shop/' . $product->img) }}" alt="">
                            </div>
                            <div class="pt__item">
                                <img data-imgbigurl="{{ asset('/img/shop/' . $product->img) }}"
                                src="{{ asset('/img/shop/' . $product->img) }}" alt="">
                            </div>
                            <div class="pt__item">
                                <img data-imgbigurl="{{ asset('/img/shop/' . $product->img) }}"
                                src="{{ asset('/img/shop/' . $product->img) }}" alt="">
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="product__details__text">
                        <div class="product__label">Cupcake</div>
                        <h4>{{$product->title}}</h4>
                        <h5>${{$product->price}}</h5>
                        <p>{{$product->description}}</p>
                        <ul>
                            <li>SKU: <span>{{$product->id}}</span></li>
                            <li>Category: <span>Biscuit cake</span></li>
                            <li>Tags: <span>Gadgets, minimalisstic</span></li>
                        </ul>
                        <div class="product__details__option">
                            <form method="post" action="{{route('cart.store')}}">
                            @csrf
                                <div class="quantity">
                                    <div class="pro-qty">
                                        <input type="text" name="qty" value="1"/>
                                    </div>
                                </div>
                                <input type="hidden" name="id" value="{{$product->id}}" name="product_id"/>
                                <button type="submit" class="primary-btn">Add to cart</button>
                                
                            </form>
                            <form action="{{route('wisslist.store')}}" method="post">
                                @csrf
                                <input type="hidden" value="{{$product->id}}" name="product_id">
                                
                                <button class="heart__btn " type="submit" 
                                @if ($wish>0) style="background-color: red;"
                                @endif
                                ><span class="icon_heart_alt"></span></button>
                            </form>
                            
                            
                        </div><!--.product__details__option-->
                    </div>
                </div>
            </div>
            <div class="product__details__tab">
                <div class="col-lg-12">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">Description</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">Additional information</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab">Previews(1)</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                            <div class="row d-flex justify-content-center">
                                <div class="col-lg-8">
                                    <p>This delectable Strawberry Pie is an extraordinary treat filled with sweet and
                                        tasty chunks of delicious strawberries. Made with the freshest ingredients, one
                                        bite will send you to summertime. Each gift arrives in an elegant gift box and
                                    arrives with a greeting card of your choice that you can personalize online!</p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tabs-2" role="tabpanel">
                            <div class="row d-flex justify-content-center">
                                <div class="col-lg-8">
                                    <p>This delectable Strawberry Pie is an extraordinary treat filled with sweet and
                                        tasty chunks of delicious strawberries. Made with the freshest ingredients, one
                                        bite will send you to summertime. Each gift arrives in an elegant gift box and
                                        arrives with a greeting card of your choice that you can personalize online!2
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tabs-3" role="tabpanel">
                            <div class="row d-flex justify-content-center">
                                <div class="col-lg-8">
                                    <p>This delectable Strawberry Pie is an extraordinary treat filled with sweet and
                                        tasty chunks of delicious strawberries. Made with the freshest ingredients, one
                                        bite will send you to summertime. Each gift arrives in an elegant gift box and
                                        arrives with a greeting card of your choice that you can personalize online!3
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Details Section End -->

    @include('partials.relateted_products_bar');
    @endsection