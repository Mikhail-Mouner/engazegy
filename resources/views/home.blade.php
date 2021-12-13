@extends('layouts.app')

@section('css')
    <style>
    </style>
@endsection
@section('content')
    <div class="container">
        <div class="row bg-white p-3 border-dark rounded-3">
            <div class="col-sm-12">
                <h4 class="info-text">
                    All Blog
                    @if(request()->has('sort_by') && request()->get('sort_by') == 'desc')
                        <a href="?sort_by=asc">
                            <button type="button" class="btn btn-primary btn-sm float-end">
                                Sort By Date &nbsp;
                                <i class="fa fa-arrow-circle-down fa-fw" aria-hidden="true"></i>
                            </button>
                        </a>
                    @else
                        <a href="?sort_by=desc">
                            <button type="button" class="btn btn-primary btn-sm float-end">
                                Sort By Date &nbsp;
                                <i class="fa fa-arrow-circle-up fa-fw" aria-hidden="true"></i>
                            </button>
                        </a>
                    @endif
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
                                User:<span class="h4 m-0 text-muted text-uppercase "> {{ $item->user->name }}</span>
                                <br />
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
