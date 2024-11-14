@extends('front.layouts.app')

@section('css')
    <style>

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
                        <h2>CONTACT US</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="contact-text">

        <div class="container">

            <form class="form_submission" id="contactform" method="post" action="{{ route('contactUsSubmit') }}">

                @csrf

                <div class="row">
                    <div class="col-lg-6">
                        <div class="lable-txt">
                            <label></label>

                            <input type="hidden" value="contact_form" name="form_name">

                            <input placeholder="Name" type="text" name="fname" required class="form-control">
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="lable-txt">
                            <label></label>
                            <input placeholder="Email *" type="text" name="email" required class="form-control">
                        </div>
                    </div>

                    <div class="col-lg-12 mb-4">
                        <div class="lable-txt">
                            <label></label>
                            <input placeholder="Phone Number" type="phone" required class="form-control">
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="lable-txt gap">
                            <textarea name="notes" placeholder="Comment" id="" cols="30" rows="10" required
                                class="form-control"></textarea>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="lable-anker">
                            <button type="submit" class="btn btn-primary mt-2" style="height: 60px;width: 120px;"> Send
                            </button>
                        </div>

                        <br>

                        <div id="contactformsresult"> </div>

                    </div>


                </div>

            </form>



        </div>

    </section>
@endsection

@section('js')
    <script type="text/javascript"></script>
@endsection
