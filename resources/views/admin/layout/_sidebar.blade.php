<nav id="sidebar">
    <div class="sidebar-content">
        <div class="content-header justify-content-lg-center">
            <div>
                <span class="smini-visible fw-bold tracking-wide fs-lg">
                    c<span class="text-primary">b</span>
                </span>
                <a class="link-fx fw-bold tracking-wide mx-auto" href="{!! route('admin.dashboard') !!}">
                    <span class="smini-hidden">
                        <i class="fa fa-fire text-primary"></i>
                        <span class="fs-4 text-dual">code</span><span class="fs-4 text-primary">base</span>
                    </span>
                </a>
            </div>
            <div>
                <button type="button" class="btn btn-sm btn-alt-danger d-lg-none" data-toggle="layout"
                    data-action="sidebar_close">
                    <i class="fa fa-fw fa-times"></i>
                </button>
            </div>
        </div>
        <div class="js-sidebar-scroll">
            <div class="content-side content-side-full">
                <ul class="nav-main">
                    <li class="nav-main-item">
                        <a class="nav-main-link active" href="{!! route('admin.dashboard') !!}">
                            <i class="nav-main-link-icon fa fa-house"></i>
                            <span class="nav-main-link-name">Tổng quan</span>
                        </a>
                    </li>

                    <li class="nav-main-item">
                        <a class="nav-main-link" href="{!! route('admin.bookings.index') !!}">
                            <i class="nav-main-link-icon fa fa-credit-card"></i>
                            <span class="nav-main-link-name">Quản lý đặt tour</span>
                        </a>
                    </li>

                    <li class="nav-main-item">
                        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                            aria-expanded="false" href="#">
                            <i class="nav-main-link-icon fa fa-route"></i>
                            <span class="nav-main-link-name">Quản lý tour</span>
                        </a>
                        <ul class="nav-main-submenu">
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="{{ route('admin.tours.index')}}">
                                    <span class="nav-main-link-name">Danh sách tour</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                            aria-expanded="false" href="#">
                            <i class="nav-main-link-icon fa fa-newspaper"></i>
                            <span class="nav-main-link-name">Quản lý bài viết</span>
                        </a>
                        <ul class="nav-main-submenu">
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="{!! route('admin.blogs.index') !!}">
                                    <span class="nav-main-link-name">Danh sách bài viết</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="{!! route('admin.categories.index') !!}">
                                    <span class="nav-main-link-name">Danh sách danh mục</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link" href="{!! route('admin.contacts.index') !!}">
                            <i class="nav-main-link-icon fa fa-address-book"></i>
                            <span class="nav-main-link-name">Quản lý liên hệ</span>
                        </a>
                    </li>

                    <li class="nav-main-item">
                        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                            aria-expanded="false" href="#">
                            <i class="nav-main-link-icon fa fa-cogs"></i>
                            <span class="nav-main-link-name">Cài đặt</span>
                        </a>
                        <ul class="nav-main-submenu">
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="be_widgets_tiles.html">
                                    <span class="nav-main-link-name">Thông tin website</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
