@extends('layouts.admin')
@section('title', 'Show Course')
@section('content')

<div class="row">
  <div class="col-md-12">
    <div class="card card-user">
      <div class="card-header">
        <div class="row">
          <div class="col-md-8">
            <h3 class="card-title text-secondary table-card-title-one"><i class="fa fa-cubes"></i> Show Course</h3>
          </div>
          <div class="card-title col-md-4 text-right table-card-title-two">
            <a href="{{url('admin/course')}}" class="btn btn-sm btn-info card_head_btn"><i class="fa fa-th"></i> All Course</a>
          </div>
          <div class="clearfix"></div>
        </div>
      </div>

      <div class="card-body">
        <div class="row">
            <div class="col-md-1"></div>
              <div class="col-md-10">
                <table class="table table-striped table-bordered table-hover font-weight-bold view-table-custom">
                  <tr>
                    <td>Course Name</td>
                    <td>:</td>
                    <td>{{$course->name}}</td>
                  </tr>

                  <tr>
                    <td>Total Seminar</td>
                    <td>:</td>
                    <td>
                      @php
                        $name=$course->name;
                        $total=App\Seminar::where('status',1)->where('course',$name)->count();
                        echo $total;
                      @endphp
                    </td>
                  </tr>

                  <tr>
                    <td>Course Status</td>
                    <td>:</td>
                    <td>
                      @if($course->status==true)
                        <span class="badge bg-primary">Published</span>
                      @else
                        <span class="badge bg-danger">Pending</span>
                      @endif
                    </td>
                  </tr>

                </table>
              </div>
            <div class="col-md-1"></div>
        </div>
      </div>

      <div class="card-footer mt-3">
        <a href="#" class="btn btn-sm btn-primary">PRINT</a>
        <a href="#" class="btn btn-sm btn-warning">PDF</a>
        <a href="#" class="btn btn-sm btn-info">CSV</a>
      </div>

    </div><!--  end card  -->
  </div> <!-- end col-md-12 -->
</div> <!-- end row -->

@endsection
