@extends('Admin_Pages.Admin_nav.admin_nav')
@section('admin_main')
<H1>CARS LIST</H1>
@if(Session::has('success'))
    <div class="alert alert-success">{{Session::get('success')}}</div>
    @endif
    @if(Session::has('fail'))
    <div class="alert alert-danger">{{Session::get('fail')}}</div>
@endif
<form action="{{ route('search_car') }}" method="GET">
    {{@csrf_field()}}
    <div><span class="text-danger">@error('search') {{$message}} @enderror</span></div>
    <input type="search" name="search" id="">
    <input type="submit" value="submit"class="btn btn-primary">
</form>
<div class="row row-cols-1 row-cols-md-4 g-4"style="width: 85rem;">
    @foreach ($Clist as $Clist)
    <div class="card" style="width: 100rem;">
        <a href="{{ route('single_car_details_view',['id'=>encrypt($Clist->id)]) }}"> <img src="{{asset('car_pic/'.$Clist->car_pic)}}" class="card-img-top"height="190"></a>
        <div class="card-body">
          <a href="{{ route('single_car_details_view',['id'=>encrypt($Clist->id)]) }}"><H5>{{ $Clist->car_name }}</H5></a>
          <h4>Provider: <a href="{{ route('admin single user details',['id'=>encrypt($Clist->owner_id)]) }}">{{ $Clist->car_owner_name }}</a></h4>
          <h4>Service ID: {{  $Clist->id }}</h4>
          <a href="{{ route('edit car view admin',['id'=>encrypt($Clist->id)]) }}" class="btn btn-primary">Edit</a>
          <a href="{{ route('delete car admin',['id'=>encrypt($Clist->id)]) }}" class="btn btn-primary">Delete</a>
        </div>
      </div>
      @endforeach
  </div>
@endsection
