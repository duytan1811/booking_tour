@extends('admin.layout._app')
@section('title', 'Cập nhật bài viết')
@section('content')
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Cập nhật bài viết</h3>
        </div>

        <div class="block-content">
            {!! Form::open(['method' => 'PUT', 'url' => route('admin.blogs.update', $blog->id),'files' => true]) !!}
            @include('admin.blogs._form')
            {!! Form::close() !!}
        </div>
    </div>
@endsection
