<!doctype html>
<html lang="en">

<head>
    <title>Medi+</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300, 400, 700" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('front_page_elements/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('front_page_elements/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('front_page_elements/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front_page_elements/css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('front_page_elements/css/jquery.timepicker.css') }}">

    <link rel="stylesheet" href="{{ asset('front_page_elements/fonts/ionicons/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front_page_elements/fonts/fontawesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front_page_elements/fonts/flaticon/font/flaticon.css') }}">


    <!-- Theme Style -->
    <link rel="stylesheet" href="{{ asset('front_page_elements/css/style.css') }}">
</head>

<body>

    @include('website.includes.header')
    <!-- END header -->
    <section class="home-slider inner-page owl-carousel">
        <div class="slider-item" style="background-image: url({{ asset('front_page_elements/img/slider-2.jpg') }});">

            <div class="container">
                <div class="row slider-text align-items-center">
                    <div class="col-md-7 col-sm-12 element-animate">
                        <h1>Services</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi unde impedit,
                            necessitatibus, soluta sit quam minima expedita atque corrupti reiciendis.</p>
                    </div>
                </div>
            </div>

        </div>

    </section>
    <!-- END slider -->
    <section class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-3 element-animate">
            <div class="media d-block media-feature text-center mb-5">
              <span class="icon flaticon-hospital"></span>
              <div class="media-body">
                <h3 class="mt-0 text-black">Services</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                <p><a href="{{route('login.User_Login')}}" class="btn btn-secondary btn-sm">Get in</a></p>
              </div>
            </div>
          </div>
          <div class="col-md-3 element-animate">
            <div class="media d-block media-feature text-center mb-5">
              <span class="icon flaticon-first-aid-kit"></span>
              <div class="media-body">
                <h3 class="mt-0 text-black">Pharmacy Services</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                <p><a href="{{route('registration.pharmacists_registration')}}" class="btn btn-secondary btn-sm">Get Connected</a></p>
              </div>
            </div>
          </div>
          <div class="col-md-3 element-animate">
            <div class="media d-block media-feature text-center mb-5">
              <span class="icon flaticon-hospital-bed"></span>
              <div class="media-body">
                <h3 class="mt-0 text-black">Patient Services</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                <p><a href="{{route('registration.patients_registration')}}" class="btn btn-secondary btn-sm">Get Connected</a></p>
              </div>
            </div>
          </div>
          <div class="col-md-3 element-animate">
            <div class="media d-block media-feature text-center mb-5">
              <span class="icon flaticon-doctor"></span>
              <div class="media-body">
                <h3 class="mt-0 text-black">Expert Doctors</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                <p><a href="{{route('registration.doctors_registration')}}" class="btn btn-secondary btn-sm">Get Connected</a></p>
              </div>
            </div>
          </div>
        </div>
        <!-- END row -->
      </div>
    </section>

    @include('website.includes.footer')
    <!-- END footer -->

    <script src="{{ asset('front_page_elements/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('front_page_elements/js/popper.min.js') }}"></script>
    <script src="{{ asset('front_page_elements/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('front_page_elements/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('front_page_elements/js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('front_page_elements/js/jquery.timepicker.min.js') }}"></script>
    <script src="{{ asset('front_page_elements/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('front_page_elements/js/main.js') }}"></script>
</body>

</html>
