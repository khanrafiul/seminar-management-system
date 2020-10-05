<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>@yield('title','website')</title>
    <link rel="stylesheet" href="{{asset('contents/website')}}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('contents/website')}}/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('contents/website')}}/css/slick.css">
    <link rel="stylesheet" href="{{asset('contents/website')}}/css/meanmenu.min.css">
    <link rel="stylesheet" href="{{asset('contents/website')}}css/jQuery.fancybox.css">
    <link rel="stylesheet" href="{{asset('contents/website')}}/css/open-sans.css">
    <link rel="stylesheet" href="{{asset('contents/website')}}/css/raleway.css">
    <link rel="stylesheet" href="{{asset('contents/website')}}/css/sacramento.css">
    <link rel="stylesheet" href="{{asset('contents/website')}}/css/roboto.css">
    <link rel="stylesheet" href="{{asset('contents/website')}}/css/jquery-ui.css">
    <link rel="stylesheet" href="{{asset('contents/website')}}/css/YouTubePopUp.css">
    <link rel="stylesheet" href="{{asset('contents/website')}}/css/style.css">
    <link rel="stylesheet" href="{{asset('contents/website')}}/css/media.css">

    <script src="{{asset('contents/website')}}/js/jquery-1.12.4.min.js"></script>
    <script src="{{asset('contents/website')}}/js/sweetalert.min.js"></script>
</head>
<body id="index2">
   <!-- Header Part Start -->
<header id="header">
   <div class="container">
       <div class="row">
           <div class="header-content">
             <div class="col-md-4">
                 <div class="header-left">
                  <div class="header-color">
                    <h2>Seminar Management</h2>
                  </div>
                 </div>
             </div>

             <div class="col-md-4 col-md-offset-4">
                     <div class="header-right text-right">
                        <ul>
                          @if(Auth::User()->role_id == 1)
                            <li> 
                              <span><a href="{{ url('admin') }}"><i class="fa fa-shopping-bag"></i> Dashboard </a>
                              </span>
                            </li> 
                          @endif

                           <li class="tahsan">
                              <span><a href="#"><i class="fa fa-shopping-bag"></i> Sign out</a>
                              </span>

                              <div class="items text-right">
                                  <a class="dropdown-item" href="{{ route('logout') }}"
                                  onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i> Logout</a>

                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                  </form>
                              </div>
                            </li>
                        </ul>
                     </div>
                 </div>
           </div>
       </div>
   </div>
</header>
<!-- Header Part End -->

<!-- Navbar Part Start -->
    <nav class="navbar navbar-default hidden-xs">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          {{-- <a class="navbar-brand" href="index2.html">
              <img src="{{asset('contents/website')}}/images/logo.jpg" alt="logo" class="img-responsive">
          </a> --}}
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
              <li><a class="dropdown-item" href="{{url('website')}}">Home</a></li>
              <li><a class="dropdown-item" href="about.html">About</a></li>
            <li><a href="{{url('contact')}}">Contact</a></li>
          </ul>
        </div>
    </div>
</nav>
<!-- Navbar Part End -->

@yield('content')

<!-- Footer Part Start -->
<section id="footer">
   <div class="footer-bg">
       <div class="container">
           <div class="row">
               <div class="footer-main">
                   <div class="col-md-6">
                       <div class="footer-logo" style="padding-left: 150px">
                           <a href="#"><img src="{{asset('contents/website')}}/images/footer-logo.png" alt="footer-logo" class="img-responsive"></a>
                           <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
                           <p>magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
                       </div>
                   </div>
                   <div class="col-md-6">
                       <div class="contact text-center">
                        <h2>Contact us</h2>
                           <p><i class="fa fa-map-marker"></i> <a href="#">1234, Parkstreet Avenue, NewYork</a> </p>
                           <p><i class="fa fa-phone"></i> <a href="tel:+12345678900">+123 456 78900</a>,<a href="tel:+00987654321"> +009 876 54321</a> </p>
                           <p><i class="fa fa-envelope"></i> <a href="mailto:info@e-feri.com">info@e-feri.com</a>,<a href="mailto:e-feri@info.com"> e-feri@info.com</a> </p>
                           <p><i class="fa fa-globe"></i> <a href="www.e-feri.com">www.e-feri.com</a>,<a href="www.infoferi.com">www.infoferi.com</a> </p>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>
</section>
<!-- Footer Part End -->

<!-- Footer Bottom Start -->
<section id="footer-btm">
   <div class="container">
       <div class="row">
           <div class="col-md-6 col-xs-12">
              <div class="copywright">
                   <p>Copyright &copy; 2017. All right reserved by <a href="index.html">Rafi</a></p>
               </div>
           </div>
       </div>
   </div>
</section>
   <!-- Footer Bottom End -->


    <script src="{{asset('contents/website')}}/js/slick.js"></script>
    <script src="{{asset('contents/website')}}/js/bootstrap.min.js"></script>
    <script src="{{asset('contents/website')}}/js/jquery.countdown.min.js"></script>
    <script src="{{asset('contents/website')}}/js/jquery.meanmenu.min.js"></script>
    <script src="{{asset('contents/website')}}/js/jquery.counterup.min.js"></script>
    <script src="{{asset('contents/website')}}/js/jquery.waypoints.min.js"></script>
    <script src="{{asset('contents/website')}}/js/jquery.elevatezoom.js"></script>
    <script src="{{asset('contents/website')}}/js/jquery.fancybox.pack.js"></script>
    <script src="{{asset('contents/website')}}/js/YouTubePopUp.jquery.js"></script>
    <script src="{{asset('contents/website')}}/js/jquery-ui.min.js"></script>
    <script src="{{asset('contents/website')}}/js/index.js"></script>
    <script src="{{asset('contents/website')}}/js/handleCounter.js"></script>
    <script src="{{asset('contents/website')}}/js/xzoom.min.js"></script>
    <script src="{{asset('contents/website')}}/js/setup.js"></script>
    <script src="{{asset('contents/website')}}/js/main.js"></script>

    <!-- custom jQuery -->
    <script>
     $(function ($) {
            var options = {
                minimum: 1,
                maximize: 100,
                onChange: valChanged,
                onMinimum: function(e) {
                    console.log('reached minimum: '+e)
                },
                onMaximize: function(e) {
                    console.log('reached maximize'+e)
                }
            }
            $('#handleCounter').handleCounter(options)
            $('#handleCounter2').handleCounter(options)
            $('#handleCounter3').handleCounter(options)
            $('#handleCounter4').handleCounter(options)
			$('#handleCounter3').handleCounter({maximize: 100})
        })
        function valChanged(d) {
//            console.log(d)
        }
    </script>

</body>
</html>
