<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@include('website.includes.title')</title>
    @include('website.includes.icon')
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('../../plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('../../dist/css/adminlte.min.css')}}">

{{--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">--}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
{{--    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>--}}

</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
    <!-- Navbar -->
@include('patient.includes.navbar')
<!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="../../index3.html" class="brand-link">
            <img src="{{asset('../../dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light">@include('website.includes.title')</span>
        </a>

        <!-- Sidebar -->
    @include('patient.includes.sidebar')
    <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Contacts</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Contacts</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card card-solid">
                <div class="card-body pb-0">


                    <div class="row d-flex align-items-stretch">
                        <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
                            <div class="card bg-light">

                                @if ($message = Session::get('success'))
                                    <div class="alert alert-success" role="alert">
                                        <button type="button" class="close"
                                                data-dismiss="alert">×</button>
                                        {{ $message }}
                                    </div>
                                @elseif($msg = Session::get('failed'))
                                    <div class="alert alert-danger" role="alert">
                                        <button type="button" class="close"
                                                data-dismiss="alert">×</button>
                                        {{ $msg }}
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

{{--Payment--}}
                                @php
                                    $stripe_key = 'pk_test_51HVVyCD7a6E2ghuvB4VyaoelAFplKOTYN3D3mr0oKb3DLWFOXmmpKpMwNY2hw4BIcJRJywpmXuucod4OPJzw1LId00mG4PsrE8';
                                @endphp
                                <div class="container" style="margin-top:10%;margin-bottom:10%">
                                    <div class="row justify-content-center">
                                        <div class="col-md-12">
                                            <div class="">
                                                <p>You will be charged rs 100</p>
                                            </div>
                                            <div class="card">
                                                <form action="{{route('appointment.checkout.store', $id)}}"  method="post" id="payment-form">
                                                    @csrf
                                                    <div class="form-group">
                                                        <div class="card-header">
                                                            <label for="card-element">
                                                                Enter your credit card information
                                                            </label>
                                                        </div>
                                                        <div class="card-body">
                                                            <div id="card-element">
                                                                <!-- A Stripe Element will be inserted here. -->
                                                            </div>
                                                            <!-- Used to display form errors. -->
                                                            <div id="card-errors" role="alert"></div>
                                                            <input type="hidden" name="plan" value="" />
                                                        </div>
                                                    </div>
                                                    <div class="card-footer">
                                                        <button
                                                            id="card-button"
                                                            class="btn btn-dark"
                                                            type="submit"
                                                            data-secret="{{ $intent }}"
                                                        > Pay </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <script src="https://js.stripe.com/v3/"></script>
                                <script>
                                    // Custom styling can be passed to options when creating an Element.
                                    // (Note that this demo uses a wider set of styles than the guide below.)

                                    var style = {
                                        base: {
                                            color: '#32325d',
                                            lineHeight: '18px',
                                            fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                                            fontSmoothing: 'antialiased',
                                            fontSize: '16px',
                                            '::placeholder': {
                                                color: '#aab7c4'
                                            }
                                        },
                                        invalid: {
                                            color: '#fa755a',
                                            iconColor: '#fa755a'
                                        }
                                    };

                                    const stripe = Stripe('{{ $stripe_key }}', { locale: 'en' }); // Create a Stripe client.
                                    const elements = stripe.elements(); // Create an instance of Elements.
                                    const cardElement = elements.create('card', { style: style }); // Create an instance of the card Element.
                                    const cardButton = document.getElementById('card-button');
                                    const clientSecret = cardButton.dataset.secret;

                                    cardElement.mount('#card-element'); // Add an instance of the card Element into the `card-element` <div>.

                                    // Handle real-time validation errors from the card Element.
                                    cardElement.addEventListener('change', function(event) {
                                        var displayError = document.getElementById('card-errors');
                                        if (event.error) {
                                            displayError.textContent = event.error.message;
                                        } else {
                                            displayError.textContent = '';
                                        }
                                    });

                                    // Handle form submission.
                                    var form = document.getElementById('payment-form');

                                    form.addEventListener('submit', function(event) {
                                        event.preventDefault();

                                        stripe.handleCardPayment(clientSecret, cardElement, {
                                            payment_method_data: {
                                                //billing_details: { name: cardHolderName.value }
                                            }
                                        })
                                            .then(function(result) {
                                                console.log(result);
                                                if (result.error) {
                                                    // Inform the user if there was an error.
                                                    var errorElement = document.getElementById('card-errors');
                                                    errorElement.textContent = result.error.message;
                                                } else {
                                                    console.log(result);
                                                    form.submit();
                                                }
                                            });
                                    });
                                </script>
{{--Payment--}}
                            </div>
                        </div>
                    </div>


                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <nav aria-label="Contacts Page Navigation">
                        <ul class="pagination justify-content-center m-0">
                            <!-- <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">4</a></li>
                            <li class="page-item"><a class="page-link" href="#">5</a></li>
                            <li class="page-item"><a class="page-link" href="#">6</a></li>
                            <li class="page-item"><a class="page-link" href="#">7</a></li>
                            <li class="page-item"><a class="page-link" href="#">8</a></li> -->

                        </ul>
                    </nav>
                </div>
                <!-- /.card-footer -->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!--  footer -->
@include('patient.includes.footer')
<!-- footer -->
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('../../plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('../../plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('../../dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('../../dist/js/demo.js')}}"></script>
</body>
</html>

