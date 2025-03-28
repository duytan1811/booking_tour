@extends('client.layout._app')
@section('title', 'Chi tiết tour')
@section('content')
    <div class="breadcumb-wrapper" style="background:url({{ asset('assets/client/images/breadcumb-bg.jpg') }})">
        <div class="container z-index-common">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Tour</h1>
                <div class="breadcumb-menu-wrap">
                    <ul class="breadcumb-menu">
                        <li><a href="{!! route('home') !!}">Trang chủ</a></li>
                        <li><a href="{!! route('tours.index') !!}">Tour du lịch</a></li>
                        <li>{{ $tour->name }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <section class="space-bottom">
        <div class="outer-wrap">
            <div class="filter-menu1 filter-menu-active wow fadeInUp wow-animated">
                <button class="tab-button active" data-filter=".tab-content1"><i class="fas fa-info-circle"></i>
                    Thông tin chung</button>
                <button class="tab-button" data-filter=".tab-content5"><i class="fas fa-comments"></i> Bình luận</button>
            </div>
            <div class="container">
                <div class="shadow-content1">
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="filter-active tour-booking-active">
                                <div class="filter-item tab-content1">
                                    <div class="info-image">
                                        <img src="{{ asset('storage/' . $tour->image) }}" alt="tours-img">
                                    </div>
                                    <div class="tour-review">
                                        <ul>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="far fa-star"></i></li>
                                            <li><i class="far fa-star"></i></li>
                                            <li>({{ count($comments) }} bình luận)</li>
                                        </ul>
                                    </div>
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-md-6">
                                            <h2 class="tab-title">{{ $tour->name }}</h2>
                                        </div>
                                        <div class="col-auto d-flex">
                                            <p class="tour-price">
                                                <strong>{{ number_format($tour->price, 0, ',', '.') }} đ</strong>/người
                                                @if ($current_user)
                                                    <a href="{!! route('checkout.booking', $tour->id) !!}" class="vs-btn mx-2"> Đặt lịch</a>
                                                @endIf
                                            </p>
                                        </div>
                                    </div>
                                    <p>{{ $tour->description }}</p>
                                    <table class="infolist">
                                        <tr>
                                            <td class="info-heading">Điểm đến</td>
                                            <td class="info">{{ $tour->destination }}</td>
                                        </tr>
                                        <tr>
                                            <td class="info-heading">Thời gian khởi hành</td>
                                            <td class="info">{{ $tour->departure_time_formatted }}</td>
                                        </tr>
                                        <tr>
                                            <td class="info-heading">Giới hạn độ tuổi</td>
                                            <td class="info">
                                                {{ $tour->age_restriction ? $tour->age_restriction . '+' : 'Không giới hạn độ tuổi' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="info-heading">Quy định về trang phục</td>
                                            <td class="info">{{ $tour->dress_code ?? 'Tự do' }}</td>
                                        </tr>
                                        <tr>
                                            <td class="info-heading">Thời gian trở về</td>
                                            <td class="info">{{ $tour->return_time_formatted }}</td>
                                        </tr>
                                    </table>
                                </div>

                                <div class="filter-item tab-content5 w-100">
                                    <div class="rating-wrap mt-0 pt-10" style="border:none">

                                        @forelse ($comments as $item)
                                            <div class="rating-author">
                                                <div class="author-image">
                                                    <img src="{{ asset('assets/client/img/user/default.jpg')}}"
                                                        alt="Rating Author">
                                                </div>
                                                <div class="author-info">
                                                    <h3 class="author-text h5">{{ $item->user->full_name }}</h3>
                                                    <span class="author-digi">CEO, Vecuro</span>
                                                </div>
                                            </div>
                                            <p class="rating-text">Nội dung:  {{ $item->comment }}</p>
                                        @empty
                                            Chưa có bình luận nào
                                        @endforelse


                                        {!! Form::open(['url' => route('tours.comment', $tour->id), 'method'=>'POST','class' => 'vs-comment-form']) !!}

                                        <div id="respond" class="comment-respond">
                                            <h3 class="blog-inner-title">Để lại bình luận</h3>
                                            @if ($current_user)
                                                <div class="row">
                                                    {!! Form::hidden('object_id', $tour->id) !!}
                                                    {!! Form::hidden('user_id', $current_user->id) !!}
                                                    {!! Form::hidden('type', 1) !!}
                                                    <div class="col-12 form-group">
                                                        <textarea class="form-control" name="comment" placeholder="Nội dung"></textarea>
                                                        @error('comment')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-12 form-group">
                                                        <button type="submit" class="vs-btn style4">Bình
                                                            luận</button>
                                                    </div>
                                                </div>
                                            @else
                                                Hãy <a href="">Đăng nhập</a> để lại bình luận
                                            @endif

                                        </div>
                                        {!! Form::close() !!}

                                    </div>
                                </div>
                            </div>
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
