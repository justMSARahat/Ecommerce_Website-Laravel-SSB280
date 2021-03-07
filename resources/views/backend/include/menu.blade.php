
    <div class="br-logo"><a href=""><span>[</span>bracket <i>plus</i><span>]</span></a></div>
    <div class="br-sideleft sideleft-scrollbar">
      <label class="sidebar-label pd-x-10 mg-t-20 op-3">Navigation</label>
      <ul class="br-sideleft-menu">

        <li class="br-menu-item">
          <a href="{{ route('dashboard') }}" class="br-menu-link @if( Route::currentRouteNamed('dashboard') ) active @endif">
            <i class="menu-item-icon icon ion-ios-home-outline tx-24"></i>
            <span class="menu-item-label">Dashboard</span>
          </a><!-- br-menu-link -->
        </li><!-- br-menu-item -->

        <label class="sidebar-label pd-x-10 mg-t-25 mg-b-5 tx-info">E-Commerce Functionality</label>

        <!-- Brand Navigation Start -->
        <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub @if( Route::currentRouteNamed('brand.manage') || Route::currentRouteNamed('brand.create') || Route::currentRouteNamed('brand.edit') ) active @endif">
            <i class="menu-item-icon icon fas fa-bookmark tx-20"></i>
            <span class="menu-item-label">Brands</span>
          </a><!-- br-menu-link -->
          <ul class="br-menu-sub">
            <li class="sub-item"><a href="{{ route('brand.manage') }}" class="sub-link @if( Route::currentRouteNamed('brand.manage') ) active @endif">Manage Brands</a></li>
            <li class="sub-item"><a href="{{ route('brand.create') }}" class="sub-link @if( Route::currentRouteNamed('brand.create') ) active @endif">Create Brands</a></li>
          </ul>
        </li>
        <!-- Brand Navigation End -->

        <!-- Category Navigation Start -->        
        <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub @if( Route::currentRouteNamed('category.manage') || Route::currentRouteNamed('category.create') || Route::currentRouteNamed('category.edit') ) active @endif">
            <i class="menu-item-icon icon fas fa-cubes tx-20"></i>
            <span class="menu-item-label">Category</span>
          </a><!-- br-menu-link -->
          <ul class="br-menu-sub">
            <li class="sub-item"><a href="{{ route('category.manage') }}" class="sub-link @if(Route::currentRouteNamed('category.manage')) active @endif">Manage Category</a></li>
            <li class="sub-item"><a href="{{ route('category.create') }}" class="sub-link @if(Route::currentRouteNamed('category.create')) active @endif">Create Category</a></li>
          </ul>
        </li>
      </ul><!-- br-sideleft-menu -->
      <!-- Category Navigation Start -->

        <label class="sidebar-label pd-x-10 mg-t-25 mg-b-5 tx-info">Shop Management</label>

        <!-- Brand Navigation Start -->
        <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub @if( Route::currentRouteNamed('product.manage') || Route::currentRouteNamed('product.create') || Route::currentRouteNamed('product.edit') ) active @endif">
            <i class="menu-item-icon icon fas fa-shopping-cart tx-20"></i>
            <span class="menu-item-label">Products</span>
          </a><!-- br-menu-link -->
          <ul class="br-menu-sub">
            <li class="sub-item"><a href="{{ route('product.manage') }}" class="sub-link  @if(Route::currentRouteNamed('product.manage')) active @endif">Manage Products</a></li>
            <li class="sub-item"><a href="{{ route('product.create') }}" class="sub-link  @if(Route::currentRouteNamed('product.create')) active @endif">Create Product</a></li>
          </ul>
        </li>
        <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub @if( Route::currentRouteNamed('order.manage') || Route::currentRouteNamed('order.create') || Route::currentRouteNamed('product.edit') ) active @endif">
            <i class="menu-item-icon icon fas fa-shopping-cart tx-20"></i>
            <span class="menu-item-label">Orders</span>
          </a><!-- br-menu-link -->
          <ul class="br-menu-sub">
            <li class="sub-item"><a href="{{ route('order.manage') }}" class="sub-link  @if(Route::currentRouteNamed('order.manage')) active @endif">Manage Products</a></li>
            
           </ul>
        </li>
        <!-- Brand Navigation End -->
        <label class="sidebar-label pd-x-10 mg-t-25 mg-b-5 tx-info">Store Decoration</label>

        <!-- Brand Navigation Start -->
        <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub @if( Route::currentRouteNamed('slider.manage') || Route::currentRouteNamed('slider.create') || Route::currentRouteNamed('slider.edit') ) active @endif">
            <i class="menu-item-icon icon fas fa-sliders-h tx-20"></i>
            
            <span class="menu-item-label">Home Slider</span>
          </a><!-- br-menu-link -->
          <ul class="br-menu-sub">
            <li class="sub-item"><a href="{{ route('slider.manage') }}" class="sub-link  @if(Route::currentRouteNamed('slider.manage')) active @endif">Manage Slider</a></li>
            <li class="sub-item"><a href="{{ route('slider.create') }}" class="sub-link  @if(Route::currentRouteNamed('slider.create')) active @endif">Create Slider</a></li>
          </ul>
        </li>
        <!-- Brand Navigation End -->


        <label class="sidebar-label pd-x-10 mg-t-25 mg-b-5 tx-info">Shipping Area Management</label>

        <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub @if( Route::currentRouteNamed('country.manage') || Route::currentRouteNamed('country.create') || Route::currentRouteNamed('country.edit') ) active @endif">
            <i class="menu-item-icon icon fas fa-globe-asia tx-20"></i>
            <span class="menu-item-label">Country</span>
          </a><!-- br-menu-link -->
          <ul class="br-menu-sub">
            <li class="sub-item"><a href="" class="sub-link">Manage All Country</a></li>
            <li class="sub-item"><a href="" class="sub-link">Add New Country</a></li>
          </ul>
        </li>

        <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub @if( Route::currentRouteNamed('division.manage') || Route::currentRouteNamed('division.create') || Route::currentRouteNamed('division.edit') ) active @endif">
            <i class="menu-item-icon icon fas fa-globe tx-20"></i>
            <span class="menu-item-label">Division</span>
          </a><!-- br-menu-link -->
          <ul class="br-menu-sub">
            <li class="sub-item"><a href="{{ route('division.manage') }}" class="sub-link  @if(Route::currentRouteNamed('division.manage')) active @endif">Manage All Division</a></li>
            <li class="sub-item"><a href="{{ route('division.create') }}" class="sub-link  @if(Route::currentRouteNamed('division.create')) active @endif">Add New Division</a></li>
          </ul>
        </li>

        <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub @if( Route::currentRouteNamed('district.manage') || Route::currentRouteNamed('district.create') || Route::currentRouteNamed('district.edit') ) active @endif" >
            <i class="menu-item-icon icon fas fa-location-arrow tx-20"></i>
            <span class="menu-item-label">District</span>
          </a><!-- br-menu-link -->
          <ul class="br-menu-sub">
            <li class="sub-item"><a href="{{ route('district.manage') }}" class="sub-link  @if(Route::currentRouteNamed('district.manage')) active @endif">Manage All District</a></li>
            <li class="sub-item"><a href="{{ route('district.create') }}" class="sub-link  @if(Route::currentRouteNamed('district.create')) active @endif">Add New District</a></li>
          </ul>
        </li>


      <br>
    </div><!-- br-sideleft -->