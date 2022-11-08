@extends('Admin_Pages.Admin_nav.admin_nav')
@section('admin_main')
@if(Session::has('success'))
    <div class="alert alert-success">{{Session::get('success')}}</div>
@endif
@if(Session::has('fail'))
    <div class="alert alert-danger">{{Session::get('fail')}}</div>
@endif
<form action="{{ route('users_search') }}"method="GET">
    {{@csrf_field()}}
    <div><span class="text-danger">@error('search') {{$message}} @enderror</span></div>
    <input type="text" name="search" id="">
    <input type="submit" value="submit"class="btn btn-primary">
</form>
<table class="table align-middle mb-0 bg-white">
    <thead class="bg-light">
      <tr>
        <th>Name</th>
        <th>Title</th>
        <th>Address</th>
        <th>NID</th>
        <th>DL number</th>
        <th>Position</th>
        <th></th>
        <th>Action</th>
        <th></th>
      </tr>
    </thead>
    @foreach ($customers as $customer )
    <tbody>
      <tr>
        <td>
          <div class="d-flex align-items-center">
            <img
                src="{{asset('pp/'.$customer->pp)}}"
                alt=""
                style="width: 45px; height: 45px"
                class="rounded-circle"
                />
            <div class="ms-3">
              <p class="fw-bold mb-1">{{ $customer->first_name." ".$customer->last_name}}</p>
              <p class="text-muted mb-0">{{ $customer->username }}</p>
              <p class="text-muted mb-0">{{ $customer->email }}</p>
            </div>
          </div>
        </td>
        <td>
          <p class="fw-normal mb-1">{{ $customer->dob }}</p>
          <p class="text-muted mb-1">{{ $customer->gender}}</p>
          <p class="text-muted mb-1">{{ $customer->phone_number }}</p>
        </td>
        <td>
          <p class="fw-normal mb-1">{{ $customer->address }}</p>
        </td>
        <td>
          <p class="badge badge-success rounded-pill d-inline">{{ $customer->nid_number }}</p>
        </td>
        <td>
          <span class="badge badge-success rounded-pill d-inline">{{ $customer->dl_number }}</span>
        </td>
        <td>{{ $customer->type }}</td>
        <td>
            @if ($customer->block_status==1)
            <h6>Its a block User</h6>
            @else
          <a class="btn btn-primary me-3" href="{{ route('admin edit',['id'=>encrypt($customer->id)]) }}">EDIT</a>
          @endif
        </td>
        <td>
            @if ($customer->block_status==1)
            <h6>Its a block User</h6>

            @else
            <a class="btn btn-primary me-3" href="{{ route('admin block',['id'=>encrypt($customer->id)]) }}">BLOCK</a>
            @endif

        </td>
        <td>
          <a class="btn btn-primary me-3" href="{{ route('admin single user details',['id'=>encrypt($customer->id)]) }}">VIEW</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>

  {{-- <nav aria-label="...">
    <ul class="pagination">
      <li class="page-item disabled">
        <span class="page-link">Previous</span>
      </li>
      <li class="page-item"><a class="page-link" href="#">1</a></li>
      <li class="page-item active" aria-current="page">
        <span class="page-link">2</span>
      </li>
      <li class="page-item"><a class="page-link" href="#">3</a></li>
      <li class="page-item">
        <a class="page-link" href="#">Next</a>
      </li>
    </ul>
  </nav> --}}

  <nav class="pagination">
    <ul class="pagination">
        {{ $customers->links() }}
    </ul>
  </nav>

@endsection


