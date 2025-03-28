@extends('admin.layout._app')
@section('title', 'Cài đặt')
@section('content')
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Cấu hình</h3>
        </div>

        <div class="block-content">
            {!! Form::open(['url' => route('admin.settings.save'), 'method' => 'POST', 'files' => true]) !!}
            @foreach ($app_settings as $app_setting)
                <div class="row mb-4">
                    <div class="col-4">
                        <label for="{{ $app_setting['key'] }}">{{ $app_setting['field'] }}</label>
                    </div>
                    <div class="col-8">
                        <input type="{{ $app_setting['type'] }}" value="{{ $app_setting['value'] }}"
                            name="{{ $app_setting['key'] }}" class="form-control" id="{{ $app_setting['key'] }}">
                    </div>
                    <div class="col-12">
                        <small class="fst-italic text-secondary">{{ $app_setting['desc'] }}</small>
                    </div>
                </div>
            @endforeach

            <div class="mb-4 text-end">
                <button class="btn btn-primary">Xác nhận</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
