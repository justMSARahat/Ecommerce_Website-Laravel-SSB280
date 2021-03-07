<div class="col-xs-12 col-sm-12 col-md-3 sidebar"> 
        
        <!-- ================================== TOP NAVIGATION ================================== -->
        <div class="side-menu animate-dropdown outer-bottom-xs">
          <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
          <nav class="yamm megamenu-horizontal">
            <ul class="nav">
              
             {{-- @foreach( App\Models\Backend\Category::orderBy('name','asc')->where('is_parent',0)->get() as $ParentCategory )

              <li class="dropdown menu-item"> <a href="{{ route('category.show', $ParentCategory->slug ) }}" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa {{ $ParentCategory->icon_tag }}" aria-hidden="true"></i>{{ $ParentCategory->name }}</a> 
                <ul class="dropdown-menu mega-menu">
                  <li class="yamm-content">
                    <div class="row">
                      <div class="col-xs-6 col-sm-6 col-lg-44">
                        <ul>
                          @foreach( App\Models\Backend\Category::orderBy('name','asc')->where('is_parent',$ParentCategory->id)->get() as $ChildCategory )
                            <li><a href="{{ route('category.show', $ChildCategory->slug ) }}">{{ $ChildCategory->name }}</a></li>
                          @endforeach
                        </ul>
                      </div>
                      <div class="dropdown-banner-holder"> <a href="#"><img alt="" src="{{ asset('Backend/img/category') }}/{{ $ParentCategory->image }}" /></a> </div>
                    </div>
                  </li>
                </ul>
              </li>

             @endforeach --}}


             @foreach( App\Models\Backend\Category::orderBy('name','asc')->where('is_parent',0)->get() as $ParentCategory )
                @if( App\Models\Backend\Category::orderBy('name','asc')->where('is_parent',$ParentCategory->id)->count() > 0 )
                  <li class="dropdown menu-item"> <a href="{{ route('category.show', $ParentCategory->slug ) }}" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa {{ $ParentCategory->icon_tag }}" aria-hidden="true"></i>{{ $ParentCategory->name }}</a> 
                  <ul class="dropdown-menu mega-menu">
                    <li class="yamm-content">
                      <div class="row">
                        <div class="col-xs-6 col-sm-6 col-lg-44">
                          <ul>
                            @foreach( App\Models\Backend\Category::orderBy('name','asc')->where('is_parent',$ParentCategory->id)->get() as $ChildCategory )
                              <li><a class="" href="{{ route('category.show', $ChildCategory->slug ) }}">{{ $ChildCategory->name }}</a></li>
                            @endforeach
                          </ul>
                        </div>
                        <div class="dropdown-banner-holder"> <a href="#"><img alt="" src="{{ asset('Backend/img/category') }}/{{ $ParentCategory->image }}" /></a> </div>
                      </div>
                    </li>
                  </ul>
                @else
                  <li class=""> <a href="{{ route('category.show', $ParentCategory->slug ) }}"><i class="icon fa {{ $ParentCategory->icon_tag }}"></i>{{ $ParentCategory->name }}</a> 
                  </li>
                @endif
              @endforeach

              
            </ul>
            <!-- /.nav --> 
          </nav>
          <!-- /.megamenu-horizontal --> 
        </div>
        <!-- /.side-menu --> 
        <!-- ================================== TOP NAVIGATION : END ================================== --> 
        
        <!-- ============================================== HOT DEALS ============================================== -->
        @php
          $hotdeal = App\Models\Backend\Product::orderBy('offer_price','desc')->where('is_featured',1)->take(5)->get();
          $specialoffer = App\Models\Backend\Product::orderBy('id','desc')->where('is_featured',1)->take(3)->get();
          $specialdeal = App\Models\Backend\Product::orderBy('offer_price','asc')->where('is_featured',1)->take(3)->get();   
          $tags = App\Models\Backend\Product::orderBy('offer_price','asc')->take(10)->get();   
        @endphp

        <div class="sidebar-widget hot-deals wow fadeInUp outer-bottom-xs">
          <h3 class="section-title">hot deals</h3>
          <div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-ss">
           
            @foreach ($hotdeal as $value)
              <div class="item">
                <div class="products">
                  <div class="hot-deal-wrapper">
                    <div class="image"> 
                       @if( !is_null( $value->image ) )
                        <img  src="{{ asset('Backend/img/Product_Primary_image' ) }}/{{ $value->image }}" alt="">
                        @else
                        <img  src="{{ asset('Backend/img/Product_Primary_image/no_image.png' ) }}" alt="">
                        @endif
                    </div>
                 
                    
                    <div class="sale-offer-tag">
                      @php  
                        $discount = ($value->reguler_price-$value->offer_price)/$value->reguler_price*100;
                        $percent = round($discount);
                      @endphp
                      <span>{{ $percent }}%<br>
                      off</span>
                    </div>
                  </div>
                  <!-- /.hot-deal-wrapper -->
                  
                  <div class="product-info text-left m-t-20">
                    <h3 class="name"><a href="{{ route('product.show', $value->slug ) }}">{{ $value->title }}</a></h3>
                    <div class="rating rateit-small"></div>
                     @if( !is_null($value->offer_price) )
                      <div class="product-price"> 
                          <div class="product-price"> <span class="price"> ৳ {{ $value->offer_price }} BDT </span> <span class="price-before-discount">৳ {{ $value->reguler_price }} BDT</span> </div>
                      </div>
                      @endif
                    <!-- /.product-price --> 
                    
                  </div>
                  <!-- /.product-info -->
                  
                  <div class="cart clearfix animate-effect">
                    <div class="action">
                      <div class="add-cart-button btn-group">
                        <form action="{{ route('cart.store') }}" method="POST">
                          @csrf
                          <input type="hidden" name="product_id" value="{{ $value->id }}">
                          <input type="hidden" name="product_quantity" value="1">

                          <!-- <button class="btn btn-primary cart-btn" type="button">Add to cart</button> -->
                          <button class="btn btn-primary icon" type="submit"> <i class="fa fa-shopping-cart"></i> </button>
                          <button class="btn btn-primary cart-btn" type="submit">Add to cart</button>
                        </form>
                      </div>
                    </div>
                    <!-- /.action --> 
                  </div>
                  <!-- /.cart --> 

                </div>
              </div>
            @endforeach

          </div>
          <!-- /.sidebar-widget --> 
        </div>
        <!-- ============================================== HOT DEALS: END ============================================== --> 
        
        <!-- ============================================== SPECIAL OFFER ============================================== -->
        
        <div class="sidebar-widget outer-bottom-small wow fadeInUp">
          <h3 class="section-title">Special Offer</h3>
          <div class="sidebar-widget-body outer-top-xs">
            <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
              @foreach ($specialoffer as $value)
                <div class="item">
                  <div class="products special-product">
                    <div class="product">
                      <div class="product-micro">
                        <div class="row product-micro-row">
                          <div class="col col-xs-5">
                            <div class="product-image">
                               <div class="image"> 
                                  @if( !is_null( $value->image ) )
                                    <img  src="{{ asset('Backend/img/Product_Primary_image' ) }}/{{ $value->image }}" alt="">
                                    @else
                                    <img  src="{{ asset('Backend/img/Product_Primary_image/no_image.png' ) }}" alt="">
                                    @endif
                                </div>
                              <!-- /.image --> 
                              
                            </div>
                            <!-- /.product-image --> 
                          </div>
                          <!-- /.col -->
                          <div class="col col-xs-7">
                            <div class="product-info">
                              <h3 class="name"><a href="{{ route('product.show', $value->slug ) }}">{{ $value->title }}</a></h3>
                              <div class="rating rateit-small"></div>
                              <div class="product-price"> <span class="price"> ৳ {{ $value->reguler_price }} BDT </span> </div>
                              <!-- /.product-price --> 
                              
                            </div>
                          </div>
                          <!-- /.col --> 
                        </div>
                        <!-- /.product-micro-row --> 
                      </div>
                      <!-- /.product-micro --> 
                      
                    </div>
                  </div>
                </div>
              @endforeach

            </div>
          </div>
          <!-- /.sidebar-widget-body --> 
        </div>
        <!-- /.sidebar-widget --> 
        <!-- ============================================== SPECIAL OFFER : END ============================================== --> 
        <!-- ============================================== PRODUCT TAGS ============================================== -->
        <div class="sidebar-widget product-tag wow fadeInUp">
          <h3 class="section-title">Product tags</h3>
          <div class="sidebar-widget-body outer-top-xs">
            <div class="tag-list"> 
              @foreach ($tags as $item)
                  
              <a class="item" title="Phone" href="category.html">{{ $item->tags }}</a>
              @endforeach
            </div>
            <!-- /.tag-list --> 
          </div>
          <!-- /.sidebar-widget-body --> 
        </div>
        <!-- /.sidebar-widget --> 
        <!-- ============================================== PRODUCT TAGS : END ============================================== --> 
        <!-- ============================================== SPECIAL DEALS ============================================== -->
        
        <div class="sidebar-widget outer-bottom-small wow fadeInUp">
          <h3 class="section-title">Special Deals</h3>
          <div class="sidebar-widget-body outer-top-xs">
            <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
              @foreach ($specialdeal as $value)
              <div class="item">
                <div class="products special-product">
                    <div class="product">
                      <div class="product-micro">
                        <div class="row product-micro-row">
                          <div class="col col-xs-5">
                            <div class="product-image">
                              <div class="image"> 
                                  @if( !is_null( $value->image ) )
                                    <img  src="{{ asset('Backend/img/Product_Primary_image' ) }}/{{ $value->image }}" alt="">
                                    @else
                                    <img  src="{{ asset('Backend/img/Product_Primary_image/no_image.png' ) }}" alt="">
                                    @endif
                                </div>
                              <!-- /.image --> 
                              
                            </div>
                            <!-- /.product-image --> 
                          </div>
                          <!-- /.col -->
                          <div class="col col-xs-7">
                            <div class="product-info">
                              <h3 class="name"><a href="{{ route('product.show', $value->slug ) }}">{{ $value->title }}</a></h3>
                              <div class="rating rateit-small"></div>
                              <div class="product-price"> <span class="price"> ৳ {{ $value->reguler_price }} BDT </span> </div>
                              <!-- /.product-price --> 
                              
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              @endforeach

            </div>
          </div>
          <!-- /.sidebar-widget-body --> 
        </div>
        <!-- /.sidebar-widget --> 
        <!-- ============================================== SPECIAL DEALS : END ============================================== --> 
        <!-- ============================================== NEWSLETTER ============================================== -->
        <div class="sidebar-widget newsletter wow fadeInUp outer-bottom-small">
          <h3 class="section-title">Newsletters</h3>
          <div class="sidebar-widget-body outer-top-xs">
            <p>Sign Up for Our Newsletter!</p>
            <form>
              <div class="form-group">
                <label class="sr-only" for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Subscribe to our newsletter">
              </div>
              <button class="btn btn-primary">Subscribe</button>
            </form>
          </div>
          <!-- /.sidebar-widget-body --> 
        </div>
        <!-- /.sidebar-widget --> 
        <!-- ============================================== NEWSLETTER: END ============================================== --> 
        
        <!-- ============================================== Testimonials============================================== -->
        <div class="sidebar-widget  wow fadeInUp outer-top-vs ">
          <div id="advertisement" class="advertisement">
            <div class="item">
              <div class="avatar"><img src="{{ asset('Frontend/assets/images/testimonials/member1.png') }}" alt="Image"></div>
              <div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
              <div class="clients_author">John Doe <span>Abc Company</span> </div>
              <!-- /.container-fluid --> 
            </div>
            <!-- /.item -->
            
            <div class="item">
              <div class="avatar"><img src="{{ asset('Frontend/assets/images/testimonials/member3.png') }}" alt="Image"></div>
              <div class="testimonials"><em>"</em>Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
              <div class="clients_author">Stephen Doe <span>Xperia Designs</span> </div>
            </div>
            <!-- /.item -->
            
            <div class="item">
              <div class="avatar"><img src="{{ asset('Frontend/assets/images/testimonials/member2.png') }}" alt="Image"></div>
              <div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
              <div class="clients_author">Saraha Smith <span>Datsun &amp; Co</span> </div>
              <!-- /.container-fluid --> 
            </div>
            <!-- /.item --> 
            
          </div>
          <!-- /.owl-carousel --> 
        </div>
        
        <!-- ============================================== Testimonials: END ============================================== -->
        
        <div class="home-banner"> <img src="{{ asset('Frontend/assets/images/banners/LHS-banner.jpg') }}" alt="Image"> </div>
      </div>