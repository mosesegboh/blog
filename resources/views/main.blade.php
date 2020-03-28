<!DOCTYPE html>
<html lang="en">
  <head>
    @include('partials._head')
  </head>

  <body>

      @include('partials._nav')
        <!-- Default bootstrap Navbar -->


     <div class="container">

      @include('partials._messages')


      {{-- quick way to check is user is logged in or logged out{{Auth::check() ? "Logged In" : "Logged Out"}} --}}
        
        @yield('content')
        

         @include('partials._footer')
     </div> <!-- end of container -->

     @include('partials._javascript')

     @yield('scripts')

    
  </body>
</html>