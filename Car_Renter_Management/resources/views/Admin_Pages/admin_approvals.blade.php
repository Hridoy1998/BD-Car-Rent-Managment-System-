@extends('Admin_Pages.Admin_nav.admin_nav')
@section('admin_main')
<H1>APPROVALS</H1>
<div class="col-md-10 col-lg-7 col-xl-12">

    <table class="table align-middle mb-0 bg-white">
<thead class="bg-light">
  <tr>
    <th>Renter Name</th>
    <th>Customer Name</th>
    <th>Service ID</th>
    <th>Rent Price</th>
    <th>Actions</th>
  </tr>
</thead>

<tbody>
@foreach ($c_user as $c_user )
  <tr>
    <td>
      <div class="d-flex align-items-center">


        <div class="ms-3">
          <p class="fw-bold mb-1">{{$c_user->renter_name}}</p>
        </div>
      </div>
    </td>
    <td>
    <p class="text-muted mb-0">{{$c_user->customer_name}}</p>


    </td>
    <td>
    <p class="text-muted mb-0">{{$c_user->service_id}}</p>

    </td>
    <td>
    <p class="text-muted mb-0">{{$c_user->rent_price}}</p>

    </td>
    <td>
      <a href="{{ route('single_approvals_details',['id'=>$c_user->id]) }}" class="btn btn-primary">Details</a>

    </td>
    <td>
      <form action="{{ route('approv_delete') }}" method="post">
      {{@csrf_field()}}
          <input type="hidden" value="{{$c_user->id}}" name="id">

    <button type="submit" class="btn btn-danger">Decline</button>
    </form>
    </td>
    <td>
      <form action="{{ route('approv_add') }}" method="post">
      {{@csrf_field()}}
          <input type="hidden" value="{{$c_user->id}}" name="id">

    <button type="submit" class="btn btn-danger">Approve</button>
    </form>

    </td>
  </tr>

  @endforeach
</tbody>
</table>
    </div>
@endsection
