<div class="sidebar-area tours-sidebar">
    <div class="widget">
        <h3 class="widget_title">Tìm kiếm</h3>
        {!! Form::open(['method' => 'GET', 'url' => route('tours.index'), 'class' => 'booking-form']) !!}
        <div class="form-group ">
            <i class="fas fa-search"></i>
            {!! Form::text('name', $search_name, ['placeholder' => 'Nhập tên tour']) !!}
        </div>

        <div class="form-group">
            <i class="fas fa-calendar-alt"></i>
            {!! Form::date('departure_time', $search_departure_time) !!}
        </div>

        <div class="form-group">
            <i class="fas fa-thumbtack"></i>
            {!! Form::select('type', $tour_types, $search_type, ['class' => 'form-select']) !!}
        </div>

        {!! Form::submit('Xác nhận', ['class' => 'vs-btn style4 w-100']) !!}
        {!! Form::close() !!}
    </div>
</div>