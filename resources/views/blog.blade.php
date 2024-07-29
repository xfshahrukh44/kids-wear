@extends('front.layouts.app')

@section('css')
    <style>
        .opt-sec3-text {
            padding: 0px 20px;
            padding-bottom: 20px;
            margin-bottom: 30px;
        }

        .opt-sec3-text p {
            font-size: 18px;
            font-weight: 600;
            color: black;
            margin: 0;
            padding-bottom: 5px;
        }

        .opt-sec3-text span {
            font-size: 14px;
            font-weight: 500;
            color: black;
            margin: 0;
            padding-bottom: 5px;
        }
    </style>
@endsection


@section('content')

<!-- ============================================================== -->
<!-- BODY START HERE -->
<!-- ============================================================== -->

 
<section class="heading-sec">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="inner-headings">
                    <h2>BLOGS</h2>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section3 for-inner">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <!-- <div class="sec3-text">
                        <h1 data-aos="zoom-in">Recent BLogs</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                            eiusmod tempor incididunt ut labore</p>
                    </div> -->
            </div>


            @if(!count($blog))
                <div class="col-lg-12 col-md-12 col-12 text-center my-5">
                    No items found.
                </div>
            @endif
            @foreach($blog as $key => $val_blog)
            <div class="col-lg-4 col-md-6 col-12">
                <div class="opt-sec3-main" data-aos="fade-up" data-aos-duration="3000">
                    <a href="{{ route('blog_detail',['id' => $val_blog->id]) }}">
                        <div class="opt-sec3-img" style="">
                            <figure>
{{--                                <img src="{{asset($val_blog->image)}}" alt="" style="height:100%; width:100%;">--}}
                                <img src="{{asset($val_blog->image)}}" alt="" style="max-width: 300px;">
                            </figure>
                        </div>
                        <div class="opt-sec3-text" style="background-color: white;">
                            <p> {{ $val_blog->name }} </p>
                            <span> {!! $val_blog->short_detail !!} </span>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach


          
        </div>
    </div>
</section>


@endsection

@section('js')
<script type="text/javascript"></script>
@endsection