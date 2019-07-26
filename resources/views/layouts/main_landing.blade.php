<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="OneTech shop project">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Eventix | @yield('title')</title>
        <link rel="stylesheet" type="text/css" href="{{asset('styles/bootstrap4/bootstrap.min.css')}}">
        <link href="{{asset('plugins/fontawesome-free-5.0.1/css/fontawesome-all.css')}}" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="{{asset('plugins/OwlCarousel2-2.2.1/owl.carousel.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('plugins/OwlCarousel2-2.2.1/owl.theme.default.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('plugins/OwlCarousel2-2.2.1/animate.css')}}">
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('images/favicon.ico')}}" />
        <style media="screen">
          .form-control{
            color: black !important;
          }

          .select-category{
            margin-left: 0px;
            min-width: 100%;
            background: white;
            color: black;
          }

          #mobile-search-btn{
            width: 100%;
            background-color: #551a8b;
            border-color: #551a8b;
            border-radius: 5px;
            border-width: none;

          }

          #mobile-search-btn:hover{
            cursor: pointer;
          }

        </style>

        @yield('style')

    </head>
    <body>
        <div class="super_container">
            <header class="header">
                <div class="">
                    <div class="container">
                        <div class="row">

                        </div>
                    </div>
                </div>
                <div class="header_main">
                    <div class="container">
                        <div class="row">

                            <div class="col-lg-2 col-sm-3 col-3 order-1 mb-4">
                                <div class="logo_container">
                                    <div class="logo"><a href="{{url('/')}}">
                                      <img src="{{asset('images/logo-eventix.png')}}" alt="" width="130px" class="d-sm-block">
                                    </a></div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
                                <div class="header_search">
                                    <div class="header_search_content">
                                        <div class="header_search_form_container">
                                            <form action="{{url('search/l')}}" class="header_search_form clearfix" method="get" autocomplete="off" id="searchForm">
                                                <input type="search" required class="header_search_input" placeholder="Search for events, tickets, etc.." name="keyword">
                                                <div class="custom_dropdown mb-2">
                                                    <div class="custom_dropdown_list">
                                                        <span class="custom_dropdown_placeholder clc">Categories</span>
                                                        <i class="fas fa-chevron-down"></i>

                                                        <ul class="custom_list clc" id="ulIl">
                                                            <li id="Cinemas"><a class="clc" href="#">Cinemas</a></li>
                                                            <li id="Concert"><a class="clc" href="#">Concert</a></li>
                                                            <li id="Exhibition"><a class="clc" href="#">Exhibition</a></li>
                                                            <li id="Seminar"><a class="clc" href="#">Seminar</a></li>
                                                            <li id="Workshop"><a class="clc" href="#">Workshop</a></li>
                                                            <li id="Sports"><a class="clc" href="#">Sports</a></li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <input type="hidden" name="categories" id="liIn">
                                                <button type="button" id="other" class="header_search_button trans_300" value="Submit"><img src="{{asset('images/search.png')}}" alt=""></button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            {{-- <div class="col d-flex flex-row">
                                <div class="top_bar_content ml-auto">
                                    <div class="top_bar_user">
                                        <div class="user_icon"><img src="{{asset('images/user.svg')}}" alt=""></div>
                                        @guest
                                        <div><a href="{{ route('register') }}">Register</a></div>
                                        <div><a href="{{ route('login') }}">Sign in</a></div>
                                        @else
                                            @if(Auth::user()->role==3)
                                                <div><a href="{{ url('user') }}">Dashboard</a></div>
                                            @elseif(Auth::user()->role==1)
                                                <div><a href="{{ url('admin') }}">Dashboard</a></div>
                                            @elseif(Auth::user()->role==2)
                                                <div><a href="{{ url('xxi') }}">Dashboard</a></div>
                                            @endif
                                        <div><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a> </div>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        @endguest
                                    </div>
                                </div>
                            </div> --}}

                        </div>
                    </div>
                </div>
                <!-- Main Navigation -->
                <nav class="main_nav">
                    <div class="container">
                        <div class="row">
                            <div class="col">

                                <div class="main_nav_content d-flex flex-row">
                                    <!-- Main Nav Menu -->
                                    @yield('categories')
                                    <div class="main_nav_menu ml-auto">
                                        <ul class="standard_dropdown main_nav_dropdown">
                                            <li><a href="{{url('/')}}">Home<i class="fas fa-chevron-down"></i></a></li>
                                            @guest
                                              <li>
                                                <a href="{{ route('register') }}">Register</a>
                                              </li>

                                              <li>
                                                <a href="{{ route('login') }}">Sign in</a>
                                              </li>

                                            @else
                                              @if(Auth::user()->role==3)
                                                <li>
                                                  <a href="{{ url('user') }}">Dashboard</a>
                                                </li>
                                              @elseif(Auth::user()->role==1)
                                                <li>
                                                  <a href="{{ url('admin') }}">Dashboard</a>
                                                </li>
                                              @elseif(Auth::user()->role==2)
                                                <li>
                                                  <a href="{{ url('xxi') }}">Dashboard</a>
                                                </li>
                                            @endif
                                            <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a> </li>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>
                                            @endguest
                                        </ul>
                                    </div>

                                    <!-- Menu Trigger -->

                                    <div class="menu_trigger_container ml-auto">
                                        <div class="menu_trigger d-flex flex-row align-items-center justify-content-end">
                                            <div class="menu_burger">
                                                <div class="menu_trigger_text">menu</div>
                                                <div class="cat_burger menu_burger_inner"><span></span><span></span><span></span></div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
                <!-- Menu -->
                <div class="page_menu" style="display: none">
                    <div class="container">
                        <div class="row">
                            <div class="col mb-3">
                                <div class="page_menu_content">
                                    <div class="page_menu_search">
                                        <form action="{{url('search/l')}}" method="get" autocomplete="off"  placeholder="Search for events, tickets, etc.." name="keyword" id="searchForm2">
                                            <input type="search" required class="page_menu_search_input mb-2" name="keyword">
                                            <select class="form-control select-category mb-2" name="categories">
                                              <option value="" disabled selected>Categories</option>
                                              <option value="Cinemas">Cinemas</option>
                                              <option value="Concert">Concert</option>
                                              <option value="Events">Events</option>
                                              <option value="Exhibition">Exhibition</option>
                                              <option value="Sports">Sports</option>
                                              <option value="Workshop">Workshop</option>
                                            </select>
                                            <button type="button" class="other2" id="mobile-search-btn"><img src="{{asset('images/search.png')}}" alt=""></button>
                                        </form>
                                    </div>
                                    <ul class="page_menu_nav">
                                      <li class="page_menu_item">
                                        <a href="{{url('/')}}">Home<i class="fa fa-angle-down"></i></a>
                                      </li>

                                      @guest
                                        <li class="page_menu_item">
                                          <a href="{{ route('register') }}">Register<i class="fa fa-angle-down"></i></a>
                                        </li>
                                        <li class="page_menu_item">
                                          <a href="{{ route('login') }}">Sign in<i class="fa fa-angle-down"></i></a>
                                        </li>
                                      @else
                                        @if(Auth::user()->role==3)
                                          <li class="page_menu_item">
                                            <a href="{{ url('user') }}">Dashboard<i class="fa fa-angle-down"></i></a>
                                          </li>
                                        @elseif(Auth::user()->role==1)
                                          <li class="page_menu_item">
                                            <a href="{{ url('admin') }}">Dashboard<i class="fa fa-angle-down"></i></a>
                                          </li>
                                        @elseif(Auth::user()->role==2)
                                          <li class="page_menu_item">
                                            <a href="{{ url('xxi') }}">Dashboard<i class="fa fa-angle-down"></i></a>
                                          </li>
                                      @endif
                                      <li class="page_menu_item">
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout<i class="fa fa-angle-down"></i></a>
                                      </li>
                                      @endguest

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            @yield('content')

        @include('layouts.slider-footer')

        @include('layouts.footer')
        {{-- @section('slider') --}}
        {{-- @endsection --}}
        </div>

        <!-- JavaScript files-->
        <script src="{{asset('plugins/slick-1.8.0/slick.js')}}"></script>
        <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
        <script src="{{asset('styles/bootstrap4/popper.js')}}"></script>
        <script src="{{asset('styles/bootstrap4/bootstrap.min.js')}}"></script>
        <script src="{{asset('plugins/greensock/TweenMax.min.js')}}"></script>
        <script src="{{asset('plugins/greensock/TimelineMax.min.js')}}"></script>
        <script src="{{asset('plugins/scrollmagic/ScrollMagic.min.js')}}"></script>
        <script src="{{asset('plugins/greensock/animation.gsap.min.js')}}"></script>
        <script src="{{asset('plugins/greensock/ScrollToPlugin.min.js')}}"></script>
        <script src="{{asset('plugins/OwlCarousel2-2.2.1/owl.carousel.js')}}"></script>
        <script src="{{asset('plugins/easing/easing.js')}}"></script>

        <script type="text/javascript">
            function logOut(){
                $(".logout-form").submit();
            }

            var select=1;

            $("#ulIl").on("click", "a", function(e){
                select = $(this).parent().attr('id');
            })

            $("#other").click(function() {
                $("#liIn").val(select)
                $("#searchForm").submit();
            });

            $(".other2").click(function() {
                $("#searchForm2").submit();
            });
        </script>

        @yield('script')
    </body>
</html>
