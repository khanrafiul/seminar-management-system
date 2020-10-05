@extends('layouts.admin')
@section('title', 'Add Teacher')
@section('content')
            
<div class="card card-wizard" data-color="primary" id="wizardProfile">
  <form action="{{url('admin/teacher')}}" method="post" enctype="multipart/form-data">
    @csrf

  <div class="card-header mb-0">
    <div class="row">
      <div class="col-md-8">
        <h3 class="card-title text-secondary form-card-title-one"><i class="fa fa-cubes"></i> Add Teacher</h3>
      </div>
      <div class="card-title col-md-4 text-right form-card-title-two">
        <a href="{{url('admin/teacher')}}" class="btn btn-sm btn-info card_head_btn"><i class="fa fa-th"></i> All Teacher</a>
      </div>
      <div class="clearfix"></div>
    </div>
  </div>

  <div class="card-body form-card-body">
    <div class="tab-content">
      <div class="tab-pane show active" id="about">
        <h5 class="info-text font-weight-bold"> Let's start with the basic information</h5>
        <div class="row justify-content-center">
          <div class="col-sm-4">
            <div class="picture-container">
              <div class="picture">
                <img src="{{asset('contents/admin')}}/img/default-avatar.png" class="picture-src" id="wizardPicturePreview" title="" />
                <input type="file" id="wizard-picture" name="image" value="{{old('image')}}">
              </div>
              <h6 class="description">Choose Picture</h6>
            </div>
          </div>

          <div class="col-sm-6">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-file-signature nc-icon nc-single-02"></i></span>
              </div>
              <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Name (required)" name="name" value="{{old('name')}}">

              @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-envelope-square nc-icon nc-circle-10"></i></span>
              </div>
              <input type="email" placeholder="Email (required)" class="form-control @error('email') is-invalid @enderror" name="email" value="{{old('email')}}">

              @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-phone nc-icon nc-circle-10"></i></span>
              </div>
              <input type="text" placeholder="Phone (required)" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{old('phone')}}">

              @error('phone')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-book nc-icon nc-circle-10"></i></span>
              </div>
              <select class="form-control @error('course') is-invalid @enderror" name="course">
                <option value="">Select Course Name</option>
                @foreach($allCourse as $value)
                  <option value="{{ $value->id }}">{{ $value->name }}</option>
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
        </div>
      </div>
    </div>

    <div class="card-footer">
      <div class="pull-right">
        <button type="submit" class="btn btn-fill  btn-dark">Done</button>
      </div>
      <div class="clearfix"></div>
    </div>
  </form>
</div>
          
@endsection
