<div class="row">
    <div class="col-6">
        <div class="mb-4">
            <label class="form-label">Tên<span class="text-danger">*</span></label>
            {!! Form::text('name', $tour->name, ['class' => 'form-control']) !!}
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="col-3">
        <div class="mb-4">
            <label class="form-label">Loại <span class="text-danger">*</span></label>
            {!! Form::select('type', $tour_types, $tour->people, ['class' => 'form-control']) !!}
            @error('type')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="col-3">
        <div class="mb-4">
            <label class="form-label">Số người <span class="text-danger">*</span></label>
            {!! Form::number('people', $tour->people, ['class' => 'form-control']) !!}
            @error('people')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>

<div class="row">
    <div class="col-6">
        <div class="mb-4">
            <label class="form-label">Giá (VNĐ) <span class="text-danger">*</span></label>
            {!! Form::number('price', $tour->price, ['class' => 'form-control']) !!}
            @error('price')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="col-3">
        <div class="mb-4">
            <label class="form-label">Giảm Giá (%)</label>
            {!! Form::number('discount', $tour->discount, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="col-3 d-flex">
        <div class="mb-4 flex-fill align-content-center">

            <label class="form-label">
                {!! Form::checkbox('is_outstanding', true, $tour->is_outstanding, ['class' => 'form-check-input']) !!}
                Nổi bật</label>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-6">
        <div class="mb-4">
            <label class="form-label">Thời gian bắt đầu <span class="text-danger">*</span></label>
            {!! Form::date('departure_time', $tour->departure_time, ['class' => 'form-control']) !!}
            @error('departure_time')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="col-6">
        <div class="mb-4">
            <label class="form-label">Thời gian kết thúc <span class="text-danger">*</span></label>
            {!! Form::date('return_time', $tour->return_time, ['class' => 'form-control']) !!}
            @error('return_time')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>

<div class="row">
    <div class="col-3">
        <div class="mb-4">
            <label class="form-label">Giới hạn tuổi <span class="text-danger">*</span></label>
            {!! Form::number('age_restriction', $tour->age_restriction, ['class' => 'form-control']) !!}
            @error('age_restriction')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="col-3">
        <div class="mb-4">
            <label class="form-label">Trang phục</label>
            {!! Form::text('dress_code', $tour->dress_code, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="col-6">
        <div class="mb-4">
            <label class="form-label">Hình ảnh</label>
            {!! Form::file('image', ['class' => 'form-control']) !!}
        </div>
    </div>
</div>
<div class="mb-4">
    <label class="form-label">Địa chỉ <span class="text-danger">*</span></label>
    {!! Form::text('destination', $tour->destination, ['class' => 'form-control']) !!}
    @error('destination')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="mb-4">
    <label class="form-label">Tóm tắt</label>
    <textarea type="text" rows="5" class="form-control" name="description">
        {{ $tour->description }}
    </textarea>
</div>

<div class="mb-4 text-end">
    <a href="{!! route('admin.blogs.index') !!}" type="button" class="btn btn-danger">Quay lại</a>
    {!! Form::submit('Xác nhận', ['class' => 'btn btn-primary']) !!}
</div>


