@extends('layouts.app')
@section('title', $viewData["titleTemplate"])
@section('secondary-nav')
    @include('offer.includes.nav2')
@endsection
@section('content')
<div class="container d-flex flex-wrap gap-3 justify-content-evenly">
    @foreach($viewData['offers'] as $offer)
    <div class="offer-card card">
        <h5 class="card-header bg-secondary d-flex justify-content-between">
            <p class="my-0">Offer #{{$offer->getId()}}</p>
            @if($offer->getStatus() == 'SENT')
            <a href="{{route ('offer.delete',['id'=> $offer->getId()])}}">
                <i class="fa fa-trash"></i>
            </a>
            @endif
        </h5>
        <div class="card-body position-relative">
            <p class="my-0 pb-1">Country: {{$offer->getUserOferror()["name"]}}</p>
            <p class="my-0 pb-1">Offered Value: {{$offer->getPrice()}}</p>
            <p class="my-0 pb-1">Sent Date: {{$offer->getCreatedAt()}}</p>
            @if($offer->getStatus() == 'SENT')
            <div class="card-footer position-absolute start-0 bottom-0 w-100 bg-info1 text-center text-white fw-bolder">
            @else
            <div class="card-footer position-absolute start-0 bottom-0 w-100 bg-info2 text-center text-white fw-bolder">
            @endif
                {{ $offer->getStatus() }}
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection