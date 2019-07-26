@extends('layouts.main_user')

@section('title', "Ordered tickets")

@section('style')

@endsection

@section('header')
<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">My Tickets</span> - These are the tickets I have ordered!</h4>
@endsection

@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-body">
          <table class="table table-striped table-hover table-responsive">
            <thead>
              <th>Ticket ID</th>
              <th>Event name</th>
              <th>Date</th>
              <th>Action</th>
            </thead>
            <tbody>
              @foreach ($tickets as $t)
                <tr>
                  <td>
                    {{$t->id}}
                  </td>
                  <td>
                    {{$t->orders[0]->event->name}}
                  </td>
                  <td>
                    {{$t->created_at}}
                  </td>
                  <td>
                    <a href="{{url('user/tickets', $t->id)}}" target="_blank" name="button" class="btn btn-info">View</a>
                  </td>
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
  $("#nav-tickets").addClass("active");
});
</script>
@endsection
