@extends('layouts.main_user')

@section('title', "Booked movies")

@section('style')

@endsection

@section('header')
<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">My Tickets</span> - These are the movies tickets I have booked!</h4>
@endsection

@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-body">
          <table class="table table-striped table-hover table-responsive">
            <thead>
              <th>Film</th>
              <th>Cinema</th>
              <th>Time</th>
              <th>Total Price</th>
              <th>E-Ticket</th>
            </thead>
            <tbody>
              @foreach($tickets as $ticket)
                <tr>
                  <td class="text-capitalize">{{$ticket->film->name}}</td>
                  <td class="text-capitalize">{{$ticket->cinema->name}}</td>
                  <td>{{date('Y M d', strtotime($ticket->created_at))}}</td>
                  <td>{{number_format($ticket->total, 2)}}</td>
                  <td><a href="{{url('user/tickets-movie', $ticket->id)}}" target="_blank" name="button" class="btn btn-info">View</a></td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('script')
<script type="text/javascript">
$(document).ready( function () {
  $('table').DataTable({
    responsive: true
  });
  $("#nav-movies").addClass("active");
});
</script>
@endsection
