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

    <section class="home-slider owl-carousel">
        <div class="slider-item"
            style="background-image: url('{{ asset('front_page_elements/img/slider-2.jpg') }}');">

            <div class="container">
                <div class="row slider-text align-items-center">
                    <div class="col-md-7 col-sm-12 element-animate">
                        <h1>We Care For You</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi unde impedit,
                            necessitatibus, soluta sit quam minima expedita atque corrupti reiciendis.</p>
                    </div>
                </div>
            </div>

        </div>

        <div class="slider-item"
            style="background-image: url('{{ asset('front_page_elements/img/slider-1.jpg') }}');">
            <div class="container">
                <div class="row slider-text align-items-center">
                    <div class="col-md-7 col-sm-12 element-animate">
                        <h1>We Provide Health Care Solutions</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi unde impedit,
                            necessitatibus, soluta sit quam minima expedita atque corrupti reiciendis.</p>
                    </div>
                </div>
            </div>

        </div>

    </section>
    <!-- END slider -->


    <section class="container home-feature mb-5">
        <div class="row">
            <div class="col-md-4 p-0 one-col element-animate">
                <div class="col-inner p-xl-5 p-lg-5 p-md-4 p-sm-4 p-4">
                    <span class="icon flaticon-hospital-bed"></span>
                    <h2>Patient Services</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi unde impedit, necessitatibus,
                        soluta sit quam minima expedita atque corrupti reiciendis.</p>
                </div>
                <a href="{{route('registration.patients_registration')}}" class="btn-more">Get Connected</a>
            </div>
            <div class="col-md-4 p-0 two-col element-animate">
                <div class="col-inner p-xl-5 p-lg-5 p-md-4 p-sm-4 p-4">
                    <span class="icon flaticon-doctor"></span>
                    <h2>Doctors Services</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi unde impedit, necessitatibus,
                        soluta sit quam minima expedita atque corrupti reiciendis.</p>
                </div>
                <a href="{{route('registration.doctors_registration')}}" class="btn-more">Get Connected</a>
            </div>
            <div class="col-md-4 p-0 three-col element-animate">
                <div class="col-inner p-xl-5 p-lg-5 p-md-4 p-sm-4 p-4">
                    <span class="icon flaticon-first-aid-kit"></span>
                    <h2>Pharmacy Services</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi unde impedit, necessitatibus,
                        soluta sit quam minima expedita atque corrupti reiciendis.</p>
                </div>
                <a href="{{route('registration.pharmacists_registration')}}" class="btn-more">Get Connected</a>
            </div>
        </div>
    </section>
    <!-- END section -->

    <section class="section stretch-section">
        <div class="container">
            <div class="row justify-content-center mb-5 element-animate">
                <div class="col-md-8 text-center mb-5">
                    <h2 class="text-uppercase heading border-bottom mb-4">Why Choose Us</h2>
                    <p class="mb-0 lead">We provide the opportunities of taking appointment and consulting with doctors, and you will get the digital prescription </p>
                </div>
            </div>
            <div class="row align-items-center">

                <div class="col-md-6 stretch-left-1 element-animate" data-animate-effect="fadeInLeft">
                    <a href="#" class="video"><img src="{{ asset('front_page_elements/img/img_1.jpg') }}"
                            alt="" class="img-fluid"></a>
                </div>
                <div class="col-md-6 stretch-left-1-offset pl-md-5 pl-0 element-animate"
                    data-animate-effect="fadeInLeft">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                            <div class="media d-block media-feature text-center">
                                <span class="icon flaticon-hospital"></span>
                                <div class="media-body">
                                    <h3 class="mt-0 text-black">Amenities</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                            <div class="media d-block media-feature text-center">
                                <span class="icon flaticon-first-aid-kit"></span>
                                <div class="media-body">
                                    <h3 class="mt-0 text-black">Pharmacy Services</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                            <div class="media d-block media-feature text-center">
                                <span class="icon flaticon-hospital-bed"></span>
                                <div class="media-body">
                                    <h3 class="mt-0 text-black">Patient Services</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                            <div class="media d-block media-feature text-center">
                                <span class="icon flaticon-doctor"></span>
                                <div class="media-body">
                                    <h3 class="mt-0 text-black">Expert Doctors</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END section -->

    <section class="section custom-tabs">
        <div class="container">
            <div class="row">

                <div class="col-md-4 border-right element-animate">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home"
                            role="tab" aria-controls="v-pills-home" aria-selected="true"><span>01</span> Amenities</a>
                        <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile"
                            role="tab" aria-controls="v-pills-profile" aria-selected="false"><span>02</span> Pharmacy
                            Services</a>
                        <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages"
                            role="tab" aria-controls="v-pills-messages" aria-selected="false"><span>03</span> Patient
                            Services</a>
                        <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings"
                            role="tab" aria-controls="v-pills-settings" aria-selected="false"><span>04</span> Expert
                            Doctors</a>
                    </div>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-7 element-animate">

                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                            aria-labelledby="v-pills-home-tab">
                            <span class="icon flaticon-hospital"></span>
                            <h2 class="text-primary">Amenities</h2>
                            <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt
                                voluptate, quibusdam sunt iste dolores consequatur</p>
                            <p>Inventore fugit error iure nisi reiciendis fugiat illo pariatur quam sequi quod iusto
                                facilis officiis nobis sit quis molestias asperiores rem, blanditiis! Commodi
                                exercitationem vitae deserunt qui nihil ea, tempore et quam natus quaerat doloremque.
                            </p>
                            <p><a href="#" class="btn btn-primary">Learn More</a></p>
                        </div>
                        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                            aria-labelledby="v-pills-profile-tab">
                            <span class="icon flaticon-first-aid-kit"></span>
                            <h2 class="text-primary">Pharmacy Services</h2>
                            <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                Nesciunt voluptate, quibusdam sunt iste dolores consequatur</p>
                            <p>Inventore fugit error iure nisi reiciendis fugiat illo pariatur quam sequi quod iusto
                                facilis officiis nobis sit quis molestias asperiores rem, blanditiis! Commodi
                                exercitationem vitae deserunt qui nihil ea, tempore et quam natus quaerat doloremque.
                            </p>
                            <p><a href="#" class="btn btn-primary">Learn More</a></p>
                        </div>
                        <div class="tab-pane fade" id="v-pills-messages" role="tabpanel"
                            aria-labelledby="v-pills-messages-tab">
                            <span class="icon flaticon-hospital-bed"></span>
                            <h2 class="text-primary">Patient Services</h2>
                            <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                Nesciunt voluptate, quibusdam sunt iste dolores consequatur</p>
                            <p>Inventore fugit error iure nisi reiciendis fugiat illo pariatur quam sequi quod iusto
                                facilis officiis nobis sit quis molestias asperiores rem, blanditiis! Commodi
                                exercitationem vitae deserunt qui nihil ea, tempore et quam natus quaerat doloremque.
                            </p>
                            <p><a href="#" class="btn btn-primary">Learn More</a></p>
                        </div>
                        <div class="tab-pane fade" id="v-pills-settings" role="tabpanel"
                            aria-labelledby="v-pills-settings-tab">
                            <span class="icon flaticon-doctor"></span>
                            <h2 class="text-primary">Expert Doctors</h2>
                            <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                Nesciunt voluptate, quibusdam sunt iste dolores consequatur</p>
                            <p>Inventore fugit error iure nisi reiciendis fugiat illo pariatur quam sequi quod iusto
                                facilis officiis nobis sit quis molestias asperiores rem, blanditiis! Commodi
                                exercitationem vitae deserunt qui nihil ea, tempore et quam natus quaerat doloremque.
                            </p>
                            <p><a href="#" class="btn btn-primary">Learn More</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END section -->

    <section class="section bg-light">
        <div class="container">
            <div class="row justify-content-center mb-5 element-animate">
                <div class="col-md-8 text-center mb-5">
                    <h2 class="text-uppercase heading border-bottom mb-4">Our Doctors</h2>
                    <p class="mb-0 lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi unde
                        impedit, necessitatibus, soluta sit quam minima expedita atque corrupti reiciendis.</p>
                </div>
            </div>
            <div class="row element-animate">
                <div class="major-caousel js-carousel-1 owl-carousel">
                    @foreach ($doctors as $doctor)
                        <div>
                            <div class="media d-block media-custom text-center">
                                <img src="{{ asset($doctor->doctors_profile_picture->first()->profile_picture) }}"
                                    alt="Image Placeholder" class="img-fluid">
                                <div class="media-body">
                                    <h3 class="mt-0 text-black">{{ $doctor->doctor->first()->first_name }}
                                        {{ $doctor->doctor->first()->last_name }}</h3>
                                    <p>
                                        @foreach ($doctor->doctors_specialities as $speciality)
                                            {{ $speciality->specialist_of }}
                                            @if (!$loop->last)
                                                ,
                                            @endif
                                        @endforeach
                                    </p>
                                    <p>
                                        @foreach ($doctor->social_network as $doctors_social_network)
                                            <a href="{{$doctors_social_network->social_network_link}}" class="p-2"><span class="fa fa-link"></span></a>
                                        @endforeach
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- END slider -->
            </div>
        </div>
    </section>
    <!-- END section -->

    <section class="cover_1" style="background-image: url({{ asset('front_page_elements/img/bg_1.jpg') }});">
        <div class="container">
            <div class="row text-center justify-content-center">
                <div class="col-md-10">
                    <h2 class="heading element-animate">Experience Our Advance Facilities</h2>
                    <p class="sub-heading element-animate mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing
                        elit. Commodi unde impedit, necessitatibus, soluta sit quam minima expedita atque corrupti
                        reiciendis.</p>
                    <p class="element-animate"><a href="{{route('get_connected')}}" class="btn btn-primary btn-lg">Get In Touch</a></p>
                </div>
            </div>
        </div>
    </section>
    <!-- END section -->

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
