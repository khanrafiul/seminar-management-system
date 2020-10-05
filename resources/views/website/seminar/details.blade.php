@extends('layouts.website')
@section('title','bolg details')
@section('content')
   <section id="about">
       <div class="container">
           <div class="row">
               <div class="about-heading text-center">
                   <h2>Seminar Details</h2>
                   <p><a href="{{url('website')}}">home</a> <i class="fa fa-chevron-right"></i><i class="fa fa-chevron-right"></i> <span>Seminar Details</span></p>
               </div>
           </div>
       </div>
   </section>
   <!-- About Banner End -->

   <!--sweetalert start-->
      @if(Session::has('success'))
          <script>
              swal({ title: "Success!", text: "Seminar request sent successful", timer:3000, icon: "success",});
          </script>
          @endif

          @if(Session::has('error'))
          <script>
              swal({ title: "Opps!", text: "Seminar request sent Failed because you are allready registered this seminar", timer:5000, icon: "warning",});
          </script>
      @endif
    <!--sweetalert end-->

   <!-- Blog-item start -->
   <section id="product-grid-sidebar">
       <div class="container">
           <div class="row" >
            <div class="col-md-2"></div>
               <div class="col-md-8">
                   <div class="row blog-side-bar blog-grid-list blog-details-page">
                       <div class="col-md-12 col-sm-12">
                           <div class="blog-item">
                               <div class="blog-img" align="center">
                                   <img src="{{asset('storage/seminar')}}/{{$allSeminar->image}}" alt="blog-img" class="img-responsive" style="width: 800px; height: 400px;">
                                </div>
                                   <div class="blog-details">

                                    <h4 class="font-rana">Title: <span class="font-shohel">{{$allSeminar->title}}</span></h4>

                                    <h4 class="font-rana">Description: <span class="font-shohel"> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsumas been the duy's stadard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrabled it to make a typeen book.</span></h4>

                                    <h4 class="font-rana">Date: <span class="font-shohel"> {{$allSeminar->date}}</span></h4>

                                    <h4 class="font-rana">Time: <span class="font-shohel"> {{$allSeminar->time}}</span></h4>

                                    <h4 class="font-rana">Speaker: <span class="font-shohel"> {{$allSeminar->seminarTeacher->name}}</span></h4>
                                    
                                    

                                   </div>
                                  
                               </div>
                           </div>

                           <div class="clearfix"></div>
                           <div class="reply-comments">
                               <h3>Registration for this seminar</h3>
                               <form action="{{url('website/seminar/details/'.$allSeminar->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                               <div class="reply-form">
                                   <div class="col-md-6">
                                       <div class="form-group">
                                            <input type="hidden" name="seminar_id" id="" value="{{$allSeminar->id}}">

                                            <input type="text" class="form-control" id="name2" name="name" placeholder="Name" required>
                                        </div>
                                   </div>

                                   <div class="col-md-6">
                                       <div class="form-group">
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="name" name="email" placeholder="Email" required>

                                            @error('email')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                              </span>
                                            @enderror

                                        </div>
                                   </div>

                                   <div class="col-md-6">
                                       <div class="form-group">
                                            <input type="text" class="form-control" id="name" name="phone" placeholder="Phone" required>
                                        </div>
                                   </div>

                                   <div class="col-md-6">
                                       <div class="form-group">
                                            <input type="file" class="form-control"name="image" placeholder="Image" required>
                                        </div>
                                   </div>

                                   <div class="col-md-6">
                                       <div class="form-group">
                                            <select class="form-control selbox" name="admission_status">
                                                <option value="">Select Registration Status</option>
                                                @foreach($allStatus as $value)
                                                <option value="{{ $value->id }}">{{ $value->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                   </div>
                                   
                                   <div class="col-md-12">
                                       <button type="submit" class="btn btn-primary">submit</button>
                                   </div>
                               </div>
                               </form>
                           </div>
                       <div class="clearfix"></div>
                   </div>
                </div>
                <div class="col-md-2"></div>
           </div>
       </div>
   </section>
@endsection
