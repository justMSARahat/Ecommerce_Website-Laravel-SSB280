<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Header Tags -->
    @include('backend.include.header')

    <title></title>

    <!-- Css -->
    @include('backend.include.css')
  </head>

  <body>

    <!-- ########## START: LEFT PANEL ########## -->
    @include('backend.include.menu')
    <!-- ########## END: LEFT PANEL ########## -->

    <!-- ########## START: HEAD PANEL ########## -->
    @include('backend.include.top')
    <!-- ########## END: HEAD PANEL ########## -->

    <!-- ########## START: RIGHT PANEL ########## -->
    @include('backend.include.rightbar')
    <!-- ########## END: RIGHT PANEL ########## --->

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
      @yield('body')


    <!-- ########## START:Main Page Content Will Be Here ########## -->



    <!-- ########## END:Main Page Content Will Be Here ########## --->


      <!-- ########## START: RIGHT PANEL ########## -->
      @include('backend.include.footer')
      <!-- ########## END: RIGHT PANEL ########## --->

    </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

    <!-- ########## START: Script PANEL ########## -->
    @include('backend.include.script')
    <!-- ########## END: Script PANEL ########## --->
  </body>
</html>
