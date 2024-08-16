@extends('front.layouts.app')
@section('title', 'Product detail')

@section('content')
    <!-- section-1 -->
    @php
       $product_images = \Illuminate\Support\Facades\DB::table('product_imagess')->where('product_id', $product->id)->take(3)->get();
        $product_colors = $product->attributes->where('attribute_id', 11)->pluck('value')->toArray() ?? [];
        $product_sizes = $product->attributes->where('attribute_id', 12)->pluck('value')->toArray() ?? [];
    @endphp
    <section class="inner-banner">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <div class="main-info">
                    <div class="row align-items-center">
                        <div class="col-lg-3">
                            <div class="product-detail-section-2-img">
                                <div thumbsSlider="" class="swiper mySwiper">
                                    <div class="swiper-wrapper product-detail-section-2-img-main-1">
                                        <div class="swiper-slide loop_img">
                                            <img src="{{asset($product->image)}}" class="img-fluid" />
                                        </div>
                                        @foreach($product_images as $product_image)
                                            <div class="swiper-slide loop_img">
                                                <img src="{{asset($product_image->image)}}" class="img-fluid" />
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9 p-0">
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
                </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="product-detail-section-2-text">
                        <h4 class="heading-4">{{$product->product_title}}</h4>
                        <small style="font-size: 20px;" class="heading-4">${{$product->price}}</small>
                       {!! str_replace("<p>&nbsp;</p>", "", $product->description) !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- section-1 -->

    <!-- section-2 -->
    <section class="product-detail-section-2 new-product-details py">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="product-detail-section-2-text">
                        <div class="product-detail-section-2-text-form">
                            <form method="POST" action="{{ route('save_cart') }}" id="add-cart">
                                @csrf
                                <input type="hidden" name="product_id" value="{{$product->id}}">

                                <div class="form-row">
                                    @if(count($product_colors))
                                        <div class="form-group col-md-3">
                                            <!-- <label for="">Size:</label> -->
                                            <select id="inputState" class="form-control select-form-3" name="color" required>
                                                <option value="">Select Color</option>
                                                @foreach($product_colors as $product_color)
                                                    <option value="{{$product_color}}">{{$product_color}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    @endif
                                    @if(count($product_sizes))
                                        <div class="form-group col-md-3">
                                            <!-- <label for="">Size:</label> -->
                                            <select id="inputState" class="form-control select-form-3" name="size" required>
                                                <option value="">Select size</option>
                                                @foreach($product_sizes as $product_size)
                                                    <option value="{{$product_size}}">{{$product_size}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    @endif
                                    <div class="form-group col-md-3">
                                        <!-- <label for="">Quantity:</label> -->
                                        <select id="inputState" class="form-control select-form-4 classic" name="qty" required>
                                            <option value="1" selected>Quantity: 1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                        </select>
                                    </div>
                                    <div class="product-detail-section-2-text-anker form-group col-md-3">
                                        <button href="javascript:;" class="btn custome-btn" type="submit">Add to cart</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- section-2 -->

    <!-- section-3 -->
    @if(count($featured_products))
        <section class="section-3 featured-products">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product-detail-section-2-text text-center">
                            <h4 class="heading-4">Featured Products</h4>
                        </div>
                    </div>
                </div>
                <div class="row secton-3-main">
                    @foreach($featured_products as $product)
                        @php
                            $product_images = \Illuminate\Support\Facades\DB::table('product_imagess')->where('product_id', $product->id)->get();
                            $product_colors = $product->attributes->where('attribute_id', 11)->pluck('value')->toArray() ?? [];
                            $product_sizes = $product->attributes->where('attribute_id', 12)->pluck('value')->toArray() ?? [];
                        @endphp
                        <div class="col-lg-4" data-aos="fade-down-right" data-aos-duration="500">
                            <div class="section-3-main-box">
                                <div class="section-3-main-box-img">
                                    <div class="slide-1 owl-carousel owl-theme">
                                        <div class="item">
                                            <div class="section-3-main-img">
                                                <figure><img src="{{asset($product->image)}}" alt="" class="img-fluid"></figure>
                                            </div>
                                        </div>
                                        @foreach($product_images as $product_image)
                                            <div class="item">
                                                <div class="section-3-main-img">
                                                    <figure><img src="{{asset($product_image->image)}}" alt="" class="img-fluid"></figure>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="section-3-main-box-text">
                                    <div class="section-3-main-box-text1">
                                        <a href="{{route('front.productDetail', $product->id)}}">
                                            <p class="para-1 white-color">{{$product->product_title}}</p>
                                        </a>
                                    </div>
                                    <div class="section-3-main-box-text2">
                                        <strong class="white-color">${{$product->price}}</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </section>
    @endif
    <!-- section-3 -->
@endsection

@section('css')
<style>




.mySwiper2 .swiper-slide img {
    height: 300px !important;
    width: 300px !important;
}



.inner-banner .product-detail-section-2-img .loop_img img {
    width: 100px !important;
    height: 100px !important;
}

</style>

@endsection

@section('js')
<script type="text/javascript"></script>
@endsection