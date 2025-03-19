@extends('admin.layout._app')
@section('content')
    <div class="row">
        <div class="col-6 col-xl-4">
            <a class="block block-rounded block-link-shadow text-end" href="javascript:void(0)">
                <div class="block-content block-content-full d-sm-flex justify-content-between align-items-center">
                    <div class="d-none d-sm-block">
                        <i class="fa fa-wallet fa-2x opacity-25"></i>
                    </div>
                    <div>
                        <div class="fs-3 fw-semibold"> {{ number_format($wait_sum_amount, 0, ',', '.') }} đ</div>
                        <div class="fs-sm fw-semibold text-uppercase text-muted">Chờ xác nhận</div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-6 col-xl-4">
            <a class="block block-rounded block-link-shadow text-end" href="javascript:void(0)">
                <div class="block-content block-content-full d-sm-flex justify-content-between align-items-center">
                    <div class="d-none d-sm-block">
                        <i class="fa fa-envelope-open fa-2x opacity-25"></i>
                    </div>
                    <div>
                        <div class="fs-3 fw-semibold">{{ number_format($wait_sum_amount_today, 0, ',', '.') }} đ</div>
                        <div class="fs-sm fw-semibold text-uppercase text-muted">Chờ xác nhận hôm nay</div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-6 col-xl-4">
            <a class="block block-rounded block-link-shadow text-end" href="javascript:void(0)">
                <div class="block-content block-content-full d-sm-flex justify-content-between align-items-center">
                    <div class="d-none d-sm-block">
                        <i class="fa fa-users fa-2x opacity-25"></i>
                    </div>
                    <div>
                        <div class="fs-3 fw-semibold">{{ number_format($sum_amount_today, 0, ',', '.') }} đ</div>
                        <div class="fs-sm fw-semibold text-uppercase text-muted">Doanh thu hôm nay</div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="block block-rounded">
            <div class="block-header">
                <h3 class="block-title">
                    Danh sách tour chờ xác nhận
                    </small>
                </h3>
                <div class="block-options">
                    <a href="{!! route('admin.bookings.index') !!}" class="btn-block-option">
                        Xem tất cả
                    </a>
                </div>
            </div>
            <div class="block-content p-1 bg-body-light">
                <div class="table-responsive">
                    <table class="table data-table table-striped table-vcenter">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 50px;">#</th>
                                <th>Họ tên</th>
                                <th>Số điện thoại</th>
                                <th>Ngày đặt</th>
                                <th>Tông tiền</th>
                                <th>Trạng thái</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($wait_tour_bookings as $item)
                                <tr>
                                    <td class="text-center">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td class="fw-semibold">{{ $item->user->full_name }}</td>
                                    <td>{{ $item->user->phone }}</td>
                                    <td>{{ $item->created_at_formatted }}</td>
                                    <td>{{ number_format($item->total_price, 0, ',', '.') }} đ</td>
                                    <td>
                                        <span
                                            class="badge {{ $item->status === 2 ? 'bg-danger' : ($item->status === 1 ? 'bg-success' : 'bg-warning') }}">{{ $item->status_name }}</span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9" class="text-center">Không tìm thấy dữ liệu theo yêu cầu</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
