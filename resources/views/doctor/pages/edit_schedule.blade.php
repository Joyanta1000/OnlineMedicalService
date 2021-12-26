<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="user-id" content="{{ Session::get('id') }}" />
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
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        @include('doctor.includes.navbar')
        @include('doctor.includes.sidebar')
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1></h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Advanced Form</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Schedule</h3>
                                </div>
                                <form action="{{ route('add_doctors_schedule') }}" method="POST">
                                    <div class="card-body">
                                        @if (session('status'))
                                            <div class="alert alert-success" role="alert">
                                                <button type="button" class="close"
                                                    data-dismiss="alert">×</button>
                                                {{ session('status') }}
                                            </div>
                                        @elseif(session('failed'))
                                            <div class="alert alert-danger" role="alert">
                                                <button type="button" class="close"
                                                    data-dismiss="alert">×</button>
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
                                        <div class="form-group">
                                            {{ dd(json_decode($showSchedule->schedule)) }}
                                            @foreach (json_decode($showSchedule->schedule) as $key => $value)
                                                <label for="">{{strtok($key, " ")}}:</label>
                                                <input class="form-control" name="sat_time_1" type="time" value="{{ $value }}" readonly />
                                                {{-- @if (!$loop->last)
                                                    (to)
                                                @endif --}}
                                            @endforeach
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        @include('doctor.includes.footer')
        <aside class="control-sidebar control-sidebar-dark">
        </aside>
    </div>
    <script src="{{ mix('/js/app.js') }}"></script>
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
    <script type="text/javascript">
        var app = new Vue({
            el: '#app',
            data: {
                errors: [],
                countries_id: "",
                cities_id: "",
                id: "",
                city: "",
                thanas_id: "",
                cities_values: [],
                thanas_values: [],
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

            components: {

            },

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
                    axios.get('/get_city_for_thana/' + id).then(response => {
                        console.log(response.data.data);

                        this.cities_values = response.data.data,
                            app.cities_id = '';
                        console.log(this.cities_values);
                    })
                },
                fetchDataForCity: function(id) {
                    console.log(id);
                    axios.get('/get_thana_for_area/' + id).then(response => {
                        console.log(response.data.data);

                        this.thanas_values = response.data.data,
                            app.thanas_id = '';
                        console.log(this.thanas_values);
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
