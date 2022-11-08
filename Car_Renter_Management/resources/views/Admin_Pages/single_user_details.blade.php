@extends('Admin_Pages.Admin_nav.admin_nav')
@section('admin_main')
@foreach ($s_user as $s_user )

<div class="container">
    <div class="main-body">

          <!-- Breadcrumb -->
          <!-- <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html">Home</a></li>
              <li class="breadcrumb-item"><a href="javascript:void(0)">User</a></li>
              <li class="breadcrumb-item active" aria-current="page">User Profile</li>
            </ol>
          </nav> -->
          <!-- /Breadcrumb -->

          <div class="row gutters-sm">
            <div class="col-md-4 mb-1">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="{{asset('pp/'.$s_user->pp)}}" alt="Admin" class="rounded-circle" width="150">
                    <div class="mt-3">
                      <h4>{{  $s_user->username }}</h4>
                      <p class="text-secondary mb-1">{{ $s_user->type }}</p>
                      <p class="text-muted font-size-sm">{{ $s_user->address }}</p>
                      <!-- <button class="btn btn-primary">Follow</button>
                      <button class="btn btn-outline-primary">Message</button> -->
                    </div>
                  </div>
                </div>
              </div>

            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Full Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    {{  $s_user->first_name." ".$s_user->last_name }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    {{  $s_user->email}}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Phone</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    {{ $s_user->phone_number }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Date Of Birth</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    {{ $s_user->dob }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Address</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    {{ $s_user->address }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Gender</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    {{ $s_user->gender}}
                    </div>
                  </div>
                  <hr>

                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">NID Number</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    {{ $s_user->nid_number }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">DL Number</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    {{ $s_user->dl_number }}
                    </div>
                  </div>
                  <hr>

                  <div class="row">
                    <div class="col-sm-12">
                        @if ($s_user->block_status==1)
                            <h4>Its a Block User</h4>
                        @else
                        <a class="btn btn-info " target="__blank" href="{{ route('admin edit',['id'=>encrypt($s_user->id)]) }}">Edit</a>
                        @endif
                    </div>
                  </div>
                </div>
              </div>





            </div>
          </div>

        </div>
    </div>

    @endforeach

@endsection
