@extends('layouts.main_admin')

@section('header')
  <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Pending Events</span> - Please verify these events
    so users can start enjoying!</h4>
@endsection

@section('style')
  <style media="screen">
    table .btn{
      margin-right: 5px;
    }
  </style>
@endsection

@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-body">
            <table class="table table-striped table-hover table-responsive">
              <thead>
                <th>Event name</th>
                <th>Date</th>
                <th>Action</th>
              </thead>
              <tbody>
              </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('script')
<script type="text/javascript">
  // add csrf token to headers in ajax call
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
  const events_table = $("table").DataTable({
    ajax: '{{url('admin/events')}}',
    responsive: 'true',
    columns: [
      {data: 'name'},
      {data: 'date1'},
      {data: null,
        render: function(data, type, row){
          return '<button event-id='+row.id+' class="btn btn-success approve" type="button" name="button">Approve</button>'+
          '<button event-id='+row.id+' class="btn btn-danger decline" type="button" name="button">Decline</button>'+
          '<a class="btn btn-info" target="_blank" href="{{url('events')}}/'+row.id+'">View</a>';
        }
      }
    ]
  });

  $(document).on('click', '.approve', function(){
    const id = $(this).attr('event-id');
    $.ajax({
      url: '{{url('admin/approve/events')}}/' + id,
      method: "PUT",
      success: function(){
        events_table.ajax.reload( null, false );
        alert("Event approved!");
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
        events_table.ajax.reload( null, false );
        alert("Event declined!");
      },
      error: function(){
        alert("Error");
      }
    });
  });

  $("#nav-home").addClass("active");

</script>
@endsection
