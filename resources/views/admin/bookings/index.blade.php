@extends('admin.layout._app')
@section('content')
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Danh sách đặt tour</h3>
        </div>

        <div class="block-content">
            <div class="row mb-3">
                <div class="col-6"></div>
                <div class="col-6">
                    {!! Form::open(['method' => 'GET', 'url' => route('admin.bookings.index')]) !!}
                    <div class="d-flex justify-content-center align-items-center">
                        <span style="width:155px">Tìm kiếm:</span>
                        <input type="search" name="search" value="{{ $searchValue }}" class="form-control me-1">
                        <button type="submit" class="btn btn-primary" style="width:175px">Tìm kiếm</button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>

            <div class="table-responsive">
                <table class="table data-table table-striped table-vcenter">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 50px;">#</th>
                            <th>Họ tên</th>
                            <th>Số điện thoại</th>
                            <th>Ngày đặt</th>
                            <th>Trạng thái</th>
                            <th class="text-center" style="width: 150px;">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>

                        @forelse ($tour_bookings as $item)
                            <tr>
                                <td class="text-center">
                                    {{ $loop->iteration + ($tour_bookings->currentPage() - 1) * $tour_bookings->perPage() }}
                                </td>
                                <td class="fw-semibold">{{ $item->user->full_name }}</td>
                                <td>{{ $item->user->phone }}</td>
                                <td>{{ $item->created_at_formatted }}</td>
                                <td>
                                    <span
                                        class="badge {{ $item->status === 2 ? 'bg-danger' : ($item->status === 1 ? 'bg-success' : 'bg-warning') }}">{{ $item->status_name }}</span>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group">

                                        {!! Form::open(['method' => 'delete', 'url' => route('admin.bookings.destroy', $item->id)]) !!}
                                        <a href="{!! route('admin.bookings.show', $item->id) !!}" class="btn btn-sm btn-success"
                                            data-bs-toggle="tooltip" title="Chi tiết">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <button type="submit" class="btn btn-sm btn-danger" data-bs-toggle="tooltip"
                                            title="Xóa">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                        {!! Form::close() !!}
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">Không tìm thấy dữ liệu theo yêu cầu</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-end">
                {{ $tour_bookings->links() }}
            </div>
        </div>
    </div>
@endsection
