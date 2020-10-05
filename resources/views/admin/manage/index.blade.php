@extends('layouts.admin')
@section('title', 'Manage')
@section('content')

<div class="row">

  <div class="col-lg-3 col-md-6 col-sm-6 manage-box">
    <div class="card card-stats">
      <div class="card-body ">
        <div class="row">
          <div class="col-5 col-md-4">
            <div class="icon-big text-center icon-warning">
              <i class="fa fa-archive nc-icon nc-globe text-warning"></i>
            </div>
          </div>
          <div class="col-7 col-md-8">
            <div class="numbers">
              <p class="card-category">User Recycle</p>
              <p class="card-title">
                @if($allUserRecycle<=9)
                  0{{$allUserRecycle}}
                @else
                  {{$allUserRecycle}}
                @endif
              <p>
            </div>
          </div>
        </div>
      </div>
      <div class="card-footer ">
        <hr>
        <div class="stats">
          <a class="text-primary" href="{{ url('admin/recycle/user') }}"><i class="fa fa-share-square text-primary"></i> Manage User Recycle</a>
        </div>
      </div>
    </div>
  </div>

  <div class="col-lg-3 col-md-6 col-sm-6 manage-box">
    <div class="card card-stats">
      <div class="card-body ">
        <div class="row">
          <div class="col-5 col-md-4">
            <div class="icon-big text-center icon-warning">
              <i class="fa fa-archive nc-icon nc-globe text-warning"></i>
            </div>
          </div>
          <div class="col-7 col-md-8">
            <div class="numbers">
              <p class="card-category">All User</p>
              <p class="card-title">
                @if($allUser<=9)
                  0{{$allUser}}
                @else
                  {{$allUser}}
                @endif
              <p>
            </div>
          </div>
        </div>
      </div>
      <div class="card-footer ">
        <hr>
        <div class="stats">
          <a class="text-primary" href="{{ url('admin/user') }}"><i class="fa fa-share-square text-primary"></i> Manage All User</a>
        </div>
      </div>
    </div>
  </div>

  <div class="col-lg-3 col-md-6 col-sm-6 manage-box">
    <div class="card card-stats">
      <div class="card-body ">
        <div class="row">
          <div class="col-5 col-md-4">
            <div class="icon-big text-center icon-warning">
              <i class="fa fa-archive nc-icon nc-globe text-warning"></i>
            </div>
          </div>
          <div class="col-7 col-md-8">
            <div class="numbers">
              <p class="card-category">All Teacher</p>
              <p class="card-title">
                @if($allTeacher<=9)
                  0{{$allTeacher}}
                @else
                  {{$allTeacher}}
                @endif
              <p>
            </div>
          </div>
        </div>
      </div>
      <div class="card-footer ">
        <hr>
        <div class="stats">
          <a class="text-primary" href="{{ url('admin/teacher') }}"><i class="fa fa-share-square text-primary"></i> Manage All Teacher</a>
        </div>
      </div>
    </div>
  </div>

  <div class="col-lg-3 col-md-6 col-sm-6 manage-box">
    <div class="card card-stats">
      <div class="card-body ">
        <div class="row">
          <div class="col-5 col-md-4">
            <div class="icon-big text-center icon-warning">
              <i class="fa fa-archive nc-icon nc-globe text-warning"></i>
            </div>
          </div>
          <div class="col-7 col-md-8">
            <div class="numbers">
              <p class="card-category">All Student</p>
              <p class="card-title">
                @if($allStudent<=9)
                  0{{$allStudent}}
                @else
                  {{$allStudent}}
                @endif
              <p>
            </div>
          </div>
        </div>
      </div>
      <div class="card-footer ">
        <hr>
        <div class="stats">
          <a class="text-primary" href="{{ url('admin/student') }}"><i class="fa fa-share-square text-primary"></i> Manage All Student</a>
        </div>
      </div>
    </div>
  </div>

  <div class="col-lg-3 col-md-6 col-sm-6 manage-box">
    <div class="card card-stats">
      <div class="card-body ">
        <div class="row">
          <div class="col-5 col-md-4">
            <div class="icon-big text-center icon-warning">
              <i class="fa fa-archive nc-icon nc-globe text-warning"></i>
            </div>
          </div>
          <div class="col-7 col-md-8">
            <div class="numbers">
              <p class="card-category">All Course</p>
              <p class="card-title">
                @if($allCourse<=9)
                  0{{$allCourse}}
                @else
                  {{$allCourse}}
                @endif
              <p>
            </div>
          </div>
        </div>
      </div>
      <div class="card-footer ">
        <hr>
        <div class="stats">
          <a class="text-primary" href="{{ url('admin/course') }}"><i class="fa fa-share-square text-primary"></i> Manage All Course</a>
        </div>
      </div>
    </div>
  </div>

  <div class="col-lg-3 col-md-6 col-sm-6 manage-box">
    <div class="card card-stats">
      <div class="card-body ">
        <div class="row">
          <div class="col-5 col-md-4">
            <div class="icon-big text-center icon-warning">
              <i class="fa fa-archive nc-icon nc-globe text-warning"></i>
            </div>
          </div>
          <div class="col-7 col-md-8">
            <div class="numbers">
              <p class="card-category">All Seminar</p>
              <p class="card-title">
                @if($allSeminar<=9)
                  0{{$allSeminar}}
                @else
                  {{$allSeminar}}
                @endif
              <p>
            </div>
          </div>
        </div>
      </div>
      <div class="card-footer ">
        <hr>
        <div class="stats">
          <a class="text-primary" href="{{ url('admin/seminar') }}"><i class="fa fa-share-square text-primary"></i> Manage All Seminar</a>
        </div>
      </div>
    </div>
  </div>

</div>
@endsection
