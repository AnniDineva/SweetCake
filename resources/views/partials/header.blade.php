<!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__cart">
            <div class="offcanvas__cart__links">
                <a href="#" class="search-switch"><img src="/img/icon/search.png" alt=""></a>
                <a href="#"><img src="/img/icon/heart.png" alt=""></a>
            </div>
            <div class="offcanvas__cart__item">
                <a href="#"><i class="fas fa-shopping-cart"></i></a>
                <div class="cart__price" id="backet_total_price">Cart: <span>$0.00</span></div>
            </div>
        </div>
        
        <div class="offcanvas__logo">
            <a href="{{route('home')}}"><img src="/img/logo.png" alt=""></a>
        </div>
        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__option">
            <ul>
                <li>USD <span class="arrow_carrot-down"></span>
                    <ul>
                        <li>EUR</li>
                        <li>USD</li>
                    </ul>
                </li>
                <li>ENG <span class="arrow_carrot-down"></span>
                    <ul>
                        <li>Spanish</li>
                        <li>ENG</li>
                    </ul>
                </li>
                @guest
                <li><a href="{{route('login')}}">Login</a> <span class="arrow_carrot-down"></span></li>
                @endguest
                 @auth  
                 <li> <a href="{{route('register')}}">Sign in</a> <span class="arrow_carrot-down"></span></li>
                 @endauth
            </ul>
        </div>
    </div>
    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="header__top__inner">
                            <div class="header__top__left">
                                <ul>
                                    
                                   @guest
                                   <li><a href="{{route('register')}}">Sign in</a> <span class="arrow_carrot-down"></span></li>
                                    <li><a href="{{route('login')}}" class="fw-bold">Login</a> <span class="arrow_carrot-down fw-bold"></span></li>
                                    
                                    @endguest
                                    @auth  
                                    <li>
                                        <div class="dropdown">
                                            <button class="btn btn-dark main_color dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Hi,   {{ Auth::user()->name }}
                                            </button>
                                            <ul class="dropdown-menu bg-light" aria-labelledby="dropdownMenuButton1">
                                                <li><a class="dropdown-item" href="{{route('orders.index')}}">My orders</a></li>
                                                <li><a class="dropdown-item" href="{{route('profile.index')}}">My profile</a></li>
                                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                                              </ul>
                                                
                                            
                                        </div>
                                    </li>
                                    <li>
                                        <form method="post" action="{{route('logout')}}" id="loginForm">
                                            @csrf
                                            <button class="btn btn-dark main_color">Logout</button>
                                        </form>
                                    </li>
                                    @endauth
                                </ul>
                            </div>
                            <div class="header__logo">
                                <a href="{{route('home')}}"><img src="/img/logo.png" alt=""></a>
                            </div>
                            <div class="header__top__right">
                                <div class="header__top__right__links">
                                    <a href="#" class="search-switch"><img src="/img/icon/search.png" alt=""></a>
                                    <a href="#"><img src="/img/icon/heart.png" alt=""></a>
                                </div>
                                <?php $total = 0 ?>
                                @if(session('cart'))
                                <div class="header__top__right__cart">
                                    <a href="{{route('cart.shoping_cart')}}"><img src="/img/icon/cart.png" alt=""> <span>{{count(session('cart'))}}</span></a>
                                    <div class="cart__price " >Cart: <span class="backet_total_price">${{session('cart_total_price')}}</span></div>
                                </div>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
                <div class="canvas__open"><i class="fa fa-bars"></i></div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav class="header__menu mobile-menu">
                        <ul>
                            <li class="active"><a href="{{route('home')}}">Home</a></li>
                            <li><a href="{{route('about')}}">About</a></li>
                            <li><a href="{{route('shop')}}">Shop</a></li>
                            <li><a href="#">Pages</a>
                                <ul class="dropdown">
                                    <li><a href="{{route('cart.shoping_cart')}}">Shoping Cart</a></li>
                                    <li><a href="{{route('checkout.create')}}">Check Out</a></li>
                                    <li><a href="{{route('wisslist.index')}}">Wisslist</a></li>
                                    <li><a href="{{route('class')}}">Class</a></li>
                                    <li><a href="{{route('blog_details')}}">Blog Details</a></li>
                                </ul>
                            </li>
                            <li><a href="{{route('blog')}}">Blog</a></li>
                            <li><a href="{{route('contact')}}">Contact</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- Header Section End -->
