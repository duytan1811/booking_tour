@extends('client.layout._app')
@section('title', 'Danh sách tour')
@section('content')
    <div class="breadcumb-wrapper" style="background:url({{ asset('assets/client/images/breadcumb-bg.jpg') }})">
        <div class="container z-index-common">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Danh sách tours</h1>
                <div class="breadcumb-menu-wrap">
                    <ul class="breadcumb-menu">
                        <li><a href="{!! route('home') !!}">Trang chủ</a></li>
                        <li>Danh sách tours</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <section class="space-bottom">
        <div class="outer-wrap">

            <div class="container">
                <div class="shadow-content1" style="padding-top: 69px">
                    <div class="row">
                        <div class="col-lg-9">
                            @if (count($tours) > 0)
                                <div class="row  tours-active">
                                    @forelse ($tours as $tour)
                                        <div class="col-xl-4 col-lg-6 col-sm-6 filter-item hightTolow">
                                            <div class="package-style1">
                                                <div class="package-img">
                                                    <a href="{!! route('tours.show', $tour->id) !!}"><img
                                                            src="{{ asset('storage/' . $tour->image) }}"
                                                            alt="Package Image"></a>
                                                </div>
                                                <div class="package-content">
                                                    <h3 class="package-title"><a
                                                            href="{!! route('tours.show', $tour->id) !!}">{{ $tour->name }}</a></h3>
                                                    <p class="package-text">{{ $tour->destination }}</p>
                                                    <div class="package-meta">
                                                        <a href="#"><i class="fas fa-calendar-alt"></i> Ngày:
                                                            {{ $tour->tour_days }}</a><br>
                                                        <a href="#"><i class="fas fa-user"></i> Số người:
                                                            {{ $tour->people }}</a>
                                                    </div>
                                                    <div class="package-footer">
                                                        <span
                                                            class="package-price">{{ number_format($tour->price, 0, ',', '.') }}
                                                            đ</span>
                                                        <a href="{!! route('tours.show', $tour->id) !!}" class="vs-btn">
                                                            <i class="fa fa-arrow-right"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                    @endforelse
                                </div>
                                <div class="vs-pagination pt-lg-2" style="display: flex;justify-content: centers">
                                    {{ $tours->links() }}
                                </div>
                            @else
                                <div>
                                    Không tìm thấy thông tin tour du lịch
                                </div>
                            @endif
                        </div>
                        <div class="col-lg-3">
                            @include('client.tours._sidebar')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
