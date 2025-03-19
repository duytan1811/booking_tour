@extends('admin.layout._layout_empty')
@section('content')
    <div class="bg-gd-dusk">
        <div class="hero-static content content-full bg-body-extra-light">
            <div class="py-4 px-1 text-center mb-4">
                <a class="link-fx fw-bold" href="index.html">
                    <i class="fa fa-fire"></i>
                    <span class="fs-4 text-body-color">code</span><span class="fs-4">base</span>
                </a>
                <h1 class="h3 fw-bold mt-5 mb-2">Welcome to Your Dashboard</h1>
                <h2 class="h5 fw-medium text-muted mb-0">Đăng nhập để tiếp tục</h2>
            </div>
            <div class="row justify-content-center px-1">

                <div class="col-sm-8 col-md-6 col-xl-4">
                    {!! Form::open(['route' => 'admin.loginHandle']) !!}
                    @if(count($errors))
                    <div class="alert alert-danger" role="alert">
                        <p class="mb-0">
                            {{ $errors->first() }}
                        </p>
                    </div>
                    @endEmpty
                    <div class="form-floating mb-4">
                        <input type="text" class="form-control" id="login-username" name="username">
                        <label class="form-label" for="login-username">Tài khoản</label>
                    </div>
                    <div class="form-floating mb-4">
                        <input type="password" class="form-control" id="login-password" name="password">
                        <label class="form-label" for="login-password">Mật khẩu</label>
                    </div>
                    <div class="row g-sm mb-4">
                        <div class="col-12 mb-2">
                            <button type="submit" class="btn btn-lg btn-alt-primary w-100 py-3 fw-semibold">
                                Đăng nhập
                            </button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
