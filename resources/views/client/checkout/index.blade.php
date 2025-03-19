@extends('client.layout._app')
@section('content')
    <div class="breadcumb-wrapper" style="background:url({{ asset('assets/client/images/breadcumb-bg.jpg') }})">
        <div class="container z-index-common">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Đặt lịch</h1>
                <div class="breadcumb-menu-wrap">
                    <ul class="breadcumb-menu">
                        <li><a href="{!! route('home') !!}">Trang chủ</a></li>
                        <li><a href="{!! route('tours.index') !!}">Tour du lịch</a></li>
                        <li>Đặt lịch</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <section class="vs-checkout-wrapper space mt-0 pt-0">
        <div class="container">
            {!! Form::open(['url' => route('checkout.store'), 'class' => 'woocommerce-checkout']) !!}
            <div class="row">
                <div class="col-7">
                    <h2 class="h4">Thông tin chi tiết</h2>
                    <div class="row">
                        {!! Form::hidden('user_id', $current_user->id) !!}
                        {!! Form::hidden('tour_id', $tour->id) !!}
                        <div class="col-md-6 form-group">
                            {!! Form::text('name', $current_user->first_name, ['class' => 'form-control', 'placeholder' => 'Họ']) !!}
                        </div>
                        <div class="col-md-6 form-group">
                            {!! Form::text('name', $current_user->last_name, ['class' => 'form-control', 'placeholder' => 'Tên']) !!}
                        </div>

                        <div class="col-md-6 form-group">
                            {!! Form::text('phone', $current_user->phone, ['class' => 'form-control', 'placeholder' => 'Số điện thoại']) !!}
                        </div>
                        <div class="col-md-6 form-group">
                            {!! Form::text('email', $current_user->email, ['class' => 'form-control', 'placeholder' => 'Email']) !!}
                        </div>

                        <div class="col-12 form-group">
                            {!! Form::text('address', $current_user->address, ['class' => 'form-control', 'placeholder' => 'Địa chỉ']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-5">
                    <h2 class="h4" style="margin-top:60px">Tour du lịch</h2>
                    <div class="woocommerce-cart-form">
                        <div class="table-responsive">
                            <table class="cart_table">
                                <thead>
                                    <tr>
                                        <th class="cart-col-image">Tên</th>
                                        <th class="cart-col-productname">Bắt đầu</th>
                                        <th class="cart-col-price">Giá</th>
                                        <th class="cart-col-total">Tổng tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="cart_item">
                                        <td>
                                            <a class="cart-productname" href="{!! route('tours.show', $tour->id) !!}">
                                                {{ $tour->name }}
                                            </a>
                                        </td>
                                        <td>
                                            {{ $tour->departure_time_formatted }}
                                        </td>
                                        <td>
                                            <span class="amount"><bdi>{{ number_format($tour->price, 0, ',', '.') }}
                                                    đ</bdi></span>
                                        </td>

                                        <td>
                                            <span class="amount">
                                                <bdi>{{ number_format($tour->price, 0, ',', '.') }} đ</bdi>
                                            </span>
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot class="checkout-ordertable">
                                    <tr class="order-total">
                                        <th>Tổng tiền</th>
                                        <td colspan="4">
                                            <strong>
                                                <span class="woocommerce-Price-amount amount"><bdi>
                                                        <span class="woocommerce-Price-currencySymbol">
                                                            {{ number_format($tour->price, 0, ',', '.') }} đ
                                                    </bdi>
                                                </span>
                                            </strong>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        </form>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-9"></div>
                    <div class="col-3 text-end">
                        <button class="vs-btn">Xác nhận</button>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}

    </section>
@endsection
