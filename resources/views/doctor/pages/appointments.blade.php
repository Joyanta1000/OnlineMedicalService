<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | DataTables</title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('../../plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('../../dist/css/adminlte.min.css') }}">
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
                                <li class="breadcrumb-item active">Appointments</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>



            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            @if (session('status'))
                                <div class="card-header">
                                    <div class="alert alert-success" role="alert">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                        {{ session('status') }}
                                    </div>
                                @elseif(session('failed'))
                                    <div class="alert alert-danger" role="alert">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                        {{ session('failed') }}
                                    </div>
                                </div>
                            @endif
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">DataTable with default features</h3>
                                </div>

                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Patient</th>
                                                <th>Description</th>
                                                <th>Amount</th>
                                                <th>Payment From</th>
                                                <th>Payment Method Type</th>
                                                <th>Appintment Taken/Not</th>
                                                <th>Ticket</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($appointed as $appointment)
                                                <tr>
                                                    <td>{{ $appointment->id }}</td>
                                                    <td>{{ $appointment->patientsFirstName }} &nbsp;
                                                        {{ $appointment->patientsLastName }}</td>
                                                    <td>{{ $appointment->description }}</td>
                                                    <td>{{ $appointment->amount }}</td>
                                                    <td>{{ $appointment->payment_from }}</td>
                                                    <td>{{ $appointment->payment_method_types }}</td>
                                                    <td>
                                                        <a href="{{ route('appointment.status_change', $appointment->is_active == 1 ? ['id' => $appointment->id, 'requestFor' => 'cancelation'] : $appointment->id) }}"
                                                            class="{{ $appointment->is_active == 1 ? 'btn btn-primary' : 'btn btn-danger' }}">{{ $appointment->is_active == 2 ? 'Canceled' : ($appointment->is_active == 1 ? 'Scheduled' : 'Request') }}</a>

                                                        <a style="margin: 2px;"
                                                            href="{{ route('appointment.status_change', ['id' => $appointment->id, 'requestFor' => 'cancelation']) }}"
                                                            class="btn btn-danger {{ $appointment->is_active == 0 ? '' : 'disabled' }}"
                                                            onclick="return confirm('Are you sure?')">Cancel</a>
                                                    </td>
                                                    <td>{{ $appointment->ticket ? $appointment->ticket : 'N/A' }}
                                                    </td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <a href="{{ route('prescription_for_doctor.index', ['id' => $appointment->patient_id, 'appointment_id' => $appointment->id]) }}"
                                                                class="btn btn-success">Prescribe</a>

                                                            <a style="margin: 2px;"
                                                                href="{{ route('message.chatData', ['patient_id' => $appointment->patient_id, 'doctor_id' => $appointment->doctor_id]) }}"
                                                                class="btn btn-danger {{ $appointment->is_active == 0 ? 'disabled' : '' }}"
                                                                >Chat</a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>#</th>
                                                <th>Patient</th>
                                                <th>Description</th>
                                                <th>Amount</th>
                                                <th>Payment From</th>
                                                <th>Payment Method Type</th>
                                                <th>Appintment Taken/Not</th>
                                                <th>Ticket</th>
                                                <th>Actions</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
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
    <script src="{{ asset('../../plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('../../plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('../../plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('../../plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('../../plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('../../plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('../../plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('../../plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('../../plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('../../plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('../../plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('../../dist/js/adminlte.min.js') }}"></script>
    <script src="{{ asset('../../dist/js/demo.js') }}"></script>
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
</body>

</html>
