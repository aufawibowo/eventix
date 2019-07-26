@extends('layouts.main_cinema')

@section('title', "Cinema ")

@section('style')
@endsection

@section('header')
  <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">XXI Cinema</span> - These are the list of cinema in Surabaya!
  </h4>
@endsection

@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-body">
          <table class="table table-striped table-hover table-responsive">
            <thead>
              <th>No.</th>
              <th>Cinema Name</th>
              <th>Price</th>
            </thead>
            <tbody>
            	@php
            	$no=1;
            	@endphp
              @foreach ($cinemas as $cinema)
                <tr>
                  <td>{{$no++}}</td>
                  <td class="text-capitalize">{{$cinema->name}}</td>
                  <td>Rp. {{number_format($cinema->price, 2)}}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
@endsection

@section('script')
<script type="text/javascript">
    $(document).ready( function () {
      $('table').DataTable();
      $("#nav-cinema").addClass("active");
    });
</script>
@endsection
