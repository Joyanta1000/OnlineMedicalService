<style>
    .disabled {
        display: none;
    }

</style>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="" class="brand-link">
        <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">Admin</span>
    </a>
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="../../dist/img/avatar5.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Admin</a>
            </div>
        </div>
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li
                    class="nav-item {{ request()->is('users') ? 'menu-open' : null }} ">
                    <a href="#"
                        class="nav-link {{ request()->is('users') ? 'active' : null }}">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            User
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('users') }}"
                                class="nav-link {{ request()->is('users') ? 'active' : null }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Users</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li
                    class="nav-item {{ request()->is('add_gender') || request()->is('genders') ? 'menu-open' : null }} ">
                    <a href="#"
                        class="nav-link {{ request()->is('add_gender') || request()->is('genders') ? 'active' : null }}">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Gender
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('genders') }}"
                                class="nav-link {{ request()->is('genders') ? 'active' : null }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Genders</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('add_gender') }}"
                                class="nav-link {{ request()->is('add_gender') ? 'active' : null }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Gender</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li
                    class="nav-item {{ request()->is('marital_statuses') || request()->is('add_marital_status') ? 'menu-open' : null }} ">
                    <a href="#"
                        class="nav-link {{ request()->is('marital_statuses') || request()->is('add_marital_status') ? 'active' : null }}">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Marital Status
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('marital_statuses') }}"
                                class="nav-link {{ request()->is('marital_statuses') ? 'active' : null }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Marital status</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('add_marital_status') }}"
                                class="nav-link {{ request()->is('add_marital_status') ? 'active' : null }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Marital Status</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li
                    class="nav-item {{ request()->is('problems') || request()->is('add_problem') ? 'menu-open' : null }} ">
                    <a href="#"
                        class="nav-link {{ request()->is('problems') || request()->is('add_problem') ? 'active' : null }}">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Problem
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('problems') }}"
                                class="nav-link {{ request()->is('problems') ? 'active' : null }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Problems</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('add_problem') }}"
                                class="nav-link {{ request()->is('add_problem') ? 'active' : null }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Problem</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li
                    class="nav-item {{ request()->is('specialities') || request()->is('add_specialities_of_doctor') ? 'menu-open' : null }} ">
                    <a href="#"
                        class="nav-link {{ request()->is('specialities') || request()->is('add_specialities_of_doctor') ? 'active' : null }}">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Speciality
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('specialities') }}"
                                class="nav-link {{ request()->is('specialities') ? 'active' : null }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Specialities</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('add_specialities_of_doctor') }}"
                                class="nav-link {{ request()->is('add_specialities_of_doctor') ? 'active' : null }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Speciality</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li
                    class="nav-item {{ request()->is('countries') || request()->is('add_country') || request()->is('cities') || request()->is('add_city') || request()->is('thanas') || request()->is('add_thana') || request()->is('areas') || request()->is('add_area') ? 'menu-open' : null }}">
                    <a href="#"
                        class="nav-link {{ request()->is('countries') || request()->is('add_country') || request()->is('cities') || request()->is('add_city') ? 'active' : null }}">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Address
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul id="test" class="nav nav-treeview">
                        <li
                            class="nav-item {{ request()->is('countries') || request()->is('add_country') ? 'menu-open' : null }}">
                            <a href="#"
                                class="nav-link {{ request()->is('countries') || request()->is('add_country') ? 'active' : null }}"
                                onclick="country()">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Country
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul id="country" class="disabled">
                                <li class="nav-item">
                                    <a href="{{ route('countries') }}"
                                        class="nav-link {{ request()->is('countries') ? 'active' : null }}">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Countries</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('add_country') }}"
                                        class="nav-link {{ request()->is('add_country') ? 'active' : null }}">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Add Country</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li
                            class="nav-item {{ request()->is('cities') || request()->is('add_city') ? 'menu-open' : null }}">
                            <a href="#"
                                class="nav-link {{ request()->is('cities') || request()->is('add_city') ? 'active' : null }}"
                                onclick="city()">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    City
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul id="city" class="disabled">
                                <li class="nav-item">
                                    <a href="{{ route('cities') }}"
                                        class="nav-link {{ request()->is('cities') ? 'active' : null }}">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Cities</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('add_city') }}"
                                        class="nav-link {{ request()->is('add_city') ? 'active' : null }}">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Add City</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li
                            class="nav-item {{ request()->is('thanas') || request()->is('add_thana') ? 'menu-open' : null }}">
                            <a href="#"
                                class="nav-link {{ request()->is('thanas') || request()->is('add_thana') ? 'active' : null }}"
                                onClick="thana()">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Thana
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul id="thana" class="disabled">
                                <li class="nav-item">
                                    <a href="{{ route('thanas') }}"
                                        class="nav-link {{ request()->is('thanas') ? 'active' : null }}">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Thanas</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('add_thana') }}"
                                        class="nav-link {{ request()->is('add_thana') ? 'active' : null }}">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Add Thana</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li
                            class="nav-item {{ request()->is('areas') || request()->is('add_area') ? 'menu-open' : null }}">
                            <a href="#"
                                class="nav-link {{ request()->is('areas') || request()->is('add_area') ? 'active' : null }}"
                                onClick="area()">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Area
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul id="area" class="disabled">
                                <li class="nav-item">
                                    <a href="{{ route('areas') }}"
                                        class="nav-link {{ request()->is('areas') ? 'active' : null }}">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Areas</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('add_area') }}"
                                        class="nav-link {{ request()->is('add_area') ? 'active' : null }}">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Add Area</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="nav-header">Settings</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>
                            Others
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('logout') }}" class="nav-link }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Logout</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>
<script>
    dom();

    function dom() {
        var APP_URL = window.location.pathname;
        if (APP_URL == "/countries") {
            document.getElementById("country").classList.add("nav-treeview");
        }
        if (APP_URL == "/add_country") {
            document.getElementById("country").classList.add("nav-treeview");
        }
        if (APP_URL == "/cities") {
            document.getElementById("city").classList.add("nav-treeview");
        }
        if (APP_URL == "/add_city") {
            document.getElementById("city").classList.add("nav-treeview");
        }
        if (APP_URL == "/thanas") {
            document.getElementById("thana").classList.add("nav-treeview");
        }
        if (APP_URL == "/add_thana") {
            document.getElementById("thana").classList.add("nav-treeview");
        }
        if (APP_URL == "/areas") {
            document.getElementById("area").classList.add("nav-treeview");
        }
        if (APP_URL == "/add_area") {
            document.getElementById("area").classList.add("nav-treeview");
        }
    }

    function country() {
        $("#country").removeClass("disabled");
        $("#country").addClass("nav nav-treeview");
    }

    function city() {
        $("#city").removeClass("disabled");
        $("#city").addClass("nav nav-treeview");
    }

    function thana() {
        $("#thana").removeClass("disabled");
        $("#thana").addClass("nav nav-treeview");
    }

    function area() {
        $("#area").removeClass("disabled");
        $("#area").addClass("nav nav-treeview");
    }
</script>
