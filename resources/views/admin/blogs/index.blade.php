@extends('admin.layout._app')
@section('content')
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Danh sách bài viết</h3>
            <div class="block-options ">
                <a href={!! route('admin.blogs.create') !!} type="button" class="btn btn-sm btn-primary">Thêm mới</a>
            </div>
        </div>

        <div class="block-content">
            <div class="row mb-3">
                <div class="col-6"></div>
                <div class="col-6">
                    {!! Form::open(['method' => 'GET', 'url' => route('admin.categories.index')]) !!}
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
                            <th>Tên</th>
                            <th>Danh mục</th>
                            <th>Loại</th>
                            <th>Trạng thái</th>
                            <th class="text-center" style="width: 150px;">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>

                        @forelse ($blogs as $item)
                            <tr>
                                <td class="text-center">
                                    {{ $loop->iteration + ($blogs->currentPage() - 1) * $blogs->perPage() }}
                                </td>
                                <td class="fw-semibold">{{ $item->name }}</td>
                                <td class="fw-semibold">{{ $item->category->name }}</td>
                                <td class="fw-semibold">{{ $item->type_name }}</td>
                                <td>
                                    <span
                                        class="badge {{ $item->status !== 1 ? 'bg-danger' : 'bg-success' }}">{{ $item->status_name }}</span>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        {!! Form::open(['method' => 'delete', 'url' => route('admin.blogs.destroy', $item->id)]) !!}
                                        <a href="{!! route('admin.blogs.detail', ['id' => $item->id, 'tab' => 'general']) !!}" class="btn btn-sm btn-success"
                                            data-bs-toggle="tooltip" title="Chi tiết">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a href="{!! route('admin.blogs.edit', $item->id) !!}" class="btn btn-sm btn-primary"
                                            data-bs-toggle="tooltip" title="Sửa">
                                            <i class="fa fa-pencil-alt"></i>
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
                {{ $blogs->links() }}
            </div>
        </div>
    </div>
@endsection
