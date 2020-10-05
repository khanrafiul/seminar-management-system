@extends('layouts.admin')
@section('title', 'Show Seminar')
@section('content')

<div class="row">
  <div class="col-md-12">
    <div class="card card-user">
      <div class="card-header">
        <div class="row">
          <div class="col-md-8">
            <h3 class="card-title text-secondary table-card-title-one"><i class="fa fa-cubes"></i> Show Seminar</h3>
          </div>
          <div class="card-title col-md-4 text-right table-card-title-two">
            <a href="{{url('admin/seminar')}}" class="btn btn-sm btn-info card_head_btn"><i class="fa fa-th"></i> All Seminar</a>
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
                    <td>Seminar Code</td>
                    <td>:</td>
                    <td>{{$seminar->code}}</td>
                  </tr>

                  <tr>
                    <td>Seminar Title</td>
                    <td>:</td>
                    <td>{{$seminar->title}}</td>
                  </tr>

                  <tr>
                    <td>Seminar Date</td>
                    <td>:</td>
                    <td>{{$seminar->date}}</td>
                  </tr>

                  <tr>
                    <td>Seminar Time</td>
                    <td>:</td>
                    <td>{{$seminar->time}}</td>
                  </tr>

                  <tr>
                    <td>Seminar Course</td>
                    <td>:</td>
                    <td>{{$seminar->course}}</td>
                  </tr>

                  <tr>
                    <td>Seminar Teacher</td>
                    <td>:</td>
                    <td>{{$seminar->seminarTeacher->name}}</td>
                  </tr>

                  <tr>
                    <td>Course Status</td>
                    <td>:</td>
                    <td>
                      @if($seminar->status==true)
                        <span class="badge bg-primary">Published</span>
                      @else
                        <span class="badge bg-danger">Pending</span>
                      @endif
                    </td>
                  </tr>

                  <tr>
                    <td>Total Requested Student</td>
                    <td>:</td>
                    <td>
                      @php
                        $id=$seminar->id;
                        echo $total=App\Student::where('seminar_id',$id)->count();
                      @endphp
                    </td>
                  </tr>

                  <tr>
                    <td>Student Reports</td>
                    <td>:</td>
                    <td>
                        <strong>
                              Very Interested:(
                              <span style="color:green;">
                                @php
                                    echo $total=App\Student::where('seminar_id',$id)->where('admission_status',1)->count();
                                @endphp
                             </span>
                             ) ,
                             Interested:(
                             <span style="color:#800000;">
                               @php
                                   echo $total=App\Student::where('seminar_id',$id)->where('admission_status',2)->count();
                               @endphp
                              </span>
                              ) ,

                              Not Interested:(
                              <span style="color:red;">
                                @php
                                  echo $total=App\Student::where('seminar_id',$id)->where('admission_status',3)->count();
                                @endphp
                              </span>
                              ) ,
                      </strong>
                    </td>
                  </tr>

                </table>

                <table class="table table-striped table-bordered table-hover font-weight-bold view-table-custom">
                  <tr>
                    <td>Requested Student Name and Email</td>
                    <td>:</td>
                    <td>
                      @php
                        $id=$seminar->id;
                        $total=App\Student::where('seminar_id',$id)->get();
                      @endphp
                      @foreach($total as $value)
                        <span style="font-size: 12px; font-weight: normal;">
                          <span style="font-weight: bold;">Name: </span>{{$value->name}},
                          <span style="font-weight: bold;">Email: </span> {{$value->email}} <br>
                        </span>
                      @endforeach
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
