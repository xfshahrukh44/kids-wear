<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- slider-cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css"
        integrity="sha512-UTNP5BXLIptsaj5WdKFrkFov94lDx+eBvbKyoe1YAfjeRPC+gT5kyZ10kOHCfNZqEui1sxmqvodNUx3KbuYI/A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
        integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- slider-cdn -->

    <!-- font-family -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap" rel="stylesheet">
    <!-- font-family -->

    <!-- font-awasome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- font-awasome -->


    <!-- slider-cdn -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <!-- data-oas -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
        integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        .myaccount-tab-menu.nav a {
            display: block;
            padding: 20px;
            font-size: 16px;
            align-items: center;
            width: 100%;
            font-weight: bold;
            color: black;
            border-radius: 10px;
        }

        .myaccount-tab-menu.nav a i {
            padding-right: 10px;
        }

        .myaccount-tab-menu.nav {
            border: 1px solid;
            border-radius: 10px;
        }

        .myaccount-tab-menu.nav .active,
        .myaccount-tab-menu.nav a:hover {
            background-color: #b1e76f;
            color: white;
        }

        .account-details-form label.required {
            width: 100%;
            font-weight: 500;
            font-size: 18px;
        }

        .account-details-form input {
            border-width: 1px;
            border-color: white;
            border-style: solid;
            padding-left: 15px;
            color: black;
            width: 100%;
            border-radius: 3px;
            background-color: rgb(255, 255, 255);
            height: 52px;
            padding-left: 15px;
            margin-bottom: 30px;
            color: #000000;
            font-size: 15px;
        }

        .account-details-form legend {
            font-family: CottonCandies;
            font-size: 50px;
        }

        .editable {
            position: relative;
        }

        .editable-wrapper {
            position: absolute;
            right: 0px;
            top: -50px;
        }

        .editable-wrapper a {
            background-color: #17a2b8;
            border-radius: 50px;
            width: 35px;
            height: 35px;
            display: inline-block;
            text-align: center;
            line-height: 35px;
            color: white;
            margin-left: 10px;
            font-size: 16px;
        }

        .editable-wrapper a.edit {
            background-color: #007bff;
        }
    </style>
    @yield('styles')
    @yield('css')
    @include('layouts.front.css')
    <!-- data-oas -->

    <title>kids Wear | @yield('title')</title>
    <link rel="icon" href="">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('css/inner-01.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">

    <style>
        html {
            overflow-x: hidden;
            scroll-behavior: smooth;
        }

        @font-face {
            font-family: "Juniory";
            src: url('{{ 'fonts/fonnts.com-Juniory.ttf' }}');
            /* src: url(../font/fonnts.com-Juniory.ttf); */
        }
    </style>

</head>

<body>

    <div id="butter">
        <div class="section-green-color"></div>
        <!-- header -->
        <header>
            <div class="container p-0">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="main-header">
                            <nav class="navbar navbar-expand-lg navbar-light">
                                <a class="navbar-brand logo" href="{{ route('home') }}"><img
                                        src="{{ asset('images/logo.png') }}" class="img-fluid" alt=""></a>
                                <button class="navbar-toggler" type="button" data-toggle="collapse"
                                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                    aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>

                                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                    <ul class="navbar-nav mr-auto main-anker">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('home') }}">Home</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('front.categories') }}">Categories</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('blog') }}">Blogs</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('front.faqs') }}">Faq</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('contact') }}">Contact Us</a>
                                        </li>
                                    </ul>
                                    <form class="form-inline my-2 my-lg-0 header-btn-2"
                                        action="{{ route('front.shop') }}">
                                        <input class="form-control mr-sm-2" type="search" placeholder="Search"
                                            aria-label="Search" value="{{ request()->get('search') }}" name="search">
                                        <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                                        @if (auth()->check())
                                            <a href="{{ route('account') }}" class="btn"><i class="far fa-user"></i>
                                                Account</a>
                                        @else
                                            <a href="{{ route('signin') }}" class="btn"><i
                                                    class="far fa-user"></i> Account</a>
                                        @endif
                                        <a href="{{ route('cart') }}" class="btn"><i
                                                class="fas fa-shopping-cart"></i> Cart</a>
                                    </form>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- header -->

        @yield('content')

        <!-- footer -->
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="footer-text footer-main-icons">
                            <ul>
                                <li><a href="javascript:;"><i class="fas fa-map-marker-alt"></i></a></li>
                                <li>
                                    {{ App\Http\Traits\HelperTrait::returnFlag(519) }}
                                </li>
                            </ul>
                            <ul>
                                <li><a href="javascript:;"><i class="fas fa-envelope"></i></a></li>
                                <li>{{ App\Http\Traits\HelperTrait::returnFlag(218) }}</li>
                            </ul>
                            <ul>
                                <li><a href="javascript:;"><i class="fas fa-phone-alt"></i></a></li>
                                <li>{{ App\Http\Traits\HelperTrait::returnFlag(59) }}</li>
                            </ul>
                        </div>
                    </div>
                    <!-- <div class="col-lg-3  footer-gap">
                    <div class="footer-text">
                        <h6 class="heading-6 white-color">Courses</h6>
                        <ul>
                            <li><a href="javascript:;">Lorem</a></li>
                            <li><a href="javascript:;">Lorem</a></li>
                            <li><a href="javascript:;">Lorem</a></li>
                            <li><a href="javascript:;">Lorem</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="footer-text">
                        <h6 class="heading-6 white-color">Company</h6>
                        <ul>
                            <li><a href="javascript:;">Lorem</a></li>
                            <li><a href="javascript:;">Lorem</a></li>
                            <li><a href="javascript:;">Lorem</a></li>
                            <li><a href="javascript:;">Lorem</a></li>
                        </ul>
                    </div>
                </div> -->
                    <div class="col-lg-6">
                        <div class="footer-text-main">
                            <div class="footer-text">
                                <h6 class="heading-6 white-color">Store</h6>
                                <ul>
                                    <li><a href="{{ route('account') }}">My Account</a></li>
                                    {{--                                    <li><a href="javascript:;">Shipping</a></li> --}}
                                    {{--                                    <li><a href="javascript:;"> Returns & Exchanges</a></li> --}}
                                    <li><a href="{{ route('front.faqs') }}">FAQs</a></li>
                                    {{--                                    <li><a href="javascript:;">Find a Store</a></li> --}}
                                    <li><a href="{{ route('contact') }}">Contact Us</a></li>
                                </ul>
                            </div>
                            <div class="footer-text">
                                <h6 class="heading-6 white-color">Company</h6>
                                <ul>
                                    <li><a href="{{ route('front.shop', ['category_id' => 3]) }}">Women</a></li>
                                    {{--                                    <li><a href="javascript:;"></a></li> --}}
                                    <li><a href="{{ route('front.shop', ['category_id' => 2]) }}"> Men</a></li>
                                    <li><a href="{{ route('front.shop', ['category_id' => 4]) }}"> Kids</a></li>
                                    {{--                                    <li><a href="javascript:;">Gift Card</a></li> --}}
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="footer-text">
                            <h6 class="heading-6 white-color">Join a Newsletter</h6>
                            <div class="footer-text-form">
                                <form id="newForm" action="#">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Your Email</label>
                                        <input type="email" class="form-control" id="newemail"
                                            placeholder="Enter Your Email">
                                    </div>
                                    <button type="submit" class="btn footer-main-from-btn">Subscribe</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="footer-bottom">
                            <div class="footer-bottom-1">
                                <p class="para-1 white-color">{{ App\Http\Traits\HelperTrait::returnFlag(499) }}</p>
                            </div>
                            <div class="footer-bottom-2">
                                <ul>
                                    {{--                                    <li><a href="javascript:;">Dr</a></li> --}}
                                    {{--                                    <li><a href="javascript:;">Bh</a></li> --}}
                                    <li><a href="{{ App\Http\Traits\HelperTrait::returnFlag(1960) }}">Tw</a></li>
                                    <li><a href="{{ App\Http\Traits\HelperTrait::returnFlag(682) }}">Fb</a></li>
                                    <li><a href="{{ App\Http\Traits\HelperTrait::returnFlag(1962) }}">Ig</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- footer -->

    </div>

    <!-- Optional JavaScript; choose one of the two! -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

    <!-- sliver-cdn -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- data oas -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        AOS.init();
    </script>


    <script src="{{ asset('js/script.js') }}"></script>
    <script src="{{ asset('js/butter.js') }}"></script>
    <script>
        // set options when initializing butter.js
        var options = {
            wrapperId: 'customDefaultId',
            wrapperDamper: 100,
            cancelOnTouch: true
        };
        butter.init;

        var swiper = new Swiper(".mySwiper", {
            loop: true,
            spaceBetween: 10,
            slidesPerView: 3,
            freeMode: true,
            watchSlidesProgress: true,
        });
        var swiper2 = new Swiper(".mySwiper2", {
            loop: true,
            spaceBetween: 10,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            thumbs: {
                swiper: swiper,
            },
        });
    </script>
    <script>
        $('#newForm').on('submit', function(e) {
            $('#newsresult').html('');
            e.preventDefault();

            let email = $('#newemail').val();

            $.ajax({
                url: "newsletter-submit",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    newsletter_email: email
                },
                success: function(response) {
                    if (response.status) {
                        toastr.success(response.message);
                    } else {
                        toastr.error(response.message);
                    }
                },
            });
        });
    </script>
    <script>
        @if (session()->has('success'))
            toastr.success("{{ session()->get('success') }}")
        @endif
        @if (session()->has('error'))
            toastr.error("{{ session()->get('error') }}")
        @endif
    </script>
    @yield('scripts')
    @yield('js')
</body>

</html>
