@extends('admin.layout._app')
@section('title', 'Thêm mới bài viết')
@section('content')
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Thêm mới bài viết</h3>
        </div>

        <div class="block-content">
            {!! Form::open(['url' => route('admin.blogs.store'),'files' => true]) !!}
            @include('admin.blogs._form')
            {!! Form::close() !!}
        </div>
    </div>
@endsection
