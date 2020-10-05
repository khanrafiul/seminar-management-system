@extends('layouts.admin')
@section('title', 'Edit Seminar')
@section('content')
            
<div class="card" data-color="primary" id="wizardProfile">
  <form action="{{url('admin/seminar/'.$seminar->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')

  <div class="card-header mb-0">
    <div class="row">
      <div class="col-md-8">
        <h3 class="card-title text-secondary form-card-title-one"><i class="fa fa-cubes"></i> Edit Seminar</h3>
      </div>
      <div class="card-title col-md-4 text-right form-card-title-two">
        <a href="{{url('admin/seminar')}}" class="btn btn-sm btn-info card_head_btn"><i class="fa fa-th"></i> All Seminar</a>
      </div>
      <div class="clearfix"></div>
    </div>
  </div>

  <div class="card-body form-card-body">
    <div class="tab-content">
      <div class="tab-pane show active" id="about">
        <div class="row justify-content-center">
          <div class="col-sm-10">


            <div class="row">
              <label class="col-md-3 col-form-label font-weight-bold">Seminar Title<span class="req_star"> *</span></label>
              <div class="col-md-9">
                <div class="form-group">
                  <input type="text" class="form-control @error('title') is-invalid @enderror" placeholder="Seminar Title" value="{{$seminar->title}}" name="title">

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
                  <input type="text" class="form-control datepicker @error('date') is-invalid @enderror" placeholder="Seminar Date" value="{{$seminar->date}}" name="date">

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
                  <input type="text" class="form-control timepicker @error('time') is-invalid @enderror" placeholder="Seminar Time" value="{{$seminar->time}}" name="time">

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
                  <select class="form-control @error('course') is-invalid @enderror" name="course" disabled>
                    <option value="">Select Course Name</option>
                    @foreach($allCourse as $value)
                      <option value="{{ $value->name }}" {{ $value->name==$seminar->course ? 'selected' : '' }} >{{ $value->name }}</option>
                    @endforeach
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
                    @foreach($allTeacher as $value)
                      <option value="{{ $value->id }}" {{ $value->id==$seminar->teacher_id ? 'selected' : '' }} >{{ $value->name }}</option>
                    @endforeach
                  </select>

                  @error('teacher_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                                
                </div>
              </div>
            </div>

            <div class="row">
              <label class="col-md-3 col-form-label font-weight-bold">Seminar Image<span class="req_star"> *</span></label>
              <div class="col-sm-4">
                <div class="picture-container">
                  <div class="picture">
                    @if($seminar->image==true)
                      <img src="{{asset('storage/seminar')}}/{{$seminar->image}}" class="picture-src" id="wizardPicturePreview" style="height: 75px; width: 75px;" />
                    @else
                      <img src="{{asset('contents/admin')}}/img/default-avatar.png" class="picture-src" id="wizardPicturePreview" style="height: 75px; width: 75px;" />
                    @endif
                    <input type="file" id="wizard-picture" name="image" value="{{old('image')}}">
                  </div>
                </div>
              </div>
            </div>    

            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="card-footer">
      <div class="pull-right">
        <button type="submit" class="btn btn-fill  btn-dark">Update</button>
      </div>
      <div class="clearfix"></div>
    </div>
  </form>
</div>
          
@endsection
