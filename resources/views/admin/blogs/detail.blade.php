@extends('admin.layout._app')
@section('content')
    <div class="text-end mb-3">
        <a href="{!! route('admin.blogs.index') !!}" class="btn btn-danger">Quay lại</a>
    </div>
    <div class="block block-rounded row g-0 overflow-hidden">
        <ul class="nav nav-tabs nav-tabs-block flex-md-column col-md-3 rounded-0" role="tablist">
            <li class="nav-item d-md-flex flex-md-column">
                <a href="{!! route('admin.blogs.detail', ['id' => $blog->id, 'tab' => 'general']) !!}"
                    class="nav-link fs-sm text-md-start rounded-0 {{ $tab == 'general' ? 'active' : '' }}"
                    id="btabs-vertical-home-tab" data-bs-toggle="tab" data-bs-target="#btabs-vertical-general" role="tab"
                    aria-controls="btabs-vertical-general" aria-selected="true">
                    <i class="fa fa-fw fa-home opacity-50 me-1 d-none d-sm-inline-block"></i> Thông tin chung
                </a>
            </li>
            <li class="nav-item d-md-flex flex-md-column">
                <a href="{!! route('admin.blogs.detail', ['id' => $blog->id, 'tab' => 'comment']) !!}"
                    class="nav-link fs-sm text-md-start rounded-0 {{ $tab == 'comment' ? 'active' : '' }}"
                    id="btabs-vertical-profile-tab" data-bs-toggle="tab" data-bs-target="#btabs-vertical-comment"
                    role="tab" aria-controls="btabs-vertical-comment" aria-selected="false">
                    <i class="fa fa-fw fa-user-circle opacity-50 me-1 d-none d-sm-inline-block"></i> Bình luận
                </a>
            </li>
        </ul>
        <div class="tab-content col-md-9 mb-3">
            <div class="block-content tab-pane {{ $tab == 'general' ? 'active' : '' }}" id="btabs-vertical-general"
                role="tabpanel" aria-labelledby="btabs-vertical-home-tab" tabindex="0">
                <h4 class="fw-semibold">Thông tin chung</h4>
                <div class="fs-sm">
                    <div class="row">
                        <div class="col-6">
                            <div class="row">
                                <small class="fst-italic">Tên bài viết</small>
                                <p>{{ $blog->name }}</p>
                            </div>

                            <div class="row">
                                <small class="fst-italic">Danh mục</small>
                                <p>{{ $blog->category->name }}</p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="row">
                                <small class="fst-italic">Loại</small>
                                <p>{{ $blog->type_name }}</p>
                            </div>

                            <div class="row mb-3">
                                <small class="fst-italic">Trạng thái</small>
                                <div>
                                    <span
                                        class="badge {{ $blog->status == 0 ? ' bg-danger' : 'bg-primary' }}">{{ $blog->status_name }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <small class="fst-italic">Tóm tắt</small>
                        <p>{{ $blog->description }}</p>
                    </div>

                    <div class="row">
                        <small class="fst-italic">Nội dung</small>
                        <p>{!! nl2br(e($blog->content)) !!}</p>
                    </div>
                </div>
            </div>
            <div class="block-content tab-pane {{ $tab == 'comment' ? 'active' : '' }}" id="btabs-vertical-comment"
                role="tabpanel" aria-labelledby="btabs-vertical-profile-tab" tabindex="0">
                <h4 class="fw-semibold">Bình luận</h4>
                <div class="fs-sm">
                    <ul class="timeline timeline-modern pull-t">
                        @forelse ($comments as $item)
                            <li class="timeline-event">
                                <div class="timeline-event-time">{{ $item->created_at->diffForHumans() }}</div>
                                <i class="timeline-event-icon fa fa-comment bg-info"></i>
                                <div class="row">
                                    <div class="col-9">
                                        <div class="timeline-event-block">
                                            <p class="fw-semibold ">{{ $item->user->full_name }}
                                                <span
                                                    class=" badge {{ $item->status === 0 ? 'bg-warning' : ($item->status === 1 ? 'bg-success' : 'bg-danger') }}">{{ $item->status_name }}</span>
                                            </p>
                                            <p>{{ $item->comment }}</p>
                                        </div>
                                    </div>
                                    @if ($item->status === 0)
                                        <div class="col-3 d-flex">
                                            {!! Form::open(['url' => route('admin.blogs.approval', $blog->id), 'method' => 'POST', 'class' => 'me-2']) !!}
                                            {!! Form::hidden('status', 1) !!}
                                            {!! Form::hidden('comment_id', $item->id) !!}
                                            <button type="submit" class="btn btn-sm btn-icon btn-primary" title="Duyệt">
                                                <i class="fa fa-check"></i>
                                            </button>
                                            {!! Form::close() !!}

                                            {!! Form::open(['url' => route('admin.blogs.approval', $item->id), 'method' => 'POST']) !!}
                                            {!! Form::hidden('status', 2) !!}
                                            {!! Form::hidden('comment_id', $item->id) !!}
                                            <button type="submit" class="btn btn-sm btn-icon btn-danger" title="Từ chối">
                                                <i class="fa fa-close"></i>
                                            </button>
                                            {!! Form::close() !!}
                                        </div>
                                    @endIf
                                </div>
                            </li>
                        @empty
                            <li>
                                Chưa có bình luận
                            </li>
                        @endforelse


                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
