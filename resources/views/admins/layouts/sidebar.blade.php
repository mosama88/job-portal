    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link">
            <img src="{{ asset('admin') }}/assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
                class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">AdminLTE 3</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{ asset('admin') }}/assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2"
                        alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">{{ auth()->user()->name }}</a>
                </div>
            </div>

            <!-- SidebarSearch Form -->
            <div class="form-inline">
                <div class="input-group" data-widget="sidebar-search">
                    <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                        aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-sidebar">
                            <i class="fas fa-search fa-fw"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <li class="nav-item">
                        <a href="{{ route('admin.index') }}" class="nav-link @yield('dashboard_active')">
                            <i class="fa-solid fa-gauge"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-header">Attributes</li>
                    <li
                        class="nav-item {{ request()->is('admin/industry-types*') ||
                        request()->is('admin/organization-types*') ||
                        request()->is('admin/languages*') ||
                        request()->is('admin/skills*') ||
                        request()->is('admin/professions*')
                            ? 'menu-open'
                            : '' }}">
                        <a href="#"
                            class="nav-link {{ request()->is('admin/industry-types*') ||
                            request()->is('admin/organization-types*') ||
                            request()->is('admin/languages*') ||
                            request()->is('admin/skills*') ||
                            request()->is('admin/professions*')
                                ? 'active'
                                : '' }}">
                            <i class="fa-solid fa-list"></i>
                            <p>
                                Attributes
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.industry-types.index') }}" class="nav-link @yield('industry-types_active')">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Industry Types</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.organization-types.index') }}"
                                    class="nav-link @yield('organization-types_active')">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Organization Types</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('admin.languages.index') }}" class="nav-link @yield('languages_active')">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Languages</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.professions.index') }}" class="nav-link @yield('professions_active')">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Professions</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.skills.index') }}" class="nav-link @yield('skills_active')">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Skills</p>
                                </a>
                            </li>
                        </ul>
                    </li>


                    <li class="nav-header">Locations</li>
                    <li
                        class="nav-item {{ request()->is('admin/countries*') || request()->is('admin/states*') || request()->is('admin/cities*') ? 'menu-open' : '' }}">
                        <a href="#"
                            class="nav-link {{ request()->is('admin/countries*') || request()->is('admin/states*') || request()->is('admin/cities*') ? 'active' : '' }}">
                            <i class="fa-solid fa-location-crosshairs"></i>
                            <p>
                                Locations
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.countries.index') }}" class="nav-link @yield('countries_active')">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Country</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('admin.states.index') }}" class="nav-link @yield('states_active')">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>State</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('admin.cities.index') }}" class="nav-link @yield('cities_active')">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>City</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
