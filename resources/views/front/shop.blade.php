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
                                <div class="form-group col-md-2">
                                    <input type="text" placeholder="Search product" name="search" value="{{request()->get('search')}}">
                                </div>
                                <div class="form-group col-md-2">
                                    <select id="inputState" class="form-control" name="age_by">
                                        <option value="">Age by</option>
                                        <option value="1" {!! (request()->get('age_by') == '1') ? 'selected' : '' !!}>1</option>
                                        <option value="2" {!! (request()->get('age_by') == '2') ? 'selected' : '' !!}>2</option>
                                        <option value="3" {!! (request()->get('age_by') == '3') ? 'selected' : '' !!}>3</option>
                                        <option value="4" {!! (request()->get('age_by') == '4') ? 'selected' : '' !!}>4</option>
                                        <option value="5" {!! (request()->get('age_by') == '5') ? 'selected' : '' !!}>5</option>
                                        <option value="6" {!! (request()->get('age_by') == '6') ? 'selected' : '' !!}>6</option>
                                        <option value="7" {!! (request()->get('age_by') == '7') ? 'selected' : '' !!}>7</option>
                                        <option value="8" {!! (request()->get('age_by') == '8') ? 'selected' : '' !!}>8</option>
                                        <option value="9" {!! (request()->get('age_by') == '9') ? 'selected' : '' !!}>9</option>
                                        <option value="10" {!! (request()->get('age_by') == '10') ? 'selected' : '' !!}>10</option>
                                        <option value="11" {!! (request()->get('age_by') == '11') ? 'selected' : '' !!}>11</option>
                                        <option value="12" {!! (request()->get('age_by') == '12') ? 'selected' : '' !!}>12</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <select id="inputState" class="form-control" name="order_by">
                                        <option value="">Price</option>
                                        <option value="ASC" {!! (request()->get('order_by') == 'ASC') ? 'selected' : '' !!}>Lowest to highest</option>
                                        <option value="DESC" {!! (request()->get('order_by') == 'DESC') ? 'selected' : '' !!}>Highest to lowest</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <select id="inputState" class="form-control" name="title_order_by">
                                        <option value="ASC" {!! (request()->get('title_order_by') == 'ASC') ? 'selected' : '' !!}>A - Z</option>
                                        <option value="DESC" {!! (request()->get('title_order_by') == 'DESC') ? 'selected' : '' !!}>Z - A</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <select id="inputState" class="form-control" name="category_id">
                                        <option value="">Select category</option>
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
            {{$products->withQueryString()->links()}}
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