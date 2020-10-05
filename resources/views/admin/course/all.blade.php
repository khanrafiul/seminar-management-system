@extends('layouts.admin')
@section('title', 'All Course')
@section('content')

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <div class="row">
          <div class="col-md-8">
            <h3 class="card-title text-secondary table-card-title-one"><i class="fa fa-cubes"></i> All Course</h3>
          </div>
          <div class="card-title col-md-4 text-right table-card-title-two">
            <a href="{{url('admin/course/create')}}" class="btn btn-sm btn-info card_head_btn"><i class="fa fa-th"></i> Add Course</a>
          </div>
          <div class="clearfix"></div>
        </div>
      </div>

      <div class="card-body form-card-body">
        <table id="datatable" class="table table-striped table-bordered table-hover table-dark" cellspacing="0" width="100%">
          <thead>
            <tr class="text-center">
              <th>Course Name</th>
              <th>Total Seminar</th>
              <!-- <th>Course Status</th> -->
              <th class="disabled-sorting">Actions</th>
            </tr>
          </thead>
          
          @foreach ($allCourse as $key => $value)
          <tbody>
            <tr class="text-center">
              <td>{{$value->name}}</td>
              <td>
                @php
                  $name=$value->name;
                  $total=App\Seminar::where('status',1)->where('course',$name)->count();
                  echo $total;
                @endphp
              </td>
              <!-- <td>
                @if($value->status==true)
                  <span class="badge bg-primary">Published</span>
                @else
                  <span class="badge bg-danger">Pending</span>
                @endif
              </td> -->
              <td>
                <a href="{{ url('admin/course/'.$value->id) }}" class="btn btn-info btn-link btn-icon btn-sm like"><i class="fa fa-eye"></i></a>

                <a href="{{ url('admin/course/'.$value->id.'/edit') }}" class="btn btn-warning btn-link btn-icon btn-sm edit"><i class="fa fa-edit"></i></a>

                <a class="coursedelete btn btn-danger btn-link btn-icon btn-sm remove"data-coursedelete="{{url('admin/course/'.$value->id)}}" data-toggle="modal" data-target="#exampleModalDelete"><i class="fa fa-trash-alt"></i></a>
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
      <form action="" method="post" id="coursedelete">
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

<!-- Modal for Add Seminar -->
<!-- <div class="modal fade bd-example-modal-lg" id="addSeminar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <form class="form-horizontal" method="post" id="loangiven" action="{{url('admin/loan/given/create')}}">
        {{csrf_field()}}
      <div class="modal-header">
          <h5 class="modal-title text-danger font-weight-bold" id="exampleModalLabel"> Add New Seminar </h5>
      </div>
      <div class="modal-body ">
        <div class="popup_box_input">
          <div class="card-body form-card-body">
            <div class="tab-content">
              <div class="tab-pane show active" id="about">
                <div class="row justify-content-center">
                  <div class="col-sm-10">

                    <div class="row">
                      <label class="col-md-3 col-form-label font-weight-bold">Seminar Title<span class="req_star"> *</span></label>
                      <div class="col-md-9">
                        <div class="form-group">
                          <input type="text" class="form-control @error('title') is-invalid @enderror" placeholder="Seminar Title" value="{{old('title')}}" name="title">

                          @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                                        
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <label class="col-md-3 col-form-label font-weight-bold">Seminar Date<span class="req_star"> *</span></label>
                      <div class="col-md-9">
                        <div class="form-group">
                          <input type="text" class="form-control datepicker @error('date') is-invalid @enderror" placeholder="Seminar Date" value="{{old('date')}}" name="date">

                          @error('date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                                        
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <label class="col-md-3 col-form-label font-weight-bold">Seminar Time<span class="req_star"> *</span></label>
                      <div class="col-md-9">
                        <div class="form-group">
                          <input type="text" class="form-control timepicker @error('time') is-invalid @enderror" placeholder="Seminar Time" value="{{old('time')}}" name="time">

                          @error('time')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                                        
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <label class="col-md-3 col-form-label font-weight-bold">Course Name<span class="req_star"> *</span></label>
                      <div class="col-md-9">
                        <div class="form-group">
                          <select class="form-control @error('course') is-invalid @enderror" name="course">
                            <option value="">Select Course Name</option>
                          
                            <option value="{{$value->id}}" {{ $value->name==$value->initial ? 'selected' : '' }}> 
                            {{$value->initial}} </option>
                                             
                          </select>

                          @error('course')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                                        
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <label class="col-md-3 col-form-label font-weight-bold">Teacher Name<span class="req_star"> *</span></label>
                      <div class="col-md-9">
                        <div class="form-group">
                          <select class="form-control @error('teacher_id') is-invalid @enderror" name="teacher_id">
                            <option value="">Select Teacher/Mentor Name</option>
                            
                              <option value=""></option>
                            
                          </select>

                          @error('teacher_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                                        
                        </div>
                      </div>
                    </div>    

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-sm btn-primary btn-fill btnu">Done</button>
        <button type="button" class="btn btn-sm btn-default btn-fill btnu" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
  </div>
</div> -->
@endsection
