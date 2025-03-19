@extends('client.layout._app')
@section('content')
    <section class="hero-layout" data-bg-src="assets/client/img/banner/banner-bg-1.png">
        <div class="hero-mask">
            <div class="vs-carousel" id="hero-slider" data-slide-show="1" autoplay="false">
                @foreach ($sliders as $item)
                    <div class="hero-slide">
                        <div class="container">
                            <div class="row align-items-center justify-content-between">
                                <div class="col-lg-6">
                                    <div class="hero-content">
                                        <span class="hero-subtitle">Hãy đi ngay bây giờ</span>
                                        <h1 class="hero-title">{{ $item->name }}</h1>
                                        <p class="hero-text">{{ $item->description }}
                                        </p>
                                        <a href="{!! route('blogs.show', $item->id) !!}" class="vs-btn style4">Chi tiết</a>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="hero-img">
                                        <img class="img1" src="{{ asset('storage/' . $item->image) }}" alt="hero">
                                        <img class="img2" src="{{ asset('storage/' . $item->image_1) }}" alt="hero">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="slide-count vs-slider-tab" data-asnavfor="#hero-slider">
                @for ($i = 0; $i < count($sliders); $i++)
                    <button class="tab-btn {{ $i == 0 ? 'active' : '' }}">{{ $i + 1 }}</button>
                @endfor

            </div>

            <div class="hero-bottom">
                <div class="container">
                    {!! Form::open(['method' => 'GET', 'url' => route('tours.index'), 'class' => 'hero-form']) !!}
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="form-group ">
                                <i class="fas fa-compass"></i>
                                {!! Form::text('destination', '', ['class' => 'form-control', 'placeholder' => 'Điểm đến']) !!}
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <i class="fas fa-calendar-alt"></i>
                                {!! Form::date('departure_time', '', ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <i class="fas fa-thumbtack"></i>
                                {!! Form::select('type', $tour_types, '', ['class' => 'form-select']) !!}
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                            <button type="submit" class="vs-btn style4">Tìm kiếm</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </section>


    <div class="space-top space-extra-bottom blog-wrapper1 shape-mockup-wrap">
        <div class="shape-mockup d-none d-xl-block spin z-index-negative" data-top="-5%" data-left="-5%">
            <img src="assets/client/img/shape/circle1.png" alt="circle">
        </div>
        <div class="shape-mockup d-none d-xl-block jump z-index-negative" data-bottom="5%" data-right="5%">
            <img src="assets/client/img/shape/Dot.png" alt="Dots">
        </div>
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-xxl-6 col-xl-7 col-lg-8 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="title-area">
                        <span class="sec-subtitle">Mẹo du lịch thiết yếu</span>
                        <h2 class="sec-title h1">Những mẹo tuyệt vời giúp chuyến du lịch của bạn trở nên tuyệt vời</h2>
                    </div>
                </div>
            </div>
            @foreach ($tips as $item)
                <div class="blog-style4">
                    <div class="blog-image">
                        <img src="{{ asset('storage/' . $item->image) }}" style="width: 705px;height:450px"
                            alt="blog image">
                        <div class="category-tag"><a href="#"><i class="fas fa-tag"></i> {{ $item->type_name }}</a>
                        </div>
                    </div>
                    <div class="blog-content" data-bg-src="assets/client/img/shape/blog-bg.png">
                        <a class="blog-date" href="{!! route('blogs.show', $item->id) !!}"><i class="far fa-calendar-alt "></i>
                            {{ $item->created_at_formatted }}</a>
                        <h3 class="blog-title" style="overflow-wrap: break-word">
                            <a href="{!! route('blogs.show', $item->id) !!}">
                                {{ $item->name }}</a>
                        </h3>
                        <p class="blog-text"> {{ $item->description }}...</p>
                        <a class="vs-btn style4" href="{!! route('blogs.show', $item->id) !!}">Chi tiết</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <section class="space bg-light shape-mockup-wrap" data-bg-src="assets/client/img/shape/Bg.png">
        <div class="shape-mockup d-none d-xl-block jump z-index-negative" data-bottom="20%" data-left="5%">
            <img src="{{ asset('assets/client/img/shape/Dot.png') }}" alt="Dots">
        </div>
        <div class="shape-mockup d-none d-xl-block spin z-index-negative" data-bottom="-5%" data-right="-5%">
            <img src="{{ asset('assets/client/img/shape/circle1.png') }}" alt="Circle">
        </div>
        <div class="shape-mockup d-none d-xl-block ripple-animation z-index-negative" data-top="10%" data-left="10%">
            <img src="{{ asset('assets/client/img/shape/Plane.png') }}" alt="plane">
        </div>
        @if (!empty($special_tours))
            <div class="container">
                <div class="row justify-content-center text-center">
                    <div class="col-xl-6 col-lg-8 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="title-area">
                            <span class="sec-subtitle">Những chuyến du lịch tuyệt vời</span>
                            <h2 class="sec-title h1">Gói kỳ nghỉ tốt nhất</h2>

                        </div>
                    </div>
                </div>
                <div class="row vs-carousel" data-slide-show="4" data-arrows="false" data-lg-slide-show="3"
                    data-md-slide-show="2" data-sm-slide-show="1">
                    @foreach ($special_tours as $item)
                        <div class="col-xl-3 col-lg-6 col-sm-6">
                            <div class="package-style1">
                                <div class="package-img">
                                    <a href="{!! route('tours.show', $item->id) !!}"><img class="w-100"
                                            src="{{ asset('storage/' . $item->image) }}" alt="Package Image"></a>
                                </div>
                                <div class="package-content">

                                    <h3 class="package-title"><a href="{!! route('tours.show', $item->id) !!}">{{ $item->name }}</a>
                                    </h3>
                                    <p class="package-text">{{ $item->destination }}</p>
                                    <div class="package-meta">
                                        <a href="{!! route('tours.show', $item->id) !!}" style="border: none"><i
                                                class="fas fa-calendar-alt"></i> Days:
                                            {{ $item->tour_days }}</a><br>
                                        <a href="{!! route('tours.show', $item->id) !!}"><i class="fas fa-user"></i> People:
                                            {{ $item->people }}</a>
                                    </div>
                                    <div class="package-footer">
                                        <span class="package-price">{{ number_format($item->price, 0, ',', '.') }}
                                            đ</span>
                                        <a href="{!! route('tours.show', $item->id) !!}" class="vs-btn style4">
                                            <i class="fa fa-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="text-center pt-lg-2">
                    <a href="{!! route('tours.index') !!}" class="vs-btn">Xem thêm</a>
                </div>
            </div>
        @endIf
    </section>

    <section class="space space-extra-bottom gallery-style1">
        <div class="container">
            <div class="row">
                <div class="col-xl-6">
                    <div class="title-area">
                        <span class="sec-subtitle">Đi và khám phá</span>
                        <h2 class="sec-title h1">Những thành phố ngoạn mục</h2>
                    </div>
                    <div class="row">
                        <div class="col-xl-6 col-sm-6">
                            <img class="gallery-image" src="{{ asset('assets/client/img/gallery/gallery-1-1.jpg') }}"
                                alt="images">
                        </div>
                        <div class="col-xl-6 col-sm-6">
                            <img class="gallery-image" src="{{ asset('assets/client/img/gallery/gallery-1-2.jpg') }}"
                                alt="images">
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="gallery-video">
                        <img src="assets/client/img/gallery/gallery-1-3.jpg" alt="gallery-image">
                        <div class="gallery-btn">
                            <span>Xem video</span>
                            <a href="https://www.youtube.com/watch?v=J342qeHrMSQ" class="play-btn popup-video"><i
                                    class="fas fa-play"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="space-extra-bottom">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-md-6 col-sm-6 col-12">
                    <div class="features-style1">
                        <div class="features-bg" data-bg-src="assets/client/img/shape/features.png"></div>
                        <div class="features-image">
                            <img src="assets/client/img/features/features-1-1.png" alt="image">
                        </div>
                        <div class="features-content">
                            <h3 class="features-title">Hoạt động đặc biệt</h3>
                            <p class="features-text">Các hoạt động giải trí trong mỗi chuyến đi</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-sm-6 col-12">
                    <div class="features-style1">
                        <div class="features-bg" data-bg-src="assets/client/img/shape/features.png"></div>
                        <div class="features-image">
                            <img src="assets/client/img/features/features-1-2.png" alt="image">
                        </div>
                        <div class="features-content">
                            <h3 class="features-title">Nguyên tắc</h3>
                            <p class="features-text">Tuân thủ theo nguyên tắc chung của đoàn</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-sm-6 col-12">
                    <div class="features-style1">
                        <div class="features-bg" data-bg-src="assets/client/img/shape/features.png"></div>
                        <div class="features-image">
                            <img src="assets/client/img/features/features-1-3.png" alt="image">
                        </div>
                        <div class="features-content">
                            <h3 class="features-title">Sắp xếp chuyến đi </h3>
                            <p class="features-text">Đưa ra lịch trình phù hợp co từng chuyến đi</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-sm-6 col-12">
                    <div class="features-style1">
                        <div class="features-bg" data-bg-src="assets/client/img/shape/features.png"></div>
                        <div class="features-image">
                            <img src="assets/client/img/features/features-1-4.png" alt="image">
                        </div>
                        <div class="features-content">
                            <h3 class="features-title">Quản lý địa điểm</h3>
                            <p class="features-text">Lựa chọn những địa điểm nổi bật và đẹp</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="space position-relative" data-bg-src="assets/client/img/bg/offer-bg.jpg">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-xxl-5 col-xl-5 col-lg-6 col-md-6">
                    <div class="title-area white-title mb-md-0">
                        <span class="sec-subtitle">Đi và khám phá</span>
                        <h2 class="sec-title h1">Nhận ưu đãi đặc biệt</h2>
                        <p class="sec-text">Với những khách hàng thân thiết sẽ được giảm giá 5% - 35% cho những chuyễn tour
                            tiếp theo</p>
                        <a href="{!! route('contact') !!}" class="vs-btn style2">Xem thêm</a>
                    </div>
                </div>
                <div class="col-xxl-5 col-xl-5 col-lg-6 col-md-6">
                    <div class="img-box1">
                        <img class="img-1-1" src="assets/client/img/shape/offer-1-1.png" alt="Offer image">
                        <div class="img-1-2 d-none d-xxl-block">
                            <img src="assets/client/img/shape/bag.png" alt="image">
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
                        <h2 class="sec-title h1">Blog mới nhất của chúng tôi</h2>
                    </div>
                </div>
            </div>
            <div class="row vs-carousel" data-slide-show="3" data-arrows="false" data-lg-slide-show="2"
                data-md-slide-show="2" data-sm-slide-show="1" adaptiveHeight="true">
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
