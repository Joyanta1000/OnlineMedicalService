<style>
    .disabled {
        display: none;
    }

</style>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="../../index3.html" class="brand-link">
        <img src="{{asset('../../dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">Doctor</span>
    </a>
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset(session()->get('profile_picture'))}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{session()->get('first_name')}} {{session()->get('last_name')}}</a>
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
                    class="nav-item {{ request()->is('appointment.list') ? 'menu-open' : null }} ">
                    <a href="#"
                        class="nav-link {{ request()->is('appointment.list') ? 'active' : null }}">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Appointment
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('appointment.list') }}"
                                class="nav-link {{ request()->is('appointment.list') ? 'active' : null }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Appointments</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li
                    class="nav-item {{ request()->is('prescription/prescriptions/show') || request()->is('prescription_for_doctor/prescriptions/show') ? 'menu-open' : null }} ">
                    <a href="#"
                        class="nav-link {{ request()->is('prescription/prescriptions/show') || request()->is('prescription_for_doctor/prescriptions/show') ? 'active' : null }}">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Prescription
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ URL::to(session()->get('role')==2 ? 'prescription_for_doctor/prescriptions/show' : 'prescription/prescriptions/show') }}"
                                class="nav-link {{ request()->is('prescription/prescriptions/show') || request()->is('prescription_for_doctor/prescriptions/show') ? 'active' : null }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Prescriptions</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li
                    class="nav-item {{ request()->is('chat.index') ? 'menu-open' : null }} ">
                    <a href="#"
                        class="nav-link {{ request()->is('chat.index') ? 'active' : null }}">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Chat
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('chat.index') }}"
                                class="nav-link {{ request()->is('chat.index') ? 'active' : null }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Chats</p>
                            </a>
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
