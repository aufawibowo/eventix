@extends('layouts.main_user')

@section('title', "Create new event")

@section('style')

@endsection

@section('header')
  <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">New Event</span> - Create tickets for your event!
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

          <form action="{{url('/user/events')}}" method="POST"  enctype="multipart/form-data" id="new_event_form">
            {{ csrf_field() }}
            <div class="form-group">
              <label for="event-name">Event name</label>
              <input type="text" class="form-control" required name="event_name" value="">
              <p class="help-block">What is your event called?</p>
            </div>
            <div class="form-group">
              <label for="event-name">Description</label>
              <textarea name="event_description" class="form-control" rows="8" cols="80" required></textarea>
              <p class="help-block">Describe your event so users know how entertaining it is!</p>
            </div>
            <div class="form-group">
              <label for="event-name">Event type</label>
              <select class="form-control" required name="event_type">
                  <option value="Concert">Concert</option>
                  <option value="Seminar">Seminar</option>
                  <option value="Workshop">Workshop</option>
                  <option value="Exhibition">Exhibition</option>
                  <option value="Sport">Sport</option>
              </select>
            </div>
            <div class="form-group" style="display: none" id="sport_type_field">
              <label for="event-name">Sport type</label>
              <input type="text" class="form-control" name="sport_type" value="">
              <p class="help-block">e.g. Football</p>
            </div>
            <div class="form-group">
              <label for="event-name">Start date</label>
              <input class="form-control input-date" type="date" name="start_date" required>
              <p class="help-block">When does your event start?</p>
            </div>
            <div class="form-group">
              <label for="event-name">End date</label>
              <input class="form-control input-date" type="date" name="end_date" required>
              <p class="help-block">When does your event end?</p>
            </div>
            <div class="form-group">
              <label for="event-name">Price</label>
              <input class="form-control" type="number" min="1" step="1" required name="price">
              <p class="help-block">The price for one ticket.</p>
            </div>
            <div class="form-group">
              <label for="event-name">Location</label>
              <input type="text" class="form-control" required name="city" value="">
              <p class="help-block">Which city is your event located in?</p>
            </div>
            <div class="form-group">
              <label for="event-name">Quota</label>
              <input class="form-control" type="number" min="1" step="1" required name="quota">
              <p class="help-block">The tickets available for your event.</p>
            </div>
            <div class="form-group">
              <input type="file" required name="event_pictures[]" multiple class="form-control" accept="image/*" onchange="validate_fileupload(this.value); validate_max_attached(this)">
              <p class="help-block">Attach pictures to add buzz to your event.</p>
            </div>
            <button type="submit" class="btn btn-success">Save</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('script')
<script type="text/javascript">

$(document).ready(function(){
  // change border color of input field
  $("input, textarea").keyup(function(){
    if ($(this).val().trim() != "") {
      $(this).css('border-left', '2px solid  #03D61D');
    }else{
      $(this).css('border-left', '2px solid  red');

    }
  });
  // minimal date is today
  $('[type="date"]').prop('min', function(){
      return new Date().toJSON().split('T')[0];
  });

  // attached images has to be png or jpg
  function validate_fileupload(fileName)
  {
    var allowed_extensions = new Array("jpg","png", "jpeg");
    var file_extension = fileName.split('.').pop().toLowerCase(); // split function will split the filename by dot(.), and pop function will pop the last element from the array which will give you the extension as well. If there will be no extension then it will return the filename.

    for(var i = 0; i <= allowed_extensions.length; i++)
    {
      if(allowed_extensions[i]==file_extension)
      {
        return true; // valid file extension
      }
    }
    alert("Please attach a jpg or png image.")
    $("input[name='event_pictures']").val('');
    return false;
  }

  function validate_max_attached(files){
    if (files.files.length > 3) {
      alert("Maximum image attached is 3.")
      $("input[name='event_pictures']").val('');
      return false;
    }
  }

  $("#new_event_form").submit(function(){
    const date1 = $("input[name='start_date']").val();
    const date2 = $("input[name='end_date']").val();

    if (date1 > date2) {
      alert("Start date must be before end date!");
      return false;
    }
  });

  $("select").change(function(){
    if ($(this).val() == "Sport") {
      $("#sport_type_field").css('display', 'block');
      $("#sport_type_field").prop('required', true);
    }else{
      $("#sport_type_field").css('display', 'none');
      $("input[name='sport_type']").removeAttr('required');
    }
  });
});


</script>
@endsection
