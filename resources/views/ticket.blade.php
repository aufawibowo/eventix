@extends('layouts.main_landing')

@section('style')
	<link rel="stylesheet" type="text/css" href="{{asset('styles/product_styles.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('styles/product_responsive.css')}}">

	<link rel="stylesheet" type="text/css" href="{{asset('styles/responsive.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('plugins/jquery-ui-1.12.1.custom/jquery-ui.css')}}">
	

	<style media="screen">
		.manage-event .btn:hover{
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


	<div class="single_product">
		{{-- show message if it's user's event --}}
		@if (Auth::user() && $event->owner == Auth::user()->id)
		<div class="container">
				<div class="alert alert-info">
					This event is posted by you.
				</div>
		</div>
		@endif

		<div class="container">
			{{-- Admin can approve/ decline event if it is still pending --}}
			<div class="card mb-3 manage-event">
				@if (Auth::user() && Auth::user()->role == 1 && $event->approved == 0)
					<div class="card-body">
						<p>Manage event status: </p>
						<button type="button" class="btn btn-success approve" event-id="{{$event->id}}" name="button">Approve</button>
						<button type="button" class="btn btn-danger decline" event-id="{{$event->id}}" name="button">Decline</button>
					</div>
				@endif
			</div>

			<div class="row">

				<!-- Images -->
				<div class="col-lg-2 order-lg-1 order-2">
					<ul class="image_list">
						@foreach ($event->pictures as $ep)
							<li data-image="{{asset('storage') . "/" . $ep->location}}"><img src="{{asset('storage') . "/" . $ep->location}}" alt=""></li>
						@endforeach
					</ul>
				</div>

				<!-- Selected Image -->
				<div class="col-lg-5 order-lg-2 order-1">
					<div class="image_selected"><img src="{{asset('storage') . "/" . $event->pictures[0]->location}}" alt=""></div>
				</div>

				<!-- Description -->
				<div class="col-lg-5 order-3">
					<div class="product_description">
						<div class="product_category">{{$event->type}}
							@if ($event->type == "Sport")
								| {{$event->sport_type}}
							@endif
						</div>
						<div class="product_name">{{$event->name}}</div>
						<div class="product_text"><p>
							{{$event->description}}
						</p>
						<p>Location: {{$event->city}}</p>
						<p>
							Date: {{date_format(date_create($event->date1), 'd/m/Y') . " -- " . date_format(date_create($event->date2), 'd/m/Y')}}
						</p>
						<p>
							<strong>Posted by: {{$posted_by->name}}</strong>
						</p>
					</div>
						<div class="order_info d-flex flex-row">
							<form action="#">
								<div class="clearfix" style="z-index: 1000;">
									<div class="form-group">
										<label for="">Quantity</label>
										<input type="number" class="form-control" name="" value="1" id="ticket_quantity" min="1" max="{{$event->quota}}" step="1">
										<small>Max: {{$event->quota}}</small>
									</div>

								</div>

								<div class="product_price">
									Rp {{number_format($event->price,2,',','.')}}</div>
								<div class="button_container">
									@if(Auth::user() && $event->owner==Auth::user()->id)
									@elseif($event->date2 >= date('Y-m-d', time()) and $event->date1 <= date('Y-m-d', time()))
									<button id="cart-buy" type="button" class="button cart_button">Order Now</button>
									@elseif($event->date2 < date('Y-m-d', time()))
									<button type="button" disabled class="button cart_button">Closed</button>
									@elseif($event->date1 > date('Y-m-d', time()))
									<button type="button" disabled class="button cart_button">Not Open Yet</button>
									@endif
								</div>

							</form>
						</div>
					</div>
				</div>

			</div>
		</div>
		<input type="hidden" id="is_logged_in" name="" value="{{Auth::user()}}">
	</div>

@endsection

@section('script')
	<script src="{{asset('js/product_custom.js')}}"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script type="text/javascript">
		// add csrf token to headers in ajax call
		$.ajaxSetup({
				headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
		});

		$("#cart-buy").click(function(){
			if (!$("#is_logged_in").val()) {
		        swal("Please Login first!",{
					closeOnClickOutside: false,
	           	}).then(function() {
						window.location = '{{url("login")}}';
				});
				return false;
			}

			const quantity = $("#ticket_quantity").val();
			const event_id = '{{$event->id}}';
			// const
			$.ajax({
				url: '{{url('user/tickets')}}',
				data: {quantity, event_id},
				method: "POST",
				success: function(){
		              	swal("Successfully ordered ticket/s\nPlease confirm payment on BNI 033444175521",{
							closeOnClickOutside: false,
		           		}).then(function() {
						window.location = '{{url("user/ordered-tickets")}}';
					});
				},
				error: function(){
					alert("Error");
				}
			})
		});

		$(document).on('click', '.approve', function(){
			const id = $(this).attr('event-id');
			$.ajax({
				url: '{{url('admin/approve/events')}}/' + id,
				method: "PUT",
				success: function(){
					alert("Event approved!");
					window.location = '{{url('events')}}/' + id;
				},
				error: function(){
					alert("Error");
				}
			});
		});

		$(document).on('click', '.decline', function(){
			const id = $(this).attr('event-id');
			$.ajax({
				url: '{{url('admin/decline/events')}}/' + id,
				method: "PUT",
				success: function(){
					alert("Event declined!");
					window.location = '{{url('events')}}/' + id;
				},
				error: function(){
					alert("Error");
				}
			});
		});
	</script>
@endsection
