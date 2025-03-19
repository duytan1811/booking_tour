@extends('client.layout._app')
@section('content')
    <div class="breadcumb-wrapper" style="background:url({{ asset('assets/client/images/breadcumb-bg.jpg') }})">
        <div class="container z-index-common">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Bài viết</h1>
                <div class="breadcumb-menu-wrap">
                    <ul class="breadcumb-menu">
                        <li><a href="{!! route('home') !!}">Trang chủ</a></li>
                        <li><a href="{!! route('blogs.index') !!}">Bài viết</a></li>
                        </li>
                        <li>{{ $blog->name }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero Area End -->

    <!-- Blog details Content Area Start -->
    <div class="vs-blog-wrapper vs-blog-details space-top space-extra-bottom">
        <div class="container">
            <div class="row gx-30">
                <div class="col-lg-8">
                    <div class="vs-blog blog-single">
                        <div class="blog-img">
                            <img src="{{ asset('storage/' . $blog->image) }}" alt="">
                        </div>
                        <div class="blog-content">
                            <h2 class="blog-title">{{ $blog->name }}</h2>
                            <div class="blog-meta">
                                <a href="blog.html"><i class="far fa-calendar"></i>{{ $blog->created_at_formatted }}</a>
                                <a href="blog.html"><i class="fal fa-user"></i>bởi admin</a>
                            </div>

                            <p>{!! nl2br(e($blog->content)) !!}</p>

                            <div class="clearfix share-links">
                                <div class="row justify-content-between gy-30">
                                    <div class="col-xl-auto col-md-auto">

                                    </div>
                                    <div class="col-xl-auto col-md-auto">
                                        <span class="share-links-title">Chia sẻ:</span>
                                        <ul class="social-links">
                                            <li>
                                                <a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                            </li>
                                            <li>
                                                <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
                                            </li>
                                            <li>
                                                <a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                                            </li>
                                            <li>
                                                <a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="vs-comments-wrap mt-5">
                                <h2 class="blog-inner-title">Bình luận ({{ count($comments)}})</h2>
                                <ul class="comment-list">
                                    @forelse ($comments as $item)
                                    <li class="vs-comment-blog">
                                        <div class="vs-post-comment">
                                            <div class="comment-avater">
                                                <img src="assets/img/blog/comment-author-3.jpg" alt="Comment Author">
                                            </div>
                                            <div class="comment-content">
                                                <span class="commented-on"><i class="fal fa-calendar-alt"></i>
                                                {{ $item->created_at_formatted }}</span>
                                                <h4 class="name h4">{{ $item->user->name }}</h4>
                                                <p class="text">{{ $item->comment }}</p>
                                            </div>
                                        </div>
                                    </li>
                                    @empty
                                    <li class="vs-comment-blog">
                                        Hãy là người đầu tiên để lại bình luận
                                    </li>
                                    @endforelse
                                   
                                </ul>
                            </div>

                            @isset($current_user)
                                {!! Form::open(['url' => route('blogs.comment', $blog->id), 'class' => 'vs-comment-form']) !!}
                                <div id="respond" class="comment-respond">
                                    <h3 class="blog-inner-title">Để lại bình luận</h3>
                                    <div class="row">
                                        {!! Form::hidden('object_id', $blog->id) !!}
                                        {!! Form::hidden('user_id', $current_user->id) !!}
                                        {!! Form::hidden('type', 2) !!}
                                        <div class="col-12 form-group">
                                            <textarea class="form-control" name="comment" placeholder="Nội dung"></textarea>
                                            @error('comment')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-12 form-group">
                                            <button type="submit" class="vs-btn style4">Bình luận</button>
                                        </div>
                                    </div>
                                </div>
                                {!! Form::close() !!}
                            @endisset

                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    @include('client.blogs._sidebar')
                </div>
            </div>
        </div>
    </div>
@endsection
