@extends('layouts.main_cinema')

@section('title', "Schedule ")

@section('style')
@endsection

@section('header')
  <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">XXI Cinema</span> - These are the schedule of film!
    <button id="new-schedule" type="button" class="btn btn-primary" name="button" style="float: right">New Schedule</button>
  </h4>
@endsection

@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-body">
          @if (session('success'))
              <div class="alert alert-success">
                  {{ session('success') }}
              </div>
          @endif
          <table class="table table-striped table-hover table-responsive">
            <thead>
              <th>No.</th>
              <th>Cinema Name</th>
              <th>Film Name</th>
            </thead>
            <tbody>
            	@php
            	$no=1;
            	@endphp
              @foreach ($schedules as $schedule)
                <tr>
                  <td>{{$no++}}</td>
                  <td class="text-capitalize">{{$schedule->cinema->name}}</td>
                  <td class="text-capitalize">{{$schedule->film->name}}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <div id="new-schedules" class="modal fade">
    	<div class="modal-dialog">
    		<div class="modal-content">
    			<div class="modal-header">
    				<button type="button" class="close" data-dismiss="modal">&times;</button>
    				<h5 class="modal-title">New Schedule</h5>
    			</div>

    			<div class="modal-body">
    				gawe nentukno jadwal e, misal ndek TP kate nampilno film iron man
		          	<form action="{{url('/xxi/schedules')}}" method="POST">
			            {{ csrf_field() }}
			            <div class="form-group">
			              	<label for="cinema_id">Cinema name</label>
			              	<select class="form-control" required name="cinema_id">
					            @foreach ($cinemas as $cinema)
			                  	<option value="{{$cinema->id}}">{{$cinema->name}}</option>
			                  	@endforeach
			              	</select>
		            	</div>
			            <div class="form-group">
			              	<label for="film_id">Film name</label>
			              	<select class="form-control" required name="film_id">
					            @foreach ($films as $film)
			                  	<option value="{{$film->id}}">{{$film->name}}</option>
			                  	@endforeach
			              	</select>
		            	</div>
	    			</div>

    			<div class="modal-footer">
    				<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
    				<button type="submit" class="btn btn-primary">Save</button>
    			</div>
          </form>
    		</div>
    	</div>
    </div>
@endsection

@section('script')
<script type="text/javascript" src="{{asset('assets/js/pages/components_modals.js')}}"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $("#new-schedule").click(function(){
      $("#new-schedules").modal('show');
    });

    $(document).ready( function () {
      $('table').DataTable();
      $("#nav-home").addClass("active");
    });


  });
</script>
@endsection
