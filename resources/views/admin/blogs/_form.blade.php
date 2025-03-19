<div class="row">
    <div class="col-8">
        <div class="mb-4">
            <label class="form-label">Tên<span class="text-danger">*</span></label>
            {!! Form::text('name', $blog->name, ['class' => 'form-control']) !!}
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="col-4">
        <div class="mb-4">
            <label class="form-label">Danhh mục <span class="text-danger">*</span></label>
            {!! Form::select('category_id', $categories, $blog->category_id, ['class' => 'form-select']) !!}
            @error('category_id')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>

<div class="row">
    <div class="col-4">
        <div class="mb-4">
            <label class="form-label">Loại <span class="text-danger">*</span></label>
            {!! Form::select('type', $blog_types, $blog->type, ['class' => 'form-select']) !!}
            @error('type')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="col-4">
        <div class="mb-4">
            <label class="form-label">Hình ảnh</label>
            {!! Form::file('image', ['class' => 'form-control']) !!}
        </div>
        @error('image')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-4">
        <div class="mb-4">
            <label class="form-label">Hình ảnh 1</label>
            {!! Form::file('image_1', ['class' => 'form-control']) !!}
        </div>
        @error('image')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
</div>

<div class="mb-4">
    <label class="form-label">Tóm tắt</label>
    <textarea type="text" rows="5" class="form-control" name="description">
        {{ $blog->description }}
    </textarea>
</div>

<div class="mb-4">
    <label class="form-label">Nội dung</label>
    <textarea id="editor" name="content">{{ $blog->content }}</textarea>
</div>


<div class="mb-4 text-end">
    <a href="{!! route('admin.blogs.index') !!}" type="button" class="btn btn-danger">Quay lại</a>
    {!! Form::submit('Xác nhận', ['class' => 'btn btn-primary']) !!}
</div>
