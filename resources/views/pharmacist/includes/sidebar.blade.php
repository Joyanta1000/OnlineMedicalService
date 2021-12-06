<style>
    .disabled {
        display: none;
    }
</style>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="../../index3.html" class="brand-link">
        <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">Pharmacy</span>
    </a>
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset(session()->get('pharmacies_profile_picture')) }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ session()->get('phermacies_name') }}</a>
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
                    class="nav-item {{ request()->is('medicine_types') || request()->is('add_medicine_type') || request()->is('medicines') || request()->is('add_medicine') ? 'menu-open' : null }}">
                    <a href="#"
                        class="nav-link {{ request()->is('medicine_types') || request()->is('add_medicine_type') || request()->is('medicines') || request()->is('add_medicine') ? 'active' : null }}">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Medicine
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul id="test" class="nav nav-treeview">
                        <li
                            class="nav-item {{ request()->is('medicine_types') || request()->is('add_medicine_type') ? 'menu-open' : null }}">
                            <a href="#"
                                class="nav-link {{ request()->is('medicine_types') || request()->is('add_medicine_type') ? 'active' : null }}"
                                onclick="medicineType()">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Medicine Type
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul id="medicineType" class="disabled">
                                <li class="nav-item">
                                    <a href="{{ route('medicine_types') }}"
                                        class="nav-link {{ request()->is('medicine_types') ? 'active' : null }}">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Medicine Types</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('add_medicine_type') }}"
                                        class="nav-link {{ request()->is('add_medicine_type') ? 'active' : null }}">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Add Medicine Type</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li
                            class="nav-item {{ request()->is('medicines') || request()->is('add_medicine') ? 'menu-open' : null }}">
                            <a href="#"
                                class="nav-link {{ request()->is('medicines') || request()->is('add_medicine') ? 'active' : null }}"
                                onclick="medicine()">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Medicine
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul id="medicine" class="disabled">
                                <li class="nav-item">
                                    <a href="{{ route('medicines') }}"
                                        class="nav-link {{ request()->is('medicines') ? 'active' : null }}">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Medicines</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('add_medicine') }}"
                                        class="nav-link {{ request()->is('add_medicine') ? 'active' : null }}">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Add Medicine</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="nav-header">Settings</li>
                <li
                    class="nav-item">
                    <a href="#"
                        class="nav-link">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>
                            Others
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('logout') }}"
                                class="nav-link }}">
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
        if (APP_URL == "/medicine_types") {
            document.getElementById("medicineType").classList.add("nav-treeview");
        }
        if (APP_URL == "/add_medicine_type") {
            document.getElementById("medicineType").classList.add("nav-treeview");
        }
        if (APP_URL == "/medicines") {
            document.getElementById("medicine").classList.add("nav-treeview");
        }
        if (APP_URL == "/add_medicine") {
            document.getElementById("medicine").classList.add("nav-treeview");
        }
    }
    function medicineType() {
        $("#medicineType").removeClass("disabled");
        $("#medicineType").addClass("nav nav-treeview");
    }
    function medicine() {
        $("#medicine").removeClass("disabled");
        $("#medicine").addClass("nav nav-treeview");
    }
</script>
