<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true"
    data-img="theme-assets/images/backgrounds/02.jpg">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto"><a class="navbar-brand" href="{{ route('admin.home') }}">
                    <i class="fa fa-tachometer"></i>
                    <h3 class="brand-text">Admin Panel</h3>
                </a></li>
            <li class="nav-item d-md-none"><a class="nav-link close-navbar"><i class="ft-x"></i></a></li>
        </ul>
    </div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" {{ Request::is('admin/dashboard') ? 'active' : '' }} "><a href="{{ route('admin.home') }}"><i
                        class="ft-home"></i><span class="menu-title" data-i18n="">Dashboard</span></a>
            </li>
            <li class=" nav-item  {{ Request::is('admin/categories*') ? 'active' : '' }} "><a
                    href="{{ route('admin.categories.index') }}"><i class="fa fa-building-o"></i><span
                        class="menu-title" data-i18n="">Categories</span></a>
            </li>

            <li class=" nav-item  {{ Request::is('admin/gifts*') ? 'active' : '' }} "><a
                    href="{{ route('admin.gifts.index') }}"><i class="fa fa-gift"></i><span class="menu-title"
                        data-i18n="">Gifts</span></a>
            </li>

            <li class=" nav-item  {{ Request::is('admin/orders*') ? 'active' : '' }} "><a
                    href="{{ route('admin.orders.index') }}"><i class="fa fa-shopping-cart"></i><span class="menu-title"
                        data-i18n="">Orders</span></a>
            </li>
            <li class=" nav-item  {{ Request::is('admin/myOrder') ? 'active' : '' }} "><a
                    href="{{ route('admin.orders.myOrder') }}"><i class="fa fa-shopping-cart"></i><span class="menu-title"
                        data-i18n="">my Orders</span></a>
            </li>
            @if (Auth::user()->hasRole('admin'))
                <li class=" nav-item {{ Request::is('admin/reports') ? 'active' : '' }} "><a
                        href="{{ route('admin.reports') }}"><i class="fa fa-ban"></i><span class="menu-title"
                            data-i18n="">Reports</span></a>
                </li>
            @endif
            @if (Auth::user()->hasRole('admin'))
                <li class=" nav-item {{ Request::is('admin/users*') ? 'active' : '' }} "><a
                        href="{{ route('admin.users.index') }}"><i class="ft-users"></i><span class="menu-title"
                            data-i18n="">Users</span></a>
                </li>
            @endif
        </ul>
    </div><a class="btn btn-danger btn-block btn-glow btn-upgrade-pro mx-1" href="/" target="_blank">Home</a>
    <div class="navigation-background"></div>
</div>
