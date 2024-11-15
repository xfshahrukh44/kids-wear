@extends('front.layouts.app')
@section('title', 'Checkout')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css"
        integrity="sha512-wJgJNTBBkLit7ymC6vvzM1EcSWeM9mmOu+1USHaRBbHkm6W9EgM0HY27+UtUaprntaYQJF75rc8gjxllKs5OIQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .payment-accordion img {
            display: inline-block;
            margin-left: 10px;
            background-color: white;
        }

        form#order-place .form-control {
            border-width: 1px;
            border-color: rgb(150, 163, 218);
            border-style: solid;
            border-radius: 8px;
            background-color: transparent;
            height: 54px;
            padding-left: 15px;
            color: black;
        }

        form#order-place textarea.form-control {
            height: auto !important;
        }

        .checkoutPage {
            padding: 50px 0px;
        }

        .checkoutPage .section-heading h3 {
            margin-bottom: 30px;
        }

        .YouOrder {
            background-color: #b1e76f;
            color: white;
            padding: 25px;
            padding-bottom: 2px;
            min-height: 300px;
            border-radius: 3px;
            margin-bottom: 20px;
        }

        .amount-wrapper {
            padding-top: 12px;
            border-top: 2px solid white;
            text-align: left;
            margin-top: 90px;
        }

        .amount-wrapper h2 {
            font-size: 20px;
            display: flex;
            justify-content: space-between;
        }

        .amount-wrapper h3 {
            display: FLEX;
            justify-content: SPACE-BETWEEN;
            font-size: 22px;
            border-top: 2px solid white;
            padding-top: 10px;
            margin-top: 14px;
        }

        .checkoutPage span.invalid-feedback strong {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
            display: block;
            width: 100%;
            font-size: 15px;
            padding: 5px 15px;
            border-radius: 6px;
        }

        .payment-accordion .btn-link {
            display: block;
            width: 100%;
            text-align: left;
            padding: 10px 19px;
            color: black;
        }

        .payment-accordion .card-header {
            padding: 0px !important;
        }

        .payment-accordion .card-header:first-child {
            border-radius: 0px;
        }

        .payment-accordion .card {
            border-radius: 0px;
        }

        .form-group.hide {
            display: none;
        }

        .StripeElement {
            box-sizing: border-box;
            height: 40px;
            padding: 10px 12px;
            border: 1px solid transparent;
            border-radius: 4px;
            background-color: white;
            box-shadow: 0 1px 3px 0 #e6ebf1;
            -webkit-transition: box-shadow 150ms ease;
            transition: box-shadow 150ms ease;
            border-width: 1px;
            border-color: rgb(150, 163, 218);
            border-style: solid;
            margin-bottom: 10px;
        }

        .StripeElement--focus {
            box-shadow: 0 1px 3px 0 #cfd7df;
        }

        .StripeElement--invalid {
            border-color: #fa755a;
        }

        .StripeElement--webkit-autofill {
            background-color: #fefde5 !important;
        }

        div#card-errors {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
            display: block;
            width: 100%;

            font-size: 15px;
            padding: 5px 15px;
            border-radius: 6px;
            display: none;
            margin-bottom: 10px;
        }
    </style>
@endsection
@section('content')
    <section class="Sec-InnerPagesBanner" style="background-image: url({{ asset($page->image) }})">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="InnerPagesBannerHeading">
                        <h1>Checkout</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="form-body checkoutPage">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <div class="col-md-7 col-lg-7 col-sm-7 col-xs-12">
                    <div class="section-heading dark-color">
                        <h3>Personal Information</h3>
                    </div>
                    @if (\Session::has('stripe_error'))
                        <div class="alert alert-danger">
                            {!! \Session::get('stripe_error') !!}
                        </div>
                    @endif
                    <form action="{{ route('order.place') }}" method="POST" id="order-place">
                        @csrf
                        <input type="hidden" name="payment_id" value="" />
                        <input type="hidden" name="payer_id" value="" />
                        <input type="hidden" name="payment_status" value="" />
                        <input type="hidden" name="payment_method" id="payment_method" value="paypal" />
                        <input type="hidden" name="track_id" id="track_id" value="paypal" />
                        @if (Auth::check())
                            <?php $_getUser = DB::table('users')
                                ->where('id', '=', Auth::user()->id)
                                ->first(); ?>
                            <div class="form-group">
                                <input class="form-control" id="first_name" name="first_name"
                                    value="{{ old('first_name') ? old('first_name') : $_getUser->name }}"
                                    placeholder="First Name *" type="text" required>
                                <span class="invalid-feedback fname {{ $errors->first('first_name') ? 'd-block' : '' }}">
                                    <strong>{{ $errors->first('first_name') }}</strong>
                                </span>
                            </div>
                            <div class="form-group">
                                <input class="form-control right" id="phone" placeholder="Phone *" name="phone_no"
                                    type="text" value="{{ old('phone_no') }}" required>
                                <span class="invalid-feedback {{ $errors->first('phone_no') ? 'd-block' : '' }}">
                                    <strong>{{ $errors->first('phone_no') }}</strong>
                                </span>
                            </div>
                            <div class="form-group">
                                <input class="form-control left" name="email" placeholder="Email *" type="email"
                                    value="{{ old('email') ? old('email') : $_getUser->email }}" required>
                                <span class="invalid-feedback {{ $errors->first('email') ? 'd-block' : '' }}">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" id="comment" name="order_notes" placeholder="Order Note" rows="5">{{ old('order_notes') }}</textarea>
                            </div>
                        @else
                            <a href="{{ url('signin') }}" target="_blank" class="runningBtn">Returning customer? Click here
                                to login</a>
                            <div class="form-group">
                                <span class="invalid-feedback fname">
                                    <strong>{{ $errors->first('first_name') }}</strong></span>
                                <input class="form-control right" id="first_name" name="first_name"
                                    value="{{ old('first_name') }}" placeholder="First Name" type="text" required>
                            </div>
                            <div class="form-group">
                                <span class="invalid-feedback lname">
                                    <strong>{{ $errors->first('last_name') }}</strong></span>
                                <input class="form-control left" placeholder="Last Name" name="last_name" id="l-name"
                                    type="text" value="{{ old('last_name') }}" required>
                            </div>
                            <div class="form-group">
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('phone_no') }}</strong></span>
                                <input class="form-control right" placeholder="Phone" name="phone_no" id="phone"
                                    type="text" value="{{ old('phone_no') }}" required>
                            </div>
                            <div class="form-group">
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('email') }}</strong></span>
                                <input class="form-control left" name="email" placeholder="Email" type="email"
                                    value="{{ old('email') }}" required>
                            </div>
                            @if (!Auth::check())
                                <div class="form-group"> <label class="chkbox">
                                        <input type="checkbox" name="create_account" id="create_account"
                                            {{ !empty(old('create_account')) ? 'checked' : '' }}>
                                        Create An Account?</label>

                                </div>

                                <div class="form-group">

                                    <input type="password" class="form-control left" name="password"
                                        placeholder="Password">

                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong></span>
                                </div>
                                <div class="form-group">

                                    <input type="password" class="form-control right" name="confirm_password"
                                        placeholder="Confirm Password">
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('confirm_password') }}</strong></span>

                                </div>
                            @endif
                            <div class="form-group">
                                <textarea class="form-control" id="comment" name="order_notes" placeholder="Order Note" rows="5"></textarea>
                            </div>
                        @endif

                        <fieldset id="fedexfieldset">
                            <legend>Shipping Address</legend>
                            <div class="form-group">
                                <input class="form-control" type="text" id="searchTextField" name="googleaddress"
                                    placeholder="Type Your Address" onchange="initialize()">
                            </div>
                            <div id="addressdiv">
                                <input type="hidden" name="fedex-checker" value="0" id="fedex-checker">
                                <div class="form-group">
                                    <input class="form-control" type="text" id="country" name="country"
                                        value="" placeholder="Country" required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="text" type="text" id="address"
                                        name="address_line_1" value="" placeholder="Street Address" required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="text" id="city" name="city"
                                        value="" placeholder="City" required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="text" id="postal" name="postal_code"
                                        value="" placeholder="Postal Code" required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="text" id="state" name="state"
                                        value="" placeholder="State Code" required>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <span id="error" class="text-danger" style="display: none"></span>
                                <div id="loader" style="display:none">
                                    <img src="{{ asset('images/loader.gif') }}">
                                </div>
                                <div id="servicesdiv" class="mb-35" style="display: none">


                                </div>
                            </div>


                        </fieldset>
                    </form>
                </div>
                <div class="col-md-5 col-lg-5 col-sm-5 col-xs-12">
                    <div class="section-heading dark-color">
                        <h3>YOUR ORDER</h3>
                    </div>
                    <div class="YouOrder">
                        <?php $subtotal = 0;
                        $addon_total = 0;
                        $variation = 0; ?>
                        @foreach ($cart as $key => $value)
                            <h5>{{ $value['name'] }} x {{ $value['qty'] }}
                                <span>${{ $value['baseprice'] * $value['qty'] }}</span>
                            </h5>
                            <?php $subtotal += $value['baseprice'] * $value['qty'];
                            $variation += $value['variation_price'];
                            ?>
                        @endforeach
                        <div class="amount-wrapper">
                            <h2>Item Subtotal <span>${{ $subtotal }}</span></h2>
                            <h2> Variation <span>{{ $variation }}</span></h2>
                            <h3> Total Price <span>${{ $subtotal + $variation }}</span></h3>
                        </div>
                    </div>
                    <div id="accordion" class="payment-accordion">
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h5 class="mb-0">
                                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne"
                                        aria-expanded="true" aria-controls="collapseOne" data-payment="paypal">
                                        Pay with Paypal <img src="{{ asset('images/paypal.png') }}" width="60"
                                            alt="">
                                    </button>
                                </h5>
                            </div>

                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                data-parent="#accordion">
                                <div class="card-body">
                                    <input type="hidden" name="price" value="{{ $subtotal }}" />
                                    <input type="hidden" name="product_id" value="" />
                                    <input type="hidden" name="qty" value="value['qty']" />
                                    <div id="paypal-button-container-popup"></div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingTwo">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapsed" data-toggle="collapse"
                                        data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"
                                        data-payment="stripe">
                                        Pay with Credit Card <img src="{{ asset('images/payment1.png') }}" alt=""
                                            width="150">
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion"
                                style=" display: block; ">
                                <div class="card-body">
                                    <div class="stripe-form-wrapper require-validation"
                                        data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" data-cc-on-file="false">
                                        <div id="card-element"></div>
                                        <div id="card-errors" role="alert"></div>
                                        <div class="form-group">
                                            <button class="btn btn-red btn-block" type="button" id="stripe-submit">Pay
                                                Now ${{ number_format($subtotal + $shipping + $totalPrice, 2) }}</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>

                    <button type="submit" class="hvr-wobble-skew" style="display:none">place order</button>
                    <!--   <a class="PaymentMethod-a" id="paypal-button-container-popup" href="#" style="display:none"></a> -->
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyDvh8npnQNdrlU-Ct_gwwHAaMBBDsJQtag">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"
        integrity="sha512-zlWWyZq71UMApAjih4WkaRpikgY9Bz1oXIW5G0fED4vk14JjGlQ1UmkGM392jEULP8jbNMiwLWdM8Z87Hu88Fw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://www.paypalobjects.com/api/checkout.js"></script>
    <script src="https://js.stripe.com/v3/"></script>

    <script>
        $("#searchTextField").keydown(function() {
            // $('#fedex-checker').val(0);
            // $('#accordion').slideUp();
            // $('#addressdiv').slideUp();
            // $('#desctax').slideUp();
            // $('#othertaxli').slideUp();
            // $('#cataxli').slideUp();
            // $("#shippingdiv").slideUp();
        })

        function initialize() {
            var input = document.getElementById('searchTextField');
            var autocomplete = new google.maps.places.Autocomplete(input);
            google.maps.event.addListener(autocomplete, 'place_changed', function() {
                var place = autocomplete.getPlace();
                console.log(place);
                var searchAddressComponents = place.address_components,
                    searchPostalCode = "",
                    searchAddress = "",
                    searchCity = "",
                    searchState = "",
                    searchCountryName = "",
                    searchCountryCode = "";

                $.each(searchAddressComponents, function() {
                    if (this.types[0] == "postal_code") {
                        searchPostalCode = this.short_name;
                    }
                    if (this.types[0] == "route") {
                        searchAddress = this.short_name;
                    }
                    if (this.types[0] == "locality") {
                        searchCity = this.short_name;
                    }
                    if (this.types[0] == "administrative_area_level_1") {
                        searchState = this.short_name;
                    }
                    if (this.types[0] == "country") {
                        searchCountryName = this.long_name;
                        searchCountryCode = this.short_name;
                    }
                });

                var addressArray = place.adr_address.split(',')

                var country = searchCountryCode;
                var city = searchCity;
                var address = searchAddress;
                var state = searchState;

                var postalcode = searchPostalCode;
                $('#country').val(searchCountryCode);
                $('#country-code').val(searchCountryName);

                // $('#country option[value="' + country.toString() + '"]').prop('selected', true);
                $('#city').val(city);
                $('#address').val(address);
                $('#state').val(state);
                $('#postal').val(postalcode);
                $('#addressdiv').slideDown();
                $('#fedex-checker').val(1);


            });
        }
    </script>


    <script>
        // $(document).on('click', ".btn", function(e){
        //   $('#order-place').submit();
        // });

        $('#accordion .btn-link').on('click', function(e) {
            if (!$(this).hasClass('collapsed')) {
                e.stopPropagation();
            }
            $('#payment_method').val($(this).attr('data-payment'));
        });

        $('.bttn').on('change', function() {
            var count = 0;
            if ($(this).prop("checked") == true) {
                if ($('#first_name').val() == "") {
                    $('.fname').text('first name is required field');
                } else {
                    $('.fname').text("");
                    count++;
                }
                if ($('#l-name').val() == "") {
                    $('.lname').text('last name is required field');
                } else {
                    $('.lname').text("");
                    count++;
                }

                if (count == 2) {
                    $('#paypal-button-container-popup').show();
                } else {
                    $(this).prop("checked", false);

                    $.toast({
                        heading: 'Alert!',
                        position: 'bottom-right',
                        text: 'Please fill the required fields before proceeding to pay',
                        loaderBg: '#ff6849',
                        icon: 'error',
                        hideAfter: 5000,
                        stack: 6
                    });

                    return false;

                }

            } else {
                $('#paypal-button-container-popup').hide();
                // $('.btn').show();
            }

            $('input[name="' + this.name + '"]').not(this).prop('checked', false);
            //$(this).siblings('input[type="checkbox"]').prop('checked', false);
        });

        paypal.Button.render({
            env: 'sandbox', //production

            style: {
                label: 'checkout',
                size: 'responsive',
                shape: 'rect',
                color: 'gold'
            },
            client: {
                sandbox: 'AV06KMdIerC8pd6_i1gQQlyVoIwV8e_1UZaJKj9-aELaeNXIGMbdR32kDDEWS4gRsAis6SRpUVYC9Jmf',
                // production:'ARIYLCFJIoObVCUxQjohmqLeFQcHKmQ7haI-4kNxHaSwEEALdWABiLwYbJAwAoHSvdHwKJnnOL3Jlzje',
            },
            validate: function(actions) {
                actions.disable();
                paypalActions = actions;
            },

            onClick: function(e) {
                var errorCount = checkEmptyFileds();

                if (errorCount == 1) {
                    $.toast({
                        heading: 'Alert!',
                        position: 'bottom-right',
                        text: 'Please fill the required fields before proceeding to pay',
                        loaderBg: '#ff6849',
                        icon: 'error',
                        hideAfter: 5000,
                        stack: 6
                    });
                    paypalActions.disable();
                } else {
                    paypalActions.enable();
                }
            },
            payment: function(data, actions) {
                return actions.payment.create({
                    payment: {
                        transactions: [{
                            amount: {
                                total: {{ number_format(((float) $subtotal), 2, '.', '') }},
                                currency: 'USD'
                            }
                        }]
                    }
                });
            },
            onAuthorize: function(data, actions) {
                return actions.payment.execute().then(function() {
                    // generateNotification('success','Payment Authorized');

                    $.toast({
                        heading: 'Success!',
                        position: 'bottom-right',
                        text: 'Payment Authorized',
                        loaderBg: '#ff6849',
                        icon: 'success',
                        hideAfter: 1000,
                        stack: 6
                    });

                    var params = {
                        payment_status: 'Completed',
                        paymentID: data.paymentID,
                        payerID: data.payerID
                    };

                    // console.log(data.paymentID);
                    // return false;
                    $('input[name="payment_status"]').val('Completed');
                    $('input[name="payment_id"]').val(data.paymentID);
                    $('input[name="payer_id"]').val(data.payerID);
                    $('input[name="payment_method"]').val('paypal');
                    $('#order-place').submit();
                });
            },
            onCancel: function(data, actions) {
                var params = {
                    payment_status: 'Failed',
                    paymentID: data.paymentID
                };
                $('input[name="payment_status"]').val('Failed');
                $('input[name="payment_id"]').val(data.paymentID);
                $('input[name="payer_id"]').val('');
                $('input[name="payment_method"]').val('paypal');
            }
        }, '#paypal-button-container-popup');


        var stripe = Stripe('{{ env('STRIPE_KEY') }}');

        // Create an instance of Elements.
        var elements = stripe.elements();
        var style = {
            base: {
                color: '#32325d',
                lineHeight: '18px',
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                    color: '#aab7c4'
                }
            },
            invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
            }
        };
        var card = elements.create('card', {
            style: style
        });
        card.mount('#card-element');

        card.addEventListener('change', function(event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                $(displayError).show();
                displayError.textContent = event.error.message;
            } else {
                $(displayError).hide();
                displayError.textContent = '';
            }
        });

        var form = document.getElementById('order-place');

        $('#stripe-submit').click(function() {
            stripe.createToken(card).then(function(result) {
                var errorCount = checkEmptyFileds();
                if ((result.error) || (errorCount == 1)) {
                    // Inform the user if there was an error.
                    if (result.error) {
                        var errorElement = document.getElementById('card-errors');
                        $(errorElement).show();
                        errorElement.textContent = result.error.message;
                    } else {
                        $.toast({
                            heading: 'Alert!',
                            position: 'bottom-right',
                            text: 'Please fill the required fields before proceeding to pay',
                            loaderBg: '#ff6849',
                            icon: 'error',
                            hideAfter: 5000,
                            stack: 6
                        });
                    }
                } else {
                    // Send the token to your server.
                    stripeTokenHandler(result.token);
                }
            });
        });

        $('#stripe-submit2').on('click', function(e) {
            if (
                $('#amount').val() == "" ||
                $('#card_number').val() == "" ||
                $('#expiration_month').val() == "" ||
                $('#expiration_year').val() == "" ||
                $('#cvv').val() == ""
            ) {
                alert('Please enter valid card information');

                return false;
            }

            if (!document.getElementById('order-place').checkValidity()) {
                e.preventDefault();

                return document.getElementById('order-place').reportValidity();
            }

            $.ajax({
                url: '{{ route('initiate-clover-payment') }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    amount: $('#amount').val(),
                    number: $('#card_number').val(),
                    exp_month: $('#expiration_month').val(),
                    exp_year: $('#expiration_year').val(),
                    cvc: $('#cvv').val(),
                    first_name: $('#first_name').val(),
                    phone: $('#phone').val(),
                    address_line_1: $('#address').val(),
                    city: $('#city').val(),
                    state: $('#state').val(),
                    postal_code: $('#postal_code').val(),
                    country: $('#country').val(),
                },
                success: (data) => {
                    let data2 = JSON.parse(data);
                    if (data2.success) {
                        toastr.success(data2.message);

                        // setTimeout(() => {
                        $('#track_id').val(data2.data.tracking_number);
                        $('#order-place').submit();
                        // }, 2000);
                    } else {
                        toastr.error(data2.errors[0]);
                        return false;
                    }
                },
                error: (e) => {
                    toastr.error(e);
                    return false;
                }
            });
        });

        function stripeTokenHandler(token) {
            // Insert the token ID into the form so it gets submitted to the server
            var form = document.getElementById('order-place');
            var hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'stripeToken');
            hiddenInput.setAttribute('value', token.id);
            form.appendChild(hiddenInput);
            form.submit();
        }


        function checkEmptyFileds() {
            var errorCount = 0;
            $('form#order-place').find('.form-control').each(function() {
                if ($(this).prop('required')) {
                    if (!$(this).val()) {
                        $(this).parent().find('.invalid-feedback').addClass('d-block');
                        $(this).parent().find('.invalid-feedback strong').html('Field is Required');
                        errorCount = 1;
                    }
                }
            });
            return errorCount;
        }
    </script>
@endsection
