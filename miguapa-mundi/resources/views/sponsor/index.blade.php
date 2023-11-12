
<!-- Author: Juan Felipe Pinzón -->

@extends('layouts.app')
@section('title', $viewData["titleTemplate"])
@section('content')
<div class="container">
    <h1>@lang('sponsor.index.h1Title')</h1>
    <p>@lang('sponsor.index.pText')</p>
</div>
<div class="container d-flex flex-wrap gap-3 justify-content-evenly">
    @foreach($viewData["la_licoreraData"] as $item)
    <div class="offer-card card">
        <h5 class="card-header bg-secondary">{{ $item['name'] }}</h5>
        <div class="card-body">
            <p class="my-0 pb-1"><span class="fw-bold">@lang('sponsor.index.cardId'):</span> {{ $item['id'] }} </p>
            <p class="my-0 pb-1"><span class="fw-bold">@lang('sponsor.index.cardStock'):</span> {{ $item['stock'] }} </p>
            <p class="my-0 pb-1"><span class="fw-bold">@lang('sponsor.index.cardPrice'):</span> ${{ $item['price'] }} </p>
            <div class="position-absolute bottom-0 my-2">
                <a href="{{ $item['link'] }}" class="btn btn-primary">@lang('sponsor.index.btnShow')</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection