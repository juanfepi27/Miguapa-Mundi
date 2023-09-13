@extends('layouts.admin')
@section('title',$viewData['titleTemplate'])
@section('content')
@section('secondary-nav')
    @include('admin.news.partials.navbar')
@endsection
<div>
    <h2>Update News</h2>
    <div class="card mb-3">
        <div class="row g-0">
            <div class="col-12">
                <div class="card-body">
                    <div class="card-title">
                        <h5>News #{{ $viewData['news']->getId() }}</h5>
                    </div>
                    <form action="{{ route('admin.news.update') }}" method="post">
                        @csrf
                        <p class="card-text">
                        Created at: {{ $viewData['news']->getCreatedAt() }}
                            <div class="row">
                                <div class="col-lg-6 col-12">
                                    Actual title: {{ $viewData['news']->getTitle() }}
                                </div>
                                <div class="col-lg-6 col-12">
                                    <input type="text" class="form-control mb-2" placeholder="Enter the title" name="title" value="{{ old('title') }}" />
                                </div>
                            </div>
                            <div class="row">
                            <div class="col-lg-6 col-12">
                                Actual description: {{ $viewData['news']->getDescription() }}
                                </div>
                                <div class="col-lg-6 col-12">
                                    <input type="text" class="form-control mb-2" placeholder="Enter description" name="description" value="{{ old('descrption') }}" />
                                </div>
                            </div>
                        </p>
                        <input type="hidden" name="id" value="{{ $viewData['news']->getId() }}">
                        <input type="submit" class="btn btn-primary" value="Update">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection