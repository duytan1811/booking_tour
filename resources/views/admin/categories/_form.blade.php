<div class="mb-4">
    <label class="form-label">Tên<span class="text-danger">*</span></label>
    {!! Form::text('name', $category->name, ['class' => 'form-control']) !!}
    @error('name')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="mb-4 text-end">
    <a href="{!! route('admin.tours.index') !!}" type="button" class="btn btn-danger">Quay lại</a>
    {!! Form::submit('Xác nhận', ['class' => 'btn btn-primary']) !!}
</div>
