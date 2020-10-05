@extends('layouts.admin')
@section('title', 'Show User')
@section('content')

<div class="row">
  <div class="col-md-12">
    <div class="card card-user">
      <div class="card-header">
        <div class="row">
          <div class="col-md-8">
            <h3 class="card-title text-secondary table-card-title-one"><i class="fa fa-cubes"></i> Show User</h3>
          </div>
          <div class="card-title col-md-4 text-right table-card-title-two">
            <a href="{{url('admin/user')}}" class="btn btn-sm btn-info card_head_btn"><i class="fa fa-th"></i> All User</a>
          </div>
          <div class="clearfix"></div>
        </div>
      </div>

      <div class="card-body form-card-body">
        <div class="author">
          @if($user->image==true)
          <a href="#">
            <img class="avatar border-gray" src="{{asset('storage/user')}}/{{$user->image}}" alt="...">
          </a>
          @else
            <a href="#">
            <img class="avatar border-gray" src="{{asset('contents/admin')}}/img/default-avatar.png" alt="...">
          </a>
          @endif
          <h5 class="font-weight-bold">{{ $user->name }}</h5>
          <h5>{{$user->email}}</h5>
          <h5>{{$user->roleName->name}}</h5>
          @if($user->status==true)
            <span class="badge bg-primary">Approved</span>
          @else
            <span class="badge bg-danger">Pending</span>
          @endif
        </div>
      </div><!-- end content-->

      <div class="card-footer mt-3">
        <a href="#" class="btn btn-sm btn-primary">PRINT</a>
        <a href="#" class="btn btn-sm btn-warning">PDF</a>
        <a href="#" class="btn btn-sm btn-info">CSV</a>
      </div>

    </div><!--  end card  -->
  </div> <!-- end col-md-12 -->
</div> <!-- end row -->

@endsection
