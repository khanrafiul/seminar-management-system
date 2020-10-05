@extends('layouts.admin')
@section('title', 'All Seminar')
@section('content')

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <div class="row">
          <div class="col-md-8">
            <h3 class="card-title text-secondary table-card-title-one"><i class="fa fa-cubes"></i> All Seminar</h3>
          </div>
          <div class="card-title col-md-4 text-right table-card-title-two">
            <a href="{{url('admin/seminar/create')}}" class="btn btn-sm btn-info card_head_btn"><i class="fa fa-th"></i> Add Seminar</a>
          </div>
          <div class="clearfix"></div>
        </div>
      </div>

      <div class="card-body form-card-body">
        <table id="datatable" class="table table-striped table-bordered table-hover table-dark" cellspacing="0" width="100%">
          <thead>
            <tr class="text-center">
              <th>Seminar Code</th>
              <th>Seminar Title</th>
              <th>Seminar Date</th>
              <th>Seminar Time</th>
              <th>Seminar Course</th>
              <th>Seminar Teacher</th>
              <th>Total Student</th>
              <!-- <th>Seminar Status</th> -->
              <th class="disabled-sorting">Actions</th>
            </tr>
          </thead>
          
          @foreach ($allSeminar as $key => $value)
          <tbody>
            <tr class="text-center">
              <td>{{$value->code}}</td>
              <td>{{$value->title}}</td>
              <td>{{$value->date}}</td>
              <td>{{$value->time}}</td>
              <td>{{$value->course}}</td>
              <td>{{$value->seminarTeacher->name}}</td>
              <td>
                @php
                  $id=$value->id;
                  $total=App\Student::where('seminar_id',$id)->count();
                  echo $total;
                @endphp
              </td>
              <!-- <td>
                @if($value->status==true)
                  <span class="badge bg-primary">Published</span>
                @else
                  <span class="badge bg-danger">Unpublished</span>
                @endif
              </td> -->
              <td>
                <a href="{{ url('admin/seminar/'.$value->id) }}" class="btn btn-info btn-link btn-icon btn-sm like"><i class="fa fa-eye"></i></a>

                <a href="{{ url('admin/seminar/'.$value->id.'/edit') }}" class="btn btn-warning btn-link btn-icon btn-sm edit"><i class="fa fa-edit"></i></a>

                <a class="seminardelete btn btn-danger btn-link btn-icon btn-sm remove"data-seminardelete="{{url('admin/seminar/'.$value->id)}}" data-toggle="modal" data-target="#exampleModalDelete"><i class="fa fa-trash-alt"></i></a>
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

<!-- Modal for hard delete -->
<div class="modal fade" id="exampleModalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="" method="post" id="seminardelete">
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
