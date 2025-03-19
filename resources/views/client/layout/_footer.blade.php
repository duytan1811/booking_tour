<footer class="footer-wrapper footer-layout1" data-bg-src="assets/client/img/bg/footer-bg.jpg">
    <div class="footer-top">
        <div class="shadow-color"></div>
        <div class="container">
            <div class="cta-style1">
                <div class="row g-5 align-items-center justify-content-between">
                    <div class="col-lg-6">
                        <div class="cta-content">
                            <h2 class="cta-title">Sẵn sàng để bắt đầu chưa?</h2>
                            <p class="cta-text">Chỉ mất vài phút để đăng ký tài khoản MIỄN PHÍ của bạn</p>
                            <a href="{!! route('auth.register') !!}" class="vs-btn style2">Mở tài khoản</a>
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-6">
                        <div class="cta-image d-lg-block d-none">
                            <img src="{{ asset('assets/client/img/newsletter.png') }}" alt="CTA Image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="widget-area">
        <div class="container">
            <div class="row g-5 justify-content-between">
                <div class="col-md-6 col-xl-4">
                    <div class="widget footer-widget">
                        <div class="vs-widget-about">
                            <div class="footer-logo">
                                <a href="{{ route('home') }}"><img src="{{ asset('assets/client/img/logo.svg') }}"
                                        alt="" class="logo" /></a>
                            </div>
                            <p class="footer-text">Giúp bạn trải nghiệm những điều mới mẻ</p>
                            <div class="social-style1">
                                <a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                <a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
                                <a href="#" target="_blank"><i class="fab fa-pinterest-p"></i></a>
                                <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-2">
                    <div class="widget widget_nav_menu footer-widget">
                        <h3 class="widget_title">Liên kết</h3>
                        <div class="menu-all-pages-container">
                            <ul class="menu">
                                <li><a href="{!! route('home') !!}"><i class="far fa-angle-right"></i> Trang chủ</a>
                                </li>
                                <li><a href="{!! route('tours.index') !!}"><i class="far fa-angle-right"></i> Tours</a></li>
                                <li><a href="{!! route('blogs.index') !!}"><i class="far fa-angle-right"></i> Bài viết</a>
                                </li>
                                <li><a href="{!! route('about') !!}"><i class="far fa-angle-right"></i> Giới thiệu</a>
                                </li>
                                <li><a href="{!! route('contact') !!}"><i class="far fa-angle-right"></i> Liên hệ</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-xl-5">
                    <div class="widget footer-widget">
                        <h4 class="widget_title">Đăng ký</h4>
                        {!! Form::open(['url' => '', 'class' => 'newsletter-form']) !!}
                        <p class="form_text">Đăng ký bản tin của chúng tôi để nhận cập nhật nhanh chóng</p>
                        <input class="form-control" type="email" placeholder="Nhập địa chỉ email" />
                        <button type="submit" class="vs-btn">Đăng ký</button>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="copyright-wrap">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-auto">
                    <p class="copyright-text">Bản quyền <i class="fal fa-copyright"></i>
                        <script>
                            document.write(new Date().getFullYear())
                        </script> <a href="{!! route('home') !!}">MT</a>.
                        Đã đăng ký bản quyền bởi <a href="#">AND</a>
                    </p>
                </div>
                <div class="col-auto d-none d-lg-block">
                    <div class="copyright-menu">
                        <ul class="list-unstyled">
                            <li><a href="#">Quyền riêng tư</a></li>
                            <li><a href="#">Điều khoản & Điều kiện</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
