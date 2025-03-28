@extends('client.layout._app')
@section('title', 'Tài khoản')
@section('content')
    <div class="breadcumb-wrapper" style="background:url({{ asset('assets/client/images/breadcumb-bg.jpg') }})">
        <div class="container z-index-common">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Thông tin tài khoản</h1>
                <div class="breadcumb-menu-wrap">
                    <ul class="breadcumb-menu">
                        <li><a href="{!! route('home') !!}">Trang chủ</a></li>
                        <li>Thông tin tài khoản</li>
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
                <button class="tab-button" data-filter=".tab-content5"><i class="fas fa-comments"></i> Tour đã đặt</button>
            </div>
            <div class="container">
                <div class="shadow-content1">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="filter-active tour-booking-active">
                                <div class="filter-item tab-content1 w-100">
                                    <div class="row mb-3">
                                        <div class="col-4"> Tên tài khoản</div>
                                        <div class="col-8">{{ $current_user->username }}</div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-4"> Họ tên</div>
                                        <div class="col-8">{{ $current_user->full_name }}</div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-4"> Email</div>
                                        <div class="col-8">{{ $current_user->email ?? '--' }}</div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-4"> Số điện thoại</div>
                                        <div class="col-8">{{ $current_user->phone ?? '--' }}</div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-4"> Địa chỉ</div>
                                        <div class="col-8">{{ $current_user->address ?? '--' }}</div>
                                    </div>
                                </div>

                                <div class="filter-item tab-content5 w-100">
                                    @if (count($tour_bookings))
                                        <div class="row">

                                        </div>
                                        <div class="table-responsive">
                                            <table class="cart_table">
                                                <thead>
                                                    <tr>
                                                        <th class="cart-col-image">Ảnh</th>
                                                        <th class="cart-col-image">Tên</th>
                                                        <th class="cart-col-productname">Ngày khởi hành</th>
                                                        <th class="cart-col-price">Ngày kết thúc</th>
                                                        <th class="cart-col-quantity">Giá</th>
                                                        <th class="cart-col-total">Trạng thái</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($tour_bookings as $item)
                                                        <tr class="cart_item">
                                                            <td data-title="Product">
                                                                <a class="cart-productimage" href="shop-details.html"><img
                                                                        width="80" height="80"
                                                                        src="{{ asset('storage/' . $item->tour->image) }}"
                                                                        alt="Image"></a>
                                                            </td>
                                                            <td data-title="Name">
                                                                <a class="cart-productname" href="{!! route('tours.show',$item->tour->id)!!}">
                                                                    {{ $item->tour->name }}
                                                                </a>
                                                            </td>
                                                            <td data-title="Price">
                                                                {{ $item->tour->departure_time_formatted }}
                                                            </td>
                                                            <td data-title="Quantity">
                                                                {{ $item->tour->return_time_formatted }}
                                                            </td>
                                                            <td data-title="Total">
                                                                {{ number_format($item->tour->price, 0, ',', '.') }} đ
                                                            </td>
                                                            <td data-title="Remove">
                                                               {{ $item->tour_booking->status_name }}
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    @else
                                        <div>
                                            Chưa có tour nào
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
