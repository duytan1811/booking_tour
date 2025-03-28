@extends('admin.layout._app')
@section('title', 'Thêm mới tour du lịch')
@section('content')
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Thêm mới tour du lịch</h3>
        </div>

        <div class="block-content">
            {!! Form::open(['url' => route('admin.tours.store'),'files' => true]) !!}
            @include('admin.tours._form')
            {!! Form::close() !!}
        </div>
    </div>
@endsection
