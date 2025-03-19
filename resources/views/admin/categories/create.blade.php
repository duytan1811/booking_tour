@extends('admin.layout._app')
@section('content')
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Thêm mới danh mục</h3>
        </div>

        <div class="block-content">
            {!! Form::open(['url' => route('admin.categories.store')]) !!}
            @include('admin.categories._form')
            {!! Form::close() !!}
        </div>
    </div>
@endsection


@section('extra_scripts')
    <script>
        Codebase.helpersOnLoad(['js-ckeditor5']);
    </script>
@endsection

