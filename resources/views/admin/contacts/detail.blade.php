@extends('admin.layout._app')
@section('content')
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Chi tiết liên hệ</h3>
            <div class="block-options ">
                <a href={!! route('admin.contacts.index') !!} type="button" class="btn btn-sm btn-danger">Quay lại</a>
            </div>
        </div>

        <div class="block-content">
            <div class="row mb-3">
                <div class="col-12">
                    Họ tên: {{ $contact->full_name }}
                </div>
            </div>


            <div class="row mb-3">
                <div class="col-12">
                    Email: {{ $contact->email }}
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12">
                    Số điện thoại: {{ $contact->phone }}
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-12">
                    Trạng thái: <span
                        class="badge {{ $contact->status !== 1 ? 'bg-danger' : 'bg-success' }}">{{ $contact->status_name }}</span>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12">
                    Nội dung: <br> {{ $contact->phone }}
                </div>
            </div>
        </div>
    </div>
@endsection
