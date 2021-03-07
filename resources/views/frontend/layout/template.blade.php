<!DOCTYPE html>
<html lang="en">
  <head>
    @include('frontend.include.header')

    @include('frontend.include.css')
  </head>
  <body class="cnt-home">
    <header class="header-style-1"> 
      @include('frontend.include.topbar')

      @include('frontend.include.menubar')
    </header>

    <div class="body-content outer-top-xs" id="top-banner-and-menu">
      <div class="container">
        <div class="row"> 

          @include('frontend.include.sidebar')
          
          @yield('body')

        </div>
      </div>
    </div>

    @include('frontend.include.footer')

    @include('frontend.include.scripts')

  </body>
</html>