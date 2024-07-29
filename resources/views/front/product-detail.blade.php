@extends('front.layouts.app')
@section('title', 'Product detail')

@section('content')
    <!-- section-1 -->
    <section class="section-1 categories-section-1 product-detail-section-1">
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

    <!-- product-detail-section-2 -->
    <section class="product-detail-section-2 py">
        <div class="container">
            <div class="row align-items-center">
                @php
                    $product_images = \Illuminate\Support\Facades\DB::table('product_imagess')->where('product_id', $product->id)->get();
                    $product_colors = $product->attributes->where('attribute_id', 11)->pluck('value')->toArray() ?? [];
                    $product_sizes = $product->attributes->where('attribute_id', 12)->pluck('value')->toArray() ?? [];
                @endphp
                <div class="col-lg-2">
                    <div class="product-detail-section-2-img">


                        <div thumbsSlider="" class="swiper mySwiper">
                            <div class="swiper-wrapper product-detail-section-2-img-main-1">
                                <div class="swiper-slide">
                                    <img src="{{asset($product->image)}}" class="img-fluid" />
                                </div>
                                @foreach($product_images as $product_image)
                                    <div class="swiper-slide">
                                        <img src="{{asset($product_image->image)}}" class="img-fluid" />
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 pl-0">
                    <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper mySwiper2">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img src="{{asset($product->image)}}" class="img-fluid" />
                            </div>
                            @foreach($product_images as $product_image)
                                <div class="swiper-slide">
                                    <img src="{{asset($product_image->image)}}" class="img-fluid" />
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>
                <div class="col-lg-5">
                    <div class="product-detail-section-2-text">
                        <h4 class="heading-4">{{$product->product_title}}</h4>
{{--                        <p class="para-1">{{$product->description}}</p>--}}
                        {!! $product->description !!}
                        <div class="product-detail-section-2-text-form">
                            <form method="POST" action="{{ route('save_cart') }}" id="add-cart">
                                @csrf
                                <input type="hidden" name="product_id" id="product_id" value="{{ $product->id }}">

                                <div class="form-row">
                                    @if(count($product_colors))
                                        <div class="form-group col-md-6">
{{--                                            <label for="">Color:</label>--}}
                                            <select id="" class="form-control " required name="color">
                                                <option value="">Select color</option>
                                                @foreach($product_colors as $product_color)
                                                    <option value="{{$product_color}}">{{$product_color}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    @endif
                                    @if(count($product_sizes))
                                        <div class="form-group col-md-6">
{{--                                            <label for="">Size:</label>--}}
                                            <select id="" class="form-control " required name="size">
                                                <option value="">Select size</option>
                                                @foreach($product_sizes as $product_size)
                                                    <option value="{{$product_size}}">{{$product_size}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    @endif
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="">Quantity:</label>
                                        <select id="inputState" class="form-control select-form-4 classic" name="qty" required>
                                            <option selected>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                            <option>6</option>
                                        </select>
                                    </div>
                                </div>
                                <p class="para-1">Subtotal: <span>${{$product->price}}</span></p>
                                <div class="product-detail-section-2-text-anker">
                                    <a href="javascript:;" class="btn custome-btn-1">Add to wishlist</a>
                                    <button type="submit" href="javascript:;" class="btn custome-btn">Add to cart</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="product-detail-section-2-text-bottom">
                        <ul>
                            <li>
                                <p class="para-1">Share:</p>
                            </li>
                            <li><a href="javascript:;"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="javascript:;"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="javascript:;"><i class="fas fa-wifi"></i></a></li>
                            <li><a href="javascript:;"><i class="fab fa-tumblr"></i></a></li>
                            <li><a href="javascript:;"><i class="fab fa-instagram"></i></a></li>
                        </ul>
                        <p class="para-1">Useful links: <a href="javascript:;">FAQ</a> / <a href="javascript:;">Shipping</a>
                            / <a href="javascript:;">Return</a> / <a href="javascript:;">Specifications</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product-detail-section-2 -->

    <!-- product-detail-section-3 -->
    <section class="product-detail-section-3" hidden>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="product-detail-section-3-main">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home"
                                   role="tab" aria-controls="nav-home" aria-selected="true">specifications</a>
                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile"
                                   role="tab" aria-controls="nav-profile" aria-selected="false">Reviews (1)</a>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                 aria-labelledby="nav-home-tab">
                                <div class="product-detail-section-3-main-text">
                                    <div class="main-text">
                                        <ul class="section-3-main-main-text-flex">
                                            <li class="main-text-heading">Product name:</li>
                                            <li class="main-text-para">
                                                <p class="para-1">Product Name Here</p>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="main-text">
                                        <ul class="section-3-main-main-text-flex">
                                            <li class="main-text-heading">SKU:</li>
                                            <li class="main-text-para">
                                                <p class="para-1"> #12345</p>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="main-text">
                                        <ul class="section-3-main-main-text-flex">
                                            <li class="main-text-heading">Components:</li>
                                            <li class="main-text-para">
                                                <p class="para-1"> Lorem ipsum dolor sit
                                                    amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                                                    labore et
                                                    dolore magna aliqua. Ut enim ad
                                                    minim veniam, quis nostrud exercitation</p>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="main-text">
                                        <ul class="section-3-main-main-text-flex">
                                            <li class="main-text-heading">Compability & Materials:</li>
                                            <li class="main-text-para">
                                                <p class="para-1">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
                                                    ad minim veniam, quis nostrud exercitation</p>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="main-text">
                                        <ul class="section-3-main-main-text-flex">
                                            <li class="main-text-heading">Manual:</li>
                                            <li class="main-text-para">
                                                <p class="para-1"> Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                                                    enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                                                    aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit
                                                    in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                                                    Excepteur sint occaecat cupidatat non proident, sunt in culpa qui
                                                    officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde
                                                    omnis iste natus error sit voluptatem accusantium doloremque eaque ipsa Nemo enim ipsam voluptatem
                                                    quia
                                                <div class="main-flex">
                                                    <ul>
                                                        <li>Distributors to evangelize the new line to local markets </li>
                                                        <li>Strategic staircase hard stop good optics </li>
                                                        <li>Iterate experiential intuitive innovate agile driven</li>
                                                    </ul>
                                                    <ul>
                                                        <li>Face time bleeding edge, guerrilla marketing </li>
                                                        <li>Smart carging stand </li>
                                                    </ul>
                                                </div>
                                                </p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                <div class="product-detail-section-3-main-text">
                                    <div class="main-text">
                                        <ul class="section-3-main-main-text-flex">
                                            <li class="main-text-heading">Product name:</li>
                                            <li class="main-text-para">
                                                <p class="para-1">Product Name Here</p>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="main-text">
                                        <ul class="section-3-main-main-text-flex">
                                            <li class="main-text-heading">SKU:</li>
                                            <li class="main-text-para">
                                                <p class="para-1"> #12345</p>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="main-text">
                                        <ul class="section-3-main-main-text-flex">
                                            <li class="main-text-heading">Components:</li>
                                            <li class="main-text-para">
                                                <p class="para-1"> Lorem ipsum dolor sit
                                                    amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                                                    labore et
                                                    dolore magna aliqua. Ut enim ad
                                                    minim veniam, quis nostrud exercitation</p>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="main-text">
                                        <ul class="section-3-main-main-text-flex">
                                            <li class="main-text-heading">Compability & Materials:</li>
                                            <li class="main-text-para">
                                                <p class="para-1">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
                                                    ad minim veniam, quis nostrud exercitation</p>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="main-text">
                                        <ul class="section-3-main-main-text-flex">
                                            <li class="main-text-heading">Manual:</li>
                                            <li class="main-text-para">
                                                <p class="para-1"> Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                                                    enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                                                    aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit
                                                    in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                                                    Excepteur sint occaecat cupidatat non proident, sunt in culpa qui
                                                    officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde
                                                    omnis iste natus error sit voluptatem accusantium doloremque eaque ipsa Nemo enim ipsam voluptatem
                                                    quia
                                                <div class="main-flex">
                                                    <ul>
                                                        <li>Distributors to evangelize the new line to local markets </li>
                                                        <li>Strategic staircase hard stop good optics </li>
                                                        <li>Iterate experiential intuitive innovate agile driven</li>
                                                    </ul>
                                                    <ul>
                                                        <li>Face time bleeding edge, guerrilla marketing </li>
                                                        <li>Smart carging stand </li>
                                                    </ul>
                                                </div>
                                                </p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product-detail-section-3 -->
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('css/inner-01.css')}}">
<style>

</style>
@endsection

@section('js')
<script type="text/javascript"></script>
@endsection