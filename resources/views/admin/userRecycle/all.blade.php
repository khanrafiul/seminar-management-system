@extends('layouts.admin')
@section('title', 'All Recycle User')
@section('content')

<div class="row">
  <div class="col-md-12">
    <div class="card form-card">
      <div class="card-header">
        <div class="row">
          <div class="col-md-8">
            <h3 class="card-title text-secondary table-card-title-one"><i class="fa fa-cubes"></i> All Recycle User</h3>
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
          @foreach ($allRecycleUser as $key => $value)
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

                <a href="{{ url('admin/recycle/user/show/'.$value->id) }}" class="btn btn-info btn-link btn-icon btn-sm like"><i class="fa fa-eye"></i></a>

                <a class="userrestore btn btn-warning btn-link btn-icon btn-sm like" data-userrestore="{{ url('admin/recycle/user/restore/'.$value->id) }}" data-toggle="modal" data-target="#exampleModalRestore"><i class="fa fa-recycle fa-lg"></i></a>

                <a class="harddelete btn btn-danger btn-link btn-icon btn-sm remove"data-harddelete="{{url('admin/recycle/user/delete/'.$value->id)}}" data-toggle="modal" data-target="#exampleModalDelete"><i class="fa fa-trash-alt"></i></a>

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


<!-- Modal for user restore -->
<div class="modal fade" id="exampleModalRestore" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="" method="post" id="userrestore">
        @csrf
        @method('get')
        <div class="modal-header">
          <h5 class="modal-title text-danger font-weight-bold" id="exampleModalLabel"> Are you sure! </h5>
        </div>
        <div class="modal-body">
            <p class="font-weight-bold text-center" >Do you really want to restore user?</p>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-info" data-dismiss="modal">No, Cancel</button>
              <button type="submit" class="btn btn-danger">Yes, Restore</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal for Delete -->
<div class="modal fade" id="exampleModalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="" method="post" id="harddelete">
        @csrf
        @method('delete')
        <div class="modal-header">
          <h5 class="modal-title text-danger font-weight-bold" id="exampleModalLabel"> Are you sure! </h5>
        </div>
        <div class="modal-body">
          <p class="font-weight-bold text-center">Do you really want to permanently delete these records?</p>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-info" data-dismiss="modal">No, Cancel</button>
          <button type="submit" class="btn btn-danger">Yes, Delete</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
