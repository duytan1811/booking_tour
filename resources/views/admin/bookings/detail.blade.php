@extends('admin.layout._app')
@section('title', 'Chi tiêt đặt lịch')
@section('content')
    <div class="text-end mb-3">
        <a href="{!! route('admin.bookings.index') !!}" class="btn btn-danger">Quay lại</a>
    </div>

    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Thông tin chung</h3>
            <div class="block-options d-flex">
                @if($tour_booking->status===0 || $tour_booking->status===2)
                {!! Form::open(['url' => route('admin.bookings.update', $tour_booking->id), 'method' => 'PUT','class'=>'me-2']) !!}
                {!! Form::hidden('status',1)!!}
                <button type="submit" class="btn btn-sm btn-primary">Xác nhận</button>
                {!! Form::close() !!}
                @endIf
                
                @if($tour_booking->status===0 || $tour_booking->status===1)
                {!! Form::open(['url' => route('admin.bookings.update', $tour_booking->id), 'method' => 'PUT']) !!}
                {!! Form::hidden('status',2)!!}
                <button type="submit" class="btn btn-sm btn-danger">Hủy bỏ</button>
                {!! Form::close() !!}
                @endIf
            </div>
        </div>

        <div class="block-content">
            <div class="row">
                <div class="col-4">
                    <div class="row">
                        <small class="fst-italic">Tên khách hàng</small>
                        <p>{{ $tour_booking->user->full_name }}</p>
                    </div>

                    <div class="row">
                        <small class="fst-italic">Số điện thoại</small>
                        <p>{{ $tour_booking->user->phone ?? '--' }}</p>
                    </div>
                </div>
                <div class="col-4">
                    <div class="row">
                        <small class="fst-italic">Email</small>
                        <p>{{ $tour_booking->user->email ?? '--' }}</p>
                    </div>
                    <div class="row">
                        <small class="fst-italic">Địa chỉ</small>
                        <p>{{ $tour_booking->user->address ?? '--' }}</p>
                    </div>

                </div>
                <div class="col-4">
                    <div class="row">
                        <small class="fst-italic">Tổng tiền</small>
                        <p>{{ number_format($tour_booking->total_price, 0, ',', '.') }} đ</p>
                    </div>

                    <div class="row mb-3">
                        <small class="fst-italic">Trạng thái</small>
                        <div>
                            <span
                                class="badge {{ $tour_booking->status === 2 ? 'bg-danger' : ($tour_booking->status === 1 ? 'bg-success' : 'bg-warning') }}">{{ $tour_booking->status_name }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Thông tin chi tiết</h3>
        </div>

        <div class="block-content">
            <div class="table-responsive">
                <table class="table data-table table-striped table-vcenter">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 50px;">#</th>
                            <th>Tour</th>
                            <th>Thời gian bắt đầu</th>
                            <th>Thời gian kết thúc</th>
                            <th>Số người</th>
                            <th>Giá</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($tour_booking_details as $item)
                            <tr>
                                <td class="text-center">
                                    {{ $loop->iteration }}
                                </td>
                                <td class="fw-semibold">{{ $item->tour->name }}</td>
                                <td>{{ $item->tour->departure_time_formatted }}</td>
                                <td>{{ $item->tour->return_time_formatted }}</td>
                                <td>{{ $item->tour->people }}</td>
                                <td>{{ number_format($item->tour->price, 0, ',', '.') }} đ</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">Không tìm thấy dữ liệu theo yêu cầu</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
