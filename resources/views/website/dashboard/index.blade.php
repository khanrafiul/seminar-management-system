@extends('layouts.website')

@section('content')
<section id="banner-category">
    <div class="container">
        <div class="row">
            <div class="col-md-12 ">
               <div class="banner">
                   <i class="fa fa-chevron-left prv-arrow"></i>
                   <i class="fa fa-chevron-right nxt-arrow"></i>
                    <div class="banner2-main">
                        <div class="banner2-item" style="background:url({{asset('contents/website')}}/images/banner1.jpg) center no-repeat;">
                            <div class="banner2-text text-center">
                                <h3>Best Seminar</h3>
                                <h2>Web Design And Developing</h2>
                            </div>
                        </div>
                        <div class="banner2-item" style="background:url({{asset('contents/website')}}/images/banner2.jpg) center no-repeat;">
                            <div class="banner2-text text-center">
                                <h3>Best Seminar</h3>
                                <h2>Laravel</h2>
                            </div>
                        </div>
                        <div class="banner2-item" style="background:url({{asset('contents/website')}}/images/banner2.jpg) center no-repeat;">
                            <div class="banner2-text text-center">
                                <h3>Best Seminar</h3>
                                <h2>Python</h2>
                            </div>
                        </div>
                        <div class="banner2-item" style="background:url({{asset('contents/website')}}/images/banner2.jpg) center no-repeat;">
                            <div class="banner2-text text-center">
                                <h3>Best Seminar</h3>
                                <h2>Java</h2>
                            </div>
                        </div>
                    </div>
               </div>
            </div>
        </div>
    </div>
</section>
<!-- Banner2 Part End -->

<section id="newest">
   <div class="container">
       <div class="row">
            <div class="heading4 text-center">
               <h2>Our Seminar</h2>
            </div>

           <div class="newest-main">

            @foreach($allSeminar as $seminar)
               <div class="col-md-4 col-sm-4 mt-3">
                   <div class="newest-item">
                       <img src="{{asset('storage/seminar')}}/{{$seminar->image}}" alt="newest1" class="img-responsive" style="height: 350px; width: 500px;">
                       <div class="overlay1 text-center">
                           <h3>{{$seminar->title}}</h3>
                           <h3>{{$seminar->date}}</h3>
                           <h3>{{$seminar->time}}</h3>
                           <a href="{{ url('website/seminar/details/'.$seminar->id) }}">Registration</a>
                       </div>
                   </div>
               </div>
           @endforeach

           </div>
       </div>
   </div>
</section>

@endsection
