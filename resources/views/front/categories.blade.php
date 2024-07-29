@extends('front.layouts.app')
@section('title', 'Categories')

@section('content')
    <!-- section-1 -->
    <section class="section-1 categories-section-1">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="section-1-text" data-aos="fade-right" data-aos-duration="500">
                        <h1 class="heading-1"><span class="green-text d-block">Summer</span><span
                                    class="purple-text d-block">Fashion</span></h1>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="section-1-img" data-aos="fade-left" data-aos-duration="500">
                        <img src="{{asset('images/section-1-img-1.png')}}" class="img-fluid" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- section-1 -->

    <!-- section-2 -->
    <section class="section-2 py">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-2-slider owl-carousel owl-theme">
                        @php
                            $category_images_map = [
                                'Men' => asset('images/section-2-slider-img-2.png'),
                                'Women' => asset('images/section-2-slider-img-1.png'),
                                'Kids' => asset('images/section-2-slider-img-3.png'),
                                'Other' => asset('images/section-2-slider-img-4.png'),
                            ];
                        @endphp
                        @foreach(\App\Category::all() as $category)
                            <div class="item" data-aos="fade-right" data-aos-duration="500">
                                <a href="{{route('front.shop', ['category_id' => $category->id])}}">
                                    <div class="section-2-slider-main">
                                        <div class="section-2-slider-img">
                                            <img src="{{$category_images_map[$category->name] ?? asset('images/section-2-slider-img-4.png')}}" alt="" class="img-fluid">
                                            <div class="section-2-slider-main-anker">
                                                <a href="#" class="btn custome-btn white-btn mr-1">{{$category->name}}</a>
                                            </div>
                                        </div>

                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- section-2 -->
@endsection

@section('css')
<style>

</style>
@endsection

@section('js')
<script type="text/javascript"></script>
@endsection