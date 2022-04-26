 @extends('layouts.app')
 @section('body')

        <!-- [ Pre-loader ] start -->
        <div class="loader-bg">
            <div class="loader-track">
                <div class="loader-fill"></div>
            </div>
        </div>
        <!-- [ Pre-loader ] End -->


        <!-- left side nav start -->

        <nav class="pcoded-navbar">

           @include('layouts.left-side-nav')
            
        </nav>
        <!-- left side nav End -->
        
        <!-- top nav starts -->
        <header class="navbar pcoded-header navbar-expand-lg navbar-light">
            @include('layouts.top-nav')
         </header>
         <!-- top nav Ends -->

        <!-- [ Main Content ] start -->
      <div class="pcoded-main-container">
        <div class="pcoded-wrapper">
            <div class="pcoded-content">
                <div class="pcoded-inner-content">
                    <!-- [ breadcrumb ] start -->

                    <!-- [ breadcrumb ] end -->
                       <div class="main-body">
                           <div class="page-wrapper">

                                   <!-- content Start -->
                                       <div class="row"> 
                                         @include('layouts.error')
                                       @yield('content')
                                    
                                       </div> 

                                    <!-- content Ends -->

                            <footer>
                               
                           </footer>

                    
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
        @yield('script')

    <script src="{{ asset('assets/js/vendor-all.min.js')}}"></script>
	<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('assets/js/pcoded.min.js')}}"></script>


@endsection
 