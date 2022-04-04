<aside class="main-sidebar sidebar-dark-primary elevation-4" style="min-height: 917px;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">{{ trans('panel.site_title') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route("admin.home") }}">
                        <i class="fas fa-fw fa-tachometer-alt nav-icon">
                        </i>
                        <p>
                            {{ trans('global.dashboard') }}
                        </p>
                    </a>
                </li>
                @can('user_management_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/permissions*") ? "menu-open" : "" }} {{ request()->is("admin/roles*") ? "menu-open" : "" }} {{ request()->is("admin/users*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-users">

                            </i>
                            <p>
                                {{ trans('cruds.userManagement.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('permission_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.permissions.index") }}" class="nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-unlock-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.permission.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('role_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.roles.index") }}" class="nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-briefcase">

                                        </i>
                                        <p>
                                            {{ trans('cruds.role.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('user_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-user">

                                        </i>
                                        <p>
                                            {{ trans('cruds.user.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                
                @can('user_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/users*") ? "menu-open" : "" }} {{ request()->is("admin/provinces*") ? "menu-open" : "" }} {{ request()->is("admin/cities*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-map-marker-alt">

                            </i>
                            <p>
                                {{ trans('cruds.user.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('country_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.users_by_role", 'CountryHead') }}" class="nav-link {{ request()->is("admin/countries") || request()->is("admin/countries/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fa fa-users">

                                        </i>
                                        <p>
                                            Country Heads
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('province_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.users_by_role", 'ProvinceHead') }}" class="nav-link {{ request()->is("admin/provinces") || request()->is("admin/provinces/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fa fa-users">

                                        </i>
                                        <p>
                                            Province Heads
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('city_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.users_by_role", 'Manager') }}" class="nav-link {{ request()->is("admin/cities") || request()->is("admin/cities/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fa fa-users">

                                        </i>
                                        <p>
                                            Managers
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('city_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.users_by_role", 'Agent') }}" class="nav-link {{ request()->is("admin/cities") || request()->is("admin/cities/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fa fa-users">

                                        </i>
                                        <p>
                                            Agents
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('location_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/countries*") ? "menu-open" : "" }} {{ request()->is("admin/provinces*") ? "menu-open" : "" }} {{ request()->is("admin/cities*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-map-marker-alt">

                            </i>
                            <p>
                                {{ trans('cruds.location.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('country_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.countries.index") }}" class="nav-link {{ request()->is("admin/countries") || request()->is("admin/countries/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-flag">

                                        </i>
                                        <p>
                                            {{ trans('cruds.country.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('province_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.provinces.index") }}" class="nav-link {{ request()->is("admin/provinces") || request()->is("admin/provinces/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.province.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('city_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.cities.index") }}" class="nav-link {{ request()->is("admin/cities") || request()->is("admin/cities/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.city.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('booking_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/dealers*") ? "menu-open" : "" }} {{ request()->is("admin/plots*") ? "menu-open" : "" }} {{ request()->is("admin/clients*") ? "menu-open" : "" }} {{ request()->is("admin/applications*") ? "menu-open" : "" }} {{ request()->is("admin/installments*") ? "menu-open" : "" }} {{ request()->is("admin/payments*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon far fa-address-book">

                            </i>
                            <p>
                                {{ trans('cruds.booking.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('dealer_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.dealers.index") }}" class="nav-link {{ request()->is("admin/dealers") || request()->is("admin/dealers/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.dealer.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('plot_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.plots.index") }}" class="nav-link {{ request()->is("admin/plots") || request()->is("admin/plots/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.plot.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('client_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.clients.index") }}" class="nav-link {{ request()->is("admin/clients") || request()->is("admin/clients/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.client.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('application_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.applications.index") }}" class="nav-link {{ request()->is("admin/applications") || request()->is("admin/applications/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.application.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('installment_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.installments.index") }}" class="nav-link {{ request()->is("admin/installments") || request()->is("admin/installments/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.installment.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('payment_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.payments.index") }}" class="nav-link {{ request()->is("admin/payments") || request()->is("admin/payments/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.payment.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                    @can('profile_password_edit')
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}" href="{{ route('profile.password.edit') }}">
                                <i class="fa-fw fas fa-key nav-icon">
                                </i>
                                <p>
                                    {{ trans('global.change_password') }}
                                </p>
                            </a>
                        </li>
                    @endcan
                @endif
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                        <p>
                            <i class="fas fa-fw fa-sign-out-alt nav-icon">

                            </i>
                            <p>{{ trans('global.logout') }}</p>
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>