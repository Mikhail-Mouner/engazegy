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
                    Add New Blog
                </h4>
            </div>
            <div class="col-md-12">

                <form action="{{ route('new_blog.store') }}" method="post">
                    @csrf
                    <div class="form-group bg-light rounded-3 p-2">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" class="form-control">
                        @error('title') {{ $message }} @enderror
                    </div>
                    <div class="form-group bg-light rounded-3 p-2">
                        <label for="desc">Description</label>
                        <textarea name="desc" class="form-control" id="desc" cols="30" rows="10"></textarea>
                        @error('desc') {{ $message }} @enderror
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('js')
@endpush
