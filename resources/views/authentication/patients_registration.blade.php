<!DOCTYPE html>
<html lang="en">
<!-- header -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Advanced form elements</title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('../../plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('../../plugins/daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('../../plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('../../plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('../../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('../../plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('../../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('../../plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('../../plugins/bs-stepper/css/bs-stepper.min.css') }}">
    <link rel="stylesheet" href="{{ asset('../../plugins/dropzone/min/dropzone.min.css') }}">
    <link rel="stylesheet" href="{{ asset('../../dist/css/adminlte.min.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>

    <script src="{{ asset('../../node_modules/jquery/dist/jquery.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
</head>

<body class="hold-transition sidebar-mini">
    <form action="{{ route('registration.register_patient') }}" method="post" enctype="multipart/form-data"
        autocomplete="off">
        @csrf
        <div class="wrapper">
            @include('authentication.includes.nav_for_patient')
            <hr>
            <section class="content">
                <div class="container-fluid">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            {{ session('status') }}
                        </div>
                    @elseif(session('failed'))
                        <div class="alert alert-danger" role="alert">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            {{ session('failed') }}
                        </div>
                    @endif
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card card-default">
                        <div class="card-header">
                            <h3 class="card-title"></h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>First Name</label>
                                        <input type="text" name="first_name" class="form-control" style="width: 100%;"
                                            value="{{ old('first_name') }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Last Name</label>

                                        <input type="text" name="last_name" class="form-control" style="width: 100%;"
                                            value="{{ old('last_name') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Fathers Name</label>

                                        <input type="text" name="fathers_name" class="form-control"
                                            style="width: 100%;" value="{{ old('fathers_name') }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Mothers Name</label>
                                        <input type="text" name="mothers_name" class="form-control"
                                            style="width: 100%;" value="{{ old('mothers_name') }}">
                                    </div>
                                </div>
                            </div>
                            <h5></h5>
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Gender</label>
                                        <select name="gender_id" class="form-control select2 select2-danger"
                                            data-dropdown-css-class="select2-danger" style="width: 100%;"
                                            value="{{ old('gender_id') }}">

                                            <option selected="selected">Select a gender</option>
                                            @foreach ($genders as $gender)
                                                <option value="{{ $gender->id }}">{{ $gender->gender }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Date of Birth:</label>
                                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                            <input type="text" name="date_of_birth"
                                                class="form-control datetimepicker-input" data-target="#reservationdate"
                                                value="{{ old('date_of_birth') }}" />
                                            <div class="input-group-append" data-target="#reservationdate"
                                                data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            Visit <a href="https://select2.github.io/">Select2 documentation</a> for more examples and
                            information about
                            the plugin.
                        </div>
                    </div>
                    <script>
                        function previewFile(input) {
                            var file = $("input[type=file]").get(0).files[0];
                            if (file) {
                                var reader = new FileReader();
                                reader.onload = function() {
                                    $("#previewImg").attr("src", reader.result);
                                }
                                reader.readAsDataURL(file);
                            }
                        }
                    </script>
                    <div class="row">
                        <div class="col-md-6">
                            <div id="app">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Add Address</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="country">Country</label>
                                            <select class="form-control" id="country" v-model="countries_id"
                                                name="country_id" value="{{ old('country_id') }}">
                                                <option value="">--Select--</option>
                                                @foreach ($countries as $country)
                                                    <option @click="fetchData({{ $country->id }})"
                                                        value="{{ $country->id }}">
                                                        {{ $country->country }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group" v-if="cities_values.length">
                                            <label for="city">City</label>
                                            <select class="form-control" name="city_id" id="cities_id"
                                                v-model="cities_id" value="{{ old('city_id') }}">
                                                <option value="">--Select--</option>
                                                <option @click="fetchDataForCity(city.id)" v-for="city in cities_values"
                                                    v-bind:value="city.id">
                                                    @{{ city . city }}
                                                </option>
                                            </select>
                                        </div>
                                        <div class="form-group" v-if="thanas_values.length">
                                            <label for="thana">Thana</label>
                                            <select class="form-control" name="thana_id" id="thanas_id"
                                                v-model="thanas_id" value="{{ old('thana_id') }}">
                                                <option value="">--Select--</option>
                                                <option v-for="thana in thanas_values"
                                                    @click="fetchDataForThana(thana.id)" v-bind:value="thana.id">
                                                    @{{ thana . thana }}
                                                </option>
                                            </select>
                                            <br>
                                        </div>
                                        <div class="form-group" v-if="areas_values.length">
                                            <label for="area">Area</label>
                                            <select class="form-control" name="area_id" id="areas_id"
                                                v-model="areas_id" value="{{ old('areas_id') }}">
                                                <option value="">--Select--</option>
                                                <option v-for="area in areas_values" v-bind:value="area.id">
                                                    @{{ area . area }}
                                                </option>
                                            </select>
                                            <br>
                                            <label for="address">Address/Home No</label>
                                            <input type="text" name="address" class="form-control" id="address"
                                                placeholder="Add Address" v-model="address"
                                                value="{{ old('address') }}">
                                            <br>
                                            <label for="zip_code">Zip Code</label>
                                            <input type="text" name="zip_code" class="form-control" id="zip_code"
                                                placeholder="Add Zip Code" v-model="zip_code"
                                                value="{{ old('zip_code') }}">
                                        </div>
                                        <div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div id="application">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Add Permanent Address</h3>
                                    </div>
                                    <div class="card-body">

                                        <div class="form-group">
                                            <label for="country">Country</label>
                                            <select class="form-control" id="country" v-model="countries_id"
                                                name="permanent_country_id" value="{{ old('countries_id') }}">
                                                <option value="">--Select--</option>
                                                @foreach ($countries as $country)
                                                    <option @click="fetchData({{ $country->id }})"
                                                        value="{{ $country->id }}">
                                                        {{ $country->country }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group" v-if="cities_values.length">
                                            <label for="city">City</label>
                                            <select class="form-control" name="permanent_city_id" id="cities_id"
                                                v-model="cities_id" value="{{ old('permanent_city_id') }}">
                                                <option value="">--Select--</option>
                                                <option @click="fetchDataForCity(city.id)" v-for="city in cities_values"
                                                    v-bind:value="city.id">
                                                    @{{ city . city }}
                                                </option>
                                            </select>
                                        </div>
                                        <div class="form-group" v-if="thanas_values.length">
                                            <label for="thana">Thana</label>
                                            <select class="form-control" name="permanent_thana_id" id="thanas_id"
                                                v-model="thanas_id" value="{{ old('permanent_thana_id') }}">
                                                <option value="">--Select--</option>
                                                <option v-for="thana in thanas_values"
                                                    @click="fetchDataForThana(thana.id)" v-bind:value="thana.id">
                                                    @{{ thana . thana }}
                                                </option>
                                            </select>
                                            <br>
                                        </div>
                                        <div class="form-group" v-if="areas_values.length">
                                            <label for="area">Area</label>
                                            <select class="form-control" name="permanent_area_id" id="areas_id"
                                                v-model="areas_id" value="{{ old('permanent_area_id') }}">
                                                <option value="">--Select--</option>
                                                <option v-for="area in areas_values" v-bind:value="area.id">
                                                    @{{ area . area }}
                                                </option>
                                            </select>
                                            <br>
                                            <label for="permanent_address">Address/Home No</label>
                                            <input type="text" name="permanent_address" class="form-control"
                                                id="permanent_address" placeholder="Add Address"
                                                v-model="permanent_address" value="{{ old('permanent_address') }}">
                                            <br>
                                            <label for="permanent_address_zip_code">Zip Code</label>
                                            <input type="text" name="permanent_address_zip_code" class="form-control"
                                                id="permanent_address_zip_code" placeholder="Add Zip Code"
                                                v-model="permanent_address_zip_code"
                                                value="{{ old('permanent_address_zip_code') }}">
                                        </div>
                                        <div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div id="application">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Add Marital Status</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="country">Marital Status</label>
                                            <select class="form-control" name="marital_status_id"
                                                value="{{ old('marital_status_id') }}">
                                                <option value="">--Select--</option>
                                                @foreach ($marital_statuses as $marital_status)
                                                    <option value="{{ $marital_status->id }}">
                                                        {{ $marital_status->marital_status }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card card-default">
                        <div class="card-header">
                            <h3 class="card-title"></h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Phone Number</label>

                                        <input autocomplete="false" id="phone" type="tel" name="phonenumber"
                                            class="form-control" style="width: 100%;"
                                            value="{{ old('phonenumber') }}" onkeydown="process(event)">

                                        <div style="margin-top: 2px;" style="color: light-green;" class="alert"
                                            style="display: none;"></div>
                                    </div>
                                </div>
                            </div>
                            <h5></h5>
                        </div>
                        <div class="card-footer">
                            Visit <a href="https://select2.github.io/">Select2 documentation</a> for more examples and
                            information about
                            the plugin.
                        </div>
                    </div>
                    <div class="card card-default">
                        <div class="card-header">
                            <h3 class="card-title"></h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>NID</label>
                                        <input type="text" name="nid_card_number" class="form-control"
                                            style="width: 100%;" value="{{ old('nid_card_number') }}"
                                            id="nid_card_number">
                                        <div id="invalid">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Birth Certificate ID</label>
                                        <input type="text" name="birth_certificate_number" class="form-control"
                                            style="width: 100%;" value="{{ old('birth_certificate_number') }}"
                                            id="birth_certificate_number">
                                        <div id="invalid_2">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h5></h5>
                        </div>
                        <div class="card-footer">
                            Visit <a href="https://select2.github.io/">Select2 documentation</a> for more examples and
                            information about
                            the plugin.
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-default">
                                <div class="card-header">
                                    <h3 class="card-title">bs-stepper</h3>
                                </div>
                                <div class="card-body p-0">
                                    <div class="bs-stepper">
                                        <div class="bs-stepper-header" role="tablist">
                                            <div class="step" data-target="#logins-part">
                                                <button type="button" class="step-trigger" role="tab"
                                                    aria-controls="logins-part" id="logins-part-trigger">
                                                    <span class="bs-stepper-circle">1</span>
                                                    <span class="bs-stepper-label">Logins</span>
                                                </button>
                                            </div>
                                            <div class="line"></div>
                                            <div class="step" data-target="#information-part">
                                                <button type="button" class="step-trigger" role="tab"
                                                    aria-controls="information-part" id="information-part-trigger">
                                                    <span class="bs-stepper-circle">2</span>
                                                    <span class="bs-stepper-label">Various information</span>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="bs-stepper-content">
                                            <div id="logins-part" class="content" role="tabpanel"
                                                aria-labelledby="logins-part-trigger">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Email address</label>
                                                    <input type="email" name="email" class="form-control"
                                                        id="exampleInputEmail1" placeholder="Enter email"
                                                        value="{{ old('email') }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Password</label>
                                                    <input type="password" name="password" class="form-control"
                                                        id="exampleInputPassword1" placeholder="Password"
                                                        value="{{ old('password') }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Confirm Password</label>
                                                    <input type="password" name="confirm_password"
                                                        class="form-control" id="exampleInputPassword1"
                                                        placeholder="Confirm Password"
                                                        value="{{ old('confirm_password') }}">
                                                </div>
                                                <button class="btn btn-primary" onclick="stepper.next()">Next</button>
                                            </div>
                                            <div id="information-part" class="content" role="tabpanel"
                                                aria-labelledby="information-part-trigger">
                                                <div class="form-group">
                                                    <label for="exampleInputFile">File input</label>
                                                    <div class="input-group">
                                                        <div class="custom-file">

                                                            <input type="file" class="custom-file-input"
                                                                id="exampleInputFile" name="patients_profile_picture"
                                                                onchange="previewFile(this);"
                                                                value="{{ old('profile_picture') }}" required>
                                                            <label class="custom-file-label"
                                                                for="exampleInputFile">Choose file</label>
                                                        </div>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">Upload</span>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div>
                                                        <img id="previewImg" src=""
                                                            style="height: 20%; width: 20%; border-radius: 5px;"
                                                            alt="Select Profile Picture">
                                                    </div>
                                                </div>
                                                <button class="btn btn-primary"
                                                    onclick="stepper.previous()">Previous</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    Visit <a href="https://github.com/Johann-S/bs-stepper/#how-to-use-it">bs-stepper
                                        documentation</a> for more examples and information about the plugin.
                                </div>
                            </div>
                        </div>
                    </div>
                    <script>
                        function previewFile(input) {
                            var file = $("input[type=file]").get(0).files[0];
                            if (file) {
                                var reader = new FileReader();
                                reader.onload = function() {
                                    $("#previewImg").attr("src", reader.result);
                                }
                                reader.readAsDataURL(file);
                            }
                        }
                    </script>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-default">
                                <div class="card-header">
                                    <h3 class="card-title">Dropzone.js <small><em>jQuery File Upload</em> like
                                            look</small></h3>
                                </div>
                                <div class="card-body">
                                    <div id="actions" class="row">
                                        <div class="form-group">
                                            <label for="exampleInputFile">File input</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <!-- <input type="file" class="custom-file-input" id="exampleInputFile"> -->
                                                    <caption style="color: red;">You have to combine all certificates
                                                        images in one pdf</caption>
                                                    <input type="file" id="exampleInputFile" name="patients_report"
                                                        class="form-control"
                                                        value="{{ old('pdf_file_of_certificate') }}" required>
                                                </div>
                                                <div class="input-group-append">
                                                    <span class="input-group-text">Upload</span>
                                                </div>
                                            </div>
                                            <br>
                                            <div>
                                                <img id="previewImg2" src=""
                                                    style="height: 20%; width: 20%; border-radius: 5px;"
                                                    alt="Select Pdf File">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    Visit <a href="https://www.dropzonejs.com">dropzone.js documentation</a> for more
                                    examples and information about the plugin.
                                </div>
                            </div>
                        </div>
                    </div>
                    <script>
                        function previewFileOne(input) {
                            var file = $("input[type=file]").get(0).files[0];
                            if (file) {
                                var reader = new FileReader();
                                reader.onload = function() {
                                    $("#previewImgOne").attr("src", reader.result);
                                }
                                reader.readAsDataURL(file);
                            }
                        }
                    </script>
                    <div class="card card-default">
                        <div class="card-header">
                            <h3 class="card-title"></h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    You have to check whether you filled the form or not.<br>
                                    By giving your information, you are giving the right to invastigate about you.
                                    <br>
                                    Thanks for being with us.
                                </div>
                                <div class="col-md-6">
                                    <button type="submit" name="submit"
                                        class="btn btn-default btn-block">Register</button>
                                </div>
                            </div>
                            <h5></h5>
                        </div>
                        <div class="card-footer">
                            Visit <a href="https://select2.github.io/">Select2 documentation</a> for more examples and
                            information about
                            the plugin.
                        </div>
                    </div>
                </div>
            </section>
            <aside class="control-sidebar control-sidebar-dark">
            </aside>
        </div>
    </form>
    <script>
        var input = document.querySelector("#phone");
        window.intlTelInput(input, ({}));
        var count = 0;

        function process(event) {
            var countryCode = $('.iti__selected-flag').attr('title');
            var countryCode = countryCode.replace(/[^0-9]/g, '')
            while (count == 0) {
                console.log($('#phone').val("+" + countryCode + $('#phone').val()));
                count++;
            }
            console.log(count);
            if (count > 0) {
                console.log($('#phone').val($('#phone').val()));
            }
        };
    </script>
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="{{ asset('../../plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('../../plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('../../plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('../../plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js') }}"></script>
    <script src="{{ asset('../../plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('../../plugins/inputmask/jquery.inputmask.min.js') }}"></script>
    <script src="{{ asset('../../plugins/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('../../plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
    <script src="{{ asset('../../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <script src="{{ asset('../../plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
    <script src="{{ asset('../../plugins/bs-stepper/js/bs-stepper') }}.min.js"></script>
    <script src="{{ asset('../../plugins/dropzone/min/dropzone.min.js') }}"></script>
    <script src="{{ asset('../../dist/js/adminlte.min.js') }}"></script>
    <script src="{{ asset('../../dist/js/demo.js') }}"></script>
    <script>
        $(document).ready(function() {
            $("#nid_card_number").keyup(function() {
                if ($("#nid_card_number").val().length == 9) {
                    var nid = $("#nid_card_number").val();
                    $("#invalid").html("");
                    $.ajax({
                        url: "{{ route('nid.index') }}",
                        type: "GET",
                        data: {
                            _token: '{{ csrf_token() }}',
                            nid: $("#nid_card_number").val()
                        },
                        cache: false,
                        dataType: 'json',
                        success: function(dataResult) {
                            if (dataResult.success) {
                                $("#invalid").html("");
                                $("#nid_card_number").css("border-color", "green");
                            } else {
                                $("#invalid").html("");
                                $("#nid_card_number").css("border-color", "coral");
                                $("#invalid").append(
                                    "<span class='glyphicon glyphicon-remove form-control-feedback' style= 'margin-left: 5px; color: red;'>Invalid Nid Card Number</span>"
                                );
                            }
                        }
                    });
                } else {
                    $("#invalid").html("");
                    $("#nid_card_number").css("border-color", "coral");
                    $("#invalid").append(
                        "<span class='glyphicon glyphicon-remove form-control-feedback' style= 'margin-left: 5px; color: red;'>NID Card Number Must Be 9 Digit</span>"
                    );
                }
            });
            $("#birth_certificate_number").keyup(function() {
                if ($("#birth_certificate_number").val().length == 9) {
                    var birth_certificate_number = $("#birth_certificate_number").val();
                    $("#invalid_2").html("");
                    $.ajax({
                        url: "{{ route('birth_certificate_number.index') }}",
                        type: "GET",
                        data: {
                            _token: '{{ csrf_token() }}',
                            birth_certificate_number: birth_certificate_number
                        },
                        cache: false,
                        dataType: 'json',
                        success: function(dataResult) {
                            console.log(dataResult);
                            if (dataResult.success) {
                                $("#invalid_2").html("");
                                $("#birth_certificate_number").css("border-color", "green");
                            } else {
                                $("#invalid_2").html("");
                                $("#birth_certificate_number").css("border-color", "coral");
                                $("#invalid_2").append(
                                    "<span class='glyphicon glyphicon-remove form-control-feedback' style= 'margin-left: 5px; color: red;'>Invalid Birth Certificate Number</span>"
                                );
                            }
                        }
                    });
                } else {
                    $("#invalid_2").html("");
                    $("#birth_certificate_number").css("border-color", "coral");
                    $("#invalid_2").append(
                        "<span class='glyphicon glyphicon-remove form-control-feedback' style= 'margin-left: 5px; color: red;'>Birth Certificate Must Be 9 Digit</span>"
                    );
                }
            });
            var count = 1;
            $('#add').click(function() {
                count = count + 1;
                var html_code = "<tr id='row" + count + "'>";
                html_code +=
                    "<td ><input class='item_name' type='text' name='social_network_link[]' style='width: 100%;'></td>";
                html_code += "<td><button type='button' name='remove' data-row='row" + count +
                    "' class='bt btn-danger btn-xs remove'><i class='icon-remove'>Remove</i></button></td>";
                html_code += "</tr>";
                $('#crud_table').append(html_code);
            });
            $(document).on('click', '.remove', function() {
                var delete_row = $(this).data("row");
                $('#' + delete_row).remove();
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("#nid_card_number").keyup(function() {
                if ($("#nid_card_number").val().length == 9) {
                    var nid = $("#nid_card_number").val();
                    $("#invalid").html("");
                    $.ajax({
                        url: "{{ route('nid.index') }}",
                        type: "GET",
                        data: {
                            _token: '{{ csrf_token() }}',
                            nid: $("#nid_card_number").val()
                        },
                        cache: false,
                        dataType: 'json',
                        success: function(dataResult) {
                            if (dataResult.success) {
                                $("#invalid").html("");
                                $("#nid_card_number").css("border-color", "green");
                            } else {
                                $("#invalid").html("");
                                $("#nid_card_number").css("border-color", "coral");
                                $("#invalid").append(
                                    "<span class='glyphicon glyphicon-remove form-control-feedback' style= 'margin-left: 5px; color: red;'>Invalid Nid Card Number</span>"
                                );
                            }
                        }
                    });
                } else {
                    $("#invalid").html("");
                    $("#nid_card_number").css("border-color", "coral");
                    $("#invalid").append(
                        "<span class='glyphicon glyphicon-remove form-control-feedback' style= 'margin-left: 5px; color: red;'>NID Card Number Must Be 9 Digit</span>"
                    );
                }
            });
            $("#birth_certificate_number").keyup(function() {
                if ($("#birth_certificate_number").val().length == 9) {
                    var birth_certificate_number = $("#birth_certificate_number").val();
                    $("#invalid_2").html("");
                    $.ajax({
                        url: "{{ route('birth_certificate_number.index') }}",
                        type: "GET",
                        data: {
                            _token: '{{ csrf_token() }}',
                            birth_certificate_number: birth_certificate_number
                        },
                        cache: false,
                        dataType: 'json',
                        success: function(dataResult) {
                            console.log(dataResult);
                            if (dataResult.success) {
                                $("#invalid_2").html("");
                                $("#birth_certificate_number").css("border-color", "green");
                            } else {
                                $("#invalid_2").html("");
                                $("#birth_certificate_number").css("border-color", "coral");
                                $("#invalid_2").append(
                                    "<span class='glyphicon glyphicon-remove form-control-feedback' style= 'margin-left: 5px; color: red;'>Invalid Birth Certificate Number</span>"
                                );
                            }
                        }
                    });
                } else {
                    $("#invalid_2").html("");
                    $("#birth_certificate_number").css("border-color", "coral");
                    $("#invalid_2").append(
                        "<span class='glyphicon glyphicon-remove form-control-feedback' style= 'margin-left: 5px; color: red;'>Birth Certificate Must Be 9 Digit</span>"
                    );
                }
            });
            var count = 1;
            $('#add').click(function() {
                count = count + 1;
                var html_code = "<tr id='row" + count + "'>";
                html_code +=
                    "<td ><input class='item_name' type='text' name='social_network_link[]' style='width: 100%;'></td>";
                html_code += "<td><button type='button' name='remove' data-row='row" + count +
                    "' class='bt btn-danger btn-xs remove'><i class='icon-remove'>Remove</i></button></td>";
                html_code += "</tr>";
                $('#crud_table').append(html_code);
            });
            $(document).on('click', '.remove', function() {
                var delete_row = $(this).data("row");
                $('#' + delete_row).remove();
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            var count = 1;
            $('#add_one').click(function() {
                count = count + 1;
                var html_code = "<tr id='row" + count + "'>";
                html_code +=
                    "<td ><input class='item_name_one' type='text' name='specialist_of[]' style='width: 100%;'><button type='button' name='remove_one' class='bt btn-danger btn-xs remove_one'><i class='icon-remove'>Remove</i></button></td>";
                html_code += "</tr>";
                $('#speciality').append(html_code);
            });
            $(document).on('click', '.remove_one', function() {
                $(this).parents('tr').remove();
            });
        });
    </script>
    <script type="text/javascript">
        var app = new Vue({
            el: '#app',
            data: {
                errors: [],
                countries_id: "",
                cities_id: "",
                thanas_id: "",
                areas_id: "",
                id: "",
                city: "",
                cities_values: [],
                thanas_values: [],
                areas_values: [],
                privates: [{
                        zone: 'Zone 1',
                        product: 'Product 1',
                        content: 'Filled',
                    },
                    {
                        zone: 'Zone 2',
                        product: 'Product 2',
                        content: 'Filled',
                    },
                    {
                        zone: 'Zone 3',
                        product: 'Product 3',
                        content: 'Empty',
                    },
                ],
            },
            components: {},
            methods: {
                checkForm: function(e) {
                    this.errors = [];
                    if (!this.countries_id) {
                        this.errors.push("Country is required.");
                    }
                    if (!this.errors.length) {
                        this.errors = [];
                        axios.get('', {
                                countries_id: this.countries_id,
                            })
                            .then(function(response) {
                                if (response.status == 200) {
                                    alert('Gotten data');
                                } else {
                                    alert("Failed to get.");
                                }
                            })
                            .catch(function(error) {
                                console.log(error);
                            });
                    }
                    e.preventDefault();
                },

                fetchData: function(id) {
                    console.log(id);
                    axios.get('./get_city_for_thana/' + id).then(response => {
                        console.log(response.data.data);
                        this.cities_values = response.data.data,
                            app.cities_id = '';
                        console.log(this.cities_values);
                    })
                },
                fetchDataForCity: function(id) {
                    console.log(id);
                    axios.get('./get_thana_for_area/' + id).then(response => {
                        console.log(response.data.data);
                        this.thanas_values = response.data.data,
                            app.thanas_id = '';
                        console.log(this.thanas_values);
                    })
                },
                fetchDataForThana: function(id) {
                    console.log(id);
                    axios.get('./get_area_for_address/' + id).then(response => {
                        console.log(response.data.data);
                        this.areas_values = response.data.data,
                            app.areas_id = '';
                        console.log(this.areas_values);
                    })
                },
                login: function() {

                }
            }
        })
    </script>
    <script type="text/javascript">
        var application = new Vue({
            el: '#application',
            data: {
                errors: [],
                countries_id: "",
                cities_id: "",
                thanas_id: "",
                areas_id: "",
                id: "",
                city: "",
                cities_values: [],
                thanas_values: [],
                areas_values: [],
                privates: [{
                        zone: 'Zone 1',
                        product: 'Product 1',
                        content: 'Filled',
                    },
                    {
                        zone: 'Zone 2',
                        product: 'Product 2',
                        content: 'Filled',
                    },
                    {
                        zone: 'Zone 3',
                        product: 'Product 3',
                        content: 'Empty',
                    },
                ],
            },
            components: {},
            methods: {
                checkForm: function(e) {
                    this.errors = [];
                    if (!this.countries_id) {
                        this.errors.push("Country is required.");
                    }
                    if (!this.errors.length) {
                        this.errors = [];
                        axios.get('', {
                                countries_id: this.countries_id,
                            })
                            .then(function(response) {
                                if (response.status == 200) {
                                    alert('Gotten data');
                                } else {
                                    alert("Failed to get.");
                                }
                            })
                            .catch(function(error) {
                                console.log(error);
                            });
                    }
                    e.preventDefault();
                },
                fetchData: function(id) {
                    console.log(id);
                    axios.get('./get_city_for_thana/' + id).then(response => {
                        console.log(response.data.data);
                        this.cities_values = response.data.data,
                            application.cities_id = '';
                        console.log(this.cities_values);
                    })
                },
                fetchDataForCity: function(id) {
                    console.log(id);
                    axios.get('./get_thana_for_area/' + id).then(response => {
                        console.log(response.data.data);
                        this.thanas_values = response.data.data,
                            application.thanas_id = '';
                        console.log(this.thanas_values);
                    })
                },
                fetchDataForThana: function(id) {
                    console.log(id);
                    axios.get('./get_area_for_address/' + id).then(response => {
                        console.log(response.data.data);
                        this.areas_values = response.data.data,
                            application.areas_id = '';
                        console.log(this.areas_values);
                    })
                },
                login: function() {

                }
            }
        })
    </script>
    <script>
        $(function() {
            $('.select2').select2()
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
            $('#datemask').inputmask('dd/mm/yyyy', {
                'placeholder': 'dd/mm/yyyy'
            })
            $('#datemask2').inputmask('mm/dd/yyyy', {
                'placeholder': 'mm/dd/yyyy'
            })
            $('[data-mask]').inputmask()
            $('#reservationdate').datetimepicker({
                format: 'L'
            });
            $('#reservation').daterangepicker()
            $('#reservationtime').daterangepicker({
                timePicker: true,
                timePickerIncrement: 30,
                locale: {
                    format: 'MM/DD/YYYY hh:mm A'
                }
            })
            $('#daterange-btn').daterangepicker({
                    ranges: {
                        'Today': [moment(), moment()],
                        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                        'This Month': [moment().startOf('month'), moment().endOf('month')],
                        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1,
                            'month').endOf('month')]
                    },
                    startDate: moment().subtract(29, 'days'),
                    endDate: moment()
                },
                function(start, end) {
                    $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format(
                        'MMMM D, YYYY'))
                }
            )
            $('#timepicker').datetimepicker({
                format: 'LT'
            })
            $('.duallistbox').bootstrapDualListbox()
            $('.my-colorpicker1').colorpicker()
            $('.my-colorpicker2').colorpicker()
            $('.my-colorpicker2').on('colorpickerChange', function(event) {
                $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
            });
            $("input[data-bootstrap-switch]").each(function() {
                $(this).bootstrapSwitch('state', $(this).prop('checked'));
            });

        })
        document.addEventListener('DOMContentLoaded', function() {
            window.stepper = new Stepper(document.querySelector('.bs-stepper'))
        });
        Dropzone.autoDiscover = false;
        var previewNode = document.querySelector("#template");
        previewNode.id = "";
        var previewTemplate = previewNode.parentNode.innerHTML;
        previewNode.parentNode.removeChild(previewNode);
        var myDropzone = new Dropzone(document.body, {
            url: "/target-url",
            thumbnailWidth: 80,
            thumbnailHeight: 80,
            parallelUploads: 20,
            previewTemplate: previewTemplate,
            autoQueue: false,
            previewsContainer: "#previews",
            clickable: ".fileinput-button"
        });
        myDropzone.on("addedfile", function(file) {
            file.previewElement.querySelector(".start").onclick = function() {
                myDropzone.enqueueFile(file);
            };
        });
        myDropzone.on("totaluploadprogress", function(progress) {
            document.querySelector("#total-progress .progress-bar").style.width = progress + "%";
        });
        myDropzone.on("sending", function(file) {
            document.querySelector("#total-progress").style.opacity = "1";
            file.previewElement.querySelector(".start").setAttribute("disabled", "disabled");
        });
        myDropzone.on("queuecomplete", function(progress) {
            document.querySelector("#total-progress").style.opacity = "0";
        });
        document.querySelector("#actions .start").onclick = function() {
            myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED));
        };
        document.querySelector("#actions .cancel").onclick = function() {
            myDropzone.removeAllFiles(true);
        };
    </script>
</body>

</html>
