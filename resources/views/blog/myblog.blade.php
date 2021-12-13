@extends('layouts.app')
@section('css')
    <style>
    </style>
@endsection
@section('content')
    <div class="container">
        <div class="row bg-white p-3 border-dark rounded-3">
            <div class="col-sm-12">
                @include('layouts.includes._alert')
                <h4 class="info-text">
                    My Blog
                    <div class="btn-group float-end">
                        <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="triggerId"
                                data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                            Action
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="triggerId">
                            @switch(request()->get('sort_by') == 'desc')
                                @case('desc')
                                <a class="dropdown-item" href="?sort_by=asc">
                                    Sort By Date&nbsp;
                                    <i class="fa fa-arrow-circle-down fa-fw" aria-hidden="true"></i>
                                </a>
                                @break
                                @default
                                <a class="dropdown-item" href="?sort_by=desc">
                                    Sort By Date&nbsp;
                                    <i class="fa fa-arrow-circle-up fa-fw" aria-hidden="true"></i>
                                </a>
                                @break
                            @endswitch
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('new_blog') }}">
                                <i class="fa fa-plus-circle fa-fw" aria-hidden="true"></i>
                                Add New &nbsp;
                            </a>
                            @if( auth()->user()->type == 'admin')
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('auto_import') }}">
                                    <i class="fa fa-plus-circle fa-fw" aria-hidden="true"></i>
                                    &nbsp; Import Auto
                                </a>
                            @endif
                        </div>
                    </div>
                    <span class="clearfix"></span>
                </h4>
            </div>
            @foreach($blog as $item)
                <div class="col-sm-4 mb-2">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">
                                {{ $item->title }}
                            </h4>
                            <p class="card-text text-secondary">
                                {!! $item->desc !!}
                            </p>
                        </div>
                        <div class="card-footer">
                            <p class="card-text m-0">
                                Publication At:<span class="text-muted"> {{ $item->publication_date }}</span>
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
@push('js')
@endpush
