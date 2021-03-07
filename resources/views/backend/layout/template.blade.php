<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Header Tags -->
    @include('Backend.include.header')

    <title></title>

    <!-- Css -->
    @include('Backend.include.css')
  </head>

  <body>

    <!-- ########## START: LEFT PANEL ########## -->
    @include('Backend.include.menu')
    <!-- ########## END: LEFT PANEL ########## -->

    <!-- ########## START: HEAD PANEL ########## -->
    @include('Backend.include.top')
    <!-- ########## END: HEAD PANEL ########## -->

    <!-- ########## START: RIGHT PANEL ########## -->
    @include('Backend.include.rightbar')
    <!-- ########## END: RIGHT PANEL ########## --->

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
      @yield('body')


    <!-- ########## START:Main Page Content Will Be Here ########## -->



    <!-- ########## END:Main Page Content Will Be Here ########## --->


      <!-- ########## START: RIGHT PANEL ########## -->
      @include('Backend.include.footer')
      <!-- ########## END: RIGHT PANEL ########## --->

    </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

    <!-- ########## START: Script PANEL ########## -->
    @include('Backend.include.script')
    <!-- ########## END: Script PANEL ########## --->
  </body>
</html>
