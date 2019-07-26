<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Eventix | pick seats</title>
		<meta name="description" content="Eventix" />
		<meta name="keywords" content="Eventix" />
		<meta name="author" content="Eventix" />
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<link rel="shortcut icon" href="favicon.ico">
		<link rel="stylesheet" type="text/css" href="{{asset('theater/css/normalize.css')}}" />
		<link rel="stylesheet" type="text/css" href="{{asset('theater/css/demo.css')}}" />
		<link rel="stylesheet" type="text/css" href="{{asset('theater/css/component.css')}}" />
		<script src="{{asset('theater/js/modernizr-custom.js')}}"></script>
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="
        sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	</head>
	<body>
		<header class="header">
			<h1 class="header__title"><a href="{{url('movies')}}">< Back to movies list</a></h1>
			<p class="note note--screen">Please view on a larger screen</p>
			<p class="note note--support">Sorry, but your browser doesn't support preserve-3d!</p>
		</header>
		@php
		$file=explode("/",$film->picture->location);
		$seatData =$seat[0]->$time;
		@endphp
		<div class="container">
			<div class="cube">
				<div class="cube__side cube__side--front"></div>
				<div class="cube__side cube__side--back">
					<div class="screen">
						<div class="video" align="center">
							<img src="{{ asset('storage/'.$file[1].'/'.$file[2]) }}" alt="" style="object-fit: contain; height: 100%;">
							<button class="action action--play action--shown" aria-label="Play Video"></button>
						</div>
						<div class="intro intro--shown">
							<div class="intro__side">
								<h2 class="intro__title">
									<span class="intro__up">{{$seat[0]->cinema->name}}, EvenTix</span>
									<span class="intro__down">{{$film->name}}<span class="intro__partial"></span></span>
								</h2>
							</div>
							<div class="intro__side">
								<button class="action action--seats">Select your seats</button>
							</div>
						</div>
					</div>
				</div>
				<div class="cube__side cube__side--left"></div>
				<div class="cube__side cube__side--right"></div>
				<div class="cube__side cube__side--top"></div>
				<div class="rows rows--large">
					<div class="row">
						@for($i = 0 ; $i <= 18 ; $i++)
						<div data-seat="A{{$i}}" class="row__seat"></div>
						@endfor
					</div>
					<div class="row">
						@for($i = 1 ; $i <= 18 ; $i++)
						<div data-seat="B{{$i}}" class="row__seat"></div>
						@endfor
					</div>
					<div class="row">
						@for($i = 1 ; $i <= 18 ; $i++)
						<div data-seat="C{{$i}}" class="row__seat"></div>
						@endfor
					</div>
					<div class="row">
						@for($i = 1 ; $i <= 18 ; $i++)
						<div data-seat="D{{$i}}" class="row__seat"></div>
						@endfor
					</div>
					<div class="row">
						@for($i = 1 ; $i <= 18 ; $i++)
						<div data-seat="E{{$i}}" class="row__seat"></div>
						@endfor
					</div>
					<div class="row">
						@for($i = 1 ; $i <= 18 ; $i++)
						<div data-seat="F{{$i}}" class="row__seat"></div>
						@endfor
					</div>
					<div class="row">
						@for($i = 1 ; $i <= 18 ; $i++)
						<div data-seat="G{{$i}}" class="row__seat"></div>
						@endfor
					</div>
					<div class="row">
						@for($i = 1 ; $i <= 18 ; $i++)
						<div data-seat="H{{$i}}" class="row__seat"></div>
						@endfor
					</div>
					<div class="row">
						@for($i = 1 ; $i <= 18 ; $i++)
						<div data-seat="I{{$i}}" class="row__seat"></div>
						@endfor
					</div>
				</div>
				<!-- /rows -->
			</div><!-- /cube -->
		</div><!-- /container -->
		<div class="plan">
			<h3 class="plan__title">Seating Plan</h3>
			<div class="rows rows--mini">
				<div class="row">
					@for($i = 0 ; $i < 18 ; $i++)
						@if($seatData[$i]=='0')
						<div class="row__seat tooltip" data-num="{{$i}}" data-tooltip="A{{$i+1}}"></div>
						@else
						<div class="row__seat row__seat--reserved"></div>
						@endif
					@endfor
				</div>
				<div class="row">
					@for($i = 0 ; $i < 18 ; $i++)
						@if($seatData[$i+18]=='0')
						<div class="row__seat tooltip" data-num="{{$i+18}}" data-tooltip="B{{$i+1}}"></div>
						@else
						<div class="row__seat row__seat--reserved"></div>
						@endif
					@endfor
				</div>
				<div class="row">
					@for($i = 0 ; $i < 18 ; $i++)
						@if($seatData[$i+36]=='0')
						<div class="row__seat tooltip" data-num="{{$i+36}}" data-tooltip="C{{$i+1}}"></div>
						@else
						<div class="row__seat row__seat--reserved"></div>
						@endif
					@endfor
				</div>
				<div class="row">
					@for($i = 0 ; $i < 18 ; $i++)
						@if($seatData[$i+54]=='0')
						<div class="row__seat tooltip" data-num="{{$i+54}}" data-tooltip="D{{$i+1}}"></div>
						@else
						<div class="row__seat row__seat--reserved"></div>
						@endif
					@endfor
				</div>
				<div class="row">
					@for($i = 0 ; $i < 18 ; $i++)
						@if($seatData[$i+72]=='0')
						<div class="row__seat tooltip" data-num="{{$i+72}}" data-tooltip="E{{$i+1}}"></div>
						@else
						<div class="row__seat row__seat--reserved"></div>
						@endif
					@endfor
				</div>
				<div class="row">
					@for($i = 0 ; $i < 18 ; $i++)
						@if($seatData[$i+90]=='0')
						<div class="row__seat tooltip" data-num="{{$i+90}}" data-tooltip="F{{$i+1}}"></div>
						@else
						<div class="row__seat row__seat--reserved"></div>
						@endif
					@endfor
				</div>
				<div class="row">
					@for($i = 0 ; $i < 18 ; $i++)
						@if($seatData[$i+108]=='0')
						<div class="row__seat tooltip" data-num="{{$i+108}}" data-tooltip="G{{$i+1}}"></div>
						@else
						<div class="row__seat row__seat--reserved"></div>
						@endif
					@endfor
				</div>
				<div class="row">
					@for($i = 0 ; $i < 18 ; $i++)
						@if($seatData[$i+126]=='0')
						<div class="row__seat tooltip" data-num="{{$i+126}}" data-tooltip="H{{$i+1}}"></div>
						@else
						<div class="row__seat row__seat--reserved"></div>
						@endif
					@endfor
				</div>
				<div class="row">
					@for($i = 0 ; $i < 18 ; $i++)
						@if($seatData[$i+144]=='0')
						<div class="row__seat tooltip" data-num="{{$i+144}}" data-tooltip="I{{$i+1}}"></div>
						@else
						<div class="row__seat row__seat--reserved"></div>
						@endif
					@endfor
				</div>
				<input type="hidden" id="harga" value="{{$seat[0]->cinema->price}}">
			</div>
			<!-- /rows -->
			<ul class="legend">
				<li class="legend__item legend__item--free">Free</li>
				<li class="legend__item legend__item--reserved">Reserved</li>
				<li class="legend__item legend__item--selected">Selected</li>
			</ul>
			<form id="submit-buy">
			<input type="hidden" name="film_id" value="{{$film->id}}">
			<input type="hidden" name="cinema_id" value="{{$seat[0]->cinema->id}}">
			<input type="hidden" name="user_id" value="{{Auth::user()->id}}">
			<input type="hidden" name="waktu" value="{{$time}}">
			<button class="action action--buy" id="temp-price" disabled>Rp. 0</button>
			<button class="action action--buy" type="submit">Buy tickets</button>
			</form>
		</div><!-- /plan -->
		<button class="action action--lookaround action--disabled" arial-label="Unlook View"></button>
		<script src="{{asset('theater/js/classie.js')}}"></script>
		<script src="{{asset('theater/js/main.js')}}"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
		<script type="text/javascript">
			var data=[];
			var total=0;
			var harga=$("#harga").val();
			console.log(harga);
			for (var i = 0; i < 180; i++) {
				data.push("0");
			}
			$(".row__seat").on('click', function() {
				if (!$(this).hasClass("row__seat--reserved")) {
					if ($(this).hasClass("row__seat--selected")) {
						data[$(this).attr("data-num")]="1";
						total+=Number(harga);
					}
					else{
						data[$(this).attr("data-num")]="0";
						total-=Number(harga);
					}
					if (total<0) {
						total=0;
					}
					$("#temp-price").text("Rp."+total);
				}
			});

			$.ajaxSetup({
		        headers: {
		            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		        }
		    });

		    $("#submit-buy").submit(e => {

		      	html_content = '';
		      	e.preventDefault();

		      	var myForm = document.getElementById('submit-buy');
		      	formData = new FormData(myForm);

		      	formData.append('dataSeat', JSON.stringify(data));
		      	formData.append('price', total);

		      	$.ajax({
		          	url: '{{route('book.movie')}}',
		          	method: "POST",
					processData: false,
					contentType: false,
		          	data: formData,
		          	dataType: 'JSON',
		          	success: data => {
		              	if (data.message == "success") {
		              		swal("Ticket purchased succefully! thank you.\nPlease confirm payment on BNI 033444175521",{
								closeOnClickOutside: false,
		              		}).then(function() {
								window.location = '{{url("user/booked-movies")}}';
							});
		              	}
		          	},
		          	error: data => {
			            alert("Server Error")
			            console.log(data)
			            newData = JSON.parse(data.responseText)
			            alert(newData.message + ", file: " + newData.file
			            + ", line: " + newData.line);
		          	}
		      	});
			});
		</script>
	</body>
</html>