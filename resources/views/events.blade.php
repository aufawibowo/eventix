@section('title','Active Events')

@extends('layouts.main_landing')

@section('style')
	<link rel="stylesheet" type="text/css" href="{{asset('styles/responsive.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('plugins/jquery-ui-1.12.1.custom/jquery-ui.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('styles/shop_styles.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('styles/shop_responsive.css')}}">
	<style media="screen">
		.product_item a{
			text-decoration: none;
			color: black;
		}


    .custom_date input{
      background-color: #fcfcfc;
      color: #7f7f7f;
    }

		.find-by-date:hover{
			cursor: pointer;
		}

	</style>
@endsection

@section('categories')
	<div class="cat_menu_container">
		<div class="cat_menu_title d-flex flex-row align-items-center justify-content-start">
			<div class="cat_burger"><span></span><span></span><span></span></div>
			<div class="cat_menu_text">categories</div>
		</div>
		<ul class="cat_menu">
			<li><a href="{{url('movies')}}">Cinemas <i class="fas fa-chevron-right"></i></a></li>
			<li><a href="{{url('events')}}">Events<i class="fas fa-chevron-right"></i></a></li>
			<li><a href="{{url('sports')}}">Sport<i class="fas fa-chevron-right"></i></a></li>
		</ul>
	</div>
@endsection

@section('content')
<div class="super_container">

	<!-- Home -->

	<div class="home">
		<div class="home_background parallax-window" data-parallax="scroll" data-image-src="images/shop_background.jpg"></div>
		<div class="home_overlay"></div>
		<div class="home_content d-flex flex-column align-items-center justify-content-center">
			<h2 class="home_title">Events & Sports</h2>
		</div>
	</div>

	<!-- Shop -->

	<div class="shop">
		<div class="container">
			<div class="row">
				<div class="col-lg-3">

					<!-- Shop Sidebar -->
					<div class="shop_sidebar">
						<div class="sidebar_section">
							<div class="sidebar_title">Categories</div>
							<ul class="sidebar_categories">
								<li><a href="{{url('movies')}}">Cinemas</a></li>
								<li><a href="{{url('events')}}">Events</a></li>
								<li><a href="{{url('sports')}}">Sports</a></li>
							</ul>
						</div>
					</div>
				</div>

				<div class="col-lg-9">


					<!-- Shop Content -->
						<p class="find-by-date">
							<strong>Find by date</strong>
						</p>
					<div class="custom_date" style="display: none">
						<form action="{{url('/search/e')}}" method="GET" id="searchForms">
						<div class="form-group">
							<input required id="date1" name="start_date" type="text" class="form-control mb-1" placeholder="Start date" onfocus="(this.type='date')"/>
							<input required id="date2" name="end_date" type="text" class="form-control" placeholder="End date" onfocus="(this.type='date')"/>
							<select class="form-control select-category mb-2" name="categories" required>
								<option value="" disabled selected>Categories</option>
								<option value="Concert">Concert</option>
								<option value="Events">Events</option>
								<option value="Exhibition">Exhibition</option>
								<option value="Sports">Sports</option>
								<option value="Workshop">Workshop</option>
							</select>
						</div>
						<button type="submit" class="btn btn-block btn-primary" id="searchEvents">Search</button>
						<br>
						</form>
					</div>

					<div class="shop_content">
						<div class="shop_bar clearfix">
							<div class="shop_product_count"><span>{{$events->count()}}</span> results found</div>

						</div>

						<div class="product_grid">
							<div class="product_grid_border"></div>

							@foreach ($events as $e)
								<div class="product_item">
									<a href="{{url('events') . "/" . $e->id}}">
									<div class="product_border"></div>
									<div class="product_image d-flex flex-column align-items-center justify-content-center"><img width="128px" height="128px" src="{{asset('storage') ."/". $e->pictures[0]->location}}" alt=""></div>
									<div class="product_content">
										<div class="product_price">Rp {{number_format($e->price,2,',','.')}}</div>
											<div class="product_name"><div><a href="#" tabindex="0">
												{{ substr($e->name, 0,26) . "..." }}</a></div></div>
									</div>
									<ul class="product_marks">
										<li class="product_mark product_discount">-25%</li>
										<li class="product_mark product_new">new</li>
									</ul>
									</a>
								</div>

							@endforeach

						</div>

						{{ $events->links() }}

					</div>

				</div>
			</div>
		</div>
	</div>

	<input type="hidden" id="event_type" name="" value="">

@endsection

@section('script')
	<script src="{{asset('plugins/slick-1.8.0/slick.js')}}"></script>
	{{-- <script src="{{asset('js/custom.js')}}"></script> --}}

	<script src="{{asset('plugins/Isotope/isotope.pkgd.min.js')}}"></script>
	<script src="{{asset('plugins/jquery-ui-1.12.1.custom/jquery-ui.js')}}"></script>
	<script src="{{asset('plugins/parallax-js-master/parallax.min.js')}}"></script>
	<script src="{{asset('js/shop_custom.js')}}"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script type="text/javascript">
		var flag = true;
		$(".find-by-date").click(function(){
			if (flag) {
				$(".custom_date").fadeIn(1000);
				flag = false;
			}else{
				$(".custom_date").fadeOut(500);
				flag = true;
			}
		});


        $("#searchEvents").click(function() {
			const date1 = $("#date1").val();
			const date2 = $("#date2").val();
			// date1 is start date
			// date2 is end date
			if (date1 > date2) {
				swal("the start date must be before the end date",{

				});
			    return false;
			}
	        $("#searchForms").submit();
		});
	</script>
@endsection
