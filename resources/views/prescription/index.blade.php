<!DOCTYPE html>
<html lang="en">
<!-- header -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="user-id" content="{{ Session::get('id') }}" />
    <title>AdminLTE 3 | Advanced form elements</title>
    @push('styles')
    @endpush
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
    <link rel="stylesheet" href="{{ asset('../../plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet"
        href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css') }}"
        integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />
    <style>
        .header {
            background-color: #2c2f33;
            color: white;
            max-width: 100%;
            max-height: 500px;
            display: flex;
        }

        .h {
            float: right;
            color: rgb(248, 244, 244);
            margin-left: 0px;
            margin-top: 10px;
            font-size: 10px;
        }

        h1 {
            font-size: 20px;
        }

        h2 {
            font-size: 20px;
        }

        h3 {
            font-size: 20px;
        }

        .img {
            margin: 30px;
        }

        .time {
            float: right;
            position: absolute;
            right: 10px;
            color: rgb(0, 0, 0);
        }

        .another_div {
            display: flex;
            max-height: 400px;
            margin-top: 10px;
            max-width: 500px;
        }

        .grid-container {
            display: grid;
            grid-template-columns: auto auto auto;
            padding: 10px;
        }

        .grid-item {
            background-color: rgba(255, 255, 255, 0.8);
            border: 1px solid rgba(0, 0, 0, 0.8);
            padding: 20px;
            font-size: 20px;
            text-align: center;
            max-width: 800px;
            min-width: 20px;
            font-size: 20px;
        }

        .grid-width-1 {
            width: 200px;
            min-width: 20px;
        }

        .grid-width-2 {
            width: 1020px;
            min-width: 20px;
        }

        @mediaonlyscreenand(max-width: 768px) {
            [class*="grid-width-"] {
                width: 20%;
            }
        }

        #prescription {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #prescription td,
        #prescription th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #prescription tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #prescription tr:hover {
            background-color: #ddd;
        }

        #prescription th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #0b0c0c;
            color: white;
        }

        div.container {
            padding: 10px;
        }

    </style>
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
                            <h1>Advanced Form</h1>
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
                <div class="container-fluid">
                    <form action="{{ route('prescription_for_doctor.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                            <div class="container">
                                <div class="header">
                                    <div>
                                        <img class="img" style="max-height: 120px; max-width: 120px;"
                                            src="{{ asset('./logo/logo_4.png') }}" alt="">
                                        <div class="h">
                                            <h1>{{ $doctorsInfo->doctor->first()->first_name }}
                                                {{ $doctorsInfo->doctor->first()->last_name }}</h1>
                                            @foreach ($doctorsInfo->doctors_specialities as $doctors_specialities)
                                                <h3>{{ $doctors_specialities->specialist_of }}</h3>
                                            @endforeach

                                            <h3>{{ $doctorsAddresses->address }}, Zip:
                                                {{ $doctorsAddresses->zip_code }}</h3>
                                            <h3>{{ $doctorsAddresses->area->area }},
                                                {{ $doctorsAddresses->thana->thana }},
                                                {{ $doctorsAddresses->city->city }},
                                                {{ $doctorsAddresses->country->country }}</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="another_div">
                                    <div>
                                        <h2>{{ $patientsInfo->patient->first()->first_name }}
                                            {{ $patientsInfo->patient->first()->last_name }}</h2>
                                        <h3>Patient No: <input type="hidden" name="patients_id"
                                                value="{{ $patientsInfo->id }}" /> {{ $patientsInfo->id }}</h3>
                                    </div>
                                    <div class="time">
                                        <h3>Date: {{ date('D M Y') }}</h3>
                                        <h3>Prescription ID: {{ $prescription ? $prescription->id + 1 : 2112000001 }}
                                        </h3>
                                    </div>
                                </div>
                                <hr>
                                <div>
                                    <div>
                                        <div class="field">
                                            <select id="select-test" placeholder="Select test...">
                                                <option value="">Select test...</option>
                                                @foreach ($tests as $test)
                                                    <option value="{{ $test->id }}">
                                                        {{ $test->test }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <hr>
                                        <div class="testShow">
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div>
                                    <div>
                                        <div class="field">
                                            <select id="select-problem" placeholder="Select patients problem...">
                                                <option value="">Select patients problem...</option>
                                                @foreach ($problems as $problem)
                                                    <option value="{{ $problem->id }}">
                                                        {{ $problem->problems_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <hr>
                                        <div class="problemShow">
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div>
                                    <div>
                                        <div class="field">
                                            <select id="" name="refer" placeholder="Select reference...">
                                                <option value="">Refer to...</option>
                                                @foreach ($doctors as $doctor)
                                                    <option value="{{ $doctor->doctors_id }}">
                                                        {{ $doctor->first_name }} {{ $doctor->last_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <hr>
                                    </div>
                                </div>
                                <hr>
                                <div>
                                    <div>
                                        <div class="field">
                                            <select id="select-state" placeholder="Pick a medicine...">
                                                <option value="">Select a state...</option>
                                                @foreach ($medicines as $medicine)
                                                    <option value="{{ $medicine->id }}">
                                                        {{ $medicine->medicines_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div>
                                    <table style="width: 100%; font-size: 15px; text-align: center; padding: 20px;"
                                        id="prescription">
                                        <thead>
                                            <th>Medicine</th>
                                            <th>Frequency</th>
                                            <th>Time </th>
                                            <th>Duration</th>
                                            <th>Qty</th>
                                            <th>Action</th>
                                        </thead>
                                        <tbody class="rows">
                                        </tbody>
                                    </table>
                                    <input type="hidden" name="appointment_id" value="{{$appointment_id}}"/>
                                    <button type="submit" name="submit"
                                        class="btn btn-primary form-control">Prescribe</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
        @include('doctor.includes.footer')
        <aside class="control-sidebar control-sidebar-dark">
        </aside>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/microplugin/0.0.3/microplugin.min.js"
        integrity="sha512-7amIsiQ/hxbdPNawBZwmWBWPiwQRNEJlxTj6eVO+xmWd71fs79Iydr4rYARHwDf0rKHpysFxWbj64fjPRHbqfA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/microplugin/0.0.3/microplugin.js"
        integrity="sha512-IGkpKApwIHDYxPMj2y0hX8dZsPslpdO8Bi12c2aNvLKsF8YjnwJHtjx0NvrTXBm8R9Qq+Nn0Sf/Hf+InGpmBeA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js"
        integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
    <script>
        var jq14 = jQuery.noConflict(true);
        (function($) {
            $(document).ready(function() {


                var wrapperTest = $(".testShow");
                $('#select-test').change(function() {
                    var x = 1;
                    var y = 0;
                    var max_fields = 10;
                    console.log($(this).val());
                    console.log($('#select-test').find("option:selected").text());
                    if ($(this).val() != '') {
                        if (x < max_fields) {
                            x++;
                            $(wrapperTest).append(
                                '<span><input type="hidden" name="tests_id[]" value="' + $(this)
                                .val() + '"/><input class="form-control" value="' + $(this).find(
                                    "option:selected").text() +
                                '" readonly/><br><textarea class="form-control" name="details[]" placeholder="Enter Details" required></textarea><br><a href="#"" class="deleteTest btn btn-danger">Delete</a><br></span>'
                            );
                            y++;
                        } else {
                            alert('You Reached the limits')
                        }
                    }
                });
                $(wrapperTest).on("click", ".deleteTest", function(e) {
                    e.preventDefault();
                    $(this).closest("span").remove();
                    x--;
                });

                var wrapperProblem = $(".problemShow");
                $('#select-problem').change(function() {
                    var x = 1;
                    var y = 0;
                    var max_fields = 10;
                    console.log($(this).val());
                    console.log($('#select-problem').find("option:selected").text());
                    if ($(this).val() != '') {
                        if (x < max_fields) {
                            x++;
                            $(wrapperProblem).append(
                                '<span><input type="hidden" name="problem[]" value="' + $(this)
                                .val() + '"/><input class="form-control" value="' + $(this).find(
                                    "option:selected").text() +
                                '" readonly/><a href="#"" class="deleteProblem btn btn-danger">Delete</a></span>'
                            );
                            y++;
                        } else {
                            alert('You Reached the limits')
                        }
                    }
                });
                $(wrapperProblem).on("click", ".deleteProblem", function(e) {
                    e.preventDefault();
                    $(this).closest("span").remove();
                    x--;
                });
                var wrapper = $(".rows");
                var x = 1;
                var y = 0;
                var max_fields = 10;
                $('#select-state').change(function() {
                    console.log($('#select-state').find("option:selected").text());
                    console.log('The option with value ' + $(this).val() + ' and text ' + $(this)
                        .text() + ' was selected.');
                    if ($(this).val() != '') {
                        if (x < max_fields) {
                            x++;
                            $(wrapper).append(
                                '<tr><td><input type="hidden" name="medicines_id[]" value="' + $(
                                    this).val() + '"/>' + $(this).find("option:selected").text() +
                                '</td><td><input type="hidden" checked value="0" name="mn[' + y +
                                ']" /><input type="checkbox" id="mn" name="mn[' + y +
                                ']" value="1">MN<input type="hidden" checked value="0" name="af[' +
                                y + ']" /><input type="checkbox" id="af" name="af[' + y +
                                ']" value="1">AF<input type="hidden" checked value="0" name="en[' +
                                y + ']" /><input type="checkbox" id="en" name="en[' + y +
                                ']" value="1">EN<input type="hidden" checked value="0" name="nt[' +
                                y + ']" /><input type="checkbox" id="nt" name="nt[' + y +
                                ']" value="1">NT</td><td><input type="hidden" checked value="0" name="before_food[' +
                                y +
                                ']" /><input type="checkbox" id="flexRadioDefault1" name="before_food[' +
                                y +
                                ']" value="1"> Before Food<input type="hidden" checked value="0" name="after_food[' +
                                y + ']" /><input type="checkbox" id="" name="after_food[' + y +
                                ']" value="1"> After Food</td><td><input type="date" name="duration[]"></td><td><input type="number" name="qty[]"></td><td><a href="#"" class="delete btn btn-danger">Delete</a></td></tr>'
                            );
                            y++;
                        } else {
                            alert('You Reached the limits')
                        }
                    }
                });
                $(wrapper).on("click", ".delete", function(e) {
                    e.preventDefault();
                    $(this).closest("tr").remove();
                    x--;
                });
                $('select').selectize({
                    sortField: 'text'
                });
            });
        }(jq14));
    </script>
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
</body>

</html>
