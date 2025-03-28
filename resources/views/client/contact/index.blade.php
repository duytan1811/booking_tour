@extends('client.layout._app')
@section('title', 'Liên hệ')
@section('content')
    <div class="breadcumb-wrapper" style="background:url({{ asset('assets/client/images/breadcumb-bg.jpg') }})">
        <div class="container z-index-common">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Liên hệ</h1>
                <div class="breadcumb-menu-wrap">
                    <ul class="breadcumb-menu">
                        <li><a href="{!! route('home') !!}">Trang chủ</a></li>
                        <li>Liên hệ</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <section class="space contact-box_wrapper">
        <div class="outer-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="contact-box">
                            <div class="contact-box_icon">
                                <i class="fas fa-map-marked-alt"></i>
                            </div>
                            <h3 class="contact-box__title h5">Địa chỉ</h3>
                            <p class="contact-box__text">
                                {{ isset($app_settings) ? $app_settings['address'] : 'Quận 8, Hồ Chí Minh' }}
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="contact-box">
                            <div class="contact-box_icon">
                                <i class="fas fa-address-card"></i>
                            </div>
                            <h3 class="contact-box__title h5">Liên hệ</h3>
                            <ul class="contact-box_list">
                                <li>Số điện thoại: <a href="#123456789">{{ isset($app_settings) ? $app_settings['phone'] : '0854334564' }}</a></li>
                                <li>Hotline: <a href="#123456789">{{ isset($app_settings) ? $app_settings['phone'] : '0854335322' }}</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="contact-box">
                            <div class="contact-box_icon">
                                <i class="fas fa-clock"></i>
                            </div>
                            <h3 class="contact-box__title h5">Giờ làm việc</h3>
                            <ul class="contact-box_list">
                                <li>Thứ 2 - Thứ 6: 8:30 - 20:00</li>
                                <li>Thứ 7 & Chủ nhật: 9:30 - 21:30</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="space bg-light">
        <div class="container">
            {!! Form::open(['url' => route('contactHandle')]) !!}
            <div class="row justify-content-center text-center">
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
                    <div class="title-area">
                        <span class="sec-subtitle">Liên hệ với chúng tôi</span>
                        <h2 class="sec-title h1">Liên hệ</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6 form-group">
                    {!! Form::text('first_name', '', ['class' => 'form-control', 'placeholder' => 'Họ']) !!}
                    @error('first_name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-6 form-group">
                    {!! Form::text('last_name', '', ['class' => 'form-control', 'placeholder' => 'Tên']) !!}
                    @error('last_name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-6 form-group">
                    {!! Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'Email']) !!}
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-6 form-group">
                    {!! Form::text('phone', '', ['class' => 'form-control', 'placeholder' => 'Số điện thoại']) !!}
                    @error('phone')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group col-12">
                    <textarea placeholder="Nội dung" name="comment" class="form-control"></textarea>
                    @error('comment')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-auto pt-lg-3">
                    <button class="vs-btn style4" type="submit">Gửi liên hệ</button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
