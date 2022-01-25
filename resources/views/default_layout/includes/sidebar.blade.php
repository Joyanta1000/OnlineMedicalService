<style>
    .disabled {
        display: none;
    }

</style>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="../../index3.html" class="brand-link">
        <img src="{{asset('../../dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">{{session()->get('role') == 2 ? 'Doctor' : 'Patient'}}</span>
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
                @if(session()->get('role') == 3)
                <li class="nav-item {{ request()->is('doctors') ? 'menu-open' : null }} ">
                    <a href="#" class="nav-link {{ request()->is('doctors') ? 'active' : null }}">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Doctor
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('doctors') }}"
                                class="nav-link {{ request()->is('doctors') ? 'active' : null }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Doctors</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif
                @if(session()->get('role') == 2)
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
                @endif
                @if(session()->get('role') == 3)
                <li
                    class="nav-item {{ request()->is('appointment/list') || request()->is('appointment_of_patient/list') ? 'menu-open' : null }} ">
                    <a href="#"
                        class="nav-link {{ request()->is('appointment/list') || request()->is('appointment_of_patient/list') ? 'active' : null }}">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Appointment
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ URL::to( session()->get('role') == 3 ? 'appointment_of_patient/list' : 'appointment/list') }}"
                                class="nav-link {{ request()->is('appointment/list') || request()->is('appointment_of_patient/list') ? 'active' : null }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Appointments</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif
                <li
                    class="nav-item {{ request()->is('prescription/prescriptions/show') || request()->is('prescription/prescription_for_doctor/show') ? 'menu-open' : null }} ">
                    <a href="#"
                        class="nav-link {{ request()->is('prescription/prescriptions/show') || request()->is('prescription/prescription_for_doctor/show') ? 'active' : null }}">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Prescription
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ URL::to(session()->get('role')==2 ? 'prescription/prescription_for_doctor/show' : 'prescription/prescriptions/show') }}"
                                class="nav-link {{ request()->is('prescription/prescriptions/show') || request()->is('prescription/prescription_for_doctor/show') ? 'active' : null }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Prescriptions</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @if(session()->get('role') == 2)
                <li class="nav-item {{ request()->is('add_schedule') ? 'menu-open' : null }} ">
                    <a href="#" class="nav-link {{ request()->is('add_schedule') ? 'active' : null }}">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Schedule
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    @if (session()->get('role') == 2)
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('schedules') }}"
                                    class="nav-link {{ request()->is('schedules') ? 'active' : null }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Schedule</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('add_schedule') }}"
                                    class="nav-link {{ request()->is('add_schedule') ? 'active' : null }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Add Schedule</p>
                                </a>
                            </li>
                        </ul>
                    @endif
                </li>
                @endif
                <li class="nav-item {{ request()->is('history') ? 'menu-open' : null }} ">
                    <a href="#" class="nav-link {{ request()->is('history') ? 'active' : null }}">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            History
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('history') }}"
                                class="nav-link {{ request()->is('history') ? 'active' : null }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Check History</p>
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
