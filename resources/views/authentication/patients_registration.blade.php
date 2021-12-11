<!DOCTYPE html>
<html lang="en">
<!-- header -->
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Advanced form elements</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('../../plugins/fontawesome-free/css/all.min.css')}}">
  <!-- daterange picker -->
  <link rel="stylesheet" href="{{asset('../../plugins/daterangepicker/daterangepicker.css')}}">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="{{asset('../../plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="{{asset('../../plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css')}}">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{asset('../../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{asset('../../plugins/select2/css/select2.min.css')}}">
  <link rel="stylesheet" href="{{asset('../../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="{{asset('../../plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css')}}">
  <!-- BS Stepper -->
  <link rel="stylesheet" href="{{asset('../../plugins/bs-stepper/css/bs-stepper.min.css')}}">
  <!-- dropzonejs -->
  <link rel="stylesheet" href="{{asset('../../plugins/dropzone/min/dropzone.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('../../dist/css/adminlte.min.css')}}">
  <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>



<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet"> -->

  <script src="{{asset('../../node_modules/jquery/dist/jquery.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</head>
<!-- header -->

<body class="hold-transition sidebar-mini">

  <form action="{{route('registration.register_patient')}}" method="post" enctype="multipart/form-data">

    @csrf

<div class="wrapper">
  <!-- Navbar -->
  @include('authentication.includes.nav_for_patient')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->

  <!-- Content Wrapper. Contains page content -->
  <!-- <div class="content-wrapper"> -->
    <!-- Content Header (Page header) -->

    <hr>

    <!-- Main content -->
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
         <div class = "alert alert-danger">
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
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>First Name</label>
                  <!-- <select class="form-control select2" style="width: 100%;">
                    <option selected="selected">Alabama</option>
                    <option>Alaska</option>
                    <option>California</option>
                    <option>Delaware</option>
                    <option>Tennessee</option>
                    <option>Texas</option>
                    <option>Washington</option>
                  </select> -->

                  <input type="text" name="first_name" class="form-control" style="width: 100%;" value="{{old('first_name')}}">
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                  <label>Last Name</label>
                  <!-- <select class="form-control select2" style="width: 100%;">
                    <option selected="selected">Alabama</option>
                    <option>Alaska</option>
                    <option>California</option>
                    <option>Delaware</option>
                    <option>Tennessee</option>
                    <option>Texas</option>
                    <option>Washington</option>
                  </select> -->

                  <input type="text" name="last_name" class="form-control" style="width: 100%;" value="{{old('last_name')}}">
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                  <label>Fathers Name</label>
                  <!-- <select class="select2" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
                    <option>Alabama</option>
                    <option>Alaska</option>
                    <option>California</option>
                    <option>Delaware</option>
                    <option>Tennessee</option>
                    <option>Texas</option>
                    <option>Washington</option>
                  </select> -->
                  <input type="text" name="fathers_name" class="form-control" style="width: 100%;" value="{{old('fathers_name')}}">
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                  <label>Mothers Name</label>
                  <!-- <select class="form-control select2" style="width: 100%;">
                    <option selected="selected">Alabama</option>
                    <option>Alaska</option>
                    <option disabled="disabled">California (disabled)</option>
                    <option>Delaware</option>
                    <option>Tennessee</option>
                    <option>Texas</option>
                    <option>Washington</option>
                  </select> -->
                  <input type="text" name="mothers_name" class="form-control" style="width: 100%;" value="{{old('mothers_name')}}">
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <h5></h5>
            <div class="row">
              <div class="col-12 col-sm-6">
                <div class="form-group">
                  <label>Gender</label>
                  <select name="gender_id" class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;" value="{{old('gender_id')}}">

                    <option selected="selected">Select a gender</option>
                    @foreach ($genders as $gender)
                    <option value="{{ $gender->id}}">{{ $gender->gender}}</option>
                    @endforeach
                  </select>
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
              <div class="col-12 col-sm-6">
                <div class="form-group">
                  <label>Date of Birth:</label>
                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input type="text" name="date_of_birth" class="form-control datetimepicker-input" data-target="#reservationdate" value="{{old('date_of_birth')}}"/>
                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            Visit <a href="https://select2.github.io/">Select2 documentation</a> for more examples and information about
            the plugin.
          </div>
        </div>


<!--  <div class="row">
          <div class="col-md-12">
            <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title">Dropzone.js <small><em>jQuery File Upload</em> like look</small></h3>
              </div>
              <div class="card-body">
                <div id="actions" class="row">

<p>
            <input type="file" name="photo" onchange="previewFile(this);" required>
        </p>
        <img id="previewImg" src="" style="height: 100px; width: 100px;" alt="Placeholder">

                </div>

              </div>

              <div class="card-footer">
                Visit <a href="https://www.dropzonejs.com">dropzone.js documentation</a> for more examples and information about the plugin.
              </div>
            </div>

          </div>
        </div> -->

<!-- <script>
    function previewFile(input){
        var file = $("input[type=file]").get(0).files[0];

        if(file){
            var reader = new FileReader();

            reader.onload = function(){
                $("#previewImg").attr("src", reader.result);
            }

            reader.readAsDataURL(file);
        }
    }
</script> -->


<!-- normal form -->
<div class="row">
        <div class="col-md-6">
            <!-- general form elements -->
            <div id="app">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Address</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

                <div class="card-body">

                  <div class="form-group">
                    <label for="country">Country</label>
                    <select class="form-control" id="country" v-model="countries_id" name="country_id" value="{{old('country_id')}}">

                      <option value="">--Select--</option>

                      @foreach ($countries as $country)

                      <option @click="fetchData({{ $country->id}})" value="{{ $country->id}}">
                        {{ $country->country}}
                      </option>
                      @endforeach
                    </select>
                  </div>

                  <div class="form-group" v-if="cities_values.length">
                    <label for="city">City</label>
                    <select class="form-control" name="city_id" id="cities_id" v-model="cities_id" value="{{old('city_id')}}">
                      <option value="">--Select--</option>
                      <option @click="fetchDataForCity(city.id)" v-for="city in cities_values" v-bind:value="city.id" >
                        @{{city.city}}
                      </option>
                    </select>
                  </div>

                  <div class="form-group" v-if="thanas_values.length">
                    <label for="thana">Thana</label>
                    <select class="form-control" name="thana_id" id="thanas_id" v-model="thanas_id" value="{{old('thana_id')}}">
                      <option value="">--Select--</option>
                      <option v-for="thana in thanas_values" @click="fetchDataForThana(thana.id)" v-bind:value="thana.id">
                        @{{thana.thana}}
                      </option>
                    </select>
                    <br>
                  </div>

                  <div class="form-group" v-if="areas_values.length">
                    <label for="area">Area</label>
                    <select class="form-control" name="area_id" id="areas_id" v-model="areas_id" value="{{old('areas_id')}}">
                      <option value="">--Select--</option>
                      <option v-for="area in areas_values" v-bind:value="area.id">
                        @{{area.area}}
                      </option>
                    </select>
                    <br>
                    <label for="address">Address/Home No</label>
                    <input type="text" name="address" class="form-control" id="address" placeholder="Add Address" v-model="address" value="{{old('address')}}">
                    <br>
                    <label for="zip_code">Zip Code</label>
                    <input type="text" name="zip_code" class="form-control" id="zip_code" placeholder="Add Zip Code" v-model="zip_code" value="{{old('zip_code')}}">
                  </div>

                  <div>
    <!-- -->
                  </div>

                  <!-- <div class="form-group">

                  </div> -->
                  <!-- <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                  </div> -->
                  <!-- <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div> -->
                  <!-- <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                  </div> -->
                </div>
                <!-- /.card-body -->

                <!-- <div class="card-footer">
                  <button type="submit" @click='checkForm();' class="btn btn-primary">Add</button>
                </div> -->
            </div>
          </div>
          </div>

</div>


<!-- normal form -->


<!-- Permanent Address -->

<div class="row">
        <div class="col-md-6">
            <!-- general form elements -->
            <div id="application">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Permanent Address</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                <div class="card-body">



                  <div class="form-group">
                    <label for="country">Country</label>
                    <select class="form-control" id="country" v-model="countries_id" name="permanent_country_id" value="{{old('countries_id')}}">

                      <option value="">--Select--</option>

                      @foreach ($countries as $country)

                      <option @click="fetchData({{ $country->id}})" value="{{ $country->id}}">
                        {{ $country->country}}
                      </option>
                      @endforeach
                    </select>
                  </div>

                  <div class="form-group" v-if="cities_values.length">
                    <label for="city">City</label>
                    <select class="form-control" name="permanent_city_id" id="cities_id" v-model="cities_id" value="{{old('permanent_city_id')}}">
                      <option value="">--Select--</option>
                      <option @click="fetchDataForCity(city.id)" v-for="city in cities_values" v-bind:value="city.id">
                        @{{city.city}}
                      </option>
                    </select>
                  </div>

                  <div class="form-group" v-if="thanas_values.length">
                    <label for="thana">Thana</label>
                    <select class="form-control" name="permanent_thana_id" id="thanas_id" v-model="thanas_id" value="{{old('permanent_thana_id')}}">
                      <option value="">--Select--</option>
                      <option v-for="thana in thanas_values" @click="fetchDataForThana(thana.id)" v-bind:value="thana.id">
                        @{{thana.thana}}
                      </option>
                    </select>
                    <br>
                  </div>

                  <div class="form-group" v-if="areas_values.length">
                    <label for="area">Area</label>
                    <select class="form-control" name="permanent_area_id" id="areas_id" v-model="areas_id" value="{{old('permanent_area_id')}}">
                      <option value="">--Select--</option>
                      <option v-for="area in areas_values" v-bind:value="area.id">
                        @{{area.area}}
                      </option>
                    </select>
                    <br>
                    <label for="permanent_address">Address/Home No</label>
                    <input type="text" name="permanent_address" class="form-control" id="permanent_address" placeholder="Add Address" v-model="permanent_address" value="{{old('permanent_address')}}">
                    <br>
                    <label for="permanent_address_zip_code">Zip Code</label>
                    <input type="text" name="permanent_address_zip_code" class="form-control" id="permanent_address_zip_code" placeholder="Add Zip Code" v-model="permanent_address_zip_code" value="{{old('permanent_address_zip_code')}}">
                  </div>

                  <div>
    <!-- -->
                  </div>

                  <!-- <div class="form-group">

                  </div> -->
                  <!-- <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                  </div> -->
                  <!-- <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div> -->
                  <!-- <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                  </div> -->
                </div>
                <!-- /.card-body -->

                <!-- <div class="card-footer">
                  <button type="submit" @click='checkForm();' class="btn btn-primary">Add</button>
                </div> -->
            </div>
          </div>
          </div>

</div>

<!-- Marital Statuses -->

<div class="row">
        <div class="col-md-6">
            <!-- general form elements -->
            <div id="application">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Marital Status</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                <div class="card-body">



                  <div class="form-group">
                    <label for="country">Marital Status</label>
                    <select class="form-control" name="marital_status_id" value="{{old('marital_status_id')}}">

                      <option value="">--Select--</option>

                      @foreach ($marital_statuses as $marital_status)

                      <option value="{{ $marital_status->id}}">
                        {{ $marital_status->marital_status}}
                      </option>
                      @endforeach
                    </select>
                  </div>




                  <div>
    <!-- -->
                  </div>

                  <!-- <div class="form-group">

                  </div> -->
                  <!-- <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                  </div> -->
                  <!-- <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div> -->
                  <!-- <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                  </div> -->
                </div>
                <!-- /.card-body -->

                <!-- <div class="card-footer">
                  <button type="submit" @click='checkForm();' class="btn btn-primary">Add</button>
                </div> -->
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
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>NID</label>
                                        <!-- <select class="form-control select2" style="width: 100%;">
                    <option selected="selected">Alabama</option>
                    <option>Alaska</option>
                    <option>California</option>
                    <option>Delaware</option>
                    <option>Tennessee</option>
                    <option>Texas</option>
                    <option>Washington</option>
                  </select> -->
                                        <input type="text" name="nid_card_number" class="form-control"
                                            style="width: 100%;" value="{{ old('nid_card_number') }}"
                                            id="nid_card_number">
                                        <div id="invalid">

                                        </div>
                                    </div>
                                    <!-- /.form-group -->
                                    <!-- <div class="form-group">
                  <label>Birth Certificate</label>
                  <select class="form-control select2" style="width: 100%;">
                    <option selected="selected">Alabama</option>
                    <option>Alaska</option>
                    <option>California</option>
                    <option>Delaware</option>
                    <option>Tennessee</option>
                    <option>Texas</option>
                    <option>Washington</option>
                  </select>

                  <input type="text" name="birth_certificate_number" class="form-control" style="width: 100%;">
                </div> -->
                                    <!-- /.form-group -->
                                </div>
                                <!-- /.col -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Birth Certificate ID</label>
                                        <!-- <select class="select2" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
                    <option>Alabama</option>
                    <option>Alaska</option>
                    <option>California</option>
                    <option>Delaware</option>
                    <option>Tennessee</option>
                    <option>Texas</option>
                    <option>Washington</option>
                  </select> -->
                                        <input type="text" name="birth_certificate_number" class="form-control"
                                            style="width: 100%;" value="{{ old('birth_certificate_number') }}"
                                            id="birth_certificate_number">

                                            <div id="invalid_2">

                                        </div>
                                    </div>
                                    <!-- /.form-group -->
                                    <!-- <div class="form-group">
                  <label>Fax</label>
                  <select class="form-control select2" style="width: 100%;">
                    <option selected="selected">Alabama</option>
                    <option>Alaska</option>
                    <option disabled="disabled">California (disabled)</option>
                    <option>Delaware</option>
                    <option>Tennessee</option>
                    <option>Texas</option>
                    <option>Washington</option>
                  </select>
                  <input type="text" name="fax" class="form-control" style="width: 100%;">
                </div> -->
                                    <!-- /.form-group -->
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

                            <h5></h5>

                            <!-- /.row -->
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            Visit <a href="https://select2.github.io/">Select2 documentation</a> for more examples and
                            information about
                            the plugin.
                        </div>
                    </div>

<!-- Marital Statuses -->
<!-- Permanent Address -->


        <!-- <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Select2 (Default Theme)</h3>

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
                  <label>Minimal</label>
                  <select class="form-control select2" style="width: 100%;">
                    <option selected="selected">Alabama</option>
                    <option>Alaska</option>
                    <option>California</option>
                    <option>Delaware</option>
                    <option>Tennessee</option>
                    <option>Texas</option>
                    <option>Washington</option>
                  </select>
                </div>

                <div class="form-group">
                  <label>Disabled</label>
                  <select class="form-control select2" disabled="disabled" style="width: 100%;">
                    <option selected="selected">Alabama</option>
                    <option>Alaska</option>
                    <option>California</option>
                    <option>Delaware</option>
                    <option>Tennessee</option>
                    <option>Texas</option>
                    <option>Washington</option>
                  </select>
                </div>

              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label>Multiple</label>
                  <select class="select2" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
                    <option>Alabama</option>
                    <option>Alaska</option>
                    <option>California</option>
                    <option>Delaware</option>
                    <option>Tennessee</option>
                    <option>Texas</option>
                    <option>Washington</option>
                  </select>
                </div>

                <div class="form-group">
                  <label>Disabled Result</label>
                  <select class="form-control select2" style="width: 100%;">
                    <option selected="selected">Alabama</option>
                    <option>Alaska</option>
                    <option disabled="disabled">California (disabled)</option>
                    <option>Delaware</option>
                    <option>Tennessee</option>
                    <option>Texas</option>
                    <option>Washington</option>
                  </select>
                </div>

              </div>

            </div>


            <h5>Custom Color Variants</h5>
            <div class="row">
              <div class="col-12 col-sm-6">
                <div class="form-group">
                  <label>Minimal (.select2-danger)</label>
                  <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;">
                    <option selected="selected">Alabama</option>
                    <option>Alaska</option>
                    <option>California</option>
                    <option>Delaware</option>
                    <option>Tennessee</option>
                    <option>Texas</option>
                    <option>Washington</option>
                  </select>
                </div>

              </div>

              <div class="col-12 col-sm-6">
                <div class="form-group">
                  <label>Multiple (.select2-purple)</label>
                  <div class="select2-purple">
                    <select class="select2" multiple="multiple" data-placeholder="Select a State" data-dropdown-css-class="select2-purple" style="width: 100%;">
                      <option>Alabama</option>
                      <option>Alaska</option>
                      <option>California</option>
                      <option>Delaware</option>
                      <option>Tennessee</option>
                      <option>Texas</option>
                      <option>Washington</option>
                    </select>
                  </div>
                </div>

              </div>

            </div>

          </div>

          <div class="card-footer">
            Visit <a href="https://select2.github.io/">Select2 documentation</a> for more examples and information about
            the plugin.
          </div>
        </div> -->
        <!-- /.card -->

        <!-- SELECT2 EXAMPLE -->
        <!-- <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Select2 (Bootstrap4 Theme)</h3>

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
                  <label>Minimal</label>
                  <select class="form-control select2bs4" style="width: 100%;">
                    <option selected="selected">Alabama</option>
                    <option>Alaska</option>
                    <option>California</option>
                    <option>Delaware</option>
                    <option>Tennessee</option>
                    <option>Texas</option>
                    <option>Washington</option>
                  </select>
                </div>

                <div class="form-group">
                  <label>Disabled</label>
                  <select class="form-control select2bs4" disabled="disabled" style="width: 100%;">
                    <option selected="selected">Alabama</option>
                    <option>Alaska</option>
                    <option>California</option>
                    <option>Delaware</option>
                    <option>Tennessee</option>
                    <option>Texas</option>
                    <option>Washington</option>
                  </select>
                </div>

              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label>Multiple</label>
                  <select class="select2bs4" multiple="multiple" data-placeholder="Select a State"
                          style="width: 100%;">
                    <option>Alabama</option>
                    <option>Alaska</option>
                    <option>California</option>
                    <option>Delaware</option>
                    <option>Tennessee</option>
                    <option>Texas</option>
                    <option>Washington</option>
                  </select>
                </div>

                <div class="form-group">
                  <label>Disabled Result</label>
                  <select class="form-control select2bs4" style="width: 100%;">
                    <option selected="selected">Alabama</option>
                    <option>Alaska</option>
                    <option disabled="disabled">California (disabled)</option>
                    <option>Delaware</option>
                    <option>Tennessee</option>
                    <option>Texas</option>
                    <option>Washington</option>
                  </select>
                </div>

              </div>

            </div>

          </div>

          <div class="card-footer">
            Visit <a href="https://select2.github.io/">Select2 documentation</a> for more examples and information about
            the plugin.
          </div>
        </div> -->
        <!-- /.card -->

        <!-- <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Bootstrap Duallistbox</h3>

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
              <div class="col-12">
                <div class="form-group">
                  <label>Multiple</label>
                  <select class="duallistbox" multiple="multiple">
                    <option selected>Alabama</option>
                    <option>Alaska</option>
                    <option>California</option>
                    <option>Delaware</option>
                    <option>Tennessee</option>
                    <option>Texas</option>
                    <option>Washington</option>
                  </select>
                </div>

              </div>

            </div>

          </div>

          <div class="card-footer">
            Visit <a href="https://github.com/istvan-ujjmeszaros/bootstrap-duallistbox#readme">Bootstrap Duallistbox</a> for more examples and information about
            the plugin.
          </div>
        </div> -->


        <!-- <div class="row">
          <div class="col-md-6">

            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Input masks</h3>
              </div>
              <div class="card-body">

                <div class="form-group">
                  <label>Date masks:</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                    </div>
                    <input type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                  </div>

                </div>



                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                    </div>
                    <input type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="mm/dd/yyyy" data-mask>
                  </div>

                </div>

                <div class="form-group">
                  <label>US phone mask:</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-phone"></i></span>
                    </div>
                    <input type="text" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask>
                  </div>

                </div>

                <div class="form-group">
                  <label>Intl US phone mask:</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-phone"></i></span>
                    </div>
                    <input type="text" class="form-control"
                           data-inputmask="'mask': ['999-999-9999 [x99999]', '+099 99 99 9999[9]-9999']" data-mask>
                  </div>

                </div>

                <div class="form-group">
                  <label>IP mask:</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-laptop"></i></span>
                    </div>
                    <input type="text" class="form-control" data-inputmask="'alias': 'ip'" data-mask>
                  </div>

                </div>


              </div>

            </div>


            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Color & Time Picker</h3>
              </div>
              <div class="card-body">

                <div class="form-group">
                  <label>Color picker:</label>
                  <input type="text" class="form-control my-colorpicker1">
                </div>

                <div class="form-group">
                  <label>Color picker with addon:</label>

                  <div class="input-group my-colorpicker2">
                    <input type="text" class="form-control">

                    <div class="input-group-append">
                      <span class="input-group-text"><i class="fas fa-square"></i></span>
                    </div>
                  </div>

                </div>

                <div class="bootstrap-timepicker">
                  <div class="form-group">
                    <label>Time picker:</label>

                    <div class="input-group date" id="timepicker" data-target-input="nearest">
                      <input type="text" class="form-control datetimepicker-input" data-target="#timepicker"/>
                      <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="far fa-clock"></i></div>
                      </div>
                      </div>

                  </div>

                </div>
              </div>

            </div>


          </div>

          <div class="col-md-6">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Date picker</h3>
              </div>
              <div class="card-body">

                <div class="form-group">
                  <label>Date:</label>
                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate"/>
                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                  <label>Date range:</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="far fa-calendar-alt"></i>
                      </span>
                    </div>
                    <input type="text" class="form-control float-right" id="reservation">
                  </div>

                </div>

                <div class="form-group">
                  <label>Date and time range:</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-clock"></i></span>
                    </div>
                    <input type="text" class="form-control float-right" id="reservationtime">
                  </div>

                </div>



                <div class="form-group">
                  <label>Date range button:</label>

                  <div class="input-group">
                    <button type="button" class="btn btn-default float-right" id="daterange-btn">
                      <i class="far fa-calendar-alt"></i> Date range picker
                      <i class="fas fa-caret-down"></i>
                    </button>
                  </div>
                </div>

              </div>
                <div class="card-footer">
                  Visit <a href="https://tempusdominus.github.io/bootstrap-4/Usage/">tempusdominus </a> for more examples and information about
                  the plugin.
                </div>

            </div>

            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">iCheck Bootstrap - Checkbox &amp; Radio Inputs</h3>
              </div>
              <div class="card-body">

                <div class="row">
                  <div class="col-sm-6">

                    <div class="form-group clearfix">
                      <div class="icheck-primary d-inline">
                        <input type="checkbox" id="checkboxPrimary1" checked>
                        <label for="checkboxPrimary1">
                        </label>
                      </div>
                      <div class="icheck-primary d-inline">
                        <input type="checkbox" id="checkboxPrimary2">
                        <label for="checkboxPrimary2">
                        </label>
                      </div>
                      <div class="icheck-primary d-inline">
                        <input type="checkbox" id="checkboxPrimary3" disabled>
                        <label for="checkboxPrimary3">
                          Primary checkbox
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6">

                    <div class="form-group clearfix">
                      <div class="icheck-primary d-inline">
                        <input type="radio" id="radioPrimary1" name="r1" checked>
                        <label for="radioPrimary1">
                        </label>
                      </div>
                      <div class="icheck-primary d-inline">
                        <input type="radio" id="radioPrimary2" name="r1">
                        <label for="radioPrimary2">
                        </label>
                      </div>
                      <div class="icheck-primary d-inline">
                        <input type="radio" id="radioPrimary3" name="r1" disabled>
                        <label for="radioPrimary3">
                          Primary radio
                        </label>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-6">

                    <div class="form-group clearfix">
                      <div class="icheck-danger d-inline">
                        <input type="checkbox" checked id="checkboxDanger1">
                        <label for="checkboxDanger1">
                        </label>
                      </div>
                      <div class="icheck-danger d-inline">
                        <input type="checkbox" id="checkboxDanger2">
                        <label for="checkboxDanger2">
                        </label>
                      </div>
                      <div class="icheck-danger d-inline">
                        <input type="checkbox" disabled id="checkboxDanger3">
                        <label for="checkboxDanger3">
                          Danger checkbox
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6">

                    <div class="form-group clearfix">
                      <div class="icheck-danger d-inline">
                        <input type="radio" name="r2" checked id="radioDanger1">
                        <label for="radioDanger1">
                        </label>
                      </div>
                      <div class="icheck-danger d-inline">
                        <input type="radio" name="r2" id="radioDanger2">
                        <label for="radioDanger2">
                        </label>
                      </div>
                      <div class="icheck-danger d-inline">
                        <input type="radio" name="r2" disabled id="radioDanger3">
                        <label for="radioDanger3">
                          Danger radio
                        </label>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-6">

                    <div class="form-group clearfix">
                      <div class="icheck-success d-inline">
                        <input type="checkbox" checked id="checkboxSuccess1">
                        <label for="checkboxSuccess1">
                        </label>
                      </div>
                      <div class="icheck-success d-inline">
                        <input type="checkbox" id="checkboxSuccess2">
                        <label for="checkboxSuccess2">
                        </label>
                      </div>
                      <div class="icheck-success d-inline">
                        <input type="checkbox" disabled id="checkboxSuccess3">
                        <label for="checkboxSuccess3">
                          Success checkbox
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6">

                    <div class="form-group clearfix">
                      <div class="icheck-success d-inline">
                        <input type="radio" name="r3" checked id="radioSuccess1">
                        <label for="radioSuccess1">
                        </label>
                      </div>
                      <div class="icheck-success d-inline">
                        <input type="radio" name="r3" id="radioSuccess2">
                        <label for="radioSuccess2">
                        </label>
                      </div>
                      <div class="icheck-success d-inline">
                        <input type="radio" name="r3" disabled id="radioSuccess3">
                        <label for="radioSuccess3">
                          Success radio
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="card-footer">
                Many more skins available. <a href="https://bantikyan.github.io/icheck-bootstrap/">Documentation</a>
              </div>
            </div>

            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">Bootstrap Switch</h3>
              </div>
              <div class="card-body">
                <input type="checkbox" name="my-checkbox" checked data-bootstrap-switch>
                <input type="checkbox" name="my-checkbox" checked data-bootstrap-switch data-off-color="danger" data-on-color="success">
              </div>
            </div>

          </div>

        </div> -->
        <!-- /.row -->
        <div class="row">
          <div class="col-md-12">
            <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title">bs-stepper</h3>
              </div>
              <div class="card-body p-0">
                <div class="bs-stepper">
                  <div class="bs-stepper-header" role="tablist">
                    <!-- your steps here -->
                    <div class="step" data-target="#logins-part">
                      <button type="button" class="step-trigger" role="tab" aria-controls="logins-part" id="logins-part-trigger">
                        <span class="bs-stepper-circle">1</span>
                        <span class="bs-stepper-label">Logins</span>
                      </button>
                    </div>
                    <div class="line"></div>
                    <div class="step" data-target="#information-part">
                      <button type="button" class="step-trigger" role="tab" aria-controls="information-part" id="information-part-trigger">
                        <span class="bs-stepper-circle">2</span>
                        <span class="bs-stepper-label">Various information</span>
                      </button>
                    </div>
                  </div>
                  <div class="bs-stepper-content">
                    <!-- your steps content here -->
                    <div id="logins-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" value="{{old('email')}}">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" value="{{old('password')}}">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Confirm Password</label>
                        <input type="password" name="confirm_password" class="form-control" id="exampleInputPassword1" placeholder="Confirm Password" value="{{old('confirm_password')}}">
                      </div>
                      <button class="btn btn-primary" onclick="stepper.next()">Next</button>
                    </div>
                    <div id="information-part" class="content" role="tabpanel" aria-labelledby="information-part-trigger">
                      <div class="form-group">
                        <label for="exampleInputFile">File input</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <!-- <input type="file" class="custom-file-input" id="exampleInputFile"> -->

            <input type="file" class="custom-file-input" id="exampleInputFile" name="patients_profile_picture" onchange="previewFile(this);" value="{{old('profile_picture')}}" required>


                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                          </div>

                          <div class="input-group-append">
                            <span class="input-group-text">Upload</span>
                          </div>
                        </div>
<br>
                        <div>
                            <img id="previewImg" src="" style="height: 20%; width: 20%; border-radius: 5px;" alt="Select Profile Picture">
                          </div>

                      </div>
                      <button class="btn btn-primary" onclick="stepper.previous()">Previous</button>
                      <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                Visit <a href="https://github.com/Johann-S/bs-stepper/#how-to-use-it">bs-stepper documentation</a> for more examples and information about the plugin.
              </div>
            </div>
            <!-- /.card -->
          </div>
        </div>

        <script>
    function previewFile(input){
        var file = $("input[type=file]").get(0).files[0];

        if(file){
            var reader = new FileReader();

            reader.onload = function(){
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
                <h3 class="card-title">Dropzone.js <small><em>jQuery File Upload</em> like look</small></h3>
              </div>
              <div class="card-body">
                <div id="actions" class="row">


<div class="form-group">
                        <label for="exampleInputFile">File input</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <!-- <input type="file" class="custom-file-input" id="exampleInputFile"> -->
<caption style="color: red;">You have to combine all certificates images in one pdf</caption>
            <input type="file" id="exampleInputFile" name="patients_report" class="form-control" value="{{old('pdf_file_of_certificate')}}" required>

                          </div>

                          <div class="input-group-append">
                            <span class="input-group-text">Upload</span>
                          </div>
                        </div>
<br>
                        <div>
                            <img id="previewImg2" src="" style="height: 20%; width: 20%; border-radius: 5px;" alt="Select Pdf File">
                          </div>

                      </div>



                  <!-- <div class="col-lg-6">
                    <div class="btn-group w-100">
                      <span class="btn btn-success col fileinput-button">
                        <i class="fas fa-plus"></i>
                        <span>Add files</span>
                      </span>
                      <button type="submit" class="btn btn-primary col start">
                        <i class="fas fa-upload"></i>
                        <span>Start upload</span>
                      </button>
                      <button type="reset" class="btn btn-warning col cancel">
                        <i class="fas fa-times-circle"></i>
                        <span>Cancel upload</span>
                      </button>
                    </div>
                  </div> -->
                  <!-- <div class="col-lg-6 d-flex align-items-center">
                    <div class="fileupload-process w-100">
                      <div id="total-progress" class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                        <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress></div>
                      </div>
                    </div>
                  </div> -->
                </div>
                <!-- <div class="table table-striped files" id="previews">
                  <div id="template" class="row mt-2">
                    <div class="col-auto">
                        <span class="preview"><img src="data:," alt="" data-dz-thumbnail /></span>
                    </div>
                    <div class="col d-flex align-items-center">
                        <p class="mb-0">
                          <span class="lead" data-dz-name></span>
                          (<span data-dz-size></span>)
                        </p>
                        <strong class="error text-danger" data-dz-errormessage></strong>
                    </div>
                    <div class="col-4 d-flex align-items-center">
                        <div class="progress progress-striped active w-100" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                          <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress></div>
                        </div>
                    </div>
                    <div class="col-auto d-flex align-items-center">
                      <div class="btn-group">
                        <button class="btn btn-primary start">
                          <i class="fas fa-upload"></i>
                          <span>Start</span>
                        </button>
                        <button data-dz-remove class="btn btn-warning cancel">
                          <i class="fas fa-times-circle"></i>
                          <span>Cancel</span>
                        </button>
                        <button data-dz-remove class="btn btn-danger delete">
                          <i class="fas fa-trash"></i>
                          <span>Delete</span>
                        </button>
                      </div>
                    </div>
                  </div>
                </div> -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                Visit <a href="https://www.dropzonejs.com">dropzone.js documentation</a> for more examples and information about the plugin.
              </div>
            </div>
            <!-- /.card -->
          </div>
        </div>





        <!-- Social Links -->








<!-- <script>
    function previewFileOne(input){
        var file = $("input[type=file]").get(0).files[0];

        if(file){
            var reader = new FileReader();

            reader.onload = function(){
                $("#previewImgOne").attr("src", reader.result);
            }

            reader.readAsDataURL(file);
        }
    }
</script> -->

<!-- Social Links -->
<!--  -->
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
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">

You have to check whether you filled the form or not.<br>
By giving your information, you are giving the right to invastigate about you.
<br>
Thanks for being with us.
<!--  -->



<!-- <div id="inserted_item_data"></div> -->


<!--  -->


                <!-- <div class="form-group">
                  <label>Work Place</label>
                  <select class="form-control select2" style="width: 100%;">
                    <option selected="selected">Alabama</option>
                    <option>Alaska</option>
                    <option>California</option>
                    <option>Delaware</option>
                    <option>Tennessee</option>
                    <option>Texas</option>
                    <option>Washington</option>
                  </select>

                  <input type="text" name="work_place" class="form-control" style="width: 100%;">
                </div> -->
                <!-- /.form-group -->
                <!-- <div class="form-group">
                  <label>Works Mobile Number</label>
                  <select class="form-control select2" style="width: 100%;">
                    <option selected="selected">Alabama</option>
                    <option>Alaska</option>
                    <option>California</option>
                    <option>Delaware</option>
                    <option>Tennessee</option>
                    <option>Texas</option>
                    <option>Washington</option>
                  </select>

                  <input type="text" name="works_mobile_phone" class="form-control" style="width: 100%;">
                </div> -->
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <button type="submit" name="submit" class="btn btn-default btn-block">Register</button>
                <!-- <div class="form-group">
                  <label>Phone Number</label>
                  <select class="select2" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
                    <option>Alabama</option>
                    <option>Alaska</option>
                    <option>California</option>
                    <option>Delaware</option>
                    <option>Tennessee</option>
                    <option>Texas</option>
                    <option>Washington</option>
                  </select>
                  <input type="text" name="phonenumber" class="form-control" style="width: 100%;">
                </div> -->
                <!-- /.form-group -->
                <!-- <div class="form-group">
                  <label>Fax</label>
                  <select class="form-control select2" style="width: 100%;">
                    <option selected="selected">Alabama</option>
                    <option>Alaska</option>
                    <option disabled="disabled">California (disabled)</option>
                    <option>Delaware</option>
                    <option>Tennessee</option>
                    <option>Texas</option>
                    <option>Washington</option>
                  </select>
                  <input type="text" name="fax" class="form-control" style="width: 100%;">
                </div> -->
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <h5></h5>

            <!-- /.row -->
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            Visit <a href="https://select2.github.io/">Select2 documentation</a> for more examples and information about
            the plugin.
          </div>
        </div>
<!--  -->
        <!-- /.row -->
        <!-- <div class="row">
          <div class="col-md-12">
            <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title">Dropzone.js <small><em>jQuery File Upload</em> like look</small></h3>
              </div>
              <div class="card-body">
                <div id="actions" class="row">
                  <div class="col-lg-6">
                    <div class="btn-group w-100">
                      <span class="btn btn-success col fileinput-button">
                        <i class="fas fa-plus"></i>
                        <span>Add files</span>
                      </span>
                      <button type="submit" class="btn btn-primary col start">
                        <i class="fas fa-upload"></i>
                        <span>Start upload</span>
                      </button>
                      <button type="reset" class="btn btn-warning col cancel">
                        <i class="fas fa-times-circle"></i>
                        <span>Cancel upload</span>
                      </button>
                    </div>
                  </div>
                  <div class="col-lg-6 d-flex align-items-center">
                    <div class="fileupload-process w-100">
                      <div id="total-progress" class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                        <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="table table-striped files" id="previews">
                  <div id="template" class="row mt-2">
                    <div class="col-auto">
                        <span class="preview"><img src="data:," alt="" data-dz-thumbnail /></span>
                    </div>
                    <div class="col d-flex align-items-center">
                        <p class="mb-0">
                          <span class="lead" data-dz-name></span>
                          (<span data-dz-size></span>)
                        </p>
                        <strong class="error text-danger" data-dz-errormessage></strong>
                    </div>
                    <div class="col-4 d-flex align-items-center">
                        <div class="progress progress-striped active w-100" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                          <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress></div>
                        </div>
                    </div>
                    <div class="col-auto d-flex align-items-center">
                      <div class="btn-group">
                        <button class="btn btn-primary start">
                          <i class="fas fa-upload"></i>
                          <span>Start</span>
                        </button>
                        <button data-dz-remove class="btn btn-warning cancel">
                          <i class="fas fa-times-circle"></i>
                          <span>Cancel</span>
                        </button>
                        <button data-dz-remove class="btn btn-danger delete">
                          <i class="fas fa-trash"></i>
                          <span>Delete</span>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="card-footer">
                Visit <a href="https://www.dropzonejs.com">dropzone.js documentation</a> for more examples and information about the plugin.
              </div>
            </div>

          </div>
        </div> -->

      </div>

    </section>


  <aside class="control-sidebar control-sidebar-dark">

  </aside>

</div>






</form>

<script src="http://code.jquery.com/jquery-1.9.1.js"></script>

<!-- jQuery -->
<script src="{{asset('../../plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('../../plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- Select2 -->
<script src="{{asset('../../plugins/select2/js/select2.full.min.js')}}"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="{{asset('../../plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js')}}"></script>
<!-- InputMask -->
<script src="{{asset('../../plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('../../plugins/inputmask/jquery.inputmask.min.js')}}"></script>
<!-- date-range-picker -->
<script src="{{asset('../../plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- bootstrap color picker -->
<script src="{{asset('../../plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('../../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Bootstrap Switch -->
<script src="{{asset('../../plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>
<!-- BS-Stepper -->
<script src="{{asset('../../plugins/bs-stepper/js/bs-stepper')}}.min.js"></script>
<!-- dropzonejs -->
<script src="{{asset('../../plugins/dropzone/min/dropzone.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('../../dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('../../dist/js/demo.js')}}"></script>
<!-- Page specific script -->


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
            //     $('#save').click(function(){
            //       var item_name = [];
            //       var item_code = [];
            //       var item_desc = [];
            //       var item_price = [];

            //       $('.item_name').each(function(){
            //         item_name.push($(this).text());
            //       });
            //         $('.item_code').each(function(){
            //         item_code.push($(this).text());
            //       });
            //         $('.item_desc').each(function(){
            //         item_desc.push($(this).text());
            //       });
            //         $('.item_price').each(function(){
            //         item_price.push($(this).text());
            //       });

            // // if (item_name!=''&&item_code!=''&&item_desc!=''&&item_price!='') {

            // //         $.ajax({
            // //           url : "insert",
            // //           method : "POST",
            // //           data : {item_name:item_name, item_code:item_code,item_desc:item_desc,item_price:item_price},
            // //           success:function(data)
            // //           {
            // //             $("td[contenteditable='true']").text("");
            // //             for (var i = 2; i <= count; i++) {
            // //               $('tr#'+i+'').remove();
            // //             }
            // //             window.alert("Data Saved Successfully");
            // //             fetch_item_data();
            // //           }
            // //         });
            // //       }
            // //       else
            // //       {
            // //         window.alert("All fields are required");
            // //       }
            //     });

            // function fetch_item_data()
            // {
            //   $.ajax({
            //     url: "fetch.php",
            //     method: "POST",
            //     success: function(data)
            //     {
            //       $('#inserted_item_data').html(data);
            //     }
            //   })
            // }

            // fetch_item_data();

        });
    </script>

<script>
  $(document).ready(function () {

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
    $('#add').click(function(){
      count = count+1;
      var html_code = "<tr id='row"+count+"'>";
      html_code += "<td ><input class='item_name' type='text' name='social_network_link[]' style='width: 100%;'></td>";

      html_code += "<td><button type='button' name='remove' data-row='row"+count+"' class='bt btn-danger btn-xs remove'><i class='icon-remove'>Remove</i></button></td>";
      html_code += "</tr>";
      $('#crud_table').append(html_code);
    });
    $(document).on('click', '.remove', function() {
      var delete_row = $(this).data("row");
      $('#' + delete_row).remove();
    });
//     $('#save').click(function(){
//       var item_name = [];
//       var item_code = [];
//       var item_desc = [];
//       var item_price = [];

//       $('.item_name').each(function(){
//         item_name.push($(this).text());
//       });
//         $('.item_code').each(function(){
//         item_code.push($(this).text());
//       });
//         $('.item_desc').each(function(){
//         item_desc.push($(this).text());
//       });
//         $('.item_price').each(function(){
//         item_price.push($(this).text());
//       });

// // if (item_name!=''&&item_code!=''&&item_desc!=''&&item_price!='') {

// //         $.ajax({
// //           url : "insert",
// //           method : "POST",
// //           data : {item_name:item_name, item_code:item_code,item_desc:item_desc,item_price:item_price},
// //           success:function(data)
// //           {
// //             $("td[contenteditable='true']").text("");
// //             for (var i = 2; i <= count; i++) {
// //               $('tr#'+i+'').remove();
// //             }
// //             window.alert("Data Saved Successfully");
// //             fetch_item_data();
// //           }
// //         });
// //       }
// //       else
// //       {
// //         window.alert("All fields are required");
// //       }
//     });

    // function fetch_item_data()
    // {
    //   $.ajax({
    //     url: "fetch.php",
    //     method: "POST",
    //     success: function(data)
    //     {
    //       $('#inserted_item_data').html(data);
    //     }
    //   })
    // }

    // fetch_item_data();

  });
</script>



<script>
  $(document).ready(function () {
    var count = 1;
    $('#add_one').click(function(){
      count = count+1;
      var html_code = "<tr id='row"+count+"'>";
      html_code += "<td ><input class='item_name_one' type='text' name='specialist_of[]' style='width: 100%;'><button type='button' name='remove_one' class='bt btn-danger btn-xs remove_one'><i class='icon-remove'>Remove</i></button></td>";
      html_code += "</tr>";
      $('#speciality').append(html_code);
    });
    $(document).on('click', '.remove_one', function() {
      //var delete_row_one = $(this).Id('first');
      //$('#' + delete_row).remove();
      //delete_row_one.deleteRow(oButton.parentNode.parentNode.rowIndex);
      $(this).parents('tr').remove();
    });
//     $('#save').click(function(){
//       var item_name_one = [];
//       var item_code = [];
//       var item_desc = [];
//       var item_price = [];

//       $('.item_name_one').each(function(){
//         item_name_one.push($(this).text());
//       });
//         $('.item_code').each(function(){
//         item_code.push($(this).text());
//       });
//         $('.item_desc').each(function(){
//         item_desc.push($(this).text());
//       });
//         $('.item_price').each(function(){
//         item_price.push($(this).text());
//       });

// if (item_name_one!=''&&item_code!=''&&item_desc!=''&&item_price!='') {

//         $.ajax({
//           url : "insert",
//           method : "POST",
//           data : {item_name_one:item_name_one, item_code:item_code,item_desc:item_desc,item_price:item_price},
//           success:function(data)
//           {
//             $("td[contenteditable='true']").text("");
//             for (var i = 2; i <= count; i++) {
//               $('tr#'+i+'').remove();
//             }
//             window.alert("Data Saved Successfully");
//             fetch_item_data();
//           }
//         });
//       }
//       else
//       {
//         window.alert("All fields are required");
//       }
//     });

    // function fetch_item_data()
    // {
    //   $.ajax({
    //     url: "fetch.php",
    //     method: "POST",
    //     success: function(data)
    //     {
    //       $('#inserted_item_data').html(data);
    //     }
    //   })
    // }

    // fetch_item_data();

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
    privates: [
      {
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
    //from: {},
    //to: {}
   },

  components: {
    //cities_values: [],
  },

   methods: {
    checkForm: function (e) {
      this.errors = [];
if (!this.countries_id) {
        this.errors.push("Country is required.");
      }
        //else if (!this.validEmail(this.email)) {
      //   this.errors.push('Valid email required.');
      // }

      if (!this.errors.length) {
        //console.log(this.countries_id);
      this.errors = [];
      axios.get('', {
        //request: 'routine',
        countries_id: this.countries_id,

        //days: this.days,
        //subjects: this.subjects,
        //starting_time_slot: this.starting_time_slot,
        //ending_time_slot: this.ending_time_slot,
       })
       .then(function(response) {
        //console.log(response);
        if (response.status == 200) {
          //window.location.href = 'add_routine.php';
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

  fetchData: function (id) {
    console.log(id);
   axios.get('./get_city_for_thana/' + id).then(response=>{
    console.log(response.data.data);

    this.cities_values = response.data.data,
    app.cities_id = '';
    //this.cities_values,
    console.log(this.cities_values);
    // application.classes = response.data.classes;
    // application.subjects = response.data.subjects;
    // application.hiddenId = response.data.id;
    // application.myModel = true;
    // application.actionButton = 'Update';
    // application.dynamicTitle = 'Edit subject';
   })
  //id.preventDefault();
  },

  fetchDataForCity: function (id) {
    console.log(id);
   axios.get('./get_thana_for_area/' + id).then(response=>{
    console.log(response.data.data);

    this.thanas_values = response.data.data,
    app.thanas_id = '';
    //this.cities_values,
    console.log(this.thanas_values);
    // application.classes = response.data.classes;
    // application.subjects = response.data.subjects;
    // application.hiddenId = response.data.id;
    // application.myModel = true;
    // application.actionButton = 'Update';
    // application.dynamicTitle = 'Edit subject';
   })
  //id.preventDefault();
  },

  fetchDataForThana: function (id) {
    console.log(id);
   axios.get('./get_area_for_address/' + id).then(response=>{
    console.log(response.data.data);

    this.areas_values = response.data.data,
    app.areas_id = '';
    //this.cities_values,
    console.log(this.areas_values);
    // application.classes = response.data.classes;
    // application.subjects = response.data.subjects;
    // application.hiddenId = response.data.id;
    // application.myModel = true;
    // application.actionButton = 'Update';
    // application.dynamicTitle = 'Edit subject';
   })
  //id.preventDefault();
  },

    // validEmail: function (email) {
    //   var re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    //   return re.test(email);
    // },
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
    privates: [
      {
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
    //from: {},
    //to: {}
   },

  components: {
    //cities_values: [],
  },

   methods: {
    checkForm: function (e) {
      this.errors = [];
if (!this.countries_id) {
        this.errors.push("Country is required.");
      }
        //else if (!this.validEmail(this.email)) {
      //   this.errors.push('Valid email required.');
      // }

      if (!this.errors.length) {
        //console.log(this.countries_id);
      this.errors = [];
      axios.get('', {
        //request: 'routine',
        countries_id: this.countries_id,

        //days: this.days,
        //subjects: this.subjects,
        //starting_time_slot: this.starting_time_slot,
        //ending_time_slot: this.ending_time_slot,
       })
       .then(function(response) {
        //console.log(response);
        if (response.status == 200) {
          //window.location.href = 'add_routine.php';
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

  fetchData: function (id) {
    console.log(id);
   axios.get('./get_city_for_thana/' + id).then(response=>{
    console.log(response.data.data);

    this.cities_values = response.data.data,
    application.cities_id = '';
    //this.cities_values,
    console.log(this.cities_values);
    // application.classes = response.data.classes;
    // application.subjects = response.data.subjects;
    // application.hiddenId = response.data.id;
    // application.myModel = true;
    // application.actionButton = 'Update';
    // application.dynamicTitle = 'Edit subject';
   })
  //id.preventDefault();
  },

  fetchDataForCity: function (id) {
    console.log(id);
   axios.get('./get_thana_for_area/' + id).then(response=>{
    console.log(response.data.data);

    this.thanas_values = response.data.data,
    application.thanas_id = '';
    //this.cities_values,
    console.log(this.thanas_values);
    // application.classes = response.data.classes;
    // application.subjects = response.data.subjects;
    // application.hiddenId = response.data.id;
    // application.myModel = true;
    // application.actionButton = 'Update';
    // application.dynamicTitle = 'Edit subject';
   })
  //id.preventDefault();
  },

  fetchDataForThana: function (id) {
    console.log(id);
   axios.get('./get_area_for_address/' + id).then(response=>{
    console.log(response.data.data);

    this.areas_values = response.data.data,
    application.areas_id = '';
    //this.cities_values,
    console.log(this.areas_values);
    // application.classes = response.data.classes;
    // application.subjects = response.data.subjects;
    // application.hiddenId = response.data.id;
    // application.myModel = true;
    // application.actionButton = 'Update';
    // application.dynamicTitle = 'Edit subject';
   })
  //id.preventDefault();
  },

    // validEmail: function (email) {
    //   var re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    //   return re.test(email);
    // },
    login: function() {

    }
   }
  })
              </script>



<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });
    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })

    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    });

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });

  })
  // BS-Stepper Init
  document.addEventListener('DOMContentLoaded', function () {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
  });

  // DropzoneJS Demo Code Start
  Dropzone.autoDiscover = false;

  // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
  var previewNode = document.querySelector("#template");
  previewNode.id = "";
  var previewTemplate = previewNode.parentNode.innerHTML;
  previewNode.parentNode.removeChild(previewNode);

  var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
    url: "/target-url", // Set the url
    thumbnailWidth: 80,
    thumbnailHeight: 80,
    parallelUploads: 20,
    previewTemplate: previewTemplate,
    autoQueue: false, // Make sure the files aren't queued until manually added
    previewsContainer: "#previews", // Define the container to display the previews
    clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
  });

  myDropzone.on("addedfile", function(file) {
    // Hookup the start button
    file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file); };
  });

  // Update the total progress bar
  myDropzone.on("totaluploadprogress", function(progress) {
    document.querySelector("#total-progress .progress-bar").style.width = progress + "%";
  });

  myDropzone.on("sending", function(file) {
    // Show the total progress bar when upload starts
    document.querySelector("#total-progress").style.opacity = "1";
    // And disable the start button
    file.previewElement.querySelector(".start").setAttribute("disabled", "disabled");
  });

  // Hide the total progress bar when nothing's uploading anymore
  myDropzone.on("queuecomplete", function(progress) {
    document.querySelector("#total-progress").style.opacity = "0";
  });

  // Setup the buttons for all transfers
  // The "add files" button doesn't need to be setup because the config
  // `clickable` has already been specified.
  document.querySelector("#actions .start").onclick = function() {
    myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED));
  };
  document.querySelector("#actions .cancel").onclick = function() {
    myDropzone.removeAllFiles(true);
  };
  // DropzoneJS Demo Code End
</script>
</body>
</html>
