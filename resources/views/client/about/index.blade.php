@extends('client.layout._app')
@section('title', 'Về chúng tôi')
@section('content')
    <div class="breadcumb-wrapper" style="background:url({{ asset('assets/client/images/breadcumb-bg.jpg') }})">
        <div class="container z-index-common">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Về chúng tôi</h1>
                <div class="breadcumb-menu-wrap">
                    <ul class="breadcumb-menu">
                        <li><a href="{!! route('home') !!}">Trang chủ</a></li>
                        <li>Về chúng tôi</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <section class="space">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="image-box1">
                        <img class="img1" src="{{ asset('assets/client/img/about/img-2-1.jpg') }}" alt="">
                        <img class="img2" src="{{ asset('assets/client/img/about/img-2-2.jpg') }}" alt="">
                        <div class="media-box1">
                            <span class="media-info">05 năm</span>
                            <p class="media-text">Kinh nghiệm</p>
                        </div>
                        <div class="media-box2">
                            <span class="media-info">1,000</span>
                            <p class="media-text">Khách hàng</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="about-content">
                        <div class="title-area">
                            <span class="sec-subtitle">Chúng tôi là Travolo</span>
                            <h2 class="sec-title h1">Tốt nhất cho chuyến du lịch của bạn</h2>
                        </div>
                        <ul class="about-list1">
                            <li>Cho bạn trải nghiệm tốt nhất.</li>
                            <li>Lộ trình rõ ràng.</li>
                            <li>Đội ngũ HDV tận tình.</li>
                            <li>Luôn ưu đãi về giá cả.</li>
                            <li>Phù hợp với nhiều độ tuổi.</li>
                            <li>Có nhiều ưu đãi hấp dẫn.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="space bg-light">
        <div class="container" data-bg-src="assets/client/img/bg/map-bg.png">
            <div class="row justify-content-center text-center">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="title-area">
                        <span class="sec-subtitle">Lộ trình</span>
                        <h2 class="sec-title h1">Lịch sử</h2>
                    </div>
                </div>
            </div>
            <div class="row mt-60 mb-70">
                <div class="col-lg-6 col-md-6 history-steped">
                    <span class="divider"></span>
                    <div class="vs-history">
                        <div class="header-area">
                            <h3 class="history-title">{{ isset($app_settings) ? $app_settings['app_name'] : '' }}</h3>
                            <span class="history-date">2025</span>
                        </div>
                        <p class="history-text">Nền tảng đặt tour du lịch trực tuyến hàng đầu! Chúng tôi cung cấp hàng trăm
                            tour du lịch trong nước và quốc tế, giúp bạn dễ dàng tìm kiếm, so sánh và đặt tour chỉ trong vài
                            bước. Với dịch vụ chuyên nghiệp, giá cả minh bạch và hỗ trợ tận tình, chúng tôi cam kết mang đến
                            những trải nghiệm du lịch tuyệt vời nhất!</p>
                    </div>
                </div>
                {{-- <div class="col-lg-6 col-md-6 history-steped">
                    <span class="divider"></span>
                    <div class="vs-history">
                        <div class="header-area">
                            <h3 class="history-title">Travolo</h3>
                            <span class="history-date">2022</span>
                        </div>
                        <p class="history-text">Nền tảng đặt tour du lịch trực tuyến hàng đầu! Chúng tôi cung cấp hàng trăm
                          tour du lịch trong nước và quốc tế, giúp bạn dễ dàng tìm kiếm, so sánh và đặt tour chỉ trong vài
                          bước. Với dịch vụ chuyên nghiệp, giá cả minh bạch và hỗ trợ tận tình, chúng tôi cam kết mang đến
                          những trải nghiệm du lịch tuyệt vời nhất!</p>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>
    <!--==============================
         Histoy area End
         ==============================-->

    <!--==============================
             Special Offer Area Start
          ==============================-->
    <section class="space-top space-extra-bottom offer-style1" data-bg-src="assets/client/img/bg/offer-bg.jpg">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-xl-5 col-lg-6">
                    <div class="title-area white-title">
                        <span class="sec-subtitle">Đi và khám phá</span>
                        <h2 class="sec-title h1">Nhận ưu đãi đặc biệt</h2>
                        <p class="sec-text">Các chuyến tour với ưu đãi hấp dẫn</p>
                        <a href="{!! route('tours.index') !!}" class="vs-btn style2 ">Xem thêm</a>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-6">
                    <div class="img-box2">
                        <span class="spinner-style1"></span>
                        <div class="img1">
                            <img src="assets/client/img/shape/offer-1-1.png " alt="Offer image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="space space-extra-bottom blog-wrapper">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-xl-6 col-lg-8 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="title-area">
                        <span class="sec-subtitle">Blog & Tin tức</span>
                        <h2 class="sec-title h1">Blog mới nhất</h2>
                    </div>
                </div>
            </div>
            <div class="row vs-carousel" data-slide-show="3" data-arrows="false" data-lg-slide-show="2"
                data-md-slide-show="2" data-sm-slide-show="1">
                @foreach ($blogs as $item)
                    <div class="col-xl-4">
                        <div class="vs-blog blog-style3">
                            <div class="blog-img">
                                <a href="{!! route('blogs.show', $item->id) !!}"><img src="{{ asset('storage/' . $item->image) }}"
                                        alt=""></a>
                            </div>
                            <div class="blog-content">
                                <h2 class="blog-title"><a href="{!! route('blogs.show', $item->id) !!}">
                                        {{ $item->name }}</a></h2>
                                <p class="blog-text"> {{ $item->description }}</p>
                                <div class="blog-bottom">
                                    <a class="blog-date" href="{!! route('blogs.show', $item->id) !!}"><i class="fas fa-calendar-alt"></i>
                                        {{ $item->created_at_formatted }}</a>
                                    <a class="vs-btn style4" href="{!! route('blogs.show', $item->id) !!}">Đọc tiếp <i
                                            class="fal fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="text-center mb-30 wow fadeInUp pt-lg-2" data-wow-delay="0.7s">
                <a href="{!! route('blogs.index') !!}" class="vs-btn">Xem thêm</a>
            </div>
        </div>
    </section>
@endsection
