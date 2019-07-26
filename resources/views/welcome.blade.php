@extends('layouts.main_landing')

@section('title','Home!')

@section('style')
  <link rel="stylesheet" type="text/css" href="{{asset('plugins/slick-1.8.0/slick.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('styles/main_styles.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('styles/responsive.css')}}">
@endsection

@section('content')
  <div class="banner">
    <div class="banner_background" style="background-image:url({{('images/concert.jpg')}})"></div>
    <div class="container fill_height">
      <div class="row fill_height">
        <div class="banner_product_image">


        </div>
        <div class="col-lg-6 offset-lg-3 fill_height">
          <div class="banner_content">
            <h1 class="banner_text">The Best Place to Find your Obsession</h1>
            <div><br><br></div>
            <div class="d-none d-sm-block"><br><br><br></div>


            <div class="button banner_button"><a href="#categories">Get My Tickets</a></div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Characteristics -->

  <div class="characteristics" id="categories">
    <div class="container">
      <div class="row justify-content-center">

        <!-- Char. Item -->
        <div class="col-lg-3 col-md-6 char_col d-none d-sm-block">
          <div class="char_item d-flex flex-row align-items-center justify-content-start">
            <div class="char_content">
              <div class="char_title">Categories</div>
              <div class="char_subtitle">Grab your tickets</div>
            </div>
          </div>
        </div>

        <!-- Char. Item -->
        <div class="col-lg-3 col-md-6 char_col" style="cursor: pointer;">
          <a href="{{url('movies')}}">

            <div class="char_item d-flex flex-row align-items-center justify-content-start">
              <div class="char_icon"><img src="{{('images/categories_cinema.png')}}" alt=""></div>
              <div class="char_content">
                <div class="char_title">Cinema</div>
                <div class="char_subtitle">Movies ..</div>
              </div>
            </div>

          </a>
        </div>

        <!-- Char. Item -->
        <div class="col-lg-3 col-md-6 char_col" style="cursor: pointer;">
          <a href="{{url('events')}}">
          <div class="char_item d-flex flex-row align-items-center justify-content-start">
            <div class="char_icon"><img src="{{('images/categories_events.png')}}" alt=""></div>
            <div class="char_content">
              <div class="char_title">Events</div>
              <div class="char_subtitle">Seminars, Talk Show ..</div>
            </div>
          </div>
          </a>
        </div>

        <!-- Char. Item -->
        <div class="col-lg-3 col-md-6 char_col" style="cursor: pointer;">
          <a href="{{url('sports')}}">
          <div class="char_item d-flex flex-row align-items-center justify-content-start">
            <div class="char_icon"><img src="{{('images/categories_sports.png')}}" alt=""></div>
            <div class="char_content">
              <div class="char_title">Sports</div>
              <div class="char_subtitle">Football, Basketball ..</div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </a>
  </div>
  <!-- Deals of the week -->

  <div class="deals_featured">
    <div class="container">
      <div class="row">
        <div class="col d-flex flex-lg-row flex-column align-items-center justify-content-start">
          <!-- Deals -->
          <div class="deals">
            <div class="deals_title">Deals of the Month</div>
            @if ($sports->count())
              <div class="deals_slider_container">
                <!-- Deals Slider -->
                <div class="owl-carousel owl-theme deals_slider">
                  <!-- Deals Item -->
                  <div class="owl-item deals_item">
                    <div class="deals_image"><img src="{{asset('storage') ."/". $sports[0]->pictures[0]->location}}" alt=""></div>
                    <div class="deals_content">
                      <div class="deals_info_line d-flex flex-row justify-content-start">
                        <div class="deals_item_category text-capitalize">{{$sports[0]->type}}</div>

                      </div>
                      <div class="deals_info_line d-flex flex-row justify-content-start">
                        <div class="deals_item_name">{{$sports[0]->name}}</div>
                        <div class="deals_item_price ml-auto">{{number_format($sports[0]->price,0,',','.')}}</div>
                      </div>
                      <div class="available">
                        <div class="available_line d-flex flex-row justify-content-start">
                          <div class="available_title">Quota: <span>{{$sports[0]->quota}}</span></div>
                        </div>
                        <div class="available_bar"><span style="width:17%"></span></div>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
            @else
              <div class="deals_slider_container">
                <!-- Deals Slider -->
                <div class="owl-carousel owl-theme deals_slider">
                  <!-- Deals Item -->
                  <div class="owl-item deals_item">
                    <div class="deals_image"><img src="" alt=""></div>
                    <div class="deals_content">
                      <div class="deals_info_line d-flex flex-row justify-content-start">
                        <div class="deals_item_category text-capitalize"></div>

                      </div>
                      <div class="deals_info_line d-flex flex-row justify-content-start">
                        <div class="deals_item_name">No Sports - Contact admin to update</div>
                        <div class="deals_item_price ml-auto"></div>
                      </div>
                      <div class="available">
                        <div class="available_line d-flex flex-row justify-content-start">
                          {{-- <div class="available_title">Quota: <span>{{$sports[0]->quota}}</span></div> --}}
                        </div>
                        <div class="available_bar"><span style="width:17%"></span></div>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
            @endif

            <div class="deals_slider_nav_container">
              <div class="deals_slider_prev deals_slider_nav"><i class="fas fa-chevron-left ml-auto"></i></div>
              <div class="deals_slider_next deals_slider_nav"><i class="fas fa-chevron-right ml-auto"></i></div>
            </div>
          </div>

          <!-- Featured -->
          <div class="featured">
            <div class="tabbed_container">
              <div class="tabs">
                <ul class="clearfix">
                  <li class="active">Sport events</li>
                </ul>
                <div class="tabs_line"><span></span></div>
              </div>

              <!-- Product Panel -->
              <div class="product_panel panel active">
                <div class="featured_slider slider">
                  @if ($sports->count())
                    @foreach($sports as $s)
                    <!-- Slider Item -->
                    <div class="featured_slider_item">
                      <div class="border_active"></div>
                      <div class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
                        <div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="{{asset('storage') ."/". $s->pictures[0]->location}}" alt=""></div>
                        <div class="product_content">
                          <div class="product_price">Rp. {{number_format($s->price,2,',','.')}}</div>
                          <div class="product_name"><div>{{$s->name}}</div></div>
                          <div class="product_extras">
                            <a class="btn product_cart_button" role="button" style="color: white;" href="{{url('events') . "/" . $s->id}}">View</a>
                          </div>
                        </div>
                        <div class="product_fav"><i class="fas fa-heart"></i></div>
                        <ul class="product_marks">
                          <li class="product_mark product_discount"><i style="" class="fas fa-fire"></i></li>
                        </ul>
                      </div>
                    </div>
                    @endforeach
                  @else
                    <div class="featured_slider_item">
                      <div class="border_active"></div>
                      <div class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
                        <div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="#" alt=""></div>
                        <div class="product_content">
                          <div class="product_price">#</div>
                          <div class="product_name"><div>No Sport Events</div></div>
                          <div class="product_extras">
                            {{-- <a class="btn product_cart_button" role="button" style="color: white;" href="{{url('events') . "/" . $s->id}}">View</a> --}}
                          </div>
                        </div>
                        <div class="product_fav"><i class="fas fa-heart"></i></div>
                        <ul class="product_marks">
                          <li class="product_mark product_discount"><i style="" class="fas fa-fire"></i></li>
                        </ul>
                      </div>
                    </div>
                  @endif
                </div>
                <div class="featured_slider_dots_cover"></div>
              </div>

              <!-- Product Panel -->
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
  <br>
  <!-- Banner -->

  <div class="banner_2">
    <div class="banner_2_background" style="background-image:url(images/banner_2_background.jpg)"></div>
    <div class="banner_2_container">
      <div class="banner_2_dots"></div>
      <!-- Banner 2 Slider -->

      <div class="owl-carousel owl-theme banner_2_slider">

        <!-- Banner 2 Slider Item -->
        <div class="owl-item">
          <div class="banner_2_item">
            <div class="container fill_height">
              <div class="row fill_height">
                <div class="col-lg-4 col-md-6 fill_height">
                  <div class="banner_2_content">
                    <div class="banner_2_category">Thriller, Drama, Adventure</div>
                    <div class="banner_2_title">CINEMA XXI</div>
                    <div class="banner_2_text">Watch your favorite movies and get ticket now!</div>
                    <div class="button banner_2_button"><a href="{{url('movies')}}">Explore</a></div>
                  </div>

                </div>
                <div class="col-lg-8 col-md-6 fill_height">
                  <div class="banner_2_image_container">
                    <div class="banner_2_image"><img src="{{asset('images/xxi-logo.png')}}" alt=""></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

  <!-- Hot New Arrivals -->

  <div class="new_arrivals">
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="tabbed_container">
            <div class="tabs clearfix tabs-right">
              <div class="new_arrivals_title">Hot New Events</div>
              <ul class="clearfix">
                <li class="active">Events</li>
              </ul>
              <div class="tabs_line"><span></span></div>
            </div>
            <div class="row">
              <div class="col-lg-9" style="z-index:1;">

                <!-- Product Panel -->
                <div class="product_panel panel active">
                  <div class="arrivals_slider slider">
                    @if ($events->count())
                      @foreach($events as $e)
                        <!-- Slider Item -->
                        <div class="arrivals_slider_item">
                          <div class="border_active"></div>
                          <div class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
                            <div class="product_image d-flex flex-column align-items-center justify-content-center">
                              <img src="{{asset('storage') ."/". $e->pictures[0]->location}}" alt="">
                            </div>
                            <div class="product_content">
                              <div class="product_price">Rp. {{number_format($e->price,2,',','.')}}</div>
                              <div class="product_name"><div>{{$e->name}}</div></div>
                              <div class="product_extras">
                                <a class="btn product_cart_button" role="button" style="color: white;" href="{{url('events') . "/" . $e->id}}">View</a>
                              </div>
                            </div>
                            <div class="product_fav"><i class="fas fa-heart"></i></div>
                            <ul class="product_marks">
                              <li class="product_mark product_discount"></li>
                              <li class="product_mark product_new">new</li>
                            </ul>
                          </div>
                        </div>
                      @endforeach
                    @else
                      <div class="arrivals_slider_item">
                        <div class="border_active"></div>
                        <div class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
                          <div class="product_image d-flex flex-column align-items-center justify-content-center">
                            <img src="#" alt="">
                          </div>
                          <div class="product_content">
                            <div class="product_price">#</div>
                            <div class="product_name"><div>No Events</div></div>
                            <div class="product_extras">
                              {{-- <a class="btn product_cart_button" role="button" style="color: white;" href="#"></a> --}}
                            </div>
                          </div>
                          <div class="product_fav"><i class="fas fa-heart"></i></div>
                          <ul class="product_marks">
                            <li class="product_mark product_discount"></li>
                            <li class="product_mark product_new">new</li>
                          </ul>
                        </div>
                      </div>
                    @endif
                  </div>
                  <div class="arrivals_slider_dots_cover"></div>
                </div>
              </div>

              <div class="col-lg-3">
              
              @if($events->count())
              <div class="arrivals_single clearfix">
                  <div class="d-flex flex-column align-items-center justify-content-center">
                    <div class="arrivals_single_image"><img src="{{asset('storage') ."/". $events[0]->pictures[0]->location}}" alt=""></div>
                    <div class="arrivals_single_content">
                      <div class="arrivals_single_category text-capitalize">{{$events[0]->type}}</div>
                      <div class="arrivals_single_name_container clearfix">
                        <div class="arrivals_single_name text-capitalize" >{{$events[0]->name}}</div>
                        <div class="arrivals_single_price text-right">Rp. {{number_format($events[0]->price,2,',','.')}}</div>
                      </div>
                      <a class="btn arrivals_single_button" role="button" style="color: white;" href="{{url('events') . "/" . $events[0]->id}}">View</a>
                    </div>
                    <div class="arrivals_single_fav product_fav active"><i class="fas fa-heart"></i></div>
                    <ul class="arrivals_single_marks product_marks">
                      <li class="arrivals_single_mark product_mark product_new">new</li>
                    </ul>
                  </div>
                </div>
              @else
              <div class="arrivals_single clearfix">
                  <div class="d-flex flex-column align-items-center justify-content-center">
                    <div class="arrivals_single_image"><img src="#" alt=""></div>
                    <div class="arrivals_single_content">
                      <div class="arrivals_single_category text-capitalize">#</div>
                      <div class="arrivals_single_name_container clearfix">
                        <div class="arrivals_single_name text-capitalize" >#</div>
                        <div class="arrivals_single_price text-right">#</div>
                      </div>
                      <a class="btn arrivals_single_button" role="button" style="color: white;" href="#">View</a>
                    </div>
                    <div class="arrivals_single_fav product_fav active"><i class="fas fa-heart"></i></div>
                    <ul class="arrivals_single_marks product_marks">
                      <li class="arrivals_single_mark product_mark product_new">new</li>
                    </ul>
                  </div>
                </div>
              @endif
                
              </div>

            </div>

          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Trends -->

  <div class="trends">
    <div class="trends_background" style="background-image:url(images/trends_background.jpg)"></div>
    <div class="trends_overlay"></div>
    <div class="container">
      <div class="row">

        <!-- Trends Content -->
        <div class="col-lg-3">
          <div class="trends_container">
            <h2 class="trends_title">On air&nbsp;<i style="color: #E25822" class="fas fa-fire"></i></h2>
            <div class="trends_text"><p>Your must watch films !</p></div>
            <div class="trends_slider_nav">
              <div class="trends_prev trends_nav"><i class="fas fa-angle-left ml-auto"></i></div>
              <div class="trends_next trends_nav"><i class="fas fa-angle-right ml-auto"></i></div>
            </div>
          </div>
        </div>

        <!-- Trends Slider -->
        <div class="col-lg-9">
          <div class="trends_slider_container">


            <div class="owl-carousel owl-theme trends_slider">
              @if ($films->count())
                @foreach($films as $film)
                @php
                  $file=explode("/",$film->picture->location);
                @endphp
                <div class="owl-item">
                  <div class="trends_item is_new">
                    <div class="trends_image d-flex flex-column align-items-center justify-content-center"><img src="{{asset('storage/'.$file[1].'/'.$file[2]) }}" alt="" style="object-fit: cover;"></div>
                    <div class="trends_content">
                      <div class="trends_category"><a href="" style="cursor: default;" class="text-capitalize">By :&nbsp;{{$film->director}}</a></div>
                      <div class="trends_info clearfix">

                        <div class="trends_price"><a href="{{url('movies')}}"><i class="fab fa-youtube"></i> Get ticket</a></div>
                      </div>
                    </div>
                    <ul class="trends_marks">
                      <li class="trends_mark trends_discount">-25%</li>
                      <li class="trends_mark trends_new">new</li>
                    </ul>
                    <div class="trends_fav"><i class="fas fa-heart"></i></div>
                  </div>
                </div>
                @endforeach
              @else
                <div class="owl-item">
                  <div class="trends_item is_new">
                    <div class="trends_image d-flex flex-column align-items-center justify-content-center"><img src="#" alt="" style="object-fit: cover;"></div>
                    <div class="trends_content">
                      <div class="trends_category"><a href="" style="cursor: default;" class="text-capitalize">No Movies</a></div>
                      <div class="trends_info clearfix">

                        <div class="trends_price"><a href="{{url('movies')}}"><i class="fab fa-youtube"></i> Contact Admin to update movies</a></div>
                      </div>
                    </div>
                    <ul class="trends_marks">
                      <li class="trends_mark trends_discount"></li>
                      <li class="trends_mark trends_new"></li>
                    </ul>
                    <div class="trends_fav"><i class="fas fa-heart"></i></div>
                  </div>
                </div>
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('script')
  <script src="{{asset('plugins/slick-1.8.0/slick.js')}}"></script>
  <script src="{{asset('js/custom.js')}}"></script>
  <script type="text/javascript">
    $('a[href*="#"]')
      .not('[href="#"]')
      .not('[href="#0"]')
      .click(function(event) {
        // On-page links
        if (
          location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
          &&
          location.hostname == this.hostname
        ) {
          // Figure out element to scroll to
          var target = $(this.hash);
          target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
          // Does a scroll target exist?
          if (target.length) {
            // Only prevent default if animation is actually gonna happen
            event.preventDefault();
            $('html, body').animate({
              scrollTop: target.offset().top
            }, 1000, function() {
              // Callback after animation
              // Must change focus!
              var $target = $(target);
              $target.focus();
              if ($target.is(":focus")) { // Checking if the target was focused
                return false;
              } else {
                $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
                $target.focus(); // Set focus again
              };
            });
          }
        }
      });
  </script>
@endsection
