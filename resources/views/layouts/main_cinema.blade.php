<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="OneTech shop project">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Eventix | @yield('title')</title>
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
        <link href="{{asset('assets/css/icons/icomoon/styles.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('assets/css/bootstrap.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('assets/css/core.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('assets/css/components.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('assets/css/colors.css')}}" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/r-2.2.2/datatables.min.css"/>
        @yield('style')
        <style media="screen">
          .form-control{
            color: black !important;
          }

          .navbar-brand img{
            -webkit-filter: brightness(0) invert(1);
            filter: brightness(0) invert(1);
          }

        </style>

    </head>
    <body>
        <div class="navbar navbar-inverse bg-indigo">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{url('/')}}">
                  <img src="{{asset('images/logo-eventix.png')}}" alt="" width="100%">
                </a>
                <ul class="nav navbar-nav visible-xs-block">
                    <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
                    <li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
                </ul>
            </div>
            <div class="navbar-collapse collapse" id="navbar-mobile">
                <ul class="nav navbar-nav">
                    <li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>
                </ul>
                <div class="navbar-right">
                    <p class="navbar-text">Hello, {{Auth::user()->name}} !</p>
                    <p class="navbar-text"><span class="label bg-success-400">Online</span></p>
                </div>
            </div>
        </div>

        <div class="page-container">

            <!-- Page content -->
            <div class="page-content">

                <!-- Main sidebar -->
                <div class="sidebar sidebar-main sidebar-default">
                    <div class="sidebar-content">

                        <!-- User menu -->
                        <div class="sidebar-user-material">
                            <div class="category-content">
                                <div class="sidebar-user-material-content">
                                    <a href="#"><img src="https://is4-ssl.mzstatic.com/image/thumb/Purple128/v4/8a/0e/27/8a0e2749-7b89-d23a-54bd-985a3057ae85/AppIcon-1x_U007emarketing-85-220-1.png/600x600wa.png" class="img-circle img-responsive" alt=""></a>
                                    <h6>{{Auth::user()->name}}</h6>
                                </div>

                                <div class="sidebar-user-material-menu">
                                    <a href="#user-nav" data-toggle="collapse"><span>Account</span> <i class="caret"></i></a>
                                </div>
                            </div>

                            <div class="navigation-wrapper collapse" id="user-nav">
                                <ul class="navigation">
                                    <li onclick="logOut()"><a href="#"><i class="icon-switch2"></i> <span>Logout</span></a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- /user menu -->


                        <!-- Main navigation -->
                        <div class="sidebar-category sidebar-category-visible">
                            <div class="category-content no-padding">
                                <ul class="navigation navigation-main navigation-accordion">

                                    <!-- Main -->
                                    <li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>
                                    <li id="nav-home"><a href="{{url('/xxi')}}"><i class="icon-home4"></i> <span>Home</span></a></li>
                                    <li id="nav-film"><a href="{{url('/xxi/film')}}"><i class="fas fa-film"></i> <span>Now Playing Films</span></a></li>
                                    <li id="nav-films"><a href="{{url('/xxi/film-coming')}}"><i class="fas fa-clock"></i> <span>Coming Soon Films</span></a></li>
                                    <li id="nav-cinema"><a href="{{url('/xxi/cinema')}}"><i class="fas fa-home"></i> <span>Cinemas</span></a></li>
                                    <!-- /main -->

                                    <!-- Forms -->
                                    {{-- <li class="navigation-header"><span>Forms</span> <i class="icon-menu" title="Forms"></i></li> --}}
                                    <!-- /forms -->
                                    <!-- /data visualization -->
                                </ul>
                            </div>
                        </div>
                        <!-- /main navigation -->

                    </div>
                </div>
                <!-- /main sidebar -->
                <div class="content-wrapper">



                    <!-- Page header -->
                    <div class="page-header page-header-default">
                        <div class="page-header-content">
                            <div class="page-title">
                              @yield('header')

                            </div>
                        </div>
                    </div>
                    <!-- /page header -->


                    <!-- Content area -->
                    <div class="content">
                        @yield('content')

                        <!-- Footer -->
                        <div class="footer text-muted">
                            &copy; 2018. <a href="#">Eventix</a> by <a href="#">#</a>
                        </div>
                        <!-- /footer -->

                    </div>
                    <!-- /content area -->

                </div>

                <form class="logout-form" action="{{url('logout')}}" method="post">
                  {{ csrf_field() }}
                  </form>

        <!-- Core JS files -->
        <script type="text/javascript" src="{{asset('assets/js/plugins/loaders/pace.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('assets/js/core/libraries/jquery.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('assets/js/core/libraries/bootstrap.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('assets/js/plugins/loaders/blockui.min.js')}}"></script>
        <!-- /core JS files -->

        <!-- Theme JS files -->
        <script type="text/javascript" src="{{asset('assets/js/plugins/forms/styling/uniform.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('assets/js/plugins/forms/styling/switchery.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('assets/js/plugins/forms/inputs/touchspin.min.js')}}"></script>

        <script type="text/javascript" src="{{asset('assets/js/core/app.js')}}"></script>
        <script type="text/javascript" src="{{asset('assets/js/pages/form_input_groups.js')}}"></script>
        <script type="text/javascript" src="{{asset('assets/js/plugins/ui/ripple.min.js')}}"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/r-2.2.2/datatables.min.js"></script>
        <script type="text/javascript">
            function logOut(){
                $(".logout-form").submit();
            }
        </script>

        @yield('script')
    </body>
</html>
