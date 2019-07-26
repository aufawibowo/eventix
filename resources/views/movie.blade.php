@extends('layouts.main_landing')

@section('title',$film->name)

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

	<div class="container">
	          @if (session('success'))
	              <div class="alert alert-success">
	                  {{ session('success') }}
	              </div>
	          @endif
	</div>
	<div class="single_product">
		<div class="container">
			<div class="row">
				@php
				$file=explode("/",$film->picture->location);
				@endphp
				<!-- Images -->
				<div class="col-lg-2 order-lg-1 order-2">
					<ul class="image_list">
					</ul>
				</div>

				<!-- Selected Image -->
				<div class="col-lg-5 order-lg-2 order-1">
					<div class="image_selected"><img src="{{ asset('storage/'.$file[1].'/'.$file[2]) }}" alt=""></div>
				</div>

				<!-- Description -->
				<div class="col-lg-5 order-3">
					<div class="product_description">
						<div class="product_category text-capitalize">By :&nbsp;{{$film->director}}</div>
						<div class="product_name text-capitalize">{{$film->name}}</div>
						<div class="product_text"><p>
							{{$film->genre}}
						</p></div>
						<div class="product_text text-justify"><p>
							{{$film->description}}
						</p></div>
						<br><br>
						<div class="order_info d-flex flex-row">
							<div class="clearfix" style="z-index: 1000;">
							</div>
							<div class="button_container">
                                @guest
                                	@if($film->status==1)
										<button type="button" class="button cart_button" data-toggle="modal" data-target="#modalCinema"><i class="fas fa-play"></i> Book Now</button>
									@else
										<button type="button" disabled class="button cart_button" ><i class="fas fa-clock"></i> Coming Soon</button>
									@endif
                                @else
								@if(Auth::user()->role==2)
								<div class="alert alert-warning" role="alert">
						          	<form action="{{url('/xxi/change-status')}}" method="POST">
							            {{ csrf_field() }}
							            <div class="form-group" align="center">
							            	<input type="hidden" name="film_id" value="{{$film->id}}">
							              	<label>Film Status</label>
							              	<select class="form-control" required name="film_status">
							              		@if($film->status==1)
							                  	<option value="1" selected>Now Playing</option>
							                  	<option value="2">Coming Soon</option>
							              		@else
							                  	<option value="1">Now Playing</option>
							                  	<option value="2" selected>Coming Soon</option>
							              		@endif
							              	</select>
						            	</div>
										<div class="form-group" align="center">
						            		<button type="submit" class="btn btn-sm btn-primary">Save</button>
						            	</div>
						      		</form>
								</div>
								<div class="alert alert-danger" role="alert">
						          	<form action="{{url('/xxi/delete')}}" method="POST">
							            {{ csrf_field() }}
							            <div class="form-group" align="center">
							            	<input type="hidden" name="film_id" value="{{$film->id}}">
							              	<label>Delete Film</label><br>
							              	<small>Deleted film cant restore!</small>
						            	</div>
										<div class="form-group" align="center">
						            		<button type="submit" class="btn btn-sm btn-primary">Delete</button>
						            	</div>
						      		</form>
								</div>
								@else
                                	@if($film->status==1)
										<button type="button" class="button cart_button" data-toggle="modal" data-target="#modalCinema"><i class="fas fa-play"></i> Book Now</button>
									@else
										<button type="button" disabled class="button cart_button" ><i class="fas fa-clock"></i> Coming Soon</button>
									@endif
								@endif
								@endguest
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="modalCinema" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	  	<div class="modal-dialog modal-dialog-centered" role="document">
	    	<div class="modal-content">
	      		<div class="modal-header">
			        <h5 class="modal-title" id="exampleModalCenterTitle">Book Movie</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          			<span aria-hidden="true">&times;</span>
	        		</button>
	      		</div>
	      		<div class="modal-body">
		          	<form action="{{url('/user/book/pick_seat')}}" method="POST">
			            {{ csrf_field() }}
			            <div class="form-group">
			              	<label for="cinema_id">Cinema name</label>
			              	<select class="form-control" required name="cinema_id">
					            @foreach ($cinemas as $cinema)
			                  	<option value="{{$cinema->id_cinema}}">{{$cinema->cinema->name}}</option>
			                  	@endforeach
			              	</select>
		            	</div>
			            <div class="form-group">
			              	<label for="cinema_id">Time</label>
			              	<select class="form-control" required name="jam">
			                  	<option value="jam1">12:45</option>
			                  	<option value="jam2">15:30</option>
			                  	<option value="jam3">18:15</option>
			                  	<option value="jam4">20:15</option>
			                  	<option value="jam5">22:30</option>
			              	</select>
		            	</div>
		            	<input type="hidden" name="film_id" value="{{$film->id}}">
		      		</div>
		      		<div class="modal-footer">
				        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				        <button type="submit" id="book_now" class="btn btn-primary">Book</button>
		      		</div>
		      		</form>
		    	</div>
		  	</div>
		</div>

@endsection

@section('script')
	<script src="{{asset('js/product_custom.js')}}"></script>
	<script type="text/javascript">

	</script>
@endsection
