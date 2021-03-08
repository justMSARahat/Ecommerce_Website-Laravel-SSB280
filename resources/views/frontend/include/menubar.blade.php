<div class="main-header">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-3 logo-holder">
                <!-- ============================================================= LOGO ============================================================= -->
                <div class="logo">
                    <a href="{{ route('homepage') }}">
                        <img src="{{ asset('Frontend/assets/images/logo.png') }}" alt="logo"> </a>
                </div>
                <!-- /.logo -->
                <!-- ============================================================= LOGO : END ============================================================= -->
            </div>
            <!-- /.logo-holder -->
            <div class="col-xs-12 col-sm-12 col-md-7 top-search-holder">
                <!-- /.contact-row -->
                <!-- ============================================================= SEARCH AREA ============================================================= -->
                <div class="search-area">
                    <form action="{{route('search')}}" method="get">
                        <div class="control-group">
                            <ul class="categories-filter animate-dropdown">
                                <li class="dropdown">
                                    <a class="dropdown-toggle"  data-toggle="dropdown" href="category.html">Categories <b class="caret"></b></a>
                                    <ul class="dropdown-menu" role="menu" >
                                        <li class="menu-header">Computer</li>
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- Clothing</a></li>
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- Electronics</a></li>
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- Shoes</a></li>
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- Watches</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <input class="search-field" placeholder="Search here..." name="search"/>
                            {{-- <a class="search-button" href="#" ></a> --}}
                            <input type="submit" class="search-button" value="Search">
                        </div>
                    </form>
                </div>
                <!-- /.search-area -->
                <!-- ============================================================= SEARCH AREA : END ============================================================= -->
            </div>
            <!-- /.top-search-holder -->
            <div class="col-xs-12 col-sm-12 col-md-2 animate-dropdown top-cart-row">
                <!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->
                <div class="dropdown dropdown-cart">
                    <a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
                        <div class="items-cart-inner">
                            <div class="basket"> <i class="glyphicon glyphicon-shopping-cart"></i> </div>
                            <div class="basket-item-count">
                                <span class="count">
                                {{ App\Models\Frontend\cart::totalItems() }}
                                </span>
                            </div>
                            <div class="total-price-basket">
                                <span class="total-price">
                                <span class="sign">৳</span>
                                <span class="value">{{ App\Models\Frontend\cart::totalPrice() }} BDT</span>
                                </span>
                            </div>
                        </div>
                    </a>
                    <ul class="dropdown-menu">
                        <li>

                            @foreach( App\Models\Frontend\cart::totalCarts() as $items  )
                            <div class="cart-item product-summary">
                                <div class="row">
                                    <div class="col-xs-4">
                                        <div class="image">
                                            <a href="detail.html">
                                                <img src="{{ asset('Backend/img/Product_Primary_image').'/'. $items->product->image}}" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <h3 class="name">
                                            <a href="index8a95.html?page-detail">{{ $items->product->title }}</a>
                                        </h3>
                                        @if( !is_null( $items->product->offer_price ) )
                                            <div class="price">৳ {{ $items->product->offer_price }} BDT</div>
                                        @else
                                            <div class="price">৳ {{$items->product->reguler_price}} BDT</div>
                                        @endif
                                    </div>
                                    {{-- Chack Out Trash --}}
                                    <div class="col-xs-1 action">
                                        <form action="{{ route('cart.destroy',$items->id) }}" method="POST">
                                            @csrf
{{--                                            <a href="#"><i class="fa fa-trash"></i>--}}
                                                <button type="submit"><i class="fa fa-trash"></i></button>
                                        </form>
                                        </a>
                                    </div>

                                </div>
                                <hr>
                            </div>
                            @endforeach

                            <div class="clearfix cart-total">
                                <div class="pull-right"> <span class="text">Sub Total :</span><span class='price'>৳ {{ App\Models\Frontend\cart::totalPrice() }} BDT</span> </div>
                                <div class="clearfix"></div>
                                <a href="{{ route('cart.manage') }}" class="btn btn-upper btn-primary btn-block m-t-20">Checkout</a>
                            </div>
                            <!-- /.cart-total-->
                        </li>
                    </ul>
                    <!-- /.dropdown-menu-->
                </div>
                <!-- /.dropdown-cart -->
                <!-- ============================================================= SHOPPING CART DROPDOWN : END============================================================= -->
            </div>
            <!-- /.top-cart-row -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</div>
<div class="header-nav animate-dropdown">
    <div class="container">
        <div class="yamm navbar navbar-default" role="navigation">
            <div class="navbar-header">
                <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                    <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
            </div>
            <div class="nav-bg-class">
                <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
                    <div class="nav-outer">
                        <ul class="nav navbar-nav">
                            <li class="active dropdown yamm-fw">
                                <a href="{{ route('homepage') }}">Home</a>
                            </li>
                            <li class="dropdown hidden-sm">
                                <a href="{{ route('allproducts') }}">All Products</a>
                            </li>
                            
                            @foreach( App\Models\Backend\category::orderBy('name','asc')->where('is_parent',0)->take(7)->get() as $ParentCategory )
                                @if( App\Models\Backend\Category::orderBy('name','asc')->where('is_parent',$ParentCategory->id)->count() > 0 )
                                    @foreach( App\Models\Backend\Category::orderBy('name','asc')->where('is_parent',$ParentCategory->id)->get() as $ChildCategory )
                                        <li class="dropdown mega-menu">
                                            <a href="{{ route('category.show', $ParentCategory->slug ) }}"  data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">{{ $ParentCategory->name }}</a>
                                            {{-- <a href="{{ route('category.show', $ParentCategory->slug ) }}">{{ $ParentCategory->name }}</a>  --}}
                                            <ul class="dropdown-menu container">
                                                <li>
                                                    <div class="yamm-content">
                                                        <div class="row">
                                                            <div class="col-xs-3 col-sm-3 col-md-2 col-menu">
                                                                <h2 class="title">{{ $ChildCategory->name }}</h2>
                                                                     @foreach( App\Models\Backend\Category::orderBy('name','asc')->where('is_parent',$ChildCategory->id)->get() as $grnadChildCategory )
                                                                        <ul class="links">
                                                                            <li><a href="{{ route('category.show', $grnadChildCategory->slug ) }}">{{ $grnadChildCategory->name }}</a></li>
                                                                        </ul>
                                                                    @endforeach
                                                            </div>
                                                            <!-- /.col -->
                                                            {{-- <div class="col-xs-12 col-sm-12 col-md-2 col-menu">
                                                                <h2 class="title">Desktops</h2>
                                                                <ul class="links">
                                                                    <li><a href="#">Routers & Modems</a></li>
                                                                    <li><a href="#">CPUs, Processors</a></li>
                                                                    <li><a href="#">PC Gaming Store</a></li>
                                                                    <li><a href="#">Graphics Cards</a></li>
                                                                    <li><a href="#">Components</a></li>
                                                                    <li><a href="#">Webcam</a></li>
                                                                    <li><a href="#">Memory (RAM)</a></li>
                                                                    <li><a href="#">Motherboards</a></li>
                                                                    <li><a href="#">Keyboards</a></li>
                                                                    <li><a href="#">Headphones</a></li>
                                                                </ul>
                                                            </div> --}}
                                                            <!-- /.col -->
                                                            {{-- <div class="col-xs-12 col-sm-12 col-md-2 col-menu">
                                                                <h2 class="title">Cameras</h2>
                                                                <ul class="links">
                                                                    <li><a href="#">Accessories</a></li>
                                                                    <li><a href="#">Binoculars</a></li>
                                                                    <li><a href="#">Telescopes</a></li>
                                                                    <li><a href="#">Camcorders</a></li>
                                                                    <li><a href="#">Digital</a></li>
                                                                    <li><a href="#">Film Cameras</a></li>
                                                                    <li><a href="#">Flashes</a></li>
                                                                    <li><a href="#">Lenses</a></li>
                                                                    <li><a href="#">Surveillance</a></li>
                                                                    <li><a href="#">Tripods</a></li>
                                                                </ul>
                                                            </div> --}}
                                                            <!-- /.col -->
                                                            {{-- <div class="col-xs-12 col-sm-12 col-md-2 col-menu">
                                                                <h2 class="title">Mobile Phones</h2>
                                                                <ul class="links">
                                                                    <li><a href="#">Apple</a></li>
                                                                    <li><a href="#">Samsung</a></li>
                                                                    <li><a href="#">Lenovo</a></li>
                                                                    <li><a href="#">Motorola</a></li>
                                                                    <li><a href="#">LeEco</a></li>
                                                                    <li><a href="#">Asus</a></li>
                                                                    <li><a href="#">Acer</a></li>
                                                                    <li><a href="#">Accessories</a></li>
                                                                    <li><a href="#">Headphones</a></li>
                                                                    <li><a href="#">Memory Cards</a></li>
                                                                </ul>
                                                            </div> --}}
                                                            {{-- <div class="col-xs-12 col-sm-12 col-md-4 col-menu custom-banner"> <a href="#"><img alt="" src="{{ asset('Frontend/assets/images/banners/banner-side.png') }}"></a> </div> --}}
                                                        </div>
                                                        <!-- /.row -->
                                                    </div>
                                                    <!-- /.yamm-content -->
                                                </li>
                                            </ul>
                                        </li>
                                    @endforeach
                                @else
                                    <li class="dropdown"> 
                                        <a href="{{ route('category.show', $ParentCategory->slug ) }}">{{ $ParentCategory->name }}</a> 
                                    </li>
                                @endif
                            @endforeach
                            
                            
                            
                            
                            
                            
                            
                           
                            
                            <li class="dropdown  navbar-right special-menu"> <a href="#">Todays offer</a> </li>
                        </ul>
                        <!-- /.navbar-nav -->
                        <div class="clearfix"></div>
                    </div>
                    <!-- /.nav-outer -->
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.nav-bg-class -->
        </div>
        <!-- /.navbar-default -->
    </div>
    <!-- /.container-class -->
</div>
