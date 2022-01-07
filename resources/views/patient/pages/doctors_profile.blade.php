<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@include('website.includes.title')</title>
    @include('website.includes.icon')
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
        @include('patient.includes.navbar')
        @include('patient.includes.sidebar')
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
                                <li class="breadcrumb-item active">User Profile</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div>
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
                </div>
            </section>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card card-primary card-outline">
                                <div class="card-body box-profile">
                                    <div class="text-center">
                                        <img class="profile-user-img img-fluid img-circle"
                                            src="{{ $details->doctors_profile_picture->first() ? $details->doctors_profile_picture->first()->profile_picture : $details->pharmacy_profile_picture->first()->pharmacies_profile_picture }}"
                                            alt="User profile picture">
                                    </div>
                                    <h3 class="profile-username text-center">
                                        {{ $details->doctor->first() ? $details->doctor->first()->first_name : $details->pharmacy->first()->phermacies_name }}
                                        {{ $details->doctor->first() ? $details->doctor->first()->last_name : '' }}
                                    </h3>
                                    <p class="text-muted text-center">
                                        {{ $details->role == 2 ? 'Doctor' : 'Pharmacy' }}
                                    </p>
                                    <ul class="list-group list-group-unbordered mb-3">
                                        @if ($details->role == 2)
                                            <li class="list-group-item">
                                                <b>Appointment</b> <a
                                                    class="float-right">{{ $details->appointment ? $details->appointment->count() : '' }}</a>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Prescription</b> <a
                                                    class="float-right">{{ $details->prescriptions ? $details->prescriptions->count() : '' }}</a>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Chat</b> <a
                                                    class="float-right">{{ $details->chat ? $details->chat->count() : '' }}</a>
                                            </li>
                                        @endif
                                            
                                        <a style="padding: 10px; display: {{App\Models\DoctorsSchedule::where(['doctors_id' => $details->doctor->first()->doctors_id, 'is_active' => 1])->get()->count() > 0 ? '' : 'none;' }}" class="{{ App\Models\Appointment::where(['doctor_id' => $details->id, 'is_active' => 1])->get()->count() > 5
    ? 'disabled'
    : '' }}"
                                            href="{{ route('appointment.checkout.index', $details->id) }}"
                                            class="btn btn-sm btn-primary">
                                            <i class="fas fa-calendar"></i> Make Appointment
                                        </a>
                                    </ul>
                                </div>
                            </div>
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">About
                                        {{ $details->doctor->first() ? $details->doctor->first()->first_name : $details->pharmacy->first()->phermacies_name }}
                                        {{ $details->doctor->first() ? $details->doctor->first()->last_name : '' }}
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>
                                    <p class="text-muted">
                                        @foreach ($details->address as $item)
                                            <span class="tag tag-danger">{{ $item->address }} ,
                                                {{ $item->zip_code }}</span>
                                            @if (!$loop->last)
                                                ,
                                            @endif
                                        @endforeach
                                    </p>
                                    <hr>
                                    @if ($details->role == 2)
                                        @if (isset($details->doctors_specialities))
                                            <strong><i class="fas fa-pencil-alt mr-1"></i> Speciality </strong>
                                            <p class="text-muted">

                                                @foreach ($details->doctors_specialities as $item)
                                                    <span class="tag tag-danger">{{ $item->specialist_of }}</span>
                                                    @if (!$loop->last)
                                                        ,
                                                    @endif
                                                @endforeach
                                            </p>
                                            <hr>
                                        @endif
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-header p-2">
                                    <ul class="nav nav-pills">
                                        <li class="nav-item"><a class="nav-link active" href="#activity"
                                                data-toggle="tab">Evidence</a></li>
                                        {{-- <li class="nav-item"><a class="nav-link" href="#timeline"
                                                data-toggle="tab">Timeline</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#settings"
                                                data-toggle="tab">Settings</a></li> --}}
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="active tab-pane" id="activity">
                                            <div class="post">
                                                <div class="user-block">
                                                    <img class="img-circle img-bordered-sm"
                                                        src="{{ $details->doctors_profile_picture->first() ? $details->doctors_profile_picture->first()->profile_picture : $details->pharmacy_profile_picture->first()->pharmacies_profile_picture }}"
                                                        alt="User Image">
                                                    <span class="username">
                                                        <a href="#">{{ $details->doctor->first() ? $details->doctor->first()->first_name : $details->pharmacy->first()->phermacies_name }}
                                                            {{ $details->doctor->first() ? $details->doctor->first()->last_name : '' }}</a>
                                                    </span>
                                                    <span
                                                        class="description">{{ $details->doctors_file->first() ? $details->doctors_file->count() : $details->pharmacy_file->count() }}
                                                        files -
                                                        {{ $details->doctors_file->first() ? $details->doctors_file->first()->created_at->diffForHumans() : $details->pharmacy_file->first()->created_at->diffForHumans() }}</span>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-sm-6">
                                                        <div class="row">
                                                            @foreach ($details->doctors_file->first() ? $details->doctors_file : $details->pharmacy_file as $item)
                                                                <div class="col-sm-6">
                                                                    @if (pathinfo($item->pdf_file_of_certificate ? $item->pdf_file_of_certificate : $item->evidence, PATHINFO_EXTENSION) == 'jpg' || pathinfo($item->pdf_file_of_certificate ? $item->pdf_file_of_certificate : $item->evidence, PATHINFO_EXTENSION) == 'png' || pathinfo($item->pdf_file_of_certificate ? $item->pdf_file_of_certificate : $item->evidence, PATHINFO_EXTENSION) == 'jpeg')
                                                                        <img class="img-fluid mb-3"
                                                                            src="{{ $item->pdf_file_of_certificate ? $item->pdf_file_of_certificate : $item->evidence }}"
                                                                            alt="Photo">
                                                                    @elseif (pathinfo($item->pdf_file_of_certificate
                                                                        ? $item->pdf_file_of_certificate :
                                                                        $item->evidence, PATHINFO_EXTENSION) == 'pdf')
                                                                        <a href="{{ $item->pdf_file_of_certificate ? $item->pdf_file_of_certificate : $item->evidence }}"
                                                                            class="btn btn-primary btn-sm">View</a>
                                                                    @endif
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div style="display: {{App\Models\DoctorsSchedule::where(['doctors_id' => $details->doctor->first()->doctors_id, 'is_active' => 1])->get()->count() > 0 ? '' : 'none' }}">
                                                    <label for="" style="color: rgb(120, 120, 233);">Schedule For Taking
                                                        Appointment</label>
                                                    @php $jsn = json_decode($details->schedule->first()->schedule)  @endphp

                                                    @foreach ($jsn as $key => $value)
                                                        <div class="{{ $value ? '' : 'disabled' }}"><label
                                                                for="">{{ $key }}</label>
                                                            <span>{{ $value }}</span>
                                                        </div>
                                                    @endforeach

                                                    @php @endphp

                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="timeline">
                                            <div class="timeline timeline-inverse">
                                                <div class="time-label">
                                                    <span class="bg-danger">
                                                        10 Feb. 2014
                                                    </span>
                                                </div>
                                                <div>
                                                    <i class="fas fa-envelope bg-primary"></i>
                                                    <div class="timeline-item">
                                                        <span class="time"><i class="far fa-clock"></i>
                                                            12:05</span>
                                                        <h3 class="timeline-header"><a href="#">Support Team</a> sent
                                                            you an email</h3>
                                                        <div class="timeline-body">
                                                            Etsy doostang zoodles disqus groupon greplin oooj voxy
                                                            zoodles,
                                                            weebly ning heekya handango imeem plugg dopplr jibjab,
                                                            movity
                                                            jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo
                                                            kaboodle
                                                            quora plaxo ideeli hulu weebly balihoo...
                                                        </div>
                                                        <div class="timeline-footer">
                                                            <a href="#" class="btn btn-primary btn-sm">Read more</a>
                                                            <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <i class="fas fa-user bg-info"></i>
                                                    <div class="timeline-item">
                                                        <span class="time"><i class="far fa-clock"></i> 5
                                                            mins ago</span>
                                                        <h3 class="timeline-header border-0"><a href="#">Sarah
                                                                Young</a> accepted your friend request
                                                        </h3>
                                                    </div>
                                                </div>
                                                <div>
                                                    <i class="fas fa-comments bg-warning"></i>
                                                    <div class="timeline-item">
                                                        <span class="time"><i class="far fa-clock"></i> 27
                                                            mins ago</span>
                                                        <h3 class="timeline-header"><a href="#">Jay White</a> commented
                                                            on your post</h3>
                                                        <div class="timeline-body">
                                                            Take me to your leader!
                                                            Switzerland is small and neutral!
                                                            We are more like Germany, ambitious and misunderstood!
                                                        </div>
                                                        <div class="timeline-footer">
                                                            <a href="#" class="btn btn-warning btn-flat btn-sm">View
                                                                comment</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="time-label">
                                                    <span class="bg-success">
                                                        3 Jan. 2014
                                                    </span>
                                                </div>
                                                <div>
                                                    <i class="fas fa-camera bg-purple"></i>
                                                    <div class="timeline-item">
                                                        <span class="time"><i class="far fa-clock"></i> 2
                                                            days ago</span>
                                                        <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded
                                                            new photos</h3>
                                                        <div class="timeline-body">
                                                            <img src="https://placehold.it/150x100" alt="...">
                                                            <img src="https://placehold.it/150x100" alt="...">
                                                            <img src="https://placehold.it/150x100" alt="...">
                                                            <img src="https://placehold.it/150x100" alt="...">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <i class="far fa-clock bg-gray"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="settings">
                                            <form class="form-horizontal">
                                                <div class="form-group row">
                                                    <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                                    <div class="col-sm-10">
                                                        <input type="email" class="form-control" id="inputName"
                                                            placeholder="Name">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputEmail"
                                                        class="col-sm-2 col-form-label">Email</label>
                                                    <div class="col-sm-10">
                                                        <input type="email" class="form-control" id="inputEmail"
                                                            placeholder="Email">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputName2"
                                                        class="col-sm-2 col-form-label">Name</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="inputName2"
                                                            placeholder="Name">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputExperience"
                                                        class="col-sm-2 col-form-label">Experience</label>
                                                    <div class="col-sm-10">
                                                        <textarea class="form-control" id="inputExperience"
                                                            placeholder="Experience"></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputSkills"
                                                        class="col-sm-2 col-form-label">Skills</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="inputSkills"
                                                            placeholder="Skills">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="offset-sm-2 col-sm-10">
                                                        <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox"> I agree to the <a href="#">terms
                                                                    and conditions</a>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="offset-sm-2 col-sm-10">
                                                        <button type="submit" class="btn btn-danger">Submit</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        @include('patient.includes.footer')
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
