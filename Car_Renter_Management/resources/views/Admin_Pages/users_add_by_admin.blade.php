@extends('Admin_Pages.Admin_nav.admin_nav')
@section('admin_main')

<form action="{{route('users add')}}" method="post"  class="mx-1 mx-md-4" enctype="multipart/form-data" >
{{@csrf_field()}}
<div class="container">
		<div class="main-body">
			<div class="row">
				<div class="col-lg-4">
					<div class="card"style = "position:relative; left:-70px; width: 250px">
						<div class="card-body" >
							<div class="d-flex flex-column align-items-center text-center">
								<img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="" class="rounded-circle p-1 bg-primary" width="110">
							</div>
							<hr class="my-4">
                            <h6>Uploade Profile Picture</h6>
                            <hr class="my-4">
                            <input type="file" name="pp" id="">
						</div>
					</div>
				</div>
				<div class="col-lg-8">
					<div class="card"style="width: 600px">
						<div class="card-body" style="width: 600px">
                            <div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Role</h6>
								</div>
								<!-- <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                    <label class="form-label" for="form3Example1c">Gender</label> <br> -->

                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="role" value="Renter"@if(Request::old('role')=="Renter") checked @endif >
                    <label class="form-check-label" for="femaleGender">Renter</label>
                  </div>

                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="role"value="Customer" @if(Request::old('role')=="Customer") checked @endif >
                    <label class="form-check-label" for="maleGender">Customer</label>
                  </div>
                  <div><span class="text-danger">@error('role') {{$message}} @enderror</span></div>


									<!-- <input type="text" class="form-control" value="(320) 380-4539"> -->

							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">First Name</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" name="first_name" class="form-control" value="{{old('first_name')}}">
								</div>
							</div>
                            <div><span class="text-danger">@error('first_name') {{$message}} @enderror</span></div>
                            <div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Last Name</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" name="last_name" class="form-control" value="{{old('last_name')}}">
								</div>
                                <span class="text-danger">@error('last_name') {{$message}} @enderror</span>
							</div>

                            <div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">username</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" name="username" class="form-control" value="{{old('username')}}">
								</div>
                                <span class="text-danger">@error('username') {{$message}} @enderror</span>
							</div>
                            <div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Email</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="email" name="email" class="form-control" value="{{old('email')}}">
								</div>
                                <span class="text-danger">@error('email') {{$message}} @enderror</span>
							</div>

							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Date of Birth</h6>
								</div>
								<div class="col-sm-9 text-secondary">
                                <input type="date" name="Date_of_birth" class="form-control"  value="{{old('Date_of_birth')}}">
									<!-- <input type="text" class="form-control" value="(239) 816-9029"> -->
								</div>
                                <span class="text-danger">@error('Date_of_birth') {{$message}} @enderror</span>
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
                    <input class="form-check-input" type="radio" name="gender" id="female" value="Female"@if(Request::old('gender')=="Female") checked @endif>
                    <label class="form-check-label" for="femaleGender">Female</label>
                  </div>

                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="male" value="Male"@if(Request::old('gender')=="Male") checked @endif>
                    <label class="form-check-label" for="maleGender">Male</label>
                  </div>

                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="other" value="Other"@if(Request::old('gender')=="Other") checked @endif>
                    <label class="form-check-label" for="otherGender">Other</label>
                  </div>


									<!-- <input type="text" class="form-control" value="(320) 380-4539"> -->
                                    <span class="text-danger">@error('gender') {{$message}} @enderror</span>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Phone Number</h6>
								</div>
								<div class="col-sm-9 text-secondary">
                                <input type="text" name="phone_number" class="form-control"  value="{{old('phone_number')}}">

								</div>
                                <span class="text-danger">@error('phone_number') {{$message}} @enderror</span>
							</div>
                            <div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Address</h6>
								</div>
								<div class="col-sm-9 text-secondary">
                                <input type="text-area" name="address" class="form-control"  value="{{old('address')}}">
								</div>
                                <span class="text-danger">@error('address') {{$message}} @enderror</span>
							</div>
                            <div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">NID Number</h6>
								</div>
								<div class="col-sm-9 text-secondary">
                                <input type="text" name="nid_number" class="form-control"  value="{{old('nid_number')}}">
								</div>
                                <span class="text-danger">@error('nid_number') {{$message}} @enderror</span>
							</div>
                            <div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">DL Number</h6>
								</div>
								<div class="col-sm-9 text-secondary">
                                <input type="text" name="dl_number" class="form-control"  value="{{old('dl_number')}}">
								</div>
                                <span class="text-danger">@error('dl_number') {{$message}} @enderror</span>
							</div>
                            <div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Password</h6>
								</div>
								<div class="col-sm-9 text-secondary">
                                <input type="password" name="password" class="form-control"  value="{{old('password')}}">
								</div>
                                <span class="text-danger">@error('password') {{$message}} @enderror</span>
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


@endsection
