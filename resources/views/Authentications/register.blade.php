<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    @include('layouts.head')

    <link rel="stylesheet" href="{{asset('bootstrap-4.1.3/')}}/dist/css/bootstrap.css">

</head>

<body>

    @include('layouts.header')

    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Register</h1>
                    <nav class="d-flex align-items-center">
                        <a href="{{ route('welcome') }}">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="{{ route('register') }}">Register</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!--================Login Box Area =================-->
    <section class="login_box_area section_gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="login_box_img">
                        <img class="img-fluid" src="{{ asset('karma_template/') }}/img/login.jpg" alt="">
                        <div class="hover">
                            <h4>New to our website?</h4>
                            <p>There are advances being made in science and technology everyday, and a good example of
                                this is the</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="login_form_inner">
                        <h3>Register to enter</h3>
                        @include('layouts.messages')
                        <form class="row login_form" action="{{ route('registered') }}" method="post" id="contactForm"
                            novalidate="novalidate">
                            @csrf
                            <div class="col-md-12 form-group">
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Username" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Username'" required>
                            </div>
                            <div class="col-md-12 form-group">
                                <input type="text" class="form-control" id="email" name="email"
                                    placeholder="Email" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Email'" required>
                            </div>
                            <div class="col-md-12 form-group ">
                                <select name="phone_country_code" class="col-md-4" id="phone_country_code">
                                    @if (isset($country_codes))
                                        <option value="{{ $country_codes->first()->code }}">
                                            {{ $country_codes->first()->country }}({{ $country_codes->first()->code }})
                                        </option>

                                        @foreach ($country_codes as $code)
                                            @if ($country_codes[0] != $code)
                                                <option value="{{ $code->code }}">
                                                    {{ $code->country }}({{ $code->code }})</option>
                                            @endif
                                        @endforeach
                                    @endif
                                </select>
                                <input type="text" class="form-control col-md-8" id="phone_number" name="phone_number"
                                onfocus="this.placeholder = ''" placeholder="Phone Number"
                                onblur="this.placeholder = 'Phone Number'">
                            </div>
                            <div class="col-md-12 form-group">
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Password" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Password'" required>
                            </div>
                            <div class="col-md-12 form-group">
                                <input type="password" class="form-control" id="passwordA" name="password_confirmation"
                                    placeholder="Password Again" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Password Again'" required>
                            </div>

                            <div class="col-md-12 form-group">
                                <button type="submit" value="submit" class="primary-btn">Register</button>
                                <a href="{{route('login')}}">Login?</a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Login Box Area =================-->

    @include('layouts.footer')

    @include('layouts.scripts')

    <script src="{{asset('bootstrap-4.1.3/')}}/dist/js/bootstrap.bundle.js"></script>


</body>

</html>
