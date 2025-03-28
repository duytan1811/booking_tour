@extends('client.layout._app')
@section('title', 'Bài viết')
@section('content')
    <div class="breadcumb-wrapper" style="background:url({{ asset('assets/client/images/breadcumb-bg.jpg') }})">
        <div class="container z-index-common">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Bài viết</h1>
                <div class="breadcumb-menu-wrap">
                    <ul class="breadcumb-menu">
                        <li><a href="{!! route('home') !!}">Trang chủ</a></li>
                        <li>Bài viết</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero Area End -->

    <!-- Blog Content Area Start -->
    <div class="vs-blog-wrapper space-top space-extra-bottom">
        <div class="container">
            <div class="row gx-30">
                <div class="col-lg-8">
                    <div class="row">
                        @forelse ($blogs as $item)
                            <div class="col-xl-6 col-md-6 col-sm-12 col-12">
                                <div class="vs-blog blog-style2">
                                    <div class="blog-img">
                                        <a href="{!! route('blogs.show', $item->id) !!}"><img src="{{ asset('storage/' . $item->image) }}"
                                                alt=""></a>
                                        <div class="blog-inner-author">
                                            <img src="{{ asset('assets/client/img/user/default.jpg') }}" alt="">
                                            <a href="#" class="author-name">Admin</a>
                                            <span class="author-degi">Admin</span>
                                        </div>
                                    </div>
                                    <div class="blog-content">
                                        <h2 class="blog-title"><a href="{!! route('blogs.show', $item->id) !!}">{{ $item->name }}</a>
                                        </h2>
                                        <p>{{ $item->description }}</p>
                                        <div class="blog-bottom">
                                            <a class="blog-date" href="#">
                                                <i class="fas fa-calendar-alt"></i>
                                                {{ $item->created_at_formatted }}</a>
                                            <a class="vs-btn has-arrow" href="{!! route('blogs.show', $item->id) !!}">Đọc thêm <i
                                                    class="fal fa-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div>
                                Không tìm thấy thông tin bài viết
                            </div>
                        @endforelse

                    </div>
                    <div class="vs-pagination pt-lg-2">
                        {{ $blogs->links() }}
                    </div>
                </div>
                <div class="col-lg-4">
                    @include('client.blogs._sidebar')
                </div>
            </div>
        </div>
    </div>
@endsection
