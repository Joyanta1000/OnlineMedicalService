<style>
    .disabled {
        display: none;
    }

</style>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
        <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="../../dist/img/avatar5.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Admin</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
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

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                {{-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../../index.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v1</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../../index2.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v2</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../../index3.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v3</p>
                </a>
              </li>
            </ul>
          </li> --}}
                {{-- <li class="nav-item">
            <a href="../widgets.html" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Widgets
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li> --}}
                {{-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Layout Options
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../layout/top-nav.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Top Navigation</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../layout/top-nav-sidebar.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Top Navigation + Sidebar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../layout/boxed.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Boxed</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../layout/fixed-sidebar.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Fixed Sidebar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../layout/fixed-sidebar-custom.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Fixed Sidebar <small>+ Custom Area</small></p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../layout/fixed-topnav.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Fixed Navbar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../layout/fixed-footer.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Fixed Footer</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../layout/collapsed-sidebar.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Collapsed Sidebar</p>
                </a>
              </li>
            </ul>
          </li> --}}
                {{-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Charts
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../charts/chartjs.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>ChartJS</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../charts/flot.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Flot</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../charts/inline.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inline</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../charts/uplot.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>uPlot</p>
                </a>
              </li>
            </ul>
          </li> --}}
                {{-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                UI Elements
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../UI/general.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>General</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../UI/icons.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Icons</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../UI/buttons.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Buttons</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../UI/sliders.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sliders</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../UI/modals.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Modals & Alerts</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../UI/navbar.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Navbar & Tabs</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../UI/timeline.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Timeline</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../UI/ribbons.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ribbons</p>
                </a>
              </li>
            </ul>
          </li> --}}
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
                        {{-- <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Level 2</p>
                </a>
              </li> --}}
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
                                {{-- <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Level 3</p>
                    </a>
                  </li> --}}
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


                {{-- <li
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
                </li> --}}

                {{-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Tables
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../tables/simple.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Simple Tables</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../tables/data.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>DataTables</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../tables/jsgrid.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>jsGrid</p>
                </a>
              </li>
            </ul>
          </li> --}}
                <li class="nav-header">EXAMPLES</li>
                <li class="nav-item">
                    <a href="../calendar.html" class="nav-link">
                        <i class="nav-icon far fa-calendar-alt"></i>
                        <p>
                            Calendar
                            <span class="badge badge-info right">2</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../gallery.html" class="nav-link">
                        <i class="nav-icon far fa-image"></i>
                        <p>
                            Gallery
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../kanban.html" class="nav-link">
                        <i class="nav-icon fas fa-columns"></i>
                        <p>
                            Kanban Board
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-envelope"></i>
                        <p>
                            Mailbox
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="../mailbox/mailbox.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Inbox</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../mailbox/compose.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Compose</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../mailbox/read-mail.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Read</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Pages
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="../examples/invoice.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Invoice</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../examples/profile.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Profile</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../examples/e-commerce.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>E-commerce</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../examples/projects.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Projects</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../examples/project-add.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Project Add</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../examples/project-edit.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Project Edit</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../examples/project-detail.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Project Detail</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../examples/contacts.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Contacts</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../examples/faq.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>FAQ</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../examples/contact-us.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Contact us</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-plus-square"></i>
                        <p>
                            Extras
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Login & Register v1
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="../examples/login.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Login v1</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../examples/register.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Register v1</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../examples/forgot-password.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Forgot Password v1</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../examples/recover-password.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Recover Password v1</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Login & Register v2
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="../examples/login-v2.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Login v2</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../examples/register-v2.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Register v2</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../examples/forgot-password-v2.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Forgot Password v2</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../examples/recover-password-v2.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Recover Password v2</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="../examples/lockscreen.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Lockscreen</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../examples/legacy-user-menu.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Legacy User Menu</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../examples/language-menu.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Language Menu</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../examples/404.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Error 404</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../examples/500.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Error 500</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../examples/pace.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pace</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../examples/blank.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Blank Page</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../../starter.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Starter Page</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-search"></i>
                        <p>
                            Search
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="../search/simple.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Simple Search</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../search/enhanced.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Enhanced</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-header">MISCELLANEOUS</li>
                <li class="nav-item">
                    <a href="../../iframe.html" class="nav-link">
                        <i class="nav-icon fas fa-ellipsis-h"></i>
                        <p>Tabbed IFrame Plugin</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="https://adminlte.io/docs/3.1/" class="nav-link">
                        <i class="nav-icon fas fa-file"></i>
                        <p>Documentation</p>
                    </a>
                </li>
                <li class="nav-header">MULTI LEVEL EXAMPLE</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-circle nav-icon"></i>
                        <p>Level 1</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-circle"></i>
                        <p>
                            Level 1
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Level 2</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Level 2
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Level 3</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Level 3</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Level 3</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Level 2</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-circle nav-icon"></i>
                        <p>Level 1</p>
                    </a>
                </li>
                <li class="nav-header">LABELS</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-circle text-danger"></i>
                        <p class="text">Important</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-circle text-warning"></i>
                        <p>Warning</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-circle text-info"></i>
                        <p>Informational</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

{{-- @stack('scripts')
@push('scripts')
    <script src="{{asset('./js/multipleDropDown.js')}}"></script>
@endpush --}}
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
        // if (APP_URL == "/medicine_types") {
        //     document.getElementById("medicineType").classList.add("nav-treeview");
        // }
        // if (APP_URL == "/add_medicine_type") {
        //     document.getElementById("medicineType").classList.add("nav-treeview");
        // }
        // if (APP_URL == "/medicines") {
        //     document.getElementById("medicine").classList.add("nav-treeview");
        // }
        // if (APP_URL == "/add_medicine") {
        //     document.getElementById("medicine").classList.add("nav-treeview");
        // }
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

    // function medicineType() {
    //     $("#medicineType").removeClass("disabled");
    //     $("#medicineType").addClass("nav nav-treeview");
    // }

    // function medicine() {
    //     $("#medicine").removeClass("disabled");
    //     $("#medicine").addClass("nav nav-treeview");
    // }

</script>
