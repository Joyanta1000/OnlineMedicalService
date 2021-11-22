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

        {{-- <link rel="stylesheet" href="{{asset('../../js/selectize-bootstrap4-theme-2.0.2/dist/css/selectize.bootstrap4.css')}}"> --}}
    @endpush
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('../../plugins/fontawesome-free/css/all.min.css') }}">
    <!-- daterange picker -->
    <link rel="stylesheet" href="{{ asset('../../plugins/daterangepicker/daterangepicker.css') }}">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{ asset('../../plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet"
        href="{{ asset('../../plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('../../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('../../plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('../../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="{{ asset('../../plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css') }}">
    <!-- BS Stepper -->
    <link rel="stylesheet" href="{{ asset('../../plugins/bs-stepper/css/bs-stepper.min.css') }}">
    <!-- dropzonejs -->
    <link rel="stylesheet" href="{{ asset('../../plugins/dropzone/min/dropzone.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('../../dist/css/adminlte.min.css') }}">


    <link rel="stylesheet" href="{{ asset('../../plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
    {{-- <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script> --}}

    {{-- <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}




    <link rel="stylesheet"
        href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css') }}"
        integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/selectize-bootstrap4-theme@2.0.2/dist/css/selectize.bootstrap4.css"> --}}



    <style>
        .header {
            background-color: #070707;
            color: white;
            /* text-align: center; */
            max-width: 100%;
            max-height: 500px;
            display: flex;
        }

        .h {
            float: right;
            color: rgb(248, 244, 244);
            margin-left: 30px;
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

            /* For mobile phones: */
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

    </style>





</head>
<!-- header -->

<body class="hold-transition sidebar-mini">

    <div class="wrapper">

        @include('prescription.includes.navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('prescription.includes.sidebar')

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
                </div><!-- /.container-fluid -->
            </section>

            <section class="content">
                <div class="container-fluid">

                    <div class="header">
                        <div>
                            <img class="img" style="max-height: 200px; max-width: 200px;"
                                src="{{ asset('./logo/logo_4.png') }}" alt="">
                            <div class="h">
                                <h1>Dr. Mohammad Ashfaq</h1>
                                <h3>M.B.B.S., M.D., (Chest)</h3>
                                <h3>Chittagong Medical, REG. No: 9999</h3>
                                <h3>Consultant Pulmonologist, Chittagong Medical, Any City</h3>
                            </div>
                        </div>
                    </div>
                    <div class="another_div">
                        <div>
                            <h2>Mr. Philip</h2>
                            <h3>Patient No: 12312122</h3>
                        </div>
                        <div class="time">
                            <h3>Date: 12/12/2019</h3>
                            <h3>Prescription ID: 344343435666</h3>
                        </div>
                    </div>
                    <hr>

                    <div class="grid-container">
                        <div class="grid-item grid-width-1" style="background-color: gray;">
                            apkpas afd s
                        </div>
                        <div style="max-width: 1200px;" class="grid-item grid-width-2">
                            ;l;laslk kasdk;kk
                        </div>
                        <br>
                        <div class="grid-item grid-width-1" style="background-color: gray;">
                            oiuas oiaspi asp
                        </div>
                        <div style="max-width: 1200px;" class="grid-item grid-width-2">
                            lkkldk; k;dason ddss
                        </div>
                    </div>
                    <hr>
                    <div>
                        <div>
                            <!-- <button class="add_form_field">Add New Field &nbsp;
                <span style="font-size:16px; font-weight:bold;">+ </span>
            </button> -->
                            <div class="field">
                                <select id="select-state" placeholder="Pick a medicine...">
                                    <option value="">Select a state...</option>
                                    @foreach ($medicines as $medicine)
                                    <option value="{{$medicine->id}}">{{$medicine->medicines_name}}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                    </div>
                    <hr>
                    <div>
                        <form action="{{route('prescriptions.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
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
                        <button type="submit" name="submit" class="btn btn-primary form-control">Prescribe</button>
                        </form>
                    </div>

                </div>
            </section>
        </div>


        @include('prescription.includes.footer')
        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/microplugin/0.0.3/microplugin.min.js"
        integrity="sha512-7amIsiQ/hxbdPNawBZwmWBWPiwQRNEJlxTj6eVO+xmWd71fs79Iydr4rYARHwDf0rKHpysFxWbj64fjPRHbqfA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/microplugin/0.0.3/microplugin.js"
        integrity="sha512-IGkpKApwIHDYxPMj2y0hX8dZsPslpdO8Bi12c2aNvLKsF8YjnwJHtjx0NvrTXBm8R9Qq+Nn0Sf/Hf+InGpmBeA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- ./wrapper -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js"
        integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>


    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.3/js/selectize.min.js" integrity="sha512-JiDSvppkBtWM1f9nPRajthdgTCZV3wtyngKUqVHlAs0d5q72n5zpM3QMOLmuNws2vkYmmLn4r1KfnPzgC/73Mw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
    <script>



        var jq14 = jQuery.noConflict(true);
        (function($) {
            $(document).ready(function() {

                // function myFunc() {

                // }
                var wrapper = $(".rows");
                var x = 1;
                var y = 0;
                var max_fields = 10;
                $('#select-state').change(function() {
                    console.log($('#select-state').find("option:selected").text());
                    console.log('The option with value ' + $(this).val() + ' and text ' + $(this).text() +' was selected.');
                    if($(this).val()!=''){
                    if (x < max_fields) {
                        x++;
                        $(wrapper).append('<tr><td><input type="hidden" name="medicines_id[]" value="'+$(this).val()+'"/>' + $(this).find("option:selected").text() +
                            '</td><td><input type="hidden" checked value="0" name="mn['+y+']" /><input type="checkbox" id="mn" name="mn['+y+']" value="1">MN<input type="hidden" checked value="0" name="af['+y+']" /><input type="checkbox" id="af" name="af['+y+']" value="1">AF<input type="hidden" checked value="0" name="en['+y+']" /><input type="checkbox" id="en" name="en['+y+']" value="1">EN<input type="hidden" checked value="0" name="nt['+y+']" /><input type="checkbox" id="nt" name="nt['+y+']" value="1">NT</td><td><input type="hidden" checked value="0" name="before_food['+y+']" /><input type="checkbox" id="flexRadioDefault1" name="before_food['+y+']" value="1"> Before Food<input type="hidden" checked value="0" name="after_food['+y+']" /><input type="checkbox" id="" name="after_food['+y+']" value="1"> After Food</td><td><input type="date" name="duration[]"></td><td><input type="number" name="qty[]"></td><td><a href="#"" class="delete">Delete</a></td></tr>'
                        );
                        y++;
                    } else {
                        alert('You Reached the limits')
                    }
                }
                });

                $(wrapper).on("click", ".delete", function(e) {
                    //alert('deleted');
                    e.preventDefault();
                    // $(this).parent('tr').remove();
                    $(this).closest("tr").remove();
                    x--;
                });

                $('select').selectize({
                    sortField: 'text'
                });
            });
        }(jq14));
    </script>
    {{-- <script src="{{ mix('/js/app.js') }}"></script> --}}
    <!-- jQuery -->
    <script src="{{ asset('../../plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('../../plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Select2 -->
    <script src="{{ asset('../../plugins/select2/js/select2.full.min.js') }}"></script>
    <!-- Bootstrap4 Duallistbox -->
    <script src="{{ asset('../../plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js') }}"></script>
    <!-- InputMask -->
    <script src="{{ asset('../../plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('../../plugins/inputmask/jquery.inputmask.min.js') }}"></script>
    <!-- date-range-picker -->
    <script src="{{ asset('../../plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- bootstrap color picker -->
    <script src="{{ asset('../../plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('../../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- Bootstrap Switch -->
    <script src="{{ asset('../../plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
    <!-- BS-Stepper -->
    <script src="{{ asset('../../plugins/bs-stepper/js/bs-stepper') }}.min.js"></script>
    <!-- dropzonejs -->
    <script src="{{ asset('../../plugins/dropzone/min/dropzone.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('../../dist/js/adminlte.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('../../dist/js/demo.js') }}"></script>
    <!-- Page specific script -->

    {{-- <script>
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })

            //Datemask dd/mm/yyyy
            $('#datemask').inputmask('dd/mm/yyyy', {
                'placeholder': 'dd/mm/yyyy'
            })
            //Datemask2 mm/dd/yyyy
            $('#datemask2').inputmask('mm/dd/yyyy', {
                'placeholder': 'mm/dd/yyyy'
            })
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

            $("input[data-bootstrap-switch]").each(function() {
                $(this).bootstrapSwitch('state', $(this).prop('checked'));
            });

        })
        // BS-Stepper Init
        document.addEventListener('DOMContentLoaded', function() {
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
            file.previewElement.querySelector(".start").onclick = function() {
                myDropzone.enqueueFile(file);
            };
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
    </script> --}}



</body>

</html>
