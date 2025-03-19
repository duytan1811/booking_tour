<header id="page-header">
    <div class="content-header" style="max-width:100% !important">
        <div class="space-x-1">
            <button type="button" class="btn btn-sm btn-alt-secondary" data-toggle="layout" data-action="sidebar_toggle">
                <i class="fa fa-fw fa-bars"></i>
            </button>
            <div class="dropdown d-inline-block">
                <button type="button" class="btn btn-sm btn-alt-secondary" id="page-header-themes-dropdown"
                    data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-fw fa-brush"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-lg p-0" aria-labelledby="page-header-themes-dropdown">
                    <div class="px-3 py-2 bg-body-light rounded-top">
                        <h5 class="fs-sm text-center mb-0">
                            Chủ đề
                        </h5>
                    </div>
                    <div class="px-2 py-3">
                        <div class="row g-1 text-center">
                            <div class="col-4">
                                <button type="button" class="dropdown-item mb-0 d-flex align-items-center gap-2"
                                    data-toggle="layout" data-action="dark_mode_off" data-dark-mode="off">
                                    <i class="far fa-sun fa-fw opacity-50"></i>
                                    <span class="fs-sm fw-medium">Tối</span>
                                </button>
                            </div>
                            <div class="col-4">
                                <button type="button" class="dropdown-item mb-0 d-flex align-items-center gap-2"
                                    data-toggle="layout" data-action="dark_mode_on" data-dark-mode="on">
                                    <i class="fa fa-moon fa-fw opacity-50"></i>
                                    <span class="fs-sm fw-medium">Sáng</span>
                                </button>
                            </div>
                            <div class="col-4">
                                <button type="button" class="dropdown-item mb-0 d-flex align-items-center gap-2"
                                    data-toggle="layout" data-action="dark_mode_system" data-dark-mode="system">
                                    <i class="fa fa-desktop fa-fw opacity-50"></i>
                                    <span class="fs-sm fw-medium">Hệ thống</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="space-x-1">
            <div class="dropdown d-inline-block">
                <button type="button" class="btn btn-sm btn-alt-secondary" id="page-header-user-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-user d-sm-none"></i>
                    <span class="d-none d-sm-inline-block fw-semibold">{{ $current_user->full_name }}</span>
                    <i class="fa fa-angle-down opacity-50 ms-1"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-md dropdown-menu-end p-0"
                    aria-labelledby="page-header-user-dropdown">
                    <div class="px-2 py-3 bg-body-light rounded-top">
                        <h5 class="h6 text-center mb-0">
                            John Smith
                        </h5>
                    </div>
                    <div class="p-2">
                        <a class="dropdown-item d-flex align-items-center justify-content-between space-x-1"
                            href="be_pages_generic_profile.html">
                            <span>Tài khoản</span>
                            <i class="fa fa-fw fa-user opacity-25"></i>
                        </a>

                        <div class="dropdown-divider"></div>
                        {!! Form::open(['url' => route('admin.logout'), 'method' => 'POST']) !!}
                        <button type="submit" class="dropdown-item d-flex align-items-center justify-content-between space-x-1">
                            <span>Đăng xuất</span>
                            <i class="fa fa-fw fa-sign-out-alt opacity-25"></i>
                        </button>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
