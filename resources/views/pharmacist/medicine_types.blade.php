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
        @include('pharmacist.includes.navbar')
        @include('pharmacist.includes.sidebar')
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
                                <li class="breadcrumb-item active">Medicine Types</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Medicine Types</h3>
                                </div>
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
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Medicine Type</th>
                                                <th>Action(s)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($medicine_types as $medicine_type)
                                                <tr>
                                                    <td>{{ $medicine_type->id }}</td>
                                                    <td>{{ $medicine_type->medicine_type }}</td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <a type="button" class="btn btn-primary"
                                                                href="{{ URL::to('/edit_medicine_type/' . $medicine_type->id) }}">Edit</a>
                                                            <a type="button" class="btn btn-danger"
                                                                href="{{ URL::to('delete_medicine_type/' . $medicine_type->id) }}"
                                                                onclick="return confirm('Are you sure to delete?')">Delete</a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>#</th>
                                                <th>Medicine Type</th>
                                                <th>Action(s)</th>
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
        @include('pharmacist.includes.footer')
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