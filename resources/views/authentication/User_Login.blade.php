<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Log in (v2)</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('../../plugins/fontawesome-free/css/all.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('../../plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('../../dist/css/adminlte.min.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="../../index2.html" class="h1"><b>Admin</b>LTE</a>
            </div>
           
            @include('authentication.flush-message')

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card-body">
                <p class="login-box-msg">Sign in to start your session</p>

                <span id="matchOrMissmatch"></span>
                <form action="{{ route('loginUser') }}" method="post">
                    @method('POST')
                    
                        @csrf
                        <span style="color: red;" id="emmailInvalid"></span>
                        <span style="color: green;" id="emmailValid"></span>
                        <br>
                        <div class="input-group mb-3">

                            <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                                value="{{ old('email') }}" onkeyup="loginVerify()">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                                <br>

                            </div>


                        </div>
                        <span style="color: red;" id="passwordRequired"></span>
                        <br>



                        <div class="input-group mb-3">
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Password" onkeyup="loginVerify()">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-8">
                                <div class="icheck-primary">
                                    <input type="checkbox" id="remember">
                                    <label for="remember">
                                        Remember Me
                                    </label>
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-4">
                                <button type="submit" class="btn btn-primary btn-block button">Sign
                                    In</button>
                            </div>
                            <!-- /.col -->
                        </div>
                    
                </form>

                <div class="social-auth-links text-center mt-2 mb-3">
                    <a href="#" class="btn btn-block btn-primary">
                        <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
                    </a>
                    <a href="#" class="btn btn-block btn-danger">
                        <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
                    </a>
                </div>
                <!-- /.social-auth-links -->

                <p class="mb-1">
                    <a href="/reset">I forgot my password</a>
                </p>

            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->

    {{-- <script type="text/javascript">
        var app = new Vue({
            el: '#app',
            data: {
                email: "",
                password: "",
                _token: "",
                // errors: [],
                // countries_id: "",
                // cities_id: "",
                // id: "",
                // city: "",
                // thanas_id: "",
                // cities_values: [],
                // thanas_values: [],
                // privates: [
                //   {
                //     zone: 'Zone 1',
                //     product: 'Product 1',
                //     content: 'Filled',
                //   },
                //   {
                //     zone: 'Zone 2',
                //     product: 'Product 2',
                //     content: 'Filled',
                //   },
                //   {
                //     zone: 'Zone 3',
                //     product: 'Product 3',
                //     content: 'Empty',
                //   },
                // ],
                //from: {},
                //to: {}
            },

            components: {
                //cities_values: [],
            },

            methods: {
                signin: function() {
                    // alert(this.email);
                    // alert(this.password);
                    axios.post('/login', {
                            headers: {
                                'content-type': 'apllication/json',
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },

                            email: this.email,
                            password: this.password,

                            _token: '{{ csrf_token() }}',
                        }).then(function(response) {
                            console.log(response);
                            if (response.status == 200) {
                                //alert("Schedule Added");
                            }
                        })
                        .catch(function(error) {
                            console.log(error);
                        });
                },
                //     checkForm: function (e) {
                //       this.errors = [];
                // if (!this.countries_id) {
                //         this.errors.push("Country is required.");
                //       }
                //         //else if (!this.validEmail(this.email)) {
                //       //   this.errors.push('Valid email required.');
                //       // }

                //       if (!this.errors.length) {
                //         //console.log(this.countries_id);
                //       this.errors = [];
                //       axios.get('', {
                //         //request: 'routine',
                //         countries_id: this.countries_id,

                //         //days: this.days,
                //         //subjects: this.subjects,
                //         //starting_time_slot: this.starting_time_slot,
                //         //ending_time_slot: this.ending_time_slot,
                //        })
                //        .then(function(response) {
                //         //console.log(response);
                //         if (response.status == 200) {
                //           //window.location.href = 'add_routine.php';
                //          alert('Gotten data');
                //         } else {
                //          alert("Failed to get.");
                //         }
                //        })
                //        .catch(function(error) {
                //         console.log(error);
                //        });
                //       }

                //       e.preventDefault();
                //     },

                //   fetchData: function (id) {
                //     console.log(id);
                //    axios.get('/get_city_for_thana/' + id).then(response=>{
                //     console.log(response.data.data);

                //     this.cities_values = response.data.data,
                //     app.cities_id = '';
                //     //this.cities_values,
                //     console.log(this.cities_values);
                //     // application.classes = response.data.classes;
                //     // application.subjects = response.data.subjects;
                //     // application.hiddenId = response.data.id;
                //     // application.myModel = true;
                //     // application.actionButton = 'Update';
                //     // application.dynamicTitle = 'Edit subject';
                //    })
                //   //id.preventDefault();
                //   },

                //   fetchDataForCity: function (id) {
                //     console.log(id);
                //    axios.get('/get_thana_for_area/' + id).then(response=>{
                //     console.log(response.data.data);

                //     this.thanas_values = response.data.data,
                //     app.thanas_id = '';
                //     //this.cities_values,
                //     console.log(this.thanas_values);
                //     // application.classes = response.data.classes;
                //     // application.subjects = response.data.subjects;
                //     // application.hiddenId = response.data.id;
                //     // application.myModel = true;
                //     // application.actionButton = 'Update';
                //     // application.dynamicTitle = 'Edit subject';
                //    })
                //   //id.preventDefault();
                //   },

                // validEmail: function (email) {
                //   var re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                //   return re.test(email);
                // },
                login: function() {

                }
            }
        })
    </script> --}}

    {{-- <script>
        let button = document.querySelector(".button");

        button.disabled = true;

        function loginVerify() {
            console.log($("#email").val());
            console.log($("#password").val());
            var validRegex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            if ($("#email").val() != null) {
                if ($("#email").val().match(validRegex)) {
                    $("#emmailValid").html('');
                    $("#emmailInvalid").html('');
                    $("#emmailValid").append('Valid Email Format');

                    if ($("#password").val() != '') {
                        $("#passwordRequired").html('');
                        button.disabled = false;

                        $.ajax({
                            url: "{{ route('loginVerification') }}",
                            type: "POST",
                            data: {
                                _token: '{{ csrf_token() }}',
                                email: $("#email").val(),
                                password: $("#password").val(),
                            },
                            cache: false,
                            dataType: 'json',
                            success: function(dataResult) {
                                $("#matchOrMissmatch").html('');
                                console.log(dataResult);
                                if (dataResult.dataSuccess) {
                                    $("#matchOrMissmatch").html(dataResult.dataSuccess)
                                    button.disabled = false;
                                } else {
                                    button.disabled = true;

                                    $("#matchOrMissmatch").html(dataResult.dataFailure);
                                }

                            }
                        });

                    } else {
                        $("#passwordRequired").html('');
                        $("#passwordRequired").append('Password is required');
                        button.disabled = true;
                    }
                    // alert('invalid');
                } else {
                    $("#emmailValid").html('');
                    $("#emmailInvalid").html('');
                    $("#emmailInvalid").html('Invalid Email Format');
                    button.disabled = true;
                }
            } else {
                $("#emmailValid").html('');
                $("#emmailInvalid").html('');
                $("#emmailInvalid").html('Email is required');
            }

        }
    </script> --}}

    <script src="{{ asset('../../plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('../../plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('../../dist/js/adminlte.min.js') }}"></script>
</body>

</html>
