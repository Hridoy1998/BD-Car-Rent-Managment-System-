@extends('Admin_Pages.Admin_nav.admin_nav')
@section('admin_main')
@if(Session::has('success'))
    <div class="alert alert-success">{{Session::get('success')}}</div>
@endif
@if(Session::has('fail'))
    <div class="alert alert-danger">{{Session::get('fail')}}</div>
@endif
<h1>Notice</h1>
<form action="{{ route('notice_edit',['id'=>encrypt($n->id)]) }}"method="post">
    {{@csrf_field()}}
    <input type="date" name="notice_date"  value="{{ $n->notice_date }}"><br>
    <textarea name="notice" id="" cols="60" rows="10"value="{{old('first_name')}}"> {{$n->notice}}</textarea>
    <div><span class="text-danger">@error('notice') {{$message}} @enderror</span></div>
<div>
    <button type="submit" class="btn btn-primary btn-lg">Submit</button>
</div>
</form>
@endsection
