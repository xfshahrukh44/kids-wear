@extends('front.layouts.app')
@section('title', 'Home')

@section('content')
    @if(env('APP_LOADER') != false)
        <div class="loadermain">
            <img src="{{ asset('images/logo.gif') }}" class="img-fluid" alt="">
        </div>
    @endif

    <!-- section-1 -->
    <section class="section-1">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="section-1-text" data-aos="fade-right" data-aos-duration="500">
                        <h1 class="heading-1"><span class="green-text d-block">Summer</span><span
                                class="purple-text d-block">Fashion</span></h1>
                        <p class="para-1 white-color">{!! $page->sections[7]->value !!}</p>
                        <div class="section-1-text-anker">
                            <a href="{{ route('front.shop') }}" class="btn custome-btn green-btn mr-1">Shop Now</a>
                            <a href="{{ route('contact') }}" class="btn custome-btn purple-btn">Contact us</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="section-1-img" data-aos="fade-left" data-aos-duration="500">
                        <img src="{!! $page->sections[14]->value !!}" class="img-fluid" alt="">
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
                                'Shoes' => asset('images/20240814120439.webp'),
                                'Gloves' => asset('images/20240813113136.webp'),
                                "Gown's and Dresses" => url('images/20240813053822.webp'),
                                "Short Pants & Casual Outfit" => url('images/20240813120007.webp'),
                            ];
                        @endphp
                        @foreach (\App\Category::where('is_featured', 1)->orderBy('name', 'ASC')->get() as $category)
                            <div class="item" data-aos="fade-right" data-aos-duration="500">
                                <a href="{{ route('front.shop', ['category_id' => $category->id]) }}">
                                    <div class="section-2-slider-main">
                                        <div class="section-2-slider-img">
                                            <img src="{{ $category_images_map[$category->name] ?? asset('images/section-2-slider-img-4.png') }}"
                                                alt="" class="img-fluid">
                                            <div class="section-2-slider-main-anker">
                                                <a href="#"
                                                    class="btn custome-btn white-btn mr-1">{{ $category->name }}</a>
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

    <!-- section-3 -->
    <section class="section-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-3-text text-center" data-aos="fade-down" data-aos-duration="500">
                        <h2 class="heading-2 white-color">{!! $page->sections[8]->value !!}</h2>
                    </div>
                </div>
            </div>
            <div class="row secton-3-main">
                @php
                    $products = \App\Product::where('is_featured', 1)->take(6)->get();
                @endphp

                @foreach ($products as $product)
                    <div class="col-lg-4" data-aos="fade-down-right" data-aos-duration="500">
                        <a href="{{ route('front.productDetail', $product->id) }}">
                            <div class="section-3-main-box">
                                <div class="section-3-main-box-img">
                                    <div class="slide-1 owl-carousel owl-theme">
                                        <div class="item">
                                            <div class="section-3-main-img">
                                                <figure><img src="{{ asset($product->image) }}" alt=""
                                                        class="img-fluid"></figure>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="section-3-main-box-text">
                                    <div class="section-3-main-box-text1">
                                        {{--                                    <p class="para-1 white-color">Quarter zip <span class="d-block"></span>pullover --}}
                                        {{--                                        1J311</p> --}}
                                        <p class="para-1 white-color">
                                            {{ $product->product_title }}
                                        </p>
                                        <strong class="white-color">${{ $product->price }}</strong>
                                    </div>
                                    <div class="section-3-main-box-text2">
                                        {{--                                    <ul class="main-box"> --}}
                                        {{--                                        <li><span class="main-color-box red-box"></span></li> --}}
                                        {{--                                        <li><span class="main-color-box white-box"></span></li> --}}
                                        {{--                                        <li><span class="main-color-box yellow-box"></span></li> --}}
                                        {{--                                    </ul> --}}
                                        {{--                                        <ul class="main-icon"> --}}
                                        {{--                                            <li><i class="far fa-heart red-icon"></i></li> --}}
                                        {{--                                            <li><i class="fas fa-lock black-icon"></i></li> --}}
                                        {{--                                        </ul> --}}
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- section-3 -->

    <!-- section-4 -->
    @php
        $static_product = \App\Product::find(97);
    @endphp
    <section class="section-4 py">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6" data-aos="fade-right" data-aos-duration="500">
                    <div class="section-4-text">
                        <div class="section-4-text-main">
                            <span class="green">$ {{$static_product->price}}</span>
{{--                            <span class="silver"><i class="fas fa-heart"></i> 234</span>--}}
                        </div>
                        <h3 class="heading-3">{!! $static_product->product_title !!}</h3>
{{--                        <p class="para-1">{!! $page->sections[10]->value !!}</p>--}}
                        <div class="section-4-text-anker section-4-text-main">
                            <a href="{{ route('front.productDetail', $static_product->id) }}" class="btn custome-btn green-btn mr-1">Shop Now</a>
                            <span class="silver"><i class="fas fa-shopping-bag"></i> Add to Cart</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-left" data-aos-duration="500">
                    <div class="section-4-img">
                        <img src="{!! asset($static_product->image) !!}" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- section-4 -->

{{--    <!-- section-5 -->--}}
{{--    <section class="section-5 py">--}}
{{--        <div class="container-fluid">--}}
{{--            <div class="row">--}}
{{--                <div class="col-lg-12">--}}
{{--                    <div class="section-3-text text-center" data-aos="fade-down" data-aos-duration="500">--}}
{{--                        <h2 class="heading-2 white-color"><span class="d-block">{!! $page->sections[12]->value !!}</h2>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="row secton-3-main p-0">--}}
{{--                @php--}}
{{--                    $products = \App\Product::where('is_best_selling', 1)->take(3)->get();--}}
{{--                @endphp--}}

{{--                @foreach ($products as $product)--}}
{{--                    <div class="col-lg-4" data-aos="fade-down-right" data-aos-duration="500">--}}
{{--                        <a href="{{ route('front.productDetail', $product->id) }}">--}}
{{--                            <div class="section-3-main-box">--}}
{{--                                <div class="section-3-main-box-img">--}}
{{--                                    <div class="slide-1 owl-carousel owl-theme">--}}
{{--                                        <div class="item">--}}
{{--                                            <div class="section-3-main-img">--}}
{{--                                                <figure><img src="{{ asset($product->image) }}" alt=""--}}
{{--                                                        class="img-fluid"></figure>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="section-3-main-box-text">--}}
{{--                                    <div class="section-3-main-box-text1">--}}
{{--                                        --}}{{--                                    <p class="para-1 white-color">Quarter zip <span class="d-block"></span>pullover --}}
{{--                                        --}}{{--                                        1J311</p> --}}
{{--                                        <p class="para-1 white-color">--}}
{{--                                            {{ $product->product_title }}--}}
{{--                                        </p>--}}
{{--                                        <strong class="white-color">${{ $product->price }}</strong>--}}
{{--                                    </div>--}}
{{--                                    <div class="section-3-main-box-text2">--}}
{{--                                        --}}{{--                                    <ul class="main-box"> --}}
{{--                                        --}}{{--                                        <li><span class="main-color-box red-box"></span></li> --}}
{{--                                        --}}{{--                                        <li><span class="main-color-box white-box"></span></li> --}}
{{--                                        --}}{{--                                        <li><span class="main-color-box yellow-box"></span></li> --}}
{{--                                        --}}{{--                                    </ul> --}}
{{--                                        --}}{{--                                        <ul class="main-icon"> --}}
{{--                                        --}}{{--                                            <li><i class="far fa-heart red-icon"></i></li> --}}
{{--                                        --}}{{--                                            <li><i class="fas fa-lock black-icon"></i></li> --}}
{{--                                        --}}{{--                                        </ul> --}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                @endforeach--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
{{--    <!-- section-5 -->--}}

    <!-- section-6 -->
    <section class="section-6 py">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-6-text text-center" data-aos="fade-right" data-aos-duration="500">
                        <h2 class="heading-2 black-color">{!! $page->sections[13]->value !!}</h2>
                    </div>
                </div>
                @foreach (\App\Blog::all()->take(3) as $blog)
                    <div class="col-lg-4">
                        <a href="{{ route('blog_detail', $blog->id) }}">
                            <div class="section-6-main" data-aos="fade-up-right" data-aos-duration="500">
                                <div class="section-6-main-img">
                                    <img src="{{ asset($blog->image) }}" alt="" class="img-fluid">
                                </div>
                                <div class="section-6-main-text">
                                    {{--                                <div class="section-6-main-text-inner"> --}}
                                    {{--                                    <span><i class="fas fa-comment"></i> 15</span> --}}
                                    {{--                                    <span><i class="far fa-heart"></i> 32</span> --}}
                                    {{--                                </div> --}}
                                    <h6 class="heading-6 black-color">{{ $blog->name }}</h6>
                                    <p class="para-1">
                                        {!! $blog->short_detail !!}
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- section-6 -->
@endsection

@section('css')
    <style>

    </style>
@endsection

@section('js')
    <script type="text/javascript"></script>
@endsection
