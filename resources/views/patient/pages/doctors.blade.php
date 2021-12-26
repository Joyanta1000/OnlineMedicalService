<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Contacts</title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('../../plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('../../dist/css/adminlte.min.css') }}">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        @include('patient.includes.navbar')
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="../../index3.html" class="brand-link">
                <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light"></span>
            </a>
            @include('patient.includes.sidebar')
        </aside>
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
                                <li class="breadcrumb-item active">Doctors</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>
            <section class="content">
                <div class="card card-solid">
                    <div class="card-body pb-0">
                        @foreach ($doctors as $doctor)
                            <div class="row d-flex align-items-stretch">
                                <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
                                    <div class="card bg-light">
                                        <div class="card-header text-muted border-bottom-0">
                                            Doctor
                                        </div>
                                        <div class="card-body pt-0">
                                            <div class="row">
                                                <div class="col-7">
                                                    <h2 class="lead"><b>{{ $doctor->first_name }}
                                                            &nbsp;{{ $doctor->last_name }}</b></h2>
                                                    <p class="text-muted text-sm"><b>About: </b>
                                                        @foreach ($doctors_social_networks as $doctors_social_network)
                                                            @if ($doctors_social_network->doctors_id == $doctor->user_id)
                                                                <b>{{ $doctors_social_network->social_network_link }}</b>
                                                            @endif
                                                        @endforeach

                                                    </p>
                                                    @foreach ($doctors_addresses as $doctors_address)
                                                        <ul class="ml-4 mb-0 fa-ul text-muted">
                                                            @if ($doctors_address->doctors_id == $doctor->user_id)
                                                                <li class="small"><span
                                                                        class="fa-li"><i
                                                                            class="fas fa-lg fa-building"></i></span>
                                                                    Address: {{ $doctors_address->address }}
                                                                    , {{ $doctors_address->area }}
                                                                    , {{ $doctors_address->thana }}
                                                                    , {{ $doctors_address->city }}
                                                                    , {{ $doctors_address->country }} </li>
                                                            @endif
                                                        </ul>
                                                    @endforeach
                                                    <ul class="ml-4 mb-0 fa-ul text-muted">
                                                        <li class="small"><span class="fa-li"><i
                                                                    class="fas fa-lg fa-phone"></i></span> Phone
                                                            #: {{ $doctor->works_mobile_phone }} </li>
                                                    </ul>
                                                </div>
                                                <div class="col-5 text-center">
                                                    <img src="{{ $doctor->profile_picture }}" alt="user-avatar"
                                                        class="img-circle img-fluid">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="text-right">
                                                <a href="{{route('view_doctor_for_patient', $doctor->doctors_id)}}" class="btn btn-sm bg-teal">
                                                    <i class="fas fa-user"></i> View profile
                                                </a>
                                                <a class="{{App\Models\Appointment::where(['doctor_id' => $doctor->doctors_id, 'is_active' => 1])->get()->count() > 5 ? 'disabled' : '' }}" href="{{ route('appointment.checkout.index', $doctor->doctors_id) }}"
                                                    class="btn btn-sm btn-primary">
                                                    <i class="fas fa-calendar"></i> Make Appointment
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="card-footer">
                        <nav aria-label="Contacts Page Navigation">
                            <ul class="pagination justify-content-center m-0">
                                {!! $doctors->links() !!}
                            </ul>
                        </nav>
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
    <script src="{{ asset('../../dist/js/adminlte.min.js') }}"></script>
    <script src="{{ asset('../../dist/js/demo.js') }}"></script>
</body>

</html>
