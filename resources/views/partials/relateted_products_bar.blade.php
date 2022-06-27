<!-- Related Products Section Begin -->
    <section class="related-products spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="section-title">
                        <h2>Related Products</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="related__products__slider owl-carousel">
                @foreach ($products as $product)
                    <div class="col-lg-3">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="{{ asset('/img/shop/' . $product->img) }}">
                                <div class="product__label">
                                    <span>Cupcake</span>
                                </div>
                            </div>
                            <div class="product__item__text">
                                <h6><a href="{{route('shop_details', ['id' => $product->id])}}">{{ $product->title }}</a></h6>
                                <div class="product__item__price">${{ $product->price }}</div>
                                <div class="cart_add">
                                    <a href="#">Add to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                </div>
            </div>
        </div>
    </section>
    <!-- Related Products Section End -->
