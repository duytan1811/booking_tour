<div class="vs-menu-wrapper">
    <div class="vs-menu-area text-center">
        <button class="vs-menu-toggle"><i class="fal fa-times"></i></button>
        <div class="mobile-logo">
            <a href="{!! route('home') !!}"><img src="{{ asset('assets/client/img/logo.svg') }}" alt=""></a>
        </div>
        <div class="vs-mobile-menu">
            <ul>
                <li>
                    <a href="{{ route('home') }}">Trang chủ</a>
                </li>
                <li>
                    <a href="{!! route('tours.index') !!}">Tour</a>
                </li>
                <li>
                    <a href="{!! route('blogs.index') !!}">Bài viết</a>
                </li>
                <li>
                    <a href="{!! route('about') !!}">Giới thiệu</a>
                </li>

                <li>
                    <a href="{!! route('contact') !!}">Liên hệ</a>
                </li>
            </ul>
        </div>
    </div>
</div>

<div class="popup-search-box d-none d-lg-block  ">
    <button class="searchClose"><i class="fal fa-times"></i></button>
    <form action="#">
        <input type="text" class="border-theme" placeholder="What are you looking for">
        <button type="submit"><i class="fal fa-search"></i></button>
    </form>
</div>

<header class="vs-header header-layout1">
    <div class="container">
        <div class="header-top">
            <div class="row justify-content-between align-items-center">
                <div class="col d-none d-lg-block">
                    <ul class="header-contact">
                        <li><i class="fas fa-envelope"></i> <a
                                href="mailto:{{ isset($app_settings) ? $app_settings['email'] : 'mail@drop.cc' }}">{{ isset($app_settings) ? $app_settings['email'] : 'mail@drop.cc' }}</a>
                        </li>
                        <li><i class="fas fa-phone-alt"></i> <a
                                href="tel:{{ isset($app_settings) ? $app_settings['phone'] : '' }}">{{ isset($app_settings) ? $app_settings['phone'] : '0854334564' }}</a>
                        </li>
                    </ul>
                </div>
                <div class="col-auto">
                    <div class="header-social">
                        <a href="/"><i class="fab fa-facebook-f"></i></a>
                        <a href="/"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                <div class="col-auto d-flex ">
                    @if ($current_user)
                        <a class="user-btn" href="{!! route('account.index') !!}"><i class="far fa-user-circle"></i></a>
                    @else
                        <a class="user-btn" href="{!! route('auth.login') !!}"><i class="far fa-user-circle"></i></a>
                    @endIf
                </div>
            </div>
        </div>
    </div>
    <div class="sticky-wrapper">
        <div class="sticky-active">
            <div class="container position-relative z-index-common">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto">
                        <div class="vs-logo">
                            <a href="{!! route('home') !!}"><img src="{{ asset('assets/client/img/logo.svg') }}"
                                    alt="logo"></a>
                        </div>
                    </div>
                    <div class="col text-end text-xl-center">
                        <nav class="main-menu  menu-style1 d-none d-lg-block">
                            <ul>
                                <li>
                                    <a href="{{ route('home') }}">Trang chủ</a>
                                </li>
                                <li>
                                    <a href="{!! route('tours.index') !!}">Tour</a>
                                </li>
                                <li>
                                    <a href="{!! route('blogs.index') !!}">Bài viết</a>
                                </li>
                                <li>
                                    <a href="{!! route('about') !!}">Giới thiệu</a>
                                </li>

                                <li>
                                    <a href="{!! route('contact') !!}">Liên hệ</a>
                                </li>
                            </ul>
                        </nav>
                        <button class="vs-menu-toggle d-inline-block d-lg-none"><i class="fal fa-bars"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
