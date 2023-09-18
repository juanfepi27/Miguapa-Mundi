@extends('layouts.admin')
@section('title',$viewData['titleTemplate'])
@section('content')
@section('secondary-nav')
    @include('admin.news.partials.navbar')
@endsection
<div>
    <h2>@lang('admin.newsShow.h2Title')</h2>
    <div class="card mb-3">
        <div class="row g-0">
            <div class="col-12">
                <div class="card-body">
                    <div class="card-title">
                        <h5>@lang('admin.newsShow.cardTitle') #{{ $viewData['news']->getId() }}</h5>
                    </div>
                    <form action="{{ route('admin.news.update') }}" method="post">
                        @csrf
                        <p class="card-text">
                        <span class="fw-bold">@lang('admin.newsShow.pCreatedAt'):</span> {{ $viewData['news']->getCreatedAt() }}
                            <div class="row">
                                <div class="col-lg-6 col-12">
                                    <span class="fw-bold">@lang('admin.newsShow.labelTitle'):</span> {{ $viewData['news']->getTitle() }}
                                </div>
                                <div class="col-lg-6 col-12">
                                    <input type="text" class="form-control mb-2" placeholder="@lang('admin.newsShow.placeHolderTitle')" name="title" value="{{ $viewData['news']->getTitle() }}" />
                                </div>
                            </div>
                            <div class="row">
                            <div class="col-lg-6 col-12">
                                <span class="fw-bold">@lang('admin.newsShow.labelDescription'):</span> {{ $viewData['news']->getDescription() }}
                                </div>
                                <div class="col-lg-6 col-12">
                                    <input type="text" class="form-control mb-2" placeholder="@lang('admin.newsShow.placeHolderDescription')" name="description" value="{{ $viewData['news']->getDescription() }}" />
                                </div>
                            </div>
                        </p>
                        <input type="hidden" name="id" value="{{ $viewData['news']->getId() }}">
                        <input type="submit" class="btn btn-primary" value="@lang('admin.newsShow.btnUpdate')">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection