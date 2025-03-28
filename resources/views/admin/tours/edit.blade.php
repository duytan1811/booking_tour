@extends('admin.layout._app')
@section('title', 'Cập nhật tour du lịch')
@section('content')
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Cập nhật tour du lịch</h3>
        </div>

        <div class="block-content">
            {!! Form::open(['method' => 'PUT', 'url' => route('admin.tours.update', $tour->id),'files' => true]) !!}
            @include('admin.tours._form')
            {!! Form::close() !!}
        </div>
    </div>
@endsection
