@extends('layouts.admin')
@section('title', 'Add Course')
@section('content')
            
<div class="card" data-color="primary" id="wizardProfile">
  <form action="{{url('admin/course')}}" method="post" enctype="multipart/form-data">
    @csrf

  <div class="card-header mb-0">
    <div class="row">
      <div class="col-md-8">
        <h3 class="card-title text-secondary form-card-title-one"><i class="fa fa-cubes"></i> Add Course</h3>
      </div>
      <div class="card-title col-md-4 text-right form-card-title-two">
        <a href="{{url('admin/course')}}" class="btn btn-sm btn-info card_head_btn"><i class="fa fa-th"></i> All Course</a>
      </div>
      <div class="clearfix"></div>
    </div>
  </div>

  <div class="card-body form-card-body">
    <div class="tab-content">
      <div class="tab-pane show active" id="about">
        <div class="row justify-content-center">
          <div class="col-sm-10">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-file-signature nc-icon nc-single-02"></i></span>
              </div>
              <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Course Name" name="name">

              @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label"></label>
              <div class="col-sm-7">
                <input type="checkbox" class="@error('status') is-invalid @enderror" name="status">
                <span>Published</span>
                @error('status')
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

    <div class="card-footer">
      <div class="pull-right">
        <button type="submit" class="btn btn-fill  btn-dark">Done</button>
      </div>
      <div class="clearfix"></div>
    </div>
  </form>
</div>
          
@endsection
