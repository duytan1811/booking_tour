@extends('client.layout._app')
@section('content')
    <div class="breadcumb-wrapper" style="background:url({{ asset('assets/client/images/breadcumb-bg.jpg') }})">
        <div class="container z-index-common">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Tạo tài khoản</h1>
                <div class="breadcumb-menu-wrap">
                    <ul class="breadcumb-menu">
                        <li><a href="{!! route('home') !!}">Trang chủ</a></li>
                        <li>Tạo tài khoản</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="signup-wrapper  space">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 ">
                    {!! Form::open(['url' => route('auth.registerHandle'), 'class' => 'signup-form bg-smoke']) !!}
                    <h2 class="form-title text-center mb-lg-35">Tạo tài khoản</h2>
                    <div class="form-group">
                        <label for="signUpUserName" class="sr-only">Tài khoản</label>
                        {!! Form::text('username', '', ['class' => 'form-control', 'placeholder' => 'Tài khoản*']) !!}
                        @error('username')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-6">
                                <label for="signUpUserName" class="sr-only">Họ</label>
                                {!! Form::text('first_name', '', ['class' => 'form-control', 'placeholder' => 'Họ*']) !!}
                                @error('first_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label for="signUpUserName" class="sr-only">Tên</label>
                                {!! Form::text('last_name', '', ['class' => 'form-control', 'placeholder' => 'Tên*']) !!}
                                @error('last_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-6">
                                <label for="signUpUserName" class="sr-only">Số điện thoại</label>
                                {!! Form::text('phone', '', ['class' => 'form-control', 'placeholder' => 'Số điện thoại*']) !!}
                                @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label for="signUpUserName" class="sr-only">Email</label>
                                {!! Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'Email*']) !!}
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="signUpUserPass" class="sr-only">Mật khẩu</label>
                        {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Mật khẩu*']) !!}
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="signUpUserPass" class="sr-only">Xác nhận mật khẩu</label>
                        {!! Form::password('confirm_password', ['class' => 'form-control', 'placeholder' => 'Xác nhận mật khẩu*']) !!}
                        @error('confirm_password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input type="checkbox" name="signUpTerms" id="signUpTerms">
                        <label for="signUpTerms">Tôi đã đọc và đồng ý với các điều khoản và điều kiện của trang web</label>
                        @error('signUpTerms')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mb-0 text-center">
                        <button class="vs-btn w-100 style4" type="submit">Đăng ký</button>
                        <div class="bottom-links link-inherit pt-3">
                            <span>Đã có tài khoản? <a class="text-theme" href="{!! Route('auth.login') !!}">Đăng nhập</a></span>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
