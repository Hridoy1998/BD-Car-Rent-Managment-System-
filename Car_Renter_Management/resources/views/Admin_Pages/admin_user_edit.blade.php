@extends('Admin_Pages.Admin_nav.admin_nav')
@section('admin_main')
@foreach ($s_user as $s_user )
@if(Session::has('success'))
    <div class="alert alert-success">{{Session::get('success')}}</div>
@endif
@if(Session::has('fail'))
    <div class="alert alert-danger">{{Session::get('fail')}}</div>
@endif

<form action="{{ route('edit',['edit_id'=>encrypt($s_user->id)])}}" method="post"  class="mx-1 mx-md-4" enctype="multipart/form-data" >
{{@csrf_field()}}
<div class="container">
		<div class="main-body">
			<div class="row">
				<div class="col-md-4 mb-3">
					<div class="card">
						<div class="card-body">
							<div class="d-flex flex-column align-items-center text-center">
								<img src="{{asset('pp/'.$s_user->pp)}}" alt="" class="rounded-circle" width="150">
								<div class="mt-3">
									<h4>{{  $s_user->username }}</h4>
									<p class="text-secondary mb-1">{{ $s_user->type }}</p>
									<p class="text-muted font-size-sm">{{ $s_user->address }}</p>
									<!-- <button class="btn btn-primary">Follow</button>
									<button class="btn btn-outline-primary">Message</button> -->
								</div>
							</div>
							<hr class="my-4">
						</div>
					</div>
				</div>
				<div class="col-lg-8">
					<div class="card"style="width: 600px">
						<div class="card-body"style="width: 600px">
                            <div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Role</h6>
								</div>
								<!-- <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                    <label class="form-label" for="form3Example1c">Gender</label> <br> -->

                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="role" @if($s_user->type =="Renter") value="Renter" checked @endif value="Renter">
                    <label class="form-check-label" for="femaleGender">Renter</label>
                  </div>

                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="role" @if($s_user->type =="Customer") value="Customer" checked @endif value="Customer">
                    <label class="form-check-label" for="maleGender">Customer</label>
                  </div>
                  @if ($s_user->type =="Admin")
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="role" @if($s_user->type =="Admin") value="Admin" checked @endif value="Admin">
                    <label class="form-check-label" for="maleGender">Admin</label>
                  </div>

                  @endif
                  <div><span class="text-danger">@error('role') {{$message}} @enderror</span></div>


									<!-- <input type="text" class="form-control" value="(320) 380-4539"> -->

							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">First Name</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" name="first_name" class="form-control" value="{{  $s_user->first_name }}">
								</div>
							</div>
                            <div><span class="text-danger">@error('first_name') {{$message}} @enderror</span></div>
                            <div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Last Name</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" name="last_name" class="form-control" value="{{  $s_user->last_name }}">
								</div>
							</div>
                            <div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">username</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" name="username" class="form-control" value="{{  $s_user->username }}">
								</div>
							</div>
                            <div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Email</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="email" name="email" class="form-control" value="{{  $s_user->email }}">
								</div>
							</div>

							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Date of Birth</h6>
								</div>
								<div class="col-sm-9 text-secondary">
                                <input type="date" name="Date_of_birth" class="form-control"  value="{{$s_user->dob}}">
									<!-- <input type="text" class="form-control" value="(239) 816-9029"> -->
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Gender</h6>
								</div>



								<!-- <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                    <label class="form-label" for="form3Example1c">Gender</label> <br> -->

                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" @if($s_user->gender =="Female") value="Female" checked @endif value="Female">
                    <label class="form-check-label" for="femaleGender">Female</label>
                  </div>

                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" @if($s_user->gender =="Male") value="Male" checked @endif value="Male">
                    <label class="form-check-label" for="maleGender">Male</label>
                  </div>

                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" @if($s_user->gender =="Other") value="Other" checked @endif value="Other">
                    <label class="form-check-label" for="otherGender">Other</label>
                  </div>


									<!-- <input type="text" class="form-control" value="(320) 380-4539"> -->

							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Phone Number</h6>
								</div>
								<div class="col-sm-9 text-secondary">
                                <input type="text" name="phone_number" class="form-control"  value="{{$s_user->phone_number}}">

								</div>
							</div>
                            <div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Address</h6>
								</div>
								<div class="col-sm-9 text-secondary">
                                <input type="text-area" name="address" class="form-control"  value="{{$s_user->address}}">
								</div>
							</div>
                            <div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">NID Number</h6>
								</div>
								<div class="col-sm-9 text-secondary">
                                <input type="text" name="nid_number" class="form-control"  value="{{$s_user->nid_number}}">
								</div>
							</div>
                            <div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">DL Number</h6>
								</div>
								<div class="col-sm-9 text-secondary">
                                <input type="text" name="dl_number" class="form-control"  value="{{$s_user->dl_number}}">
								</div>
							</div>
                            <div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Profile Picture</h6>
								</div>
								<div class="col-sm-9 text-secondary">
                                <input type="file" name="pp" id="">
								</div>
							</div>

							<div class="row">
								<div class="col-sm-3"></div>
								<div class="col-sm-9 text-secondary">
									<button type="submit" class="btn btn-primary btn-lg">Save Changes</button>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
    </form>
    @endforeach


@endsection
