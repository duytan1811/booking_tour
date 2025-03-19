@extends('client.layout._app')
@section('content')
    <div class="breadcumb-wrapper" style="background:url({{ asset('assets/client/images/breadcumb-bg.jpg') }})">
        <div class="container z-index-common">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Đăng nhập</h1>
                <div class="breadcumb-menu-wrap">
                    <ul class="breadcumb-menu">
                        <li><a href="{!! route('home') !!}">Trang chủ</a></li>
                        <li>Trang chủ</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="signup-wrapper  space">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 ">
                    {!! Form::open(['url' => route('auth.loginHandle'), 'class' => 'signup-form bg-smoke']) !!}
                    <h2 class="form-title text-center mb-lg-35">Đăng nhập</h2>
                    <div class="form-group">
                        <label for="loginUserId" class="sr-only">Tài khoản</label>
                        {!! Form::text('username', '', ['class' => 'form-control', 'placeholder' => 'Tài khoản*']) !!}
                    </div>
                    <div class="form-group">
                        <label for="loginUserPass" class="sr-only">Mật khẩu*</label>
                        {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Mật khẩu*']) !!}
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="loginRemember" id="loginRemember">
                        <label for="loginRemember">Ghi nhớ đăng nhập</label>
                    </div>
                    <div class="form-group mb-0 text-center">
                        <button class="vs-btn mask-style1 w-100 style4" type="submit">Đăng nhập</button>
                        <div class="bottom-links link-inherit d-md-flex justify-content-between mt-3">
                            <a href="#" class="recovery-link mb-2 mb-md-0">Quên mật khẩu?</a>
                            <a href="{!! route('auth.register') !!}">hoặc Tạo tài khoản</a>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
