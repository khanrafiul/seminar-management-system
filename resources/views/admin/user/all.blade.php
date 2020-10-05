@extends('layouts.admin')
@section('title', 'All User')
@section('content')

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <div class="row">
          <div class="col-md-8">
            <h3 class="card-title text-secondary table-card-title-one"><i class="fa fa-cubes"></i> All User</h3>
          </div>
          <div class="card-title col-md-4 text-right table-card-title-two">
            <a href="{{url('admin/user/create')}}" class="btn btn-sm btn-info card_head_btn"><i class="fa fa-th"></i> Add users</a>
          </div>
          <div class="clearfix"></div>
        </div>
      </div>

      <div class="card-body form-card-body">
        <table id="datatable" class="table table-striped table-bordered table-dark" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th>Name</th>
              <th>Email</th>
              <th>User Role</th>
              <th>User Image</th>
              <th>Status</th>
              <th class="disabled-sorting">Actions</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>Name</th>
              <th>Email</th>
              <th>User Role</th>
              <th>User Image</th>
              <th>Status</th>
              <th class="disabled-sorting">Actions</th>
            </tr>
          </tfoot>
          @foreach ($allUser as $key => $value)
          <tbody>
            <tr>
              <td>{{$value->name}}</td>
              <td>{{$value->email}}</td>
              <td>{{$value->roleName->name}}</td>
              <td>
                @if($value->image==true)
                  <img src="{{ asset('storage/user') }}/{{ $value->image }}" height="30px" width="30px" />
                @else
                  <img src="{{asset('contents/admin')}}/img/default-avatar.png" height="30px" width="30px" />
                @endif
              </td>
              <td>
                @if($value->status==true)
                  <span class="badge bg-primary">Approved</span>
                @else
                  <span class="badge bg-danger">Pending</span>
                @endif
              </td>
              <td>

                <a class="userapprove userreject btn btn-success btn-link btn-icon btn-sm like" data-userstatus="{{ url('admin/user/status/'.$value->id) }}" data-toggle="modal" 
                @if($value->status==true)
                  data-target="#exampleModalReject"
                @else
                  data-target="#exampleModalApprove"
                @endif>

                @if($value->status==true)
                  <i class="fa fa-times"></i>
                @else
                  <i class="fa fa-check"></i>
                @endif</a>

                <a href="{{ url('admin/user/'.$value->id) }}" class="btn btn-info btn-link btn-icon btn-sm like"><i class="fa fa-eye"></i></a>

                <a href="{{ url('admin/user/'.$value->id.'/edit') }}" class="btn btn-warning btn-link btn-icon btn-sm edit"><i class="fa fa-edit"></i></a>

                <a class="softdelete btn btn-danger btn-link btn-icon btn-sm remove"data-softdelete="{{url('admin/user/'.$value->id)}}" data-toggle="modal" data-target="#exampleModalDelete"><i class="fa fa-trash-alt"></i></a>

              </td>
            </tr>
          </tbody>
          @endforeach
        </table>
      </div><!-- end content-->

      <div class="card-footer">
        <a href="#" class="btn btn-sm btn-primary">PRINT</a>
        <a href="#" class="btn btn-sm btn-warning">PDF</a>
        <a href="#" class="btn btn-sm btn-info">CSV</a>
      </div>

    </div><!--  end card  -->
  </div> <!-- end col-md-12 -->
</div> <!-- end row -->


<!-- Modal for approve -->
<div class="modal fade" id="exampleModalApprove" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="" method="post" id="userapprove">
        @csrf
        @method('put')
        <div class="modal-header">
          <h5 class="modal-title font-weight-bold" id="exampleModalLabel"> <p class="text-danger"> Are you sure! </h5>
        </div>
        <div class="modal-body">
            <p class="text-danger font-weight-bold">Do you really want to approve user request?</p>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-info" data-dismiss="modal">No, Cancel</button>
              <button type="submit" class="btn btn-danger">Yes, Approve</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal for rejected -->
<div class="modal fade" id="exampleModalReject" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="" method="post" id="userreject">
        @csrf
        @method('put')
        <div class="modal-header">
          <h5 class="modal-title font-weight-bold" id="exampleModalLabel"> <p class="text-danger"> Are you sure! </h5>
        </div>
        <div class="modal-body">
            <p class="text-danger font-weight-bold">Do you really want to reject user request?</p>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-info" data-dismiss="modal">No, Cancel</button>
              <button type="submit" class="btn btn-danger">Yes, Reject</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal for soft delete -->
<div class="modal fade" id="exampleModalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="" method="post" id="softdelete">
        @csrf
        @method('delete')
        <div class="modal-header">
          <h5 class="modal-title text-danger font-weight-bold" id="exampleModalLabel"> Are you sure! </h5>
        </div>
        <div class="modal-body">
          <p class="font-weight-bold">Do you really want to move recycle bin these records?</p>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-info" data-dismiss="modal">No, Cancel</button>
          <button type="submit" class="btn btn-danger">Yes, Move</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
