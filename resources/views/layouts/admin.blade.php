<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="content-type" content="text/html;charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <meta name="keywords" content="creative tim, html dashboard, html css dashboard, web dashboard, bootstrap 4 dashboard, bootstrap 4, css3 dashboard, bootstrap 4 admin, paper dashboard bootstrap 4 dashboard, frontend, responsive bootstrap 4 dashboard, paper design, paper dashboard bootstrap 4 dashboard">
  <meta name="description" content="Paper Dashboard PRO is a beautiful Bootstrap 4 admin dashboard with a large number of components, designed to look beautiful, clean and organized. If you are looking for a tool to manage dates about your business, this dashboard is the thing for you.">
  <meta itemprop="name" content="Paper Dashboard PRO by Creative Tim">
  <meta itemprop="description" content="Paper Dashboard PRO is a beautiful Bootstrap 4 admin dashboard with a large number of components, designed to look beautiful, clean and organized. If you are looking for a tool to manage dates about your business, this dashboard is the thing for you.">
  <meta itemprop="image" content="../../../s3.amazonaws.com/creativetim_bucket/products/84/opt_pd2p_thumbnail.jpg">
  <meta name="twitter:card" content="product">
  <meta name="twitter:site" content="@creativetim">
  <meta name="twitter:title" content="Paper Dashboard PRO by Creative Tim">
  <meta name="twitter:description" content="Paper Dashboard PRO is a beautiful Bootstrap 4 admin dashboard with a large number of components, designed to look beautiful, clean and organized. If you are looking for a tool to manage dates about your business, this dashboard is the thing for you.">
  <meta name="twitter:creator" content="@creativetim">
  <meta name="twitter:image" content="../../../s3.amazonaws.com/creativetim_bucket/products/84/opt_pd2p_thumbnail.jpg">
  <meta property="fb:app_id" content="655968634437471">
  <meta property="og:title" content="Paper Dashboard PRO by Creative Tim" />
  <meta property="og:type" content="article" />
  <meta property="og:url" content="https://creativetimofficial.github.io/paper-dashboard-2-pro/examples/dashboard.html" />
  <meta property="og:image" content="../../../s3.amazonaws.com/creativetim_bucket/products/84/opt_pd2p_thumbnail.jpg" />
  <meta property="og:description" content="Paper Dashboard PRO is a beautiful Bootstrap 4 admin dashboard with a large number of components, designed to look beautiful, clean and organized. If you are looking for a tool to manage dates about your business, this dashboard is the thing for you." />
  <meta property="og:site_name" content="Creative Tim" />

  <title>@yield('title','Dashboard')</title>

  <link rel="canonical" href="https://www.creative-tim.com/product/paper-dashboard-2-pro" />
  <link rel="apple-touch-icon" sizes="76x76" href="{{asset('contents/admin')}}/img/apple-icon.png">
  <link rel="icon" type="image/png" href="{{asset('contents/admin')}}/img/favicon.png">
  <link href="{{asset('contents/admin')}}/css/fonts.css" rel="stylesheet">
  <link href="{{asset('contents/admin')}}/css/font-awesome.min.css" rel="stylesheet">
  <link href="{{asset('contents/admin')}}/css/bootstrap.min.css" rel="stylesheet" />
  <link href="{{asset('contents/admin')}}/css/paper-dashboard.min1036.css?v=2.1.1" rel="stylesheet" />
  <link href="{{asset('contents/admin')}}/css/demo.css" rel="stylesheet" />
  <link href="{{asset('contents/admin')}}/css/style.css" rel="stylesheet" />
  <link href="{{asset('contents/admin')}}/fontawesome/css/all.css" rel="stylesheet" />

  <!-- Datatable link -->
  <link rel="stylesheet" href="{{asset('contents/admin')}}/css/dataTables.bootstrap4.min.css">

  <!--toastr-->
  <link href="{{asset('contents/admin')}}/css/toastr.min.css" rel="stylesheet" />

</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="default" data-active-color="danger">
      <div class="logo">
        <a href="#" class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="{{asset('contents/admin')}}/img/logo-small.png">
          </div>
        </a>
        <a href="#" class="simple-text logo-normal font-weight-bold">
          Seminar
        </a>
      </div>

      <div class="sidebar-wrapper">
        <div class="user">
          <div class="photo">
            <img src="{{asset('storage/user/'.Auth::user()->image)}}" />
          </div>
          <div class="info user-role">
            <a data-toggle="collapse" href="#collapseExample" class="collapsed">
              <span>
                {{ Auth::user()->name }}
                <!-- <b class="caret"></b> -->
              </span>
              @php
                $roles = \App\UserRole::all();
              @endphp
              @foreach($roles as $role)
                <span class="text-warning font-weight-bold">@if (Auth::user()->role_id==$role->id) {{$role->name}} @endif</span>
              @endforeach
            </a>
            <div class="clearfix"></div>
          </div>
        </div>


        <ul class="nav">
          <li class="active"> 
            <a class="{{ (request()->is('admin')) ? 'active' : '' }}" href="{{ url('admin') }}">
              <i class="fa fa-home nc-icon nc-bank"></i>
              <p>Dashboard</p>
            </a>
          </li>

          <!-- <li class="">
            <a class="{{ (request()->is('admin/user')) ? 'active' : '' }}" href="{{ url('admin/user') }}">
              <i class="fa fa-user nc-icon nc-bank"></i>
              <p>Users</p>
            </a>
          </li> -->

          <li>
            <a data-toggle="collapse" href="#users">
              <i class="fa fa-users"></i>
              <p>
                Users <b class="caret"></b>
              </p>
            </a>
            <div class="collapse" id="users">
              <ul class="nav">
                <li>
                  <a class="{{ (request()->is('admin/user')) ? 'active' : '' }}" href="{{ url('admin/user') }}">
                    <span class="sidebar-mini-icon">AU</span>
                    <span class="sidebar-normal"> All User </span>
                  </a>
                </li>
                <li>
                  <a class="{{ (request()->is('admin/user/create')) ? 'active' : '' }}" href="{{ url('admin/user/create') }}">
                    <span class="sidebar-mini-icon">AU</span>
                    <span class="sidebar-normal"> Add User </span>
                  </a>
                </li>
                <li>
                  <a class="{{ (request()->is('admin/recycle/user')) ? 'active' : '' }}" href="{{ url('admin/recycle/user') }}">
                    <span class="sidebar-mini-icon">UR</span>
                    <span class="sidebar-normal"> User Recycle </span>
                  </a>
                </li>
              </ul>
            </div>
          </li>

          <li class="">
            <a class="{{ (request()->is('admin/teacher')) ? 'active' : '' }}" href="{{ url('admin/teacher') }}">
              <i class="fa fa-user nc-icon nc-bank"></i>
              <p>Teacher</p>
            </a>
          </li>

          <li class="">
            <a class="{{ (request()->is('admin/student')) ? 'active' : '' }}" href="{{ url('admin/student') }}">
              <i class="fa fa-user nc-icon nc-bank"></i>
              <p>Student</p>
            </a>
          </li>

          <li class="">
            <a class="{{ (request()->is('admin/course')) ? 'active' : '' }}" href="{{ url('admin/course') }}">
              <i class="fa fa-book nc-icon nc-bank"></i>
              <p>Course</p>
            </a>
          </li>

          <li class="">
            <a class="{{ (request()->is('admin/seminar')) ? 'active' : '' }}" href="{{ url('admin/seminar') }}">
              <i class="fa fa-book nc-icon nc-bank"></i>
              <p>Seminar</p>
            </a>
          </li>

          <li class="">
            <a class="{{ (request()->is('admin/manage')) ? 'active' : '' }}" href="{{ url('admin/manage') }}">
              <i class="fa fa-cogs nc-icon nc-bank"></i>
              <p>Manage</p>
            </a>
          </li>

          @if(Auth::User()->role_id == 1)
            <li class="">
              <a class="{{ (request()->is('website')) ? 'active' : '' }}" href="{{ url('website') }}">
                <i class="fa fa-cogs nc-icon nc-bank"></i>
                <p>website</p>
              </a>
            </li>
          @endif
          

          <!-- <li>
            <a data-toggle="collapse" href="#pagesExamples">
              <i class="nc-icon nc-book-bookmark"></i>
              <p>
                Pages <b class="caret"></b>
              </p>
            </a>
            <div class="collapse " id="pagesExamples">
              <ul class="nav">
                <li>
                  <a href="pages/timeline.html">
                    <span class="sidebar-mini-icon">T</span>
                    <span class="sidebar-normal"> Timeline </span>
                  </a>
                </li>
                <li>
                  <a href="pages/login.html">
                    <span class="sidebar-mini-icon">L</span>
                    <span class="sidebar-normal"> Login </span>
                  </a>
                </li>
                <li>
                  <a href="pages/register.html">
                    <span class="sidebar-mini-icon">R</span>
                    <span class="sidebar-normal"> Register </span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
 -->
          <li>
            <a href="{{ route('logout') }}"onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
              <i class="fa fa-sign-out-alt nc-icon nc-calendar-60"></i>
              <p>Sign out</p>
            </a>
          </li>

        </ul>
      </div>
    </div>


    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-minimize">
              <button id="minimizeSidebar" class="btn btn-icon btn-round">
                <i class="fas fa-angle-double-right nc-icon nc-minimal-right text-center visible-on-sidebar-mini"></i>
                <i class="fas fa-angle-double-left nc-icon nc-minimal-left text-center visible-on-sidebar-regular"></i>
              </button>
            </div>
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="javascript:;">Dashboard</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <form>
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <i class="fas fa-search nc-icon nc-zoom-split"></i>
                  </div>
                </div>
              </div>
            </form>
            <ul class="navbar-nav">
              <li class="nav-item btn-rotate dropdown">
                <a class="nav-link fa fa-user" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#"><i class="fa fa-user"></i> Profile</a>

                  <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa fa-sign-out-alt"></i> Logout</a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                    </form>
                  
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->

      <div class="content">
        @yield('content')
      </div>

      <footer class="footer footer-black  footer-white ">
        <div class="container-fluid">
          <div class="row">
            <nav class="footer-nav">
              <ul>
                <li><a href="https://www.creative-tim.com/" target="_blank">Creative</a></li>
                <li><a href="https://www.creative-tim.com/blog" target="_blank">Blog</a></li>
                <li><a href="https://www.creative-tim.com/license" target="_blank">Licenses</a></li>
              </ul>
            </nav>
            <div class="credits ml-auto">
              <span class="copyright">
                © <script>
                  document.write(new Date().getFullYear())
                </script>, made <i class="fa fa-heart heart"></i> by Rafi.
              </span>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>


  <!--   Core JS Files   -->
  <script src="{{asset('contents/admin')}}/js/jquery.min.js"></script>
  <script src="{{asset('contents/admin')}}/js/popper.min.js"></script>
  <script src="{{asset('contents/admin')}}/js/bootstrap.min.js"></script>
  <script src="{{asset('contents/admin')}}/js/perfect-scrollbar.jquery.min.js"></script>
  <script src="{{asset('contents/admin')}}/js/moment.min.js"></script>
  <script src="{{asset('contents/admin')}}/js/bootstrap-switch.js"></script>
  <script src="{{asset('contents/admin')}}/js/sweetalert2.min.js"></script>
  <script src="{{asset('contents/admin')}}/js/jquery.validate.min.js"></script>
  <script src="{{asset('contents/admin')}}/js/jquery.bootstrap-wizard.js"></script>
  <script src="{{asset('contents/admin')}}/js/bootstrap-selectpicker.js"></script>
  <script src="{{asset('contents/admin')}}/js/bootstrap-datetimepicker.js"></script>
  <script src="{{asset('contents/admin')}}/js/bootstrap-tagsinput.js"></script>
  <script src="{{asset('contents/admin')}}/js/jasny-bootstrap.min.js"></script>
  <script src="{{asset('contents/admin')}}/js/fullcalendar.min.js"></script>
  <script src="{{asset('contents/admin')}}/js/daygrid.min.js"></script>
  <script src="{{asset('contents/admin')}}/js/timegrid.min.js"></script>
  <script src="{{asset('contents/admin')}}/js/interaction.min.js"></script>
  <script src="{{asset('contents/admin')}}/js/jquery-jvectormap.js"></script>
  <script src="{{asset('contents/admin')}}/js/nouislider.min.js"></script>
  <script src="{{asset('contents/admin')}}/js/googleapis.js"></script>
  <script async defer src="{{asset('contents/admin')}}/js/buttons.js"></script>
  <script src="{{asset('contents/admin')}}/js/chartjs.min.js"></script>
  <script src="{{asset('contents/admin')}}/js/bootstrap-notify.js"></script>
  <script src="{{asset('contents/admin')}}/js/paper-dashboard.min1036.js?v=2.1.1" type="text/javascript"></script>
  <script src="{{asset('contents/admin')}}/js/demo.js"></script>
  <script src="{{asset('contents/admin')}}/js/jquery.sharrre.js"></script>
  <script src="{{asset('contents/admin')}}/js/custom.js"></script>

  <!-- Datatable link -->
  <script src="{{asset('contents/admin')}}/js/jquery.dataTables.min.js" type="text/javascript"></script>
  <script src="{{asset('contents/admin')}}/js/dataTables.bootstrap4.min.js" type="text/javascript"></script>

  <!--toastr-->
  <script src="{{asset('contents/admin')}}/js/toastr.min.js"></script>

  <!-- Toastr without composer code start -->
  @if(Session::has('success'))
    <script>
      toastr.success("{{ Session::get('success') }}", "success", {
        positionClass : "toast-top-right",
        closeButton: true,
        progressBar: true,
        timeOut : "3000",
      });
    </script>
  @endif
  @if(Session::has('info'))
    <script>
      toastr.info("{{ Session::get('info') }}");
    </script>
  @endif
  @if(Session::has('warning'))
    <script>
      toastr.warning("{{ Session::get('warning') }}");
    </script>
  @endif
  @if(Session::has('error'))
    <script>
      toastr.error("{{ Session::get('error') }}", "error",{
        positionClass : "toast-top-full-width",
        closeButton: true,
        progressBar: true,
        timeOut : "3000",
      });
    </script>
  @endif
  <!-- Toastr without composer code end -->

  
 <script>
    $(document).ready(function() {


      $('#facebook').sharrre({
        share: {
          facebook: true
        },
        enableHover: false,
        enableTracking: false,
        enableCounter: false,
        click: function(api, options) {
          api.simulateClick();
          api.openPopup('facebook');
        },
        template: '<i class="fab fa-facebook-f"></i> Facebook',
        url: 'https://demos.creative-tim.com/paper-dashboard-pro/examples/dashboard.html'
      });

      $('#google').sharrre({
        share: {
          googlePlus: true
        },
        enableCounter: false,
        enableHover: false,
        enableTracking: true,
        click: function(api, options) {
          api.simulateClick();
          api.openPopup('googlePlus');
        },
        template: '<i class="fab fa-google-plus"></i> Google',
        url: 'https://demos.creative-tim.com/paper-dashboard-pro/examples/dashboard.html'
      });

      $('#twitter').sharrre({
        share: {
          twitter: true
        },
        enableHover: false,
        enableTracking: false,
        enableCounter: false,
        buttons: {
          twitter: {
            via: 'CreativeTim'
          }
        },
        click: function(api, options) {
          api.simulateClick();
          api.openPopup('twitter');
        },
        template: '<i class="fab fa-twitter"></i> Twitter',
        url: 'https://demos.creative-tim.com/paper-dashboard-pro/examples/dashboard.html'
      });



      // Facebook Pixel Code Don't Delete
      ! function(f, b, e, v, n, t, s) {
        if (f.fbq) return;
        n = f.fbq = function() {
          n.callMethod ?
            n.callMethod.apply(n, arguments) : n.queue.push(arguments)
        };
        if (!f._fbq) f._fbq = n;
        n.push = n;
        n.loaded = !0;
        n.version = '2.0';
        n.queue = [];
        t = b.createElement(e);
        t.async = !0;
        t.src = v;
        s = b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t, s)
      }(window,
        document, 'script', '//connect.facebook.net/en_US/fbevents.js');

      try {
        fbq('init', '111649226022273');
        fbq('track', "PageView");

      } catch (err) {
        console.log('Facebook Track Error:', err);
      }

    });
  </script>
  <noscript>
    <img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=111649226022273&ev=PageView&noscript=1" />
  </noscript>
  <script>
    $(document).ready(function() {

      $sidebar = $('.sidebar');
      $sidebar_img_container = $sidebar.find('.sidebar-background');

      $full_page = $('.full-page');

      $sidebar_responsive = $('body > .navbar-collapse');
      sidebar_mini_active = false;

      window_width = $(window).width();

      fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

      // if( window_width > 767 && fixed_plugin_open == 'Dashboard' ){
      //     if($('.fixed-plugin .dropdown').hasClass('show-dropdown')){
      //         $('.fixed-plugin .dropdown').addClass('show');
      //     }
      //
      // }

      $('.fixed-plugin a').click(function(event) {
        // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
        if ($(this).hasClass('switch-trigger')) {
          if (event.stopPropagation) {
            event.stopPropagation();
          } else if (window.event) {
            window.event.cancelBubble = true;
          }
        }
      });

      $('.fixed-plugin .active-color span').click(function() {
        $full_page_background = $('.full-page-background');

        $(this).siblings().removeClass('active');
        $(this).addClass('active');

        var new_color = $(this).data('color');

        if ($sidebar.length != 0) {
          $sidebar.attr('data-active-color', new_color);
        }

        if ($full_page.length != 0) {
          $full_page.attr('data-active-color', new_color);
        }

        if ($sidebar_responsive.length != 0) {
          $sidebar_responsive.attr('data-active-color', new_color);
        }
      });

      $('.fixed-plugin .background-color span').click(function() {
        $(this).siblings().removeClass('active');
        $(this).addClass('active');

        var new_color = $(this).data('color');

        if ($sidebar.length != 0) {
          $sidebar.attr('data-color', new_color);
        }

        if ($full_page.length != 0) {
          $full_page.attr('filter-color', new_color);
        }

        if ($sidebar_responsive.length != 0) {
          $sidebar_responsive.attr('data-color', new_color);
        }
      });

      $('.fixed-plugin .img-holder').click(function() {
        $full_page_background = $('.full-page-background');

        $(this).parent('li').siblings().removeClass('active');
        $(this).parent('li').addClass('active');


        var new_image = $(this).find("img").attr('src');

        if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
          $sidebar_img_container.fadeOut('fast', function() {
            $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
            $sidebar_img_container.fadeIn('fast');
          });
        }

        if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
          var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

          $full_page_background.fadeOut('fast', function() {
            $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
            $full_page_background.fadeIn('fast');
          });
        }

        if ($('.switch-sidebar-image input:checked').length == 0) {
          var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
          var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

          $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
          $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
        }

        if ($sidebar_responsive.length != 0) {
          $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
        }
      });

      $('.switch-sidebar-image input').on("switchChange.bootstrapSwitch", function() {
        $full_page_background = $('.full-page-background');

        $input = $(this);

        if ($input.is(':checked')) {
          if ($sidebar_img_container.length != 0) {
            $sidebar_img_container.fadeIn('fast');
            $sidebar.attr('data-image', '#');
          }

          if ($full_page_background.length != 0) {
            $full_page_background.fadeIn('fast');
            $full_page.attr('data-image', '#');
          }

          background_image = true;
        } else {
          if ($sidebar_img_container.length != 0) {
            $sidebar.removeAttr('data-image');
            $sidebar_img_container.fadeOut('fast');
          }

          if ($full_page_background.length != 0) {
            $full_page.removeAttr('data-image', '#');
            $full_page_background.fadeOut('fast');
          }

          background_image = false;
        }
      });


      $('.switch-mini input').on("switchChange.bootstrapSwitch", function() {
        $body = $('body');

        $input = $(this);

        if (paperDashboard.misc.sidebar_mini_active == true) {
          $('body').removeClass('sidebar-mini');
          paperDashboard.misc.sidebar_mini_active = false;
        } else {
          $('body').addClass('sidebar-mini');
          paperDashboard.misc.sidebar_mini_active = true;
        }

        // we simulate the window Resize so the charts will get updated in realtime.
        var simulateWindowResize = setInterval(function() {
          window.dispatchEvent(new Event('resize'));
        }, 180);

        // we stop the simulation of Window Resize after the animations are completed
        setTimeout(function() {
          clearInterval(simulateWindowResize);
        }, 1000);

      });

    });
  </script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      demo.initDashboardPageCharts();


      demo.initVectorMap();

    });
  </script>

</body>

</html>