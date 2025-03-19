<div class="sidebar-area">
    <div class="widget widget_search">
        <div class="widget_title">Tìm kiếm</div>
        {!! Form::open(['method' => 'get', 'url' => route('blogs.index'), 'class' => 'search-form']) !!}
        <input type="search" name="search" value="{{ $searchValue }}" placeholder="Nhập tên tour">
        <button type="submit"><i class="far fa-search"></i></button>
        {!! Form::close() !!}
    </div>
    <div class="widget">
        <h3 class="widget_title">Bài viết gần đây</h3>
        <div class="recent-post-wrap">
            @foreach ($recentBlogs as $item)
                <div class="recent-post">
                    <div class="media-img">
                        <a href="{!! route('blogs.show', $item->id) !!}">
                            <img src="{{ asset('storage/' . $item->image) }}" alt="">
                        </a>
                    </div>
                    <div class="media-body">
                        <h4 class="post-title">
                            <a class="text-inherit" href="{!! route('blogs.show', $item->id) !!}">
                                {{ $item->name }}
                            </a>
                        </h4>
                        <div class="recent-post-meta">
                            <i class="fas fa-calendar-alt"></i>
                            <a href="{!! route('blogs.show', $item->id) !!}">{{ $item->created_at_formatted }}</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="widget widget_categories">
        <h3 class="widget_title">Danh mục</h3>
        <ul>
            @foreach ($categories as $item)
                <li><a href="{!! route('blogs.index', ['category' => $item->id]) !!}">{{ $item->name }}</a> </li>
            @endforeach
        </ul>
    </div>

    <div class="widget widget-newsletter">
        <h3 class="widget_title">Đăng ký nhận thông báo</h3>
        <form class="newsletter-form">
            <input class="form-control" type="email" placeholder="Nhập địa chỉ email" />
            <button type="submit" class="vs-btn style4">Đăng lý</button>
        </form>
    </div>

    <div class="widget widget-social">
        <h3 class="widget_title">Theo dõi</h3>
        <div class="social-style widget_social_style">
            <a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a>
            <a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
            <a href="#" target="_blank"><i class="fab fa-pinterest-p"></i></a>
            <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
        </div>
    </div>
</div>
