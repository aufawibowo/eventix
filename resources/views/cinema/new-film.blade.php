@extends('layouts.main_cinema')

@section('title', "Now playing")

@section('style')
<link href="{{asset('assets/css/movie.css')}}" rel="stylesheet" type="text/css">
@endsection

@section('header')
  <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Add Film</span> - Add New Film!
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

          <form action="{{url('/xxi/films')}}" method="POST"  enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
              <label for="event-name">Film name</label>
              <input type="text" class="form-control" required name="film_name" value="">
              <p class="help-block">What is your film name?</p>
            </div>
            <div class="form-group">
              <label for="event-name">Film genre</label>
              <select class="form-control" required name="film_genre">
                <option value="Action">Action</option>
                <option value="Adventure">Adventure</option>
                <option value="Animation">Animation</option>
                <option value="Biography">Biography</option>
                <option value="Comedy">Comedy</option>
                <option value="Crime">Crime</option>
                <option value="Documentary">Documentary</option>
                <option value="Drama">Drama</option>
                <option value="Family">Family</option>
                <option value="Fantasy">Fantasy</option>
                <option value="History">History</option>
                <option value="Horror">Horror</option>
                <option value="Music">Music</option>
                <option value="Musical">Musical</option>
                <option value="Mystery">Mystery</option>
                <option value="Romance">Romance</option>
                <option value="SciFi">SciFi</option>
                <option value="Short">Short</option>
                <option value="Sport">Sport</option>
                <option value="Superhero">Superhero</option>
                <option value="Thriller">Thriller</option>
                <option value="War">War</option>
                <option value="Western">Western</option>
              </select>
            </div>
            <div class="form-group">
              <label for="event-name">Film status</label>
              <select class="form-control" required name="film_status">
                <option value="1">Now Playing</option>
                <option value="2">Coming Soon</option>
              </select>
            </div>
            <div class="form-group">
              <label for="event-name">Description</label>
              <textarea class="form-control" required name="film_description"></textarea>
              <p class="help-block">The description?</p>
            </div>
            <div class="form-group">
              <label for="event-name">Director</label>
              <input type="text" class="form-control" required name="film_director" value="">
              <p class="help-block">The director?</p>
            </div>
            <div class="form-group">
              <label for="event-name">Duration</label>
              <input type="text" class="form-control" required name="film_duration" value="">
              <p class="help-block">The Duration? ex: 1h 30m</p>
            </div>
            <div class="form-group">
              <input type="file" name="film_pictures" class="form-control" accept="image/*" onchange="validate_fileupload(this.value);">
              <p class="help-block">Film Cover</p>
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

  // change border color of input field
  $("input, textarea").keyup(function(){
    if ($(this).val().trim() != "") {
      $(this).css('border-left', '2px solid  #03D61D');
    }else{
      $(this).css('border-left', '2px solid  red');

    }
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
    $("input[name='film_pictures']").val('');
    return false;
  }
</script>
@endsection
