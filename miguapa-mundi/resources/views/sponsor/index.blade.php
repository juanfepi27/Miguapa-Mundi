
<!-- Author: Juan Felipe Pinzón -->

@extends('layouts.app')
@section('title', $viewData["titleTemplate"])
@section('content')
<div class="container">
    <h1>@lang('sponsor.index.h1Title')</h1>
    <p>@lang('sponsor.index.pText')</p>
</div>
<div class="container d-flex flex-wrap gap-3 justify-content-evenly">
    @foreach($viewData["motorcyclesInfo"] as $motorcycle)
    <div class="offer-card card">
        <h5 class="card-header bg-secondary">{{ $motorcycle['name'] }}</h5>
        <div class="card-body">
            <p class="my-0 pb-1"><span class="fw-bold">@lang('sponsor.index.cardBrand'):</span> {{ $motorcycle['brand'] }} </p>
            <p class="my-0 pb-1"><span class="fw-bold">@lang('sponsor.index.cardModel'):</span> {{ $motorcycle['model'] }} </p>
            <p class="my-0 pb-1"><span class="fw-bold">@lang('sponsor.index.cardCategory'):</span> {{ $motorcycle['category'] }} </p>
            <div class="position-absolute bottom-0 my-2">
                <!-- be careful with the url -->
                <a href="http://www.motohub/motorcycles/{{ $motorcycle['id'] }}" class="btn btn-primary">@lang('sponsor.index.btnShow')</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection