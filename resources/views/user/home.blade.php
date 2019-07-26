@extends('layouts.main_user')

@section('title', "Dashboard")

@section('style')
<style media="screen">
  .event{
    text-align: center;
    border-color: #eeeeef;
    border-style: solid;
    border-width: thin;
    border-radius: 5px;
  }
  .event:hover{
    cursor: pointer;
    background-color: #eeeeef;
  }

  .event a{
    text-decoration: none;
    color: black;
  }

  table .btn{
    margin-right: 5px;
  }
</style>
@endsection

@section('header')
  <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">My Events</span> - These are my events!
    <button id="new-ticket" type="button" class="btn btn-primary" name="button" style="float: right">New event</button>
  </h4>
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
              <th>Status</th>
              <th>Action</th>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <div id="event-type" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title">What type of event?</h4>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-3">
                <div class="event">
                  <a href="{{url('/user/new/event')}}">
                    <h4>Concert</h4>
                  </a>

                </div>
              </div>
              <div class="col-md-3">
                <div class="event">
                  <a href="{{url('/user/new/event')}}">
                    <h4>Seminar</h4>
                  </a>
                </div>
              </div>
              <div class="col-md-3">
                <div class="event">
                  <a href="{{url('/user/new/event')}}">
                    <h4>Workshop</h4>
                  </a>
                </div>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-md-3">
                <div class="event">
                  <a href="{{url('/user/new/event')}}">
                    <h4>Exhibition</h4>
                  </a>
                </div>
              </div>
              <div class="col-md-3">
                <div class="event">
                  <a href="{{url('/user/new/event')}}">
                    <h4>Sport</h4>
                  </a>
                </div>
              </div>
            </div>
          </div>

      </div>
    </div>
    </div>

  </div>
@endsection

@section('script')
<script type="text/javascript">
  $(document).ready(function(){
    $("#new-ticket").click(function(){
      $("#event-type").modal('show');
    });

      const event_table = $('table').DataTable({
        ajax: '{{url('user/events')}}',
        responsive: true,
        columns: [
        { data: "name" },
        { data: "date1" },
        { data: "approved" ,
          render: function(data, type, row){
            if (data == 1) {
              return "Approved";
            }else if (data == 0){
              return "Pending";
            }else{
              return "Declined";
            }
          }

        },
        { data: "approved",
            render: function(data, type, row){
                if (data == 1) {
                  return '<button type="button" name="button" event-id='+row.id+' class="btn btn-danger delete">Delete</button>'+
                  '<a type="button" href="{{url('events')}}/'+row.id+'" name="button" target="_blank" class="btn btn-info">View</a>';
                }else{
                  return '<button type="button" event-id='+row.id+' name="button" class="btn btn-danger delete">Delete</button>' +
                  '<a type="button" href="{{url('events')}}/'+row.id+'" target="_blank" name="button" class="btn btn-info">View</a>';
                }
            }
        }
      ]
      });

    // add csrf token to headers in ajax call
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // event listner on delete button
    $(document).on('click', '.delete', function(){
      let event_id = $(this).attr('event-id');
      $.ajax({
        url: '{{url('user/events')}}/' + event_id,
        method: "DELETE",
        success: function(){
          event_table.ajax.reload( null, false );
          alert("Event deleted!");
        },
        error: function(){
          alert("Error");
        }
      });
    });

    $("#nav-home").addClass("active");


  });
</script>
@endsection
