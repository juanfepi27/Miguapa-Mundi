@extends('layouts.admin')
@section('title',$viewData['titleTemplate'])
@section('content')
@section('secondary-nav')
    @include('admin.news.partials.navbar')
@endsection
<div class="container">
    <h2 class="text-center">@lang('admin.newsCreate.h2Title')</h2>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-secondary">@lang('admin.newsCreate.formTitle')</div>
                    <div class="card-body">
                        @if($errors->any())
                        <ul id="errors" class="alert alert-danger list-unstyled">
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                        </ul>
                        @endif
                        <form method="POST" action="{{ route('admin.news.save') }}">
                            @csrf
                            <input type="text" class="form-control mb-2" placeholder="@lang('admin.newsCreate.placeHolderTitle')" name="title" value="{{ old('title') }}" />
                            <input type="text" class="form-control mb-2" placeholder="@lang('admin.newsCreate.placeHolderDescription')" name="description" value="{{ old('descrption') }}" />
                            <input type="submit" class="btn btn-primary" value="@lang('admin.newsCreate.btnCreate')" />
                            @method('POST')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection