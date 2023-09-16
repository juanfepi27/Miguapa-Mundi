@extends('layouts.app')
@section('title', $viewData["titleTemplate"])
@section('secondary-nav')
    @include('offer.partials.navbar')
@endsection
@section('content')
<div class=" position-relative d-flex flex-wrap gap-3 justify-content-evenly">
    <div class="row position-fixed top-50 start-0 translate-middle z-1">
        <p class="bg-info1 m-1 p-1 rounded-pill text-end text-white fw-bold">order by:</p>
        <a href="{{route('offer.byMe',['orderBy'=>'price'])}}" class="btn-primary m-1 p-1 rounded-pill text-end">amount</a>
        <a href="{{route('offer.byMe',['orderBy'=>'created_at'])}}" class="btn-primary m-1 p-1 rounded-pill text-end">date</a>
    </div>
    @foreach($viewData['offers'] as $offer)
    <div class="offer-card card">
        <h5 class="card-header bg-secondary d-flex justify-content-between">
            <p class="my-0">@lang('offer.byMe.cardTitle') #{{$offer->getId()}}</p>
            @if($offer->getStatus() == 'SENT')
            <a href="{{route ('offer.delete',['id'=> $offer->getId()])}}">
                <i class="fa fa-trash"></i>
            </a>
            @endif
        </h5>
        <div class="card-body position-relative">
            <p class="my-0 pb-1">@lang('offer.byMe.cardCountry'): {{$offer->getCountry()->getName()}}</p>
            <p class="my-0 pb-1">@lang('offer.byMe.cardValue'): $ {{$offer->getPriceFormatted()}}</p>
            <p class="my-0 pb-1">@lang('offer.byMe.cardDate'): {{$offer->getCreatedAt()}}</p>
            @if($offer->getStatus() == 'SENT')
            <div class="card-footer position-absolute start-0 bottom-0 w-100 bg-info1 text-center text-white fw-bolder">
                @lang('offer.byMe.footSent')
            @else
            <div class="card-footer position-absolute start-0 bottom-0 w-100 bg-info2 text-center text-white fw-bolder">
                @if($offer->getStatus() == 'ACCEPTED')
                    @lang('offer.byMe.footAccept')
                @else
                    @lang('offer.byMe.footReject')
                @endif
            @endif
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection