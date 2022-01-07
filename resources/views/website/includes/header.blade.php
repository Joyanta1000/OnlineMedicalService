    <header role="banner">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                @include('website.includes.logo')
                <a class="navbar-brand" href="{{URL::to('/')}}">Medi<span>H+</span> </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample05"
                    aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarsExample05">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{URL::to('/')}}">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="services.html" id="dropdown04"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Services</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown04">
                                <a class="dropdown-item" href="{{route('get_connected')}}">Services</a>
                            </div>

                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('login.User_Login')}}">Log In</a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
    </header>