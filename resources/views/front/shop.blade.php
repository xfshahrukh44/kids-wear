@extends('front.layouts.app')
@section('title', 'Shop')

@section('styles')
    <style>
        input[type="text"] {
            width: inherit;
            height: 100%;
            background-color: #f5f6f9;
            border: 1px solid var(--silver-color);
            padding-left: 2%;
        }

        span.page-link {
            background-color: #b1e76f !important;
            border: 1px solid #87bd46 !important;
        }

        a.page-link {
            color: #b1e76f !important;
        }
        .section-3-main-img img {
            height: 400px !important;
            object-fit: cover !important;
            width: 400px !important;
        }
    </style>
@endsection

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


    <!-- section-3 -->
    <section class="product-1-section-3 section-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 p-0 product-1-main-width">
                    <div class="product-1-main-section-3-text" data-aos="fade-down" data-aos-duration="500">
                        <p class="para-1">Filter By:</p>
                        <form method="GET" action="{{route('front.shop')}}">
                            <div class="form-row">
                                <div class="form-group col-md-8">
                                    <input type="text" placeholder="Search product" name="search" value="{{request()->get('search')}}">
                                </div>
                                <div class="form-group col-md-2">
                                    <select id="inputState" class="form-control" name="category_id">
                                        <option>Select category</option>
                                        @foreach(\App\Category::all() as $category)
                                            <option value="{{$category->id}}" {!! request()->get('category_id') == $category->id ? 'selected' : '' !!}>{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <button type="submit" class="btn custome-btn">Search</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <div class="row secton-3-main product-1-main-section-3">
                @foreach($products as $product)
                    <div class="col-lg-4" data-aos="fade-down-right" data-aos-duration="500">
                        <a href="{{route('front.productDetail', $product->id)}}">
                            <div class="section-3-main-box">
                                <div class="section-3-main-box-img">
                                    <div class="slide-1 owl-carousel owl-theme">
                                        <div class="item">
                                            <div class="section-3-main-img">
                                                <figure><img src="{{asset($product->image)}}" alt="" class="img-fluid">
                                                </figure>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="section-3-main-box-text">
                                    <div class="section-3-main-box-text1">
                                        <p class="para-1 black-color">
                                            {{$product->product_title}}
                                        </p>

                                    </div>
                                    <div class="section-3-main-box-text2">
                                        <strong class="black-color">${{$product->price}}</strong>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            {{$products->links()}}
        </div>
    </section>
    <!-- section-3 -->
@endsection

@section('css')
<style>

</style>
@endsection

@section('js')
<script type="text/javascript"></script>
@endsection